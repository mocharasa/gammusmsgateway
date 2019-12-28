<?php
class Ortu extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth/login');
        }
        $this->load->model('mod_ortu');
		$this->load->model('mod_siswa');
    }
 
    function index(){
        $data['post'] 	= $this->mod_ortu->index();			
        $data['isi'] 	= 'ortu';
        $data['title'] 	= 'Data Orang Tua Siswa';
        $this->load->view('layout/wrapper',$data);
    }
	
	function lihat(){
        $data['post'] 	= $this->mod_ortu->index();			
        $data['isi'] 	= 'ortu_lihat';
        $data['title'] 	= 'Data Orang Tua Siswa';
        $this->load->view('layout/wrapper',$data);
    }
	
	function tambah(){
		$data['isi'] 	= 'ortu_tambah';
		$data['title'] 	= 'Tambah Data';
		$this->load->view('layout/wrapper',$data);
	}
	
	function insert(){
			$nis 			= $this->input->post('nis');
			$name			= $this->input->post('name');
			$number			= $this->input->post('number');			
			
			$object = array(
							'nis'			=> $nis,
							'name' 			=> $name,
							'number' 		=> $number							
							);
			$this->db->insert('pbk', $object);
			$this->session->set_flashdata('sukses','Data Berhasil Ditambahkan !');                
			redirect('ortu','refresh');	
	}
	
	function edit($ID){
		$data['post'] = $this->mod_ortu->edit($ID);
        $data['action'] = 'ortu/update/'.$ID;
        $data['isi'] = 'ortu_edit';
        $data['title'] = 'Edit Data';
        $this->load->view('layout/wrapper',$data);
	}
	
	function update($ID){
		$query = array(
						    'nis'			=> $this->input->post('nis'),
							'Name' 			=> $this->input->post('Name'),							
							'Number'		=> $this->input->post('Number')
                          );
		$pesan="Data Berhasil Disimpan !";
		$this->session->set_flashdata('sukses',$pesan);
		$sql = $this->mod_ortu->update($query, $ID);
		redirect('ortu','refresh');
	}
	
	function hapus($ID){
		$pesan="Data Berhasil Dihapus !";
        $this->session->set_flashdata('sukses',$pesan);
        $this->mod_ortu->hapus($ID);
        redirect('ortu','refresh');
	}
}
 