<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_laporantabungan extends CI_Model {        
    
    function masuk($periode){
		$this->db->select('*');
		$this->db->from('tabungan');		
		$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=tabungan.id_ta');				
        $this->db->where('tabungan.id_ta',$periode);		
		$sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }	
	
	function keluar($periode){
		
		$this->db->select('*');
		$this->db->from('tabungan');		
		$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=tabungan.id_ta');						
        $this->db->where('tabungan.id_ta',$periode);		
		$this->db->where('penarikan >', '0' );
		$sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }    	   
	        
    
}