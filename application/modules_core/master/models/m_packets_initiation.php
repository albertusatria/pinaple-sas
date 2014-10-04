<?php

class M_packets_initiation extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_packet($school_year_id){
        $sql = "SELECT p.*,u.name'unit_name' FROM packets_year p
                LEFT JOIN units u ON u.id = p.unit_id
                WHERE p.school_year_id = '$school_year_id'
                ORDER BY p.unit_id, p.id
                ";

        return $this->db->query($sql)->result();
    }

    function get_total_rows($school_year_id){
        $this->db->where('school_year_id',$school_year_id);
        return $this->db->get('packets_year')->num_rows();
    }
    
    function get_check_duplicate_packet($packet_name){
        $this->db->where('name',$packet_name);
        $this->db->where('school_year_id',$school_year_id);
        return $this->db->get('packets_year')->row();
    }

    function get_check_duplicate_packet_ex_self($packet_name,$id){
        $sql = "SELECT 
                    p.*
                FROM packets_year p
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
        $this->db->insert('packets_year',$params);
    } 

    function add_packet_using_template($template_id,$sy_id) {
        $sql = "SELECT * FROM packets p WHERE p.id = '$template_id' LIMIT 1";
        $query = $this->db->query($sql);
        if ($query->num_rows == 1) {
            $data = $query->row_array();
            $params = array (
                'name'              => $data['name'],
                'description'       => $data['description'],
                'unit_id'           => $data['unit_id'],
                'for_new_student'   => $data['for_new_student'],
                'stage'             => $data['stage'],
                'school_year_id'=> $sy_id
                );
            $insert = $this->db->insert('packets_year',$params);
            if ($insert) {
                $last = $this->db->insert_id();
                //query
                $sql = "SELECT * FROM packet_detail pd WHERE pd.packet_id = '$template_id' ";
                $query = $this->db->query($sql);
                if ($query->num_rows > 0) {
                    $detail = $query->result_array();
                    foreach ($detail as $det) 
                    {
                        $params = array (
                            'packet_id'     => $last,
                            'item_type_id'  => $det['item_type_id'],
                            'period_id'     => $det['period_id'],
                            'amount'        => 0
                            );
                        $insert = $this->db->insert('packet_detail_year',$params);                        
                    }
                    return true;
                }
            }
        }
        return false;
    } 


    function get_packet_by_id($id){
        return $this->db->get_where('packets_year',array('id'=>$id))->row();
    }

    function edit_packet($params) {
        $this->db->update('packets_year',$params,array('id'=>$params['id']));
    }

    function delete_packet($params) {
       $this->db->delete('packets_year',$params,array('id'=>$params['id']));
    }

}
