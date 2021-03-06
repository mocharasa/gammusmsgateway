    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Penarikan Tabungan Siswa
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
            <h4><strong>Form Penarikan</strong></h4>
        </div><!-- /.box-header -->
        <div class="box-body">
       <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url('tabungan/insert');?>" method="post">
            <div class="box-body">
                
				<div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly />
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">NIS</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nis" id="nis" required />
                  </div>
                </div>	
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" id="nama" required />
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
                  <label class="col-sm-2 control-label">Jumlah Penarikan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="penarikan" required />
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

	<script type="text/javascript">
		$(document).ready(function(){

		    $('#nis').autocomplete({
                source: "<?php echo site_url('tabungan/get_autocomplete');?>",
     
                select: function (event, ui) {
                    $('[name="nis"]').val(ui.item.label); 
                    $('[name="nama"]').val(ui.item.description); 
                }
            });

		});
	</script>
