<?php

class m_scholarship extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_scholarship(){
        return $this->db->get('scholarship')->result();
    }

    function get_total_rows(){
        return $this->db->get('scholarship')->num_rows();
    }
    
    function get_check_duplicate_scholarship($name,$sy_id){
        return $this->db->get_where('scholarship',array('name'=>$name,'school_year_id'=>$sy_id))->row();
    }

    function get_check_duplicate_scholarship_ex_self($name,$id,$sy_id){
        $sql = "SELECT 
                    s.*
                FROM scholarship s
                WHERE
                    s.name='$name' AND
                    s.id<>'$id' AND
                    s.school_year_id='$sy_id'
                ";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    function add_scholarship($params) {
        $this->db->insert('scholarship',$params);
    } 

    function get_scholarship_by_id($id){
        return $this->db->get_where('scholarship',array('id'=>$id))->row();
    }

    function edit_scholarship($params) {
        $this->db->update('scholarship',$params,array('id'=>$params['id']));
    }

    function delete_scholarship($params) {
       $this->db->delete('scholarship',$params,array('id'=>$params['id']));
    }

}
