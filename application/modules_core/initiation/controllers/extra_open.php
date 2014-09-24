<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Extra_open extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_school_year');
		$this->load->model('m_extra_open');
		$this->load->model('master/m_unit');
		$this->load->model('master/m_employees');
		// load user
		$this->load->helper('text');
		// page title
		$this->page_title();
		$active['parent_active'] = "initiation_data";
		$active['child_active'] = "extra_open";
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
		$data['layout']  = "initiation/extra_open/list_unit";
		$data['javascript'] = "initiation/extra_open/javascript/list_unit";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function extra_list($unit_id = "")
	{
		// user_auth
		$this->check_auth('R');

		if ($unit_id == "") {
			redirect('initiation/extra_open/');
		}

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
		$data['extras'] = $this->m_extra_open->get_extra_list($unit_id, $schyear);
		// get unit list
		$data['unit'] = $this->m_unit->get_all_unit_academic($unit_id);

		// load template
		$data['title']	 = "Class Open Setup PinapleSAS";
		$data['layout']  = "initiation/extra_open/list_extra";
		$data['javascript'] = "initiation/extra_open/javascript/list_extra";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function add($unit_id = "") {
		// user_auth
		$this->check_auth('U');

		if ($unit_id == "") {
			redirect('initiation/extra_open/');
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
		$data['unit'] = $this->m_unit->get_unit_by_id($unit_id);
		// get unit list
		$data['coaches'] = $this->m_employees->get_all_ue();
		// load template
		$data['title']	 = "Class Open Setup PinapleSAS";
		$data['layout']  = "initiation/extra_open/add";
		$data['javascript'] = "initiation/extra_open/javascript/add";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function add_process() {
		// form validation
		$this->form_validation->set_rules('unit_id', 'Unit ID', 'required|trim|xss_clean');
		$this->form_validation->set_rules('school_year_id', 'School Year Id', 'required|trim|xss_clean');
		$this->form_validation->set_rules('extra_name', 'Extra Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('extra_coach1', 'Extra Coach 1', 'trim|xss_clean');
		$this->form_validation->set_rules('extra_coach2', 'Extra Coach 2', 'trim|xss_clean');
		$this->form_validation->set_rules('extra_price', 'Extra Monthly Cost', 'required|trim|xss_clean|numeric');

		if ($this->form_validation->run() == TRUE) {
			// insert
	        $this->load->helper('date');
	        $datestring = '%Y-%m-%d %H:%i:%s';
	        $time = time();
	        $now = mdate($datestring, $time);

        	$params = array(
				'school_year_id' 		=> $this->input->post('school_year_id'), 
				'unit_id' 	=> $this->input->post('unit_id'), 
				'name'	=> $this->input->post('extra_name'),
				'homeroom_1'	=> $this->input->post('extra_coach1'),
				'homeroom_2'	=> $this->input->post('extra_coach2'),
				'amount'	=> $this->input->post('extra_price'),
				'created_on'	=> $now
			);

			if ($this->m_extra_open->add_extra($params)) {
				$data['message'] = "Data has been successfully added";
			}

			$this->session->set_flashdata($data);
			redirect('initiation/extra_open/extra_list/' . $this->input->post('unit_id'));
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'extra_name'		=> $this->input->post('extra_name'),
				'extra_harga'		=> $this->input->post('extra_price'),
			);
		}

		$this->session->set_flashdata($data);
		redirect('setting/extra_open/add/' . $this->input->post('unit_id'));
	}

	public function edit($unit_id = "", $extra_id = "") {
		// user_auth
		$this->check_auth('U');

		if ($unit_id == "") {
			redirect('initiation/extra_open/');
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
		$data['unit'] = $this->m_unit->get_unit_by_id($unit_id);
		// get unit list
		$data['extra'] = $this->m_extra_open->get_extras($extra_id);
		// get unit list
		$data['coaches'] = $this->m_employees->get_all_ue();
		// load template
		$data['title']	 = "Class Open Setup PinapleSAS";
		$data['layout']  = "initiation/extra_open/edit";
		$data['javascript'] = "initiation/extra_open/javascript/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('unit_id', 'Unit Id', 'required|trim|xss_clean');
		$this->form_validation->set_rules('extra_id', 'Extra Id', 'required|trim|xss_clean');
		$this->form_validation->set_rules('extra_name', 'Extra Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('extra_coach1', 'Extra Coach 1', 'trim|xss_clean');
		$this->form_validation->set_rules('extra_coach2', 'Extra Coach 2', 'trim|xss_clean');
		$this->form_validation->set_rules('extra_price', 'Extra Monthly Cost', 'required|trim|xss_clean|numeric');

		if ($this->form_validation->run() == TRUE) {
			// insert
	        $this->load->helper('date');
	        $datestring = '%Y-%m-%d %H:%i:%s';
	        $time = time();
	        $now = mdate($datestring, $time);

        	$params = array(
				'name'	=> $this->input->post('extra_name'),
				'homeroom_1' => $this->input->post('extra_coach1'),
				'homeroom_2'=> $this->input->post('extra_coach2'),
				'amount'	=> $this->input->post('extra_price'),
				'updated_on'	=> $now
			);

			if ($this->m_extra_open->edit_extra($params,$this->input->post('extra_id'))) {
				$data['message'] = "Data has been successfully updated";
			}

			$this->session->set_flashdata($data);
			redirect('initiation/extra_open/extra_list/' . $this->input->post('unit_id'));
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'extra_name'		=> $this->input->post('extra_name'),
				'extra_harga'		=> $this->input->post('extra_price'),
			);
		}

		$this->session->set_flashdata($data);
		redirect('setting/extra_open/edit/' . $this->input->post('unit_id') . '/' . $this->input->post('extra_id') );
	}

	public function delete($unit_id = "",$extra_id = "") {

		if ($unit_id == "") {
			redirect('initiation/extra_open/');
		}

		if ($this->m_extra_open->delete_extra($extra_id)) {
			$data['message'] = "Data has been successfully deleted";
		} else {
			$data['message'] = "Cannot delete the data";			
		}
		$this->session->set_flashdata($data);
		redirect('initiation/extra_open/extra_list/' . $unit_id);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'School Year';
		$this->session->set_userdata($data);
	}
}
