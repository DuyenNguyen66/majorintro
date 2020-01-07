<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('student_model');
		$this->load->model('Re_Et_model');
		$this->load->model('floor_model');
		$this->load->model('Major_model');
		$this->load->model('term_model');
	}

	public function index() {
	    print_r(111);die();
//		$account = $this->session->userdata('student');
//		if($account == null) {
//			redirect('login');
//		}
//		$student = $this->student_model->getStudentByEmail($account['email']);
//		$religion = $this->student_model->getReligion($student['student_id']);
//		$student['religion'] = $religion['name'];
//		$ethnic = $this->student_model->getEthnic($student['student_id']);
//		$student['ethnic'] = $ethnic['name'];
//		$term = $this->term_model->getCurrentTerm();
//
//		if($student['status'] == 0) {
//			$this->session->set_flashdata('mess', 'Your account has not been verified.');
//		}
//		$params = array(
//			'student' => $student,
//			'term' => $term
//		);
//		$content = $this->load->view('dashboard', $params, true);
//
//		$data = array();
//		$data['customCss'] = array('assets/css/settings.css', 'assets/css/fullcalendar.css', 'assets/css/fullcalendar.print.css');
//		$data['customJs'] = array('assets/js/jquery-ui.custom.min.js', 'assets/js/fullcalendar.js', 'assets/js/student.js');
//		$data['parent_id'] = 10;
//		$data['sub_id'] = 0;
//		$data['group'] = $account['group'];
//		$data['content'] = $content;
//		$this->load->view('admin_main_layout', $data);
	}

	public function login () {
		$cmd = $this->input->post("cmd");
		if ($cmd != '') {
			$params['email'] = $this->input->post('email');
			$params['password'] = md5($this->input->post('password'));
			$account = $this->student_model->checkAccount($params['email'], $params['password']);
			if($account != null) {
				$this->session->set_userdata('student', array('email' => $account['email'], 'group' => 3, 'gender' => $account['gender']));
				redirect('dashboard');
			}else {
				$this->session->set_flashdata('error', 'ERROR. Account does not exist.');
				$this->load->view('login');
			}
		}
		$this->load->view('login');
	}

	public function logout() {
		$this->session->unset_userdata('student');
		redirect('login');
	}

	public function register () {
		$data['religions'] = $this->Re_Et_model->getAllReligions();
		$data['ethnics'] = $this->Re_Et_model->getAllEthnic();
		$cmd = $this->input->post("cmd");
		if ($cmd != '') {
			$params['full_name'] = $this->input->post('name');
			$params['student_code'] = $this->input->post('code');
			$params['email'] = $this->input->post('email');
			$params['password'] = md5($this->input->post('password'));
			$params['phone'] = $this->input->post('phone');
			$params['address'] = $this->input->post('address');
			$params['gender'] = $this->input->post('gender');
			$params['birthday'] = strtotime($this->input->post('birthday'));
			$params['religion_id'] = $this->input->post('religion_id') == 0 ? null : $this->input->post('religion_id');
			$params['ethnic_id'] = $this->input->post('ethnic_id');

			$this->load->model('file_model');
			$image = isset($_FILES['image']) ? $_FILES['image'] : null;
			if ($image != null && $image['error'] == 0) {
				$path = $this->file_model->createFileName($image, 'media/student/', 'card');
				$this->file_model->saveFile($image, $path);
				$params['student_card'] = $path;
			}

			$params['status'] = 0;
			$check = $this->student_model->checkAccountRegister($params['email']);
			if($check == null) {
				$this->student_model->register($params);
				$this->session->set_flashdata('success', 'Registration successful.');
				redirect('login');
			}else {
				$this->session->set_flashdata('error', 'ERROR. Account already exists.');
				redirect('register');
			}
		} 
		$this->load->view('register', $data);
	}

	public function editProfile($student_id) {
		$account = $this->session->userdata('student');
		if($account == null) {
			redirect('login');
		}
		$student = $this->student_model->getProfile($student_id);
		$ethnics = $this->Re_Et_model->getAllEthnic();
		$religions = $this->Re_Et_model->getAllReligions();

		$cmd = $this->input->post('cmd');
		if (!empty($cmd)) {
			$params['full_name'] = $this->input->post('name');
			$params['student_code'] = $this->input->post('code');
			$params['email'] = $this->input->post('email');
			$params['password'] = md5($this->input->post('password'));
			$params['phone'] = $this->input->post('phone');
			$params['address'] = $this->input->post('address');
			$params['gender'] = $this->input->post('gender');
			$params['birthday'] = strtotime($this->input->post('birthday'));
			$params['religion_id'] = $this->input->post('religion_id') == 0 ? null : $this->input->post('religion_id');
			$params['ethnic_id'] = $this->input->post('ethnic_id');
			$this->load->model('file_model');
			$image = isset($_FILES['image']) ? $_FILES['image'] : null;
			if ($image != null && $image['error'] == 0) {
				$path = $this->file_model->createFileName($image, 'media/student/', 'card');
				$this->file_model->saveFile($image, $path);
				$params['student_card'] = $path;
			}
			$this->student_model->update($student_id, $params);
			$this->session->set_flashdata('success', 'Update successful.');
			redirect('dashboard');
		}
		$params = array(
			'student' => $student, 
			'ethnics' => $ethnics,
			'religions' => $religions
		);
		$content = $this->load->view('profile_edit', $params, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/student.js', 'assets/js/settings.js');
		$data['parent_id'] = 10;
		$data['sub_id'] = 0;
		$data['group'] = $account['group'];
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}
}
