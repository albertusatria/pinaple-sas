<?php

class m_extra extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_enroll_open_extra_by_u_sy($u_id,$sy_id){
        $sql = "SELECT e.*, COUNT(es.id) enroll_count
                FROM extras e
                LEFT JOIN extra_students es ON es.extra_id=e.id
                WHERE e.unit_id = '$u_id'
                AND e.school_year_id = '$sy_id'
                GROUP BY e.id";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }    

    function get_open_extra_by_id($id){
        return $this->db->get_where('extras',array('id'=>$id))->row();
    }

    function get_extra_student($c_id,$half=0){ 
        $sql = "SELECT es.*, us.full_name 
                FROM extra_students es
                LEFT JOIN users_student us ON us.nis=es.nis                 
                WHERE us.status = 'SISWA'
                AND es.extra_id = '$c_id'
                AND es.half_period = '$half'
                ";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    // get menu by slug
    function get_unit($id_unit = '') {
        $show = 'result()';
        if ($id_unit == '')
        {
            $sql = "SELECT id_unit,unit,jenjang FROM ref_unit WHERE kategori = 'AKADEMIS'";
            $show = 'result';
        }
        else 
        {
            $sql = "SELECT id_unit,unit,jenjang FROM ref_unit WHERE id_unit = '$id_unit'";
            $show = 'row';
        }
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->$show();
        } else {
            return array();
        }
    }

    function get_registered_student_not_enroll_in_this_extra($extra_id = '',$u_id ='',$sy_id='',$half=0)
    {      
        //ambil semua siswa yang belum diregiskan
        $sql = "SELECT rr.*, us.full_name, us.current_level, u.name unit_name
                FROM re_registration rr 
                LEFT JOIN users_student us ON us.nis=rr.nis
                LEFT JOIN units u ON u.id=us.unit_id
                WHERE us.unit_id = '$u_id'
                AND us.status = 'SISWA'
                AND rr.school_year_id = '$sy_id'
                AND rr.nis NOT IN 
                (SELECT es.nis 
                    FROM extra_students es
                    LEFT JOIN extras e ON e.id=es.extra_id
                    WHERE rr.nis = es.nis 
                    AND e.school_year_id = '$sy_id'
                    AND es.half_period = '$half' 
                    AND es.extra_id = '$extra_id')
                ";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_extra_by_unit($id_unit) {
        $sql = "SELECT * FROM ref_extrakurikuler WHERE id_unit = '$id_unit'";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }        
    }

    function get_extra_detail($id_extra) {
        $sql = "SELECT * FROM ref_extrakurikuler WHERE id_extra = '$id_extra'";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }        
    }

    function add_extra_student($params) {
        $insert = $this->db->insert('extra_students',$params);        
        if($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function delete_extra_student($params) {
        $del=$this->db->delete('extra_students',array('id'=>$params['id']));
        if($del) {
            $this->db->where('status','UNPAID');
            $this->db->where('extra_id',$params['id']);
            $this->db->where('nis',$params['nis']);
            $del = $this->db->delete('invoices');
            return true;
        } else {
            return false;
        }
    }

    // add menu
    function add_extra($id_unit,$params) {
        $this->db->where('id_unit',$id_unit);
        $insert = $this->db->insert('ref_extrakurikuler',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }
    }

    // edit menu
    function edit_extra($id_extra,$params) {
        $this->db->where('id_extra',$id_extra);
        $edit = $this->db->update('ref_extrakurikuler',$params);        
        if($edit) {
            return true;
        } else {
            return false;
        }    }

    // delete menu
    function delete_extra($id_extra,$params) {
        $this->db->where('id_extra',$id_extra);
        $delete = $this->db->delete('ref_extrakurikuler');        
        if($delete) {
            return true;
        } else {
            return false;
        }    
    }





}
