<?php

class M_balance_sheet extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_balance_sheet_pergroup_debet(){
        $sql = "SELECT 
                    a.*
                FROM accounting_account a
                WHERE a.group IN ('aa','bb')
                ORDER BY a.group,a.id
                ";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    function get_balance_sheet_pergroup_credit(){
        $sql = "SELECT 
                    a.*
                FROM accounting_account a
                WHERE a.group NOT IN ('aa','bb')
                ORDER BY a.group,a.id
                ";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

}

?>