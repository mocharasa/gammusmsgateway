<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_profil extends CI_Model {        
    
    function index(){
		$this->db->select('*');
		$this->db->from('login');
		$sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }
	
	function view($id){
    $this->db->select('*');
	$this->db->where('id', $id);
    $result = $this->db->get('login')->row(); // Tampilkan data berdasarkan ID
	}

	
    function edit($id){		
        $this->db->select('*');
        $this->db->where('id',$id);
        $sql = $this->db->get('login');        
		$result = $sql->result_object();
        return $result;
    }
    
	function update($query, $id){
        $data = array (							
							'nama' 		=> $query['nama'],
							'username' 	=> $query['username'],
							'password' 	=> $query['password'],
							'level' 	=> $query['level'],
							'status' 	=> $query['status']							                 
                       );
        $this->db->where('id',$id);
        $this->db->update('login', $data);
    }
	
	function ganti($query, $id){
        $data = array (							
							'nama' 		=> $query['nama'],
							'username' 	=> $query['username'],
							'password' 	=> $query['password']												              
                       );
        $this->db->where('id',$id);
        $this->db->update('login', $data);
    }
	
    function hapus($id){
        $this->db->where('id',$id);
        $this->db->delete('login'); 
    }
	
	function cek_old(){
		$old = $this->input->post('password');    
		$this->db->where('password',$old);
		$query = $this->db->get('login');
		return $query->result();;
    }
	
	function save(){
		$nama		= $this->input->post('nama');
		$username 	= $this->input->post('username');	
		$pass 		= $this->input->post('passwordbaru');
		$data = array(
						'password' => $pass,
						'username'	=> $username,												
						'nama' 		=> $nama
					  );
		$this->db->where('id', $this->session->userdata('ses_id'));
		$this->db->update('login', $data);
	}
 
    // function tampil($nis){
        // $this->db->select('*');	
		// $this->db->from('siswa');
		// //$this->db->join('pbk','pbk.nis=siswa.nis','left');
        // $this->db->where('nis',$nis);
        // $sql = $this->db->get();
        // $result = $sql->row_array();
        // return $result;
	// }

	// function ortu($nis){        
		// $this->db->select('*');				
        // $this->db->where('nis',$nis);
        // $sql = $this->db->get('pbk');
        // $result = $sql->row_array();
        // return $result;
    // }        
    
	// function total_rows() {
		// $data = $this->db->get('siswa');
		// return $data->num_rows();
	// }
	
    
}