<?php

class Report_model extends CI_Model {

	protected $table = 'reports';
	protected $id_name = 'report_id';

	public function __construct() {
		parent::__construct();
	}

	public function create($params) {
		$this->db->insert($this->table, $params);
	}

	public function getAll() {
		$this->db->select('r.*, t.name as term_name');
		$this->db->from('reports r');
		$this->db->join('term t', 'r.term_id = t.term_id');
		return $this->db->get()->result_array();
	}

	public function checkIfExist($month, $term_id) {
		$this->db->where('month', $month);
		$this->db->where('term_id', $term_id);
		return $this->db->get($this->table)->num_rows();
	}

	public function getReportById($report_id) {
		$this->db->select('r.*, t.name as term_name');
		$this->db->from('reports r');
		$this->db->join('term t', 'r.term_id = t.term_id');
		$this->db->where('r.report_id', $report_id);
		return $this->db->get()->first_row('array');
	}

	public function getReportId($month, $term_id) {
		$this->db->select('report_id');
		$this->db->where('month', $month);
		$this->db->where('term_id', $term_id);
		return $this->db->get($this->table)->first_row('array');
	}

	public function getReportByBuilding($building_id) {
		$this->db->select('r.*, rd.*, t.name as term_name');
		$this->db->from('reports r');
		$this->db->join('report_detail rd', 'r.report_id = rd.report_id');
		$this->db->join('term t', 'r.term_id = t.term_id');
		$this->db->where('building_id', $building_id);
		return $this->db->get()->result_array();
	}

	public function createReportDetail($params) {
		$this->db->insert('report_detail', $params);
	}

	public function checkExistReport($report_id, $building_id) {
		$this->db->where('report_id', $report_id);
		$this->db->where('building_id', $building_id);
		return $this->db->get('report_detail')->result_array();
	}

	public function getExpTotal($building_id, $report_id) {
		$this->db->select('sum(expected_total) as expected_total');
		$this->db->where('report_id', $report_id);
		return $this->db->get('report_detail')->first_row('array');
	}

	public function getActTotal($building_id, $report_id) {
		$this->db->select('sum(actual_total) as actual_total');
		$this->db->where('report_id', $report_id);
		return $this->db->get('report_detail')->first_row('array');
	}

	public function updateReport($params, $report_id) {
		$this->db->where('report_id', $report_id);
		$this->db->update($this->table, $params);
	}

	public function getReportDetail($report_id) {
		$this->db->select('rd.*, b.name as build_name, a.full_name');
		$this->db->from('reports r');
		$this->db->join('report_detail rd', 'r.report_id = rd.report_id');
		$this->db->join('building b', 'rd.building_id = b.building_id');
		$this->db->join('admin a', 'rd.created_by = a.admin_id');
		$this->db->where('rd.report_id', $report_id);
		return $this->db->get()->result_array();
	}
}