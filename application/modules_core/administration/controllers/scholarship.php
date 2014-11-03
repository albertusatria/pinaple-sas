<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Scholarship extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('master/m_units');
		$this->load->model('initiation/m_school_year');

		// load permission
		$this->load->helper('text');
		// page title
		$this->page_title();


		// active page
		$active['parent_active'] = "school_administration";
		$active['child_active'] = "scholarship";
		$this->session->set_userdata($active);		

	}

	public function index()
	{
		// user_auth
		$this->check_auth('R');
		// menu
		$data['menu']		= $this->menu();
		// user detail
		$data['user']		= $this->user;
		// get portal list
		$data['ls_unit']	= $this->m_units->get_all_unit();
		// get tahun ajaran
		$data['year']		= $this->m_school_year->get_active_year();

		// get active school year
		$data['school_year'] = $this->m_school_year->get_year_after_active_year();		
		
		// get message flashdata		
		$data['message'] = $this->session->flashdata('message');
		
		// load template
		$data['title']	= "Scholarship Pinaple SAS";
		$data['layout'] = "administration/scholarship/list";
		$data['javascript'] = "administration/scholarship/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Scholarship';
		$this->session->set_userdata($data);
	}
}
