<?php

class Term_model extends CI_Model {

	protected $table = 'term';

	public function __construct() {
		parent::__construct();
	}

	public function getCurrentTerm() {
		
		$this->db->order_by('term_id', 'desc');
		$query = $this->db->get($this->table);
		return $query->first_row('array');
	}

	public function add($params) {
		$this->db->insert($this->table, $params);
	}

	public function checkTerm($term) {
		$this->db->where('name', $term);
		$query = $this->db->get($this->table);
		if($query->num_rows() == 0)
		{
			return null;
		}else
		{
			return $query->result_array()[0];
		}
	}
} 