<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_pesan extends CI_Model {        
    
    function inbox(){
		$sql = $this->db->query("SELECT * FROM inbox ORDER BY ReceivingDateTime DESC");
		// $this->db->select('*');
		// $this->db->from('inbox');		
        // $sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }	
	
	function outbox(){
		$this->db->select('*');
		$this->db->from('outbox');		
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }
	
	function sent(){
		$sql = $this->db->query("SELECT * FROM sentitems ORDER BY SendingDateTime DESC");
		// $this->db->select('*');
		// $this->db->from('sentitems');		
        // $sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }
	
	function hapusinbox($ID){
		$this->db->where('ID',$ID);
		$this->db->delete('inbox');   
    }
	
	function hapusoutbox($ID){
		$this->db->where('ID',$ID);
		$this->db->delete('outbox');   
    }
	
	function hapussentbox($ID){
		$this->db->where('ID',$ID);
		$this->db->delete('sentitems');   
    }
	
	function total_rows() {
		$data = $this->db->get('inbox');
		return $data->num_rows();
	}
	
	function search_nis($nis){
		$this->db->like('nis', $nis , 'both');
		$this->db->order_by('nis', 'ASC');	
		$this->db->limit(10);
		return $this->db->get('pbk')->result();
	}
}