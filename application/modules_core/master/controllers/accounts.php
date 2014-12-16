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
		$data['rs_accounts'] = $this->m_accounts->get_all_accounts();		
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
	public function add_accounts() {
		// form validation
		
		$this->check_auth('C');
		$this->form_validation->set_rules('id', 'Id', 'required|trim|xss_clean|exact_length[5]|callback_check_duplicate_accounts_id');
		$this->form_validation->set_rules('name', 'Accounts Name', 'required|trim|xss_clean|callback_check_duplicate_accounts');
		$this->form_validation->set_rules('group', 'Group Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');
		
		if ($this->form_validation->run() == TRUE) {
			// insert
			$data = array(
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'group'			=> $this->input->post('group'),
				'description'	=> $this->input->post('description')
			);
		
			$this->m_accounts->add_accounts($data);
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('master/accounts/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'group'			=> $this->input->post('group'),
				'description'	=> $this->input->post('description')
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
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('name', 'Accounts Name', 'required|trim|xss_clean|callback_check_duplicate_accounts_ex_self');
		$this->form_validation->set_rules('group', 'Group Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$data = array(
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'group'			=> $this->input->post('group'),
				'description'	=> $this->input->post('description')
			);
		
			$this->m_accounts->edit_accounts($data);
			$data['message'] = "Data successfully edited";
			$this->session->set_flashdata($data);
			redirect('master/accounts/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'group'			=> $this->input->post('group'),
				'description'	=> $this->input->post('description')
			);
			$this->session->set_flashdata($data);
			redirect('master/accounts/edit/'.$this->input->post('id'));
		}
	}
	
	// delete
	public function delete($id) {
		// user_auth
		$this->check_auth('D');
		
		$params['id']=$id;
		$this->m_accounts->delete_accounts($params);
		$data['message'] = "Data successfully deleted";
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

}