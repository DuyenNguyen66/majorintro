<?php

class Price_model extends CI_model {

	protected $table = 'price';

	public function __construct() {
		parent::__construct();
	}

	public function getPriceList($bill_type) {
		$this->db->where('bill_type', $bill_type);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function addElecPrice($params) {
		$this->db->insert($this->table, $params);
	}

	public function getPriceById($id) {
		$this->db->where('price_id', $id);
		$query = $this->db->get($this->table);
		return $query->first_row('array');
	}

	public function editElecPrice($params, $id) {
		$this->db->where('price_id', $id);
		$this->db->update($this->table, $params);
	}

	public function getWaterPrice() {
		$this->db->where('bill_type', 1);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function addWaterPrice($params) {
		$this->db->insert($this->table, $params);
	}

	public function editWaterPrice($params, $id) {
		$this->db->where('price_id', $id);
		$this->db->update($this->table, $params);
	}

	public function getRoomPrice() {
		$this->db->where('bill_type', 3);
		$query = $this->db->get($this->table);
		return $query->first_row('array');
	}

	public function addRoomPrice($params) {
		$this->db->insert($this->table, $params);
	}
}