<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Re_registration extends Operator_base {

	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		$this->load->model('m_extra');
		$this->load->model('m_registration');
		$this->load->model('initiation/m_school_year');
		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "registration_data";
		$active['child_active'] = "re-registration";
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
		$data['active_school_year'] = $this->m_school_year->get_active_year();		
		
		$data['layout'] = "registration/re_registration/list";
		$data['javascript'] = "registration/re_registration/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function get_siswa_daftar_ulang()
	{
		foreach ($_POST as $value) {
			$keyword = $value['keyword'];
		}
		$data = $this->m_registration->get_list_siswa($keyword);
		header('Content-Type: application/json');
	    echo json_encode($data);
	}

	public function re_registration_process()
	{
		// user_auth
		$this->check_auth('C');

		$this->form_validation->set_rules('nis', 'nis', 'required|trim|xss_clean');
		$this->form_validation->set_rules('school_year_id', 'school year id', 'required|trim|xss_clean');


		$params = array(
				'nis'			 => $this->input->post('nis'),
				'school_year_id' => $this->input->post('school_year_id'),
				'created_on'	 => $this->get_now()
			);
		
		if ($this->m_registration->add_re_registration($params)) {
			// $this->_generate_invoice($params,$id_unit);
			$data['message'] = "Siswa nis : ".$this->input->post('nis')." telah berhasil didaftarulangkan..";
		}
		$this->session->set_flashdata($data);		
		redirect('registration/re_registration/');
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
		$data['page_title'] = 'Re-registration Form';
		$this->session->set_userdata($data);
	}
}
