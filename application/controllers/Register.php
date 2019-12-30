<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('floor_model');
		$this->load->model('building_model');
		$this->load->model('room_model');
		$this->load->model('term_model');
		$this->load->model('student_model');
		$this->load->model('registration_model');
	}

	public function index() {
		$account = $this->session->userdata('student');
		if($account == null) {
			redirect('login');
		}
		$floors = $this->floor_model->getAll();
		$buildings = $this->building_model->getAll();
		$term = $this->term_model->getCurrentTerm();
		
		$layoutParams = array(
			'floors' => $floors,
			'buildings' => $buildings,
			'term' => $term
		);
		$content = $this->load->view('room_list', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/student.js');
		$data['parent_id'] = 11;
		$data['sub_id'] = 12;
		$data['group'] = 3;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function getFloorByBuilding() {
		$building_id = $this->input->get('building_id');
		$floors = $this->floor_model->getByBuilding($building_id);
		$params = array(
			'floors' => $floors
		);
		echo $this->load->view('floor_select', $params, true);
	}

	public function getRoomByFloor() {
		$account = $this->session->userdata('student');
		if($account == null) {
			redirect('login');
		}
		$floor_id = $this->input->get('floor_id');
		$student = $this->student_model->getStudentByEmail($account['email']);
		if ($student['gender'] == 0) {
			$rooms = $this->room_model->getMaleRoomByFloor($floor_id);
		}else
		{
			$rooms = $this->room_model->getFeMaleRoomByFloor($floor_id);
		}
		$term = $this->term_model->getCurrentTerm();
		$check = $this->registration_model->checkStudent($student['student_id'], $term['term_id']);
		if ($check != null) {
			$haveRegister = 1;
		}else {
			$haveRegister = 0;
		}
		$params = array(
			'rooms' => $rooms,
			'haveRegister' => $haveRegister
		);
		echo $this->load->view('room_table', $params, true);
	}

	public function chooseRoom() {
		$params['room_id'] = $this->input->get('room_id');
		$account = $this->session->userdata('student');
		$student = $this->student_model->getStudentByEmail($account['email']);
		$term = $this->term_model->getCurrentTerm();
		$params['student_id'] = $student['student_id'];
		$params['term_id'] = $term['term_id'];
		$params['registed'] =  time();
		$check = $this->registration_model->checkStudent($params['student_id'], $params['term_id']);
		if($check == null) {
			$this->registration_model->add($params);
			$this->session->set_flashdata('success', 'Register successful.');
		}else {
			$this->session->set_flashdata('error', 'Error. You registed room in this term.');
		}
		redirect('registration');
		
	}

	public function registerList() {
		$account = $this->session->userdata('student');
		if($account == null) {
			redirect('login');
		}
		$student = $this->student_model->getStudentByEmail($account['email']);
		$histories = $this->registration_model->getRegisterList($student['student_id']);
		$layoutParams = array(
			'histories' => $histories,
		);
		$content = $this->load->view('register_list', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/student.js');
		$data['parent_id'] = 11;
		$data['sub_id'] = 13;
		$data['group'] = 3;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function roommateList() {
		$account = $this->session->userdata('student');
		$student = $this->student_model->getStudentByEmail($account['email']);
		$term = $this->term_model->getCurrentTerm();
		$room = $this->registration_model->getRoom($student['student_id'], $term['term_id']);
		$roommates = $this->registration_model->getRoommates($term['term_id'], $room['room_id']);
		$layoutParams = array(
			'term_name' => $term['name'],
			'room_name' => $room['name'],
			'roommates' => $roommates
		);
		$content = $this->load->view('roommate_list', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/student.js');
		$data['parent_id'] = 11;
		$data['sub_id'] = 14;
		$data['group'] = 3;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}
}