<?php

class m_journal_items extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function add_journal_items($params) {
        $this->db->insert('journal_items',$params);
    }
    
}