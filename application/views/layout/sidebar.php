<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">         
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">            
          <!--Akses Petugas TU-->
		  <?php if($this->session->userdata('akses')=='1'):?>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-briefcase"></i>
				<span>Data Master</span>	
				
			  </a>
			  <ul class="treeview-menu">
				<li><a href="<?php echo base_url('tahunajaran');?> "><i class='fa fa-mortar-board'></i> <span>Tahun Ajaran</span></a></li>
				<li><a href="<?php echo base_url('kategori');?> "><i class='fa fa-folder'></i> <span>Kategori</span></a></li>
				<li><a href="<?php echo base_url('siswa');?> "><i class='fa fa-users'></i> <span>Siswa</span></a></li>
				<li><a href="<?php echo base_url('ortu');?> "><i class='fa fa-book'></i> <span>Kontak Orang Tua</span></a></li>
			  </ul>
			</li>
			
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-briefcase"></i>
				<span>Data Transaksi</span>					
			  </a>
			  <ul class="treeview-menu">
				<li><a href="<?php echo base_url('transaksi');?>"><i class='fa fa-money'></i> <span>Pembayaran</span></a></li>
				<li><a href="<?php echo base_url('kas');?>"><i class='fa fa-bank'></i> <span>Kas Sekolah</span></a></li>
				<li><a href="<?php echo base_url('kas_osis');?>"><i class='fa fa-bank'></i> <span>Kas OSIS</span></a></li>
				<li><a href="<?php echo base_url('tabungan');?>"><i class='fa fa-money'></i> <span>Tabungan Siswa</span></a></li>
				<li><a href="<?php echo base_url('spp');?>"><i class='fa fa-user'></i> <span>SPP Siswa</span></a></li>			
				<li><a href="<?php echo base_url('osis');?>"><i class='fa fa-user'></i> <span>OSIS</span></a></li>							
			  </ul>
			</li>
			<li><a href="<?php echo base_url('tunggakan/spp');?>"><i class='fa fa-files-o'></i> <span>Data Tunggakan SPP</span></a></li>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-file-text"></i>
				<span>Laporan</span>	
			  </a>
			  <ul class="treeview-menu">	
				<li><a href="<?php echo base_url('laporan/masuk');?>"><i class='fa fa-files-o'></i> <span>Laporan Pemasukan SPP</span></a></li>
				<li><a href="<?php echo base_url('laporan/keluar');?>"><i class='fa fa-files-o'></i> <span>Laporan Pengeluaran SPP</span></a></li> 
				<li><a href="<?php echo base_url('laporan_osis/masuk');?>"><i class='fa fa-files-o'></i> <span>Laporan Pemasukan OSIS</span></a></li>
				<li><a href="<?php echo base_url('laporan_osis/keluar');?>"><i class='fa fa-files-o'></i> <span>Laporan Pengeluaran OSIS</span></a></li> 
				<li><a href="<?php echo base_url('laporan_tabungan/masuk');?>"><i class='fa fa-files-o'></i> <span>Laporan Pemasukan Tabungan</span></a></li> 
				<li><a href="<?php echo base_url('laporan_tabungan/keluar');?>"><i class='fa fa-files-o'></i> <span>Laporan Penarikan Tabungan</span></a></li> 
			  </ul>
			</li>
			  
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-briefcase"></i>
				<span>Manajemen Pesan</span>	
				
			  </a>
			  <ul class="treeview-menu">
				<li><a href="<?php echo base_url('pesan');?>"><i class='fa fa-pencil-square-o'></i> <span>Tulis Pesan</span></a></li>
				<li><a href="<?php echo base_url('pesan/inbox');?>"><i class='fa fa-envelope-o'></i> <span>Kotak Masuk</span></a></li>
				<li><a href="<?php echo base_url('pesan/outbox');?>"><i class='fa fa-send-o'></i> <span>Kotak Keluar</span></a></li>
				<li><a href="<?php echo base_url('pesan/sent');?>"><i class='fa fa-newspaper-o'></i> <span>Pesan Terkirim</span></a></li>
			  </ul>
			</li>                       					
			
          <!--Akses Kepala Sekolah-->
		  <?php elseif($this->session->userdata('akses')=='2'):?>
			<li class="treeview-menu"><i class='fa fa-briefcase'></i> <b>Data Siswa</b></li>			
			<li><a href="<?php echo base_url('siswa/lihat');?> "><i class='fa fa-users'></i> <span>Siswa</span></a></li>
			<li><a href="<?php echo base_url('ortu/lihat');?> "><i class='fa fa-book'></i> <span>Kontak Orang Tua</span></a></li>			
            <li class="treeview">
			  <a href="#">
				<i class="fa fa-file-text"></i>
				<span>Laporan Keuangan</span>	
			  </a>
			  <ul class="treeview-menu">	
				<li><a href="<?php echo base_url('laporan/masuk');?>"><i class='fa fa-files-o'></i> <span>Laporan Pemasukan SPP</span></a></li>
				<li><a href="<?php echo base_url('laporan/keluar');?>"><i class='fa fa-files-o'></i> <span>Laporan Pengeluaran SPP</span></a></li> 
				<li><a href="<?php echo base_url('laporan_osis/masuk');?>"><i class='fa fa-files-o'></i> <span>Laporan Pemasukan OSIS</span></a></li>
				<li><a href="<?php echo base_url('laporan_osis/keluar');?>"><i class='fa fa-files-o'></i> <span>Laporan Pengeluaran OSIS</span></a></li> 
				<li><a href="<?php echo base_url('laporan_tabungan/masuk');?>"><i class='fa fa-files-o'></i> <span>Laporan Pemasukan Tabungan</span></a></li> 
				<li><a href="<?php echo base_url('laporan_tabungan/keluar');?>"><i class='fa fa-files-o'></i> <span>Laporan Penarikan Tabungan</span></a></li> 
			  </ul>
			</li>
			<li><a href="<?php echo base_url('tunggakan/spp');?>"><i class='fa fa-files-o'></i> <span>Data Tunggakan SPP</span></a></li> 
		  </ul>		  
		  <?php endif;?><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
</aside>
      

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3.3.1 -->
    <script src="<?php echo base_url().'assets/backend/jQuery/jquery-3.3.1.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/backend/jQuery/jquery-ui.js'?>" type="text/javascript"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url().'assets/backend/js/bootstrap.min.js'?>" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url();?>assets/backend/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url();?>assets/backend/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/backend/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- DATA TABLES SCRIPT -->
    <script src="<?php echo base_url();?>assets/backend/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/backend/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?php echo base_url();?>assets/backend/chartjs/Chart.min.js" type="text/javascript"></script>
    <!-- Ion Slider -->
    <script src="<?php echo base_url();?>assets/backend/ionslider/ion.rangeSlider.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url();?>assets/backend/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url();?>assets/backend/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/backend/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/backend/js/demo.js" type="text/javascript"></script>
	<!-- date-range-picker -->
	<script src="<?php echo base_url();?>assets/backend/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap datepicker -->
	<script src="<?php echo base_url();?>assets/backend/datepicker/bootstrap-datepicker.min.js"></script>
	<!-- bootstrap time picker -->
	<script src="<?php echo base_url();?>assets/backend/timepicker/bootstrap-timepicker.min.js"></script>