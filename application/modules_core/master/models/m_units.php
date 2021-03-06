<?php

class m_units extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_unit(){
        return $this->db->get('units')->result();
    }

    function get_all_unit_academic($unit_id = ''){

        $show = 'result()';
        if ($unit_id == '')
        {
            $sql = "SELECT id,name,stage FROM units WHERE category = 'akademis'";
            $show = 'result';
        }
        else 
        {
            $sql = "SELECT id,name,stage FROM units WHERE id = '$unit_id'";
            $show = 'row';
        }
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->$show();
        } else {
            return array();
        }
    }    

    function get_all_unit_for_administration_cost(){
        $sql = "SELECT u.*
            FROM units u
            WHERE id <> '0000'
            ORDER BY u.id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_all_unit_except_self($id){
        $sql = "SELECT u.*
            FROM units u
            WHERE u.id <> '$id' 
            ORDER BY u.id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_all_unit_completed(){
        $sql = "SELECT u.*, gk.full_name AS headmaster_name
            FROM units u 
            LEFT JOIN users_employee gk ON gk.nik = u.headmaster_id
            ORDER BY u.id";
        $query = $this->db->query($sql);
        // echo "<pre>"; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_unit_by_id($id){
        return $this->db->get_where('units',array('id'=>$id))->row();
    }

    function add_unit($params) {
        $this->db->insert('units',$params);
    }

    function edit_unit($params) {
        $this->db->update('units',$params,array('id'=>$params['id']));
    }

    // function delete_unit($params) {
    //    $this->db->delete('units',$params,array('id'=>$params['id']));
    // }
    
}