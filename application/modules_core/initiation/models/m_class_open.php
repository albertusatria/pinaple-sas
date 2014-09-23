<?php

class M_class_open extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_school_year(){
        return $this->db->get('school_year')->result();
    }


}