<?php
class Auth extends CI_Controller{
    function __construct(){
        parent::__construct();
		//if($this->session->userdata('masuk') != TRUE){            
        //    redirect('dashboard/index');
        //}
        $this->load->model('mod_login');
    }
 
    function index(){
        $this->load->view('login');
    }
 
    function login(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES); 
								
		$cek_tu=$this->mod_login->auth_tu($username,$password);                   
		if($cek_tu->num_rows() > 0){ //jika login sebagai petugas TU
                $data=$cek_tu->row_array();
                $this->session->set_userdata('masuk',TRUE);
                $this->session->set_userdata('akses','1');
				$this->session->set_userdata('ses_id',$data['id']);
                $this->session->set_userdata('ses_user',$data['username']);                            
				$this->session->set_userdata('ses_nama',$data['nama']);
				$this->session->set_userdata('ses_status',$data['status']);				
                redirect('dashboard/index');
        }else{  // jika username dan password tidak ditemukan atau salah
                $cek_kepsek=$this->mod_login->auth_kepsek($username,$password);                   
				if($cek_kepsek->num_rows() > 0){ //jika login sebagai Kepala Sekolah
					$data=$cek_kepsek->row_array();
					$this->session->set_userdata('masuk',TRUE);
					$this->session->set_userdata('akses','2');
					$this->session->set_userdata('ses_id',$data['id']);
					$this->session->set_userdata('ses_user',$data['username']);                            
					$this->session->set_userdata('ses_nama',$data['nama']);
					$this->session->set_userdata('ses_status',$data['status']);				
					redirect('dashboard/index');
				}
		}
				$url = base_url('auth');
                echo $this->session->set_flashdata('error','Masukkan Username dan Password Dengan Benar Untuk Masuk Kedalam Sistem');
                redirect($url);
        }         
			        
 
    function logout(){
        $this->session->sess_destroy();
        $url = base_url('auth/index');
        redirect($url);
    }
 
}