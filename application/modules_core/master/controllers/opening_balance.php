<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Opening_balance extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// page title
		$this->page_title();
		// helper
		$this->load->helper('text');
		// model
		// $this->load->model('m_opening_balance');
		$this->load->model('m_accounts');
		$this->load->model('initiation/m_school_year');
		// active page
		$active['parent_active'] = "master_data";
		$active['child_active'] = "opening_balance";
		$this->session->set_userdata($active);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Opening Balance';
		$this->session->set_userdata($data);
	}

	public function index()
	{
		// don't forget to give user_auth to every function before
		$this->check_auth('R');

		// two of these is a must
		// menu
		$data['menu']	= $this->menu();
		// user detail
		$data['user']	= $this->user;
		//message
		$data['message'] = $this->session->flashdata('message');
		$data['opening_year'] = $this->m_accounts->get_opening_year();
		$data['setup'] = $this->m_accounts->get_status_opening_balance();
		$data['rs_accounts'] = $this->m_accounts->get_accounting_balance();		
		// print_r($data['rs_accounts']);die;
		//$data['rs_accounts_rows'] = $this->m_accounts->get_total_rows();
		$data['layout'] = "master/opening/setup";
		$data['javascript'] = "master/opening/javascript/j_setup";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function save_opening_balance(){
		// echo "<pre>"; print_r($this->input->post()); die;
		foreach ($this->input->post('balance_value') as $value) {
			// echo "<pre>"; print_r($value);
			$this->m_accounts->save_opening_balance($value);
		}
		$this->m_accounts->change_status_opening_balance();
		$this->session->set_flashdata('message', 'Opening Balance has succesfully set');
		redirect('master/opening_balance');
		// die;
	}
}
