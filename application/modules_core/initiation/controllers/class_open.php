<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Class_open extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_school_year');
		$this->load->model('m_class_open');
		$this->load->model('master/m_units');
		$this->load->model('master/m_employees');
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
		$data['units'] = $this->m_units->get_all_unit_academic();

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

		if ($unit_id == "") {
			redirect('initiation/extra_open/');
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
		$data['title']	 = "Class Open Setup PinapleSAS";
		$data['layout']  = "initiation/class_open/list_class";
		$data['javascript'] = "initiation/class_open/javascript/list_class";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function add($unit_id = "") {
		// user_auth
		$this->check_auth('U');

		if ($unit_id == "") {
			redirect('initiation/class_open/');
		}

		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get active school year information
		$data['active_school_year'] = $this->m_school_year->get_active_year();
		// get school year active id
		$schyear = $data['active_school_year']->id;
		// get unit list
		$data['unit'] = $this->m_units->get_unit_by_id($unit_id);
		// get unit list
		$data['coaches'] = $this->m_employees->get_all_ue();
		// load template
		$data['title']	 = "Class Open Setup PinapleSAS";
		$data['layout']  = "initiation/class_open/add";
		$data['javascript'] = "initiation/class_open/javascript/add";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function add_process() {
		// form validation
		$this->form_validation->set_rules('unit_id', 'Unit ID', 'required|trim|xss_clean');
		$this->form_validation->set_rules('school_year_id', 'School Year Id', 'required|trim|xss_clean');
		$this->form_validation->set_rules('class_name', 'Class Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('class_homeroom1', 'Class Homeroom Teacher 1', 'trim|xss_clean');
		$this->form_validation->set_rules('class_homeroom2', 'Class Homeroom Teacher 2', 'trim|xss_clean');
		$this->form_validation->set_rules('class_level', 'Extra Monthly Cost', 'required|trim|xss_clean|numeric');

		if ($this->form_validation->run() == TRUE) {
			// insert
	        $this->load->helper('date');
	        $datestring = '%Y-%m-%d %H:%i:%s';
	        $time = time();
	        $now = mdate($datestring, $time);

        	$params = array(
				'school_year_id' 		=> $this->input->post('school_year_id'), 
				'unit_id' 	=> $this->input->post('unit_id'), 
				'name'	=> $this->input->post('class_name'),
				'homeroom_1'	=> $this->input->post('class_homeroom1'),
				'homeroom_2'	=> $this->input->post('class_homeroom2'),
				'level'	=> $this->input->post('class_level'),
				'created_on'	=> $now
			);

			if ($this->m_class_open->add_class($params)) {
				$data['message'] = "Data has been successfully added";
			}

			$this->session->set_flashdata($data);
			redirect('initiation/class_open/class_list/' . $this->input->post('unit_id'));
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'class_name'		=> $this->input->post('class_name'),
				'class_level'		=> $this->input->post('class_level'),
			);
		}

		$this->session->set_flashdata($data);
		redirect('initiation/class_open/add/' . $this->input->post('unit_id'));
	}

	public function edit($unit_id = "", $class_id = "") {
		// user_auth
		$this->check_auth('U');

		if ($unit_id == "") {
			redirect('initiation/class_open/');
		}

		// menu
		$data['menu']				= $this->menu();
		// user detail
		$data['user']				= $this->user;
		// get active school year information
		$data['active_school_year'] = $this->m_school_year->get_active_year();
		// get school year active id
		$schyear = $data['active_school_year']->id;
		// get unit list
		$data['unit'] = $this->m_units->get_unit_by_id($unit_id);
		// get unit list
		$data['class'] = $this->m_class_open->get_class($class_id);
		// get unit list
		$data['coaches'] = $this->m_employees->get_all_ue();
		// load template
		$data['title']	 = "Class Open Setup PinapleSAS";
		$data['layout']  = "initiation/class_open/edit";
		$data['javascript'] = "initiation/class_open/javascript/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('unit_id', 'Unit Id', 'required|trim|xss_clean');
		$this->form_validation->set_rules('class_id', 'Class Id', 'required|trim|xss_clean');
		$this->form_validation->set_rules('class_name', 'Class Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('class_homeroom1', 'Class Homeroom Teacher 1', 'trim|xss_clean');
		$this->form_validation->set_rules('class_homeroom2', 'Class Homeroom Teacher 2', 'trim|xss_clean');
		$this->form_validation->set_rules('class_level', 'Extra Monthly Cost', 'required|trim|xss_clean|numeric');

		if ($this->form_validation->run() == TRUE) {
			// insert
	        $this->load->helper('date');
	        $datestring = '%Y-%m-%d %H:%i:%s';
	        $time = time();
	        $now = mdate($datestring, $time);

        	$params = array(
				'name'	=> $this->input->post('class_name'),
				'homeroom_1' => $this->input->post('class_homeroom1'),
				'homeroom_2'=> $this->input->post('class_homeroom2'),
				'level'	=> $this->input->post('class_level'),
				'updated_on'	=> $now
			);

			if ($this->m_class_open->edit_class($params,$this->input->post('class_id'))) {
				$data['message'] = "Data has been successfully updated";
			}

			$this->session->set_flashdata($data);
			redirect('initiation/class_open/class_list/' . $this->input->post('unit_id'));
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'extra_name'		=> $this->input->post('extra_name'),
				'extra_harga'		=> $this->input->post('extra_price'),
			);
		}

		$this->session->set_flashdata($data);
		redirect('setting/class_open/edit/' . $this->input->post('unit_id') . '/' . $this->input->post('class_id') );
	}

	public function delete($unit_id = "",$class_id = "") {

		if ($unit_id == "") {
			redirect('initiation/class_open/');
		}

		if($this->m_class_open->check_class_students_by_ci($class_id)){
			$data['error'] = "Data has students, can't be delete";
		}else{
			if ($this->m_class_open->delete_class($class_id)) {
				$data['message'] = "Data has been successfully deleted";
			}else{
				$data['error'] = "Cannot delete the data";			
			}
		}

		$this->session->set_flashdata($data);
		redirect('initiation/class_open/class_list/' . $unit_id);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Class Open';
		$this->session->set_userdata($data);
	}
}
