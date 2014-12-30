<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Scholarship_allocation extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		// load model
		$this->load->model('m_reports');
		$this->load->model('initiation/m_school_year');
		$this->load->model('administration/m_scholarship');
		//$this->load->model('master/m_units');
		//$this->load->model('master/m_employees');

		// load portal
		$this->load->helper('text');

		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "general_reports";
		$active['child_active'] = "scholarship_allocation";
		$this->session->set_userdata($active);		
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Scholarship Allocation Report';
		$this->session->set_userdata($data);
	}

	public function index()
	{
		// don't forget to give user_auth to every function before
		$this->check_auth('R');

		// two of these is a must
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;

		//data
		$data['active_school_year'] = $this->m_school_year->get_active_year();
		$data['scholarship'] = $this->m_scholarship->get_scholarship_by_year($data['active_school_year']->id);

		// get message flashdata		
		$data['message'] = $this->session->flashdata('message');
		$data['eror'] = $this->session->flashdata('eror');

		$data['layout'] = "report/scholarship_allocation/list_scholarship";
		$data['javascript'] = "report/scholarship_allocation/javascript/list_scholarship";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function student_list($ss_id = "") {
		// user_auth
		$this->check_auth('R');

		if ($ss_id == "") {
			redirect('report/scholarship_allocation/');
		}

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get active school year information
		$data['active_school_year'] = $this->m_school_year->get_active_year();
		// get school year active id
		$schyear = $data['active_school_year']->id;
		// get unit list
		//$data['unit'] = $this->m_units->get_unit_by_id($unit_id);
		// get unit list
		$data['scholarship'] = $this->m_scholarship->get_scholarship_by_id($ss_id);
		// get unit list
		$data['student'] = $this->m_reports->get_student_scholarship_by_id($ss_id);
		// load template
		$data['title']	 = "Scholarship Allocation";
		$data['layout']  = "report/scholarship_allocation/list_student";
		$data['javascript'] = "report/scholarship_allocation/javascript/list_student";
		$this->load->view('dashboard/admin/template', $data);
	}

}
