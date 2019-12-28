<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_kategori extends CI_Model {        
    
    function index(){
		$this->db->select('*');
		$this->db->from('kategori');		
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }	
	
    function edit($id_kategori){		
        $this->db->select('*');
        $this->db->where('id_kategori',$id_kategori);
        $sql = $this->db->get('kategori');        
		$result = $sql->result_object();
        return $result;
    }
    
	function update($query, $id_kategori){
        $data = array (
						'kategori'		=> $query['kategori'],                        
						'keterangan' 	=> $query['keterangan']
                       );
        $this->db->where('id_kategori',$id_kategori);
        $this->db->update('kategori', $data);
    }	
	
    function hapus($id_kategori){
		$this->db->where('id_kategori',$id_kategori);
        $this->db->delete('kategori'); 
    }        
	
}    