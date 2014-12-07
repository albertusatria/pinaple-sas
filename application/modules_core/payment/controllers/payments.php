<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Payments extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		$this->load->model('m_payments');

		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "student_payments";
		$active['child_active'] = "payments";
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
		//$data['ls_unit'] = $this->m_units->get_all_unit_academic();
		
		// get active school year
		//$data['active_school_year'] = $this->m_school_year->get_active_year();		
		
		$data['layout'] = "payment/list";
		$data['javascript'] = "payment/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	//ajax request
	public function get_siswa_info()
	{
		foreach ($_POST as $value) {
			$keyword = $value['keyword'];
		}
		$data = $this->m_payments->get_list_siswa($keyword);
		header('Content-Type: application/json');
	    echo json_encode($data);
	}

	public function get_siswa_invoice()
	{
		foreach ($_POST as $value) {
			$nis = $value['nis'];
		}
		$data = $this->m_payments->get_siswa_invoice($nis);
		header('Content-Type: application/json');
	    echo json_encode($data);		
	}

	public function payment_process()
	{
		foreach ($_POST as $value => $val) {
			$params = array(
				'status' => $val['status'],
				'amount_paid' => $val['amount_paid'],
				'last_payment_date' => $this->get_now()
				);

			$data = $this->m_payments->payment_process($val['id'],$params);
		}
		header('Content-Type: application/json');
	    echo json_encode($data);		
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
		$data['page_title'] = 'Payment Page';
		$this->session->set_userdata($data);
	}
}
