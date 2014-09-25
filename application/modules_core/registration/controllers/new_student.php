<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class New_student extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		$this->load->model('initiation/m_school_year');
		$this->load->model('m_extra');
		$this->load->model('m_registration');
		// load portal
		$this->load->helper('text');
		// page title
		$this->page_title();

		// active page
		$active['parent_active'] = "registration_data";
		$active['child_active'] = "new_students";
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
		
		$data['layout'] = "registration/new_student/list";
		$data['javascript'] = "registration/new_student/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function add_process()
	{

		foreach ($_POST as $value) {
			if ($value['profil'] == 'yes') {
				$input = array(

					'start_school_year_id' => $value['siswa_tahun_mulai'],
		            'previous_school' => $value['siswa_originschool'],
		            'previous_school_type' => $value['siswa_sekolah_asal'],
		            'unit_id' => $value['siswa_kelas'],
		            'start_level' => $value['siswa_jenjang'],
		            'current_level' => $value['siswa_jenjang'],
		            'nis' => $value['siswa_nis'],

		            'full_name' => $value['siswa_nama_lengkap'],
		            'nick_name' => $value['siswa_nama_panggilan'],
		            'sex' => $value['siswa_jk'],
		            'pob' => $value['siswa_tempat_lahir'],
		            'dob' => $value['siswa_tgl_lahir'],
		            'children_to' => $value['siswa_anak_ke'],
		            'sibling_number' => $value['siswa_saudara'],
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

		            'stay_with' => $value['tinggal_bersama'],
		            'living_address' => $value['alamat_lengkap'],
		            'home_phone' => $value['telpon_rumah'],

		            'guardian_full_name' => $value['nama_lengkap_wali'],
		            'guardian_job' => $value['pekerjaan_wali'],
		            'guardian_citizen' => $value['kewarganegaraan_wali'],

		            'status'			=> 'SISWA',
		            'registration_type'	=> $value['registration_type'],
					'created_on'		=> $this->get_now(),
					'updated_on'		=> $this->get_now()
				);
				//masukan ke tabel siswa
				$insert = $this->m_registration->add_new_student($input);
				//ambil id siswa
				$nis = $value['siswa_nis'];
			}
			else {
				$input = array(   
					'nis' => $nis,
			        'achievement' 	=> $value['nama_prestasi'],
			        'type' 			=> $value['jenis_prestasi'],
			        'level' 		=> $value['tingkat_prestasi'],
			        'year' 			=> $value['tahun_prestasi'],
					'created_on'	=> $this->get_now(),
					'updated_on'	=> $this->get_now()
				);
				//masukan ke tabel siswa_prestasi
				$insert = $this->m_registration->add_new_student_achievement($input);
			}
		}
		$data['message'] = "Data successfully added";
		$this->session->set_flashdata($data);
		redirect('registration/new_student/');		
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
		$data['page_title'] = 'New Students Registration Form';
		$this->session->set_userdata($data);
	}
}
