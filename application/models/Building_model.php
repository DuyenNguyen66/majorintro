<?php

class Building_model extends CI_Model {

	protected $table = 'building';
	protected $id_name = 'building_id';

	public function __construct() {
		parent::__construct();
	}

	public function getAll() {
		$sql = 'select s1.*, count(r.room_id) as total_room 
				from (select b.*, count(f.floor_id) as total_floor 
						from building as b
						left join floor as f on b.building_id = f.building_id
						group by b.building_id) s1
				left join room as r on s1.building_id = r.building_id
				group by s1.building_id';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function add($params) {
		$this->db->insert($this->table, $params);
	}

	public function edit($id, $params) {
		$this->db->where($this->id_name, $id);
		$this->db->update($this->table, $params);
	}

	public function getById($id) {
		$this->db->where($this->id_name, $id);
		$query = $this->db->get($this->table);
		return $query->first_row('array');
	}

	public function countRoom($building_id) {
		$this->db->select('r.*');
		$this->db->from('building b');
		$this->db->join('room r', 'b.building_id = r.building_id');
		$this->db->where('b.building_id', $building_id);
		$this->db->where('r.status', 1);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getProfile($building_id) {
		$sql = 'select s1.*, count(r.room_id) as total_room 
				from (select b.*, count(f.floor_id) as total_floor 
						from building as b
						left join floor as f on b.building_id = f.building_id
						where b.building_id = '.$building_id.'
						group by b.building_id) s1
				left join room as r on s1.building_id = r.building_id
				group by s1.building_id';
		$query = $this->db->query($sql);
		return $query->first_row('array');
	}

	public function getTotalBuilds() {
		return $this->db->get($this->table)->num_rows();
	}
} 