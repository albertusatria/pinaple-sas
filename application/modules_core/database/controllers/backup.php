<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Backup extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here

		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();

		$active['parent_active'] = "databases";
		$active['child_active'] = "backup";
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

		// load template
		$data['layout'] = "database/backup/form";
		$data['javascript'] = "database/backup/javascript/form";
		$this->load->view('dashboard/admin/template', $data);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Backup Database';
		$this->session->set_userdata($data);
	}
	
}
