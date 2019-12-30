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
}