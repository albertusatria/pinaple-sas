<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Balance_sheet extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// page title
		$this->page_title();

		$this->load->helper('text');
		// page title
		$this->page_title();
		// active page
		$active['parent_active'] = "master_data";
		$active['child_active'] = "balance_sheet";
		$this->session->set_userdata($active);
	}

	public function index()
	{
		// user_auth
		$this->check_auth('R');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;


		// load template
		$data['message'] = $this->session->flashdata('message');
		$data['layout'] = "master/balance_sheet/calculate";
		$data['javascript'] = "master/balance_sheet/javascript/j_calculate";
		$this->load->view('dashboard/admin/template', $data);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Kalkulasi Neraca Saldo';
		$this->session->set_userdata($data);
	}
}
