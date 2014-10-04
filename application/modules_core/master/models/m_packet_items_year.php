<?php

class M_packet_items_year extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_packet_items(){
        return $this->db->get('packet_detail_year')->result();
    }

    function get_all_packet_items_by_p_id($id){
        $sql = "SELECT 
                    pd.id,
                    p.name packet_name,
                    pd.packet_id,
                    pd.item_type_id,
                    it.name item_type_name,
                    pd.period_id,
                    ps.name period_name,
                    pd.amount
                  FROM packet_detail_year pd
                LEFT JOIN packets_year p ON p.id=pd.packet_id
                LEFT JOIN items_type it ON it.id=pd.item_type_id 
                LEFT JOIN periods ps ON ps.id=pd.period_id 
                WHERE pd.packet_id='$id'";


        // $sql = "SELECT 
        //             pi.packet_id,
        //             p.name packet_name,
        //             pi.id,
        //             pi.item_type_id,
        //             it.name item_type_name
        //           FROM packet_items pi
        //         INNER JOIN packets p ON p.id=pi.packet_id
        //         INNER JOIN items_type it ON it.id=pi.item_type_id 
        //         WHERE pi.packet_id='$id'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    function get_detail_of_payment_item($id) {
        $sql = "SELECT it.*
                FROM items_type it
                WHERE it.id = '$id'";
        return $this->db->query($sql)->row_array();
    }

    function get_check_duplicate_packet_items($it_id,$p_id){
        $sql = "SELECT 
                    pi.*
                  FROM packet_detail_year pi
                INNER JOIN packets_year p ON p.id=pi.packet_id
                INNER JOIN items_type it ON it.id=pi.item_type_id 
                WHERE pi.packet_id = '$p_id' 
                  AND pi.item_type_id = '$it_id'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    function add_packet_items($params) {
        $this->db->insert('packet_detail_year',$params);
    } 

    function delete_packet_items($params) {
       $this->db->delete('packet_detail_year',$params,array('id'=>$params['id']));
    }

    function edit_amount($id,$params) {
        $this->db->where('id',$id);
        $update = $this->db->update('packet_detail_year',$params);
        if ($update) {
            return true;
        } else {
            return false;
        }

    }

}
