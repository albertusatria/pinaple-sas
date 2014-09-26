<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operator_base extends CI_Controller {
	protected $portal_id;
	protected $user;
	protected $char;
	protected $role;
	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('base/m_base');
		$this->load->model('base/m_user');
		// load library
		$this->load->library('form_validation');
        $this->load->library("pagination");
		// load other
		$this->get_user_login();
		$this->menu();
		$this->replace_character();
	}

	public function menu() {
		// id portal
		$this->portal_id = $this->config->item('portal_operator');
		// page active
		$active = $this->session->userdata('page_title');
		//echo $active;die;
		$parent_active = $this->session->userdata('parent_active');
		$child_active = $this->session->userdata('child_active');
		//echo $parent_active;die;
		// load menu
		$data['parent_menu'] = $this->m_base->get_parent_menu(array($this->portal_id, $this->user['role_id']));
		//echo '<pre>'; print_r($data['parent_menu']) ; die;

		$html = "<ul id='leftsidePanel' class='nav nav-pills nav-stacked nav-bracket'>";
		foreach ($data['parent_menu'] as $value_parent) {
			if ($value_parent['read'] == 'true') {
				//jika bisa read maka tampilkan
				if ($data['child_menu'] = $this->m_base->get_child_menu(array($value_parent['menu_id'], $this->user['role_id']))) {
					// echo "punya anak";
					$html .= "<li class='nav-parent";
					//echo $parent_active; echo $value_parent['menu_slug'];die;
					if ($parent_active == $value_parent['menu_slug']) {
						$html .= " nav-active active";
					}
					$html .= "'> <a href='#'> <i class='fa fa-".$value_parent['menu_icon']."'></i> <span>".$value_parent['menu_name']."</span></a>";
					$html .= "<ul class='children'";
					foreach ($data['child_menu'] as $value_child) {
						if ($child_active == $value_child['menu_slug']) {
							$html .=  "style='display: block;'";
						}						
					}					 
					$html .= ">";
					foreach ($data['child_menu'] as $value_child) {
						if ($value_child['read'] == 'true') {
							if ($child_active == $value_child['menu_slug']) {
								$html .= "<li class='active'>";
							}
							else {
								$html .= "<li>";								
							}
							$html .= " <a href='" . base_url() . $value_child['menu_url'] . "'> <i class='fa fa-" . $value_child['menu_icon'] . "'></i>" . $value_child['menu_name'] . "</a></li>";
						}
					}					
					$html .= "</ul></li>";				

				}
				else {
					// echo "tidak punya anak"
					if ($parent_active == $value_parent['menu_slug']) {
						$html .= "<li class='active'>";
					}
					else
					{
						$html .= "<li>";						
					}
					$html .= "<a href='" . base_url() . $value_parent['menu_url'] . "'> <i class='fa fa-" . $value_parent['menu_icon'] . "'></i> <span>" . $value_parent['menu_name'] . "</span></a></li>";			
				}
			}
			else {
			}
		}
		$html .= "</ul>"; 
		return $html;
	}


	public function menu2() {
			// id portal
		$this->portal_id = $this->config->item('portal_operator');
		// page active
		$active = $this->session->userdata('page_title');
		//echo $active;die;
		$parent_active = $this->session->userdata('parent_active');
		$child_active = $this->session->userdata('child_active');
		//echo $parent_active;die;
		// load menu
		$data['parent_menu'] = $this->m_base->get_parent_menu(array($this->portal_id, $this->user['role_id']));
		//echo '<pre>'; print_r($data['parent_menu']) ; die;

		$html = "<ul id='leftsidePanel' class='nav nav-pills nav-stacked nav-bracket'>";
		foreach ($data['parent_menu'] as $value_parent) {
			if ($value_parent['read'] == 'true') {
				//jika bisa read maka tampilkan
				if ($data['child_menu'] = $this->m_base->get_child_menu(array($value_parent['menu_id'], $this->user['role_id']))) {
					// echo "punya anak";
					$html .= "<li class='nav-parent";
					//echo $parent_active; echo $value_parent['menu_slug'];die;
					if ($parent_active == $value_parent['menu_slug']) {
						$html .= " nav-active active";
					}
					$html .= "'> <a href='#'> <i class='fa fa-".$value_parent['menu_icon']."'></i> <span>".$value_parent['menu_name']."</span></a>";
					$html .= "<ul class='children'";
					foreach ($data['child_menu'] as $value_child) {
						if ($child_active == $value_child['menu_slug']) {
							$html .=  "style='display: block;'";
						}						
					}					 
					$html .= ">";
					foreach ($data['child_menu'] as $value_child) {
						if ($value_child['read'] == 'true') {
							if ($child_active == $value_child['menu_slug']) {
								$html .= "<li class='active'>";
							}
							else {
								$html .= "<li>";								
							}
							$html .= " <a href='" . base_url() . $value_child['menu_url'] . "'> <i class='fa fa-" . $value_child['menu_icon'] . "'></i>" . $value_child['menu_name'] . "</a></li>";
						}
					}					
					$html .= "</ul></li>";				

				}
				else {
					// echo "tidak punya anak"
					if ($parent_active == $value_parent['menu_slug']) {
						$html .= "<li class='active'>";
					}
					else
					{
						$html .= "<li>";						
					}
					$html .= "<a href='" . base_url() . $value_parent['menu_url'] . "'> <i class='fa fa-" . $value_parent['menu_icon'] . "'></i> <span>" . $value_parent['menu_name'] . "</span></a></li>";			
				}
			}
			else {
			}
		}
		$html .= "</ul>"; 
		return $html;
	}

	// get user login
	protected function get_user_login() {
		// get user login
		$session = $this->session->userdata('session_operator');
		if (!empty($session)) {
			$this->user = $session;
		} else {
			redirect('login/operator');
		}
	}

	protected function check_auth($auth) {
		// get display page id
		$params = array($this->uri->segment(1) . '/' . $this->uri->segment(2));
		if ($result = $this->m_base->get_display_page_id($params)) {
			// get user auth
			$params = array($this->user['role_id'], $result['menu_id']);
			$role = $this->m_base->get_user_auth($params);
			$this->role = array('C' => substr($role['permission'], 0, 1), 'R' => substr($role['permission'], 1, 1), 'U' => substr($role['permission'], 2, 1), 'D' => substr($role['permission'], 3, 1));
			if ($this->role[$auth] != '1' || empty($auth)) {
				redirect('operator/forbidden/');
			}
		}
	}

	// character
	public function replace_character() {
		$this->char = array(" ", "'", "\"", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "+", "{", "}", "[", "]", "|", "\\", "?", "<", ">", ",", ".", "/", "~", "`");
	}
}
