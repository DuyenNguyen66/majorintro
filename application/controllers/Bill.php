<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bill extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('term_model');
		$this->load->model('room_model');
		$this->load->model('bill_model');
		$this->load->model('student_model');
	}

	public function elecBill() {
		$bill_type = 2;
		$account = $this->session->userdata('student');
		if($account == null) {
			redirect('login');
		}
		$student = $this->student_model->getStudentByEmail($account['email']);
		$term = $this->term_model->getCurrentTerm();
		$room = $this->room_model->getRoomByStudent($student['student_id'], $term['term_id']);
		$bills = $this->bill_model->getBillForStudent($term['term_id'], $room['room_id'], $bill_type);
		$layoutParams = array(
			'term' => $term,
			'room' => $room,
			'bills' => $bills
		);
		$content = $this->load->view('elec_bill', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/student.js');
		$data['parent_id'] = 15;
		$data['sub_id'] = 16;
		$data['group'] = $account['group'];
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function waterBill() {
		$bill_type = 1;
		$account = $this->session->userdata('student');
		if($account == null) {
			redirect('login');
		}
		$student = $this->student_model->getStudentByEmail($account['email']);
		$term = $this->term_model->getCurrentTerm();
		$room = $this->room_model->getRoomByStudent($student['student_id'], $term['term_id']);
		$bills = $this->bill_model->getBillForStudent($term['term_id'], $room['room_id'], $bill_type);
		$layoutParams = array(
			'term' => $term,
			'room' => $room,
			'bills' => $bills
		);
		$content = $this->load->view('water_bill', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/student.js');
		$data['parent_id'] = 15;
		$data['sub_id'] = 17;
		$data['group'] = $account['group'];
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function roomBill() {
		$account = $this->session->userdata('student');
		if($account == null) {
			redirect('login');
		}
		$student = $this->student_model->getStudentByEmail($account['email']);
		$term = $this->term_model->getCurrentTerm();
		$room = $this->room_model->getRoomByStudent($student['student_id'], $term['term_id']);
		$bills = $this->bill_model->getRoomBillForStudent($room['room_id']);
		$layoutParams = array(
			'room' => $room,
			'bills' => $bills
		);
		$content = $this->load->view('room_bill', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/student.js');
		$data['parent_id'] = 15;
		$data['sub_id'] = 18;
		$data['group'] = $account['group'];
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}
}