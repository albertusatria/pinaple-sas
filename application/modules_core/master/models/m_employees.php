<?php

class m_employees extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_ue(){
        return $this->db->get('users_employee')->result();
    }

    function get_all_unit_completed(){
        $sql = "SELECT gk.*
            FROM users_employee ue 
            ORDER BY ue.nik";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_ue_by_id($id){
        return $this->db->get_where('users_employee',array('nik'=>$id))->row();
    }

    function add_ue($params) {
        $this->db->insert('users_employee',$params);
    }

    function edit_ue($params) {
        $this->db->update('users_employee',$params,array('nik'=>$params['nik']));
    }

    function delete_ue($params) {
       $this->db->delete('users_employee',$params,array('nik'=>$params['nik']));
    }
    
}
