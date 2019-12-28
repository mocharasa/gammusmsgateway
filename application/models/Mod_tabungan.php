<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_tabungan extends CI_Model {        
    
    function index(){
		$this->db->select('*');
		$this->db->from('siswa');
		// $this->db->join('siswa','siswa.nis=spp.nis','left');
		// $this->db->join('tahun_ajaran','tahun_ajaran.id_ta=spp.id_ta','left');		
		// $this->db->join('bulan','bulan.id_bulan=spp.id_bulan','left');	
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }	
	
	function tampil($nis){
        //$sql = $this->db->query("SELECT * FROM tabungan WHERE nis='$nis'");
		$this->db->select('*');	
		$this->db->from('tabungan');		
        $this->db->where('tabungan.nis',$nis);		
		$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=tabungan.id_ta','left');
        $sql = $this->db->get();
        $result = $sql->result_object();
        return $result;
    }         
	
	function search_nis($nis){
		$this->db->like('nis', $nis , 'both');
		$this->db->order_by('nis', 'ASC');	
		$this->db->limit(10);
		return $this->db->get('siswa')->result();
	}
    
}