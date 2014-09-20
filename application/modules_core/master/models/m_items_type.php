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

}
