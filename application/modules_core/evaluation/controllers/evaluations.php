<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Evaluations extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('initiation/m_school_year');
		$this->load->model('master/m_units');
		$this->load->model('placement/m_extra');
		$this->load->model('placement/m_class');
		//$this->load->model('m_pendaftaran');
		// load permission
		$this->load->helper('text');
		// page title
		$this->page_title();
		$active['parent_active'] = "closing_evaluations";
		$active['child_active'] = "student_evaluations";
		$this->session->set_userdata($active);
	}

	public function index()
	{
		// user_auth
		$this->check_auth('R');

		$data['message'] = $this->session->flashdata('message');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		
		$data['ls_unit']	= $this->m_units->get_all_unit();
		// get tahun ajaran
		$data['year']		= $this->m_school_year->get_active_year();
		// data kelas
		$data['kelass']		= $this->m_class->get_open_class_by_year($data['year']->id);
		// data siswa di kelas itu
				
		// load template
		$data['title']	= "Students Evaluations Pinaple SAS";
		$data['layout'] = "evaluation/list";
		$data['javascript'] = "evaluation/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function student_list()
	{
		// echo "<pre>";print_r($_POST);die;
		$id = '';
		foreach ($_POST as $value) {
			$id = $value['id_buka'];
		}
		// get assigned student
		$siswas	= $this->m_class->get_class_student($id);
		 //add the header here
	    header('Content-Type: application/json');
	    echo json_encode($siswas);		
    	// get assigned student
		// $data['siswas']	= $this->m_kelas->get_siswa_kelas();
	}
	//kurang jenjangnya ditambah
	//nek lulus dijadikan ALUMNI
	public function update_kesimpulan()
	{
        $this->load->helper('date');
        $datestring = '%Y-%m-%d %h:%i:%a';
        $time = time();
        $now = mdate($datestring, $time);

		// echo "<pre>";print_r($_POST);die;
		$id = '';
		foreach ($_POST as $value) {
			$id = $value['id'];
			$input = array(
				'status'		=> 'BERAKHIR',
				'conclusion'	=> $value['kesimpulan'],
				'updated_on'	=> $now
				);
			// echo "<pre>"; print_r($input);die;
			// get assigned student
			$update = $this->m_class->update_student_conclusion($id,$input);
		
			$r_sc = $this->m_class->get_class_student_by_id($id);
			switch ($value['kesimpulan']) {
				case 'NAIK KELAS':
						$tgkt=$r_sc->current_level+1;
					break;
				default:
						$tgkt=$r_sc->current_level;
					break;
			}
		
			$params  = array(
				'nis' => $r_sc->nis,
				'updated_on' => $now,
				'current_level' => $tgkt
				);
			$this->m_class->update_evaluation_users_student($params);
		
		}
		 // //add the header here
	    header('Content-Type: application/json');
	    // echo json_encode($$_POST);		
    	// get assigned student
		// $data['siswas']	= $this->m_kelas->get_siswa_kelas();
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Students Evaluations';
		$this->session->set_userdata($data);
	}
}
