<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Mirota KSM | Admin System Log in</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte2/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte2/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
  body {
    background-color:#0A1452;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }

  small {
    font-size: 20px;
  }

  .info{
    width: 400px;
    height: 100%;
    background-color: black;
  }

  .login-box-body {
    box-shadow: 0px 5px 20px 0px #00083F;
    border-radius: 10px;
  }

  .form{
    border-radius: 15px;
    border-color: #888888;
  }

  .glyphicon-lock{
    color: #fff;
  }

  .login-logo a{
    color: #fff;
  }

  @media only screen and (max-width: 900px) {

    .register-box {
      padding-top: 50%;
    }
  }

  @media only screen and (min-width: 900px) {

    body {
      background-position: center;
      background-repeat: no-repeat;
      background-size: 100%;
    }

  }
</style>

<body>
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>SI AMIR |<small>Sistem Akutansi Mirota</small></b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign In</p>
      <?php $this->load->helper('form'); ?>
      <div class="row">
        <div class="col-md-12">
          <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
        </div>
      </div>
      <?php
      $this->load->helper('form');
      $error = $this->session->flashdata('error');
      if ($error) {
      ?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $error; ?>
        </div>
      <?php }
      $isLogin = $this->session->flashdata('isLogin');
      if ($isLogin) {
      ?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $isLogin; ?>
        </div>
      <?php }
      $success = $this->session->flashdata('success');
      if ($success) {
      ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $success; ?>
        </div>
      <?php }
      $warning = $this->session->flashdata('warning');
      if ($warning) {
      ?>
        <div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $warning; ?>
        </div>
      <?php } ?>

      <form action="<?php echo base_url(); ?>loginMe" method="post">
        <div class="form-group has-feedback">
          <input type="username" class="form-control form" placeholder="username" name="username" />
          <span class="glyphicon glyphicon-envelope form-control-feedback" style="color:#0A1452"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control form" placeholder="Password" name="password" />
          <span class="glyphicon glyphicon-lock form-control-feedback" style="color:#0A1452"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <!-- <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>  -->
          </div><!-- /.col -->
          <div class="col-xs-4">
            <input type="submit" class="btn btn-primary btn-block btn-flat" style="border-radius:15px;background-color:#0A1452;" value="Sign In" />
          </div><!-- /.col -->

        </div>
      </form>

    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->

  <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>