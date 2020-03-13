<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
----------------------
Created by : Lathiif Aji Santhosho
Phone : 	082126641201
----------------------
*/

class Stok extends Artdev_Controller {

	//init serach name
	const SESSION_SEARCH = 'search_barang_instok';
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
			'title' => 'Barang'
		]);
	}

	public function index()
	{
		// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk R atau read Data)
		$this->_set_page_rule("R");
		//default notif
		$notif = $this->session->userdata('sess_notif');

		// search session
		$search = $this->session->userdata(self::SESSION_SEARCH);

		$this->load->library('pagination');
		$this->load->config('pagination');
		$config = $this->config->item('pagination_config');
		//create pagination
		$total_row = $this->M_barang->count_all();
		//konfigurasi pagination
		$config['base_url'] = base_url('index.php/atur/stok/index/');
		$config['total_rows'] = $total_row; //total row
		$config['per_page'] = 10;  //show record per halaman
		$config["uri_segment"] = 4;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		$data['data'] =   $this->M_barang->get_all($config["per_page"], $data["page"], $search);           
		$data['pagination'] = $this->pagination->create_links();
		if (empty($data['data'])) {
			$no = 0;
		}else{
			$no = 1;
		}

		/*
		isi parameter yang akan di parsing dalam bentuk array 		
		variabel parsing = [
			penamaan 	=> isi dari sebuah data
		];
		jika tidak ada data yang diparsing kosongkan isi di dalam kurung kotak ([])
		*/
		$data = [
			//parsing data notifikasi
			'tipe'			=> $notif['tipe'],
			'pesan' 		=> $notif['pesan'],
			//
			'search' 		=> $search,
			'result' 		=> $data['data'],
			'no' 			=> $no,
			'page' 			=> $data['page'],
			'pagination'	=> $data['pagination']
		];

		//delete session notif
		$this->session->unset_userdata('sess_notif');
		//parsing (template_content, variabel_parsing)
		$this->parsing_template('atur/stok/index', $data);
	}

	public function search_process() {
		// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk R atau read Data) *wajib
		$this->_set_page_rule("R");

		if ($this->input->post('search', true) == "tampilkan") {
		  $params = array(
			'barang_kd'   	=> $this->input->post('barang_kd', true),
			'barang_nm' 	=> $this->input->post('barang_nm', true)
		  );
		  //menyimpan $params pada session dengan nama "search_user" dari variabel self::SESSION_SEARCH
		  $this->session->set_userdata(self::SESSION_SEARCH, $params);
		} else {
		  $this->session->unset_userdata(self::SESSION_SEARCH);
		}
		//redirect
		redirect("atur/stok");
	}

	 // tambah stok
	 public function add_stok() {
		// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk C  atau create Data) *wajib
		$this->_set_page_rule("U");
        // cek input
        $this->form_validation->set_rules('jumlah', '', 'trim|required');
		$this->form_validation->set_rules('barang_id', '', 'trim|required');

        // process
        if ($this->form_validation->run() !== FALSE) {
			$get_stok = $this->M_barang->get_stok_by_id($this->input->post('barang_id'));
			$params = array(
				'stok' 		=> ($get_stok + $this->input->post('jumlah')),
			);
			$where = array(
				'barang_id' => $this->input->post('barang_id')
			);
            // insert
            if ($this->M_barang->update('barang', $params, $where)) {
				//sukses notif
				$this->notif_msg('atur/stok', 'Sukses', 'Stok berhasil ditambahkan');
            } else {
				// default error
				$this->notif_msg('atur/stok', 'Error', 'Stok gagal ditambahkan');
            }
        } else {
			// default error
			$this->notif_msg('atur/stok', 'Error', 'Stok gagal ditambahkan, form harus diisi dengan lengkap dan sesuai.');
        }
	}
	
		 // tambah stok
		 public function kurangi_stok() {
			// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk C  atau create Data) *wajib
			$this->_set_page_rule("U");
			// cek input
			$this->form_validation->set_rules('jumlah', '', 'trim|required');
			$this->form_validation->set_rules('barang_id', '', 'trim|required');
	
			// process
			if ($this->form_validation->run() !== FALSE) {
				$get_stok = $this->M_barang->get_stok_by_id($this->input->post('barang_id'));
				$params = array(
					'stok' 		=> ($get_stok - $this->input->post('jumlah')),
				);
				$where = array(
					'barang_id' => $this->input->post('barang_id')
				);
				// insert
				if ($this->M_barang->update('barang', $params, $where)) {
					//sukses notif
					$this->notif_msg('atur/stok', 'Sukses', 'Stok berhasil dikurangi');
				} else {
					// default error
					$this->notif_msg('atur/stok', 'Error', 'Stok gagal dikurangi');
				}
			} else {
				// default error
				$this->notif_msg('atur/stok', 'Error', 'Stok gagal dikurangi, form harus diisi dengan lengkap dan sesuai.');
			}
		}


}
