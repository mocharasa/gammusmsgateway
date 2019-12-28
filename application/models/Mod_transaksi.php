<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_transaksi extends CI_Model {        
    
    function index(){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('siswa','siswa.nis=transaksi.nis','left');
		$this->db->join('tahun_ajaran','tahun_ajaran.id_ta=transaksi.id_ta','left');		
		$this->db->join('bulan','bulan.id_bulan=transaksi.id_bulan','left');
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }
	
	function this_month(){
		$a = date('m');
		$bulan = intval($a);
		
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('month(tgl_bayar)',$bulan);
        $sql = $this->db->get();
        $result = $sql->num_rows();
        return $result;   
    }
	    
    function select_bulan($id_bulan) {
		$sql = "SELECT COUNT(*) AS jumlah FROM transaksi WHERE id_bulan = '$id_bulan'";
		$data = $this->db->query($sql);
		return $data->row();
	}
	
	function search_nis($nis){
		$this->db->like('nis', $nis , 'both');
		$this->db->order_by('nis', 'ASC');	
		$this->db->limit(10);
		return $this->db->get('siswa')->result();
	}
}    