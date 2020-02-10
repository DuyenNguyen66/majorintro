<?php

class Major extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('major_model');
		$this->load->model('group_model');
	}

	public function index() {
		$account = $this->session->userdata('admin');
		if($account == null)
		{
			redirect('login');
		}
		$majors = $this->major_model->getAll();
		$layoutParams = array(
			'majors' => $majors
		);
		$content = $this->load->view('admin/major_list', $layoutParams, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css');
		$data['parent_id'] = 5;
		$data['sub_id'] = 52;
		$data['group'] = 1;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}
    
    public function add() {
        $groups = $this->group_model->getAll();
        
        $cmd = $this->input->post("cmd");
        if ($cmd != '') {
            $params['major_code'] = $this->input->post('major_code');
            $params['major_name'] = $this->input->post('major_name');
            $params['group_id'] = $this->input->post('group_id');
            $params['training_time'] = $this->input->post('training_time');
            $params['degree'] = $this->input->post('degree');
            $params['status'] = 1;
            
            $check = $this->major_model->checkMajorExist($params['major_code'], $params['major_name']);
            if ($check != null) {
                $this->session->set_flashdata('error', 'Tên ngành đã tồn tại.');
                redirect('edit-major');
            }else {
                $this->major_model->add($params);
                $this->session->set_flashdata('success', 'Thêm thành công.');
                redirect('list-major');
            }
        }
        $layoutParams = array (
            'groups' => $groups
        );
        $content = $this->load->view('admin/add_major', $layoutParams, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['customJs'] = array('assets/js/settings.js', 'assets/app/search.js');
        $data['parent_id'] = 5;
        $data['sub_id'] = 51;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    public function edit($major_id) {
        $major = $this->major_model->getById($major_id);
        $groups = $this->group_model->getAll();
        
        $cmd = $this->input->post("cmd");
        if ($cmd != '') {
            $params['major_code'] = $this->input->post('major_code');
            $params['major_name'] = $this->input->post('major_name');
            $params['group_id'] = $this->input->post('group_id');
            $params['training_time'] = (float)$this->input->post('training_time');
            $params['degree'] = $this->input->post('degree');
            $params['status'] = 1;
    
            $this->major_model->update($major_id, $params);
            $this->session->set_flashdata('success', 'Sửa thành công.');
            redirect('list-major');
        }
        $layoutParams = array (
            'major' => $major,
            'groups' => $groups
        );
        $content = $this->load->view('admin/edit_major', $layoutParams, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['customJs'] = array('assets/js/settings.js', 'assets/app/search.js');
        $data['parent_id'] = 5;
        $data['sub_id'] = 52;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }

}
