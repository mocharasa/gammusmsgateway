<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth');
        }
		$this->load->model('mod_siswa');
		$this->load->model('mod_transaksi');
		$this->load->model('mod_pesan');
		$this->load->model('mod_spp');
	}

	public function index() {
		$data['jml_siswa'] 		= $this->mod_siswa->total_rows();
		$data['jml_transaksi'] 	= $this->mod_transaksi->this_month();
		$data['jml_pesan'] 		= $this->mod_pesan->total_rows();		

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
		
		$bulan = $this->mod_spp->bulan();
		$index = 0;
		foreach ($bulan as $value) {
		    $color = '#' .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)];

			$transaksi_bulan = $this->mod_transaksi->select_bulan($value->id_bulan);

			$data_bulan[$index]['value'] 		= $transaksi_bulan->jumlah;
			$data_bulan[$index]['color'] 		= $color;
			$data_bulan[$index]['highlight'] 	= $color;
			$data_bulan[$index]['label'] 		= $value->bulan;
			
			$index++;
		}		

		$data['data_bln'] = json_encode($data_bulan);
		

		$data['isi'] 			= "dashboard";
		$data['title'] 			= "Selamat Datang !";		
		$this->load->view('layout/wrapper', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Dashboard.php */