<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Superadmin extends CI_Controller {


/*
	public function __construct()
	{
		# checking whether logged in or not
		if (isset($this->session->userdata['username'])) {
			redirect('main/_404','refresh');
		} 
	}
*/
	
	public function index(){
		$data['title'] = 'Manage Super Admin | Pinaple SAS';
		$data['main_content'] = 'superadmin';
		$this->load->view('main/template', $data);
	}
	
}

/* End of file user.php */
/* Location: ./application/modules_core/user/controllers/user.php */