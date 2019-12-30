<?php

class Student extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('student_model');
		$this->load->model('admin_model');
	}

	public function index() {
		$account = $this->session->userdata('admin');
		if($account == null) {
			redirect('login');
		}
		$admin = $this->admin_model->getAccountByEmail($account['email']);
		$content = $this->load->view('admin/student_list', '',true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/settings.js');
		$data['parent_id'] = 5;
		$data['sub_id'] = 51;
		$data['group'] = $admin['position_id'] == 1 || $admin['position_id'] == 2 ? 1 : 2;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function getStudentsByStatus() {
		$account = $this->session->userdata('admin');
		if($account == null) {
			redirect('login');
		}
		$admin = $this->admin_model->getAccountByEmail($account['email']);
		$assignment = $this->admin_model->getBuildingByManager($admin['admin_id']);
		if (!empty($assignment)) {
			$building_id = $assignment['building_id'];
		}else {
			$building_id = '';
		}
		$status = $this->input->get('status');
		if ($status == 0 || $status == 1) {
			$students = $this->student_model->getByStatus($status, $building_id);
		}else {
			$students = $this->student_model->getAll($building_id);
		}
		$data['students'] = $students;
		$this->load->view('admin/student_table', $data);
	}

	public function profile($student_id) {
		$account = $this->session->userdata('admin');
		if($account == null)
		{
			redirect('login');
		}
		$admin = $this->admin_model->getAccountByEmail($account['email']);
		$params['student'] = $this->student_model->getProfile($student_id);
		$content = $this->load->view('admin/student_profile', $params, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/settings.js');
		$data['parent_id'] = 5;
		$data['sub_id'] = 51;
		$data['group'] = $admin['position_id'] == 1 || $admin['position_id'] == 2 ? 1 : 2;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function enable($student_id) {
		$params = array(
			'status' => 1
		);
		$this->student_model->updateStatus($params, $student_id);
		redirect('student');
	}

	public function disable($student_id) {
		$params = array(
			'status' => 0
		);
		$this->student_model->updateStatus($params, $student_id);
		redirect('student');
	}
}