<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Students extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		// load model
		$this->load->model('m_students');
		$this->load->model('registration/m_registration');
		$this->load->model('payment/m_payments');

		// load portal
		$this->load->helper('text');

		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "master_data";
		$active['child_active'] = "students";
		$this->session->set_userdata($active);		
	}

	public function index()
	{
		// don't forget to give user_auth to every function before
		$this->check_auth('R');

		// two of these is a must
		// menu
		$data['menu']		 = $this->menu();
		// user detail
		$data['user']		 = $this->user;

		//data
		$data['ls_students'] = $this->m_students->get_all_students();

		// get message flashdata		
		$data['message'] = $this->session->flashdata('message');
		$data['eror'] = $this->session->flashdata('eror');
		$data['act'] = $this->session->flashdata('act');

		$data['layout'] = "master/students/list";
		$data['javascript'] = "master/students/javascript/j_list";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function get_students_list()
	{
		$params['nis'] = $_POST['nis'];
		$params['full_name'] = $_POST['full_name'];
		$params['unit_name'] = $_POST['unit_name'];
		$params['current_level'] = $_POST['current_level'];
		$params['status'] = $_POST['status'];
		$data = $this->m_students->get_siswa_list_by_filters($params);
		header('Content-Type: application/json');
	    echo json_encode($data);
	}

	public function manage_profile($nis)
	{
		// don't forget to give user_auth to every function before
		$this->check_auth('U');

		// two of these is a must
		// menu
		$data['menu']		 = $this->menu();
		// user detail
		$data['user']		 = $this->user;

		//data
		$data['rs_student'] = $this->m_registration->get_student_by_nis($nis);
		$data['ls_achievement'] = $this->m_students->get_achievement_student_by_nis($nis);
		$data['ls_invoices'] = $this->m_students->get_invoices_student_by_nis($nis);

		// get message flashdata		
		$data['message'] = $this->session->flashdata('message');
		$data['eror'] = $this->session->flashdata('eror');
		$actval=$this->session->flashdata('act');
		if(isset($actval) && !empty($actval))
			$data['act'] = $this->session->flashdata('act');
		else
			$data['act'] ="BI";

		$data['layout'] = "master/students/profile";
		$data['javascript'] = "master/students/javascript/j_profile";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function get_now() {
	    $this->load->helper('date');
        $datestring = '%Y-%m-%d %H:%i:%s';
        $time = time();
        $now = mdate($datestring, $time);
        return $now;
	}

	public function edit_profile_process($nis){
		foreach ($_POST as $value) {
			$input = array(
				'nis' => $value['siswa_nis'],
	            'full_name' => $value['siswa_nama_lengkap'],
	            'nick_name' => $value['siswa_nama_panggilan'],
	            'sex' => $value['siswa_jk'],
	            'pob' => $value['siswa_tempat_lahir'],
	            'dob' => $value['siswa_tgl_lahir'],
	            'children_to' => $value['siswa_anak_ke'],
	            'sibling_number' => $value['siswa_saudara'],
	            'stay_with' => $value['tinggal_bersama'],
	            'living_address' => $value['alamat_lengkap'],
	            'home_phone' => $value['telpon_rumah'],
	            'religion' => $value['siswa_agama'],
	            'nationality' => $value['siswa_kewarganegaraan'],

	            'father_full_name' => $value['nama_lengkap_ayah'],
	            'father_pob' => $value['tempat_lahir_ayah'],
	            'father_dob' => $value['tgl_lahir_ayah'],
	            'father_cell_phone' => $value['hp_ayah'],
	            'father_job' => $value['pekerjaan_ayah'],
	            'father_salary' => $value['penghasilan_ayah'],
	            'father_citizen' => $value['kewarganegaraan_ayah'],

	            'mother_full_name' => $value['nama_lengkap_ibu'],
	            'mother_pob' => $value['tempat_lahir_ibu'],
	            'mother_dob' => $value['tgl_lahir_ibu'],
	            'mother_cell_phone' => $value['hp_ibu'],
	            'mother_job' => $value['pekerjaan_ibu'],
	            'mother_salary' => $value['penghasilan_ibu'],
	            'mother_citizen' => $value['kewarganegaraan_ibu'],     

	            'guardian_full_name' => $value['nama_lengkap_wali'],
	            'guardian_job' => $value['pekerjaan_wali'],
	            'guardian_citizen' => $value['kewarganegaraan_wali'],

	            //'status'	 => $value['siswa_status'],
				'updated_on' => $this->get_now()
			);
			//masukan ke tabel siswa
			$insert = $this->m_students->edit_student($input);
		}
		$data['message'] = "Student data successfully updated";
		$data['act'] = "BI";
		$this->session->set_flashdata($data);
		redirect('master/students/manage_profile/'.$nis);	
	}

	public function edit_achievement_process($nis){
		foreach ($_POST as $value) {
			$input = array(
				'id' 			=> $value['id'],
				'achievement' 	=> $value['nama_prestasi'],
		        'type' 			=> $value['jenis_prestasi'],
		        'level' 		=> $value['tingkat_prestasi'],
		        'year' 			=> $value['tahun_prestasi'],
				'updated_on'	=> $this->get_now()
			);
			//masukan ke tabel siswa
			$insert = $this->m_students->edit_achievement($input);
		}
		$data['message'] = "Achievement data successfully updated";
		$data['act'] = "SA";
		$this->session->set_flashdata($data);
		redirect('master/students/manage_profile/'.$nis);
	}

	public function update_delete_invoices_process($id,$nis){
		$params['id']=$id;
		$params['deleted']=1;
		$this->m_payments->edit_invoices($params);
		$data['message'] = "Invoices data successfully deleted";
		$data['act'] = "IH";
		$this->session->set_flashdata($data);
		redirect('master/students/manage_profile/'.$nis);
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Master Data Students';
		$this->session->set_userdata($data);
	}
}
