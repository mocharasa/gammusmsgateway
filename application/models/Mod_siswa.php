<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_siswa extends CI_Model {        
    
    function index(){
		$this->db->select('*');
		$this->db->from('siswa');
		//$this->db->join('tahun_ajaran','kecamatan.kd_kecamatan=sekolah.kd_kecamatan','left');
		//$this->db->join('kategori','kategori.kd_kategori=sekolah.kd_kategori','left');		
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;   
    }
	
	function view($nis){
    $this->db->select('*');
	$this->db->where('nis', $nis);
    $result = $this->db->get('siswa')->row(); // Tampilkan data siswa berdasarkan NIS
    
    return $result; 
	}

	
    function edit($nis){		
        $this->db->select('*');
        $this->db->where('nis',$nis);
        $sql = $this->db->get('siswa');        
		$result = $sql->result_object();
        return $result;
    }
    
	function update($query, $nis){
        $data = array (
							'nis'			=> $query['nis'],
							'nama' 			=> $query['nama'],
							'kelas'			=> $query['kelas'],
							'tempat_lahir' 	=> $query['tempat_lahir'],
							'tgl_lahir' 	=> $query['tgl_lahir'],
							'jk' 			=> $query['jk'],
							'alamat' 		=> $query['alamat'],
							'agama' 		=> $query['agama'],
							'goldar'		=> $query['goldar'],
							'nama_ayah'		=> $query['nama_ayah'],
							'nama_ibu' 		=> $query['nama_ibu'],
							'pekerjaan_ayah'=> $query['pekerjaan_ayah'],
							'pekerjaan_ibu'	=> $query['pekerjaan_ibu'],
							'kontak'		=> $query['kontak']                        
                       );
        $this->db->where('nis',$nis);
        $this->db->update('siswa', $data);
    }
	
    function hapus($nis){
        $this->db->where('nis',$nis);
        $this->db->delete('pbk'); 
		
		$this->db->where('nis',$nis);
        $this->db->delete('siswa'); 
    }
	
    function tampil($nis){
        $this->db->select('*');	
		$this->db->from('siswa');
		//$this->db->join('pbk','pbk.nis=siswa.nis','left');
        $this->db->where('nis',$nis);
        $sql = $this->db->get();
        $result = $sql->row_array();
        return $result;
	}

	function ortu($nis){        
		$this->db->select('*');				
        $this->db->where('nis',$nis);
        $sql = $this->db->get('pbk');
        $result = $sql->row_array();
        return $result;
    }        
    
	function total_rows() {
		$data = $this->db->get('siswa');
		return $data->num_rows();
	}
	
// Fungsi untuk melakukan proses upload file
public function upload_file($filename){
$this->load->library('upload'); // Load librari upload
 
$config['upload_path'] = './upload/';
$config['allowed_types'] = 'xlsx';
$config['max_size'] = '20480';
$config['overwrite'] = true;
$config['file_name'] = $filename;
 
$this->upload->initialize($config); // Load konfigurasi uploadnya
if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
// Jika berhasil :
$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
return $return;
}else{
// Jika gagal :
$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
return $return;
}
}
 
// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
public function insert_multiple($data,$kueri){
$this->db->insert_batch('siswa', $data);
$this->db->insert_batch('pbk', $kueri);
}

}