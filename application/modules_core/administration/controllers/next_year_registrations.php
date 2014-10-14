<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Next_year_registrations extends Operator_base {

	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		$this->load->model('registration/m_extra');
		$this->load->model('registration/m_registration');
		$this->load->model('initiation/m_school_year');
		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "school_administration";
		$active['child_active'] = "next_year_registrations";
		$this->session->set_userdata($active);		
	}

	public function index()
	{
		// don't forget to give user_auth to every function before
		$this->check_auth('R');

		// two of these is a must
		// menu
		$data['menu']	 = $this->menu();
		// user detail
		$data['user']	 = $this->user;
		//message
		$data['message'] = $this->session->flashdata('message');
		//unit
		$data['ls_unit'] = $this->m_extra->get_all_unit_academic();
		// get active school year
		$data['school_year'] = $this->m_school_year->get_year_after_active_year();		
		
		$data['layout'] = "administration/next_year_registration/list";
		$data['javascript'] = "administration/next_year_registration/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function get_siswa_daftar_ulang()
	{
		foreach ($_POST as $value) {
			$keyword = $value['keyword'];
		}
		$data = $this->m_registration->get_list_siswa_next_year($keyword);
		header('Content-Type: application/json');
	    echo json_encode($data);
	}

	public function get_list_paket()
	{

		$data['year']	= $this->m_school_year->get_year_after_active_year();
		$sy_id = $data['year']->id;

		foreach ($_POST as $value) {
			$unit_id = $value['unit_id'];
			$current = $value['current'];
			$start = $value['start'];
		}
		$data = $this->m_registration->get_list_paket($unit_id,$current,$start,$sy_id);
		header('Content-Type: application/json');
	    echo json_encode($data);
	}

	public function get_list_packet_item()
	{
		foreach ($_POST as $value) {
			$packet_id = $value['packet_id'];
		}
		$data = $this->m_registration->get_list_packet_item($packet_id);
		header('Content-Type: application/json');
	    echo json_encode($data);

	}

	public function next_year_registration_process()
	{
		// echo '<pre>';print_r($this->input->post());die;
		// user_auth
		$this->check_auth('C');

		$this->form_validation->set_rules('nis', 'nis', 'required|trim|xss_clean');
		$this->form_validation->set_rules('school_year_id', 'school year id', 'required|trim|xss_clean');
		$this->form_validation->set_rules('invoice', 'Invoice List', 'required|trim|xss_clean');

		$params = array(
				'nis'			 => $this->input->post('nis'),
				'school_year_id' => $this->input->post('school_year_id'),
				'created_on'	 => $this->get_now()
			);

		$jumlah = 0;
		if ($this->m_registration->add_re_registration($params)) {

			foreach ($this->input->post('invoice') as $invo) {
				$params = array(
					'nis' => $this->input->post('nis'),
					'packet_id' => $invo['packet_id'],
					'item_type_id' => $invo['item_type_id'],
					'qty' => 1,
					'amount' => $invo['amount'],
					'period_id' => NULL,
					'scholarship' => 0,
					'dc' => $this->get_now()
					);
				if ($invo['period_id'] != '' OR $invo['period_id'] != NULL) {
					$params['period_id'] = $invo['period_id'];
					$jumlah = $invo['amount'];
				} 
				$this->m_registration->add_invoices($params);
			}

			// generate 11 SPP
			for ($i = 2; $i <= 12 ; $i++) { 
				$params = array(
					'nis' => $this->input->post('nis'),
					'packet_id' => NULL,
					'item_type_id' => '6',
					'qty' => 1,
					'amount' => $jumlah,
					'period_id' => $i,
					'scholarship' => 0,
					'dc' => $this->get_now()
					);
				$this->m_registration->add_invoices($params);
			}



			// $this->_generate_invoice($params,$id_unit);
			$data['message'] = "Siswa nis : ".$this->input->post('nis')." telah berhasil didaftarulangkan..";
		}
		$this->session->set_flashdata($data);		
		redirect('administration/next_year_registrations/');
	}	

	public function get_now() {
	    $this->load->helper('date');
        $datestring = '%Y-%m-%d %H:%i:%s';
        $time = time();
        $now = mdate($datestring, $time);
        return $now;
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Next Year Registration Form';
		$this->session->set_userdata($data);
	}
}
