<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Extras_first extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		
		$this->load->model('initiation/m_school_year');
		$this->load->model('master/m_units');
		$this->load->model('m_extra');
		$this->load->model('m_class');
		$this->load->model('registration/m_registration');
		// load permission
		$this->load->helper('text');
		// page title
		$this->page_title();


		// active page
		$active['parent_active'] = "students_placement";
		$active['child_active'] = "extra_placement_first";
		$this->session->set_userdata($active);		

	}

	public function index()
	{
		// user_auth
		$this->check_auth('R');
		// menu
		$data['menu']		= $this->menu();
		// user detail
		$data['user']		= $this->user;
		// get portal list
		$data['ls_unit']	= $this->m_units->get_all_unit_academic();
		// get tahun ajaran
		$data['year']		= $this->m_school_year->get_active_year();
		// load template
		$data['title']	= "Students Placement Setting Pinaple SAS";
		$data['layout'] = "placement/extra/list";
		$data['javascript'] = "placement/extra/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function list_extra($u_id="")
	{
		// user_auth
		$this->check_auth('R');

		$data['message'] = $this->session->flashdata('message');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get portal list
		$data['unit']	= $this->m_units->get_unit_by_id($u_id);
		// get tahun ajaran
		$data['year']	= $this->m_school_year->get_active_year();
		$sy_id = $data['year']->id;
		// get portal by slug
		$data['extras'] = $this->m_extra->get_enroll_open_extra_by_u_sy($u_id,$sy_id);
		// load template
		$data['title']	= "Students Placement Setting Pinaple SAS";
		$data['layout'] = "placement/extra/list_extra";
		$data['javascript'] = "placement/extra/javascript/list_extra";
		$this->load->view('dashboard/admin/template', $data);
	}	

	public function placement($id="")
	{
	// user_auth
		$this->check_auth('R');

		$data['message'] = $this->session->flashdata('message');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		
		$data['result'] = $this->m_extra->get_open_extra_by_id($id);

		$u_id=$data['result']->unit_id;
		$data['unit']	= $this->m_units->get_unit_by_id($u_id);
		// get tahun ajaran
		$data['year']	= $this->m_school_year->get_active_year();
		// get assigned student
		$data['siswas']	= $this->m_extra->get_extra_student($id,1);
		// load template
		$data['title']	= "Students Placement Setting Pinaple SAS";
		$data['layout'] = "placement/extra/placement";
		$data['javascript'] = "placement/extra/javascript/placement";
		$this->load->view('dashboard/admin/template', $data);

	}

	public function add_student($id = '')
	{
		// user_auth
		$this->check_auth('C');

		$data['message'] = $this->session->flashdata('message');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get portal list
		$data['result'] = $this->m_extra->get_open_extra_by_id($id);
		$u_id=$data['result']->unit_id;
		$data['unit']	= $this->m_units->get_unit_by_id($u_id);
		// get tahun ajaran
		$data['year']	= $this->m_school_year->get_active_year();
		$sy_id = $data['year']->id;
		// get assigned student
		$data['siswas']	= $this->m_extra->get_registered_student_not_enroll_in_this_extra($id,$u_id,$sy_id,1);
		// load template
		$data['title']	= "Students Grades PinapleSAS";
		$data['layout'] = "placement/extra/add";
		$data['javascript'] = "placement/extra/javascript/add";
		$this->load->view('dashboard/admin/template', $data);

	}

	public function add_process($id='')
	{
		if ($id == '')
		{
			echo "forbidden"; die();
		}

		// echo "<pre>"; print_r($_POST);die;

		foreach ($_POST as $value) 
		{
			if (isset($value['check']))
			{
				$params = array(
					'nis' 		=> $value['nis'],
	            	'extra_id' 	=> $value['extra_id'],
	            	'half_period' 	=> '1',
	            	'status' 	=> "BERJALAN"
	            	);
				$idx = $this->m_extra->add_extra_student($params);

				//generate invoice 07-12
				for ($i = 1; $i <= 6 ; $i++) { 

					$year = date('Y');
					$month = ($i+6);

					$params = array(					
						'nis' => $value['nis'],
						'packet_id' => NULL,
						'item_type_id' => '8',
						'qty' => 1,
						'amount' => $this->input->post('amount'),
		            	'extra_id' 	=> $idx,
						'period_id' => $i,
						'scholarship' => 0,
						'dc' => $this->get_now(),
						'payment_deadline' => $year.'-'.$month.'-10'
						);
					$this->m_registration->add_invoices($params);
				}				
			}

			// foreach ($this->input->post('invoice') as $invo) {
			// 	$params = array(
			// 		'nis' => $this->input->post('nis'),
			// 		'packet_id' => $invo['packet_id'],
			// 		'item_type_id' => $invo['item_type_id'],
			// 		'qty' => 1,
			// 		'amount' => $invo['amount'],
			// 		'period_id' => NULL,
			// 		'scholarship' => 0,
			// 		'dc' => $this->get_now(),
			// 		);
			// 	if ($invo['period_id'] != '' OR $invo['period_id'] != NULL) {
			// 		$params['period_id'] = $invo['period_id'];
			// 		$params['payment_deadline'] = date('Y').'-07-10';
			// 		$jumlah = $invo['amount'];
			// 	} 
			// 	$this->m_registration->add_invoices($params);
			// }

			// generate 11 SPP



		}

			$data['message'] = "Data successfully added";

			$this->session->set_flashdata($data);
			redirect('placement/extras_first/placement/'.$id);
	}

	public function delete($id = "",$nis = "",$c_id)
	{
		// user_auth
		$this->check_auth('D');
		$params['id']=$id;
		$params['nis']=$nis;
		if ($this->m_extra->delete_extra_student($params)) {
			$data['message'] = "Data successfully deleted";
		}
		$this->session->set_flashdata($data);
		redirect('placement/extras_first/placement/'.$c_id);
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
		$data['page_title'] = 'Extra Placement';
		$this->session->set_userdata($data);
	}
}
