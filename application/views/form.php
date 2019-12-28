 
<script>
$(document).ready(function(){
// Sembunyikan alert validasi kosong
$("#kosong").hide();
});
</script>







    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Import
            <small>Database SMA PGRI 1 Purwakarta</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard/index');?> "><i class="fa fa-dashboard"></i> Admin</a></li>            
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

	<div class="box">            
		<div class="box-body">
		
		<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
		<form method="post" action="<?php echo base_url("index.php/Siswa/form"); ?>" enctype="multipart/form-data">
		<div class="form-group">
		<div class="col-md-4">
        <div class="input-group">
            <input type="file" class="btn btn-default" name="file">
            <span class="input-group-btn">
                <input type="submit" name="preview" value="Preview" class="btn btn-info">
            </span>
        </div>        
		</div>
		</div>
		<br/>
		<hr/>
		</form>
		 
		<?php
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
		if(isset($upload_error)){ // Jika proses upload gagal
		echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
		die; // stop skrip
		}
		 
		// Buat sebuah tag form untuk proses import data ke database
		echo "<form method='post' action='".base_url("index.php/Siswa/import")."'>";
		 
		// Buat sebuah div untuk alert validasi kosong
		echo "<div style='color: red;' id='kosong'>
		Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		</div>";
		 
		echo "<table id='example2' class='table table-bordered table-striped'>
		<tr>
		<th colspan='15'><center>Preview Data</center></th>
		</tr>
		<tr>
		<th>NIS</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Jurusan</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<th>Agama</th>
		<th>Goldar</th>
		<th>Nama Ayah</th>
		<th>Nama Ibu</th>
		<th>Pekerjaan Ayah</th>
		<th>Pekerjaan Ibu</th>
		<th>Kontak Siswa</th>
		<th>Kontak Ortu</th>
		</tr>";
		 
		$numrow = 1;
		$kosong = 0;
		 
		// Lakukan perulangan dari data yang ada di excel
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 
		// Ambil data pada excel sesuai Kolom
		$nis 			= $row['A']; // Ambil data NIS
		$nama 			= $row['B']; // Ambil data nama
		$kelas 			= $row['C'];
		$jurusan		= $row['D'];
		$tempat_lahir	= $row['E'];
		$tgl_lahir 		= $row['F'];
		$jk 			= $row['G']; // Ambil data jenis kelamin
		$alamat 		= $row['H']; // Ambil data alamat
		$agama 			= $row['I'];
		$goldar 		= $row['J'];
		$nama_ayah 		= $row['K'];
		$nama_ibu 		= $row['L'];
		$pekerjaan_ayah = $row['M'];
		$pekerjaan_ibu	= $row['N'];
		$kontak 		= $row['O'];
		$number 		= $row['P'];
		 
		// Cek jika semua data tidak diisi
		if(empty($nis) && empty($nama) && empty($tempat_lahir) && empty($tgl_lahir) && empty($jk) && empty($alamat) && empty($agama) && empty($goldar) && empty($nama_ayah) && empty($nama_ibu) && empty($pekerjaan_ayah) && empty($pekerjaan_ibu) && empty($kontak))
		continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
		 
		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
		// Validasi apakah semua data telah diisi
		$nis_td 			= ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
		$nama_td 			= ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
		$kelas_td 			= ( ! empty($kelas))? "" : " style='background: #E07171;'";
		$jurusan_td			= ( ! empty($jurusan))? "" : " style='background: #E07171;'";
		$tempat_td 			= ( ! empty($tempat_lahir))? "" : " style='background: #E07171;'";
		$tgl_td 			= ( ! empty($tgl_lahir))? "" : " style='background: #E07171;'";
		$jk_td 				= ( ! empty($jk))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
		$alamat_td 			= ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
		$agama_td 			= ( ! empty($agama))? "" : " style='background: #E07171;'";
		$goldar_td 			= ( ! empty($goldar))? "" : " style='background: #E07171;'";
		$nama_ayah_td 		= ( ! empty($nama_ayah))? "" : " style='background: #E07171;'";
		$nama_ibu_td 		= ( ! empty($nama_ibu))? "" : " style='background: #E07171;'";
		$pekerjaan_ayah_td 	= ( ! empty($pekerjaan_ayah))? "" : " style='background: #E07171;'";
		$pekerjaan_ibu_td 	= ( ! empty($pekerjaan_ibu))? "" : " style='background: #E07171;'";
		$kontak_td 			= ( ! empty($kontak))? "" : " style='background: #E07171;'";
		$number_td 			= ( ! empty($number))? "" : " style='background: #E07171;'";
		 
		// Jika salah satu data ada yang kosong
		if(empty($nis) OR empty($nama) OR empty($tempat_lahir) OR empty($tgl_lahir) OR empty($jk) OR empty($alamat) OR empty($agama) OR empty($goldar) OR empty($nama_ayah) OR empty($nama_ibu) OR empty($pekerjaan_ayah) OR empty($pekerjaan_ibu) OR empty($kontak)){
		$kosong++; // Tambah 1 variabel $kosong
		}
		 
		echo "<tr>";
		echo "<td".$nis_td.">".$nis."</td>";
		echo "<td".$nama_td.">".$nama."</td>";
		echo "<td".$kelas_td.">".$kelas."</td>";
		echo "<td".$jurusan_td.">".$jurusan."</td>";
		echo "<td".$tempat_td.">".$tempat_lahir."</td>";
		echo "<td".$tgl_td.">".$tgl_lahir."</td>";
		echo "<td".$jk_td.">".$jk."</td>";
		echo "<td".$alamat_td.">".$alamat."</td>";
		echo "<td".$agama_td.">".$agama."</td>";
		echo "<td".$goldar_td.">".$goldar."</td>";
		echo "<td".$nama_ayah_td.">".$nama_ayah."</td>";
		echo "<td".$nama_ibu_td.">".$nama_ibu."</td>";
		echo "<td".$pekerjaan_ayah_td.">".$pekerjaan_ayah."</td>";
		echo "<td".$pekerjaan_ibu_td.">".$pekerjaan_ibu."</td>";
		echo "<td".$kontak_td.">".$kontak."</td>";
		echo "<td".$number_td.">".$number."</td>";
		echo "</tr>";
		}
		 
		$numrow++; // Tambah 1 setiap kali looping
		}
		 
		echo "</table>";
		 
		// Cek apakah variabel kosong lebih dari 1
		// Jika lebih dari 1, berarti ada data yang masih kosong
		if($kosong > 1){
		?> 
		<script>
		$(document).ready(function(){
		// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
		$("#jumlah_kosong").html('<?php echo $kosong; ?>');
		 
		$("#kosong").show(); // Munculkan alert validasi kosong
		});
		</script>
		<?php
		}else{ // Jika semua data sudah diisi
		echo "<hr>";
		 
		// Buat sebuah tombol untuk mengimport data ke database
		echo "<button class='btn btn-success pull-right' type='submit' name='import'>Import</button>";	
		echo "<a class='btn btn-danger pull-left' href='".base_url("index.php/Siswa")."'>Cancel</a>";
		}
		 
		echo "</form>";
		}
		?>

				
		</div>
    </div>
	</div>
	
	<script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>	
	