      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Akun Admin
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
            <form class="form-horizontal" action="<?php echo base_url('index.php/profil/insert');?>" method="post">
            <div class="box-body">
                
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
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
                <button type="submit" class="btn btn-info pull-right">Tambah</button>
              </div>
              <!-- /.box-footer -->
            </div>
			</form>    
			
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	<script>
	  $(function () {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Datemask dd/mm/yyyy
		$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
		//Datemask2 mm/dd/yyyy
		$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
		//Money Euro
		$('[data-mask]').inputmask()

		//Date range picker
		$('#reservation').daterangepicker()
		//Date range picker with time picker
		$('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
		//Date range as a button
		$('#daterange-btn').daterangepicker(
		  {
			ranges   : {
			  'Today'       : [moment(), moment()],
			  'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			  'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
			  'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			  'This Month'  : [moment().startOf('month'), moment().endOf('month')],
			  'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
			startDate: moment().subtract(29, 'days'),
			endDate  : moment()
		  },
		  function (start, end) {
			$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
		  }
		)

		//Date picker
		$('#datepicker').datepicker({
		  autoclose: true
		})

		//iCheck for checkbox and radio inputs
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		  checkboxClass: 'icheckbox_minimal-blue',
		  radioClass   : 'iradio_minimal-blue'
		})
		//Red color scheme for iCheck
		$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
		  checkboxClass: 'icheckbox_minimal-red',
		  radioClass   : 'iradio_minimal-red'
		})
		//Flat red color scheme for iCheck
		$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		  checkboxClass: 'icheckbox_flat-green',
		  radioClass   : 'iradio_flat-green'
		})

		//Colorpicker
		$('.my-colorpicker1').colorpicker()
		//color picker with addon
		$('.my-colorpicker2').colorpicker()

		//Timepicker
		$('.timepicker').timepicker({
		  showInputs: false
		})
	  })
	</script>