<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Invoice_initiation extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		$this->load->model('m_units');
		$this->load->model('m_packets');	
		$this->load->model('m_packets_initiation');	
		$this->load->model('m_packet_items');
		$this->load->model('m_packet_items_year');
		$this->load->model('m_items_type');
		$this->load->model('initiation/m_school_year');
		
		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "payment_configuration";
		$active['child_active'] = "invoice_initiation";
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
		$data['ls_unit'] = $this->m_units->get_all_unit_academic();
		$data['year']	= $this->m_school_year->get_active_year();
		$sy_id = $data['year']->id;
		
		$data['rs_packet'] = $this->m_packets_initiation->get_all_packet($sy_id);
		$data['template'] = $this->m_packets->get_all_packet();
		// echo "<pre>"; print_r($data['template']); die;
		$data['rs_unit'] = $this->m_units->get_all_unit();				
		$data['layout'] = "master/invoice_initiation/list";
		$data['javascript'] = "master/invoice_initiation/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function add() {
		// form validation
		
		$this->check_auth('C');

		$this->form_validation->set_rules('name', 'Packet Name', 'required|trim|xss_clean|callback_check_duplicate_packet');
		//$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {

			$data['year']	= $this->m_school_year->get_active_year();
			$sy_id = $data['year']->id;

			// insert
			$data = array(
				'name'				=> $this->input->post('name'),
				'description'		=> $this->input->post('description'),
				'unit_id'			=> $this->input->post('unit_id'),
				'for_new_student'	=> $this->input->post('for_new_student'),
				'stage'				=> $this->input->post('stage'),
				'school_year_id'=> $sy_id
			);
			
			$this->m_packets_initiation->add_packet($data);
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('master/invoice_initiation/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description')
			);
			$this->session->set_flashdata($data);
			redirect('master/invoice_initiation/');
		}
	}

	// add process
	public function add_template() {
		// form validation
		// echo "<pre>"; print_r($this->input->post());die;

		$this->check_auth('C');

		$this->form_validation->set_rules('copy_template', 'Template ID', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {

			$data['year']	= $this->m_school_year->get_active_year();
			$sy_id = $data['year']->id;
		
			$this->m_packets_initiation->add_packet_using_template($this->input->post('copy_template'),$sy_id);
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
			redirect('master/invoice_initiation/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description')
			);
			$this->session->set_flashdata($data);
			redirect('master/invoice_initiation/');
		}
	}



	public function edit($id) {
		// user_auth
		$this->check_auth('U');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		$data['result'] = $this->m_packets_initiation->get_packet_by_id($id);
		// echo "<pre>"; print_r($data['result']); die;
		$data['rs_unit'] = $this->m_units->get_all_unit();	
		$data['ls_unit'] = $this->m_units->get_all_unit_academic();
		
		// load template
		$data['message']= $this->session->flashdata('message');
		$data['title']  = "Edit Packet";
		$data['layout'] = "master/invoice_initiation/edit";
		$data['javascript'] = "master/invoice_initiation/javascript/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('name', 'Packet Name', 'required|trim|xss_clean|callback_check_duplicate_packet_ex_self');
		//$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$data = array(
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description'),
				'unit_id'			=> $this->input->post('unit_id'),
				'for_new_student'	=> $this->input->post('for_new_student'),
				'stage'				=> $this->input->post('stage'),
			);
		
			$this->m_packets_initiation->edit_packet($data);
			$data['message'] = "Data successfully edited";
			$this->session->set_flashdata($data);
			redirect('master/invoice_initiation/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'id'			=> $this->input->post('id'),
				'name'			=> $this->input->post('name'),
				'description'	=> $this->input->post('description'),
				'unit_id'			=> $this->input->post('unit_id'),
				'for_new_student'	=> $this->input->post('for_new_student'),
				'stage'				=> $this->input->post('stage'),
			);
			$this->session->set_flashdata($data);
			redirect('master/invoice_initiation/edit/'.$this->input->post('id'));
		}
	}
	
	// delete
	public function delete($id) {
		// user_auth
		$this->check_auth('D');
		
		$params['id']=$id;
		$this->m_packets->delete_packet_year($params);
		$data['message'] = "Data successfully deleted";
		$this->session->set_flashdata($data);
		redirect('master/invoice_initiation');
	}
	
	public function check_duplicate_packet($packet_name)
	{
		$check=$this->m_packets_initiation->get_check_duplicate_packet($packet_name);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_packet', 'Found duplicated for '.$packet_name.'! Please review your input.');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function check_duplicate_packet_ex_self($packet_name)
	{
		$id=$this->input->post('id');
		$check=$this->m_packets_initiation->get_check_duplicate_packet_ex_self($packet_name,$id);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_packet_ex_self', 'Found duplicated for '.$packet_name.'! Please review your input.');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function list_items($id)
	{
		// don't forget to give user_auth to every function before
		$this->check_auth('R');

		// two of these is a must
		// menu
		$data['menu']	= $this->menu();
		// user detail
		$data['user']	= $this->user;

		$data['message_amount'] = $this->session->flashdata('message_amount');
		$data['message'] = $this->session->flashdata('message');

		$data['r_packet'] = $this->m_packets_initiation->get_packet_by_id($id);
		$data['rs_packet_items'] = $this->m_packet_items_year->get_all_packet_items_by_p_id($id);
		// echo "<pre>"; print_r($data['rs_packet_items']);die;
		$data['rs_items_type'] = $this->m_items_type->get_all_option_of_mandatory_items_type($id,'init');		
		$data['layout'] = "master/invoice_initiation/list_items";
		$data['javascript'] = "master/invoice_initiation/javascript/list_items";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function edit_amount() {
		// form validation
		// print_r($this->input->post());die;

		$this->check_auth('U');

		// $this->form_validation->set_rules('data[]', 'Data Amount', 'required|trim|xss_clean');
		$this->form_validation->set_rules('packet_id_amount', 'Packet ID', 'required|trim|xss_clean');

		// echo "<pre>"; print_r($this->input->post());die;

		if ($this->form_validation->run() == TRUE) {
			// insert
			foreach ($this->input->post('data') as $item) {
				$params['amount'] = $item['amount'];	
				$id = $item['id'];	
				$this->m_packet_items_year->edit_amount($id,$params);
			}		
			$data['message_amount'] = "Data successfully edited";
			$this->session->set_flashdata($data);
		} else {
			$data = array(
				'message_amount'=> str_replace("\n", "", validation_errors()),
			);
			$this->session->set_flashdata($data);
		}
		redirect('master/invoice_initiation/list_items/'.$this->input->post('packet_id_amount'));
	}



	public function add_item() {
		// form validation
		// print_r($this->input->post());die;

		$this->check_auth('C');

		$this->form_validation->set_rules('item_type_id', 'Item Name', 'required|trim|xss_clean|callback_check_duplicate_packet_items');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$params = array(
				'item_type_id' => $this->input->post('item_type_id'),
				'packet_id'	=> $this->input->post('packet_id'),
				'amount'	=> 0
			);

			if ($this->input->post('payment_type') == 'MONTHLY PAYMENT') 
			{
				$params['period_id'] = '1';
			}
		
			$this->m_packet_items_year->add_packet_items($params);
			$data['message'] = "Data successfully added";
			$this->session->set_flashdata($data);
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'item_type_id'	=> $this->input->post('item_type_id')
			);
			$this->session->set_flashdata($data);
		}
		redirect('master/invoice_initiation/list_items/'.$this->input->post('packet_id'));
	}

	public function check_duplicate_packet_items($item_type_id)
	{
		$packet_id=$this->input->post('packet_id');
		$check=$this->m_packet_items_year->get_check_duplicate_packet_items($item_type_id,$packet_id);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_packet_items', 'Found duplicated item! Please review your input.');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function delete_item($id,$p_id) {
		// user_auth
		$this->check_auth('D');
		
		$params['id']=$id;
		$this->m_packet_items->delete_packet_items($params);
		$data['message'] = "Data successfully deleted";
		$this->session->set_flashdata($data);
		redirect('master/invoice_initiation/list_items/'.$p_id);
	}

	public function get_detail_of_payment_item() {
		foreach ($_POST as $value) 
		{
			$id = $value['id'];
		}
		//masukan ke tabel siswa
		$query = $this->m_packet_items->get_detail_of_payment_item($id);
		header('Content-Type: application/json');
	    echo json_encode($query);

	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Master Data Invoice Packet';
		$this->session->set_userdata($data);
	}
}
