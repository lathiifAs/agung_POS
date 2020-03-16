<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Kasir extends Artdev_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();

		/* debugging untuk mengetahui hasil dari sebuah variabel

			cek($nama_variabel);

		*/

		// $this->session->set_userdata('com_user', 'lathiif');
		//load models
		$this->load->model('master/M_barang');
		$this->load->model('kasir/M_transaksi');
        
		/*-------------------------------------------------------
		 kosongkan isi parsing js dan css jika tidak digunakan,
		contoh:
		$this->parsing_js([

			]);
		--------------------------------------------------------*/
		//parsing js url
		$this->parsing_js([
			'assets/plugin/select2/select2.full.min.js'
		]);
		//parsing css url
		$this->parsing_css([
			'assets/plugin/select2/select2.min.css',
			'assets/plugin/select2/select2-bootstrap.min.css'
		]);

		//parsing data tanpa template
		$this->parsing([
			'title' => 'Kasir'
		]);
	}

	public function index()
	{
		// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk R atau read Data)
		$this->_set_page_rule("C");
		//default notif
		$notif = $this->session->userdata('sess_notif');

		// if (empty($data['data'])) {
		// 	$no = 0;
		// }else{
			$no = 1;
		// }

		$data = [
			//parsing data notifikasi
			'tipe'			=> $notif['tipe'],
			'pesan' 		=> $notif['pesan'],
			//
			'no' 			=> $no,
			'result' 		=> $this->M_barang->get_all_nofilter(),
		];

		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('kasir/index', $data);
	}

	 // tambah stok
	 public function add_list() {
		// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk C  atau create Data) *wajib
		$this->_set_page_rule("C");
        // cek input
        $this->form_validation->set_rules('barang_id', '', 'trim|required');
		$this->form_validation->set_rules('jumlah', '', 'trim|required');

        // process
        if ($this->form_validation->run() !== FALSE) {
			$barang_id = $this->input->post('barang_id', TRUE);
			$jumlah = $this->input->post('jumlah', TRUE);

			$get_stok = $this->M_barang->get_by_id($barang_id);
			$harga = $get_stok['harga'];

			if ($get_stok['stok'] < $jumlah) {
				// default error
				echo 0;exit;
			}

			$params = array(
				'barang_id' 	=> $barang_id,
				'subtotal' 		=> $jumlah * $harga,
				'jumlah' 		=> $jumlah,
				'mdb' 			=> $this->get_login('user_id'),
			);

            // insert
            if ($this->M_transaksi->insert('detail_transaksi', $params)) {
				// //sukses notif
				echo 1;exit;
            } else {
				// default error
				echo 2;exit;
            }
        } else {
			// default error
			echo 3;exit;
        }
	}

	public function get_list()
	{
		$result = $this->M_transaksi->get_list($this->get_login('user_id'));
		echo json_encode($result);
	}


}