<?php

class M_dashboard extends Artdev_Model {

    public function total_transaksi()
      {
        $this->db->select('*');
        $this->db->from('transaksi a');
        $this->db->join('detail_transaksi b', 'b.transaksi_id = a.transaksi_id');
        $this->db->where('b.pembayaran_st', 'done');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->num_rows();
          return $result;
        }
        return 0;
    }

    public function total_pemasukan()
    {
      $this->db->select('SUM(a.total) as total');
      $this->db->from('transaksi a');
      $this->db->join('detail_transaksi b', 'b.transaksi_id = a.transaksi_id');
      $this->db->where('b.pembayaran_st', 'done');
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        $result = $query->row_array();
        return $result['total'];
      }
      return 0;
  }

  public function total_perbarang()
    {
      $this->db->select('a.*, SUM(a.jumlah) as jumlah, b.stok, b.barang_kd, b.barang_nm');
      $this->db->from('detail_transaksi a');
      $this->db->join('barang b', 'b.barang_id = a.barang_id');
      $this->db->where('a.pembayaran_st', 'done');
      $this->db->group_by("b.barang_id");
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        $result = $query->result_array();
        return $result;
      }
      return 0;
  }
    
}