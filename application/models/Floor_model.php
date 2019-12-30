<?php

class Floor_model extends CI_Model {

	protected $table = 'floor';
	protected $id_name = 'floor_id';

	public function __construct() {
		parent::__construct();
	}

	public function getAll() {
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function add($params) {
		$this->db->insert($this->table, $params);
	}

	public function edit($params, $id) {
		$this->db->where($this->id_name, $id);
		$this->db->update($this->table, $params);
	}

	public function getByBuilding($id) {
		$this->db->where('building_id', $id);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
} 