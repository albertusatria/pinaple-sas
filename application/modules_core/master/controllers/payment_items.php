<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Payment_items extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		$this->load->model('registration/m_extra');
		$this->load->model('initiation/m_school_year');
		$this->load->model('m_units');
		$this->load->model('m_items_type');		
		$this->load->model('m_administration_costs');
		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();
		// active page
		$active['parent_active'] = "payment_configuration";
		$active['child_active'] = "payment_items";
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
		//tahun ajaran
		$data['rs_school_year'] = $this->m_school_year->get_all_school_year();		
		//unit
		$data['rs_unit'] = $this->m_units->get_all_unit_for_administration_cost();

		if($this->input->post('sy_id')){
			//die($this->input->post('sy_id').$this->input->post('u_id'));
			$data['sy_id'] = $this->input->post('sy_id');
			$data['u_id']  = $this->input->post('u_id');
			$data['rs_items'] = $this->m_administration_costs->get_all_costs_by_sy_u($data['sy_id'],$data['u_id']);		
		}elseif($this->session->flashdata('id_sy')){
			$data['sy_id'] = $this->session->flashdata('id_sy');
			$data['u_id']  = $this->session->flashdata('id_u');
			$data['rs_items'] = $this->m_administration_costs->get_all_costs_by_sy_u($data['sy_id'],$data['u_id']);
		}else{
			$data['sy_id'] = $this->input->post('sy_id');
			$data['u_id'] = $this->input->post('u_id');
			$data['rs_items'] = 0;
		}

		$data['layout'] = "master/payment_items/list";
		$data['javascript'] = "master/payment_items/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Master Data Payment Items';
		$this->session->set_userdata($data);
	}


	public function add($sy_id,$u_id='') {
		// user_auth
		$this->check_auth('C');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// load template
		$data['r_sy'] = $this->m_school_year->get_school_year_by_id($sy_id);
		$data['rs_unit'] = $this->m_units->get_all_unit_for_administration_cost();
		$data['u_id'] = $u_id;
		$data['rs_it'] = $this->m_items_type->get_all_items_type();
		$data['message'] = $this->session->flashdata('message');
		$data['title']	= "Payment Items Setup PinapleSAS";
		$data['layout'] = "master/payment_items/add";
		$data['javascript'] = "master/payment_items/javascript/add";
		$this->load->view('dashboard/admin/template', $data);

	}

	// add process
	public function add_process() {
		// form validation
		$this->form_validation->set_rules('unit_id', 'Unit', 'required|trim|xss_clean');
		$this->form_validation->set_rules('item_type_id', 'Item Type', 'required|trim|xss_clean|callback_check_duplicate_cost');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim|xss_clean|numeric');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$this->m_administration_costs->add_administration_costs($this->input->post());
			$data['message'] = "Data successfully added";
			$data['id_sy'] = $this->input->post('school_year_id');
			$data['id_u'] = $this->input->post('unit_id');
			$this->session->set_flashdata($data);
			redirect('master/payment_items/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'unit_id'		=> $this->input->post('unit_id'),
				'item_type_id'	=> $this->input->post('item_type_id'),
				'amount'		=> $this->input->post('amount')
			);
			$this->session->set_flashdata($data);
			redirect('master/payment_items/add/'.$this->input->post('school_year_id'));
		}
	}

	public function edit($sy_id,$ac_id) {
		// user_auth
		$this->check_auth('U');

		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// load template
		$data['r_sy'] = $this->m_school_year->get_school_year_by_id($sy_id);
		$data['r_ac'] = $this->m_administration_costs->get_administration_cost_by_id($ac_id);
		$data['rs_unit'] = $this->m_units->get_all_unit_for_administration_cost();
		$data['rs_it'] = $this->m_items_type->get_all_items_type();
		$data['message']= $this->session->flashdata('message');
		$data['title']  = "Payment Items Setup PinapleSAS";
		$data['layout'] = "master/payment_items/edit";
		$data['javascript'] = "master/payment_items/javascript/edit";
		$this->load->view('dashboard/admin/template', $data);
	}

	// add process
	public function edit_process() {
		// form validation
		$this->form_validation->set_rules('unit_id', 'Unit', 'required|trim|xss_clean');
		$this->form_validation->set_rules('item_type_id', 'Item Type', 'required|trim|xss_clean|callback_check_duplicate_cost_except_self');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim|xss_clean|numeric');

		if ($this->form_validation->run() == TRUE) {
			// insert
			$this->m_administration_costs->edit_administration_costs($this->input->post());
			$data['message'] = "Data successfully edited";
			$data['id_sy'] = $this->input->post('school_year_id');
			$data['id_u'] = $this->input->post('unit_id');
			$this->session->set_flashdata($data);
			redirect('master/payment_items/');
		} else {
			$data = array(
				'message'		=> str_replace("\n", "", validation_errors()),
				'unit_id'		=> $this->input->post('unit_id'),
				'item_type_id'	=> $this->input->post('item_type_id'),
				'amount'		=> $this->input->post('amount')
			);
			$this->session->set_flashdata($data);
			redirect('master/payment_items/edit/'.$this->input->post('school_year_id').'/'.$this->input->post('id'));
		}
	}

	public function check_duplicate_cost($it_id)
	{
		$sy_id=$this->input->post('school_year_id');
		$un_id=$this->input->post('unit_id');
		//die($ta_id." : ".$un_id." : ".$it_id);
		$check=$this->m_administration_costs->get_check_duplicate_cost($sy_id,$un_id,$it_id);
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
		$sy_id=$this->input->post('school_year_id');
		$un_id=$this->input->post('unit_id');
		$id = $this->input->post('id');
		$check=$this->m_administration_costs->get_check_duplicate_cost_except_self($id,$sy_id,$un_id,$it_id);
	    if (!empty($check)){
			$this->form_validation->set_message('check_duplicate_cost_except_self', 'Duplicate Item Type on the Unit!');
			return false;       
		}
		else{
	        return true;
      	}
	}

	public function delete($id) {
		// user_auth
		$this->check_auth('D');

		$r_item = $this->m_administration_costs->get_administration_cost_by_id($id);
		
		$params['id']=$id;
		$this->m_administration_costs->delete_administration_costs($params);
		
		$data['message'] = "Data successfully deleted";
		$data['id_sy'] = $r_item->school_year_id;
		$data['id_u'] = $r_item->unit_id;
		$this->session->set_flashdata($data);
		
		redirect('master/payment_items/');
	}
}