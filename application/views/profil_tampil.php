<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil Admin
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
                  <b><center><?php echo $this->session->userdata['ses_nama'];?></center></b> 
                </li>
                <li class="list-group-item">
                  <b><center><?php echo $this->session->userdata['ses_status'];?></center></b> 
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
              <li class="active"><a href="#profil" data-toggle="tab">Profil</a></li>
              <li><a href="#edit" data-toggle="tab">Edit</a></li>              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="profil">
                <!-- Post -->
                <div class="post">
                <!-- The Profile View -->
                <div class="form-horizontal">                                    
                  <div class="form-group">
                    <label class="col-sm-2">Nama</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $this->session->userdata['ses_nama'];?>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="col-sm-2">Username</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $this->session->userdata['ses_user'];?>
                    </div>
                  </div> 
				  <div class="form-group">
                    <label class="col-sm-2">Status</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <?php echo $this->session->userdata['ses_status'];?>
                    </div>
                  </div> 
                  <hr>				  
                </div>                                             
                </div>
                <!-- /.post -->				
              </div>
              <!-- /.tab-pane -->
			  
              <div class="tab-pane" id="edit">
                <?php echo form_open($action, array('role'=>'form', 'class'=>'form-horizontal')); ?>
				<!-- The Profile View -->
                <div class="form-horizontal">                                    
                  <div class="form-group">
                    <label class="col-sm-2">Nama </label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nama" />
                    </div>
                  </div>				  
				  <div class="form-group">
                    <label class="col-sm-2">Username</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="username" />
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2">Password Lama</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="password" />
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2">Password Baru</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="passwordbaru" />
                    </div>
                  </div>            
				  <div class="box-footer">
				  <br/>					
					<button type="submit" class="btn btn-info pull-right">Simpan</button>
				  </div>
                </div> 
				<?php echo form_close(); ?>
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