<?php
class Tunggakan extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth/login');
        }
		$this->load->model('mod_tunggakan');
		$this->load->library('pdf');
    }
 
    function osis(){        
        $data['isi'] 	= 'tunggakan_osis';
        $data['title'] 	= 'Data Tunggakan OSIS';
        $this->load->view('layout/wrapper',$data);
    }
	
	function osis_lihat(){
		if($this->input->post('lihat')){				
			$periode		= $this->input->post('id_ta');
			$jurusan		= $this->input->post('jurusan');
			$kelas			= $this->input->post('kelas');
			$this->db->select('tahun_ajaran');
			$this->db->from('tahun_ajaran');
			$this->db->where('id_ta',$periode);			
			$data['periode']	= $this->db->get()->row()->tahun_ajaran;
			$this->db->select('jurusan');
			$this->db->from('siswa');
			$this->db->where('jurusan',$jurusan);			
			$data['jurusan']	= $this->db->get()->row()->jurusan;
			$this->db->select('kelas');
			$this->db->from('siswa');
			$this->db->where('kelas',$kelas);			
			$data['kelas']	= $this->db->get()->row()->kelas;
			
			$data['post'] 	= $this->mod_tunggakan->osis($periode, $jurusan, $kelas);			
			$data['isi'] 	= 'tunggakan_osis_lihat';
			$data['title'] 	= 'Data Tunggakan OSIS';
			$this->load->view('layout/wrapper',$data);
		} 
		else if($this->input->post('print')){
			$jurusan		= $this->input->post('jurusan');
			$kelas			= $this->input->post('kelas');
			$this->db->select('jurusan');
			$this->db->from('siswa');
			$this->db->where('jurusan',$jurusan);			
			$jur	= $this->db->get()->row()->jurusan;
			$this->db->select('kelas');
			$this->db->from('siswa');
			$this->db->where('kelas',$kelas);			
			$kel	= $this->db->get()->row()->kelas;
			$i = 0;
			$this->db->select('*');
			$this->db->from('spp');
			$this->db->join('siswa','siswa.nis=spp.nis');
			$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=spp.id_ta');		
			$this->db->join('bulan','bulan.id_bulan=spp.id_bulan');	
			$this->db->where('spp.id_ta',$periode);
			$this->db->where('spp.id_bulan',$bulan);
			$sql = $this->db->get();
			$result = $sql->result();		
			
			$pdf = new FPDF('l','mm','F4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',12);
			// mencetak string 
			$pdf->Cell(265,7,'LAPORAN PEMASUKAN SPP SMA PGRI 1 PURWAKARTA',0,1,'C');
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(265,7,'BULAN '.strtoupper($bln).' PERIODE '.$thn.'',0,1,'C');
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,10,'',0,1);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(10,8,'NO',1,0,'C');
			$pdf->Cell(21,8,'NIS',1,0,'C');
			$pdf->Cell(85,8,'NAMA',1,0,'C');
			$pdf->Cell(26,8,'PERIODE',1,0,'C');
			$pdf->Cell(26,8,'TANGGAL',1,0,'C');
			$pdf->Cell(29,8,'WAJIB BAYAR',1,0,'C');
			$pdf->Cell(29,8,'TELAH BAYAR',1,0,'C');
			$pdf->Cell(33,8,'KETERANGAN',1,1,'C');
			
			$pdf->SetFont('Arial','',10);
			//$mahasiswa = $this->db->get('spp')->result();
			foreach ($result as $row){
			$i++;
				$pdf->Cell(10,7,$i,1,0,'C');
				$pdf->Cell(21,7,$row->nis,1,0,'C');
				$pdf->Cell(85,7,$row->nama,1,0);
				$pdf->Cell(26,7,$row->tahun_ajaran,1,0,'C');
				$pdf->Cell(26,7,$row->tanggal,1,0,'C'); 
				$pdf->Cell(29,7,'Rp.'.number_format($row->nominal_spp).'',1,0); 
				$pdf->Cell(29,7,'Rp.'.number_format($row->telah_bayar).'',1,0); 
				$pdf->Cell(33,7,'',1,1);			
			}
			$pdf->Output();
		}	
        
    }
	
	function spp(){        
        $data['isi'] 	= 'tunggakan_spp';
        $data['title'] 	= 'Data Tunggakan SPP';
        $this->load->view('layout/wrapper',$data);
    }
	
	function spp_lihat(){
		$periode		= $this->input->post('id_ta');
		$bulan			= $this->input->post('id_bulan');
		
		if($this->input->post('lihat')){	
			$periode		= $this->input->post('id_ta');
			$jurusan		= $this->input->post('jurusan');
			$kelas			= $this->input->post('kelas');
			$this->db->select('tahun_ajaran');
			$this->db->from('tahun_ajaran');
			$this->db->where('id_ta',$periode);			
			$data['periode']	= $this->db->get()->row()->tahun_ajaran;
			$this->db->select('jurusan');
			$this->db->from('siswa');
			$this->db->where('jurusan',$jurusan);			
			$data['jurusan']	= $this->db->get()->row()->jurusan;
			$this->db->select('kelas');
			$this->db->from('siswa');
			$this->db->where('kelas',$kelas);			
			$data['kelas']	= $this->db->get()->row()->kelas;
			
			$data['post'] 	= $this->mod_tunggakan->spp($periode, $jurusan, $kelas);			
			$data['isi'] 	= 'tunggakan_spp_lihat';
			$data['title'] 	= 'Data Tunggakan SPP';
			$this->load->view('layout/wrapper',$data);
		}
		else if($this->input->post('print')){
			$periode		= $this->input->post('id_ta');
			$jurusan		= $this->input->post('jurusan');
			$kelas			= $this->input->post('kelas');
			$this->db->select('tahun_ajaran');
			$this->db->from('tahun_ajaran');
			$this->db->where('id_ta',$periode);		
			$thn = $this->db->get()->row()->tahun_ajaran;
			$this->db->select('jurusan');
			$this->db->from('siswa');
			$this->db->where('jurusan',$jurusan);			
			$jur	= $this->db->get()->row()->jurusan;
			$this->db->select('kelas');
			$this->db->from('siswa');
			$this->db->where('kelas',$kelas);			
			$kel	= $this->db->get()->row()->kelas;
			$i = 0;
			$this->db->select('*');
			$this->db->from('spp');		
			$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=spp.id_ta');				
			$this->db->join('siswa','siswa.nis=spp.nis');		
			$this->db->where('spp.id_ta',$periode);		
			$this->db->where('siswa.jurusan',$jurusan);		
			$this->db->where('siswa.kelas',$kelas);		
			$this->db->where('tunggakan >', '0' );
			$sql = $this->db->get();
			$result = $sql->result();
			
			$pdf = new FPDF('l','mm','F4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',12);
			// mencetak string 
			$pdf->Cell(265,7,'DATA TUNGGAKAN SPP SISWA SMA PGRI 1 PURWAKARTA',0,1,'C');
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(265,7,'KELAS '.strtoupper($kel).' JURUSAN '.strtoupper($jur).' PERIODE '.$thn.'',0,1,'C');
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,10,'',0,1);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(10,8,'NO',1,0,'C');
			$pdf->Cell(21,8,'NIS',1,0,'C');
			$pdf->Cell(89,8,'NAMA',1,0,'C');			
			$pdf->Cell(28,8,'TANGGAL',1,0,'C');
			$pdf->Cell(45,8,'JUMLAH TUNGGAKAN',1,0,'C');			
			$pdf->Cell(36,8,'KETERANGAN',1,1,'C');
			
			$pdf->SetFont('Arial','',10);
			//$mahasiswa = $this->db->get('spp')->result();
			foreach ($result as $row){
			$i++;
				$pdf->Cell(10,7,$i,1,0,'C');
				$pdf->Cell(21,7,$row->nis,1,0,'C');
				$pdf->Cell(89,7,$row->nama,1,0);				
				$pdf->Cell(28,7,$row->tanggal,1,0,'C'); 
				$pdf->Cell(45,7,'Rp.'.number_format($row->tunggakan).'',1,0); 				
				$pdf->Cell(36,7,'',1,1);			
			}
			$pdf->Output();
		}
    }
	
}
 