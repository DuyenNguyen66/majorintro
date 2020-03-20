<?php

class Group extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('group_model');
		$this->load->model('major_model');
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
    
    public function enable($group_id) {
        $account = $this->session->userdata('admin');
        if($account == null)
        {
            redirect('login');
        }
        $params = array(
            'status' => 1
        );
        $this->group_model->update($group_id, $params);
        $this->major_model->updateByGroup($group_id, $params);
        redirect('list-group');
    }
    
    public function disable($group_id) {
        $account = $this->session->userdata('admin');
        if($account == null)
        {
            redirect('login');
        }
        $params = array(
            'status' => 0
        );
        $this->group_model->update($group_id, $params);
        $this->major_model->updateByGroup($group_id, $params);
        redirect('list-group');
    }
    
    //For customer
    public function show($group_id) {
	    $group = $this->group_model->getById($group_id);
        $majors = $this->major_model->getByGroup($group_id);
    
        $layoutParams = array(
            'group' => $group,
            'majors' => $majors,
        );
        $content = $this->load->view('customer/majors_list', $layoutParams, true);
    
        $groups = $this->group_model->getAll();
        foreach ($groups as $key => $item) {
            $groups[$key]['majors'] = $this->major_model->getByGroup($item['group_id']);
        }
        $this->mybreadcrumb->add('Trang chủ', base_url());
        $this->mybreadcrumb->add('Ngành ' . $group['group_name'], base_url('nganh-hoc/' . $group_id));
        
        $data = array();
        $data['groups'] = $groups;
        $data['parent_id'] = $group_id;
        $data['title'] = $group['group_name'];
        $data['breadcrumb'] = $group['group_name'];
        $data['content'] = $content;
        $data['breadcrumbs'] = $this->mybreadcrumb->render();
        
        $this->load->view('user_main_layout', $data);
        
    }
}