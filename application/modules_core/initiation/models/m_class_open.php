<?php

class M_class_open extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_classes_list($unit_id,$schyear){
    	$sql = "SELECT e.*,ue.full_name as homeroom_1_name, ue2.full_name as homeroom_2_name FROM classes e
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

    function get_class($class_id){
    	$this->db->where('id',$class_id);
        $list = $this->db->get('classes');
        // echo '<pre>'; print_r($list->row());die;
        if ($list->num_rows() == 1) {
        	return $list->row();
        } else {
        	return array();
        }
    }

    function add_class($param) {
    	$insert = $this->db->insert('classes',$param);
    	if ($insert) {
    		return true;
    	} else {
    		return false;
    	}
    }

    function edit_class($param,$class_id) {
    	$this->db->where('id',$class_id);
    	$update = $this->db->update('classes',$param);
    	if ($update) {
    		return true;
    	} else {
    		return false;
    	}
    }

    function delete_class($class_id) {
    	$this->db->where('id',$class_id);
    	$delete = $this->db->delete('classes');
    	if ($delete) {
    		return true;
    	} else {
    		return false;
    	}
    }

    function check_class_students_by_ci($class_id){
        $cek = $this->db->get_where('class_students',array('class_id'=>$class_id))->result();
        if(count($cek)>0)
            return true;
        else
            return false;
    }

}