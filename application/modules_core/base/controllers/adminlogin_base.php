<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminlogin_base extends CI_Controller {
	protected $id_portal;
	protected $user;
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load other
		$this->get_user_login();
		$this->id_portal = $this->config->item('portal_admin');
	}

	// get user login
	protected function get_user_login() {
		// get user login
		$session = $this->session->userdata('session_admin');
		$this->user = $session;
	}
}
