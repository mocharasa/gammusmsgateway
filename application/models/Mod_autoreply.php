<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_autoreply extends CI_Model {        
    
    function inbox(){
		//$sql = $this->db->query("SELECT * FROM inbox ORDER BY ReceivingDateTime DESC");
		$this->db->select('*');
		$this->db->from('inbox');	
		$this->db->where('Processed', 'false');
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }	
	
	function processed($ID){					
		$this->db->where('ID', $ID);
        $this->db->update('inbox', array('Processed' => 'true'));
          
    }	
	
	
}