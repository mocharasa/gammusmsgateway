      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Keuangan SPP Sekolah
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
            <a href="<?php echo base_url('kas/keluar');?>" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>Tambah Pengeluaran</a>
        </div><!-- /.box-header -->
        <div class="box-body">
        <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">Tanggal</th>
                        <th style="text-align: center">Anggaran Masuk</th>                                                                 
                        <th style="text-align: center">Anggaran Keluar</th>
						<th style="text-align: center">Kategori</th>
						<th style="text-align: center">Keperluan</th>
						<th style="text-align: center">Total Kas SPP</th>
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
								<td style="text-align: center"><?php echo $query->tgl; ?></td>
								<td style="text-align: center"><?php echo number_format($query->anggaran_masuk); ?></td>														
								<td style="text-align: center"><?php echo number_format($query->anggaran_keluar); ?></td>
								<td><?php echo $query->kategori; ?></td>
								<td><?php echo $query->keperluan; ?></td>
								<td style="text-align: center">Rp.<?php echo number_format($query->total_kas); ?></td>                                
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