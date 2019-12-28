<?php
class Kategori extends CI_Controller{
    function __construct(){
        parent::__construct();
		if(($this->session->userdata('masuk')!=TRUE)){            
            redirect('auth/login');
        }
        $this->load->model('mod_kategori');
    }
 
    function index(){
        $data['post'] 	= $this->mod_kategori->index();			
        $data['isi'] 	= 'kategori';
        $data['title'] 	= 'Kategori';
        $this->load->view('layout/wrapper',$data);
    }
	
	function tambah(){
		$data['isi'] 	= 'kategori_tambah';
		$data['title'] 	= 'Tambah Data';
		$this->load->view('layout/wrapper',$data);
	}
	
	function insert(){
			$kategori	= $this->input->post('kategori');
			$keterangan	= $this->input->post('keterangan');		
			
			$object = array(
							'kategori'		=> $kategori,
							'keterangan'	=> $keterangan							
							);
			$this->db->insert('kategori', $object);
			$this->session->set_flashdata('sukses','Data Berhasil Ditambahkan !');                
			redirect('kategori/index','refresh');	
	}
	
	function edit($id_kategori){
		$data['post'] 	= $this->mod_kategori->edit($id_kategori); 
		$data['action']	= 'kategori/update/'.$id_kategori;
        $data['isi'] 	= 'kategori_edit';
        $data['title'] 	= 'Edit Data';
        $this->load->view('layout/wrapper',$data);
	}
	
	function update($id_kategori){
		$query = array(
						'kategori'	=> $this->input->post('kategori'),
						'keterangan'=> $this->input->post('keterangan')							
                       );
		$pesan="Data Berhasil Disimpan !";
		$this->session->set_flashdata('sukses',$pesan);
		$sql = $this->mod_kategori->update($query, $id_kategori);
		redirect('kategori/index');
	}
	
	function hapus($id_kategori){
		$pesan="Data Berhasil Dihapus !";
        $this->session->set_flashdata('sukses',$pesan);
        $this->mod_kategori->hapus($id_kategori);
        redirect('kategori/index');
	}
}
 