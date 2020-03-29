<?php

class Group_model extends CI_model
{
    protected $table = 'major_group';
    protected $id_name = 'group_id';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAll()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    
    public function getById($id) {
        $this->db->where($this->id_name, $id);
        $query = $this->db->get($this->table);
        return $result = $query->first_row('array');
    }
    
    public function checkGroupExist($group_code, $group_name) {
        $this->db->where('group_code', $group_code);
        $this->db->where('group_name', $group_name);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0) {
            return $result = $query->first_row('array');
        }else {
            return null;
        }
    }
    
    public function add($params) {
        $this->db->insert($this->table, $params);
    }
    
    public function update($id, $params) {
        $this->db->where($this->id_name, $id);
        $this->db->update($this->table, $params);
    }
    
    public function getActiveGroup() {
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    
    public function countGroup() {
        $this->db->select('count(group_id) as total');
        $query = $this->db->get($this->table);
        return $query->first_row('array');
    }
}