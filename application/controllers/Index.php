<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->model('group_model');
        $this->load->model('major_model');
    }
    
    public function index()
    {
        $news = $this->news_model->getLastNews();
        $layoutParams = array(
            'news' => $news
        );
        $content = $this->load->view('dashboard', $layoutParams, true);
    
        $groups = $this->group_model->getAll();
        foreach ($groups as $key => $item) {
            $groups[$key]['majors'] = $this->major_model->getByGroup($item['group_id']);
        }
        $data = array();
        $data['groups'] = $groups;
        $data['parent_id'] = 1;
        $data['content'] = $content;
        $this->load->view('user_main_layout', $data);
    }
    
    public function getMajor() {
        $group_id = $this->input->get('group_id');
        $majors = $this->major_model->getByGroup($group_id);
        echo json_encode($majors);
    }
    
    public function searchNews() {
        $key = $this->input->get('key');
        if ($key != null) {
            $news = $this->news_model->getNews($key);
            $layoutParams = array(
                'news' => $news
            );
            $content = $this->load->view('dashboard', $layoutParams, true);
            echo json_encode($content);
        }else {
            $news = $this->news_model->getLastNews();
            $layoutParams = array(
                'news' => $news
            );
            $content = $this->load->view('dashboard', $layoutParams, true);
            echo json_encode($content);
        }
    }
}

























