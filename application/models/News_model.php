<?php

class News_model extends CI_Model {

	protected $table = 'news';
	protected $id_name = 'news_id';

	public function __construct() {
		parent::__construct();
	}

	public function getAll() {
	    $this->db->select('n.*, m.major_name, e.full_name');
	    $this->db->from('news n');
	    $this->db->join('major m', 'n.major_id = m.major_id');
	    $this->db->join('editor e', 'n.editor_id = e.editor_id');
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
	
	public function getNewsByEditor($editor_id) {
	    $this->db->where('editor_id', $editor_id);
	    $query = $this->db->get($this->table);
	    return $query->result_array();
    }
    
    public function getById($id) {
	    $this->db->where($this->id_name, $id);
	    $query = $this->db->get($this->table);
	    return $query->first_row('array');
    }
    
    public function getLastNews() {
	    $this->db->select('n.*, m.major_name');
	    $this->db->from('news n');
	    $this->db->join('major m', 'n.major_id = m.major_id');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getNews($key) {
        $this->db->from('news n');
        $this->db->join('major m', 'n.major_id = m.major_id');
        $this->db->where('n.title like "%' . $key . '%"');
        $query = $this->db->get();
        return $query->result_array();
    }

}