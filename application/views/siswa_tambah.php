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
            <form class="form-horizontal" action="<?php echo base_url('index.php/siswa/insert');?>" method="post">
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">NIS</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nis" placeholder="Masukkan NIS Siswa" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Siswa" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="kelas" placeholder="Masukkan Kelas" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Jurusan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="jurusan" placeholder="Masukkan Jurusan" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-9">					
					<!-- Date -->        
					<div class="input-group date">
					  <div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					  </div>
					  <input type="date" class="form-control pull-right" name="tgl_lahir" id="datepicker" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')" placeholder="tahun/bulan/hari" />
					</div>
					<!-- /.input group -->          				 
				  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <select class="form-control select" name="jk">
                        <option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>						
                    </select>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/></textarea>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="agama" placeholder="Islam/Katolik/Protestan/Hindu/Budha/Konghucu" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Golongan Darah</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="goldar" placeholder="Masukkan Golongan Darah Siswa Bila Ada" />
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nama Ayah / Wali</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_ayah" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nama Ibu</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_ibu" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Pekerjaan Ayah</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="pekerjaan_ayah" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Pekerjaan Ibu</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="pekerjaan_ibu" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="kontak" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Kontak Orang Tua</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="number" required oninvalid="this.setCustomValidity('Silahkan isi form data')" oninput="setCustomValidity('')"/>
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