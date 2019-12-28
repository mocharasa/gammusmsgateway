<?php
class Siswa extends CI_Controller{
	private $filename = "import_data"; // Kita tentukan nama filenya
    function __construct(){
        parent::__construct();
		if($this->session->userdata('masuk') != TRUE){            
            redirect('auth/login');
        }
        $this->load->model('mod_siswa');
    }
 
    function index(){
        $data['post'] 	= $this->mod_siswa->index();			
        $data['isi'] 	= 'siswa';
        $data['title'] 	= 'Data Siswa';
        $this->load->view('layout/wrapper',$data);
    }
	
	function lihat(){
        $data['post'] 	= $this->mod_siswa->index();			
        $data['isi'] 	= 'siswa_lihat';
        $data['title'] 	= 'Data Siswa';
        $this->load->view('layout/wrapper',$data);
    }
	
	function tambah(){
		$data['isi'] 	= 'siswa_tambah';
		$data['title'] 	= 'Tambah Data';
		$this->load->view('layout/wrapper',$data);
	}
	
	function insert(){
			$nis 			= $this->input->post('nis');
			$nama			= $this->input->post('nama');
			$kelas			= $this->input->post('kelas');
			$jurusan		= $this->input->post('jurusan');
			$tempat_lahir	= $this->input->post('tempat_lahir');
			$tgl_lahir		= $this->input->post('tgl_lahir');
			$jk				= $this->input->post('jk');
			$alamat			= $this->input->post('alamat');
			$agama			= $this->input->post('agama');
			$goldar			= $this->input->post('goldar');
			$nama_ayah		= $this->input->post('nama_ayah');
			$nama_ibu		= $this->input->post('nama_ibu');
			$pekerjaan_ayah	= $this->input->post('pekerjaan_ayah');
			$pekerjaan_ibu	= $this->input->post('pekerjaan_ibu');
			$kontak			= $this->input->post('kontak');
			$number			= $this->input->post('number');
			$object = array(
							'nis'			=> $nis,
							'nama' 			=> $nama,
							'kelas'			=> $kelas,
							'jurusan'		=> $jurusan,
							'tempat_lahir' 	=> $tempat_lahir,
							'tgl_lahir' 	=> $tgl_lahir,
							'jk' 			=> $jk,
							'alamat' 		=> $alamat,
							'agama' 		=> $agama,
							'goldar'		=> $goldar,
							'nama_ayah'		=> $nama_ayah,
							'nama_ibu' 		=> $nama_ibu,
							'pekerjaan_ayah'=> $pekerjaan_ayah,
							'pekerjaan_ibu'	=> $pekerjaan_ibu,
							'kontak'		=> $kontak						
							);
			$this->db->insert('siswa', $object);
			
			$query = array(
							'nis'			=> $nis,	
							'name'			=> $nama_ayah,
							'number'		=> $number						
							);
			$this->db->insert('pbk', $query);
			$this->session->set_flashdata('sukses','Data Berhasil Ditambahkan !');                
			redirect('siswa','refresh');	
	}
	
	function edit($nis){
		$data['post'] = $this->mod_siswa->edit($nis);
        $data['action'] = 'siswa/update/'.$nis;
        $data['isi'] = 'siswa_edit';
        $data['title'] = 'Edit';
        $this->load->view('layout/wrapper',$data);
	}
	
	function update($nis){
		$query = array(
						    'nis'			=> $this->input->post('nis'),
							'nama' 			=> $this->input->post('nama'),
							'kelas'			=> $this->input->post('kelas'),
							'jurusan'		=> $this->input->post('jurusan'),
							'tempat_lahir' 	=> $this->input->post('tempat_lahir'),
							'tgl_lahir' 	=> $this->input->post('tgl_lahir'),
							'jk' 			=> $this->input->post('jk'),
							'alamat' 		=> $this->input->post('alamat'),
							'agama' 		=> $this->input->post('agama'),
							'goldar'		=> $this->input->post('goldar'),
							'nama_ayah'		=> $this->input->post('nama_ayah'),
							'nama_ibu' 		=> $this->input->post('nama_ibu'),
							'pekerjaan_ayah'=> $this->input->post('pekerjaan_ayah'),
							'pekerjaan_ibu'	=> $this->input->post('pekerjaan_ibu'),
							'kontak'		=> $this->input->post('kontak')
                          );
		$pesan="Data Berhasil Disimpan !";
		$this->session->set_flashdata('sukses',$pesan);
		$sql = $this->mod_siswa->update($query, $nis);
		redirect('siswa');
	}
	
	function hapus($nis){
		$pesan="Data Berhasil Dihapus !";
        $this->session->set_flashdata('sukses',$pesan);
        $this->mod_siswa->hapus($nis);
        redirect('siswa/index');
	}
	
	function view($nis){
		$data['post'] 	= $this->mod_siswa->tampil($nis);        	
        $data['query'] 	= $this->mod_siswa->ortu($nis);        	
		$data['isi'] 	= 'siswa_detail';
        $data['title'] 	= 'Data Siswa';
        $this->load->view('layout/wrapper',$data);
	}

public function form(){
$data = array(); // Buat variabel $data sebagai array

if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
$upload = $this->mod_siswa->upload_file($this->filename);

if($upload['result'] == "success"){ // Jika proses upload sukses
// Load plugin PHPExcel nya
include APPPATH.'third_party/PHPExcel/PHPExcel.php';

$excelreader = new PHPExcel_Reader_Excel2007();
$loadexcel = $excelreader->load('upload/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder upload
$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
$data['sheet'] = $sheet; 
}else{ // Jika proses upload gagal
$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
}
}
$data['isi'] = 'form';
$data['title'] = 'Import Data';
$this->load->view('layout/wrapper', $data);
}

public function import(){
// Load plugin PHPExcel nya
include APPPATH.'third_party/PHPExcel/PHPExcel.php';

$excelreader = new PHPExcel_Reader_Excel2007();
$loadexcel = $excelreader->load('upload/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder upload
$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
$data = [];

$numrow = 1;
foreach($sheet as $row){
// Cek $numrow apakah lebih dari 1
// Artinya karena baris pertama adalah nama-nama kolom
// Jadi dilewat saja, tidak usah diimport
if($numrow > 1){
// Kita push (add) array data ke variabel data
	$data[] = array( 
					'nis'				=>	$row['A'],
					'nama'				=>	$row['B'],
					'kelas'				=>	$row['C'],
					'jurusan'			=>	$row['D'],
					'tempat_lahir'		=>	$row['E'],
					'tgl_lahir'			=>	$row['F'],
					'jk'				=>	$row['G'],
					'alamat'			=>	$row['H'],
					'agama'				=>	$row['I'],
					'goldar'			=>	$row['J'],
					'nama_ayah'			=>	$row['K'],
					'nama_ibu'			=>	$row['L'],
					'pekerjaan_ayah'	=>	$row['M'],
					'pekerjaan_ibu'		=>	$row['N'],
					'kontak'			=>	$row['O']
					);
	$kueri[] = array( 
					'nis'				=>	$row['A'],
					'Name'				=>	$row['K'],					
					'Number'			=>	$row['P']
					);
}

$numrow++; // Tambah 1 setiap kali looping
}

// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
$this->mod_siswa->insert_multiple($data, $kueri);

redirect("Siswa"); // Redirect ke halaman awal (ke controller siswa fungsi index)
}
	
}
 