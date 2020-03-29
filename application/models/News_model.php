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
	    $this->db->select('*');
	    $this->db->from('news n');
	    $this->db->join('major m', 'n.major_id = m.major_id');
	    $this->db->join('major_group mg', 'm.group_id = mg.group_id');
	    $this->db->where('n.news_id', $id);
	    $query = $this->db->get();
	    return $query->first_row('array');
    }
    
    public function getLastNews() {
	    $this->db->select('n.*, m.major_name');
	    $this->db->from('news n');
	    $this->db->join('major m', 'n.major_id = m.major_id');
	    $this->db->where('n.status', 2);
	    $this->db->where('m.status', 1);
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getNews($key) {
        $this->db->from('news n');
        $this->db->join('major m', 'n.major_id = m.major_id');
        $this->db->where('n.title like "%' . $key . '%"');
        $this->db->where('n.status', 2);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getByMajor($major_id, $key) {
	    $this->db->where('major_id', $major_id);
	    if($key != '') {
	        $this->db->where('title like "%' .$key . '%"');
        }
        $this->db->where('status', 2);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    
    public function getByMajorPagination($major_id, $key, $start, $limit) {
        $this->db->where('major_id', $major_id);
        if($key != '') {
            $this->db->where('title like "%' .$key . '%"');
        }
        $this->db->where('status', 2);
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    
    public function countView($news_id) {
	    $this->db->set('view', 'view + 1', false);
	    $this->db->where($this->id_name, $news_id);
	    $this->db->update($this->table);
    }
    
    public function countTotalViews($major_id) {
	   $this->db->select('sum(view) as total');
	   $this->db->where('major_id', $major_id);
	   $query = $this->db->get($this->table);
	   return $query->first_row('array');
    }
    
    public function countPublishedNews($major_id) {
        $this->db->select('count(news_id) as total');
        $this->db->where('major_id', $major_id);
        $this->db->where('status', 2);
        $query = $this->db->get($this->table);
        return $query->first_row('array');
    }
    
    public function countPendingNews($major_id) {
        $this->db->select('count(news_id) as total');
        $this->db->where('major_id', $major_id);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);
        return $query->first_row('array');
    }
    
    public function countHiddenNews($major_id) {
        $this->db->select('count(news_id) as total');
        $this->db->where('major_id', $major_id);
        $this->db->where('status', 0);
        $query = $this->db->get($this->table);
        return $query->first_row('array');
    }
    
    public function countPublishedNewsForAd() {
        $this->db->select('count(news_id) as total');
        $this->db->where('status', 2);
        $query = $this->db->get($this->table);
        return $query->first_row('array');
    }
    
    public function countPendingNewsForAd() {
        $this->db->select('count(news_id) as total');
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);
        return $query->first_row('array');
    }
    
    public function countHiddenNewsForAd() {
        $this->db->select('count(news_id) as total');
        $this->db->where('status', 0);
        $query = $this->db->get($this->table);
        return $query->first_row('array');
    }

}