<?php

class M_transaksi extends Artdev_Model {

    //count all
    public function count_all()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->num_rows();
          return $result;
        }
        return 0;
    }

    //get all
    public function get_list($kasir_id)
    {
        $this->db->select('a.*, b.harga, b.barang_nm, b.barang_kd');
        $this->db->from('detail_transaksi a');
        $this->db->join('barang b', 'a.barang_id = b.barang_id'); 
        $this->db->where('a.mdb', $kasir_id); 
        $this->db->where('a.pembayaran_st', 'process'); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->result_array();
          $query->free_result();
          return $result;
        }
        return array();
    }

    //get all
    public function get_detail_by_id($transaksi_id)
    {
        $this->db->select('a.*, b.harga, b.barang_nm, b.barang_kd');
        $this->db->from('detail_transaksi a');
        $this->db->join('barang b', 'a.barang_id = b.barang_id'); 
        $this->db->where('a.transaksi_id', $transaksi_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->result_array();
          $query->free_result();
          return $result;
        }
        return array();
    }

    //get all
    public function get_all_nofilter()
    {
        $this->db->select('*');
        $this->db->from('barang'); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->result_array();
          $query->free_result();
          return $result;
        }
        return array();
    }

    //get all
    public function get_all($number,$offset)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->limit($number, $offset); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->result_array();
          $query->free_result();
          return $result;
        }
        return array();
    }
    

    //get by id
    public function get_by_id($transaksi_id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('transaksi_id', $transaksi_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->row_array();
          $query->free_result();
          return $result;
        }
        return array();
    }

    //get stok by id
    public function get_stok_by_id($barang_id)
    {
        $this->db->select('stok');
        $this->db->from('barang');
        $this->db->where('barang_id', $barang_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->row_array();
          $query->free_result();
          return $result['stok'];
        }
        return array();
    }

    //tambah stok
    public function tambah_stok($params)
    {
        $this->db->select('');
        $this->db->from('barang');
        $this->db->where('barang_id', $barang_id);
        $query = $this->db->get();
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
          $result = $query->row_array();
          $query->free_result();
          return $result;
        }
        return array();
    }

    //tambah stok
    public function last_insert_id()
    {
        return $this->db->insert_id();
    }
  
}