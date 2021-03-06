<?php

class m_school_year extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_school_year(){
        $this->db->order_by('id','DESC');
        return $this->db->get('school_year')->result();
    }

    function get_school_year_by_id($id){
        return $this->db->get_where('school_year',array('id'=>$id))->row();
    }

    function get_school_year_by_name($name){
        return $this->db->get_where('school_year',array('name'=>$name))->row();
    }

    function get_pmb_school_year() {
        $this->db->limit('1');
        $this->db->where('phase','PMB');
        $query = $this->db->get('school_year');
        if ($query->num_rows > 0) {
            return $query->row();
        } else {
            return array();
        }
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

    function get_active_status($id=''){
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

     function get_year_after_active_year(){
        $sql = "SELECT *
                FROM school_year
                WHERE status = 'aktif' limit 1";
        $query = $this->db->query($sql)->row();
        $cy = $query->name;
        $ecy = explode("-", $cy);
        $ny1 = $ecy[1];
        $ny2 = (int) $ecy[1] + 1;
        $ny = $ny1."-".$ny2;

        $sql = "SELECT *
                FROM school_year
                WHERE name = '$ny' limit 1";
        $next_query = $this->db->query($sql);

        //echo '<pre>'; print_r($next_query->row()); die();
        if ($next_query->num_rows() > 0) {
            return $next_query->row();
        } else {
            return array();
        }
    }

    function get_all_periods(){
        return $this->db->get('periods')->result();
    }

}