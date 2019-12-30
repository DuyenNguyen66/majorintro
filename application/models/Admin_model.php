<?php

class Admin_model extends CI_Model {

	protected $table = 'admin';
	protected $id_name = 'admin_id';

	public function __construct() {
		parent::__construct();
	}

	public function checkAccount($email, $password) {
		$sql = "select * from admin where email = '$email' and password='$password' ";
		$result = $this->db->query($sql);
		if ($result->num_rows() > 0) {
			return $result->result_array()[0];
		} else {
			return null;
		}
	}

	public function checkAccountRegister($email, $password) {
		$sql = "select * from admin where email = '$email'";
		$result = $this->db->query($sql);
		if ($result->num_rows() > 0) {
			return $result->result_array()[0];
		} else {
			return null;
		}
	}


	public function register($params) {
		$this->db->insert($this->table, $params);
	}

	public function getInfo($id) {
		$this->db->select('a.*, as.building_id, b.name as building_name, p.name as position_name');
		$this->db->from('admin a');
		$this->db->join('assignment as', 'a.admin_id = as.admin_id');
		$this->db->join('building b', 'as.building_id = b.building_id');
		$this->db->join('position p', 'a.position_id = p.position_id');
		$this->db->where('a.admin_id', $id);
		$this->db->where('a.position_id <>', 1);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	public function getManagers() {
		$this->db->select('a.*, p.name as position_name, b.name as building_name');
		$this->db->from('admin a');
		$this->db->join('position p', 'a.position_id = p.position_id','left');
		$this->db->join('assignment as', 'a.admin_id = as.admin_id', 'left');
		$this->db->join('building b', 'as.building_id = b.building_id', 'left');
		$this->db->where('group_id', '2');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getPosition() {
		$this->db->where('position_id >', 2);
		$query = $this->db->get('position');
		return $query->result_array();
	}

	public function getManagerOthers() {
		$this->db->select('a.*');
		$this->db->from('admin a');
		// $this->db->join('position p', 'a.position_id = p.position_id', 'left');
		$this->db->where(array('a.group_id' => 2, 'a.status' => 1, 'a.assigned' => 0));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function addManager($params) {
		$this->db->insert($this->table, $params);
	}

	public function checkAssigned($admin_id) {
		$this->db->where('admin_id', $admin_id);
		$query = $this->db->get('assignment');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}else {
			return null;
		}
	}

	public function assignManager($params) {
		$this->db->insert('assignment', $params);
	}

	public function updateAssigned($admin_id, $param) {
		$this->db->where('admin_id', $admin_id);
		$this->db->update($this->table, $param);
	}

	public function updateBuild($admin_id, $params) {
		$this->db->where('admin_id', $admin_id);
		$this->db->update('assignment', $params);
	}

	public function disableManager($id, $params) {
		$this->db->where($this->id_name, $id);
		$this->db->update($this->table, $params);
	}

	public function enableManager($id, $params) {
		$this->db->where($this->id_name, $id);
		$this->db->update($this->table, $params);
	}

	public function deleteManager($id) {
		$this->db->where($this->id_name, $id);
		$this->db->delete($this->table);
	}

	public function getGroupByPosition($position_id) {
		if ($position_id == 1 || $position_id == 2) {
			return 1;
		}else {
			return 2;
		}
	}

	public function getAccountByEmail($email) {
		$this->db->where('email', $email);
		$query = $this->db->get($this->table);
		return $query->first_row('array');
	}

	public function getAccountById($id) {
		$this->db->where($this->id_name, $id);
		$this->db->where('position_id', 1);
		return $this->db->get($this->table)->first_row('array');
	}

	public function getBuildingByManager($id) {
		$this->db->where('admin_id', $id);
		$query = $this->db->get('assignment');
		return $query->first_row('array');
	}

	public function getTotalManagers() {
		$this->db->where('group_id <>', 1);
		return $this->db->get($this->table)->num_rows();
	}
}