<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">                  
        </section>

        <!-- Main content -->
        <section class="content">	              
		<div class="row">
			<!-- Widget Siswa -->
			<div class="col-lg-4 col-xs-6">
			<div class="small-box bg-aqua">
			  <div class="inner">
				<h3><?php echo $jml_siswa; ?></h3>
				<p>Jumlah Siswa</p>
			  </div>
			  <div class="icon">
				<i class="ion ion-ios-contact"></i>
			  </div>
			  <a class="small-box-footer">&nbsp; </a>
			</div>
			</div>
			<!-- Widget Transaksi -->
			<div class="col-lg-4 col-xs-6">
			<div class="small-box bg-aqua">
			  <div class="inner">
				<h3><?php echo $jml_transaksi; ?></h3>
				<p>Jumlah Transaksi Bulan Ini</p>
			  </div>
			  <div class="icon">
				<i class="ion ion-ios-briefcase"></i>
			  </div>
			  <a class="small-box-footer">&nbsp; </a>
			</div>
			</div>
			<!-- Widget Inbox -->
			<div class="col-lg-4 col-xs-6">
			<div class="small-box bg-aqua">
			  <div class="inner">
				<h3><?php echo $jml_pesan; ?></h3>
				<p>Jumlah Pesan Masuk</p>
			  </div>
			  <div class="icon">
				<i class="ion ion-ios-folder"></i>
			  </div>
			  <a class="small-box-footer">&nbsp; </a>
			</div>
			</div>
		</div>		
		
		<div class="row">
		<!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab"><strong>SMS Autoreply</strong></a></li>              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane">
                <!-- Post -->
                <div class="post">                 
                  <p>
                    Untuk Format Cek Status SPP Menggunakan SMS Autoreply : <br><br>
					<b>BULAN#TAHUN-AJARAN#NIS</b> <br><br>
					Contoh : <br>
					<b>Januari#2017-2018#11223344</b>
                  </p>
                  
                </div>
                <!-- /.post -->
                
              </div>
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
		</div>
		
		</section>
	</div>