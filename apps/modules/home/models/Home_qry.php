<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This is an EXAMPLE user model, edit to match your implementation
 * OR use the adapter model for easy integration with an existing model
 */
class Home_qry extends CI_Model {


    public function get_user($user_id) {
    
        $str = "Select
        iventory.users.user_id,
        iventory.users.username,
        iventory.users.email,
        iventory.users.level
    From
        iventory.users
    Where
        iventory.users.user_id = '$user_id'";

        
     $query = $this->db->query($str);
     return $query->row_array();
    }

    public function jml_admin() {
    
        $str = "Select
        count(user_id) as jml
    From
        users where level=1
    Group By
        users.level";

        
     $query = $this->db->query($str);
     return $query->row_array();
    }

    public function jml_pendidik() {
    
        $str = "Select
        count(user_id) as jml
    From
        users where level=2
    Group By
        users.level";

        
     $query = $this->db->query($str);
     return $query->row_array();
    }

    public function jml_kependidikan() {
    
        $str = "Select
        count(user_id) as jml
    From
        users where level=2
    Group By
        users.level";

        
     $query = $this->db->query($str);
     return $query->row_array();
    }

    public function jml_dokumen() {
    
        $str = "Select
        count(tb_dokumen.id_dokumen) as jml
    From
        tb_dokumen
    Where
        tb_dokumen.enabled = 1";

        
     $query = $this->db->query($str);
     return $query->row_array();
    }

    public function getDokumen($data = null) {
    
        $userid = isset($data) ? $data : '';
        !empty($data) ?  $sqluserid = " And users.user_id = '$userid'" : $sqluserid = "";

        $str = "Select
        users.nama_lengkap,
        tb_dokumen.nama_dokumen,
        tb_dokumen.size,
        tb_dokumen.created_at,
        tb_jenis.nama_jenis,
        tb_type.nama_type,
        tb_type.icon,
        tb_type.color
    From
        tb_dokumen Inner Join
        tb_jenis On tb_jenis.id_jenis = tb_dokumen.id_jenis Inner Join
        tb_type On tb_type.id_type = tb_dokumen.id_type Inner Join
        users On users.user_id = tb_dokumen.user_id
    Where
        tb_dokumen.enabled = 1 $sqluserid
    Order by created_at DESC LIMIT 5";
        
     $query = $this->db->query($str);
     return $query->result_array();
    }


    public function getUser() {
    
        $userid = $this->session->userdata('auth_user');

        $str = "Select
        users.user_id,
        users.nip,
        users.nama_lengkap,
        users.level,
        case  when users.level =1 then 'Admin'
                  when users.level =2 then 'Tenaga Pendidik'
                  when users.level =3 then 'Tenaga Kependidikan'
             end AS status
    From
        users
    Where
        users.user_id = '$userid'";
        
     $query = $this->db->query($str);
     return $query->row_array();
    }
   
    public function getDokumenUser() {
    
        $userid = $this->session->userdata('auth_user');

        $str = "Select
        Count(tb_dokumen.user_id) As jml,
        tb_type.color,
        tb_jenis.nama_jenis
    From
        tb_dokumen Inner Join
        tb_type On tb_type.id_type = tb_dokumen.id_type Inner Join
        tb_jenis On tb_jenis.id_jenis = tb_dokumen.id_jenis
    Where
        tb_dokumen.user_id = '$userid' And
        tb_dokumen.enabled = 1
    Group By
        tb_dokumen.user_id,
        tb_type.color,
        tb_jenis.nama_jenis,
        tb_dokumen.user_id";
        
     $query = $this->db->query($str);
     return $query->result_array();
    }



}