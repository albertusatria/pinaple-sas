<?php

class M_entry extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function save_entry($params){
        $insert = $this->db->insert('accounting_general_journal',$params);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }
}