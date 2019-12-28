      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tulis Pesan Baru
            <small>Database SMA PGRI 1 Purwakarta</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard/index');?> "><i class="fa fa-dashboard"></i> Admin</a></li>            
            <li class="active"><?php echo $title; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

		 <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Silahkan isi form untuk mengirim pesan</h3>
            </div>
            <!-- /.box-header -->              
			<!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url('index.php/pesan/kirim');?>" method="post">
            <div class="box-body">
				<div class="form-group">
                  <label class="col-sm-2 control-label">NIS</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS Siswa" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Tujuan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="DestinationNumber" name="DestinationNumber" placeholder="Masukkan Nomor Tujuan" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Isi Pesan</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="status" placeholder="Max Characters 160" name="TextDecoded" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"></textarea>
					<span id="text_counter"></span>
                  </div>
                </div>				
					
              <!-- /.box-body -->
              <div class="box-footer">
			  <br/>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-info pull-right">Kirim</button>
              </div>
              <!-- /.box-footer -->
            </div>
			</form>    
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	<script type="text/javascript">
		$(document).ready(function(){
			var left = 160
			$('#text_counter').text('Characters left: ' + left);
		 
				$('#status').keyup(function () {
		 
				left = 160 - $(this).val().length;
		 
				if(left < 0){
					$('#text_counter').addClass("overlimit");
					 $('#posting').attr("disabled", true);
				}else{
					$('#text_counter').removeClass("overlimit");
					$('#posting').attr("disabled", false);
				}
		 
				$('#text_counter').text('Characters left: ' + left);
			});
		});
	</script>
	
	<script type="text/javascript">
		$(document).ready(function(){

		    $('#nis').autocomplete({
                source: "<?php echo site_url('pesan/get_nomor');?>",
     
                select: function (event, ui) {
                    $('[name="nis"]').val(ui.item.label); 
                    $('[name="DestinationNumber"]').val(ui.item.description); 
                }
            });

		});
	</script>