<?php

class m_packet_items extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_packet_items(){
        return $this->db->get('packet_items')->result();
    }

    function get_all_packet_items_by_p_id($id){
        $sql = "SELECT 
                    pi.packet_id,
                    p.name packet_name,
                    pi.id,
                    pi.item_type_id,
                    it.name item_type_name
                  FROM packet_items pi
                INNER JOIN packet p ON p.id=pi.packet_id
                INNER JOIN items_type it ON it.id=pi.item_type_id 
                WHERE pi.packet_id='$id'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    function get_check_duplicate_packet_items($it_id,$p_id){
        $sql = "SELECT 
                    pi.*
                  FROM packet_items pi
                INNER JOIN packet p ON p.id=pi.packet_id
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
        $this->db->insert('packet_items',$params);
    } 

    function delete_packet_items($params) {
       $this->db->delete('packet_items',$params,array('id'=>$params['id']));
    }

}
