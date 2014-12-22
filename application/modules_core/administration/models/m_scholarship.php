<?php

class m_scholarship extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_scholarship(){
        return $this->db->get('scholarship')->result();
    }

    function get_scholarship_by_year($sy_id){
        return $this->db->get_where('scholarship',array('school_year_id'=>$sy_id))->result();
    }

    function get_notyet_used_scholarship_by_year($sy_id){
        $sql = "SELECT *
                FROM school_year
                WHERE status = 'aktif'
                LIMIT 1";
        $query = $this->db->query($sql);
        $schoolyear = $query->row();
        $id = $schoolyear->id;

        $sql = "SELECT 
                  s.id,
                  s.name,
                  s.school_year_id,
                  s.description,
                  s.amount - SUM(sa.amount) AS amount 
                FROM
                  scholarship s 
                  LEFT JOIN scholarship_allocation sa 
                    ON sa.scholarship_id = s.id 
                WHERE s.school_year_id = '$sy_id' 
                GROUP BY s.id
                ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }        
    }

    function get_list_siswa_for_scholarship($keyword) {
        $sql = "SELECT *
                FROM school_year
                WHERE status = 'aktif'
                LIMIT 1";
        $query = $this->db->query($sql);
        $schoolyear = $query->row();
        $id = $schoolyear->id;

        $sql = "SELECT s.*, u.name FROM users_student s 
                LEFT JOIN units u ON s.unit_id = u.id 
                LEFT JOIN invoices i ON i.nis = s.nis
                WHERE (s.nis LIKE '%$keyword%' OR s.full_name LIKE '%$keyword%') AND s.status = 'SISWA' AND 
                EXISTS (SELECT *
                    FROM   re_registration r
                    WHERE  s.nis = r.nis AND r.school_year_id = '$id')
                HAVING SUM(i.amount) > 0 AND SUM(i.scholarship) = 0
                LIMIT 12";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result_array();
        } else {
            return array();
        }
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

    function add_scholarship_allocation($params) {
        $this->db->insert('scholarship_allocation',$params);
    }

}
