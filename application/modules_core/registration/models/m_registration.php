<?php

class m_pendaftaran extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // add menu
    function add_new_student($params) {
        $insert = $this->db->insert('users_student',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }
    }

    // add menu
    function add_new_student_achievement($params) {
        $insert = $this->db->insert('students_achievement',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }
    }
}
