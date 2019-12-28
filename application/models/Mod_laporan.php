<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_laporan extends CI_Model {        
    
    function masuk($periode, $bulan){
		$this->db->select('*');
		$this->db->from('spp');
		$this->db->join('siswa','siswa.nis=spp.nis');
		$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=spp.id_ta');		
		$this->db->join('bulan','bulan.id_bulan=spp.id_bulan');	
        $this->db->where('spp.id_ta',$periode);
		$this->db->where('spp.id_bulan',$bulan);
		$sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }	
	
	function keluar($periode, $bulan){
		
		$this->db->select('*');
		$this->db->from('kas_sekolah');		
		$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=kas_sekolah.id_ta');		
		$this->db->join('bulan','bulan.id_bulan=kas_sekolah.id_bulan');	
		$this->db->join('kategori','kategori.id_kategori=kas_sekolah.id_kategori');
        $this->db->where('kas_sekolah.id_ta',$periode);
		$this->db->where('kas_sekolah.id_bulan',$bulan);
		$this->db->where('anggaran_keluar >', '0' );
		$sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }    	   
	        
    
}