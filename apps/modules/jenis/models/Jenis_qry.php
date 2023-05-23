<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This is an EXAMPLE user model, edit to match your implementation
 * OR use the adapter model for easy integration with an existing model
 */
class Jenis_qry extends CI_Model
{
    var $table = 'tb_jenis';

    public function getJenis($data = null)
    {
        $id_jenis = isset($data['id_jenis']) ? $data['id_jenis'] : '';
        !empty($data['id_jenis']) ?  $sqlid_jenis= " And tb_jenis.id_jenis = '$id_jenis'" : $sqlid_jenis = "";

        $str = "Select
        tb_jenis.id_jenis,
        tb_jenis.nama_jenis,
        Count(tb_dokumen.id_dokumen) As jml_dokumen,
        case when tb_jenis.enabled=1 then 'AKTIF' end as status
    From
        tb_jenis Left Join
        (Select
             tb_dokumen.id_dokumen,
             tb_dokumen.id_jenis
         From
             tb_dokumen
         Where
             tb_dokumen.enabled = 1) As tb_dokumen On tb_dokumen.id_jenis = tb_jenis.id_jenis
    Where
        tb_jenis.enabled = 1 $sqlid_jenis
    Group By
        tb_jenis.id_jenis,
        tb_jenis.nama_jenis,
        tb_jenis.enabled";

        $query = $this->db->query($str);
        return $query->result_array();
    }

    public function save($user)
    {
        $this->db->trans_begin();
        $user['id_jenis'] = $this->uuid->v4();
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

    public function update($data, $id_jenis)
    {
        $this->db->trans_begin();
        $this->db->where('id_jenis', $id_jenis);
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

    // public function delete($user_id)
    // {
    //     $this->db->where('user_id', $user_id);
    //     $this->db->delete('users');
    //     $query = $this->db->affected_rows();
    //     return $query;
    // }
    
}
