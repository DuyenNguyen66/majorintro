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
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    
    public function add($params) {
        $this->db->insert($this->table, $params);
    }
    
    public function edit($editor_id, $params) {
        $this->db->where($this->id_name, $editor_id);
        $this->db->update($this->table, $params);
    }
}