      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Akun Admin
            <small>Database SMA PGRI 1 Purwakarta</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard/index');?> "><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?php echo base_url('profil');?> ">Manajemen Akun</a></li>
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
			<?php echo form_open($action, array('role'=>'form', 'class'=>'form-horizontal')); ?>
			<?php  
				foreach ($post as $data):
			?>
            <!-- form start -->            
            <div class="box-body">
                
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" value="<?php echo $data->nama;?>" class="form-control" name="nama" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" value="<?php echo $data->username;?>" class="form-control" name="username" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" value="<?php echo $data->password;?>" class="form-control" name="password" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-9">
                    <select class="form-control select" name="status">
                        <option value="Tata Usaha">Tata Usaha</option>
						<option value="Kepala Sekolah">Kepala Sekolah</option>						
                    </select>
                  </div>
                </div>				
              <!-- /.box-body -->
              <div class="box-footer">
			  <br/>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </div>
		   
			<?php endforeach; ?>
			<?php echo form_close(); ?>
			
		</div>	
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		  