<?php

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('registration_model');
		$this->load->model('admin_model');
	}

	public function index() {
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
		$forms = $this->registration_model->getAll($building_id);
		$layoutParams = array(
			'forms' => $forms,
		);
		$content = $this->load->view('admin/register_list', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/settings.js');
		$data['parent_id'] = 5;
		$data['sub_id'] = 52;
		$data['group'] = $admin['position_id'] == 1 || $admin['position_id'] == 2 ? 1 : 2;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function confirm($form_id) {
		$params['confirmed'] = time();
		$params['status'] = 1;
		$this->registration_model->update($form_id, $params);
		return redirect('form');
	}

	public function disable($form_id) {
		$params['status'] = 0;
		$this->registration_model->update($form_id, $params);
		return redirect('form');
	}
}