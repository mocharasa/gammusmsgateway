      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Penarikan Tabungan
            <small>Database SMA PGRI 1 Purwakarta</small>
          </h1>          
        </section>

        <!-- Main content -->
        <section class="content">

		 <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Silahkan pilih periode tahun ajaran</h3>
            </div>
            <!-- /.box-header -->              
			<!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url('laporan_tabungan/keluar_lihat');?>" method="post">
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tahun Ajaran</label>
                  <div class="col-sm-9">
                    <select class="form-control select" name="id_ta" required oninvalid="this.setCustomValidity('Silahkan pilih data')" oninput="setCustomValidity('')">
                        <?php  
							$sql = $this->db->query("SELECT * FROM tahun_ajaran")->result();
							foreach ($sql as $data) {
							echo "<option value='$data->id_ta'>".ucwords($data->tahun_ajaran)."</option>"; 
							}
						?>
                    </select>
                  </div>
                </div>
									
              <!-- /.box-body -->
              <div class="box-footer">
			 <br/> 
				<div class="pull-right">
                <input value="Print" name="print" type="submit" class="btn btn-info" />
				<input value="Lihat" name="lihat" type="submit" class="btn btn-info" />
				<div class="pull-right">
              </div>
              <!-- /.box-footer -->
            </div>
			</form>    
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
