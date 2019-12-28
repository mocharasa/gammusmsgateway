      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Kategori Pengeluaran
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
            <a href="<?php echo base_url()?>kategori/tambah" class="btn btn-info"><i class="fa fa-fw fa-plus"></i>Tambah Data</a>
        </div><!-- /.box-header -->
        <div class="box-body">
        <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">Kategori</th>
                        <th style="text-align: center">Keterangan</th>                                                                 						
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
								<td style="text-align: center"><?php echo $query->kategori; ?></td>
								<td style="text-align: center"><?php echo $query->keterangan; ?></td>																						
                                <td style="text-align: center">
								<div class="btn-group">                                 
                                  <a href="<?php echo base_url()?>kategori/edit/<?php echo $query->id_kategori;?>" data-toggle="tooltip" title="Edit"><button type="button" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i></button></a>                                 
								  <a href="<?php echo base_url()?>kategori/hapus/<?php echo $query->id_kategori;?>" data-toggle="tooltip" title="Hapus" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"><button type="button" class="btn btn-danger" ><i class="fa fa-fw fa-trash"></i></button></a>
                                </div>								
                               </td>
                            </tr>
                      <?php   }  ?>
                    </tbody>
        </table>
        </div>
    </div>
	</div>
