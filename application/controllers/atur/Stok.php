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
	const SESSION_SEARCH = 'search_barang';
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

	// public function add()
	// {
	// 	// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk C  atau create Data) *wajib
	// 	$this->_set_page_rule("C");
	// 	//default notif 
	// 	$notif = $this->session->userdata('sess_notif');
	// 	$data = [
	// 		'tipe'	=> $notif['tipe'],
	// 		'pesan' => $notif['pesan']
	// 	];
	// 	//delete session notif
	// 	$this->session->unset_userdata('sess_notif');
	// 	//parsing (template_content, variabel_parsing)
	// 	$this->parsing_template('atur/stok/add', $data);
	// }

	//  // add process
	//  public function add_process() {
	// 	// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk C  atau create Data) *wajib
	// 	$this->_set_page_rule("C");
    //     // cek input
    //     $this->form_validation->set_rules('barang_kd', '', 'trim|required');
    //     $this->form_validation->set_rules('barang_nm', '', 'required|max_length[50]');
	// 	$this->form_validation->set_rules('stok', '', 'trim|required');
	// 	$this->form_validation->set_rules('satuan', '', 'trim|required');
	// 	$this->form_validation->set_rules('harga', '', 'trim|required');
	// 	$this->form_validation->set_rules('active_st', '', 'trim|required');
    //     // process
    //     if ($this->form_validation->run() !== FALSE) {
	// 		//format number
	// 		$harga = preg_replace("/[^a-zA-Z0-9]/", "", $this->input->post('harga',TRUE));
	// 		$params = array(
	// 			'barang_kd'		=> $this->input->post('barang_kd'), 
	// 			'barang_nm'		=> $this->input->post('barang_nm'), 
	// 			'stok'			=> $this->input->post('stok'), 
	// 			'satuan'		=> $this->input->post('satuan'), 
	// 			'harga' 		=> $harga, 
	// 			'active_st' 	=> $this->input->post('active_st'), 
	// 			'mdd'			=> date('Y-m-d H:i:s') 
	// 		);
    //         // insert
    //         if ($this->M_barang->insert('barang', $params)) {
	// 			//sukses notif
	// 			$this->notif_msg('atur/stok/add', 'Sukses', 'Data berhasil ditambahkan');
    //         } else {
	// 			// default error
	// 			$this->notif_msg('atur/stok/add', 'Error', 'Data gagal ditambahkan');
    //         }
    //     } else {
	// 		// default error
	// 		$this->notif_msg('atur/stok/add', 'Error', 'Data gagal ditambahkan, form harus diisi dengan lengkap dan sesuai.');
    //     }
    // }

	// public function detail($barang_id='')
	// {
	// 	// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk R atau Read Data) *wajib
	// 	$this->_set_page_rule("R");
	// 	//cek data
	// 	if (empty($barang_id)) {
	// 		// default error
	// 		$this->notif_msg('atur/stok', 'Error', 'Data tidak ditemukan !');
	// 	}

	// 	//parsing
	// 	$data = [
	// 		'result' => $this->M_barang->get_by_id($barang_id)
	// 	];
	// 	$this->parsing_template('atur/stok/detail', $data);
	// }

	// public function edit($barang_id='')
	// {
	// 	// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk U atau Update data) *wajib
	// 	$this->_set_page_rule("U");
	// 	//default notif
	// 	$notif = $this->session->userdata('sess_notif');
	// 	//cek data
	// 	if (empty($barang_id)) {
	// 		// default error
	// 		$this->notif_msg('atur/stok', 'Error', 'Data tidak ditemukan !');
	// 	}
	// 	//parsing
	// 	$data = [
	// 		'tipe'		=> $notif['tipe'],
	// 		'pesan' 	=> $notif['pesan'],
	// 		'result' 	=> $this->M_barang->get_by_id($barang_id),
	// 	];
	// 	//delete session notif
	// 	$this->session->unset_userdata('sess_notif');
	// 	//parsing and view content
	// 	$this->parsing_template('atur/stok/edit', $data);
	// }

	// // edit process
	// public function edit_process() {
	// 	// set page rules (untuk memberitahukan pada sistem bahwa halaman ini U untuk Update data) *wajib
	// 	$this->_set_page_rule("U");
    //     // cek input
    //     $this->form_validation->set_rules('barang_kd', '', 'trim|required');
    //     $this->form_validation->set_rules('barang_nm', '', 'required|max_length[50]');
	// 	$this->form_validation->set_rules('satuan', '', 'trim|required');
	// 	$this->form_validation->set_rules('harga', '', 'trim|required');
	// 	$this->form_validation->set_rules('active_st', '', 'trim|required');
	// 	// check data
    //     if (empty($this->input->post('barang_id'))) {
    //         //sukses notif
	// 		$this->notif_msg('atur/stok', 'Error', 'Data tidak ditemukan');
	// 	}
	// 	$barang_id = $this->input->post('barang_id', true);
	// 	//format number
	// 	$harga = preg_replace("/[^a-zA-Z0-9]/", "", $this->input->post('harga',TRUE));

    //     // process
    //     if ($this->form_validation->run() !== FALSE) {
	// 		$params = array(
	// 			'barang_kd'	=> $this->input->post('barang_kd'), 
	// 			'barang_nm'	=> $this->input->post('barang_nm'), 
	// 			'satuan'	=> $this->input->post('satuan'), 
	// 			'harga'		=> $harga,
	// 			'active_st'	=> $this->input->post('active_st'),
	// 			'mdd'		=> date('Y-m-d H:i:s') 
	// 		);
	// 		$where = array(
	// 			'barang_id'	=> $barang_id
	// 		);

    //         // insert
    //         if ($this->M_barang->update('barang', $params, $where)) {
	// 			$this->notif_msg('atur/stok/edit/'.$barang_id, 'Sukses', 'Data berhasil diedit');
    //         } else {
	// 			// default error
	// 			$this->notif_msg('atur/stok/edit/'.$barang_id, 'Error', 'Data gagal diedit');
    //         }
    //     } else {
	// 		// default error
	// 		$this->notif_msg('atur/stok/edit/'.$barang_id, 'Error', 'Data gagal diedit, form harus diisi dengan lengkap dan sesuai.');
    //     }
    // }


	// public function delete($barang_id='')
	// {
	// 	// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk D atau Delete) *wajib
	// 	$this->_set_page_rule("D");
	// 	//cek data
	// 	if (empty($barang_id)) {
	// 		// default error
	// 		$this->notif_msg('atur/stok', 'Error', 'Data tidak ditemukan !');
	// 	}

	// 	//parsing
	// 	$data = [
	// 		'result' => $this->M_barang->get_by_id($barang_id)
	// 	];
	// 	$this->parsing_template('atur/stok/delete', $data);
	// }

	// public function delete_process()
	// {
	// 	// set page rules (untuk memberitahukan pada sistem bahwa halaman ini untuk D atau Delete) *wajib
	// 	$this->_set_page_rule("D");
	// 	$barang_id = $this->input->post('barang_id', true);
	// 	//cek data
	// 	if (empty($barang_id)) {
	// 		// default error
	// 		$this->notif_msg('atur/stok', 'Error', 'Data tidak ditemukan !');
	// 	}

	// 	$where = array(
	// 		'barang_id' => $barang_id
	// 	);
	// 	//process
	// 	if ($this->M_barang->delete('barang', $where)) {
	// 		//sukses notif
	// 		$this->notif_msg('atur/stok', 'Sukses', 'Data berhasil dihapus');
	// 	}else{
	// 		//default error
	// 		$this->notif_msg('atur/stok', 'Error', 'Data gagal dihapus !');
	// 	}
	// }

}
