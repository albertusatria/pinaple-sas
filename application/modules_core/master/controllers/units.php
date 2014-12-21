<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Units extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		$this->load->model('m_units');
		$this->load->model('m_employees');
		
		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "master_data";
		$active['child_active'] = "units";
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
		
		$data['rs_unit'] = $this->m_units->get_all_unit_completed();
		$data['message'] = $this->session->flashdata('message');
		
		$data['layout'] = "master/units/list";
		$data['javascript'] = "master/units/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}


	// add
	public function add() {
		// user_auth
		$this->check_auth('C');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;

		$data['rs_parent'] = $this->m_units->get_all_unit();
		$data['rs_kepala'] = $this->m_employees->get_all_ue();

		// load template
		$data['title']		  = "Add Unit PinapleSAS";
		$data['message'] = $this->session->flashdata('message');
		
		$data['layout'] = "master/units/add";
		$data['javascript'] = "master/units/javascript/add";		
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function add_process() {
		// form validation
		$this->form_validation->set_rules('id', 'Unit ID', 'required|trim|xss_clean|callback_check_id_unit');
		$this->form_validation->set_rules('name', 'Unit Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('stage', 'Number of Stage', 'required|trim|xss_clean');
		$this->form_validation->set_rules('category', 'Category', 'required|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$params=$this->input->post();

			$this->m_units->add_unit($params);
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('master/units');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'id'		=> $this->input->post('id'),
				'parent_id'		=> $this->input->post('parent_id'),
				'unit'			=> $this->input->post('name'),
				'category'		=> $this->input->post('category'),
				'stage'		=> $this->input->post('stage'),
				//'logo'		=> $this->input->post('status'),
				'headmaster_id'	=> $this->input->post('headmaster_id'),
				'registration_number'	=> $this->input->post('registration_number'),
				'address'		=> $this->input->post('address'),
				'city'			=> $this->input->post('city'),
				'district'		=> $this->input->post('district'),
				'village'			=> $this->input->post('village'),
				'phone'		=> $this->input->post('phone'),
				'fax'		=> $this->input->post('fax'),
				'email'		=> $this->input->post('email'),
				'web'			=> $this->input->post('web')
			);
			$this->session->set_flashdata($data);
			redirect('master/units/add');
		}
	}

	// edit
	public function edit($id) {
		// user_auth
		$this->check_auth('U');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get tahun ajaran row
		$data['rs_parent'] = $this->m_units->get_all_unit_except_self($id);
		$data['rs_kepala'] = $this->m_employees->get_all_ue();
		$data['result'] = $this->m_units->get_unit_by_id($id);
		// print_r($data['result']);die;
		
		// load template
		$data['title']	= "Edit Unit PinapleSAS";
		$data['message'] = $this->session->flashdata('message');
		$data['layout'] = "master/units/edit";
		$data['javascript'] = "master/units/javascript/edit";		
		$this->load->view('dashboard/admin/template', $data);
	}

	// edit process
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('id', 'Unit ID', 'required|trim|xss_clean');
		$this->form_validation->set_rules('name', 'Unit name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('stage', 'Number of Stage', 'required|trim|xss_clean');
		$this->form_validation->set_rules('category', 'Category', 'required|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$params=$this->input->post();

			$this->m_units->edit_unit($params);
			$data['message'] = "Data successfully edited";
			$this->session->set_flashdata($data);
			redirect('master/units');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'id'		=> $this->input->post('id'),
				'parent_id'		=> $this->input->post('parent_id'),
				'unit'			=> $this->input->post('name'),
				'category'		=> $this->input->post('category'),
				'stage'		=> $this->input->post('stage'),
				//'logo'		=> $this->input->post('status'),
				'headmaster_id'	=> $this->input->post('headmaster_id'),
				'registration_number'	=> $this->input->post('registration_number'),
				'address'		=> $this->input->post('address'),
				'city'			=> $this->input->post('city'),
				'district'		=> $this->input->post('district'),
				'village'			=> $this->input->post('village'),
				'phone'		=> $this->input->post('phone'),
				'fax'		=> $this->input->post('fax'),
				'email'		=> $this->input->post('email'),
				'web'			=> $this->input->post('web')
			);
			$this->session->set_flashdata($data);
			redirect('master/units/edit/'.$this->input->post('id'));
		}
	}

	public function check_id_unit($id)
	{
		$cek=$this->m_units->get_unit_by_id($id);
	    if (!empty($cek)){
			$this->form_validation->set_message('check_id_unit', 'ID Unit is already used');
			return false;       
		}
		else{
	        return true;
      	}
	}
	
	// delete
	public function delete($id) {
		// user_auth
		$this->check_auth('D');
		
		$params['id_unit']=$id;
		$this->m_units->delete_unit($params);
		$data['message'] = "Data successfully deleted";
		$this->session->set_flashdata($data);
		redirect('master/units');
	}
	

	// page title
	public function page_title() {
		$data['page_title'] = 'Master Data Units';
		$this->session->set_userdata($data);
	}
}
