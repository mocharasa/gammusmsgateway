<?php
class Pesan extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth/login');
        }
        $this->load->model('mod_pesan');
    }
 
    function index(){        
        $data['isi'] 	= 'message';
        $data['title'] 	= 'Tulis Pesan';
        $this->load->view('layout/wrapper',$data);
    }
	
	function kirim(){
		$DestinationNumber	= $this->input->post('DestinationNumber');
		$TextDecoded		= $this->input->post('TextDecoded');
		$data = array(										
							'DestinationNumber'	=> $DestinationNumber,							
							'TextDecoded'		=> $TextDecoded														
							);		
		$this->db->insert('outbox', $data);
		redirect('pesan/outbox','refresh');
	}
	
	function inbox(){
		$data['post'] 	= $this->mod_pesan->inbox();        
        $data['isi'] 	= 'inbox';
        $data['title'] 	= 'Kotak Masuk';
        $this->load->view('layout/wrapper',$data);
	}
	
	function outbox(){
		$data['post'] 	= $this->mod_pesan->outbox();        
        $data['isi'] 	= 'outbox';
        $data['title'] 	= 'Kotak Keluar';
        $this->load->view('layout/wrapper',$data);
	}
	
	function sent(){
		$data['post'] 	= $this->mod_pesan->sent();        
        $data['isi'] 	= 'sent';
        $data['title'] 	= 'Pesan Terkirim';
        $this->load->view('layout/wrapper',$data);
	}

	function inboxhapus($ID){
		$this->mod_pesan->hapusinbox($ID);               
        redirect('pesan/inbox');
	}
	
	function outboxhapus($ID){
		$this->mod_pesan->hapusoutbox($ID);               
        redirect('pesan/outbox');
	}
	
	function sentboxhapus($ID){
		$this->mod_pesan->hapussentbox($ID);               
        redirect('pesan/sent');
	}
	
	function get_nomor(){
		if (isset($_GET['term'])) {
		  	$result = $this->mod_pesan->search_nis($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
										'label'			=> $row->nis,
										'description'	=> $row->Number
									  );
		     	echo json_encode($arr_result);
		   	}
		}
	}
	
}
 