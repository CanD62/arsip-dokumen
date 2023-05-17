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