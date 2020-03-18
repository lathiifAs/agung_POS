<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Pembelian extends Artdev_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();

		/* debugging untuk mengetahui hasil dari sebuah variabel

			cek($nama_variabel);

		*/

		// $this->session->set_userdata('com_user', 'lathiif');
		//load models
		$this->load->model('kasir/M_transaksi');
        
		/*-------------------------------------------------------
		 kosongkan isi parsing js dan css jika tidak digunakan,
		contoh:
		$this->parsing_js([

			]);
		--------------------------------------------------------*/
		//parsing js url
		$this->parsing_js([
			// 'assets/vendor/jquery-steps/jquery.steps.min.js',
			// 'assets/costum/js/main.js'
		   ]);
		//parsing css url
		$this->parsing_css([
			// 'assets/css/smart_wizard.css',
			// 'assets/css/smart_wizard_theme_dots.css'
			]);

		//parsing data tanpa template
		$this->parsing([
			'title' => 'Transaksi Pembelian'
		]);
	}

	public function index()
	{
		// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk R atau read Data)
		$this->_set_page_rule("R");
		//default notif
		$notif = $this->session->userdata('sess_notif');

		$this->load->library('pagination');
		$this->load->config('pagination');
		$config = $this->config->item('pagination_config');
		//create pagination
		$total_row = $this->M_transaksi->count_all();
		//konfigurasi pagination
		$config['base_url'] = base_url('index.php/laporan/pembelian/index/');
		$config['total_rows'] = $total_row; //total row
		$config['per_page'] = 20;  //show record per halaman
		$config["uri_segment"] = 4;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data['data'] =   $this->M_transaksi->get_all($config["per_page"], $data["page"]);           
		$data['pagination'] = $this->pagination->create_links();
		if (empty($data['data'])) {
			$no = 0;
		}else{
			$no = 1;
		}

		$data = [
			//parsing data notifikasi
			'tipe'			=> $notif['tipe'],
			'pesan' 		=> $notif['pesan'],
			//
			'result' 		=> $data['data'],
			'no' 			=> $no,
			'page' 			=> $data['page'],
			'pagination'	=> $data['pagination']
		];

		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('laporan/pembelian/index', $data);
	}


	public function detail($transaksi_id='')
	{
		// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk R atau Read Data) *wajib
		$this->_set_page_rule("R");
		//cek data
		if (empty($transaksi_id)) {
			// default error
			$this->notif_msg('laporan/pembelian', 'Error', 'Data tidak ditemukan !');
		}
		
		$detail = $this->M_transaksi->get_detail_by_id($transaksi_id);
		// cek($detail);
		if (!empty($detail)) {
			$no = 1;
		}else{
			$no = 0;
		}

		//parsing
		$data = [
			'result' 	=> $this->M_transaksi->get_by_id($transaksi_id),
			'detail' 	=> $detail,
			'no' 		=> $no,
		];
		$this->parsing_template('laporan/pembelian/detail', $data);
	}

}
