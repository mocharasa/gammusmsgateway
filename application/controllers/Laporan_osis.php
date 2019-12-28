<?php
class Laporan_osis extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth/login');
        }
		$this->load->model('mod_laporanosis');
		$this->load->library('pdf');
    }
 
    function masuk(){        
        $data['isi'] 	= 'laporan_osis_masuk';
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
			
			$data['post'] 	= $this->mod_laporanosis->masuk($periode);			
			$data['isi'] 	= 'laporan_osis_masuk_lihat';
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
			$this->db->from('osis');
			$this->db->join('siswa','siswa.nis=osis.nis');
			$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=osis.id_ta');						
			$this->db->where('osis.id_ta',$periode);			
			$sql = $this->db->get();
			$result = $sql->result();		
			
			$pdf = new FPDF('l','mm','F4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',12);
			// mencetak string 
			$pdf->Cell(265,7,'LAPORAN PEMASUKAN KEUANGAN OSIS SMA PGRI 1 PURWAKARTA',0,1,'C');
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
				$pdf->Cell(29,7,'Rp.'.number_format($row->nominal_osis).'',1,0); 
				$pdf->Cell(29,7,'Rp.'.number_format($row->bayar).'',1,0); 
				$pdf->Cell(33,7,'',1,1);			
			}
			$pdf->Output();
		}	
        
    }
	
	function keluar(){        
        $data['isi'] 	= 'laporan_osis_keluar';
        $data['title'] 	= 'Laporan Pengeluaran';
        $this->load->view('layout/wrapper',$data);
    }
	
	function keluar_lihat(){
		$periode		= $this->input->post('id_ta');		
		
		if($this->input->post('lihat')){				
			$this->db->select('tahun_ajaran');
			$this->db->from('tahun_ajaran');
			$this->db->where('id_ta',$periode);			
			$data['periode']	= $this->db->get()->row()->tahun_ajaran;
			
			$data['post'] 	= $this->mod_laporanosis->keluar($periode);			
			$data['isi'] 	= 'laporan_osis_keluar_lihat';
			$data['title'] 	= 'Laporan Pengeluaran';
			$this->load->view('layout/wrapper',$data);
		}
		else if($this->input->post('print')){		
			$this->db->select('tahun_ajaran');
			$this->db->from('tahun_ajaran');
			$this->db->where('id_ta',$periode);			
			$thn = $this->db->get()->row()->tahun_ajaran;
			$i = 0;
			$this->db->select('*');
			$this->db->from('kas_osis');		
			$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=kas_osis.id_ta');			
			$this->db->join('kategori','kategori.id_kategori=kas_osis.id_kategori');
			$this->db->where('kas_osis.id_ta',$periode);			
			$this->db->where('pengeluaran >', '0' );
			$sql = $this->db->get();
			$result = $sql->result();		
			
			$pdf = new FPDF('l','mm','F4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',12);
			// mencetak string 
			$pdf->Cell(265,7,'LAPORAN PENGELUARAN KEUANGAN OSIS SMA PGRI 1 PURWAKARTA',0,1,'C');
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(265,7,' PERIODE '.$thn.'',0,1,'C');
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,10,'',0,1);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(10,8,'NO',1,0,'C');		
			$pdf->Cell(26,8,'PERIODE',1,0,'C');
			$pdf->Cell(26,8,'TANGGAL',1,0,'C');
			$pdf->Cell(34,8,'JUMLAH KELUAR',1,0,'C');
			$pdf->Cell(34,8,'KATEGORI',1,0,'C');
			$pdf->Cell(80,8,'KEPERLUAN',1,0,'C');
			$pdf->Cell(34,8,'TOTAL KAS',1,0,'C');
			$pdf->Cell(37,8,'KETERANGAN',1,1,'C');
			
			$pdf->SetFont('Arial','',10);
			//$mahasiswa = $this->db->get('spp')->result();
			foreach ($result as $row){
			$i++;
				$pdf->Cell(10,7,$i,1,0,'C');			
				$pdf->Cell(26,7,$row->tahun_ajaran,1,0,'C');
				$pdf->Cell(26,7,$row->tgl,1,0,'C'); 
				$pdf->Cell(34,7,'Rp.'.number_format($row->pengeluaran).'',1,0); 
				$pdf->Cell(34,7,$row->kategori,1,0); 
				$pdf->Cell(80,7,$row->keperluan,1,0); 
				$pdf->Cell(34,7,'Rp.'.number_format($row->total).'',1,0); 
				$pdf->Cell(37,7,'',1,1);			
			}
			$pdf->Output();
		}
    }
	
}
 