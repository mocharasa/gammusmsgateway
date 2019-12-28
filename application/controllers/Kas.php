<?php
class Kas extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth');
        }
        $this->load->model('mod_kas');
    }
 
    function index(){
        $data['post'] 	= $this->mod_kas->index();			
        $data['isi'] 	= 'kas';
        $data['title'] 	= 'Data Keuangan SPP Sekolah';
        $this->load->view('layout/wrapper',$data);
    }
	
	function keluar(){
		$data['isi'] 	= 'kas_keluar';
        $data['title'] 	= 'Data Kas Keluar';
		$this->load->view('layout/wrapper',$data);  
	}
	
	function insert(){
			$tgl				= date('Y-m-d');
			$id_bulan			= intval( date('m') );
			$id_ta				= $this->input->post('id_ta');
			$id_kategori		= $this->input->post('id_kategori');
			$keperluan			= $this->input->post('keperluan');		
			$anggaran_keluar	= $this->input->post('anggaran_keluar');
			$this->db->select('SUM(jml_bayar) as total');
			$this->db->where('jenis =','SPP');
			$this->db->from('transaksi');		
			$total = $this->db->get()->row()->total;
			$this->db->select('SUM(anggaran_keluar) as total2');
			$this->db->from('kas_sekolah');		
			$total2 = $this->db->get()->row()->total2;
			$keluar = $total2 + $anggaran_keluar;
			$total_kas	= $total - $keluar;
			$object = array(
							'id_ta'				=> $id_ta,
							'id_bulan'			=> $id_bulan,
							'id_kategori'		=> $id_kategori,
							'tgl'				=> $tgl,
							'keperluan' 		=> $keperluan,
							'anggaran_keluar'	=> $anggaran_keluar,
							'total_kas'			=> $total_kas
							);
			$this->db->insert('kas_sekolah', $object);
			$this->session->set_flashdata('sukses','Data Berhasil Ditambahkan !');                
			redirect('kas','refresh');	
	}
	
}
 