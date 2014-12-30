<?php

class M_reports extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_students_for_student_registrations($sy_id){
        $sql = "SELECT us.*, u.name unit_name, c.name class_name,
                IF(r.id IS NOT NULL, 'Registered', 'Unregistered') reg_status
                FROM users_student us 
                LEFT JOIN units u ON us.unit_id = u.id 
                LEFT JOIN classes c ON c.id = us.class_id
                LEFT JOIN re_registration r ON r.nis=us.nis AND r.school_year_id='$sy_id'
                ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }

    function get_siswa_list_by_filters_for_student_registrations($params){
        $nis       = '%'.$params['nis'].'%';
        $full_name = '%'.$params['full_name'].'%';
        $unit_name = '%'.$params['unit_name'].'%';
        $current_level = '%'.$params['current_level'].'%';
        $registration_type = '%'.$params['registration_type'].'%';
        
        if($params['reg_status']=="ALL")
            $reg_status = "";
        elseif($params['reg_status'])
            $reg_status = "AND r.id IS NOT NULL";
        else
            $reg_status = "AND r.id IS NULL";

        $sy_id = $params['school_year_id'];

        $sql = "SELECT us.*, u.name unit_name, c.name class_name,
                IF(r.id IS NOT NULL, 'Registered', 'Unregistered') reg_status
                FROM users_student us 
                LEFT JOIN units u ON us.unit_id = u.id 
                LEFT JOIN classes c ON c.id = us.class_id
                LEFT JOIN re_registration r ON r.nis=us.nis AND r.school_year_id='$sy_id' 
                WHERE us.nis LIKE '$nis'
                AND us.full_name LIKE '$full_name'
                AND u.name LIKE '$unit_name'
                AND us.current_level LIKE '$current_level'
                AND us.registration_type LIKE '$registration_type'
                ".$reg_status."
                ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }

}
