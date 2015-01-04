<?php

class M_account_report extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_summary_of_profit_loss($start='2014-12-01',$end='2014-12-31')
    {
        $this->db->where('tipe !=','AKTIVA');
        // $this->db->order_by('tipe','accounting_id');
        $sql = "SELECT a.*,
				SUM(IF(j.amount_type='D',j.amount,0))'debet',
				SUM(IF(j.amount_type='K',j.amount,0))'kredit'
         		FROM accounting_account a 
        		LEFT JOIN (SELECT * FROM accounting_general_journal 
        					WHERE DATE(transaction_date) >= '$start' AND DATE(transaction_date) <= '$end') j ON a.accounting_id = j.accounting_code
        		WHERE tipe != 'AKTIVA'
        		GROUP BY a.accounting_id";
        $accounting = $this->db->query($sql)->result_array();
        // $accounting = $this->db->query($sql)->result_array();
        // $accounting = $this->db->get('accounting_account')->result_array();
        // echo '<pre>'; print_r($accounting->result_array());die;
	        
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

    public function get_summary_of_profit($start='2014-12-01',$end='2014-12-31')
    {
        // tahun 
        // $this->db->order_by('tipe','accounting_id');
        $sql = "SELECT a.*,
                SUM(IF(j.amount_type='D',j.amount,0))'debet',
                SUM(IF(j.amount_type='K',j.amount,0))'kredit',
                i.period_year, i.stage_id, s.nama
                FROM accounting_account a 
                LEFT JOIN (SELECT * FROM accounting_general_journal 
                            WHERE DATE(transaction_date) >= '$start' AND DATE(transaction_date) <= '$end') j ON a.accounting_id = j.accounting_code
                LEFT JOIN invoices i ON j.invoice_id = i.id 
                LEFT JOIN stage s ON s.id = i.stage_id 
                WHERE tipe = 'PENDAPATAN'
                GROUP BY a.accounting_id,i.period_year, i.stage_id";
        $accounting = $this->db->query($sql)->result_array();
        // $accounting = $this->db->query($sql)->result_array();
        // $accounting = $this->db->get('accounting_account')->result_array();
        // echo '<pre>'; print_r($accounting);die;
            
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
                $arr[$acc['parent_id']]['children'][$acc['accounting_id']] = $acc;
            }
        }
        foreach ($accounting as $acc) {
            if ($acc['parent_id'] != NULL) {
                if ($acc['period_year'] != NULL) {
                    // This is a child page
                    $arr[$acc['accounting_id']]['children'][$acc['accounting_id']]['period'][$acc['period_year']] = $acc;
                }
            } else {
                if ($acc['period_year'] != NULL) {
                    // This is a child page
                    $arr[$acc['accounting_id']]['period'][$acc['period_year']] = $acc;
                }                
            }
        }
        foreach ($accounting as $acc) {
            if ($acc['parent_id'] != NULL) {
                if ($acc['stage_id'] != NULL) {
                    // This is a child page
                    $arr[$acc['accounting_id']]['children'][$acc['accounting_id']]['period'][$acc['period_year']]['kelas'][] = $acc;
                }
            }
            else {
                if ($acc['stage_id'] != NULL) {
                    // This is a child page
                    $arr[$acc['accounting_id']]['period'][$acc['period_year']]['kelas'][] = $acc;
                }
            }
        }
        // echo "<pre>"; print_r($arr);die;
        return $arr;
    }

    public function get_summary_of_profit_group($start='2014-12-01',$end='2014-12-31')
    {
        $this->db->where('tipe !=','AKTIVA');
        // $this->db->order_by('tipe','accounting_id');
        $sql = "SELECT a.*,
                SUM(IF(j.amount_type='D',j.amount,0))'debet',
                SUM(IF(j.amount_type='K',j.amount,0))'kredit'
                FROM accounting_account a 
                LEFT JOIN (SELECT * FROM accounting_general_journal 
                            WHERE DATE(transaction_date) >= '$start' AND DATE(transaction_date) <= '$end') j ON a.accounting_id = j.accounting_code
                WHERE tipe != 'AKTIVA'
                GROUP BY a.accounting_id";
        $accounting = $this->db->query($sql)->result_array();
        // $accounting = $this->db->query($sql)->result_array();
        // $accounting = $this->db->get('accounting_account')->result_array();
        // echo '<pre>'; print_r($accounting->result_array());die;
            
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

    public function get_summary_of_cash_out($start,$end) {
        // $this->db->order_by('tipe','accounting_id');
        $sql = "SELECT a.*, IFNULL(j.is_transfer,'0')'transfer',
                SUM(IF(j.amount_type='D',j.amount,0))'debet',
                SUM(IF(j.amount_type='K',j.amount,0))'kredit'
                FROM accounting_account a 
                LEFT JOIN (SELECT * FROM accounting_general_journal 
                            WHERE DATE(transaction_date) >= '$start' AND DATE(transaction_date) <= '$end') j ON a.accounting_id = j.accounting_code
                WHERE tipe = 'AKTIVA'
                -- AND j.is_transfer = 0
                AND ( a.accounting_id = 'A0200' OR a.accounting_id = 'A0300' OR a.accounting_id = 'A0400' OR a.accounting_id = 'A0500' ) 
                GROUP BY a.accounting_id, j.is_transfer";
        $accounting = $this->db->query($sql)->result_array();
        // $accounting = $this->db->query($sql)->result_array();
        // $accounting = $this->db->get('accounting_account')->result_array();
        // echo '<pre>'; print_r($accounting);die;
        $arr = array();
        foreach ($accounting as $acc) {
            if ($acc['parent_id'] == NULL) {
                // This page has no parent
                $arr[$acc['accounting_id']] = $acc;
            }
        }
        // echo "<pre>"; print_r($arr);die;
        return $arr;
    }

    public function get_summary_of_cash_before_report() {
        // input awal + cashflow waktu lebih besar dari input awal / neraca saldo
        // $this->db->order_by('tipe','accounting_id');
        $sql = "SELECT a.*,
                SUM(IF(j.amount_type='D',j.amount,0))'debet',
                SUM(IF(j.amount_type='K',j.amount,0))'kredit'
                FROM accounting_account a 
                LEFT JOIN (SELECT * FROM accounting_general_journal 
                            WHERE DATE(transaction_date) >= '$start' AND DATE(transaction_date) <= '$end') j ON a.accounting_id = j.accounting_code
                WHERE tipe = 'AKTIVA'
                GROUP BY a.accounting_id";
        $accounting = $this->db->query($sql)->result_array();
        // $accounting = $this->db->query($sql)->result_array();
        // $accounting = $this->db->get('accounting_account')->result_array();
        // echo '<pre>'; print_r($accounting->result_array());die;
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

}