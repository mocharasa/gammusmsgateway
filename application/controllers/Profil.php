<?php
class Profil extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth/login');
        }
        $this->load->model('mod_profil');
    }
 
    function index(){
        $data['post'] 	= $this->mod_profil->index();			
        $data['isi'] 	= 'profil';
        $data['title'] 	= 'Manajemen Akun';
        $this->load->view('layout/wrapper',$data);
    }	
	
	function tambah(){
		$data['isi'] 	= 'profil_tambah';
		$data['title'] 	= 'Tambah Akun';
		$this->load->view('layout/wrapper',$data);
	}
	
	function insert(){
			$username 	= $this->input->post('username');
			$password	= $this->input->post('password');				
			$status		= $this->input->post('status');
			if($status == 'Tata Usaha'){
				$level		= 1;
			} else if($status == 'Kepala Sekolah'){
				$level		= 2;
			}
			$nama		= $this->input->post('nama');
			
			$object = array(
							'username'	=> $username,
							'password' 	=> $password,
							'level' 	=> $level,
							'status' 	=> $status,
							'nama' 		=> $nama
							);
			$this->db->insert('login', $object);
						
			$this->session->set_flashdata('sukses','Data Berhasil Ditambahkan !');                
			redirect('profil','refresh');	
	}
	
	function edit($id){
		$data['post'] 	= $this->mod_profil->edit($id);
        $data['action'] = 'profil/update/'.$id;
        $data['isi'] 	= 'profil_edit';
        $data['title'] 	= 'Edit Akun';
        $this->load->view('layout/wrapper',$data);
	}
	
	function update($id){
			$username 	= $this->input->post('username');
			$password	= $this->input->post('password');				
			$status		= $this->input->post('status');
			if($status == 'Tata Usaha'){
				$level		= 1;
			} else if($status == 'Kepala Sekolah'){
				$level		= 2;
			}
			$nama		= $this->input->post('nama');
			
			$query = array(
							'username'	=> $username,
							'password' 	=> $password,
							'level' 	=> $level,
							'status' 	=> $status,
							'nama' 		=> $nama
							);
		$pesan="Data Berhasil Disimpan !";
		$this->session->set_flashdata('sukses',$pesan);
		$sql = $this->mod_profil->update($query, $id);
		redirect('profil');
	}
	
	function hapus($id){
		$pesan="Data Berhasil Dihapus !";
        $this->session->set_flashdata('sukses',$pesan);
        $this->mod_profil->hapus($id);
        redirect('profil/index');
	}
	
	function tampil($id){
		$data['post'] 	= $this->mod_profil->view($id); 
		$data['action'] = 'profil/ganti/'.$id;
		$data['isi'] 	= 'profil_tampil';
        $data['title'] 	= 'Profil Admin';
        $this->load->view('layout/wrapper',$data);
	}
	
	function ganti($id){											
									 
			$cek_old = $this->mod_profil->cek_old();
			if ($cek_old == False){
				$this->session->set_flashdata('error','Password Tidak Sesuai!' );		
				redirect('profil/tampil/'.$di);
			}else{
				$this->mod_profil->save();				
				$pesan="Data Berhasil Disimpan !";
				$this->session->set_flashdata('sukses',$pesan);		
				redirect('profil/tampil/'.$di);
			}
	}
	
}
 