<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_tunggakan extends CI_Model {        
    
    function osis($periode, $jurusan, $kelas){
		$this->db->select('*');
		$this->db->from('osis');
		$this->db->join('siswa','siswa.nis=osis.nis');
		$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=osis.id_ta');				
        $this->db->where('osis.id_ta',$periode);		
		$this->db->where('siswa.jurusan',$jurusan);
		$this->db->where('siswa.kelas',$kelas);
		$sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }	
	
	function spp($periode, $jurusan, $kelas){		
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
        return $result;   
    }    	   
	        
    
}