<?php
class Laporan_tabungan extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth/login');
        }
		$this->load->model('mod_laporantabungan');
		$this->load->library('pdf');
    }
 
    function masuk(){        
        $data['isi'] 	= 'laporan_tabungan_masuk';
        $data['title'] 	= 'Laporan Pemasukan';
        $this->load->view('layout/wrapper',$data);
    }
	
	function masuk_lihat(){
		if($this->input->post('lihat')){				
			$periode		= $this->input->post('id_ta');			
			
			$this->db->select('tahun_ajaran');
			$this->db->from('tahun_ajaran');
			$this->db->where('id_ta',$periode);			
			$data['periode']	= $this->db->get()->row()->tahun_ajaran;
			
			$data['post'] 	= $this->mod_laporantabungan->masuk($periode);			
			$data['isi'] 	= 'laporan_tabungan_masuk_lihat';
			$data['title'] 	= 'Laporan Pemasukan';
			$this->load->view('layout/wrapper',$data);
		} 
		else if($this->input->post('print')){
			$periode		= $this->input->post('id_ta');
						
			$this->db->select('tahun_ajaran');
			$this->db->from('tahun_ajaran');
			$this->db->where('id_ta',$periode);			
			$thn = $this->db->get()->row()->tahun_ajaran;
			$i = 0;
			$this->db->select('*');
			$this->db->from('tabungan');			
			$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=tabungan.id_ta');						
			$this->db->where('tabungan.id_ta',$periode);			
			$sql = $this->db->get();
			$result = $sql->result();		
			
			$pdf = new FPDF('l','mm','F4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',12);
			// mencetak string 
			$pdf->Cell(265,7,'LAPORAN PEMASUKAN TABUNGAN SISWA SMA PGRI 1 PURWAKARTA',0,1,'C');
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(265,7,' PERIODE '.$thn.'',0,1,'C');
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,10,'',0,1);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(10,8,'NO',1,0,'C');
			$pdf->Cell(21,8,'NIS',1,0,'C');
			$pdf->Cell(85,8,'NAMA',1,0,'C');
			$pdf->Cell(26,8,'PERIODE',1,0,'C');
			$pdf->Cell(26,8,'TANGGAL',1,0,'C');
			$pdf->Cell(35,8,'BAYAR',1,0,'C');			
			$pdf->Cell(33,8,'KETERANGAN',1,1,'C');
			
			$pdf->SetFont('Arial','',10);
			//$mahasiswa = $this->db->get('spp')->result();
			foreach ($result as $row){
			$i++;
				$pdf->Cell(10,7,$i,1,0,'C');
				$pdf->Cell(21,7,$row->nis,1,0,'C');
				$pdf->Cell(85,7,$row->nama,1,0);
				$pdf->Cell(26,7,$row->tahun_ajaran,1,0,'C');
				$pdf->Cell(26,7,$row->tgl,1,0,'C'); 
				$pdf->Cell(35,7,'Rp.'.number_format($row->pemasukan).'',1,0); 				
				$pdf->Cell(33,7,'',1,1);			
			}
			$pdf->Output();
		}	
        
    }
	
	function keluar(){        
        $data['isi'] 	= 'laporan_tabungan_keluar';
        $data['title'] 	= 'Laporan Penarikan';
        $this->load->view('layout/wrapper',$data);
    }
	
	function keluar_lihat(){
		$periode		= $this->input->post('id_ta');		
		
		if($this->input->post('lihat')){				
			$this->db->select('tahun_ajaran');
			$this->db->from('tahun_ajaran');
			$this->db->where('id_ta',$periode);			
			$data['periode']	= $this->db->get()->row()->tahun_ajaran;
			
			$data['post'] 	= $this->mod_laporantabungan->keluar($periode);			
			$data['isi'] 	= 'laporan_tabungan_keluar_lihat';
			$data['title'] 	= 'Laporan Penarikan';
			$this->load->view('layout/wrapper',$data);
		}
		else if($this->input->post('print')){		
			$this->db->select('tahun_ajaran');
			$this->db->from('tahun_ajaran');
			$this->db->where('id_ta',$periode);			
			$thn = $this->db->get()->row()->tahun_ajaran;
			$i = 0;
			$this->db->select('*');
			$this->db->from('tabungan');		
			$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=tabungan.id_ta');						
			$this->db->where('tabungan.id_ta',$periode);			
			$this->db->where('penarikan >', '0' );
			$sql = $this->db->get();
			$result = $sql->result();		
			
			$pdf = new FPDF('l','mm','F4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',12);
			// mencetak string 
			$pdf->Cell(265,7,'LAPORAN PENARIKAN TABUNGAN SISWA SMA PGRI 1 PURWAKARTA',0,1,'C');
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(265,7,' PERIODE '.$thn.'',0,1,'C');
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,10,'',0,1);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(10,8,'NO',1,0,'C');		
			$pdf->Cell(26,8,'NIS',1,0,'C');
			$pdf->Cell(80,8,'NAMA',1,0,'C');
			$pdf->Cell(26,8,'PERIODE',1,0,'C');
			$pdf->Cell(26,8,'TANGGAL',1,0,'C');
			$pdf->Cell(40,8,'JUMLAH PENARIKAN',1,0,'C');				
			$pdf->Cell(40,8,'SISA',1,0,'C');
			$pdf->Cell(37,8,'KETERANGAN',1,1,'C');
			
			$pdf->SetFont('Arial','',10);
			//$mahasiswa = $this->db->get('spp')->result();
			foreach ($result as $row){
			$i++;
				$pdf->Cell(10,7,$i,1,0,'C');			
				$pdf->Cell(26,7,$row->nis,1,0); 
				$pdf->Cell(80,7,$row->nama,1,0); 
				$pdf->Cell(26,7,$row->tahun_ajaran,1,0,'C');
				$pdf->Cell(26,7,$row->tgl,1,0,'C'); 
				$pdf->Cell(40,7,'Rp.'.number_format($row->penarikan).'',1,0); 			
				$pdf->Cell(40,7,'Rp.'.number_format($row->total).'',1,0); 
				$pdf->Cell(37,7,'',1,1);			
			}
			$pdf->Output();
		}
    }
	
}
 