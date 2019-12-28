<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');		
    }
    
    function masuk(){
		$periode		= $this->input->post('id_ta');
		$bulan			= $this->input->post('id_bulan');
		
		$this->db->select('bulan');
		$this->db->from('bulan');
		$this->db->where('id_bulan',$bulan);			
		$bln = $this->db->get()->row()->bulan;
		$this->db->select('tahun_ajaran');
		$this->db->from('tahun_ajaran');
		$this->db->where('id_ta',$periode);			
		$thn = $this->db->get()->row()->tahun_ajaran;
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
	
	function keluar(){
		$periode		= $this->input->post('id_ta');
		$bulan			= $this->input->post('id_bulan');
		
		$this->db->select('bulan');
		$this->db->from('bulan');
		$this->db->where('id_bulan',$bulan);			
		$bln = $this->db->get()->row()->bulan;
		$this->db->select('tahun_ajaran');
		$this->db->from('tahun_ajaran');
		$this->db->where('id_ta',$periode);			
		$thn = $this->db->get()->row()->tahun_ajaran;		
		$i = 0;
        $this->db->select('*');
		$this->db->from('kas_sekolah');		
		$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=kas_sekolah.id_ta');		
		$this->db->join('bulan','bulan.id_bulan=kas_sekolah.id_bulan');	
		$this->db->join('kategori','kategori.id_kategori=kas_sekolah.id_kategori');	
        $this->db->where('kas_sekolah.id_ta',$periode);
		$this->db->where('kas_sekolah.id_bulan',$bulan);
		$sql = $this->db->get();
        $result = $sql->result();		
		
        $pdf = new FPDF('l','mm','F4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',12);
        // mencetak string 
        $pdf->Cell(265,7,'LAPORAN PENGELUARAN SPP SMA PGRI 1 PURWAKARTA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(265,7,'BULAN '.strtoupper($bln).' PERIODE '.$thn.'',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,8,'NO',1,0,'C');		
        $pdf->Cell(26,8,'PERIODE',1,0,'C');
		$pdf->Cell(26,8,'TANGGAL',1,0,'C');
		$pdf->Cell(31,8,'JUMLAH KELUAR',1,0,'C');
		$pdf->Cell(29,8,'KATEGORI',1,0,'C');
        $pdf->Cell(29,8,'KEPERLUAN',1,0,'C');
		$pdf->Cell(33,8,'TOTAL KAS',1,0,'C');
		$pdf->Cell(33,8,'KETERANGAN',1,1,'C');
		
        $pdf->SetFont('Arial','',10);
        //$mahasiswa = $this->db->get('spp')->result();
        foreach ($result as $row){
		$i++;
            $pdf->Cell(10,7,$i,1,0,'C');			
            $pdf->Cell(26,7,$row->tahun_ajaran,1,0,'C');
            $pdf->Cell(26,7,$row->tgl,1,0,'C'); 
			$pdf->Cell(29,7,'Rp.'.number_format($row->anggaran_keluar).'',1,0); 
			$pdf->Cell(29,7,$row->kategori,1,0); 
			$pdf->Cell(29,7,$row->keperluan,1,0); 
			$pdf->Cell(29,7,'Rp.'.number_format($row->total_kas).'',1,0); 
			$pdf->Cell(33,7,'',1,1);			
        }
        $pdf->Output();
    }
}