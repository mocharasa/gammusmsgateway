<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_ortu extends CI_Model {        
    
    function index(){
		$this->db->select('*');
		$this->db->from('pbk');
		$this->db->join('siswa','siswa.nis = pbk.nis','left');		
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }		
	
    function edit($ID){		
        $this->db->select('*');
        $this->db->where('ID',$ID);
        $sql = $this->db->get('pbk');        
		$result = $sql->result_object();
        return $result;
    }
    
	function update($query, $ID){
        $data = array (							
							'nis' 			=> $query['nis'],
							'Name' 			=> $query['Name'],
							'Number'	 	=> $query['Number']							
                       );					   
        $this->db->where('ID',$ID);
        $this->db->update('pbk', $data);
		$nis = $query['nis'];
		$data2 = array (														
							'nama_ayah' 			=> $query['Name']								
                       );					   
        $this->db->where('nis',$nis);
        $this->db->update('siswa', $data2);		
    }
	
    function hapus($ID){
        $this->db->where('ID',$ID);
        $this->db->delete('pbk');        
    }   
    
}