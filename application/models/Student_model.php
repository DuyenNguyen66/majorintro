<?php

class Student_model extends CI_Model {

	protected $table = 'student';
	protected $id_name = 'student_id';

	public function __construct() {
		parent::__construct();
	}

	public function getAll($building_id) {
		$this->db->select('s.*');
		$this->db->from('student s');
		$this->db->join('registration rg', 's.student_id = rg.student_id');
		$this->db->join('room r', 'rg.room_id = r.room_id');
		if (!empty($building_id)) {
			$this->db->where('r.building_id', $building_id);
		}
		$this->db->order_by('student_id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getByStatus($status = 1, $building_id) {
		$this->db->select('s.*');
		$this->db->from('student s');
		$this->db->join('registration rg', 's.student_id = rg.student_id');
		$this->db->join('room r', 'rg.room_id = r.room_id');
		$this->db->where('s.status', $status);
		if (!empty($building_id)) {
			$this->db->where('r.building_id', $building_id);
		}
		$this->db->order_by('student_id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function register($params) {
		$this->db->insert($this->table, $params);
	}

	public function checkAccount($email, $password) {
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0)
		{
			return $query->result_array()[0];
		}else {
			return null;
		}
	}

	public function checkAccountRegister($email) {
		$this->db->where('email', $email);
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0)
		{
			return $query->result_array()[0];
		}else {
			return null;
		}
	}

	public function getProfile($id) {
		$this->db->select('s.*, r.name as religion_name, e.name as ethnic_name');
		$this->db->from('student s');
		$this->db->join('religion r', 's.religion_id = r.religion_id', 'left');
		$this->db->join('ethnic e', 's.ethnic_id = e.ethnic_id');
		$this->db->where('student_id', $id);
		return $this->db->get()->first_row('array');
	}

	public function updateStatus($params, $student_id) {
		$this->db->where($this->id_name, $student_id);
		$this->db->update($this->table, $params);
	}

	public function getStudentByEmail($email) {
		$this->db->where('email', $email);
		$query = $this->db->get($this->table);
		return $query->first_row('array');
	}

	public function getClass($id) {
		$this->db->select('c.name');
		$this->db->from('student s');
		$this->db->join('class c', 's.class_id = c.class_id');
		$this->db->where('student_id', $id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	public function getReligion($id) {
		$this->db->select('r.name');
		$this->db->from('student s');
		$this->db->join('religion r', 's.religion_id = r.religion_id');
		$this->db->where('student_id', $id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	public function getEthnic($id) {
		$this->db->select('e.name');
		$this->db->from('student s');
		$this->db->join('ethnic e', 's.ethnic_id = e.ethnic_id');
		$this->db->where('student_id', $id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	public function update($id, $params) {
		$this->db->where('student_id', $id);
		$this->db->update($this->table, $params);
	}

	public function getTotalStudents() {
		$query = $this->db->get('student');
		return $query->num_rows();
	}

	public function getTotalStudentsOfBuilding($building_id) {
		$this->db->select('t.student_id');
		$this->db->from('student t');
		$this->db->join('registration rg', 't.student_id = rg.student_id');
		$this->db->join('room r', 'r.room_id = rg.room_id');
		$this->db->where('r.building_id', $building_id);
		return $this->db->get()->num_rows();
	}
}
