<?php

class m_tahun_ajaran extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_tahun_ajaran(){
        return $this->db->get('tahun_ajaran')->result();
    }

    function get_tahun_ajaran_by_id($id){
        return $this->db->get_where('tahun_ajaran',array('id'=>$id))->row();
    }

    function get_tahun_ajaran_nama($ta,$id){
        $sql = "SELECT *
                FROM tahun_ajaran
                WHERE tahun_ajaran = '$ta' AND id<>'$id'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_status_aktif($id){
       $sql = "SELECT *
                FROM tahun_ajaran
                WHERE status = 'AKTIF' AND id<>'$id'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function add_tahun_ajaran($params) {
        $this->db->insert('tahun_ajaran',$params);
    }

    function edit_tahun_ajaran($params) {
        $this->db->update('tahun_ajaran',$params,array('id'=>$params['id']));
    }

    function delete_tahun_ajaran($params) {
       $this->db->delete('tahun_ajaran',$params,array('id'=>$params['id']));
    }

    function get_tahun_aktif(){
       $sql = "SELECT *
                FROM tahun_ajaran
                WHERE status = 'AKTIF' limit 1";

        $query = $this->db->query($sql);
        //echo '<pre>'; print_r($query->result()); die;
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    
    function get_all_ta_costs($id){
        $sql = "SELECT 
                    ta.id AS ta_id,
                    ac.id AS ac_id,
                    it.name AS item_name,
                    ru.unit AS unit_name,
                    ac.amount AS item_amount
                FROM tahun_ajaran ta
                INNER JOIN administration_costs ac ON ac.tahun_ajaran_id=ta.id 
                LEFT JOIN ref_unit ru ON ru.id_unit=ac.unit_id
                LEFT JOIN items_type it ON it.id=ac.item_type_id
                WHERE ta.id='$id'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_check_duplicate_cost($ta_id,$un_id,$it_id){
        return $this->db->get_where('administration_costs',array('tahun_ajaran_id'=>$ta_id,'unit_id'=>$un_id,'item_type_id'=>$it_id))->row();
    }


    function get_check_duplicate_cost_except_self($id,$ta_id,$un_id,$it_id){
        $sql = "SELECT 
                    ac.*
                FROM administration_costs ac
                WHERE
                    ac.tahun_ajaran_id='$ta_id' AND
                    ac.unit_id='$un_id' AND
                    ac.item_type_id='$it_id' AND
                    ac.id<>'$id'
                ";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }


    function get_administration_cost_by_id($id){
        return $this->db->get_where('administration_costs',array('id'=>$id))->row();
    }

    function add_administration_costs($params) {
        $this->db->insert('administration_costs',$params);
    }

    function edit_administration_costs($params) {
        $this->db->update('administration_costs',$params,array('id'=>$params['id']));
    }

    function delete_administration_costs($params) {
       $this->db->delete('administration_costs',$params,array('id'=>$params['id']));
    }

    function get_administration_cost_by_ta_name($ta,$nm,$iu){
        $sql = "SELECT 
                    it.id, it.name, ac.amount
                FROM administration_costs ac
                LEFT JOIN items_type it ON it.id=ac.item_type_id
                WHERE
                    ac.tahun_ajaran_id='$ta' AND
                    it.name='$nm' AND
                    ac.unit_id='$iu'
                ";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }

    function get_all_periods(){
        return $this->db->get('periods')->result();
    }

}
