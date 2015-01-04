<?php

class M_students extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_students(){
        $sql = "SELECT us.*, u.name unit_name, c.name class_name
                FROM users_student us 
                LEFT JOIN units u ON us.unit_id = u.id 
                LEFT JOIN classes c ON c.id = us.class_id 
                ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_siswa_list_by_filters($params){
        $nis       = '%'.$params['nis'].'%';
        $full_name = '%'.$params['full_name'].'%';
        $unit_name = '%'.$params['unit_name'].'%';
        $current_level = '%'.$params['current_level'].'%';
        $status    = '%'.$params['status'].'%';

        $sql = "SELECT us.*, u.name unit_name, c.name class_name
                FROM users_student us 
                LEFT JOIN units u ON us.unit_id = u.id 
                LEFT JOIN classes c ON c.id = us.class_id 
                WHERE us.nis LIKE '$nis'
                AND us.full_name LIKE '$full_name'
                AND u.name LIKE '$unit_name'
                AND us.current_level LIKE '$current_level'
                AND us.status LIKE '$status'
                ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }

    function edit_student($params){
        $this->db->update('users_student',$params,array('nis'=>$params['nis']));
    }

    function get_achievement_student_by_nis($nis){
        return $this->db->get_where('students_achievement',array('nis'=>$nis))->result_array();
    }

    function edit_achievement($params){
        $this->db->update('students_achievement',$params,array('id'=>$params['id']));
    }

    function get_invoices_student_by_nis($nis){
        $sql = "SELECT  i.*,t.name as item_name, 
                        p.name as period_name, 
                        y.name as packet_name, 
                        e.name as extra_name, 
                        t.accounting_code,
                        cc.name as class_name,
                        cc.level as class_level
                FROM
                (SELECT * FROM invoices WHERE nis = '$nis') i
                LEFT JOIN items_type t ON i.item_type_id = t.id
                LEFT JOIN periods p ON p.id = i.period_id
                LEFT JOIN extras e ON e.id = i.extra_id
                LEFT JOIN packets_year y ON i.packet_id = y.id
                LEFT JOIN school_year s ON s.name=i.period_year
                LEFT JOIN 
                (   
                    SELECT c.*,cs.nis
                    FROM classes c
                    LEFT JOIN class_students cs ON cs.class_id=c.id
                    WHERE cs.nis='$nis'
                ) cc ON cc.school_year_id=s.id 
                WHERE i.deleted=0
                ORDER BY i.period_year,i.dc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_student_classes_by_nis($nis){
        $sql = "SELECT cs.*,
                    sy.id school_year_id, sy.name school_year_name,
                    c.name class_name,
                    c.level class_level,
                    u.name unit_name
                FROM class_students cs
                LEFT JOIN classes c ON c.id = cs.class_id
                LEFT JOIN units u ON u.id = c.unit_id
                LEFT JOIN school_year sy ON sy.id=c.school_year_id
                WHERE cs.nis='$nis'
                ORDER BY sy.name";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_student_extras_by_nis($nis){
        $sql = "SELECT es.*,
                    sy.id school_year_id, sy.name school_year_name,
                    e.name extra_name,
                    u.name unit_name
                FROM extra_students es
                LEFT JOIN extras e ON e.id = es.extra_id
                LEFT JOIN units u ON u.id = e.unit_id
                LEFT JOIN school_year sy ON sy.id=e.school_year_id
                WHERE es.nis='$nis'
                ORDER BY sy.name";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }   
    }

}
