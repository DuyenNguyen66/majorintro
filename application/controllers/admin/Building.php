<?php

class Building extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('building_model');
		$this->load->model('floor_model');
	}

	public function index() {
		$account = $this->session->userdata('admin');
		if($account == null)
		{
			redirect('login');
		}
		$buildings = $this->building_model->getAll();
		$cmd1 = $this->input->post('cmd1');
		$cmd2 = $this->input->post('cmd2');
		if ($cmd1 != null) {
			$params['name'] = $this->input->post('name_building');
			$params['address'] = $this->input->post('address');
			$image = isset($_FILES['image']) ? $_FILES['image'] : null;
			$this->load->model('file_model');
			if ($image != null && $image['error'] == 0) {
				$path = $this->file_model->createFileName($image, 'media/building/', 'building');
				$this->file_model->saveFile($image, $path);
				$params['image'] = $path;
			}
			$this->building_model->add($params);
			redirect('building');
		} 
		if($cmd2 != null) {
			$params['name'] = $this->input->post('name_floor');
			$params['building_id'] = $this->input->post('building_id');
			$this->floor_model->add($params);
			redirect('building');
		}
		$layoutParams = array(
			'buildings' => $buildings
		);
		$content = $this->load->view('admin/building_list', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/settings.js', 'assets/app/search.js');
		$data['parent_id'] = 2;
		$data['sub_id'] = 21;
		$data['group'] = 1;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function getFloorByBuilding() {
		$building_id = $this->input->get('building_id');
		$floors = $this->floor_model->getByBuilding($building_id);
		$params = array(
			'floors' => $floors
		);
		echo $this->load->view('admin/floor_select', $params, true);
	}

	public function edit($building_id) {
		$account = $this->session->userdata('admin');
		if($account == null)
		{
			redirect('login');
		}
		$data['building'] = $this->building_model->getById($building_id);
		$cmd = $this->input->post('cmd');
		if($cmd != null)
		{
			$params['name'] = $this->input->post('name_building');
			$params['address'] = $this->input->post('address');
			$image = isset($_FILES['image']) ? $_FILES['image'] : null;
			$this->load->model('file_model');
			if ($image != null && $image['error'] == 0) {
				$path = $this->file_model->createFileName($image, 'media/building/', 'building');
				$this->file_model->saveFile($image, $path);
				$params['image'] = $path;
			}
			$this->building_model->edit($building_id, $params);
			redirect('building');
		}
		$content = $this->load->view('admin/building_edit', $data, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/settings.js');
		$data['parent_id'] = 2;
		$data['sub_id'] = 21;
		$data['group'] = 1;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function view($building_id) {
		$account = $this->session->userdata('admin');
		if($account == null)
		{
			redirect('login');
		}
		$params['building'] = $this->building_model->getProfile($building_id);
		$content = $this->load->view('admin/building_view', $params, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/settings.js');
		$data['parent_id'] = 2;
		$data['sub_id'] = 21;
		$data['group'] = 1;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}
}