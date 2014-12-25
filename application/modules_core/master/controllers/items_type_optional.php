<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Items_type_optional extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('master/m_units');
		$this->load->model('master/m_items_type');
		$this->load->model('master/m_accounts');
		//$this->load->model('initiation/m_school_year');
		//$this->load->model('registration/m_registration');
		//$this->load->model('administration/m_scholarship');
		// load permission
		$this->load->helper('text');
		// page title
		$this->page_title();
		// active page
		$active['parent_active'] = "master";
		$active['child_active'] = "items_type_optional";
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
		//$data['school_year']= $this->m_school_year->get_active_year();
		//$sy_id = $data['school_year']->id;
		$data['account'] = $this->m_accounts->get_pendapatan_account_list();
		$data['ls_items_type_optional'] = $this->m_items_type->get_items_type_by_type("OPTIONAL");
		$data['rs_items_type'] = $this->m_items_type->get_all_items_type(false);		
		// get message flashdata		
		$data['message'] = $this->session->flashdata('message');
		$data['eror'] = $this->session->flashdata('eror');
		// load template
		$data['title']	= "Items Type Optional";
		$data['layout'] = "master/items_type_optional/list";
		$data['javascript'] = "master/items_type_optional/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function get_list_items_type()
	{
		foreach ($_POST as $value) {
			$keyword = $value['keyword'];
			$u_id	 = $value['u_id'];
		}
		$data = $this->m_items_type->get_list_items_type($u_id,$keyword);
		header('Content-Type: application/json');
	    echo json_encode($data);
	}

	public function add_process() {		
		$this->check_auth('C');
		$this->form_validation->set_rules('name', 'Items Type Name', 'required|trim|xss_clean|callback_check_duplicate_items_type');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim|xss_clean|numeric|greater_than[0]');
		$this->form_validation->set_rules('accounting_code', 'Accounting Code', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$data = array(
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description'),
				'amount'		=> $this->input->post('amount'),
				'unit_id'		=> $this->input->post('unit_id'),
				'type'			=> 'OPTIONAL',
				'accounting_code'	=> $this->input->post('accounting_code'),
				'packet'	=> '0',
			);
			$this->m_items_type->add_items_type($data);
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
		} else {
			$data = array(
				'eror'			=> str_replace("\n", "", validation_errors()),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description'),
				'amount'		=> $this->input->post('amount'),
				'unit_id'		=> $this->input->post('unit_id'),
			);
			$this->session->set_flashdata($data);
		}
		redirect('master/items_type_optional/');
	}

	public function check_duplicate_items_type($name)
	{
		$check=$this->m_items_type->get_check_duplicate_items($name);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_items_type', 'Found duplicated name for '.$name.'! Please review your input.');
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
		$data['result']	= $this->m_items_type->get_item_by_id($id);
		$data['ls_unit']= $this->m_units->get_all_unit();
		// get message flashdata		
		$data['message']= $this->session->flashdata('message');
		$data['eror'] 	= $this->session->flashdata('eror');

		// load template
		$data['title']	= "Items Type Optional";
		$data['layout'] = "master/items_type_optional/edit";
		$data['javascript'] = "master/items_type_optional/javascript/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function edit_process(){
		$this->form_validation->set_rules('name', 'Scholarship Name', 'required|trim|xss_clean|callback_check_duplicate_items_type_ex_self');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim|xss_clean|numeric|greater_than[0]');
		$this->form_validation->set_rules('accounting_code', 'Accounting Code', 'required|trim|xss_clean');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description'),
				'amount'		=> $this->input->post('amount'),
				'unit_id'		=> $this->input->post('unit_id'),
				'accounting_code'	=> $this->input->post('accounting_code'),
				'packet'	=> '0',
			);
		
			$this->m_items_type->edit_items_type($data);
			$data['message'] = "Data successfully edited";
			$this->session->set_flashdata($data);
			redirect('master/items_type_optional/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description'),
				'amount'		=> $this->input->post('amount'),
				'unit_id'		=> $this->input->post('unit_id')
			);
			$this->session->set_flashdata($data);
			redirect('master/items_type_optional/edit/'.$this->input->post('id'));
		}
	}

	public function check_duplicate_items_type_ex_self($name)
	{
		$id=$this->input->post('id');
		$check=$this->m_items_type->get_check_duplicate_items_ex_self($name,$id);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_items_type_ex_self', 'Found duplicated name for '.$name.'! Please review your input.');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function delete($id) {
		$this->check_auth('D');
		$params['id']=$id;
		$params['is_deleted']=1;
		$this->m_items_type->edit_items_type($params);
		$data['message'] = "Data successfully deleted";
		$this->session->set_flashdata($data);
		redirect('master/items_type_optional');
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Item Type Optional Management';
		$this->session->set_userdata($data);
	}
}
