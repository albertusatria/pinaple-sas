<?php

class M_registration extends CI_Model {

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

    function get_list_siswa($keyword) {

        $sql = "SELECT *
                FROM school_year
                WHERE status = 'aktif'
                LIMIT 1";
        $query = $this->db->query($sql);
        $schoolyear = $query->row();
        $id = $schoolyear->id;


        $sql = "SELECT s.*, u.name FROM users_student s 
                LEFT JOIN units u ON s.unit_id = u.id 
                WHERE (s.nis LIKE '%$keyword%' OR s.full_name LIKE '%$keyword%') AND s.status = 'SISWA' AND 
                NOT EXISTS (SELECT *
                    FROM   re_registration r
                    WHERE  s.nis = r.nis AND r.school_year_id = '$id')
                LIMIT 10";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    function add_re_registration($params) {
        $insert = $this->db->insert('re_registration',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }        
    }

    function add_invoices($params) {
        $insert = $this->db->insert('invoices',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }        
    }

    function get_list_paket($unit_id,$start,$current) {

        if ($start = $current) {
            // siswa baru
            $sql = "SELECT * FROM packet p WHERE p.unit_id = '$unit_id' AND p.for_new_student = 'TRUE' AND p.stage = '$current' ";
        } else {
            // siswa lama daftar ulang
            $sql = "SELECT * FROM packet p WHERE p.unit_id = '$unit_id' AND p.for_new_student = 'FALSE' AND p.stage = '$current' ";            
        }
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    function get_list_packet_item($packet_id) {
        $sql = "SELECT p.*,i.name,i.type,per.name as name_of_period FROM packet_detail p 
                LEFT JOIN items_type i ON p.item_type_id = i.id
                LEFT JOIN periods per ON p.period_id = per.id
                WHERE p.packet_id = '$packet_id'";            
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result_array();
        } else {
            return array();
        }

    }

}
