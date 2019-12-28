<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Detail Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard/index');?>dashboard/index"><i class="fa fa-dashboard"></i> Admin</a></li>        
        <li class="active"><?php echo $title; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
        <?php if ( $this->session->flashdata('sukses') ):?>
          <div class="alert bg-green">
            <button class="close" data-dismiss="alert" type="button"><i class="fa fa-close"></i></button><?php echo $this->session->flashdata('sukses');?>
          </div>
        <?php elseif ( $this->session->flashdata('error') ): ?>
          <div class="alert bg-red">
            <button class="close" data-dismiss="alert" type="button"><i class="fa fa-close"></i></button><?php echo $this->session->flashdata('error');?>
          </div>
        <?php endif; ?>
        
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <center>			
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>assets/backend/img/avatar5.png" alt="User profile picture">
              </center>
              <h3 class="profile-username text-center"><?php //echo $post[''];?></h3>

              <p class="text-muted text-center">
				<?php //echo $post[''];?><br><?php //echo $post[''];?>
			  </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><center><?php echo $post['nama'];?></center></b> 
                </li>
                <li class="list-group-item">
                  <b><center><?php echo $post['nis'];?></center></b> 
                </li>               
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->         
        </div>
        <!-- /.col -->
     
	 
	 
	 <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#siswa" data-toggle="tab">Profil Siswa</a></li>
              <li><a href="#ortu" data-toggle="tab">Data Orang Tua / Wali</a></li>              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="siswa">
                <!-- Post -->
                <div class="post">
                <!-- The Profile View -->
                <div class="form-horizontal">                                    
                  <div class="form-group">
                    <label class="col-sm-2">NIS</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['nis'];?>
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2">Nama</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['nama'];?>
                    </div>
                  </div>				  
				  <div class="form-group">
                    <label class="col-sm-2">Kelas</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['kelas'];?>
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2">Jurusan</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['jurusan'];?>
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2">Tempat Lahir</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['tempat_lahir'];?>
                    </div>
                  </div> 
				  <div class="form-group">
                    <label class="col-sm-2">Tanggal Lahir</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['tgl_lahir'];?>
                    </div>
                  </div> 
				  <div class="form-group">
                    <label class="col-sm-2">Jenis Kelamin</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['jk'];?>
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2">Agama</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['agama'];?>
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2">Golongan Darah</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['goldar'];?>
                    </div>
                  </div>
				   <div class="form-group">
                    <label class="col-sm-2">Nomor Telepon</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['kontak'];?>
                    </div>
                  </div> 
				  <div class="form-group">
                    <label class="col-sm-2">Alamat</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['alamat'];?>
                    </div>
                  </div> 
                  <hr>				  
                </div>                                             
                </div>
                <!-- /.post -->				
              </div>
              <!-- /.tab-pane -->
			  
              <div class="tab-pane" id="ortu">
                
				<!-- The Profile View -->
                <div class="form-horizontal">                                    
                  <div class="form-group">
                    <label class="col-sm-2">Nama Ayah / Wali</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $query['Name'];?>
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2">Nama Ibu</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['nama_ibu'];?>
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2">Pekerjaan Ayah</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['pekerjaan_ayah'];?>
                    </div>
                  </div> 
				  <div class="form-group">
                    <label class="col-sm-2">Pekerjaan Ibu</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $post['pekerjaan_ibu'];?>
                    </div>
                  </div> 
				  <div class="form-group">
                    <label class="col-sm-2">Nomor Telepon</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $query['Number'];?>
                    </div>
                  </div>				  
                  <hr>				  
                </div>              
			  </div>
              <!-- /.tab-pane -->
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
	 
	 
	 
	 
	 
	 
	 
	 
	 
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->