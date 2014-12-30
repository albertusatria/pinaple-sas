<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Student_registrations extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		// load model
		$this->load->model('m_reports');
		$this->load->model('initiation/m_school_year');

		// load portal
		$this->load->helper('text');

		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "general_reports";
		$active['child_active'] = "student_registrations";
		$this->session->set_userdata($active);		
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Student Registrations Report';
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
		$data['rs_asy'] = $this->m_school_year->get_active_year();
		$data['ls_report'] = $this->m_reports->get_all_students_for_student_registrations($data['rs_asy']->id);
		$data['ls_sy'] = $this->m_school_year->get_all_school_year();

		// get message flashdata		
		$data['message'] = $this->session->flashdata('message');
		$data['eror'] = $this->session->flashdata('eror');

		$data['layout'] = "report/student_registrations/list";
		$data['javascript'] = "report/student_registrations/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function get_students_list()
	{
		$params['nis'] = $_POST['nis'];
		$params['full_name'] = $_POST['full_name'];
		$params['unit_name'] = $_POST['unit_name'];
		$params['current_level'] = $_POST['current_level'];
		$params['registration_type'] = $_POST['registration_type'];
		$params['reg_status'] = $_POST['reg_status'];
		$params['school_year_id'] = $_POST['school_year_id'];
		$data = $this->m_reports->get_siswa_list_by_filters_for_student_registrations($params);
		header('Content-Type: application/json');
	    echo json_encode($data);
	}
}
