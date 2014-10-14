<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Extras_second extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		
		$this->load->model('initiation/m_school_year');
		$this->load->model('master/m_units');
		$this->load->model('placement/m_extra');
		$this->load->model('placement/m_class');
		// load permission
		$this->load->helper('text');
		// page title
		$this->page_title();


		// active page
		$active['parent_active'] = "school_administration";
		$active['child_active'] = "extra_placement_second";
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
		$data['ls_unit']	= $this->m_units->get_all_unit();
		// get tahun ajaran
		$data['year']		= $this->m_school_year->get_active_year();
		// load template
		$data['title']	= "Students Placement Setting Pinaple SAS";
		$data['layout'] = "administration/extra/list";
		$data['javascript'] = "administration/extra/javascript/list";
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
		$data['layout'] = "administration/extra/list_extra";
		$data['javascript'] = "administration/extra/javascript/list_extra";
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
		$data['siswas']	= $this->m_extra->get_extra_student($id,2);
		// load template
		$data['title']	= "Students Placement Setting Pinaple SAS";
		$data['layout'] = "administration/extra/placement";
		$data['javascript'] = "administration/extra/javascript/placement";
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
		$data['siswas']	= $this->m_extra->get_registered_student_not_enroll_in_this_extra($id,$u_id,$sy_id,2);
		// load template
		$data['title']	= "Students Grades PinapleSAS";
		$data['layout'] = "administration/extra/add";
		$data['javascript'] = "administration/extra/javascript/add";
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
	            	'half_period' 	=> '2',
	            	'status' 	=> "BERJALAN"
	            	);
				$this->m_extra->add_extra_student($params);
			}
				// echo "<pre>"; print_r($_POST); die;

		}

			$data['message'] = "Data successfully added";

			$this->session->set_flashdata($data);
			redirect('administration/extras_first/placement/'.$id);
	}

	public function delete($id = "",$c_id)
	{
	// user_auth
		$this->check_auth('D');
		$params['id']=$id;
		if ($this->m_extra->delete_extra_student($params)) {
			$data['message'] = "Data successfully deleted";
		}
		$this->session->set_flashdata($data);
		redirect('administration/extras_first/placement/'.$c_id);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Extra Placement';
		$this->session->set_userdata($data);
	}
}
