<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Employees extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_employees');
		// load user
		$this->load->helper('text');
		// page title
		$this->page_title();
		// active page
		$active['parent_active'] = "master_data";
		$active['child_active'] = "employees";
		$this->session->set_userdata($active);
	}

	public function index()
	{
		// user_auth
		$this->check_auth('R');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get unit list
		$data['rs_employees'] = $this->m_employees->get_all_ue();
		// load template
		$data['message'] = $this->session->flashdata('message');
		$data['title']		  = "Employees Setup PinapleSAS";
		$data['layout'] = "master/employees/list";
		$data['javascript'] = "master/employees/javascript/list";
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

	//	$data['rs_jabatan']  = $this->m_guru_karyawan->get_all_jabatan();
	//	$data['rs_golongan'] = $this->m_guru_karyawan->get_all_golongan();

		$data['message'] = $this->session->flashdata('message');
		$data['title'] = "Employees Setup PinapleSAS";
		$data['layout'] = "master/employees/add";
		$data['javascript'] = "master/employees/javascript/add";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function add_process() {
		// form validation
		//$this->form_validation->set_rules('user_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|xss_clean|callback_check_nik');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('sex', 'Sex', 'required|trim|xss_clean');
		$this->form_validation->set_rules('citizen', 'Citizen', 'required|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$this->m_employees->add_ue($this->input->post());
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('master/employees');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'nik'			=> $this->input->post('nik'),
				'full_name'		=> $this->input->post('full_name'),
				'nick_name'		=> $this->input->post('nick_name'),
				'sex' 			=> $this->input->post('sex'),
				'pob'			=> $this->input->post('pob'),
				'dob'			=> $this->input->post('dob'),
				'address'		=> $this->input->post('address'),
				'city'			=> $this->input->post('city'),
				'postal_code'	=> $this->input->post('postal_code'),
				'religion'		=> $this->input->post('religion'),
				'citizen'		=> $this->input->post('citizen'),
				'cell_phone'	=> $this->input->post('cell_phone'),
				'home_phoe'		=> $this->input->post('home_phoe'),
				'email'			=> $this->input->post('email'),
				'position'		=> $this->input->post('position'),
				'class'			=> $this->input->post('class'),
				//'photo'		=> $this->input->post('photo'),
				'start_date'	=> $this->input->post('start_date'),
				'end_date'		=> $this->input->post('end_date'),
				'note_out'		=> $this->input->post('note_out')
			);
			$this->session->set_flashdata($data);
			redirect('master/employees/add');
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

	//	$data['rs_jabatan']  = $this->m_guru_karyawan->get_all_jabatan();
	//	$data['rs_golongan'] = $this->m_guru_karyawan->get_all_golongan();
		$data['result'] = $this->m_employees->get_ue_by_id($id);
		// load template
		$data['title']	= "Employees Edit PinapleSAS";
		$data['message'] = $this->session->flashdata('message');
		$data['layout'] = "master/employees/edit";
		$data['javascript'] = "master/employees/javascript/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	// edit process
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|xss_clean');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('sex', 'Sex', 'required|trim|xss_clean');
		$this->form_validation->set_rules('citizen', 'Citizen', 'required|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$this->m_employees->edit_ue($this->input->post());
			$data['message'] = "Data successfully edited";
			$this->session->set_flashdata($data);
			redirect('master/employees');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'nik'			=> $this->input->post('nik'),
				'full_name'		=> $this->input->post('full_name'),
				'nick_name'		=> $this->input->post('nick_name'),
				'sex' 			=> $this->input->post('sex'),
				'pob'			=> $this->input->post('pob'),
				'dob'			=> $this->input->post('dob'),
				'address'		=> $this->input->post('address'),
				'city'			=> $this->input->post('city'),
				'postal_code'	=> $this->input->post('postal_code'),
				'religion'		=> $this->input->post('religion'),
				'citizen'		=> $this->input->post('citizen'),
				'cell_phone'	=> $this->input->post('cell_phone'),
				'home_phoe'		=> $this->input->post('home_phoe'),
				'email'			=> $this->input->post('email'),
				'position'		=> $this->input->post('position'),
				'class'			=> $this->input->post('class'),
				//'photo'		=> $this->input->post('photo'),
				'start_date'	=> $this->input->post('start_date'),
				'end_date'		=> $this->input->post('end_date'),
				'note_out'		=> $this->input->post('note_out')
			);
			$this->session->set_flashdata($data);
			redirect('master/employees/edit/'.$this->input->post('nik'));
		}
	}

	public function check_nik($id)
	{
		$cek=$this->m_employees->get_ue_by_id($id);
	    if (!empty($cek)){
			$this->form_validation->set_message('check_nik', 'NIK Employees is already used');
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
		
		$params['nik']=$id;
		$this->m_employees->delete_ue($params);
		$data['message'] = "Data successfully deleted";
		$this->session->set_flashdata($data);
		redirect('master/employees');
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Employees Master Data';
		$this->session->set_userdata($data);
	}
}
