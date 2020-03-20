<?php
require_once APPPATH.'/core/Base_Controller.php';

class Editor extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('editor_model');
        $this->load->model('major_model');
        $this->load->model('news_model');
    }
    
    public function index()
    {
        $editor = $this->session->userdata('editor');
        if ($editor == null) {
            redirect(base_url('login'));
        }
        $account = $this->editor_model->getById($editor['editor_id']);
        if($account['status'] == 0) {
            $this->session->set_flashdata('acc_mess', 'Thay đổi mật khẩu để kích hoạt tài khoản');
        }
        $major = $this->major_model->getById($account['major_id']);
//        dashboard
        $total_views = $this->news_model->countTotalViews($major['major_id'])['total'];
        if ($total_views == null) {
            $total_views = 0;
        }
        $published_news = $this->news_model->countPublishedNews($major['major_id'])['total'];
        $pendding_news = $this->news_model->countPendingNews($major['major_id'])['total'];
        $hidden_news = $this->news_model->countHiddenNews($major['major_id'])['total'];
        
        $layoutParams = array(
            'account' => $account,
            'major' => $major,
            'total_views' => $total_views,
            'published_news' => $published_news,
            'pendding_news' => $pendding_news,
            'hidden_news' => $hidden_news
        );
        $content = $this->load->view('editor/dashboard', $layoutParams, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css', 'assets/css/fullcalendar.css', 'assets/css/fullcalendar.print.css');
        $data['customJs'] = array('assets/js/jquery-ui.custom.min.js', 'assets/js/fullcalendar.js', 'assets/js/student.js');
        $data['parent_id'] = 7;
        $data['sub_id'] = 0;
        $data['group'] = 2;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    public function add() //for admin
    {
        $majors = $this->major_model->getMajorWithoutEditor();
        $cmd = $this->input->post("cmd");
        if ($cmd != '') {
            $params['full_name'] = $this->input->post('name');
            $params['email'] = $this->input->post('email');
            $params['password'] = md5($this->input->post('password'));
            $params['phone'] = $this->input->post('phone');

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
            $this->session->set_flashdata('success', 'Sửa tài khoản thành công.');
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
    
    public function getList() //for admin
    {
        $editor = $this->session->userdata('admin');
        if ($editor == null) {
            redirect(base_url('login'));
        }
        $editors = $this->editor_model->getAll();
        $layoutParams = array(
            'editors' => $editors
        );
        $content = $this->load->view('admin/editor_list', $layoutParams, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['customJs'] = array('assets/js/jquery-ui.custom.min.js', 'assets/js/student.js');
        $data['parent_id'] = 2;
        $data['sub_id'] = 22;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    public function getAccount() {
        $editor = $this->session->userdata('editor');
        if ($editor == null) {
            redirect(base_url('login'));
        }
        $editor = $this->editor_model->getById($editor['editor_id']);
        
        $cmd = $this->input->post("cmd");
        if ($cmd != '') {
            $params['full_name'] = $this->input->post('name');
            $params['phone'] = $this->input->post('phone');
            $params['password'] = md5($this->input->post('password'));
            $old_password = md5($this->input->post('old_password'));
            $params['status'] = 1;
            $this->load->model('file_model');
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;
            if ($image != null && $image['error'] == 0) {
                $path = $this->file_model->createFileName($image, 'media/avatar/', 'avatar');
                $this->file_model->saveFile($image, $path);
                $params['avatar'] = $path;
            }
            $check_pass = $this->editor_model->checkPass($editor['editor_id'], $old_password);
            if($check_pass != null) {
                $this->editor_model->updateAccount($editor['editor_id'], $params);
                $this->session->set_userdata('editor', array('email' => $editor['email'], 'editor_id' => $editor['editor_id']));
                redirect('dashboard-e');
            }else {
                $this->session->set_flashdata('check_pass_err', 'Mật khẩu cũ không chính xác');
                redirect('account');
            }
        }
        $layoutParams = array(
            'editor' => $editor,
        );
        $content = $this->load->view('editor/edit_account', $layoutParams, true);
    
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['customJs'] = array('assets/js/settings.js', 'assets/app/search.js');
        $data['parent_id'] = 6;
        $data['sub_id'] = 0;
        $data['group'] = 2;
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