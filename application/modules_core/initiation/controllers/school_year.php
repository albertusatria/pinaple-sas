<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class School_year extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_school_year');
		$this->load->model('master/m_unit');
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
		$this->form_validation->set_rules('end', 'End', 'required|trim|xss_clean|max_length[10]|callback_check_less['.$this->input->post('mulai').']');
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


//////////////////////////////////////////////////// dipindahkan ke payment configuration -> payment items

	public function list_costs($id){
		// user_auth
		$this->check_auth('U');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		$data['r_ta'] = $this->m_tahun_ajaran->get_tahun_ajaran_by_id($id);
		$data['rs_ta_costs'] = $this->m_tahun_ajaran->get_all_ta_costs($id);
		// load template
		$data['message'] = $this->session->flashdata('message');
		$data['title']		  = "Setup Tahun Ajaran Costs PinapleSAS";
		$data['main_content'] = "setting/tahun_ajaran/list_costs";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function add_cost($ta_id) {
		// user_auth
		$this->check_auth('C');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// load template
		$data['r_ta'] = $this->m_tahun_ajaran->get_tahun_ajaran_by_id($ta_id);
		$data['rs_unit'] = $this->m_unit->get_all_unit_for_administration_cost();
		$data['rs_it'] = $this->m_items_type->get_all_items_type_for_administration_cost();
		$data['message'] = $this->session->flashdata('message');
		$data['title']		  = "Setup Tahun Ajaran PinapleSAS";
		$data['main_content'] = "setting/tahun_ajaran/add_cost";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function add_cost_process() {
		// form validation
		$this->form_validation->set_rules('unit_id', 'Unit', 'required|trim|xss_clean');
		$this->form_validation->set_rules('item_type_id', 'Item Type', 'required|trim|xss_clean|callback_check_duplicate_cost');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim|xss_clean|numeric');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$this->m_tahun_ajaran->add_administration_costs($this->input->post());
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('setting/tahun_ajaran/list_costs/'.$this->input->post('tahun_ajaran_id'));
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'unit_id'		=> $this->input->post('unit_id'),
				'item_type_id'	=> $this->input->post('item_type_id'),
				'amount'		=> $this->input->post('amount')
			);
			$this->session->set_flashdata($data);
			redirect('setting/tahun_ajaran/add_cost/'.$this->input->post('tahun_ajaran_id'));
		}
	}

	public function edit_cost($ta_id,$ac_id) {
		// user_auth
		$this->check_auth('U');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// load template
		$data['r_ta'] = $this->m_tahun_ajaran->get_tahun_ajaran_by_id($ta_id);
		$data['r_ac'] = $this->m_tahun_ajaran->get_administration_cost_by_id($ac_id);
		$data['rs_unit'] = $this->m_unit->get_all_unit_for_administration_cost();
		$data['rs_it'] = $this->m_items_type->get_all_items_type_for_administration_cost();
		$data['message'] = $this->session->flashdata('message');
		$data['title']		  = "Setup Tahun Ajaran PinapleSAS";
		$data['main_content'] = "setting/tahun_ajaran/edit_cost";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function edit_cost_process() {
		// form validation
		$this->form_validation->set_rules('unit_id', 'Unit', 'required|trim|xss_clean');
		$this->form_validation->set_rules('item_type_id', 'Item Type', 'required|trim|xss_clean|callback_check_duplicate_cost_except_self');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim|xss_clean|numeric');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$this->m_tahun_ajaran->edit_administration_costs($this->input->post());
			$data['message'] = "Data successfully edited";
			$this->session->set_flashdata($data);
			redirect('setting/tahun_ajaran/list_costs/'.$this->input->post('tahun_ajaran_id'));
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'unit_id'		=> $this->input->post('unit_id'),
				'item_type_id'	=> $this->input->post('item_type_id'),
				'amount'		=> $this->input->post('amount')
			);
			$this->session->set_flashdata($data);
			redirect('setting/tahun_ajaran/edit_cost/'.$this->input->post('tahun_ajaran_id').'/'.$this->input->post('id'));
		}
	}

	public function check_duplicate_cost($it_id)
	{
		$ta_id=$this->input->post('tahun_ajaran_id');
		$un_id=$this->input->post('unit_id');
		//die($ta_id." : ".$un_id." : ".$it_id);
		$check=$this->m_tahun_ajaran->get_check_duplicate_cost($ta_id,$un_id,$it_id);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_cost', 'Duplicate Item Type on the Unit!');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function check_duplicate_cost_except_self($it_id)
	{
		$ta_id=$this->input->post('tahun_ajaran_id');
		$un_id=$this->input->post('unit_id');
		$id = $this->input->post('id');
		$check=$this->m_tahun_ajaran->get_check_duplicate_cost_except_self($id,$ta_id,$un_id,$it_id);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_cost_except_self', 'Duplicate Item Type on the Unit!');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function delete_cost($ta,$id) {
		// user_auth
		$this->check_auth('D');
		
		$params['id']=$id;
		$this->m_tahun_ajaran->delete_administration_costs($params);
		$data['message'] = "Data successfully deleted";
		$this->session->set_flashdata($data);
		redirect('setting/tahun_ajaran/list_costs/'.$ta);
	}

}
