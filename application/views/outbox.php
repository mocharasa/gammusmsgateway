      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kotak Keluar Pesan
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
        <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">Nomor Tujuan</th>
                        <th style="text-align: center">Isi Pesan</th>                                                                 
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
								<td style="text-align: center"><?php echo $query->DestinationNumber; ?></td>
								<td><?php echo $query->TextDecoded; ?></td>														
                                <td style="text-align: center">
								<div class="btn-group">                                                                   
								  <a href="<?php echo base_url()?>pesan/outboxhapus/<?php echo $query->ID;?>" data-toggle="tooltip" title="Hapus Pesan" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"><button type="button" class="btn btn-danger" ><i class="fa fa-fw fa-trash"></i></button></a>
                                </div>								
                               </td>
                            </tr>
                      <?php   }  ?>
                    </tbody>
        </table>
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
