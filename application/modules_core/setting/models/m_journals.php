<?php

class m_journals extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function add_journals($params) {
        $this->db->insert('journals',$params);
    }

}