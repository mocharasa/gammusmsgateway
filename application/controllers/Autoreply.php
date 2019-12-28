<?php
class Autoreply extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth/login');
        }
        $this->load->model('mod_autoreply');		
    }
 
	function index(){ 
		$page 	= base_url('autoreply/index');
		$second = 10; 
		header("Refresh:$second; $page");
		
		$kotak_masuk = $this->mod_autoreply->inbox();
		foreach ($kotak_masuk as $inbox){
			$pesan 		= $inbox->TextDecoded;
			$nomor 		= $inbox->SenderNumber;
			$ID 		= $inbox->ID;
			
			$pecah 	  = explode('#', $pesan);
			$keyword1 = ucfirst($pecah[0]);
			$keyword2 = $pecah[1];
			$keyword3 = $pecah[2];
			
			$this->db->select('telah_bayar');
			$this->db->from('spp');
			$this->db->where('nis', $keyword3);
			$this->db->where('tahun_ajaran', $keyword2);
			$this->db->where('bulan', $keyword1);
			$x = $this->db->get()->row()->telah_bayar;	
			$nominal = number_format($x);
			
			$this->db->select('status');
			$this->db->from('spp');
			$this->db->where('nis', $keyword3);
			$this->db->where('tahun_ajaran', $keyword2);
			$this->db->where('bulan', $keyword1);
			$status = $this->db->get()->row()->status;		
			echo '<br>';
			$this->db->select('bulan');
			$this->db->from('spp');
			$this->db->where('bulan', $keyword1);
			$bulan = $this->db->get()->row()->bulan;
			
			$this->db->select('tahun_ajaran');
			$this->db->from('spp');
			$this->db->where('tahun_ajaran', $keyword2);
			$periode = $this->db->get()->row()->tahun_ajaran;  
			
			$this->db->select('nis');
			$this->db->from('spp');
			$this->db->where('nis', $keyword3);
			$nis = $this->db->get()->row()->nis;
			
			$this->db->select('nama');
			$this->db->from('spp');
			$this->db->where('nis', $keyword3);
			$nama = $this->db->get()->row()->nama;     
			
			if(($bulan == $keyword1)&&($periode == $keyword2)&&($nis == $keyword3)&&($status == 'Telah Bayar')){						
				$TextDecoded = "$nama dengan NIS $nis pada bulan $bulan periode $periode, Telah Membayar Iuran SPP sebesar Rp.$nominal";			
				echo $TextDecoded;
				$query = array(										
								'DestinationNumber'	=> $nomor,							
								'TextDecoded'		=> $TextDecoded														
							   );		
				$this->db->insert('outbox', $query);
			} 
			/*
			else if(($bulan != $keyword1)XOR($periode != $keyword2)&&($nis == $keyword3)){						
				$TextDecoded = "Siswa dengan NIS $nis tersebut belum membayar iuran SPP";			
				echo $TextDecoded;
				$query = array(										
								'DestinationNumber'	=> $nomor,							
								'TextDecoded'		=> $TextDecoded														
							   );		
				$this->db->insert('outbox', $query);
			} else if(($keyword1 != $bulan) && ($keyword2 != $periode) && ($keyword3 != $nis)){
				echo $TextDecoded = "Format SMS Salah, silahkan masukkan format dengan benar, Bulan#Tahun Ajaran#NIS. Contoh Januari#2017-2018#11223344";			
				$query = array(										
								'DestinationNumber'	=> $nomor,							
								'TextDecoded'		=> $TextDecoded														
							   );		
				$this->db->insert('outbox', $query);
			}
			*/
			$this->mod_autoreply->processed($ID);
		}        
    }
	
}
 