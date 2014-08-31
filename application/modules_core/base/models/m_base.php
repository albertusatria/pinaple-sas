<?php

class M_base extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // get parent menu
    function get_parent_menu($params) {
        $sql = "SELECT a.menu_id, a.portal_id, a.parent_id, a.menu_name, a.menu_slug, a.menu_url, a.menu_order, a.menu_icon, b.portal_id, c.role_id, IF(SUBSTRING(f.permission, 1, 1) = 1, 'true', 'false')'create', IF(SUBSTRING(f.permission, 2, 1) = 1, 'true', 'false')'read', IF(SUBSTRING(f.permission, 3, 1) = 1, 'true', 'false')'update', IF(SUBSTRING(f.permission, 4, 1) = 1, 'true', 'false')'delete'
            FROM my_menu a
            LEFT JOIN my_portal b ON b.portal_id = a.portal_id
            LEFT JOIN my_role c ON c.portal_id = b.portal_id
            LEFT JOIN my_role_user d ON d.role_id = c.role_id
            LEFT JOIN my_user e ON e.user_id = d.user_id
            LEFT JOIN my_permission f ON f.menu_id = a.menu_id AND f.role_id = d.role_id
            WHERE b.portal_id = ? AND c.role_id = ? AND a.parent_id = 0 AND a.menu_st = 'show'
            GROUP BY a.menu_id
            ORDER BY a.menu_order ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    // get child menu
    function get_child_menu($params) {
        $sql = "SELECT a.menu_id, a.portal_id, a.parent_id, a.menu_name, a.menu_slug, a.menu_url, a.menu_order, a.menu_icon, b.portal_id, c.role_id, IF(SUBSTRING(f.permission, 1, 1) = 1, 'true', 'false')'create', IF(SUBSTRING(f.permission, 2, 1) = 1, 'true', 'false')'read', IF(SUBSTRING(f.permission, 3, 1) = 1, 'true', 'false')'update', IF(SUBSTRING(f.permission, 4, 1) = 1, 'true', 'false')'delete'
            FROM my_menu a
            LEFT JOIN my_portal b ON b.portal_id = a.portal_id
            LEFT JOIN my_role c ON c.portal_id = b.portal_id
            LEFT JOIN my_role_user d ON d.role_id = c.role_id
            LEFT JOIN my_user e ON e.user_id = d.user_id
            LEFT JOIN my_permission f ON f.menu_id = a.menu_id AND f.role_id = d.role_id
            WHERE a.parent_id = ? AND d.role_id = ?
            GROUP BY a.menu_id
            ORDER BY menu_order ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    // get display page id
    function get_display_page_id($params) {
        $sql = "SELECT a.menu_id, a.menu_name, a.menu_url
            FROM my_menu a
            WHERE a.menu_url = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    // get user auth
    function get_user_auth($params) {
        $sql = "SELECT *
            FROM my_permission
            WHERE role_id = ? AND menu_id = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

}
