<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Students extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here

		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "master_data";
		$active['child_active'] = "students";
		$this->session->set_userdata($active);		
	}

	public function index()
	{
		// don't forget to give user_auth to every function before
		$this->check_auth('R');

		// two of these is a must
		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;

		$data['layout'] = "master/students/list";
		$data['javascript'] = "master/students/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Master Data Students';
		$this->session->set_userdata($data);
	}
}
