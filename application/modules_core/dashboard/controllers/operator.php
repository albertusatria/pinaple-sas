<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Operator extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		//$this->load->model('m_dashboard');
		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "dashboard";
		$active['child_active'] = "dashboard";
		$this->session->set_userdata($active);	

	}

	public function index()
	{
		// user_auth
		$this->check_auth('R');

		$data['message'] = $this->session->flashdata('message');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;

		// load template
		$data['layout'] = 'operator/dashboard';
		$data['javascript'] = 'operator/javascript/dashboard';
		$this->load->view('admin/template', $data);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Dashboard';
		$this->session->set_userdata($data);
	}
}
