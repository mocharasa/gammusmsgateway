<?php
class Spp extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth/login');
        }
        $this->load->model('mod_spp');
    }
 
    function index(){
        $data['post'] 	= $this->mod_spp->index();			
        $data['isi'] 	= 'spp';
        $data['title'] 	= 'Data SPP Siswa';
        $this->load->view('layout/wrapper',$data);
    }
	
	function view($nis){
		$data['post'] 	= $this->mod_spp->tampil($nis);        
        $data['isi'] 	= 'spp_detail';
        $data['title'] 	= 'Data SPP Siswa';
        $this->load->view('layout/wrapper',$data);
	}
	
	function insert(){
			$nis			= $this->input->post('nis');
			$id_ta			= $this->input->post('id_ta');
			$id_bulan		= $this->input->post('id_bulan');
			$nama			= $this->input->post('nama');
			$tahun_ajaran	= $this->input->post('tahun_ajaran'); 
			$total_bayar	= $this->input->post('total_bayar');
			$telah_bayar	= $this->input->post('telah_bayar');
			$tunggakan		= $this->input->post('tunggakan');
			$status			=
			$object = array(
							'nis'			=> $nis,
							'id_ta' 		=> $id_ta,
							'id_bulan' 		=> $id_bulan,
							'nama'			=> $nama,
							'tahun_ajaran'	=> $tahun_ajaran,
							'total_bayar'	=> $total_bayar,
							'telah_bayar'	=> $telah_bayar,
							'tunggakan'		=> $tunggakan
							);
			$this->db->insert('spp', $object);
			$this->session->set_flashdata('sukses','Data Berhasil Ditambahkan !');                
			//redirect('admin/sekolah/index','refresh');	
	}
	
}
 