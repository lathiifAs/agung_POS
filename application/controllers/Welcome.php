<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Welcome extends Artdev_Controller {

    // constructor
	public function __construct()
	{
		parent::__construct();
		
		// $this->session->set_userdata('com_user', 'lathiif');
		/*-------------------------------------------------------
		 kosongkan isi parsing js dan css jika tidak digunakan,
		contoh:
		$this->parsing_js([

			]);
		--------------------------------------------------------*/
		//parsing css url
		$this->parsing_js([
			// 'assets/js/lib/chart-js/Chart.bundle.js',
			// 'assets/js/lib/chart-js/chartjs-init.js',
			]);
		//parsing css url
		$this->parsing_css([
			// 'assets/fontAwesome/css/fontawesome-all.min.css',
			// 'assets/css/lib/themify-icons.css'
			]);

		$this->load->model('sistem/M_dashboard');

		//parsing data tanpa template
		$this->parsing([
			'title' => 'Dashboard',
			'tanggal' => date('d-m-Y')
		]);
	}

	public function index()
	{

		$perbarang = $this->M_dashboard->total_perbarang();

		if (!empty($perbarang)) {
			$no = 1;
		}else{
			$no = 0;
		}

		$data = [
			'ttl_transaksi'			=> $this->M_dashboard->total_transaksi(),
			'ttl_pemasukan'			=> $this->M_dashboard->total_pemasukan(),
			'peritem'				=> $perbarang,
			'no'					=> $no
		];

		//parsing (template_content, variabel_parsing)
		$this->parsing_template('dashboard/index', $data);
	}
}
