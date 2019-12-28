      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Data Siswa
            <small>Database SMA PGRI 1 Purwakarta</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard/index');?> "><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="<?php echo base_url('siswa');?> ">Siswa</a></li>
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
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" value="<?php echo $data->nama;?>" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="kelas" value="<?php echo $data->kelas;?>" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Jurusan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="jurusan" value="<?php echo $data->jurusan;?>" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data->tempat_lahir;?>" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $data->tgl_lahir;?>" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <select class="form-control select" name="jk" required>
                        <option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>						
                    </select>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="alamat" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/><?php echo $data->alamat;?></textarea>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="agama" value="<?php echo $data->agama;?>" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Golongan Darah</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="goldar" value="<?php echo $data->goldar;?>" />
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nama Ayah / Wali</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_ayah" value="<?php echo $data->nama_ayah;?>" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nama Ibu</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_ibu" value="<?php echo $data->nama_ibu;?>" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Pekerjaan Ayah</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="pekerjaan_ayah" value="<?php echo $data->pekerjaan_ayah;?>" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Pekerjaan Ibu</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="pekerjaan_ibu" value="<?php echo $data->pekerjaan_ibu;?>"required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="kontak" value="<?php echo $data->kontak;?>"required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
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
