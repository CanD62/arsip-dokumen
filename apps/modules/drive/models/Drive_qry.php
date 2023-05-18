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

    public function jml_supplier() {
    
        $str = "Select
        Count(tb_supplier.supplier_id) As jml
    From
        tb_supplier";

        
     $query = $this->db->query($str);
     return $query->row_array();
    }

    public function jml_pelanggan() {
    
        $str = "Select
        Count(tb_pelanggan.pelanggan_id) As jml
    From
        tb_pelanggan";

        
     $query = $this->db->query($str);
     return $query->row_array();
    }

    public function jml_masuk() {
    
        $str = "Select
        SUM(tb_masuk.jumlah) AS jml
    From
        tb_masuk";

        
     $query = $this->db->query($str);
     return $query->row_array();
    }

    public function jml_keluar() {
    
        $str = "Select
        Sum(tb_keluar.jumlah) As jml
    From
        tb_keluar";

        
     $query = $this->db->query($str);
     return $query->row_array();
    }

    public function trx() {
    
        $str = "Select
        trx.kd,
        trx.tgl,
        trx.nmbarang,
        trx.jumlah,
        trx.status
    From
        (Select
             tb_masuk.kdmasuk As kd,
             tb_masuk.tglmasuk As tgl,
             tb_barang.nmbarang,
             tb_masuk.jumlah,
             1 AS status
         From
             tb_masuk Inner Join
             tb_barang On tb_barang.barang_id = tb_masuk.barang_id
         UNION All
         Select
             tb_keluar.kdkeluar As kd,
             tb_keluar.tglkeluar As tgl,
             tb_barang.nmbarang,
             tb_keluar.jumlah,
             0 AS status
         From
             tb_keluar Inner Join
             tb_barang On tb_barang.barang_id = tb_keluar.barang_id
        
         Order By
             tgl Desc) As trx LIMIT 20";

        
     $query = $this->db->query($str);
     return $query->result_array();
    }

    public function barang() {
    
        $str = "Select
        tb_barang.kdbarang,
        tb_barang.nmbarang,
        tb_supplier.nmsupplier,
        tb_barang.harga_masuk,
        tb_barang.harga_keluar,
        tb_barang.created_at
    From
        tb_barang Inner Join
        tb_supplier On tb_supplier.supplier_id = tb_barang.supplier_id
    Order By
        tb_barang.created_at Desc LIMIT 10";

        
     $query = $this->db->query($str);
     return $query->result_array();
    }



}