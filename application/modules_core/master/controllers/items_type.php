<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Items_type extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		$this->load->model('m_items_type');		

		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();
		// active page
		$active['parent_active'] = "master_data";
		$active['child_active'] = "items_type";
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
		$data['rs_items_type'] = $this->m_items_type->get_all_items_type();		
		$data['rs_num_rows'] = $this->m_items_type->get_total_rows();
		$data['layout'] = "master/items_type/list";
		$data['javascript'] = "master/items_type/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Initialation Items Type for Payment Items';
		$this->session->set_userdata($data);
	}

	// add process
	public function add_items() {
		// form validation
		
		$this->check_auth('C');
		
		$this->form_validation->set_rules('name', 'Item Type Name', 'required|trim|xss_clean|callback_check_duplicate_items');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$data = array(
				'id'			=> $this->m_items_type->get_total_rows(),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description')
			);
		
			$this->m_items_type->add_items_type($data);
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('master/items_type/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'id'			=> $this->m_items_type->get_total_rows(),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description')
			);
			$this->session->set_flashdata($data);
			redirect('master/items_type/');
		}
	}

	public function edit($id) {
		// user_auth
		$this->check_auth('U');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		$data['result'] = $this->m_items_type->get_item_by_id($id);

		// load template
		$data['message']= $this->session->flashdata('message');
		$data['title']  = "Edit Items Type";
		$data['layout'] = "master/items_type/edit";
		$data['javascript'] = "master/items_type/javascript/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('name', 'Item Type Name', 'required|trim|xss_clean|callback_check_duplicate_items_ex_self');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$data = array(
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description')
			);
		
			$this->m_items_type->edit_items_type($data);
			$data['message'] = "Data successfully edited";
			$this->session->set_flashdata($data);
			redirect('master/items_type/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description')
			);
			$this->session->set_flashdata($data);
			redirect('master/items_type/edit/'.$this->input->post('id'));
		}
	}
	
	// delete
	public function delete($id) {
		// user_auth
		$this->check_auth('D');
		
		$params['id']=$id;
		$this->m_items_type->delete_items($params);
		$data['message'] = "Data successfully deleted";
		$this->session->set_flashdata($data);
		redirect('master/items_type');
	}
	

	public function check_duplicate_items($item_name)
	{
		$check=$this->m_items_type->get_check_duplicate_items($item_name);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_items', 'Found duplicated for '.$item_name.'! Please review your input.');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function check_duplicate_items_ex_self($items_name)
	{
		$id=$this->input->post('id');
		$check=$this->m_items_type->get_check_duplicate_items_ex_self($items_name,$id);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_items', 'Found duplicated for '.$items_name.'! Please review your input.');
			return false;       
		}
		else{
	        return true;
      	}
	}

}