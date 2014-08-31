<?php

class m_user extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // get last inserted id
    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    // get user list
    function get_user() {
        $sql = "SELECT *
            FROM users
            WHERE user_id != 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    // get user list
    function get_all_user() {
        $sql = "SELECT a.user_id, a.user_full_name, a.user_address, a.user_birthday, a.user_number, a.user_picture, a.user_picture, b.user_name, b.user_pass, b.user_email, b.user_st
            FROM users a
            INNER JOIN my_user b ON b.user_id = a.user_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    // get user by slug
    function get_user_by_slug($params) {
        $sql = "SELECT a.user_id, a.tu_id, a.user_full_name, a.user_address, a.user_birthday, a.user_number, a.user_picture, a.user_picture, b.user_name, b.user_pass, b.user_email, b.user_st, c.role_id
            FROM users a
            INNER JOIN my_user b ON b.user_id = a.user_id
            LEFT JOIN my_role_user c ON c.user_id = a.user_id
            WHERE a.user_id = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array();
        }
    }

    // user name validation
    function user_name_validation($params) {
        $sql = "SELECT *
            FROM my_user
            WHERE user_name = ? AND user_id != ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return array();
        }
    }

    // user email validation
    function user_email_validation($params) {
        $sql = "SELECT *
            FROM my_user
            WHERE user_email = ? AND user_id != ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return array();
        }
    }

    // passwrod validation
    function password_validation($params) {
        $sql = "SELECT *
            FROM my_user
            WHERE user_pass = ? AND user_id != ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return array();
        }
    }

    // role user validation
    function role_user_validation($params) {
        $sql = "SELECT *
            FROM my_role_user
            WHERE role_id = ? AND user_id != ? LIMIT 1";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return array();
        }
    }

    // add
    function add_user_profile($params) {
        $sql = "INSERT INTO users(tu_id, user_full_name, user_address, user_birthday, user_number, creator, dc) VALUES(?,?,?,?,?,?,NOW())";
        return $this->db->query($sql, $params);
    }

    // add
    function add_user($params) {
        $sql = "INSERT INTO my_user(user_id, user_name, user_pass, user_email, user_st, creator, dc) VALUES(?,?,?,?,?,?,NOW())";
        return $this->db->query($sql, $params);
    }

    // add
    function add_role_user($params) {
        $sql = "INSERT INTO my_role_user(role_id, user_id) VALUES(?,?)";
        return $this->db->query($sql, $params);
    }

    // edit
    function edit_user_profile($params) {
        $sql = "UPDATE users SET tu_id = ?, user_full_name = ?, user_address = ?, user_birthday = ?, user_number = ?, du = NOW() WHERE user_id = ?";
        return $this->db->query($sql, $params);
    }

    // edit
    function edit_user_picture($params) {
        $sql = "UPDATE users SET user_picture = ? WHERE user_id = ?";
        return $this->db->query($sql, $params);
    }

    // edit
    function edit_user_account($params) {
        $sql = "UPDATE my_user SET user_name = ?, user_email = ?, user_st = ?, du = NOW() WHERE user_id = ?";
        return $this->db->query($sql, $params);
    }

    // edit
    function edit_role_user($params) {
        $sql = "UPDATE my_role_user SET role_id = ? WHERE role_id = ? AND user_id = ?";
        return $this->db->query($sql, $params);
    }

    // edit
    function edit_user_pass($params) {
        $sql = "UPDATE my_user SET user_pass = ?, du = NOW() WHERE user_id = ?";
        return $this->db->query($sql, $params);
    }

    // delete
    function delete_user($params) {
        $sql = "DELETE FROM users WHERE user_id = ?";
        return $this->db->query($sql, $params);
    }

}
