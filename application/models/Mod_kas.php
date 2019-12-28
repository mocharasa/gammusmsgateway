<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_kas extends CI_Model {        
    
    function index(){
		$this->db->select('*');
		$this->db->from('kas_sekolah');	
		$this->db->join('kategori','kategori.id_kategori=kas_sekolah.id_kategori','left');
		$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=kas_sekolah.id_ta','left');		
		$this->db->join('bulan','bulan.id_bulan=kas_sekolah.id_bulan','left');
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }
	
	function osis(){
		$this->db->select('*');
		$this->db->from('kas_osis');	
		$this->db->join('kategori','kategori.id_kategori=kas_osis.id_kategori','left');
		$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=kas_osis.id_ta','left');				
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }

}