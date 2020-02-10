<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->model('group_model');
    }
    
    public function index()
    {
        $groups = $this->group_model->getAll();
        $layoutParams = array(
          'groups' => $groups,
        );
        
        $data = array();
        $data['params'] = $layoutParams;
        $this->load->view('user_main_layout', $data);
    }
}