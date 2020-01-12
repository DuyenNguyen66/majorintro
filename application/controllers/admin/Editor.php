<?php
require_once APPPATH.'/core/Base_Controller.php';

class Editor extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('editor_model');
        $this->load->model('major_model');
    }
    
    public function index()
    {
        $admin = $this->session->userdata('admin');
        if ($admin == null) {
            redirect(base_url('login'));
        }
        $editors = $this->editor_model->getAll();
        $layoutParams = array(
            'editors' => $editors
        );
        $content = $this->load->view('admin/editor_list', $layoutParams, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['customJs'] = array('assets/js/settings.js', 'assets/app/search.js');
        $data['parent_id'] = 2;
        $data['sub_id'] = 22;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    public function add()
    {
        $majors = $this->major_model->getAll();
        
        $cmd = $this->input->post("cmd");
        if ($cmd != '') {
            $params['full_name'] = $this->input->post('name');
            $params['email'] = $this->input->post('email');
            $params['password'] = md5($this->input->post('password'));
            $params['phone'] = $this->input->post('phone');
            $this->load->model('file_model');
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;
            if ($image != null && $image['error'] == 0) {
                $path = $this->file_model->createFileName($image, 'media/avatar/', 'avatar');
                $this->file_model->saveFile($image, $path);
                $params['avatar'] = $path;
            }
            $params['major_id'] = $this->input->post('major_id');
            $params['created_at'] = time();
            
            $account = $this->editor_model->checkAccountRegister($params['email'], $params['password']);
            if ($account != null) {
                $this->session->set_flashdata('error', 'Tài khoản đã tồn tại.');
                redirect('add-editor');
            } else {
                $this->editor_model->add($params);
                $this->session->set_flashdata('success', 'Tạo tài khoản thành công.');
                redirect('list-editor');
            }
        }
        $layoutParams = array(
            'majors' => $majors
        );
        $content = $this->load->view('admin/add_editor', $layoutParams, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['customJs'] = array('assets/js/settings.js', 'assets/app/search.js');
        $data['parent_id'] = 2;
        $data['sub_id'] = 21;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    public function edit($editor_id)
    {
        $editor = $this->editor_model->getById($editor_id);
        $majors = $this->major_model->getAll();
        
        $cmd = $this->input->post("cmd");
        if ($cmd != '') {
            $params['full_name'] = $this->input->post('name');
            $params['email'] = $this->input->post('email');
            $params['major_id'] = $this->input->post('major_id');
            $params['phone'] = $this->input->post('phone');
            
            $this->editor_model->updateAccount($editor_id, $params);
            $this->session->set_flashdata('success', 'Tạo tài khoản thành công.');
            redirect('list-editor');
        }
        $layoutParams = array(
            'editor' => $editor,
            'majors' => $majors
        );
        $content = $this->load->view('admin/edit_editor', $layoutParams, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['customJs'] = array('assets/js/settings.js', 'assets/app/search.js');
        $data['parent_id'] = 2;
        $data['sub_id'] = 22;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    public function enable($editor_id)
    {
        $params = array(
            'status' => 1
        );
        $this->editor_model->updateAccount($editor_id, $params);
        redirect('list-editor');
    }
    
    public function disable($editor_id)
    {
        $params = array(
            'status' => 0
        );
        $this->editor_model->updateAccount($editor_id, $params);
        redirect('list-editor');
    }
}