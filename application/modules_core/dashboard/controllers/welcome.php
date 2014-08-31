<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/admin_base.php' );

class Welcome extends Admin_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_dashboard');
		// page title
		$this->page_title();
	}

	public function index()
	{
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// load template
		$data['active'] = "dashboard";
		$data['layout'] = "dashboard/dashboard";
		$this->load->view('base/admin/template', $data);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Dashboard';
		$this->session->set_userdata($data);
	}
}
