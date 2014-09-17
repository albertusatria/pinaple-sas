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
                WHERE status = 'active' limit 1";

        $query = $this->db->query($sql);
        //echo '<pre>'; print_r($query->result()); die;
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    function get_all_sy_costs($id){
        $sql = "SELECT 
                    sy.id AS sy_id,
                    ac.id AS ac_id,
                    it.name AS item_name,
                    u.name AS unit_name,
                    ac.amount AS item_amount
                FROM tahun_ajaran ta
                INNER JOIN administration_costs ac ON ac.tahun_ajaran_id=sy.id 
                LEFT JOIN units u ON u.id_unit=ac.unit_id
                LEFT JOIN items_type it ON it.id=ac.item_type_id
                WHERE sy.id='$id'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_check_duplicate_cost($sy_id,$un_id,$it_id){
        return $this->db->get_where('administration_costs',array('school_year_id'=>$sy_id,'unit_id'=>$un_id,'item_type_id'=>$it_id))->row();
    }


    function get_check_duplicate_cost_except_self($id,$sy_id,$un_id,$it_id){
        $sql = "SELECT 
                    ac.*
                FROM administration_costs ac
                WHERE
                    ac.school_year_id='$sy_id' AND
                    ac.unit_id='$un_id' AND
                    ac.item_type_id='$it_id' AND
                    ac.id<>'$id'
                ";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }


    function get_administration_cost_by_id($id){
        return $this->db->get_where('administration_costs',array('id'=>$id))->row();
    }

    function add_administration_costs($params) {
        $this->db->insert('administration_costs',$params);
    }

    function edit_administration_costs($params) {
        $this->db->update('administration_costs',$params,array('id'=>$params['id']));
    }

    function delete_administration_costs($params) {
       $this->db->delete('administration_costs',$params,array('id'=>$params['id']));
    }

    function get_administration_cost_by_ta_name($sy,$nm,$iu){
        $sql = "SELECT 
                    it.id, it.name, ac.amount
                FROM administration_costs ac
                LEFT JOIN items_type it ON it.id=ac.item_type_id
                WHERE
                    ac.school_year_id='$sy' AND
                    it.name='$nm' AND
                    ac.unit_id='$iu'
                ";

        $query = $this->db->query($sql);

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