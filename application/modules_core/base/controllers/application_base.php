<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Application_base extends CI_Controller {
	protected $id_portal;

	public function __construct() {
		// call the controller construct
		parent::__construct();
		// load model
		$this->load->model('m_base');
		$this->menu();
	}

	// menu
	public function menu() {
		// id portal
		$this->id_portal = $this->config->item('portal_profile');
		// page active
		$active = $this->session->userdata('title');
		$html = "<ul id='nav'>";
		// load menu
		$data['parent_menu'] = $this->m_base->get_parent_menu(array($this->id_portal));
		foreach ($data['parent_menu'] as $value_parent) {
			if ($data['child_menu'] = $this->m_base->get_child_menu(array($value_parent['id_menu']))) {
				$html .= "<li class='dropdown";
				if ($active == "Community research" OR $active == "Research" OR $active == "Teaching") {
					$html .= " active";
				}
				$html .= "'><a href='#'>" . $value_parent['menu_name'] . " <i class='icon-caret-down'></i></a>";
				$html .= "<ul class='dropdown-menu'>";
				foreach ($data['child_menu'] as $value_child) {
					$html .= "<li><a href='" . base_url() . "$value_child[menu_url]' />" . $value_child['menu_name'] . "</a></li>";
				}
				$html .= "</ul></li>";
			} else {
				$html .= "<li";
				if ($active == $value_parent['menu_name']) {
					$html .= " class='active'";
				}
				$html .= "><a href='" . base_url() . "$value_parent[menu_url]' />" . $value_parent['menu_name'] . "</a></li>";
			}
		}
		$html .= "</ul>";
		return $html;
	}
}
