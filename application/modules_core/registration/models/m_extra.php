<?php

class m_extra extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // get menu by slug
    function get_unit($id_unit = '') {
        $show = 'result()';
        if ($id_unit == '')
        {
            $sql = "SELECT id_unit,unit,jenjang FROM ref_unit WHERE kategori = 'AKADEMIS'";
            $show = 'result';
        }
        else 
        {
            $sql = "SELECT id_unit,unit,jenjang FROM ref_unit WHERE id_unit = '$id_unit'";
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

    function get_extra_by_unit($id_unit) {
        $sql = "SELECT * FROM ref_extrakurikuler WHERE id_unit = '$id_unit'";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }        
    }

    function get_extra_detail($id_extra) {
        $sql = "SELECT * FROM ref_extrakurikuler WHERE id_extra = '$id_extra'";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }        
    }
    // add menu
    function add_extra($id_unit,$params) {
        $this->db->where('id_unit',$id_unit);
        $insert = $this->db->insert('ref_extrakurikuler',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }
    }

    // edit menu
    function edit_extra($id_extra,$params) {
        $this->db->where('id_extra',$id_extra);
        $edit = $this->db->update('ref_extrakurikuler',$params);        
        if($edit) {
            return true;
        } else {
            return false;
        }    }

    // delete menu
    function delete_extra($id_extra,$params) {
        $this->db->where('id_extra',$id_extra);
        $delete = $this->db->delete('ref_extrakurikuler');        
        if($delete) {
            return true;
        } else {
            return false;
        }    }



}