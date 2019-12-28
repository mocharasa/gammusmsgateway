<?php
class Kas_osis extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth');
        }
        $this->load->model('mod_kas');
    }
 
    function index(){
        $data['post'] 	= $this->mod_kas->osis();			
        $data['isi'] 	= 'kas_osis';
        $data['title'] 	= 'Data Keuangan OSIS';
        $this->load->view('layout/wrapper',$data);
    }
	
	function keluar(){
		$data['isi'] 	= 'kas_osis_keluar';
        $data['title'] 	= 'Data Pengeluaran Kas OSIS';
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
			$this->db->where('jenis =','OSIS');
			$this->db->from('transaksi');		
			$total = $this->db->get()->row()->total;
			$this->db->select('SUM(pengeluaran) as total2');
			$this->db->from('kas_osis');		
			$total2 = $this->db->get()->row()->total2;
			$keluar = $total2 + $anggaran_keluar;
			$total_kas	= $total - $keluar;
			$object = array(
							'id_ta'				=> $id_ta,							
							'id_kategori'		=> $id_kategori,
							'tgl'				=> $tgl,
							'keperluan' 		=> $keperluan,
							'pengeluaran'		=> $anggaran_keluar,
							'total'				=> $total_kas
							);
			$this->db->insert('kas_osis', $object);
			$this->session->set_flashdata('sukses','Data Berhasil Ditambahkan !');                
			redirect('kas_osis','refresh');	
	}
	
}
 