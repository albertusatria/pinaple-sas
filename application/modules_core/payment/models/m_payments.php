<?php

class M_payments extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_list_siswa($keyword) {
        $sql = "SELECT *
                FROM school_year
                WHERE status = 'aktif'
                LIMIT 1";
        $query = $this->db->query($sql);
        $schoolyear = $query->row();
        $id = $schoolyear->id;

        $sql = "SELECT s.*, u.name FROM (SELECT * FROM re_registration r WHERE r.school_year_id = '$id') regis
                LEFT JOIN users_student s ON s.nis = regis.nis
                LEFT JOIN units u ON s.unit_id = u.id 
                WHERE s.nis LIKE '%$keyword%' OR s.full_name LIKE '%$keyword%'
                LIMIT 10";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    function get_siswa_invoice($nis) {
        $sql = "SELECT i.*,t.name as item_name, p.name as period_name, y.name as packet_name 
                FROM
                (SELECT * FROM invoices WHERE nis = '$nis' AND status = 'UNPAID' ) i
                LEFT JOIN items_type t ON i.item_type_id = t.id
                LEFT JOIN periods p ON p.id = i.period_id
                LEFT JOIN packets_year y ON i.packet_id = y.id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result_array();
        } else {
            return array();
        }        
    }

    function payment_process($id,$params) {
        $this->db->where('id',$id);
        $update = $this->db->update('invoices',$params);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }
}