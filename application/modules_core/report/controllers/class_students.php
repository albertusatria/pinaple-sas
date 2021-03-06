<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Class_students extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		// load model
		$this->load->model('m_reports');
		$this->load->model('initiation/m_school_year');
		$this->load->model('initiation/m_class_open');
		$this->load->model('master/m_units');
		$this->load->model('master/m_employees');

		// load portal
		$this->load->helper('text');

		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "general_reports";
		$active['child_active'] = "class_students";
		$this->session->set_userdata($active);		
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Class Students Report';
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
		$data['units'] = $this->m_units->get_all_unit_academic();

		// get message flashdata		
		$data['message'] = $this->session->flashdata('message');
		$data['eror'] = $this->session->flashdata('eror');

		$data['layout'] = "report/class_students/list_unit";
		$data['javascript'] = "report/class_students/javascript/list_unit";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function class_list($unit_id = "")
	{
		// user_auth
		$this->check_auth('R');

		if ($unit_id == "") {
			redirect('report/class_students/');
		}

		// load error message if any
		$data['message'] = $this->session->flashdata('message');
		$data['error'] = $this->session->flashdata('error');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get active school year information
		$data['active_school_year'] = $this->m_school_year->get_active_year();
		// get school year active id
		$schyear = $data['active_school_year']->id;
		// get list of class
		$data['classes'] = $this->m_class_open->get_classes_list($unit_id, $schyear);
		// get unit list
		$data['unit'] = $this->m_units->get_all_unit_academic($unit_id);

		// load template
		$data['title']	 = "Class Students of unit ".$data['unit']->name;
		$data['layout']  = "report/class_students/list_class";
		$data['javascript'] = "report/class_students/javascript/list_class";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function student_list($unit_id = "", $class_id = "") {
		// user_auth
		$this->check_auth('R');

		if ($unit_id == "") {
			redirect('report/class_students/');
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
		$data['unit'] = $this->m_units->get_unit_by_id($unit_id);
		// get unit list
		$data['class'] = $this->m_class_open->get_class($class_id);
		// get unit list
		$data['student'] = $this->m_reports->get_student_by_class_id($class_id);
		// load template
		$data['title']	 = "Class Students";
		$data['layout']  = "report/class_students/list_student";
		$data['javascript'] = "report/class_students/javascript/list_student";
		$this->load->view('dashboard/admin/template', $data);
	}

}
