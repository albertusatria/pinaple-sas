<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {


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
		$data['title'] = 'Manage Employee | Pinaple SAS';
		$data['main_content'] = 'employee';
		$this->load->view('main/template', $data);
	}	
	
}

/* End of file user.php */
/* Location: ./application/modules_core/user/controllers/user.php */