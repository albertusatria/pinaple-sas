<?php

class m_kelas extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_kelas_by_unit($id_unit) {
        $sql = "SELECT * FROM ref_kelas WHERE id_unit = '$id_unit'";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }        
    }

    function get_kelas_option_by_unit($id_unit) {
        //ambil semua di tabel 
        $sql = "SELECT *
                FROM   ref_kelas r
                WHERE  r.id_unit = '$id_unit'
                AND NOT EXISTS (SELECT *
                   FROM   kelas_aktif k
                   WHERE  r.id = k.id_kelas ) 
        ";

        // $sql = "SELECT * FROM ref_kelas r,kelas_aktif k WHERE r.id_unit = '$id_unit' AND r.id ";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }        
    }
    function get_kelas_detail($id) {
        $sql = "SELECT * FROM ref_kelas WHERE id = '$id'";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }        
    }
    // add menu
    function add_kelas($params) {
        $insert = $this->db->insert('ref_kelas',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }
    }

    // edit menu
    function edit_kelas($id,$params) {
        $this->db->where('id',$id);
        $edit = $this->db->update('ref_kelas',$params);        
        if($edit) {
            return true;
        } else {
            return false;
        }    }

    // delete menu
    function delete_kelas($id) {
        $this->db->where('id',$id);
        $delete = $this->db->delete('ref_kelas');        
        if($delete) {
            return true;
        } else {
            return false;
        }    
    }

    function get_kelas_buka_by_unit_tahun($id_unit,$thn) {

        $sql = "SELECT j.id_buka,j.id_kelas,j.kelas,j.tingkat,j.id_unit,j.id, COUNT(s.nis) jumlah
                FROM (SELECT k.id_buka,k.id_kelas,r.kelas,r.tingkat,r.id_unit,r.id
                FROM
                (SELECT a.id_buka,a.id_kelas, a.tahun_ajaran
                FROM kelas_aktif a
                WHERE a.id_unit = '$id_unit') k
                LEFT JOIN ref_kelas r 
                ON k.id_kelas = r.id
                 AND k.tahun_ajaran = '$thn' 
                 ORDER BY r.id) j
                LEFT JOIN siswa_kelas s
                ON j.id_buka = s.id_buka
                GROUP BY j.id_buka
                ORDER BY j.id";

        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }           
    }


    function get_kelas_buka_by_tahun($thn) {

        $sql = "SELECT k.id_buka,k.id_kelas,r.kelas,r.tingkat,r.id_unit,r.id
                FROM
                (SELECT a.id_buka,a.id_kelas, a.tahun_ajaran
                FROM kelas_aktif a WHERE a.tahun_ajaran = '$thn') k
                LEFT JOIN ref_kelas r 
                ON k.id_kelas = r.id
                  
                 ORDER BY r.id";

        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }           
    }


    function get_kelas_buka_by_unit_tahun_detail($id_buka) {
        $sql = "SELECT k.id_buka,k.id_kelas,r.kelas,r.tingkat,r.id_unit 
                FROM (SELECT * FROM kelas_aktif a WHERE a.id_buka = '$id_buka') k
                LEFT JOIN ref_kelas r 
                ON k.id_kelas = r.id";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }        
    }

    // add menu
    function add_buka_kelas($params) {
        $insert = $this->db->insert('kelas_aktif',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }
    }

    // add menu
    function add_siswa_kelas($params) {
        $insert = $this->db->insert('siswa_kelas',$params);        
        if($insert) {
            return true;
        } else {
            return false;
        }
    }

    // delete menu
    function delete_kelas_buka($id_buka) {
        $this->db->where('id_buka',$id_buka);
        $delete = $this->db->delete('kelas_aktif');        
        if($delete) {
            return true;
        } else {
            return false;
        }    
    }

    function get_siswa_kelas($id_buka) {
        $sql = "SELECT s.id,s.nis,s.status,s.kesimpulan,u.nama_lengkap FROM siswa_kelas s,users_siswa_alumni u 
                    WHERE s.id_buka = '$id_buka'
                    AND s.nis = u.nis";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }        
    }

    // delete menu
    function delete_siswa_kelas($id) {
        $this->db->where('id',$id);
        $delete = $this->db->delete('siswa_kelas');        
        if($delete) {
            return true;
        } else {
            return false;
        }    
    }

    // delete menu
    function update_siswa_kesimpulan($id,$input) {
        $this->db->where('id',$id);
        $update = $this->db->update('siswa_kelas',$input);        
        if($update) {
            return true;
        } else {
            return false;
        }    
    }


    //tampilkan semua siswa yang :
    //tingkat jenjangnya sesuai sama OK
    //daftar ulang OK
    //belum mendapat kelas tahun ajaran aktif
    //bukan alumni (yang daftar ulang pasti bukan siswa) OK
    function get_siswa_qualifikasi($id_unit,$tingkat,$thn) {
        $sql = "SELECT j.nis,j.nama_lengkap,j.jenjang_mulai,j.id_unit,j.status, j.unit
                FROM (SELECT u.nis,u.nama_lengkap,u.jenjang_mulai,u.id_unit,u.status, r.unit
                    FROM users_siswa_alumni u, ref_unit r
                    WHERE jenjang_mulai = '$tingkat' 
                    AND u.id_unit = r.id_unit
                    AND u.id_unit = '$id_unit'
                    AND EXISTS (SELECT *
                       FROM   daftar_ulang d
                       WHERE  u.nis = d.nis AND d.tahun_ajaran = '$thn')) j 
                WHERE NOT EXISTS (SELECT *
                    FROM siswa_kelas s
                    WHERE j.nis = s.nis AND s.tahun_ajaran = '$thn')";
        $query = $this->db->query($sql);
        // echo '<pre>'; print_r($query->result());die;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        } 
    }

    function get_siswa_kelas_lengkap_row($id){
        $sql =  "SELECT sk.id,sk.nis,rk.tingkat,ru.jenjang,ru.id_unit,usa.jenjang AS jenjang_siswa
                    FROM siswa_kelas sk
                    LEFT JOIN kelas_aktif ka ON ka.id_buka=sk.id_buka
                    LEFT JOIN ref_kelas rk ON rk.id=ka.id_kelas
                    LEFT JOIN ref_unit ru ON ru.id_unit=rk.id_unit
                    LEFT JOIN users_siswa_alumni usa ON usa.nis=sk.nis
                    WHERE sk.id = '$id' AND sk.status='BERAKHIR'
                ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        } 
    }
}
