<?php

class M_extra_open extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_extra_list($unit_id,$schyear){
    	$sql = "SELECT e.*,ue.full_name as homeroom_1_name, ue2.full_name as homeroom_2_name FROM extras e
    			LEFT JOIN users_employee ue ON e.homeroom_1 = ue.nik
    			LEFT JOIN users_employee ue2 ON e.homeroom_2 = ue2.nik
    			WHERE e.school_year_id = '$schyear' AND e.unit_id = '$unit_id'";
        $list = $this->db->query($sql);
        // echo '<pre>'; print_r($list->result());die;
        if ($list->num_rows() > 0) {
        	return $list->result();
        } else {
        	return array();
        }
    }

    function get_extras($extra_id){
    	$this->db->where('id',$extra_id);
        $list = $this->db->get('extras');
        // echo '<pre>'; print_r($list->row());die;
        if ($list->num_rows() == 1) {
        	return $list->row();
        } else {
        	return array();
        }
    }

    function add_extra($param) {
    	$insert = $this->db->insert('extras',$param);
    	if ($insert) {
    		return true;
    	} else {
    		return false;
    	}
    }

    function edit_extra($param,$extra_id) {
    	$this->db->where('id',$extra_id);
    	$update = $this->db->update('extras',$param);
    	if ($update) {
    		return true;
    	} else {
    		return false;
    	}
    }

    function delete_extra($extra_id) {
    	$this->db->where('id',$extra_id);
    	$delete = $this->db->delete('extras');
    	if ($delete) {
            $this->db->where('extra_id',$extra_id);
            $this->db->where('status','BERJALAN');
            $delete = $this->db->delete('extra_students');
            if ($delete) {
        		return true;
            }
    	}
    	return false;
    }

}