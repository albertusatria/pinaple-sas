<?php

class m_daftar_ulang extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_siswa_no_daftar_ulang($thn) {
        $sql = "SELECT u.nis,u.nama_lengkap,u.id_unit FROM users_siswa_alumni u 
            WHERE NOT EXISTS (SELECT *
               FROM   daftar_ulang d
               WHERE  u.nis = d.nis AND d.tahun_ajaran = '$thn') 
            AND status='SISWA'
            ";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }        
    }

    function daftar_ulang_siswa($params) {
        $insert = $this->db->insert('daftar_ulang',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }        
    }
}