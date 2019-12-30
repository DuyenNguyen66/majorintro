<?php

class Bill_model extends CI_model
{
	protected $table = 'bill';

	public function __construct() {
		parent::__construct();
	}

	public function getAll($building_id, $bill_type) {
		$this->db->select('bi.*, r.name as room_name, t.name as term_name');
		$this->db->from('bill bi');
		$this->db->join('room r', 'r.room_id = bi.room_id');
		$this->db->join('term t', 'bi.term_id = t.term_id');
		$this->db->where(array('r.building_id' => $building_id, 'bi.bill_type' => $bill_type));
		$this->db->order_by('bi.bill_id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getBill($params) {
		$this->db->where('bill_type', $params['bill_type']);
		$this->db->where('room_id', $params['room_id']);
		$this->db->where('month', $params['month']);
		$this->db->where('term_id', $params['term_id']);
		$query = $this->db->get($this->table);
		return $query->first_row('array');
	}

	public function getRooms($building_id) {
		$this->db->select('r.*');
		$this->db->from('room r');
		$this->db->join('registration rg', 'r.room_id = rg.room_id');
		$this->db->where('r.building_id', $building_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function addBill($params) {
		$this->db->insert($this->table, $params);
		return $this->db->insert_id();
	}

	public function addBillPay($params) {
		$this->db->insert('bill_pay', $params);
	}

	public function getBillType($bill_id) {
		$this->db->select('bill_type');
		$this->db->from('bill');
		$this->db->where('bill_id', $bill_id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	public function updatePaid($params, $bill_id) {
		$this->db->where('bill_id', $bill_id);
		$this->db->update($this->table, $params);
	}

	public function disable($bill_id) {
		$this->db->where('bill_id',$bill_id);
		$this->db->set('status', 0);
		$this->db->update($this->table);
	}

	public function getRoomBill($building_id) {
		$this->db->select('rp.*, r.name as room_name, t.name as term_name');
		$this->db->from('room_pay rp');
		$this->db->join('term t', 'rp.term_id = t.term_id');
		$this->db->join('room r', 'rp.room_id = r.room_id');
		$this->db->where('r.building_id', $building_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function addRoomBill($params) {
		$this->db->insert('room_pay', $params);
	}

	public function updatePaidRoom($params, $id) {
		$this->db->where('id', $id);
		$this->db->update('room_pay', $params);
	}

	public function disableRoomPay($id) {
		$this->db->where('id',$id);
		$this->db->set('status', 0);
		$this->db->update('room_pay');
	}

	public function getBillForStudent($term_id, $room_id, $bill_type) {
		$this->db->where('term_id', $term_id);
		$this->db->where('room_id', $room_id);
		$this->db->where('bill_type', $bill_type);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function getRoomBillForStudent($room_id) {
		$this->db->select('rp.*, t.name as term_name');
		$this->db->from('room_pay rp');
		$this->db->join('term t', 'rp.term_id = t.term_id');
		$this->db->where('room_id', $room_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getRoomBillById($id) {
		$this->db->select('rp.*, r.name as room_name, b.name as build_name, t.name as term_name');
		$this->db->from('room_pay rp');
		$this->db->join('room r', 'rp.room_id = r.room_id');
		$this->db->join('building b', 'r.building_id = b.building_id');
		$this->db->join('term t', 'rp.term_id = t.term_id');
		$this->db->where('rp.id', $id);
		$query = $this->db->get();
		return $query->first_row('array');
	}

	public function checkBillExist($bill_type, $room_id, $month, $term_id) {
		$this->db->where('bill_type', $bill_type);
		$this->db->where('room_id', $room_id);
		$this->db->where('month', $month);
		$this->db->where('term_id', $term_id);
		return $this->db->get($this->table)->num_rows();
	}

	public function getBillById($id) {
		$this->db->select('b.*, r.name as room_name, bu.name as build_name, t.name as term_name, count(rg.student_id) as total_student');
		$this->db->from('bill b');
		$this->db->join('room r', 'b.room_id = r.room_id');
		$this->db->join('term t', 'b.term_id = t.term_id');
		$this->db->join('building bu', 'r.building_id = bu.building_id');
		$this->db->join('registration rg', 'rg.room_id = r.room_id');
		$this->db->where('bill_id', $id);
		$this->db->group_by('rg.room_id');
		return $this->db->get()->first_row('array');
	}

	public function getTotalBillNotPaid($building_id) {
		$this->db->from('bill b');
		$this->db->join('room r', 'b.room_id = r.room_id');
		$this->db->where('r.building_id', $building_id);
		$this->db->where('b.paid', null);
		return $this->db->get()->num_rows();
	}

	public function getNumPaid($building_id, $month, $term_id) {
		$this->db->select('b.bill_id');
		$this->db->from('bill b');
		$this->db->join('room r', 'b.room_id = r.room_id');
		$this->db->where('r.building_id', $building_id);
		$this->db->where('b.month', $month);
		$this->db->where('b.term_id', $term_id);
		$this->db->where('b.paid <>', null);
		return $this->db->get()->num_rows();
	}

	public function getNumNotPaid($building_id, $month, $term_id) {
		$this->db->select('b.bill_id');
		$this->db->from('bill b');
		$this->db->join('room r', 'b.room_id = r.room_id');
		$this->db->where('r.building_id', $building_id);
		$this->db->where('b.month', $month);
		$this->db->where('b.term_id', $term_id);
		$this->db->where('b.paid', null);
		return $this->db->get()->num_rows();
	}

	public function getExpectedTotal($building_id, $month, $term_id) {
		$this->db->select('sum(b.total_pay) as expected_total');
		$this->db->from('bill b');
		$this->db->join('room r', 'b.room_id = r.room_id');
		$this->db->where('r.building_id', $building_id);
		$this->db->where('b.month', $month);
		$this->db->where('b.term_id', $term_id);
		return $this->db->get()->first_row('array');
	}

	public function getActualTotal($building_id, $month, $term_id) {
		$this->db->select('sum(b.total_pay) as actual_total');
		$this->db->from('bill b');
		$this->db->join('room r', 'b.room_id = r.room_id');
		$this->db->where('r.building_id', $building_id);
		$this->db->where('b.month', $month);
		$this->db->where('b.term_id', $term_id);
		$this->db->where('b.paid <>', null);
		return $this->db->get()->first_row('array');
	}
}