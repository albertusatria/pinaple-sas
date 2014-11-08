<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Scholarship extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('master/m_units');
		$this->load->model('initiation/m_school_year');
		$this->load->model('registration/m_registration');
		$this->load->model('administration/m_scholarship');
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
		$data['school_year']= $this->m_school_year->get_active_year();
		// get message flashdata		
		$data['message'] = $this->session->flashdata('message');
		$data['eror'] = $this->session->flashdata('eror');
		// load template
		$data['title']	= "Scholarship Pinaple SAS";
		$data['layout'] = "administration/scholarship/list";
		$data['javascript'] = "administration/scholarship/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function get_students_for_scholarship()
	{
		foreach ($_POST as $value) {
			$keyword = $value['keyword'];
		}
		$data = $this->m_registration->get_list_siswa($keyword);
		header('Content-Type: application/json');
	    echo json_encode($data);
	}

	public function add_process() {		
		$this->check_auth('C');
		$this->form_validation->set_rules('name', 'Scholarship Name', 'required|trim|xss_clean|callback_check_duplicate_scholarship');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim|xss_clean|numeric|greater_than[0]');
		if ($this->form_validation->run() == TRUE) {
			// insert
			$data = array(
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description'),
				'amount'		=> $this->input->post('amount'),
				'school_year_id'=> $this->input->post('school_year_id')
			);
			$this->m_scholarship->add_scholarship($data);
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
		} else {
			$data = array(
				'eror'			=> str_replace("\n", "", validation_errors()),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description'),
				'amount'		=> $this->input->post('amount'),
				'school_year_id'=> $this->input->post('school_year_id')

			);
			$this->session->set_flashdata($data);
		}
		redirect('administration/scholarship/');
	}

	public function check_duplicate_scholarship($name)
	{
		$sy_id=$this->input->post('school_year_id');
		$check=$this->m_scholarship->get_check_duplicate_scholarship($name,$sy_id);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_scholarship', 'Found duplicated name for '.$name.' in same year! Please review your input.');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function edit($id){
		$this->check_auth('U');
		$data['menu']	= $this->menu();
		$data['user']	= $this->user;
		$data['result']	= $this->m_scholarship->get_scholarship_by_id($id);
		$data['school_year']= $this->m_school_year->get_active_year();
		// get message flashdata		
		$data['message']= $this->session->flashdata('message');
		$data['eror'] 	= $this->session->flashdata('eror');
		// load template
		$data['title']	= "Scholarship Pinaple SAS";
		$data['layout'] = "administration/scholarship/edit";
		$data['javascript'] = "administration/scholarship/javascript/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function edit_process(){
		$this->form_validation->set_rules('name', 'Scholarship Name', 'required|trim|xss_clean|callback_check_duplicate_scholarship_ex_self');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim|xss_clean|numeric|greater_than[0]');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description'),
				'amount'		=> $this->input->post('amount'),
				'school_year_id'=> $this->input->post('school_year_id')
			);
		
			$this->m_scholarship->edit_scholarship($data);
			$data['message'] = "Data successfully edited";
			$this->session->set_flashdata($data);
			redirect('administration/scholarship/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description'),
				'amount'		=> $this->input->post('amount'),
				'school_year_id'=> $this->input->post('school_year_id')
			);
			$this->session->set_flashdata($data);
			redirect('administration/scholarship/edit/'.$this->input->post('id'));
		}
	}

	public function check_duplicate_scholarship_ex_self($name)
	{
		$id=$this->input->post('id');
		$sy_id=$this->input->post('school_year_id');
		$check=$this->m_scholarship->get_check_duplicate_scholarship_ex_self($name,$id,$sy_id);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_scholarship_ex_self', 'Found duplicated name for '.$name.' in same year! Please review your input.');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function delete($id) {
		$this->check_auth('D');
		$params['id']=$id;
		$this->m_scholarship->delete_scholarship($params);
		$data['message'] = "Data successfully deleted";
		$this->session->set_flashdata($data);
		redirect('administration/scholarship');
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Scholarship';
		$this->session->set_userdata($data);
	}
}
