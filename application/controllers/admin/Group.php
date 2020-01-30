<?php

class Group extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('group_model');
		
	}

	public function index() {
        $account = $this->session->userdata('admin');
        if($account == null)
        {
            redirect('login');
        }
        $major_group = $this->group_model->getAll();
        $layoutParams = array(
            'major_group' => $major_group
        );
        $content = $this->load->view('admin/group_list', $layoutParams, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['parent_id'] = 4;
        $data['sub_id'] = 42;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    public function add() {
        $cmd = $this->input->post("cmd");
        if ($cmd != '') {
            $params['group_code'] = $this->input->post('group_code');
            $params['group_name'] = $this->input->post('group_name');
            $params['status'] = 1;
        
            $check = $this->group_model->checkGroupExist($params['group_code'], $params['group_name']);
            if ($check != null) {
                $this->session->set_flashdata('error', 'Tên ngành đã tồn tại.');
                redirect('edit-group');
            }else {
                $this->group_model->add($params);
                $this->session->set_flashdata('success', 'Thêm thành công.');
                redirect('list-group');
            }
        }
        $layoutParams = array(
            'major_group' => 1
        );
        $content = $this->load->view('admin/add_group', $layoutParams, true);
    
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['parent_id'] = 4;
        $data['sub_id'] = 41;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    public function edit($group_id) {
	    $group = $this->group_model->getById($group_id);
	    
        $cmd = $this->input->post("cmd");
        if ($cmd != '') {
            $params['group_code'] = $this->input->post('group_code');
            $params['group_name'] = $this->input->post('group_name');
            $params['status'] = 1;
            
            $check = $this->group_model->checkGroupExist($params['group_code'], $params['group_name']);
            if ($check != null) {
                $this->session->set_flashdata('error', 'Tên ngành đã tồn tại.');
                redirect('edit-group');
            }else {
                $this->group_model->update($group_id, $params);
                $this->session->set_flashdata('success', 'Thêm thành công.');
                redirect('list-group');
            }
        }
        $layoutParams = array(
            'group' => $group
        );
        $content = $this->load->view('admin/edit_group', $layoutParams, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['parent_id'] = 4;
        $data['sub_id'] = 42;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
}