<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Accounts extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		$this->load->model('m_accounts');		

		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();
		// active page
		$active['parent_active'] = "master_data";
		$active['child_active'] = "accounts";
		$this->session->set_userdata($active);		
	}

	public function index()
	{
		// don't forget to give user_auth to every function before
		$this->check_auth('R');

		// two of these is a must
		// menu
		$data['menu']	= $this->menu();
		// user detail
		$data['user']	= $this->user;
		//message
		$data['message'] = $this->session->flashdata('message');
		//all items
		$data['rs_accounts'] = $this->m_accounts->get_accounting_nested();		
		//$data['rs_accounts_rows'] = $this->m_accounts->get_total_rows();
		$data['layout'] = "master/accounts/list";
		$data['javascript'] = "master/accounts/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Accounts Management';
		$this->session->set_userdata($data);
	}

	// add process
	public function add_sub_accounts() {
		// form validation
		
		$this->check_auth('C');
		$this->form_validation->set_rules('new_sub_tipe', 'Code Type', 'required|trim|xss_clean');
		$this->form_validation->set_rules('new_sub_parent_id', 'Parent Code', 'required|trim|xss_clean');
		$this->form_validation->set_rules('new_sub_accounting_id', 'Account Code', 'required|trim|xss_clean|callback_check_duplicate_accounts_id');
		$this->form_validation->set_rules('new_sub_name', 'Accounts Name', 'required|trim|xss_clean|callback_check_duplicate_accounts');
		$this->form_validation->set_rules('new_sub_description', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('new_sub_postable', 'Postable Type', 'required|trim|xss_clean');
		
		if ($this->form_validation->run() == TRUE) {
			// insert
			$data = array(
				'accounting_id'			=> $this->input->post('new_sub_accounting_id'),
				'name'			=> $this->input->post('new_sub_name'),
				'parent_id'		=> $this->input->post('new_sub_parent_id'),
				'tipe'			=> $this->input->post('new_sub_tipe'),
				'description'	=> $this->input->post('new_sub_description'),
				'postable'		=> $this->input->post('new_sub_postable'),
				'branchable'	=> '0',
				'mandatory'		=> '0'
			);
		
			$this->m_accounts->add_accounts($data);
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('master/accounts/');
		} else {
			$data = array(
			'message'		=> str_replace("\n", "", validation_errors()),
			);
			$this->session->set_flashdata($data);
			redirect('master/accounts/');
		}
	}

	// add process
	public function add_accounts() {
		// form validation
		
		$this->check_auth('C');
		$this->form_validation->set_rules('new_sub_tipe', 'Code Type', 'required|trim|xss_clean');
		$this->form_validation->set_rules('new_sub_accounting_id', 'Account Code', 'required|trim|xss_clean|callback_check_duplicate_accounts_id');
		$this->form_validation->set_rules('new_sub_name', 'Accounts Name', 'required|trim|xss_clean|callback_check_duplicate_accounts');
		$this->form_validation->set_rules('new_sub_description', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('new_sub_postable', 'Postable Type', 'required|trim|xss_clean');
		
		if ($this->form_validation->run() == TRUE) {
			// insert

			$data = array(
				'accounting_id'			=> $this->input->post('new_sub_accounting_id'),
				'name'			=> $this->input->post('new_sub_name'),
				'parent_id'		=> NULL,
				'tipe'			=> $this->input->post('new_sub_tipe'),
				'description'	=> $this->input->post('new_sub_description'),
				'postable'		=> $this->input->post('new_sub_postable'),
				'branchable'	=> '0',
				'mandatory'		=> '0'
			);

			if ($this->input->post('new_sub_postable') == 'HA') {
				$data['branchable'] = '1';
			} else {				
				$data['branchable'] = '0';
			}
		
			$this->m_accounts->add_accounts($data);
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('master/accounts/');
		} else {
			$data = array(
			'message'		=> str_replace("\n", "", validation_errors()),
			);
			$this->session->set_flashdata($data);
			redirect('master/accounts/');
		}
	}

	public function edit($id) {
		// user_auth
		$this->check_auth('U');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		$data['result'] = $this->m_accounts->get_accounts_by_id($id);

		// load template
		$data['message']= $this->session->flashdata('message');
		$data['title']  = "Edit Accounts";
		$data['layout'] = "master/accounts/edit";
		$data['javascript'] = "master/accounts/javascript/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function edit_accounts() {
		// form validation
		$this->form_validation->set_rules('edit_accounting_id', 'Account Code', 'required|trim|xss_clean');
		$this->form_validation->set_rules('edit_name', 'Accounts Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('edit_description', 'Description', 'trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$data = array(
				'name'			=> $this->input->post('edit_name'),
				'description'	=> $this->input->post('edit_description')
			);
		
			$data = $this->m_accounts->edit_accounts($data,$this->input->post('edit_accounting_id'));
			if ($data == true) {
				$data['message'] = "Data successfully edited";
			} else {
				$data = array(
					'message'		=> 'Something Bad Happened. Failed to delete this account!',
				);
			}
				$this->session->set_flashdata($data);
				redirect('master/accounts/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'name'			=> $this->input->post('edit_name'),
				'description'	=> $this->input->post('edit_description')
			);
			$this->session->set_flashdata($data);
			redirect('master/accounts/');
		}
	}
	
	// delete
	public function delete($id) {
		// user_auth
		$this->check_auth('D');
		
		$params['accounting_id']=$id;
		$response = $this->m_accounts->delete_accounts($params);
		if ($response == 'mandatory') {
			$data['message'] = "Cannot delete!. This account is mandatory account. ";
		} elseif($response == 'use') {
			$data['message'] = "Cannot delete!. This account has been used before";
		} elseif($response == 'child_use') {
			$data['message'] = "Cannot delete! Child Account has been used before";
		} elseif($response == 'berhasil') {
			$data['message'] = "Data successfully deleted";
		} else {
			$data['message'] = "Opps! Something bad happened";
		}
		$this->session->set_flashdata($data);
		redirect('master/accounts');
	}
	

	public function check_duplicate_accounts($item_name)
	{
		$check=$this->m_accounts->get_check_duplicate_accounts($item_name);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_accounts', 'Found duplicated for '.$item_name.'! Please review your input.');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function check_duplicate_accounts_id($id)
	{
		$check=$this->m_accounts->get_accounts_by_id($id);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_accounts_id', 'Found duplicated for ID: '.$id.'! Please review your input.');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function check_duplicate_accounts_ex_self($items_name)
	{
		$id=$this->input->post('id');
		$check=$this->m_accounts->get_check_duplicate_accounts_ex_self($items_name,$id);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_accounts_ex_self', 'Found duplicated for '.$items_name.'! Please review your input.');
			return false;       
		}
		else{
	        return true;
      	}
	}

	function get_accounting_code() {
		$data = $this->m_accounts->get_all_accounts();
		header('Content-Type: application/json');
	    echo json_encode($data);
		
	}

}