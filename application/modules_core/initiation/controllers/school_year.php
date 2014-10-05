<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class School_year extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_school_year');
		$this->load->model('master/m_items_type');
		// load user
		$this->load->helper('text');
		// page title
		$this->page_title();
		$active['parent_active'] = "initiation_data";
		$active['child_active'] = "school_year";
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
		// get user list
		$data['rs_school_year'] = $this->m_school_year->get_all_school_year();
		// load template
		$data['message'] = $this->session->flashdata('message');
		$data['title']	 = "School Year Setup PinapleSAS";
		$data['layout']  = "initiation/school_year/list";
		$data['javascript'] = "initiation/school_year/javascript/list";
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
		// load template
		$data['message']= $this->session->flashdata('message');
		$data['title']  = "School Year Setup PinapleSAS";
		$data['layout'] = "initiation/school_year/add";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function add_process() {
		// form validation
		//$this->form_validation->set_rules('user_id', '', 'required|trim|xss_clean');
		$this->form_validation->set_rules('name', 'School Year Name', 'required|trim|xss_clean|callback_check_school_year');
		$this->form_validation->set_rules('start', 'Start', 'required|trim|xss_clean|max_length[10]');
		$this->form_validation->set_rules('end', 'End', 'required|trim|xss_clean|max_length[10]|callback_check_less['.$this->input->post('start').']');
		$this->form_validation->set_rules('status', 'Status', 'required|trim|xss_clean|callback_check_status');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$this->m_school_year->add_school_year($this->input->post());
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('initiation/school_year');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'name'			=> $this->input->post('name'),
				'start'			=> $this->input->post('start'),
				'end'			=> $this->input->post('end'),
				'status'		=> $this->input->post('status'),
				'description'	=> $this->input->post('description')
			);
			$this->session->set_flashdata($data);
			redirect('initiation/school_year/add');
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
		$data['result'] = $this->m_school_year->get_school_year_by_id($id);
		// load template
		$data['title']	= "School Year Edit PinapleSAS";
		$data['message'] = $this->session->flashdata('message');
		$data['layout'] = "initiation/school_year/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	// edit process
	public function edit_process() {
		$this->form_validation->set_rules('name', 'name', 'required|trim|xss_clean|callback_check_school_year');
		$this->form_validation->set_rules('start', 'start', 'required|trim|xss_clean|max_length[10]');
		$this->form_validation->set_rules('end', 'end', 'required|trim|xss_clean|max_length[10]|callback_check_less['.$this->input->post('start').']');
		$this->form_validation->set_rules('status', 'Status', 'required|trim|xss_clean|callback_check_status');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$this->m_school_year->edit_school_year($this->input->post());
			$data['message'] = "Data successfully edited";
			$this->session->set_flashdata($data);
			redirect('initiation/school_year');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'name'			=> $this->input->post('name'),
				'start'			=> $this->input->post('start'),
				'end'			=> $this->input->post('end'),
				'status'		=> $this->input->post('status'),
				'description'	=> $this->input->post('description')
			);
			$this->session->set_flashdata($data);
			redirect('initiation/school_year/edit/'.$this->input->post('id'));
		}
	}

	public function check_school_year($sy) {
		$id=$this->input->post('id');
		$row=$this->m_school_year->get_school_year_name($sy,$id);
		if(!empty($row)){
			$this->form_validation->set_message('check_school_year', 'School Year Name is already used');
		    return FALSE;
		}
		else{
		    return TRUE;
		}
	}

	public function check_less($akhir,$mulai)
	{
	    if ($akhir < $mulai){
			$this->form_validation->set_message('check_less', 'Start > End is not permitted');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function check_status($status)
	{
		$id=$this->input->post('id');
		$cek=$this->m_school_year->get_active_status($id);
	    if (!empty($cek) && $status=="aktif"){
			$this->form_validation->set_message('check_status', 'There are AKTIF status on the other School Year');
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
		
		$params['id']=$id;
		$this->m_school_year->delete_school_year($params);
		$data['message'] = "Data successfully deleted";
		$this->session->set_flashdata($data);
		redirect('initiation/school_year');
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'School Year';
		$this->session->set_userdata($data);
	}
}
