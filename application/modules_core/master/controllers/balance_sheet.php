<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Balance_sheet extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// page title
		$this->page_title();
		// helper
		$this->load->helper('text');
		// model
		$this->load->model('m_balance_sheet');	;
		// active page
		$active['parent_active'] = "master_data";
		$active['child_active'] = "balance_sheet";
		$this->session->set_userdata($active);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Kalkulasi Neraca Saldo';
		$this->session->set_userdata($data);
	}

	public function index()
	{
		// user_auth
		$this->check_auth('R');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// row
		$data['balance_sheet_debet'] = $this->m_balance_sheet->get_balance_sheet_pergroup_debet();
		$data['balance_sheet_credit'] = $this->m_balance_sheet->get_balance_sheet_pergroup_credit();

		// load template
		$data['message'] = $this->session->flashdata('message');
		$data['layout'] = "master/balance_sheet/calculate";
		$data['javascript'] = "master/balance_sheet/javascript/j_calculate";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function save_calculating(){

	}
}
