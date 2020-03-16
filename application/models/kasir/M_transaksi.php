<?php

class M_transaksi extends Artdev_Model {

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



  //   //get all roles
  //   public function get_user_login_all_roles($username, $password)
  //   {
  //       // load encrypt
  //       $this->load->library('encrypt');
  //       // process
  //       // get hash key
  //       $result = $this->get_user_detail_with_all_roles($username);
  //       if (!empty($result)) {
  //           $password_decode = $this->encrypt->decode($result['user_pass'], $result['user_key']);
  //           // get user
  //           if ($password_decode === md5($password)) {
  //               // cek authority then return id
  //               return $result;
  //           } else {
  //               return FALSE;
  //           }
  //       } else {
  //           return FALSE;
  //       }
  //   }

  //   // get user detail with auto role
  //   function get_user_detail_with_all_roles($params) {
  //     $sql = "SELECT a.*, b.role_id, c.role_nm, d.status_anggota
  //             FROM com_user a
  //             --  JOIN com_role_user b ON a.user_id = b.user_id
  //             -- LEFT JOIN com_role c ON b.role_id = c.role_id
  //             INNER JOIN com_role_user b ON a.user_id = b.user_id
  //             INNER JOIN com_role c ON b.role_id = c.role_id
  //             -- costum
  //             INNER JOIN user d ON a.user_id = d.user_id
  //             WHERE user_name = ?";
  //     $query = $this->db->query($sql, $params);
  //     // echo "<pre>"; echo $this->db->last_query();exit;
  //     if ($query->num_rows() > 0) {
  //         $result = $query->row_array();
  //         $query->free_result();
  //         return $result;
  //     } else {
  //         return array();
  //     }
  // }

  //   //all role
  //   public function get_all_role()
  //   {
  //       $this->db->select('*');
  //       $this->db->from('com_role');
  //       $query = $this->db->get();
  //       if ($query->num_rows() > 0) {
  //         $result = $query->result_array();
  //         $query->free_result();
  //         return $result;
  //       }
  //       return array();
  //   }

  //   //get by username
  //   public function get_by_username($username)
  //   {
  //       $this->db->select('*');
  //       $this->db->from('com_user');
  //       $this->db->join('user', 'user.user_id = com_user.user_id', 'left');
  //       $this->db->join('com_role_user', 'com_role_user.user_id = user.user_id', 'left');
  //       $this->db->join('com_role', 'com_role_user.role_id = com_role.role_id', 'left');
  //       $this->db->where('com_user.user_name', $username);
  //       $query = $this->db->get();
  //       if ($query->num_rows() > 0) {
  //         $result = $query->row_array();
  //         $query->free_result();
  //         return $result;
  //       }
  //       return array();
  //   }


  //   //cek email
  //   public function is_exist_email($params)
  //   {
  //       $query = $this->db->get_where('com_user', array('user_mail' => $params));
  //       if ($query->num_rows() > 0) {
  //         $result = $query->row_array();
  //         $query->free_result();
  //         return $result;
  //       }
  //       return 0;
  //   }

  //   //cek username
  //   public function is_exist_username($params)
  //   {
  //       $query = $this->db->get_where('com_user', array('user_name' => $params));
  //       if ($query->num_rows() > 0) {
  //         $result = $query->row_array();
  //         $query->free_result();
  //         return $result;
  //       }
  //       return 0;
  //   }

  //   //cek anggota bisnis
  //   public function is_exist_anggota_bisnis($params)
  //   {
  //     $sql = "SELECT count(status_anggota) as jumlah FROM user
  //     WHERE status_anggota = 'aktif' AND user_id = ?";
  //     $query = $this->db->query($sql, $params);
  //     // echo "<pre>"; echo $this->db->last_query();exit;
  //     if ($query->num_rows() > 0) {
  //       $result = $query->row_array();
  //       $query->free_result();
  //       return $result['jumlah'];
  //     } else {
  //       return array();
  //     }
  //   }

  //   //cek transfer anggota bisnis
  //   public function get_status_transfer_bisnis($params)
  //   {
  //     $sql = "SELECT count(transaksi_bisnis_id) AS jumlah FROM transaksi_bisnis 
  //     WHERE status_transfer = 'daftar' AND user_id = ?";
  //     $query = $this->db->query($sql, $params);
  //     // echo "<pre>"; echo $this->db->last_query();exit;
  //     if ($query->num_rows() > 0) {
  //       $result = $query->row_array();
  //       $query->free_result();
  //       return $result['jumlah'];
  //     } else {
  //       return array();
  //     }
  //   }

  //   //get by id
  //   public function get_data_transaksi_bisnis_by_id($user_id)
  //   {
  //       $this->db->select('transaksi_bisnis.*,produk.nama,user.nama as penerima,user.provinsi,user.kabupaten,user.kecamatan,user.alamat');
  //       $this->db->from('transaksi_bisnis');
  //       $this->db->join('produk', 'produk.produk_id = transaksi_bisnis.produk_id', 'left');
  //       $this->db->join('user', 'user.user_id = transaksi_bisnis.user_id', 'left');
  //       $this->db->where('transaksi_bisnis.user_id', $user_id);
  //       $query = $this->db->get();
  //       if ($query->num_rows() > 0) {
  //         $result = $query->row_array();
  //         $query->free_result();
  //         return $result;
  //       }
  //       return array();
  //   }
    
}