<?php

class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('editor_model');
		$this->load->model('group_model');
		$this->load->model('major_model');
	}

	public function index() { //for editor
        $editor = $this->session->userdata('editor');
        if($editor == null)
        {
            redirect('login');
        }
        $news = $this->news_model->getNewsByEditor($editor['editor_id']);
        $layoutParams = array(
            'news' => $news
        );
        $content = $this->load->view('editor/news_list', $layoutParams, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['parent_id'] = 5;
        $data['sub_id'] = 52;
        $data['group'] = 2;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    public function add()
    {
        $editor = $this->session->userdata('editor');
        if($editor == null)
        {
            redirect('login');
        }
        $cmd = $this->input->post("cmd");
        if ($cmd != '') {
            $params['title'] = $this->input->post('title');
            $params['slug'] = $this->input->post('slug');
            $params['description'] = $this->input->post('description');
            $this->load->model('file_model');
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;
            if ($image != null && $image['error'] == 0) {
                $path = $this->file_model->createFileName($image, 'media/news/', 'news');
                $this->file_model->saveFile($image, $path);
                $params['image'] = $path;
            }
            $params['content'] = $this->input->post('content');
            $params['created_at'] = time();
            $params['status'] = 1;
            $params['major_id'] = $this->editor_model->getById($editor['editor_id'])['major_id'];
            $params['editor_id'] = $editor['editor_id'];
            
            $this->news_model->add($params);
            redirect('list-news');
        }
    
        $layoutParams = array();
        $content = $this->load->view('editor/add_news', $layoutParams, true);
    
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['customJs'] = array( 'assets/js/settings.js');
        $data['parent_id'] = 5;
        $data['sub_id'] = 51;
        $data['group'] = 2;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    public function edit($news_id)
    {
        $editor = $this->session->userdata('editor');
        if($editor == null)
        {
            redirect('login');
        }
        $news = $this->news_model->getById($news_id);
        $cmd = $this->input->post("cmd");
        if ($cmd != '') {
            $params['title'] = $this->input->post('title');
            $params['slug'] = $this->input->post('slug');
            $params['description'] = $this->input->post('description');
            $this->load->model('file_model');
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;
            if ($image != null && $image['error'] == 0) {
                $path = $this->file_model->createFileName($image, 'media/news/', 'news');
                $this->file_model->saveFile($image, $path);
                $params['image'] = $path;
            }
            $params['content'] = $this->input->post('content');
            
            $this->news_model->update($news_id, $params);
            redirect('list-news');
        }
        
        $layoutParams = array(
            'news' => $news
        );
        $content = $this->load->view('editor/edit_news', $layoutParams, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['customJs'] = array( 'assets/js/settings.js');
        $data['parent_id'] = 5;
        $data['sub_id'] = 52;
        $data['group'] = 2;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    public function getNews() { //for admin - done
        $account = $this->session->userdata('admin');
        if($account == null)
        {
            redirect('login');
        }
        $news = $this->news_model->getAll();
        $layoutParams = array(
            'news' => $news
        );
        $content = $this->load->view('admin/news_list', $layoutParams, true);
    
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['parent_id'] = 3;
        $data['sub_id'] = 0;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    public function enable($news_id) {
        if($this->session->has_userdata('admin'))
        {
            $params = array(
                'status' => 2
            );
            $this->news_model->update($news_id, $params);
            redirect('list-news-a');
        }else {
            $params = array(
                'status' => 1
            );
            $this->news_model->update($news_id, $params);
            redirect('list-news');
        }
    }
    
    public function disable($news_id) {
        $params = array(
            'status' => 0
        );
        $this->news_model->update($news_id, $params);
        if($this->session->has_userdata('admin'))
        {
            redirect('list-news-a');
        }else {
            redirect('list-news');
        }
    }
    
    public function view($news_id) {
        $editor = $this->session->userdata('admin');
        if($editor == null)
        {
            redirect('login');
        }
        $news = $this->news_model->getById($news_id);
        $cmd = $this->input->post('cmd');
        if($cmd != '') {
            $params = array(
                'status' => 2
            );
            $this->news_model->update($news_id, $params);
            redirect('list-news-a');
        }
        $layoutParams = array(
            'news' => $news
        );
        $content = $this->load->view('admin/view_news', $layoutParams, true);
    
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['customJs'] = array( 'assets/js/settings.js');
        $data['parent_id'] = 3;
        $data['sub_id'] = 0;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }
    
    //For customer
    public function detail($news_id) {
        $news = $this->news_model->getById($news_id);
        $this->countViews($news_id);
        $layoutParams = array(
            'news' => $news,
        );
        $content = $this->load->view('customer/news_detail', $layoutParams, true);
    
        $groups = $this->group_model->getAll();
        foreach ($groups as $key => $item) {
            $groups[$key]['majors'] = $this->major_model->getByGroup($item['group_id']);
        }
        $this->mybreadcrumb->add('Trang chủ', base_url());
        $this->mybreadcrumb->add('Ngành ' . $news['group_name'], base_url('nganh-hoc/' . $news['group_id']));
        $this->mybreadcrumb->add($news['major_name'], base_url('chuyen-nganh/' . $news['major_id']));
        $this->mybreadcrumb->add($news['title'], base_url());
    
        $data = array();
        $data['groups'] = $groups;
        $data['parent_id'] = $news['group_id'];
        $data['title'] = $news['title'];
        $data['breadcrumb'] = $news['title'];
        $data['content'] = $content;
        $data['breadcrumbs'] = $this->mybreadcrumb->render();
    
        $this->load->view('user_main_layout', $data);
    }
    
    public function countViews($news_id)
    {
        if ($this->session->has_userdata('news_'.$news_id)) {
            echo 111;
        }else {
            $this->session->set_userdata('news_'.$news_id, 1);
            $this->news_model->countView($news_id);
        }
    }
}