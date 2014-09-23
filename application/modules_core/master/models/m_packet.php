<?php

class m_packet extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_packet(){
        return $this->db->get('packet')->result();
    }

    function get_total_rows(){
        return $this->db->get('packet')->num_rows();
    }
    
    function get_check_duplicate_packet($packet_name){
        return $this->db->get_where('packet',array('name'=>$packet_name))->row();
    }

    function get_check_duplicate_packet_ex_self($packet_name,$id){
        $sql = "SELECT 
                    p.*
                FROM packet p
                WHERE
                    p.name='$packet_name' AND
                    p.id<>'$id'
                ";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    function add_packet($params) {
        $this->db->insert('packet',$params);
    } 

    function get_packet_by_id($id){
        return $this->db->get_where('packet',array('id'=>$id))->row();
    }

    function edit_packet($params) {
        $this->db->update('packet',$params,array('id'=>$params['id']));
    }

    function delete_packet($params) {
       $this->db->delete('packet',$params,array('id'=>$params['id']));
    }

}
