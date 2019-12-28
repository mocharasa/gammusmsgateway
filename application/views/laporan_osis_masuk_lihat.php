    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
		  <?php
			
		  ?>
            Laporan Pemasukan Keuangan OSIS Periode <?php echo $periode; ?>
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
                        <th style="text-align: center">NIS</th>
                        <th style="text-align: center">Nama Siswa</th>
                        <th style="text-align: center">Tanggal</th>                        
						<th style="text-align: center">Wajib Bayar</th>                        
						<th style="text-align: center">Telah Bayar</th>                        
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
								<td style="text-align: center"><?php echo $query->tanggal; ?></td>
								<td><?php echo 'Rp.'.number_format($query->nominal_osis).''; ?></td>
								<td><?php echo 'Rp.'.number_format($query->bayar).''; ?></td>								
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