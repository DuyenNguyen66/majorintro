<?php

class Price extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('price_model');
	}

	public function index() {
		$account = $this->session->userdata('admin');
		if($account == null)
		{
			redirect('login');
		}
		$elec_prices = $this->price_model->getPriceList(2);
		$cmd = $this->input->post('cmd');
		if($cmd != null)
		{
			$params['name'] = $this->input->post('name');
			$params['description'] = $this->input->post('description');
			$params['price'] = $this->input->post('price');
			$params['bill_type'] = 2;
			$this->price_model->addElecPrice($params);
			redirect('electricity-price');
		}
		$layoutParams = array(
			'elec_prices' => $elec_prices
		);
		$content = $this->load->view('admin/elec_price', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['parent_id'] = 6;
		$data['sub_id'] = 61;
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
			$params['price'] = $this->input->post('price');
			$this->price_model->editElecPrice($params, $price_id);
			redirect('electricity-price');
		}
		$layoutParams = array(
			'price' => $price
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
			$params['price'] = $this->input->post('price');
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
			$params['price'] = $this->input->post('price');
			$this->price_model->editWaterPrice($params, $price_id);
			redirect('water-price');
		}
		$layoutParams = array(
			'price' => $price
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
			$params['price'] = $this->input->post('price');
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
