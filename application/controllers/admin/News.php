<?php

class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index() {
	   
    }
    
    public function getNews() {
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
        $params = array(
            'status' => 1
        );
        $this->news_model->update($news_id, $params);
        redirect('list-news-a');
    }
    
    public function disable($news_id) {
        $params = array(
            'status' => 0
        );
        $this->news_model->update($news_id, $params);
        redirect('list-news-a');
    }
}