<?php

class m_guru_karyawan extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_ugk(){
        return $this->db->get('users_guru_karyawan')->result();
    }

    function get_all_unit_completed(){
        $sql = "SELECT gk.*
            FROM users_guru_karyawan gk 
            #LEFT JOIN users_guru_karyawan gk ON gk.nik = u.nama_kepala
            ORDER BY gk.nik";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_ugk_by_id($id){
        return $this->db->get_where('users_guru_karyawan',array('nik'=>$id))->row();
    }

    function add_ugk($params) {
        $this->db->insert('users_guru_karyawan',$params);
    }

    function edit_ugk($params) {
        $this->db->update('users_guru_karyawan',$params,array('nik'=>$params['nik']));
    }

    function delete_ugk($params) {
       $this->db->delete('users_guru_karyawan',$params,array('nik'=>$params['nik']));
    }
    
}