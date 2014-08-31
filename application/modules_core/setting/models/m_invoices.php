<?php

class m_invoices extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function add_invoices($params) {
        $this->db->insert('invoices',$params);
    }

    function add_invoice_items($params) {
        $this->db->insert('invoice_items',$params);
    }

}