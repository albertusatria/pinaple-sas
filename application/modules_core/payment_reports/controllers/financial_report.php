<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Financial_report extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		$this->load->model('m_account_report');

		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();
		// active page
		$active['parent_active'] = "payment_reports";
		$active['child_active'] = "financial_report";
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
		// $data['active_school_year'] = $this->m_school_year->get_active_year();		
		
		$data['layout'] = "payment_reports/financial-report/generate";
		$data['javascript'] = "payment_reports/financial-report/javascript/j_generate";
		$this->load->view('dashboard/admin/template', $data);
	}


	public function result()
	{
		// don't forget to give user_auth to every function before
		$this->check_auth('R');

		// $id = $this->input->post('report-type');
		// // echo $id; die;

		// $datestring = $this->input->post('date-range');
		// // echo $datestring; die;

		// $exp = explode(" ", $datestring); //1 December 2014 - 2 December 2014 
		// //convert Month
		// $start_day = $exp[0];
		// $start_month = $this->convert_month($exp[1]);
		// $start_year = $exp[2];

		// $end_day = $exp[4];
		// $end_month = $this-> convert_month($exp[5]);
		// $end_year = $exp[6];

		// $start = $start_year.'-'.$start_month.'-'.$start_day;
		// $end = $end_year.'-'.$end_month.'-'.$end_day;
		// echo $start; echo "<br>"; echo $end; echo "<br>";
		// echo "<pre>"; print_r($this->input->post()); die;
		// two of these is a must
		// menu
		$data['menu']	 = $this->menu();
		// user detail
		$data['user']	 = $this->user;
		//message
		$data['message'] = $this->session->flashdata('message');
		
		// $data['id']	= $id;
		$start = '2014-12-01';
		$end = '2015-01-31';
		$datestring = '01 December 2014 - 31 January 2015';

		$id = 'a04';
		$data['id'] = $id;

		if($id == 'a01')
		{
			$data['rs_accounts'] = $this->m_account_report->get_summary_of_profit_loss($start,$end);
			$data['periode'] = $datestring;
			//sum all journal group by acount code
			$data['layout'] = "payment_reports/financial-report/result_profit_loss";			
		}
		elseif($id == 'a05')
		{
			//laporan tahunan
			$data['rs_accounts'] = $this->m_account_report->get_summary_of_profit_loss($start,$end);
			$data['periode'] = $datestring;
			//sum all journal group by acount code
			$data['layout'] = "payment_reports/financial-report/result_profit_loss";						
		}
		elseif($id == 'a04')
		{
			//cash hari ini
			// $data['total_cash'] = $this->m_account_report->get_summary_of_profit_loss($start,$end);
			//transfer
			$data['cash_out'] = $this->m_account_report->get_summary_of_cash_out($start,$end);
			//pendapatan dan pengeluaran total
			$data['rs_accounts'] = $this->m_account_report->get_summary_of_profit_loss($start,$end);
			$data['periode'] = $datestring;
			$data['layout'] = "payment_reports/financial-report/result_cashflow";
		}
		else
		{
			if($id == 'a02')
			{
				$data['profit'] = $this->m_account_report->get_summary_of_profit($start,$end);
				$data['rs_accounts'] = $this->m_account_report->get_summary_of_profit_loss($start,$end);
				$data['periode'] = $datestring;
				$data['report_title'] = 'earns';
			}
			else
			{
				$data['profit'] = $this->m_account_report->get_summary_of_profit($start,$end);
				$data['rs_accounts'] = $this->m_account_report->get_summary_of_profit_loss($start,$end);
				$data['periode'] = $datestring;
				$data['report_title'] = 'loss';
			}
			$data['layout'] = "payment_reports/financial-report/result_single";
		}

		$data['javascript'] = "payment_reports/financial-report/javascript/j_result";
		$this->load->view('dashboard/admin/template', $data);
	}

	function convert_month($string) {
		switch ($string) {
		    case "January":
		        $month = "01";
		        break;
		    case "February":
		        $month = "02";
		        break;
		    case "March":
		        $month = "03";
		        break;
		    case "April":
		        $month = "04";
		        break;
		    case "May":
		        $month = "05";
		        break;
		    case "June":
		        $month = "06";
		        break;
		    case "July":
		        $month = "07";
		        break;
		    case "August":
		        $month = "08";
		        break;
		    case "September":
		        $month = "09";
		        break;
		    case "October":
		        $month = "10";
		        break;
		    case "November":
		        $month = "11";
		        break;
		    case "December":
		        $month = "12";
		        break;
		    default:
		        $month = "00";
		}

		return $month;
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
		$data['page_title'] = 'Budi Utama Financial Report';
		$this->session->set_userdata($data);
	}
}
