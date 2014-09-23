<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Invoice_packet extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		$this->load->model('m_packet');	

		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "payment_configuration";
		$active['child_active'] = "invoice_packet";
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

		$data['message'] = $this->session->flashdata('message');

		$data['rs_packet'] = $this->m_packet->get_all_packet();		
		$data['layout'] = "master/invoice_packet/list";
		$data['javascript'] = "master/invoice_packet/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function add() {
		// form validation
		
		$this->check_auth('C');

		$this->form_validation->set_rules('name', 'Packet Name', 'required|trim|xss_clean|callback_check_duplicate_packet');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$data = array(
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description')
			);
		
			$this->m_packet->add_packet($data);
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('master/invoice_packet/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description')
			);
			$this->session->set_flashdata($data);
			redirect('master/invoice_packet/');
		}
	}

	public function edit($id) {
		// user_auth
		$this->check_auth('U');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		$data['result'] = $this->m_packet->get_packet_by_id($id);

		// load template
		$data['message']= $this->session->flashdata('message');
		$data['title']  = "Edit Packet";
		$data['layout'] = "master/invoice_packet/edit";
		$data['javascript'] = "master/invoice_packet/javascript/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('name', 'Packet Name', 'required|trim|xss_clean|callback_check_duplicate_packet_ex_self');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$data = array(
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description')
			);
		
			$this->m_packet->edit_packet($data);
			$data['message'] = "Data successfully edited";
			$this->session->set_flashdata($data);
			redirect('master/invoice_packet/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description')
			);
			$this->session->set_flashdata($data);
			redirect('master/invoice_packet/edit/'.$this->input->post('id'));
		}
	}
	
	// delete
	public function delete($id) {
		// user_auth
		$this->check_auth('D');
		
		$params['id']=$id;
		$this->m_packet->delete_packet($params);
		$data['message'] = "Data successfully deleted";
		$this->session->set_flashdata($data);
		redirect('master/invoice_packet');
	}
	

	public function check_duplicate_packet($packet_name)
	{
		$check=$this->m_packet->get_check_duplicate_packet($packet_name);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_items', 'Found duplicated for '.$packet_name.'! Please review your input.');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function check_duplicate_packet_ex_self($packet_name)
	{
		$id=$this->input->post('id');
		$check=$this->m_packet->get_check_duplicate_packet_ex_self($packet_name,$id);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_items', 'Found duplicated for '.$packet_name.'! Please review your input.');
			return false;       
		}
		else{
	        return true;
      	}
	}


	// page title
	public function page_title() {
		$data['page_title'] = 'Master Data Invoice Packet';
		$this->session->set_userdata($data);
	}
}
