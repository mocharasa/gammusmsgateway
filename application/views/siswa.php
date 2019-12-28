      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Siswa
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
        <div class="box-header">
            <a href="<?php echo base_url()?>siswa/tambah" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>Tambah Data</a>
			<a href="<?php echo base_url()?>siswa/form" class="btn btn-success"><i class="fa fa-fw fa-upload"></i>Import Data</a>

	   </div><!-- /.box-header -->
        <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">NIS</th>
                        <th style="text-align: center">Nama Siswa</th>
						<th style="text-align: center">Kelas</th>
                        <th style="text-align: center" colspan=2>Tempat, Tanggal Lahir</th>                        
                        <th style="text-align: center">Jenis Kelamin</th>
						<th style="text-align: center">Alamat</th>                                               
                        <th style="text-align: center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $i = "0";
                      foreach($post as $query){
                      $i++;
                    ?>
                            <tr>
                                <td style="text-align: center"><?php echo $i; ?></td>                                
								<td style="text-align: center"><?php echo $query->nis; ?></td>
								<td><?php echo $query->nama; ?></td>
								<td style="text-align: center"><?php echo $query->kelas; ?></td>
								<td style="text-align: center"><?php echo $query->tempat_lahir; ?></td>
								<td style="text-align: center"><?php echo $query->tgl_lahir; ?></td>
								<td style="text-align: center"><?php echo $query->jk; ?></td>
								<td><?php echo $query->alamat; ?></td>								
                                <td style="text-align: center">
								<div class="btn-group">
                                  <a href="<?php echo base_url()?>siswa/view/<?php echo $query->nis;?>" data-toggle="tooltip" title="Lihat Detail Siswa"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-external-link"></i></button></a>
                                  <a href="<?php echo base_url()?>siswa/edit/<?php echo $query->nis;?>" data-toggle="tooltip" title="Edit Siswa"><button type="button" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i></button></a>                                 
								  <a href="<?php echo base_url()?>siswa/hapus/<?php echo $query->nis;?>" data-toggle="tooltip" title="Hapus Siswa" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"><button type="button" class="btn btn-danger" ><i class="fa fa-fw fa-trash"></i></button></a>
                                </div>								
                               </td>
                            </tr>
                      <?php   }  ?>
                    </tbody>
        </table>
        </div>
    </div>
	</div>

	<!-- page script -->
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