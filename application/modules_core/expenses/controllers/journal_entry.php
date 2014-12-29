<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Journal_entry extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here

		// load portal
		$this->load->helper('text');
		$this->load->model('m_entry');
		$this->load->model('initiation/m_school_year');
		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "school_expenses";
		$active['child_active'] = "journal_entry_record";
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
		$data['message'] = $this->session->flashdata('message');
		
		$data['active_school_year'] = $this->m_school_year->get_active_year();		
		$data['layout'] = "expenses/journal-entry-record/list";
		$data['javascript'] = "expenses/journal-entry-record/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	function save_entry() {
		foreach ($_POST as $value) {
			$value['transaction_date'] = date('Y-m-d',strtotime($value['transaction_date']));
			$value['month'] = date('m',strtotime($value['transaction_date']));;
			$data = $this->m_entry->save_entry($value);
		}
		header('Content-Type: application/json');
	    echo json_encode($data);		
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Juornal Entry Record';
		$this->session->set_userdata($data);
	}
}
