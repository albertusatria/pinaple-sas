<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/adminlogin_base.php' );

class Admin extends Adminlogin_base {
	// constructor
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_login');
		// page title
		$this->page_title();

	}

	public function index()
	{
		//if user is logged in
		if (!empty($this->user)) {
			redirect('dashboard/admin');
		}
		// form validation
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean|sha1|max_length[50]');

		if ($this->form_validation->run() == TRUE) {
			// if validation run
			if ($query = $this->m_login->login_validation(array($this->input->post('username'), $this->input->post('password')))) {
				//untuk portal admin == 1
				if ($query['portal_id'] == $this->id_portal) {
					// user log history
					$this->m_login->user_log_visit(array($query['user_id'], $_SERVER['REMOTE_ADDR']));
					// session register
					$this->session->set_userdata('session_admin', $query);
					redirect('dashboard/admin');
					
				} else {
					$this->session->set_flashdata('error_message', 'You don\'t have permission to access this portal');
				}
			} else {
				$this->session->set_flashdata('error_message', 'Sorry, we can\'t find your account');
			}
		}

		$data['form_action'] = 'login/admin';
		$data['title'] = 'BU | Pinaple SAS';
		// $data['layout']	= "login/home";
		$this->load->view('adminlogin', $data);

	}

	// logout
	public function logout() {
		// log history
		$this->m_login->user_log_leave(array($this->session->userdata('session_admin')['user_id']));
		// destroy the session
		$this->session->unset_userdata('session_admin');
		redirect('login/admin');
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Admin Login';
		$this->session->set_userdata($data);
	}
}
