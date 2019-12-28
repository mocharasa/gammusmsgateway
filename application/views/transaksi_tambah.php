      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Transaksi Pembayaran
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
            <br/>
        </div><!-- /.box-header -->
        <div class="box-body">
       <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url('transaksi/insert');?>" method="post">
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">NIS</label>
                  <div class="col-sm-9">
					<input type="text" name="nis" class="form-control" id="nis" placeholder="Masukkan NIS" />		
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
					    <input type="text" id="nama" class="form-control" name="nama" required />										
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
                  <label class="col-sm-2 control-label">Tanggal Transaksi</label>
                  <div class="col-sm-9">
						<input type="text" class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly />
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Bulan</label>
                  <div class="col-sm-9">
                    <select class="form-control select" name="id_bulan">
                        <?php  
							$bulan = $this->db->query("SELECT * FROM bulan")->result();
							foreach ($bulan as $data) {
							echo "<option value='$data->id_bulan'>".ucwords($data->bulan)."</option>"; 
							}
						?>
                    </select>
                  </div>
                </div>	
				<div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Pembayaran</label>
                  <div class="col-sm-9">
                    <select class="form-control select" name="jenis">
						<option value="SPP">SPP</option>
						<option value="OSIS">OSIS</option>
						<option value="Tabungan">Tabungan</option>                        
                    </select>
                  </div>
                </div>	
				<div class="form-group">
                  <label class="col-sm-2 control-label">Jumlah Bayar</label>
                  <div class="col-sm-9">
                    <input type="text" placeholder="Masukkan nominal tanpa titik/koma" class="form-control" name="jml_bayar" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>				
					
              <!-- /.box-body -->
              <div class="box-footer">
			  <br/>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Bayar</button>
              </div>
              <!-- /.box-footer -->
            </div>
			</form>    
        </div>
    </div>
	</div>
	<!--
	<script src="<?php //echo base_url();?>assets/backend/jQuery/jquery-3.1.1.min.js"></script>
	<script src="<?php //echo base_url();?>assets/backend/js/bootstrap.min.js" type="text/javascript"></script>	
	-->
	
	<script type="text/javascript">
		$(document).ready(function(){

		    $('#nis').autocomplete({
                source: "<?php echo site_url('transaksi/get_autocomplete');?>",
     
                select: function (event, ui) {
                    $('[name="nis"]').val(ui.item.label); 
                    $('[name="nama"]').val(ui.item.description); 
                }
            });

		});
	</script>
	
	<script type="text/javascript">
		$(document).ready(function(){

		    $('#id_ta').autocomplete({
                source: "<?php echo site_url('transaksi/get_nominal');?>",
     
                select: function (event, ui) {
                    $('[name="id_ta"]').val(ui.item.label); 
                    $('[name="nominal"]').val(ui.item.description); 
                }
            });

		});
	</script>