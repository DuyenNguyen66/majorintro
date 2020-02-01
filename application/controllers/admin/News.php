<?php

class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index() { //for editor
	   
    }
    
    public function add() {
	    
        $layoutParams = array(
        
        );
        $content = $this->load->view('editor/add_news', $layoutParams, true);
    
        $data = array();
        $data['customCss'] = array('assets/css/settings.css');
        $data['customJs'] = array('assets/js/settings.js', 'assets/app/search.js');
        $data['parent_id'] = 5;
        $data['sub_id'] = 51;
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
    
    public function enable($news_id) { //chua sua
        $params = array(
            'status' => 1
        );
        $this->news_model->update($news_id, $params);
        redirect('list-news-a');
    }
    
    public function disable($news_id) { //chua sua
        $params = array(
            'status' => 0
        );
        $this->news_model->update($news_id, $params);
        redirect('list-news-a');
    }
}