<?php

class Major_model extends CI_Model {

	protected $table = 'major';
	protected $id_name = 'major_id';

	public function __construct() {
		parent::__construct();
	}

	public function getAll() {
	    $this->db->select('m.*, mg.group_name');
	    $this->db->from('major m');
	    $this->db->join('major_group mg', 'm.group_id = mg.group_id', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function add($params) {
		$this->db->insert($this->table, $params);
	}

	public function update($id, $params) {
		$this->db->where($this->id_name, $id);
		$this->db->update($this->table, $params);
	}
    
    public function updateByGroup($id, $params) {
        $this->db->where('group_id', $id);
        $this->db->update($this->table, $params);
    }

	public function getById($id) {
	    $this->db->select('m.*, mg.group_id, mg.group_name');
	    $this->db->from('major m');
	    $this->db->join('major_group mg', 'm.group_id = mg.group_id', 'left');
		$this->db->where('m.major_id', $id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	public function checkMajorExist($major_code, $major_name) {
	    $this->db->where('major_code', $major_code);
	    $this->db->where('major_name', $major_name);
	    $query = $this->db->get($this->table);
	    if($query->num_rows() > 0) {
	        return $result = $query->first_row('array');
        }else {
	        return null;
        }
    }
    
    public function getByGroup($group_id) {
	    $this->db->where('group_id', $group_id);
	    $this->db->where('status', 1);
	    $query = $this->db->get($this->table);
	    return $query->result_array();
    }
    
    public function countMajor() {
        $this->db->select('count(major_id) as total');
        $query = $this->db->get($this->table);
        return $query->first_row('array');
    }
    
    public function getMajorWithoutEditor() {
        $sql = 'select * from major where major_id not in (select major_id from editor)';
        $query = $this->db->query($sql);
        return $query->result_array();
    
    }
} 