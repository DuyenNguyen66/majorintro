<?php

class Report extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('registration_model');
		$this->load->model('admin_model');
		$this->load->model('term_model');
		$this->load->model('report_model');
		$this->load->model('bill_model');
		$this->load->library('phpexcel/classes/phpexcel');
	}

	//auto insert report
	public function index() {
		$admin = $this->session->userdata('admin');
		if ($admin == null) {
			redirect(base_url('login'));
		}
		$admin = $this->admin_model->getAccountByEmail($admin['email']);
		$arr = explode('/', date('d/n/Y', time()));
		if ($arr[0] == 9) {
			$term = $this->term_model->getCurrentTerm();
			$params = array(
				'term_id' => $term['term_id'],
				'month' => $arr[1],
				'total' => 0
			);
			$count = $this->report_model->checkIfExist($arr[1], $term['term_id']);
			if ($count == 0) {
				$this->report_model->create($params);
			}
		}
		$reports = $this->report_model->getAll();
		$layoutParams = array(
			'reports' => $reports
		);
		$content = $this->load->view('admin/report_list', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/settings.js');
		$data['parent_id'] = 9;
		$data['sub_id'] = 0;
		$data['group'] = $admin['position_id'] == 1 || $admin['position_id'] == 2 ? 1 : 2;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function view($report_id) {
		$admin = $this->session->userdata('admin');
		if ($admin == null) {
			redirect(base_url('login'));
		}
		$admin = $this->admin_model->getAccountByEmail($admin['email']);
		$report = $this->report_model->getReportById($report_id);
		$report_detail = $this->report_model->getReportDetail($report_id);
		$layoutParams = array(
			'report' => $report,
			'report_detail' => $report_detail,
		);
		$content = $this->load->view('admin/report_view', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/settings.js');
		$data['parent_id'] = 9;
		$data['sub_id'] = 0;
		$data['group'] = $admin['position_id'] == 1 || $admin['position_id'] == 2 ? 1 : 2;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function getReports() {
		$admin = $this->session->userdata('admin');
		if ($admin == null) {
			redirect(base_url('login'));
		}
		$admin = $this->admin_model->getAccountByEmail($admin['email']);
		$assignment = $this->admin_model->getBuildingByManager($admin['admin_id']);
		$building_id = $assignment['building_id'];
		$arr = explode('/', date('d/n/Y', time()));
		$term = $this->term_model->getCurrentTerm();
		
		$cmd = $this->input->post('cmd');
		if (!empty($cmd)) {
			$report_id = $this->report_model->getReportId($arr[1], $term['term_id'])['report_id'];
			$check = $this->report_model->checkExistReport($report_id, $building_id);
			if ($check != null) {
				$this->session->set_flashdata('error', 'Buiding had reported.');
				$content = $this->load->view('admin/report_list_manager', '', true);
			}else {
				$num_paid = $this->bill_model->getNumPaid($building_id, $arr[1], $term['term_id']);
				$num_not_paid = $this->bill_model->getNumNotPaid($building_id, $arr[1], $term['term_id']);
				$expected_total = $this->bill_model->getExpectedTotal($building_id, $arr[1], $term['term_id'])['expected_total'];
				$actual_total = $this->bill_model->getActualTotal($building_id, $arr[1], $term['term_id'])['actual_total'];
				$created_at = time();
				$created_by = $admin['admin_id'];
				
				$params = array(
					'building_id' => $building_id,
					'report_id' => $report_id,
					'num_paid' => $num_paid,
					'num_not_paid' => $num_not_paid,
					'expected_total' => $expected_total,
					'actual_total' => $actual_total,
					'created_at' => $created_at,
					'created_by' => $created_by
				);
				$this->report_model->createReportDetail($params);
				//update reports table
				$exp_total = $this->report_model->getExpTotal($building_id, $report_id)['expected_total'];
				$act_total = $this->report_model->getActTotal($building_id, $report_id)['actual_total'];
				$updateParams = array(
					'expected_total' => $exp_total,
					'actual_total' => $act_total
				);
				$this->report_model->updateReport($updateParams, $report_id);
				redirect('report-m');
			}
		}
		//get list report
		$reports = $this->report_model->getReportByBuilding($building_id);
		$layoutParams = array(
			'reports' => $reports
		);
		$content = $this->load->view('admin/report_list_manager', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['customJs'] = array('assets/js/settings.js');
		$data['parent_id'] = 19;
		$data['sub_id'] = 0;
		$data['group'] = $admin['position_id'] == 1 || $admin['position_id'] == 2 ? 1 : 2;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}	

	public function export($report_id) {
		$report = $this->report_model->getReportById($report_id);
		$report_details = $this->report_model->getReportDetail($report_id);
		$excel = new PHPExcel();
		$excel->setActiveSheetIndex(0);

		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);

		$excel->getActiveSheet()->setCellValue('A1', 'BUILDING');
		$excel->getActiveSheet()->setCellValue('B1', 'PAID');
		$excel->getActiveSheet()->setCellValue('C1', 'NOT PAID');
		$excel->getActiveSheet()->setCellValue('D1', 'EXPECTED TOTAL');
		$excel->getActiveSheet()->setCellValue('E1', 'ACTUAL TOTAL');
		$excel->getActiveSheet()->setCellValue('F1', 'CREATED AT');
		$excel->getActiveSheet()->setCellValue('G1', 'MANAGER');

		$numRow = 2;
		foreach ($report_details as $row) {
			$excel->getActiveSheet()->setCellValue('A' . $numRow, $row['build_name']);
			$excel->getActiveSheet()->setCellValue('B' . $numRow, $row['num_paid']);
			$excel->getActiveSheet()->setCellValue('C' . $numRow, $row['num_not_paid']);
			$excel->getActiveSheet()->setCellValue('D' . $numRow, $row['expected_total']);
			$excel->getActiveSheet()->setCellValue('E' . $numRow, $row['actual_total']);
			$excel->getActiveSheet()->setCellValue('F' . $numRow, date('d/m/Y h:i A', $row['created_at']));
			$excel->getActiveSheet()->setCellValue('G' . $numRow, $row['full_name']);
			$numRow++;
		}
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="report' . $report['term_name'].$report['month'] . '.xlsx"');
		PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
	}
}