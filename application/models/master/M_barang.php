<?php

class M_barang extends Artdev_Model {

    //generate id terakhir
    public function generate_id($prefixdate, $params)
    {
        $sql = "SELECT RIGHT(user_id, 4)'last_number'
                FROM com_user
                WHERE user_id LIKE ?
                ORDER BY user_id DESC
                LIMIT 1";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            // create next number
            $number = intval($result['last_number']) + 1;
            if ($number > 9999) {
                return false;
            }
            $zero = '';
            for ($i = strlen($number); $i < 4; $i++) {
                $zero .= '0';
            }
            return $prefixdate . $zero . $number;
        } else {
            // create new number
            return $prefixdate . '0001';
        }
    }

    //count all
    public function count_all()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->num_rows();
          return $result;
        }
        return 0;
    }

    //get all
    public function get_all($number,$offset, $params)
    {
        $this->db->select('*');
        $this->db->from('barang');
        if (!empty($params)) {
          $this->db->like($params);
        }
        $this->db->limit($number, $offset); 
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
        $this->db->where('active_st', 'yes'); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          $result = $query->result_array();
          $query->free_result();
          return $result;
        }
        return array();
    }

    //get by id
    public function get_by_id($barang_id)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('barang_id', $barang_id);
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
    
}