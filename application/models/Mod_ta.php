<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_ta extends CI_Model {        
    
    function index(){
		$this->db->select('*');
		$this->db->from('tahun_ajaran');		
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }	
	
    function edit($id_ta){		
        $this->db->select('*');
        $this->db->where('id_ta',$id_ta);
        $sql = $this->db->get('tahun_ajaran');        
		$result = $sql->result_object();
        return $result;
    }
    
	function update($query, $id_ta){
        $data = array (
						'tahun_ajaran'	=> $query['tahun_ajaran'],
                        'nominal_spp'  	=> $query['nominal_spp'],
						'nominal_osis' 	=> $query['nominal_osis']
                       );
        $this->db->where('id_ta',$id_ta);
        $this->db->update('tahun_ajaran', $data);
    }	
	
    function hapus($id_ta){
		$this->db->where('id_ta',$id_ta);
        $this->db->delete('tahun_ajaran'); 
    }        
	
	function nominal($id_ta){
		$this->db->like('id_ta', $id_ta , 'both');
		$this->db->order_by('id_ta', 'ASC');	
		//$this->db->limit(10);
		return $this->db->get('tahun_ajaran')->result();
	}
    
}    