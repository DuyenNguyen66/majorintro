<?php

class Editor_model extends CI_Model
{
    protected $table = 'editor';
    protected $id_name = 'editor_id';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function checkAccount($email, $password)
    {
        $sql = "select * from editor where email = '$email' and password='$password' and status = 1";
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {
            return $result->result_array()[0];
        } else {
            return null;
        }
    }
    
    public function getAll() {
        $this->db->select('e.*, m.major_name');
        $this->db->from('editor e');
        $this->db->join('major m', 'e.major_id = m.major_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getById($id) {
        $this->db->select('e.*, m.major_name');
        $this->db->from('editor e');
        $this->db->join('major m', 'e.major_id = m.major_id');
        $this->db->where('e.editor_id', $id);
        $query = $this->db->get();
        return $query->result_array()[0];
    }
    
    public function add($params) {
        $this->db->insert($this->table, $params);
    }
    
    public function updateAccount($editor_id, $params) {
        $this->db->where($this->id_name, $editor_id);
        $this->db->update($this->table, $params);
    }
    
    public function checkAccountRegister($email, $password) {
        $sql = "select * from editor where email = '$email'";
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {
            return $result->result_array()[0];
        } else {
            return null;
        }
    }
    
}