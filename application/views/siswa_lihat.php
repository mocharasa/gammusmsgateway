      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Siswa
            <small>Database SMA PGRI 1 Purwakarta</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">

	<div class="box">                    
        <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">Nama Siswa</th>
                        <th style="text-align: center">NIS</th>
                        <th style="text-align: center" colspan=2>Tempat, Tanggal Lahir</th>                        
                        <th style="text-align: center">Jenis Kelamin</th>
						<th style="text-align: center">Alamat</th> 
						<th style="text-align: center"></th>
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
                                <td><?php echo $query->nama; ?></td>
								<td style="text-align: center"><?php echo $query->nis; ?></td>
								<td style="text-align: center"><?php echo $query->tempat_lahir; ?></td>
								<td style="text-align: center"><?php echo $query->tgl_lahir; ?></td>
								<td style="text-align: center"><?php echo $query->jk; ?></td>
								<td><?php echo $query->alamat; ?></td>								
                                <td style="text-align: center">
								<div class="btn-group">
                                  <a href="<?php echo base_url()?>siswa/view/<?php echo $query->nis;?>" data-toggle="tooltip" title="Lihat Detail Siswa"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-external-link"></i></button></a>                                  
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