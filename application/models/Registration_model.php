<?php

class Registration_model extends CI_Model {

	protected $table = 'registration';
	protected $id_name = 'id';

	public function __construct() {
		parent::__construct();
	}

	public function getAll($building_id) {
		$this->db->select('rg.*, t.name as term_name, r.name as room_name, f.name as floor_name, b.name as build_name, s.full_name, s.student_code');
		$this->db->from('registration rg');
		$this->db->join('term t', 'rg.term_id = t.term_id');
		$this->db->join('room r', 'rg.room_id = r.room_id');
		$this->db->join('floor f', 'r.floor_id = f.floor_id');
		$this->db->join('building b', 'r.building_id = b.building_id');
		$this->db->join('student s', 'rg.student_id = s.student_id');
		if (!empty($building_id)) {
			$this->db->where('r.building_id', $building_id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function add($params) {
		$this->db->insert($this->table, $params);
	}

	public function checkStudent($student_id, $term_id) {
		$this->db->where(array('student_id' => $student_id, 'term_id' => $term_id));
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0) {
			return $query->result_array();
		}else {
			return null;
		}
	}

	public function getRegisterList($student_id) {
		$this->db->select('rg.*, t.name as term_name, r.name as room_name, f.name as floor_name, b.name as build_name');
		$this->db->from('registration rg');
		$this->db->join('term t', 'rg.term_id = t.term_id');
		$this->db->join('room r', 'rg.room_id = r.room_id');
		$this->db->join('floor f', 'r.floor_id = f.floor_id');
		$this->db->join('building b', 'r.building_id = b.building_id');
		$this->db->where('rg.student_id', $student_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getRoom($student_id, $term_id) {
		$this->db->select('rg.*, r.name');
		$this->db->from('registration rg');
		$this->db->join('room r', 'rg.room_id = r.room_id');
		$this->db->where(array('student_id' => $student_id, 'term_id' => $term_id));
		$query = $this->db->get();
		return $query->first_row('array');
	}

	public function getRoommates($term_id, $room_id) {
		$this->db->select('s.full_name, s.email, s.phone');
		$this->db->from('registration rg');
		$this->db->join('student s', 'rg.student_id = s.student_id');
		$this->db->where(array('term_id' => $term_id, 'room_id' => $room_id));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update($id, $params) {
		$this->db->where('id', $id);
		$this->db->update($this->table, $params);
	}

	public function countStudent($room_id, $term_id) {
		$this->db->select('count(rg.student_id) as total_student');
		$this->db->from('registration rg');
		$this->db->where('room_id', $room_id);
		$this->db->where('term_id', $term_id);
		$this->db->group_by('room_id');
		return $this->db->get()->first_row('array');
	}

	public function getTotalForms() {
		return $this->db->get($this->table)->num_rows();
	}

	public function getTotalFormsOfBuilding($building_id) {
		$this->db->from('registration rg');
		$this->db->join('room r', 'rg.room_id = r.room_id');
		$this->db->where('r.building_id', $building_id);
		return $this->db->get()->num_rows();
	}

	public function getTotalFormsNotConfirm($building_id) {
		$this->db->from('registration rg');
		$this->db->join('room r', 'rg.room_id = r.room_id');
		$this->db->where('r.building_id', $building_id);
		$this->db->where('rg.confirmed', null);
		return $this->db->get()->num_rows();
	}
}	