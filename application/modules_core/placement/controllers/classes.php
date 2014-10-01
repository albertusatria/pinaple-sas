<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once( APPPATH . 'modules_core/base/controllers/operator_base.php' );

class Classes extends Operator_base {
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		
		$this->load->model('initiation/m_school_year');
		$this->load->model('master/m_units');
		$this->load->model('m_extra');
		$this->load->model('m_class');
		// load permission
		$this->load->helper('text');
		// page title
		$this->page_title();
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
		$data['layout'] = "placement/class/list";
		$data['javascript'] = "placement/class/javascript/list";
		$this->load->view('dashboard/admin/template', $data);
	}

	public function list_class($u_id="")
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
		$data['classes'] = $this->m_class->get_enroll_open_class_by_u_sy($u_id,$sy_id);
		// load template
		$data['title']	= "Students Placement Setting Pinaple SAS";
		$data['layout'] = "placement/class/list_class";
		$data['javascript'] = "placement/class/javascript/list_class";
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
		
		$data['result'] = $this->m_class->get_open_class_by_id($id);
		$u_id=$data['result']->unit_id;
		$data['unit']	= $this->m_units->get_unit_by_id($u_id);
		// get tahun ajaran
		$data['year']	= $this->m_school_year->get_active_year();
		// get assigned student
		$data['siswas']	= $this->m_class->get_class_student($id);
		// load template
		$data['title']	= "Students Placement Setting Pinaple SAS";
		$data['layout'] = "placement/class/placement";
		$data['javascript'] = "placement/class/javascript/placement";
		$this->load->view('dashboard/admin/template', $data);

	}

	public function add_siswa($id_unit = "",$id_buka = "",$tingkat = "")
	{
		// user_auth
		$this->check_auth('C');

		$data['message'] = $this->session->flashdata('message');
		// menu
		$data['menu'] = $this->menu();
		// user detail
		$data['user'] = $this->user;
		// get portal list
		$data['unit']				= $this->m_extra->get_unit($id_unit);
		// get tahun ajaran
		$data['tahun']				= $this->m_tahun_ajaran->get_tahun_aktif();
		$thn = $data['tahun']->tahun_ajaran;
		// get portal by slug
		$data['result']				= $this->m_kelas->get_kelas_buka_by_unit_tahun_detail($id_buka);
		// get avaiable student
		$data['siswas']				= $this->m_kelas->get_siswa_qualifikasi($id_unit,$tingkat,$thn);
		// load template
		$data['title']	= "Students Grades PinapleSAS";
		
		$data['main_content'] = "setting/penempatan_kelas/add";
		$this->load->view('dashboard/admin/template', $data);

	}

	public function add_process($id_unit = '',$id_buka = '')
	{
		if ($id_unit == '' OR $id_buka == '')
		{
			echo "forbidden";die;
		}

		// echo "<pre>"; print_r($_POST);die;

		foreach ($_POST as $value) 
		{
				if (isset($value['check']))
				{
					$params = array(
						'nis' 		=> $value['nis'],
		            	'tahun_ajaran' 	=> $value['tahun_ajaran'],
		            	'id_buka' 	=> $value['id_buka']
		            	);
					$this->m_kelas->add_siswa_kelas($params);
				}
				// echo "<pre>"; print_r($_POST); die;

		}

			$data['message'] = "Data successfully added";

			$this->session->set_flashdata($data);
			redirect('setting/penempatan_kelas/penempatan/' . $id_unit .'/'. $id_buka);
	}

	public function hapus($id_unit = "",$id_buka = "",$id = "")
	{
	// user_auth
		$this->check_auth('D');

		
		if ($this->m_kelas->delete_siswa_kelas($id)) {
			$data['message'] = "Data successfully deleted";
		}
		$this->session->set_flashdata($data);
		redirect('setting/penempatan_kelas/penempatan/' . $id_unit .'/'. $id_buka);

	}

	// page title
	public function page_title() {
		$data['page_title'] = 'Penempatan Kelas';
		$this->session->set_userdata($data);
	}
}
