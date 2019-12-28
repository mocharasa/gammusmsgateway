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
            <h4><strong>Pengeluaran Kas SPP Sekolah</strong></h4>
        </div><!-- /.box-header -->
        <div class="box-body">
       <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url('kas/insert');?>" method="post">
            <div class="box-body">
                
				<div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly />
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Tahun Ajaran</label>
                  <div class="col-sm-9">					
					<select class="form-control select" name="id_ta" id="id_ta">
                        <?php  
							$tahun_ajaran = $this->db->query("SELECT * FROM tahun_ajaran")->result();
							foreach ($tahun_ajaran as $data) {
							echo "<option value='$data->id_ta'>".ucwords($data->tahun_ajaran)."</option>"; 
							}
						?>
                    </select>					
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-9">					
					<select class="form-control select" name="id_kategori" id="id_kategori">
                        <?php  
							$kategori = $this->db->query("SELECT * FROM kategori")->result();
							foreach ($kategori as $key) {
							echo "<option value='$key->id_kategori'>".ucwords($key->kategori)."</option>"; 
							}
						?>
                    </select>					
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Keperluan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="keperluan" required />
                  </div>
                </div>		
				<div class="form-group">
                  <label class="col-sm-2 control-label">Anggaran Keluar</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="anggaran_keluar" required />
                  </div>
                </div>				
					
              <!-- /.box-body -->
              <div class="box-footer">
			  <br/>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </div>
			</form>    
        </div>
    </div>
	</div>


