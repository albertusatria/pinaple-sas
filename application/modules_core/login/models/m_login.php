<?php

class m_login extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // login validtion
    function login_validation($params) {


        $sql = "SELECT a.user_id, b.user_full_name, b.user_picture, d.role_id, d.role_default_url, e.portal_id, a.user_st
            FROM my_user a
            INNER JOIN users b ON b.user_id = a.user_id
            LEFT JOIN my_role_user c ON c.user_id = a.user_id
            LEFT JOIN my_role d ON d.role_id = c.role_id
            LEFT JOIN my_portal e ON e.portal_id = d.portal_id
            WHERE a.user_name = ? AND a.user_pass = ?";

        $query = $this->db->query($sql, $params);

        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array();
        }
    }

    // user Log visit
    function user_log_visit($params) {
        $sql = "INSERT INTO user_log(user_id, ip_address, visit_date) VALUES(?, ?, NOW())";
        return $this->db->query($sql, $params);
    }

    // user Log leave
    function user_log_leave($params) {
        $sql = "UPDATE user_log SET leave_date = NOW() WHERE user_id = ?";
        return $this->db->query($sql, $params);
    }

}
