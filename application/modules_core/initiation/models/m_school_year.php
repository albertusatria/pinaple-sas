<?php

class m_school_year extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_school_year(){
        return $this->db->get('school_year')->result();
    }

    function get_school_year_by_id($id){
        return $this->db->get_where('school_year',array('id'=>$id))->row();
    }

    function get_school_year_name($ta,$id){
        $sql = "SELECT *
                FROM school_year
                WHERE name = '$ta' AND id<>'$id'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_active_status($id){
       $sql = "SELECT *
                FROM school_year
                WHERE status = 'aktif' AND id<>'$id'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function add_school_year($params) {
        $this->db->insert('school_year',$params);
    }

    function edit_school_year($params) {
        $this->db->update('school_year',$params,array('id'=>$params['id']));
    }

    function delete_school_year($params) {
       $this->db->delete('school_year',$params,array('id'=>$params['id']));
    }

    function get_active_year(){
       $sql = "SELECT *
                FROM school_year
                WHERE status = 'aktif' limit 1";

        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result()); die;
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    function get_all_periods(){
        return $this->db->get('periods')->result();
    }

}