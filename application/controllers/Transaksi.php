<?php
class Transaksi extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth/login');
        }
        $this->load->model('mod_transaksi');
		$this->load->model('mod_kas');
		$this->load->model('mod_spp');
		$this->load->model('mod_ta');
		$this->load->model('mod_siswa');
		$this->load->model('mod_ortu');
    }
 
    function index(){
        $data['post'] 	= $this->mod_transaksi->index();			
        $data['isi'] 	= 'transaksi';
        $data['title'] 	= 'Data Transaksi Pembayaran';
        $this->load->view('layout/wrapper',$data);
    }
	
	function tambah(){
		$data['post'] 	= $this->mod_transaksi->index();
		$data['isi'] 	= 'transaksi_tambah';
		$data['title'] 	= 'Bayar SPP';
		$this->load->view('layout/wrapper',$data);
	}
	
	function insert(){
			$nis			= $this->input->post('nis');
			$id_ta			= $this->input->post('id_ta');
			$id_bulan		= $this->input->post('id_bulan');
			$nama			= $this->input->post('nama');			
			$tgl_bayar		= date('Y-m-d'); 
			$jml_bayar		= $this->input->post('jml_bayar');		
			$jenis			= $this->input->post('jenis');		

			$this->db->select('Number');
			$this->db->from('pbk');
			$this->db->where('nis',$nis);			
			$DestinationNumber = $this->db->get()->row()->Number;
			
			$this->db->select('nominal_spp');
			$this->db->from('tahun_ajaran');
			$this->db->where('id_ta',$id_ta);			
			$var = $this->db->get()->row()->nominal_spp;
			
			$this->db->select('tahun_ajaran');
			$this->db->from('tahun_ajaran');
			$this->db->where('id_ta',$id_ta);			
			$tahun_ajaran = $this->db->get()->row()->tahun_ajaran;
			
			$this->db->select('bulan');
			$this->db->from('bulan');
			$this->db->where('id_bulan',$id_bulan);			
			$bulan = $this->db->get()->row()->bulan;
			
			if($jenis == 'SPP'){
				$cek= $this->db->query("SELECT * FROM spp WHERE nis='$nis' AND id_ta='$id_ta' AND id_bulan='$id_bulan' AND status='Telah Bayar'");
				if ($cek->num_rows()== 0){
				$object = array(
								'nis'			=> $nis,
								'id_ta' 		=> $id_ta,	
								'id_bulan' 		=> $id_bulan,
								'nama'			=> $nama,							
								'jenis'			=> $jenis,
								'tgl_bayar'		=> $tgl_bayar,
								'jml_bayar'		=> $jml_bayar							
								);					
				$this->db->insert('transaksi', $object);
				
				$this->db->select('SUM(jml_bayar) as total1');
				$this->db->where('jenis',$jenis);		
				$this->db->from('transaksi');		
				$total1 = $this->db->get()->row()->total1;
				$this->db->select('SUM(anggaran_keluar) as total2');
				$this->db->from('kas_sekolah');
				$total2 = $this->db->get()->row()->total2;
				$total_kas = $total1 - $total2;
				$query = array(										
								'id_ta' 		=> $id_ta,	
								'id_bulan' 		=> $id_bulan,
								'anggaran_masuk'=> $jml_bayar,							
								'tgl'			=> $tgl_bayar,							
								'total_kas'		=> $total_kas
								);		
				$this->db->insert('kas_sekolah', $query);
				
				$nominal = intval($var); //konversi string ke integer
				$bayarperiode = $nominal * 12;
				
				$this->db->select('SUM(telah_bayar) as telah_bayar');
				$this->db->from('spp');	
				$this->db->where('nis',$nis);
				$this->db->where('id_ta',$id_ta);
				$membayar = $this->db->get()->row()->telah_bayar;
				$telah_bayar = $membayar + $nominal;
				
				$b = date('m');
				$d = intval($b); //konversi string ke ineteger
				$hutang = $nominal * $d;
				$tunggakan = $hutang - $telah_bayar;
				$data = array(
								'nis'			=> $nis,
								'id_ta' 		=> $id_ta,	
								'id_bulan' 		=> $id_bulan,
								'tanggal'		=> $tgl_bayar,
								'tahun_ajaran'	=> $tahun_ajaran,
								'bulan'			=> $bulan,
								'total_bayar'	=> $bayarperiode,							
								'telah_bayar'	=> $jml_bayar,
								'tunggakan'		=> $tunggakan,
								'nama'			=> $nama,
								'status'		=> 'Telah Bayar'
								);					
				$this->db->insert('spp', $data);	
				$TextDecoded = "$nama, NIS $nis, telah membayar iuran SPP bulan $bulan, periode $tahun_ajaran, sebesar ".number_format($jml_bayar)." rb";
				$pesan = array(										
								'DestinationNumber'	=> $DestinationNumber,							
								'TextDecoded'		=> $TextDecoded														
								);		
				$this->db->insert('outbox', $pesan);
				
				$this->session->set_flashdata('sukses','Data Berhasil Ditambahkan !');   
				redirect('transaksi','refresh');			
				} else {
				//echo "Siswa sudah bayaran";
				$this->session->set_flashdata('info','Tidak Bisa Edit !! Murid Ini Sudah Melunasi SPP');
				redirect('transaksi','refresh');
				}
			}
			if($jenis == 'OSIS'){
				$osis= $this->db->query("SELECT * FROM osis WHERE nis='$nis' AND id_ta='$id_ta' AND status='Telah Bayar'");
				if ($osis->num_rows()== 0){
				$object = array(
								'nis'			=> $nis,
								'id_ta' 		=> $id_ta,	
								'id_bulan' 		=> $id_bulan,
								'nama'			=> $nama,							
								'jenis'			=> $jenis,
								'tgl_bayar'		=> $tgl_bayar,
								'jml_bayar'		=> $jml_bayar							
								);					
				$this->db->insert('transaksi', $object);
				
				$this->db->select('SUM(jml_bayar) as total1');
				$this->db->where('jenis',$jenis);		
				$this->db->from('transaksi');		
				$tot1 = $this->db->get()->row()->total1;
				$this->db->select('SUM(pengeluaran) as total2');
				$this->db->from('kas_osis');
				$tot2 = $this->db->get()->row()->total2;
				$total_osis = $tot1 - $tot2;
				$query = array(										
								'id_ta' 		=> $id_ta,									
								'pemasukan'		=> $jml_bayar,							
								'tgl'			=> $tgl_bayar,							
								'total'			=> $total_osis
								);		
				$this->db->insert('kas_osis', $query);
											
				$data = array(
								'nis'			=> $nis,
								'id_ta' 		=> $id_ta,									
								'tanggal'		=> $tgl_bayar,
								'tahun_ajaran'	=> $tahun_ajaran,								
								'bayar'			=> $jml_bayar,								
								'nama'			=> $nama,
								'status'		=> 'Telah Bayar'
								);					
				$this->db->insert('osis', $data);	
				$TextDecoded = "$nama, NIS $nis, telah membayar iuran OSIS, periode $tahun_ajaran, sebesar ".number_format($jml_bayar)." rb";
				$pesan = array(										
								'DestinationNumber'	=> $DestinationNumber,							
								'TextDecoded'		=> $TextDecoded														
								);		
				$this->db->insert('outbox', $pesan);
				
				$this->session->set_flashdata('sukses','Data Berhasil Ditambahkan !');   
				redirect('transaksi','refresh');			
				} else {
				//echo "Siswa sudah bayaran";
				$this->session->set_flashdata('info','Tidak Bisa Edit !! Murid Ini Sudah Melunasi Iuran OSIS');
				redirect('transaksi','refresh');
				}
			}
			if($jenis == 'Tabungan'){
				$object = array(
								'nis'			=> $nis,
								'id_ta' 		=> $id_ta,	
								'id_bulan' 		=> $id_bulan,
								'nama'			=> $nama,							
								'jenis'			=> $jenis,
								'tgl_bayar'		=> $tgl_bayar,
								'jml_bayar'		=> $jml_bayar							
								);					
				$this->db->insert('transaksi', $object);
				
				$this->db->select('SUM(jml_bayar) as total1');
				$this->db->where('jenis',$jenis);
				$this->db->where('nis',$nis);
				$this->db->where('id_ta',$id_ta);
				$this->db->from('transaksi');		
				$sum1 = $this->db->get()->row()->total1;
				$this->db->select('SUM(penarikan) as total2');
				$this->db->where('nis',$nis);
				$this->db->where('id_ta',$id_ta);
				$this->db->from('tabungan');
				$sum2 = $this->db->get()->row()->total2;
				$total_uang = $sum1 - $sum2;
				$query = array(										
								'id_ta' 		=> $id_ta,	
								'nis'			=> $nis,
								'nama'			=> $nama,								
								'pemasukan'		=> $jml_bayar,							
								'tgl'			=> $tgl_bayar,							
								'total'			=> $total_uang
								);		
				$this->db->insert('tabungan', $query);
				$TextDecoded = "$nama, NIS $nis, telah membayar tabungan, periode $tahun_ajaran, sebesar ".number_format($jml_bayar)." rb";
				$pesan = array(										
								'DestinationNumber'	=> $DestinationNumber,							
								'TextDecoded'		=> $TextDecoded														
								);		
				$this->db->insert('outbox', $pesan);
				$this->session->set_flashdata('sukses','Data Berhasil Ditambahkan !');   
				redirect('transaksi','refresh');			
				} 
	}
		
	function get_autocomplete(){
		if (isset($_GET['term'])) {
		  	$result = $this->mod_transaksi->search_nis($_GET['term']);
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
	
	function get_nominal(){
		if (isset($_GET['term'])) {
		  	$result = $this->mod_ta->nominal($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
					'label'			=> $row->id_ta,
					'description'	=> $row->nominal_spp,
				);
		     	echo json_encode($arr_result);
		   	}
		}
	}
	
}
 