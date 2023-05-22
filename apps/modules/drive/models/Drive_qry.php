<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This is an EXAMPLE user model, edit to match your implementation
 * OR use the adapter model for easy integration with an existing model
 */
class Drive_qry extends CI_Model {
    var $table = 'tb_dokumen';

    public function getJenis() {
    
        $str = "Select
        tb_jenis.id_jenis,
        tb_jenis.nama_jenis,
        tb_jenis.created_at,
        tb_jenis.enabled
    From
        tb_jenis
    Where
        tb_jenis.enabled = 1";

        
     $query = $this->db->query($str);
     return $query->result_array();
    }

    public function getTipe($ext) {
    
        $str = "Select
        tb_type.id_type,
        tb_type.nama_type,
        tb_type.extensi,
        tb_type.icon,
        tb_type.color,
        tb_type.created_at,
        tb_type.enabled
    From
        tb_type
    Where
        tb_type.extensi Like '%$ext%' And
        tb_type.enabled = 1";

        
     $query = $this->db->query($str);
     return $query->row_array();
    }

    public function save($user)
    {
        $this->db->trans_begin();
        $user['id_dokumen'] = $this->uuid->v4();
        $this->db->set('created_at', 'NOW()', FALSE);
        
        $this->db->insert($this->table, $user);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $return = 0;
        } else {
            $this->db->trans_commit();
            $return = 1;
        }

        return $return;
    }


    public function update($data, $id_dokumen)
    {
        $this->db->trans_begin();
        $this->db->set('update_at', 'NOW()', FALSE);
        $this->db->where('id_dokumen', $id_dokumen);
        $this->db->update($this->table, $data);
           

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $return = 0;
        } else {
            $this->db->trans_commit();
            $return = 1;
        }

        return $return;
    }

    
    public function getDokumen($data = null)
    {
        $tipe = isset($data['tipe']) ? $data['tipe'] : '';
        $jenis = isset($data['jenis']) ? $data['jenis'] : '';
        $sort = isset($data['sort']) ? $data['sort'] : '';
        // $urutan = $data['urutan'];
        $kata_kunci = isset($data['kata_kunci']) ? $data['kata_kunci'] : '';
        $id_dokumen = isset($data['id_dokumen']) ? $data['id_dokumen'] : '';

        !empty($data['tipe']) && $data['tipe'] !== 'all' ?  $sqltipe = " And tb_type.id_type = '$tipe'" : $sqltipe = "";
        !empty($data['jenis']) && $data['jenis'] !== 'all'? $sqljenis = " And tb_jenis.id_jenis = '$jenis'" : $sqljenis = "";
        !empty($data['urutan']) && $data['urutan'] == '1' ?  $sqlurutan = " Order By nama_dokumen" : $sqlurutan = " Order By created_at";
        !empty($data['kata_kunci']) ?  $sqlkatakunci = " And tb_dokumen.nama_dokumen Like '%$kata_kunci%' " : $sqlkatakunci = "";
        !empty($data['id_dokumen']) ?  $sqldokumen = " And tb_dokumen.id_dokumen = '$id_dokumen'" : $sqldokumen = "";


        $userid = $this->session->userdata('auth_user');
       $str = "Select
       tb_dokumen.id_dokumen,
       tb_jenis.id_jenis,
       tb_dokumen.nama_dokumen,
       tb_dokumen.deskripsi,
       tb_dokumen.file,
       tb_dokumen.size,
       tb_dokumen.created_at,
       tb_type.icon,
       tb_type.color,
       tb_jenis.nama_jenis,
       tb_type.nama_type,
       tb_dokumen.update_at
   From
       tb_dokumen Inner Join
       tb_type On tb_type.id_type = tb_dokumen.id_type Inner Join
       tb_jenis On tb_jenis.id_jenis = tb_dokumen.id_jenis
   Where
       tb_dokumen.user_id = '$userid' And tb_dokumen.enabled=1 $sqldokumen $sqlkatakunci $sqltipe $sqljenis $sqlurutan $sort";
    //    echo $str;exit;
    $query = $this->db->query($str);
     return $query->result_array();
    }


    public function getTipeAll()
    {
       $str = "Select
       tb_type.id_type,
       tb_type.nama_type
   From
       tb_type
   Where
       tb_type.enabled = 1
   Order By
       tb_type.nama_type";
       
    $query = $this->db->query($str);
     return $query->result_array();
    }

    public function getJenisAll()
    {
       $str = "Select
       tb_jenis.id_jenis,
       tb_jenis.nama_jenis
   From
       tb_jenis
   Where
       tb_jenis.enabled = 1";
       
    $query = $this->db->query($str);
     return $query->result_array();
    }

    



}