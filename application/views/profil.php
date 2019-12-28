<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Akun
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
      
<div class="box">            
        <div class="box-header">
            <a href="<?php echo base_url()?>profil/tambah" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>Tambah Data</a>
        </div><!-- /.box-header -->
        <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">Nama</th>
                        <th style="text-align: center">Username</th>                                              
                        <th style="text-align: center">Status</th>
						<th style="text-align: center">Level</th>                                               
                        <th style="text-align: center">Aksi</th>
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
								<td style="text-align: center"><?php echo $query->username; ?></td>
								<td style="text-align: center"><?php echo $query->status; ?></td>
								<td style="text-align: center"><?php echo $query->level; ?></td>								
                                <td style="text-align: center">
								<div class="btn-group">                                  
                                  <a href="<?php echo base_url()?>profil/edit/<?php echo $query->id;?>" data-toggle="tooltip" title="Edit Akun"><button type="button" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i></button></a>                                 
								  <a href="<?php echo base_url()?>profil/hapus/<?php echo $query->id;?>" data-toggle="tooltip" title="Hapus Akun" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"><button type="button" class="btn btn-danger" ><i class="fa fa-fw fa-trash"></i></button></a>
                                </div>								
                               </td>
                            </tr>
                      <?php   }  ?>
                    </tbody>
        </table>
        </div>
    </div>		 

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->