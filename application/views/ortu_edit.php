      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Data Orang Tua Siswa
            <small>Database SMA PGRI 1 Purwakarta</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?> "><i class="fa fa-dashboard"></i> Admin</a></li>
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
            <?php echo form_open($action, array('role'=>'form', 'class'=>'form-horizontal')); ?>
			
			<?php  
				foreach ($post as $data):
			?>
			
				<div class="box-body">
				<div class="form-group">
                  <label class="col-sm-2 control-label">NIS</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nis" value="<?php echo $data->nis;?>" readonly />
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nama Orang Tua / Wali</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="Name" value="<?php echo $data->Name;?>" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="Number" value="<?php echo $data->Number;?>" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
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
			<?php endforeach ?>
			<?php echo form_close(); ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
