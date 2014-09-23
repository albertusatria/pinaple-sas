<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Class_open extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_school_year');
		$this->load->model('master/m_unit');
		// load user
		$this->load->helper('text');
		// page title
		$this->page_title();
		$active['parent_active'] = "initiation_data";
		$active['child_active'] = "class_open";
		$this->session->set_userdata($active);
	}

	public function index()
	{
		// user_auth
		$this->check_auth('R');

		// load error message if any
		$data['message'] = $this->session->flashdata('message');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get active school year information
		$data['active_school_year'] = $this->m_school_year->get_active_year();
		// get unit list
		$data['units'] = $this->m_unit->get_all_unit_academic();

		// load template
		$data['title']	 = "Class Open Setup PinapleSAS";
		$data['layout']  = "initiation/class_open/list_unit";
		$data['javascript'] = "initiation/class_open/javascript/list_unit";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function class_list($unit_id = "")
	{
		// user_auth
		$this->check_auth('R');

		// load error message if any
		$data['message'] = $this->session->flashdata('message');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get active school year information
		$data['active_school_year'] = $this->m_school_year->get_active_year();
		// get school year active id
		$schyear = $data['active_school_year']->id;
		// get list of class
		$data['classes'] = $this->m_class_open->get_class_list($unit_id, $schyear);
		// get unit list
		$data['units'] = $this->m_unit->get_all_unit_academic($unit_id);

		// load template
		$data['title']	 = "Class Open Setup PinapleSAS";
		$data['layout']  = "initiation/class_open/list_class";
		$data['javascript'] = "initiation/class_open/javascript/list_class";
		$this->load->view('dashboard/admin/template', $data);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'School Year';
		$this->session->set_userdata($data);
	}
}
