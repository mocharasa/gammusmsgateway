<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_laporanosis extends CI_Model {        
    
    function masuk($periode){
		$this->db->select('*');
		$this->db->from('osis');
		$this->db->join('siswa','siswa.nis=osis.nis');
		$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=osis.id_ta');				
        $this->db->where('osis.id_ta',$periode);		
		$sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }	
	
	function keluar($periode){
		
		$this->db->select('*');
		$this->db->from('kas_osis');		
		$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=kas_osis.id_ta');				
		$this->db->join('kategori','kategori.id_kategori=kas_osis.id_kategori');
        $this->db->where('kas_osis.id_ta',$periode);		
		$this->db->where('pengeluaran >', '0' );
		$sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }    	   
	        
    
}