<?php
require_once APPPATH . '/core/Base_Controller.php';

class Index extends Base_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');		
		$this->load->model('editor_model');
		
		$this->load->model('major_model');
		$this->load->model('group_model');
		$this->load->model('news_model');
	}
	
//admin controller
	public function index() {
		$admin = $this->session->userdata('admin');
		if ($admin == null) {
			redirect(base_url('login'));
		}
		$admin = $this->admin_model->getAccountByEmail($admin['email']);
		
		$params = array(
			'admin' => $admin
		);
		$content = $this->load->view('admin/dashboard', $params, true);

		$data = array();
		$data['customCss'] = array('assets/css/settings.css', 'assets/css/fullcalendar.css', 'assets/css/fullcalendar.print.css');
		$data['customJs'] = array('assets/js/jquery-ui.custom.min.js', 'assets/js/fullcalendar.js', 'assets/js/student.js');
		$data['parent_id'] = 1;
		$data['sub_id'] = 0;
		$data['group'] = 1;
		$data['content'] = $content;
		$this->load->view('admin_main_layout', $data);
	}

	public function login() {
		$admin = $this->session->userdata('admin');
		if ($admin != null) {
			redirect(base_url('dashboard-a'));
		}

		$cmd = $this->input->post("cmd");
		if ($cmd != '') {
			$email = $this->input->post("email");
			$password = md5($this->input->post("password"));
			$admin_account = $this->admin_model->checkAccount($email, $password);
			if ($admin_account != null) {
                $this->session->set_userdata('admin', array('email' => $admin_account['email'], 'admin_id' => $admin_account['admin_id']));
                $this->redirect('dashboard-a');
			} else {
                $editor_account = $this->editor_model->checkAccount($email, $password);
                if($editor_account != null) {
                    $this->session->set_userdata('editor', array('email' => $editor_account['email'], 'editor_id' => $editor_account['editor_id']));
                    $this->redirect('dashboard-e');
                } else {
                    $this->load->view('admin/login', array('error' => 'Account does not existt.'));
                }
			}
		} else {
			$this->load->view('admin/login');
		}
	}
	
	public function logout() {
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('editor');
		redirect(base_url('login'));
	}

	public function register() {
		$cmd = $this->input->post("cmd");
		if ($cmd != '') {
			$params['full_name'] = $this->input->post('name');
			$params['email'] = $this->input->post('email');
			$params['password'] = md5($this->input->post('password')); 
			$this->load->model('file_model');
			$image = isset($_FILES['image']) ? $_FILES['image'] : null;
			if ($image != null && $image['error'] == 0) {
				$path = $this->file_model->createFileName($image, 'media/avatar/', 'avatar');
				$this->file_model->saveFile($image, $path);
				$params['avatar'] = $path;
			}
			$params['created_at'] = time();

			$account = $this->admin_model->checkAccountRegister($params['email'], $params['password']);
			if ($account != null) {
				$this->session->set_flashdata('error', 'Account already exists.'); 
				redirect('register');
			}else {
				$this->admin_model->register($params);
				$this->session->set_flashdata('success', 'Register successful.');
				redirect('login');
			}
		} 
		$this->load->view('admin/register');
	}
	
	public function stats() {
        $admin = $this->session->userdata('admin');
        if ($admin == null) {
            redirect(base_url('login'));
        }
        $total_editors = $this->editor_model->countEditor()['total'];
        $published_news = $this->news_model->countPublishedNewsForAd()['total'];
        $pendding_news = $this->news_model->countPendingNewsForAd()['total'];
        $hidden_news = $this->news_model->countHiddenNewsForAd()['total'];
        $total_groups = $this->group_model->countGroup()['total'];
        $total_majors =  $this->major_model->countMajor()['total'];
        
        $params = array(
            'total_editors' => $total_editors,
            'published_news' => $published_news,
            'pendding_news' => $pendding_news,
            'hidden_news' => $hidden_news,
            'total_groups' => $total_groups,
            'total_majors' => $total_majors
        );
        $content = $this->load->view('admin/stats', $params, true);
        
        $data = array();
        $data['customCss'] = array('assets/css/settings.css', 'assets/css/fullcalendar.css', 'assets/css/fullcalendar.print.css');
        $data['customJs'] = array('assets/js/jquery-ui.custom.min.js', 'assets/js/fullcalendar.js', 'assets/js/student.js');
        $data['parent_id'] = 6;
        $data['sub_id'] = 0;
        $data['group'] = 1;
        $data['content'] = $content;
        $this->load->view('admin_main_layout', $data);
    }

}