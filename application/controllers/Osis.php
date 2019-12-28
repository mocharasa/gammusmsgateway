<?php
class OSIS extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth/login');
        }
        $this->load->model('mod_osis');
    }
 
    function index(){
        $data['post'] 	= $this->mod_osis->index();			
        $data['isi'] 	= 'osis';
        $data['title'] 	= 'Data Pembayaran OSIS Siswa';
        $this->load->view('layout/wrapper',$data);
    }
	
	function view($nis){
		$data['post'] 	= $this->mod_osis->tampil($nis);        
        $data['isi'] 	= 'osis_detail';
        $data['title'] 	= 'Data Pembayaran OSIS Siswa';
        $this->load->view('layout/wrapper',$data);
	}
		
	
}
 