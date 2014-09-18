<?php

class m_items_type extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_items_type(){
        return $this->db->get('items_type')->result();
    }

    function get_all_items_type_for_administration_cost(){
        $sql = "SELECT it.*
            FROM items_type it
            WHERE 
                it.name IN ('DPP','SPP','Denda','Seragam','Kegiatan','Minitrip','Wisuda')
            ORDER BY it.id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

     function get_all_items_type_for_student_payment(){
        $sql = "SELECT it.*
            FROM items_type it
            WHERE 
                it.name IN ('DPP','SPP')
            ORDER BY it.id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }


    function get_item_type_by_id($id){
        return $this->db->get_where('items_type',array('id'=>$id))->row();
    }

    function get_administration_costs_aktif($sy_id){
        $sql = "SELECT DISTINCT sy.name,ac.unit_id,it.name
            FROM administration_costs ac, items_type it, school_year sy
            WHERE 
                ac.item_type_id = it.id AND
                ac.tahun_ajaran_id = sy.id AND
                sy.status='AKTIF' AND
                sy.id=".$sy_id." AND 
                it.name IN ('DPP','SPP','Denda','Seragam','Kegiatan','Minitrip','Wisuda')
            ORDER BY ac.unit_id,it.id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
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

}
