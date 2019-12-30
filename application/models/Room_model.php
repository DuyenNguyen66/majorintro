<?php

class Room_model extends CI_Model {

	protected $table = 'room';
	protected $id_name = 'room_id';

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

	public function getMaleRoomByFloor($floor_id) {
		$this->db->select('r.*, count(rg.student_id) as total_student');
		$this->db->from('room r');
		$this->db->join('registration rg', 'r.room_id = rg.room_id', 'left');
		$this->db->where(array('floor_id' => $floor_id, 'type' => 0));
		$this->db->group_by('r.room_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getFeMaleRoomByFloor($floor_id) {
		$this->db->select('r.*, count(rg.student_id) as total_student');
		$this->db->from('room r');
		$this->db->join('registration rg', 'r.room_id = rg.room_id', 'left');
		$this->db->where(array('floor_id' => $floor_id, 'type' => 1));
		$this->db->group_by('r.room_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getRoomByFloorForAdmin($floor_id) {
		$this->db->select('r.*, count(rg.student_id) as total_student');
		$this->db->from('room r');
		$this->db->join('registration rg', 'r.room_id = rg.room_id', 'left');
		$this->db->where('floor_id', $floor_id);
		$this->db->group_by('r.room_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getRoomById($id) {
		$this->db->where($this->id_name, $id);
		$query = $this->db->get($this->table);
		return $query->first_row('array');
	}

	public function getRoomsByBuilding($id) {
		$this->db->select('r.*');
		$this->db->from('room r');
		$this->db->join('registration rg', 'r.room_id = rg.room_id');
		$this->db->where('r.building_id', $id);
		$this->db->group_by('r.room_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getStudents($room_id, $term_id) {
		$this->db->select('s.*, rg.registed, rg.confirmed, rg.status as rg_status');
		$this->db->from('room r');
		$this->db->join('registration rg', 'r.room_id = rg.room_id');
		$this->db->join('student s', 'rg.student_id = s.student_id');
		$this->db->where('r.room_id', $room_id);
		$this->db->where('rg.term_id', $term_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getRoom($room_id) {
		$this->db->select('r.*,f.name as floor_name, b.name as build_name');
		$this->db->from('room r');
		$this->db->join('building b', 'r.building_id = b.building_id');
		$this->db->join('floor f', 'r.floor_id = f.floor_id');
		$this->db->where('room_id', $room_id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	public function getRoomByStudent($student_id, $term_id) {
		$this->db->select('rg.room_id, r.name');
		$this->db->from('room r');
		$this->db->join('registration rg', 'r.room_id = rg.room_id');
		$this->db->where('student_id', $student_id);
		$this->db->where('term_id', $term_id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	public function getAllByBuilding($building_id) {
		$this->db->select('r.*, r.name as room_name, f.name as floor_name, count(rg.student_id) as total_student');
		$this->db->from('room r');
		$this->db->join('floor f', 'r.floor_id = f.floor_id');
		$this->db->join('registration rg', 'r.room_id = rg.room_id', 'left');
		$this->db->where('r.building_id', $building_id);
		$this->db->group_by('r.room_id');
		return $this->db->get()->result_array();
	}
} 