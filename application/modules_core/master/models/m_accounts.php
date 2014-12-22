<?php

class M_accounts extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_accounts(){
        $sql = "SELECT a.accounting_id, a.name, a.tipe, a.parent_id, c.name'parent_name', a.description
                FROM accounting_account a
                LEFT JOIN accounting_account c ON a.parent_id = c.accounting_id
                ORDER BY a.tipe,a.accounting_id";
        $query = $this->db->query($sql);
        // $this->db->select('pages.*, p.slug as parent_slug, p.title as parent_title');
        // $this->db->join('pages as p', 'pages.parent_id=p.id', 'left');
        return $query->result_array();
    }

    public function get_accounting_nested()
    {
        $this->db->order_by('tipe','accounting_id');
        $accounting = $this->db->get('accounting_account')->result_array();
        
        $array = array();
        foreach ($accounting as $acc) {
            if (! $acc['parent_id']) {
                // This page has no parent
                $array[$acc['accounting_id']] = $acc;
            }
            else {
                // This is a child page
                $array[$acc['parent_id']]['children'][] = $acc;
            }
        }
        // echo "<pre>"; print_r($array);die;
        return $array;
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
        return $this->db->get_where('accounting_account',array('accounting_id'=>$id))->row();
    }

    function edit_accounts($params) {
        $this->db->update('accounting_account',$params,array('accounting_id'=>$params['id']));
    }

    function delete_accounts($params) {
       $this->db->delete('accounting_account',$params,array('accounting_id'=>$params['id']));
    }

}
