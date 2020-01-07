<?php

class Major extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('major_model');
		$this->load->model('group_model');
	}

	public function index() {
		$account = $this->session->userdata('admin');
		if($account == null)
		{
			redirect('login');
		}
		$majors = $this->major_model->getAll();
		$layoutParams = array(
			'majors' => $majors
		);
		$content = $this->load->view('admin/major_list', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['parent_id'] = 5;
		$data['sub_id'] = 52;
		$data['group'] = 1;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}
    
    public function add() {
        $groups = $this->group_model->getAll();
        
        $cmd = $this->input->post("cmd");
        if ($cmd != '') {
            $params['major_code'] = $this->input->post('major_code');
            $params['major_name'] = $this->input->post('major_name');
            $params['group_id'] = $this->input->post('group_id');
            $params['status'] = 1;
            
            $check = $this->major_model->checkMajorExist($params['major_code'], $params['major_name']);
            if ($account != null) {
                $this->session->set_flashdata('error', 'Tên ngành đã tồn tại.');
                redirect('edit-major');
            }else {
                $this->major_model->add($params);
                $this->session->set_flashdata('success', 'Sửa thành công.');
                redirect('list-major');
            }
        }
        $layoutParams = array (
            'groups' => $groups
        );
        $content = $this->load->view('admin/add_major', $layoutParams, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['customJs'] = array('assets/js/settings.js', 'assets/app/search.js');
        $data['parent_id'] = 5;
        $data['sub_id'] = 51;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    public function edit($major_id) {
        $major = $this->major_model->getById($major_id);
        $groups = $this->group_model->getAll();
        
        $cmd = $this->input->post("cmd");
        if ($cmd != '') {
            $params['major_code'] = $this->input->post('major_code');
            $params['major_name'] = $this->input->post('major_name');
            $params['group_id'] = $this->input->post('group_id');
            $params['status'] = 1;
            
            $check = $this->major_model->checkMajorExist($params['major_code'], $params['major_name']);
            if ($account != null) {
                $this->session->set_flashdata('error', 'Tên ngành đã tồn tại.');
                redirect('edit-major');
            }else {
                $this->major_model->update($major_id, $params);
                $this->session->set_flashdata('success', 'Sửa thành công.');
                redirect('list-major');
            }
        }
        $layoutParams = array (
            'major' => $major,
            'groups' => $groups
        );
        $content = $this->load->view('admin/edit_major', $layoutParams, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['customJs'] = array('assets/js/settings.js', 'assets/app/search.js');
        $data['parent_id'] = 5;
        $data['sub_id'] = 52;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }

	public function editElec($price_id) {
		$account = $this->session->userdata('admin');
		if($account == null)
		{
			redirect('login');
		}
		$price = $this->price_model->getPriceById($price_id);
		$cmd = $this->input->post('cmd');
		if($cmd != null)
		{
			$params['name'] = $this->input->post('name');
			$params['description'] = $this->input->post('description');
			$params['Major'] = $this->input->post('Major');
			$this->price_model->editElecPrice($params, $price_id);
			redirect('electricity-price');
		}
		$layoutParams = array(
			'Major' => $price
		);
		$content = $this->load->view('admin/elec_edit', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['parent_id'] = 6;
		$data['sub_id'] = 61;
		$data['group'] = 1;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function waterPrice() {
		$account = $this->session->userdata('admin');
		if($account == null)
		{
			redirect('login');
		}
		$water_prices = $this->price_model->getWaterPrice();
		$cmd = $this->input->post('cmd');
		if($cmd != null)
		{
			$params['name'] = $this->input->post('name');
			$params['description'] = $this->input->post('description');
			$params['Major'] = $this->input->post('Major');
			$params['bill_type'] = 1;
			$this->price_model->addWaterPrice($params);
			redirect('water-price');
		}
		$layoutParams = array(
			'water_prices' => $water_prices
		);
		$content = $this->load->view('admin/water_price', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['parent_id'] = 6;
		$data['sub_id'] = 62;
		$data['group'] = 1;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function editWater($price_id) {
		$account = $this->session->userdata('admin');
		if($account == null)
		{
			redirect('login');
		}
		$price = $this->price_model->getPriceById($price_id);
		$cmd = $this->input->post('cmd');
		if($cmd != null)
		{
			$params['name'] = $this->input->post('name');
			$params['description'] = $this->input->post('description');
			$params['Major'] = $this->input->post('Major');
			$this->price_model->editWaterPrice($params, $price_id);
			redirect('water-price');
		}
		$layoutParams = array(
			'Major' => $price
		);
		$content = $this->load->view('admin/water_edit', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['parent_id'] = 6;
		$data['sub_id'] = 62;
		$data['group'] = 1;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function roomPrice() {
		$account = $this->session->userdata('admin');
		if($account == null)
		{
			redirect('login');
		}
		$room_price = $this->price_model->getRoomPrice();
		$cmd = $this->input->post('cmd');
		if($cmd != null)
		{
			$params['name'] = $this->input->post('name');
			$params['description'] = $this->input->post('description');
			$params['Major'] = $this->input->post('Major');
			$params['bill_type'] = 3;
			$currentPrice = $this->price_model->getRoomPrice();
			if ($currentPrice != null) {
				$this->price_model->deleteCurrentPrice($currentPrice['price_id']);
			}
			$this->price_model->addRoomPrice($params);
			redirect('room-price');
		}
		$layoutParams = array(
			'room_price' => $room_price
		);
		$content = $this->load->view('admin/room_price', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['parent_id'] = 6;
		$data['sub_id'] = 63;
		$data['group'] = 1;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

}
