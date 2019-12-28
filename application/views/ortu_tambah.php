      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Data Orang Tua Siswa
            <small>Database SMA PGRI 1 Purwakarta</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard/index');?> "><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?php echo base_url('ortu');?> ">Data Orang Tua Siswa</a></li>
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

		 <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Silahkan isi form dibawah ini dengan benar</h3>
            </div>
            <!-- /.box-header -->              
			<!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url('index.php/ortu/insert');?>" method="post">
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">NIS</label>
                  <div class="col-sm-9">
                    <select class="form-control select" name="nis">
                        <?php  
							$sql = $this->db->query("SELECT * FROM siswa")->result();
							foreach ($sql as $data) {
							echo "<option value='$data->nis'>".$data->nis."</option>"; 
							}
						?>
                    </select>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nama Orang Tua</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" required />
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="number" required />
                  </div>
                </div>
								
              <!-- /.box-body -->
              <div class="box-footer">
			  <br/>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Tambah</button>
              </div>
              <!-- /.box-footer -->
            </div>
			</form>    
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
