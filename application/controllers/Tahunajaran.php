<?php
class Tahunajaran extends CI_Controller{
    function __construct(){
        parent::__construct();
		if(($this->session->userdata('masuk')!=TRUE)){            
            redirect('auth/login');
        }
        $this->load->model('mod_ta');
    }
 
    function index(){
        $data['post'] 	= $this->mod_ta->index();			
        $data['isi'] 	= 'ta';
        $data['title'] 	= 'Tahun Ajaran';
        $this->load->view('layout/wrapper',$data);
    }
	
	function tambah(){
		$data['isi'] 	= 'ta_tambah';
		$data['title'] 	= 'Tambah Data';
		$this->load->view('layout/wrapper',$data);
	}
	
	function insert(){
			$tahun_ajaran	= $this->input->post('tahun_ajaran');
			$nominal_spp	= $this->input->post('nominal_spp');		
			$nominal_osis	= $this->input->post('nominal_osis');
			
			$object = array(
							'tahun_ajaran'		=> $tahun_ajaran,
							'nominal_spp' 		=> $nominal_spp,
							'nominal_osis' 		=> $nominal_osis
							);
			$this->db->insert('tahun_ajaran', $object);
			$this->session->set_flashdata('sukses','Data Berhasil Ditambahkan !');                
			redirect('tahunajaran/index','refresh');	
	}
	
	function edit($id_ta){
		$data['post'] 	= $this->mod_ta->edit($id_ta); 
		$data['action']	= 'tahunajaran/update/'.$id_ta;
        $data['isi'] 	= 'ta_edit';
        $data['title'] 	= 'Edit Data';
        $this->load->view('layout/wrapper',$data);
	}
	
	function update($id_ta){
		$query = array(
						    'tahun_ajaran'	=> $this->input->post('tahun_ajaran'),
							'nominal_spp' 	=> $this->input->post('nominal_spp'),
							'nominal_osis' 	=> $this->input->post('nominal_osis')
                        );
		$pesan="Data Berhasil Disimpan !";
		$this->session->set_flashdata('sukses',$pesan);
		$sql = $this->mod_ta->update($query, $id_ta);
		redirect('tahunajaran/index');
	}
	
	function hapus($id_ta){
		$pesan="Data Berhasil Dihapus !";
        $this->session->set_flashdata('sukses',$pesan);
        $this->mod_ta->hapus($id_ta);
        redirect('tahunajaran/index');
	}
}
 