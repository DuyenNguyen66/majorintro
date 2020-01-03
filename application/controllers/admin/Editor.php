<?php
require_once APPPATH . '/core/Base_Controller.php';

class Editor extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('editor_model');
    }
    
    public function index() {
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
    
    public function add() {
    
    }
    
    public function edit() {
    
    }
    
    public function enable($editor_id) {
        $params = array(
            'status' => 1
        );
        $this->editor_model->updateAccount($editor_id, $params);
        redirect('list-editor');
    }
    
    public function disable($editor_id) {
        $params = array(
            'status' => 0
        );
        $this->editor_model->updateAccount($editor_id, $params);
        redirect('list-editor');
    }
}