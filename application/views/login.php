<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator Log In</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?php echo base_url();?>assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/backend/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <?php if(isset($_SESSION['error'])){ ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button class="close" data-dismiss="alert" type="button"><i class="fa fa-close"></i></button>
          <?php echo $this->session->flashdata('error');?>
        </div>
  <?php } ?>
  <div class="login-logo">
    <h2>Aplikasi Keuangan SPP</h2> SMA PGRI 1 PURWAKARTA
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
        
    <p class="login-box-msg">Silahkan Login</p>

    <form action="<?php echo base_url('auth/login');?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Log In</button>
        </div>
        <!-- /.col -->
      </div>
      <div>
          <span><br/><b>Copyright &copy; 2018</b></span>
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>assets/backend/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url();?>assets/backend/js/bootstrap.min.js" type="text/javascript"></script>    
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
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
