<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->model('group_model');
    }
    
    public function index()
    {
        $news = $this->news_model->getLastNews();
        
        $groups = $this->group_model->getAll();
        
        $layoutParams = array(
            'groups' => $groups,
            'news' => $news
        );
        $content = $this->load->view('dashboard', $layoutParams, true);
        
        $data = array();
        $data['parent_id'] = 1;
        $data['content'] = $content;
        $this->load->view('user_main_layout', $data);
    }
}