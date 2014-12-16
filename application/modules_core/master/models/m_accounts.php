<?php

class M_accounts extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_accounts(){
        return $this->db->get('accounting_account')->result();
    }

    function get_total_rows(){
        return $this->db->get('accounting_account')->num_rows();
    }

    function get_check_duplicate_accounts($name){
        return $this->db->get_where('accounting_account',array('name'=>$name))->row();
    }
    
    function get_check_duplicate_accounts_ex_self($name,$id){
        $sql = "SELECT 
                    a.*
                FROM accounting_account a
                WHERE
                    a.name='$name' AND
                    a.id<>'$id'
                ";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    function add_accounts($params) {
        $this->db->insert('accounting_account',$params);
    } 

    function get_accounts_by_id($id){
        return $this->db->get_where('accounting_account',array('id'=>$id))->row();
    }

    function edit_accounts($params) {
        $this->db->update('accounting_account',$params,array('id'=>$params['id']));
    }

    function delete_accounts($params) {
       $this->db->delete('accounting_account',$params,array('id'=>$params['id']));
    }

}
