<?php

class m_unit extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_unit(){
        return $this->db->get('ref_unit')->result();
    }

    function get_all_unit_for_administration_cost(){
        $sql = "SELECT u.*
            FROM ref_unit u
            WHERE id_unit <> '0000'
            ORDER BY u.id_unit";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_all_unit_except_self($id){
        $sql = "SELECT u.*
            FROM ref_unit u
            WHERE u.id_unit <> '$id' 
            ORDER BY u.id_unit";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_all_unit_completed(){
        $sql = "SELECT u.*, gk.nama_lengkap AS nama_kepala_ref
            FROM ref_unit u 
            LEFT JOIN users_guru_karyawan gk ON gk.nik = u.nama_kepala
            ORDER BY u.id_unit";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_unit_by_id($id){
        return $this->db->get_where('ref_unit',array('id_unit'=>$id))->row();
    }

    function add_unit($params) {
        $this->db->insert('ref_unit',$params);
    }

    function edit_unit($params) {
        $this->db->update('ref_unit',$params,array('id_unit'=>$params['id_unit']));
    }

    function delete_unit($params) {
       $this->db->delete('ref_unit',$params,array('id_unit'=>$params['id_unit']));
    }
    
}