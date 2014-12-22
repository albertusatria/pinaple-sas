<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class New_student extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();

		// load all the related model here
		$this->load->model('initiation/m_school_year');
		$this->load->model('master/m_units');
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
		$data['ls_unit'] = $this->m_units->get_all_unit_academic();
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

	public function import_excel(){
		$this->check_auth('C');

		$data['message'] = $this->session->flashdata('message');
		$data['menu'] = $this->menu();
		$data['user'] = $this->user;

		$data['ls_unit'] = $this->m_units->get_all_unit_academic();
		$data['active_school_year'] = $this->m_school_year->get_active_year();		
		
		$data['layout'] = "registration/new_student/import_excel";
		$data['javascript'] = "registration/new_student/javascript/import_excel";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function format_excel(){
		$this->load->helper('download');
		$data = file_get_contents("./bracket/excel/format/students.xls");
		$name = 'students.xls';
		force_download($name, $data);
		redirect('registration/new_student/import_excel');
	}

	public function import_process(){
		$this->load->library('excel_reader');		
		////$config['upload_path'] = './temp_upload/';
		$config['upload_path'] = './bracket/excel/temporary';
        $config['allowed_types'] = 'xls';
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload())
        {
            $data = array('error' => $this->upload->display_errors());
        	echo '<pre>';print_r($data); die; 
        }
        else
        {
        	$this->load->helper('date');
	        $datestring = '%Y-%m-%d %H:%i:%s';
	        $time = time();
	        $now = mdate($datestring, $time);

            $data = array('error' => false);
            $upload_data = $this->upload->data();
 
            $this->load->library('excel_reader');
            $this->excel_reader->setOutputEncoding('CP1251');
 
            $file =  $upload_data['full_path'];
            $this->excel_reader->read($file);

            error_reporting(E_ALL ^ E_NOTICE);
 
            // Sheet 1
            $data = $this->excel_reader->sheets[0] ;
            $dataexcel = Array();
            $emp=0;
            $dup=0;
            for ($i = 3; $i <= $data['numRows']; $i++) {
 
                //if($data['cells'][$i][2] == '') 
                //	break;            
	            $chek_nis=$this->m_registration->get_student_by_nis($data['cells'][$i][2]);
	            if(empty($chek_nis->nis) && $data['cells'][$i][2] != '')
	            {
		            $dataexcel[$i-1]['nis'] 			 	= $data['cells'][$i][2];
		            $dataexcel[$i-1]['full_name'] 			= $data['cells'][$i][3];
		            $dataexcel[$i-1]['nick_name'] 			= $data['cells'][$i][4];
		            $dataexcel[$i-1]['sex']					= $data['cells'][$i][5];
		            $dataexcel[$i-1]['pob']					= $data['cells'][$i][6];
		            $dataexcel[$i-1]['dob']					= $data['cells'][$i][7];
		            $dataexcel[$i-1]['children_to']			= $data['cells'][$i][8];
		            $dataexcel[$i-1]['sibling_number']		= $data['cells'][$i][9];
		            $dataexcel[$i-1]['religion'] 			= $data['cells'][$i][10];
		            $dataexcel[$i-1]['nationality']			= $data['cells'][$i][11];
		            $dataexcel[$i-1]['previous_school_type']= $data['cells'][$i][12];
		            $dataexcel[$i-1]['previous_school']		= $data['cells'][$i][13];
					$dataexcel[$i-1]['father_full_name']	= $data['cells'][$i][14];
		            $dataexcel[$i-1]['father_pob'] 			= $data['cells'][$i][15];
		            $dataexcel[$i-1]['father_dob']			= $data['cells'][$i][16];
		            $dataexcel[$i-1]['father_cell_phone']	= $data['cells'][$i][17];
		            $dataexcel[$i-1]['father_job']			= $data['cells'][$i][18];
		            $dataexcel[$i-1]['father_salary']		= $data['cells'][$i][19];
		            $dataexcel[$i-1]['father_citizen']		= $data['cells'][$i][20];
		            $dataexcel[$i-1]['mother_full_name']	= $data['cells'][$i][21];
		            $dataexcel[$i-1]['mother_pob']			= $data['cells'][$i][22];
		            $dataexcel[$i-1]['mother_dob']			= $data['cells'][$i][23];
		            $dataexcel[$i-1]['mother_cell_phone']	= $data['cells'][$i][24];
		            $dataexcel[$i-1]['mother_job']			= $data['cells'][$i][25];
		            $dataexcel[$i-1]['mother_salary']		= $data['cells'][$i][26];
		            $dataexcel[$i-1]['mother_citizen'] 		= $data['cells'][$i][27];
		            $dataexcel[$i-1]['stay_with']			= $data['cells'][$i][28];
		            $dataexcel[$i-1]['living_address']		= $data['cells'][$i][29];
		            $dataexcel[$i-1]['home_phone'] 			= $data['cells'][$i][30];
		            $dataexcel[$i-1]['guardian_full_name']	= $data['cells'][$i][31];
		            $dataexcel[$i-1]['guardian_job'] 		= $data['cells'][$i][32];
		            $dataexcel[$i-1]['guardian_citizen'] 	= $data['cells'][$i][33];
					$dataexcel[$i-1]['created_on']			= $now;
					$dataexcel[$i-1]['updated_on']			= $now;
					$dataexcel[$i-1]['status'] 				= $data['cells'][$i][34];
					$dataexcel[$i-1]['registration_type'] 	= $data['cells'][$i][35];
					$sy_id=$this->m_school_year->get_school_year_by_name($data['cells'][$i][36]);
					$dataexcel[$i-1]['start_school_year_id']= $sy_id->id;
					$dataexcel[$i-1]['unit_id'] 			= $data['cells'][$i][37];
					$dataexcel[$i-1]['start_level'] 		= $data['cells'][$i][38];
					$dataexcel[$i-1]['current_level'] 		= $data['cells'][$i][39];
					$dataexcel[$i-1]['class_id']			= 0;
				}
				if(!empty($chek_nis->nis)){
					$dup++;
				}
				if($data['cells'][$i][2] == ''){
					$emp++;
				}
            }
            // echo '<pre>'; print_r($dataexcel);die; 
            delete_files($upload_data['file_path']);
            $this->m_registration->import_students($dataexcel);
        }
        $data = array(
		     'message' => 'Data Imported Successfully.. 
		     			   There are '.$dup.' data (NIS) duplication & '.$emp.' empty data (NIS)..'
	     );
		// echo $data['message']; die;
		$this->session->set_flashdata($data);
		redirect('registration/new_student/import_excel');
	}

	// page title
	public function page_title() {
		$data['page_title'] = 'New Students Registration Form';
		$this->session->set_userdata($data);
	}
}
