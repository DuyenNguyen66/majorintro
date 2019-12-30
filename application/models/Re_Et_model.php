<?php

class Re_Et_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function getAllReligions() {
		$query = $this->db->get('religion');
		return $query->result_array();
	}

	public function getAllEthnic() {
		$query = $this->db->get('ethnic');
		return $query->result_array();
	}
} 