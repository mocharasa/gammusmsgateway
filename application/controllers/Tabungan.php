<?php
class Tabungan extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth/login');
        }
        $this->load->model('mod_tabungan');				
		$this->load->model('mod_ta');
		$this->load->model('mod_siswa');		
    }
 
    function index(){
        $data['post'] 	= $this->mod_tabungan->index();			
        $data['isi'] 	= 'tabungan';
        $data['title'] 	= 'Data Transaksi Tabungan';
        $this->load->view('layout/wrapper',$data);
    }	
	
	function view($nis){
		$data['post'] 	= $this->mod_tabungan->tampil($nis);        
        $data['isi'] 	= 'tabungan_detail';
        $data['title'] 	= 'Data Pembayaran Tabungan Siswa';
        $this->load->view('layout/wrapper',$data);
	}
	
	function ambil(){
		$data['isi'] 	= 'tabungan_ambil';
        $data['title'] 	= 'Penarikan Tabungan Siswa';
		$this->load->view('layout/wrapper',$data);  
	}
	
	function get_autocomplete(){
		if (isset($_GET['term'])) {
		  	$result = $this->mod_tabungan->search_nis($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
					'label'			=> $row->nis,
					'description'	=> $row->nama
				);
		     	echo json_encode($arr_result);
		   	}
		}
	}
	
	function insert(){
			$tgl				= date('Y-m-d');
			$nama				= $this->input->post('nama');
			$id_ta				= $this->input->post('id_ta');
			$nis				= $this->input->post('nis');			
			$penarikan			= $this->input->post('penarikan');
			
			$this->db->select('SUM(jml_bayar) as total1');
			$this->db->where('jenis =','Tabungan');
			$this->db->where('nis',$nis);
			$this->db->where('id_ta',$id_ta);
			$this->db->from('transaksi');		
			$sum1 = $this->db->get()->row()->total1;
			$this->db->select('SUM(penarikan) as total2');
			$this->db->where('nis',$nis);
			$this->db->where('id_ta',$id_ta);
			$this->db->from('tabungan');
			$sum2 = $this->db->get()->row()->total2;
			$total = $sum1 - $sum2;
			$sisa  = $total - $penarikan;
			$object = array(
							'id_ta'		=> $id_ta,							
							'nis'		=> $nis,
							'nama' 		=> $nama,
							'tgl'		=> $tgl,						
							'penarikan'	=> $penarikan,
							'total'		=> $sisa
							);
			$this->db->insert('tabungan', $object);
			$this->session->set_flashdata('sukses','Data Berhasil Ditambahkan !');                
			redirect('tabungan','refresh');
	}
	
}
 