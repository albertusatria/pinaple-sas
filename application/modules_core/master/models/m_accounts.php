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
                ORDER BY a.tipe DESC,a.accounting_id";
        $query = $this->db->query($sql);
        // $this->db->select('pages.*, p.slug as parent_slug, p.title as parent_title');
        // $this->db->join('pages as p', 'pages.parent_id=p.id', 'left');
        return $query->result_array();
    }

    function get_pendapatan_account_list() {
        $this->db->where('tipe','PENDAPATAN');
        $this->db->where('postable','DA');
        return $this->db->get('accounting_account')->result_array();        
    }

    function get_status_opening_balance() {
        return $this->db->get('accounting_first_balance_status_setup')->row_array();        
    }

    function change_status_opening_balance($opening_date) {
        $params['date_begin'] = $opening_date;
        $params['setup_status'] = 1;
        return $this->db->update('accounting_first_balance_status_setup',$params);        
    }

    function get_opening_year() {
        $sql = "SELECT *,min(id)'opening_id' FROM school_year WHERE opening = 'YA' LIMIT 1";
        return $this->db->query($sql)->row_array();        
    }

    function get_accounting_balance() {
        $sql = "SELECT min(id)'id' FROM school_year WHERE opening = 'YA' LIMIT 1";
        $query = $this->db->query($sql)->row_array();
        $id = $query['id'];

        $this->db->where('a.tipe','AKTIVA');
        $this->db->order_by('a.tipe','a.accounting_id');
        $this->db->select('a.*,o.accounting_year,o.amount,o.amount_type');
        $this->db->from('accounting_account a');
        $this->db->join('accounting_opening_balance o','a.accounting_id = o.accounting_id AND o.accounting_year = "'.$id.'"','left');
        // $this->db->where('',$id);
        $accounting = $this->db->get()->result_array();
        
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

    function save_opening_balance($params) {
        return $this->db->insert('accounting_opening_balance',$params);
    }

    public function get_accounting_nested($opening=false)
    {
        if ($opening == true) 
        {
            $this->db->where('tipe','AKTIVA');
        }
        // $this->db->order_by('tipe','accounting_id');
        $accounting = $this->db->get('accounting_account')->result_array();
        
        $arr = array();
        foreach ($accounting as $acc) {
            if ($acc['parent_id'] == NULL) {
                // This page has no parent
                $arr[$acc['accounting_id']] = $acc;
            }
        }
        foreach ($accounting as $acc) {
            if ($acc['parent_id'] != NULL) {
                // This is a child page
                $arr[$acc['parent_id']]['children'][] = $acc;
            }
        }
        // echo "<pre>"; print_r($arr);die;
        return $arr;
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

    function edit_accounts($params,$id) {
        $this->db->where('accounting_id',$id);
        $update = $this->db->update('accounting_account',$params);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    function delete_accounts($params) {
        $acc = $this->db->get_where('accounting_account',array('accounting_id'=>$params['accounting_id']))->row();
        if ($acc->mandatory == 1) {
            //cek if mandatory
            return 'mandatory';
            // echo 'mandatory';
        } else {
            $child = $this->db->get_where('accounting_account',array('parent_id'=>$params['accounting_id']));
            if ($child->num_rows() > 0) {
                //if has children
                foreach ($child->result_array() as $val) {
                    $x = $this->db->get_where('accounting_general_journal',array('accounting_code'=>$val['id']));
                    if ($x->num_rows() > 0) {
                        return 'child_use';
                        // echo 'child_use';
                    } 
                }
            } else {
                //don't have children
                $rows = $this->db->get_where('accounting_general_journal',array('accounting_code'=>$params['accounting_id']));
                if ($rows->num_rows() > 0) {
                    return 'use';
                    // echo 'use';
                } 
            }
        }
        // echo "sukses";
        // die;
        $delete = $this->db->delete('accounting_account',$params,array('accounting_id'=>$params['accounting_id']));
        if ($delete) {
            return 'berhasil';
        } else {
            return 'gagal';
        }
    }

}
