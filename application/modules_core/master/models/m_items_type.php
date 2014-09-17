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

    function get_administration_costs_aktif($ta_id){
        $sql = "SELECT DISTINCT ta.tahun_ajaran,ac.unit_id,it.name
            FROM administration_costs ac, items_type it, tahun_ajaran ta
            WHERE 
                ac.item_type_id = it.id AND
                ac.tahun_ajaran_id = ta.id AND
                ta.status='AKTIF' AND
                ta.id=".$ta_id." AND 
                it.name IN ('DPP','SPP','Denda','Seragam','Kegiatan','Minitrip','Wisuda')
            ORDER BY ac.unit_id,it.id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

}
