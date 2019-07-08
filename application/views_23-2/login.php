<?php
session_start();
$page='Login';
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="content-type" content="application/json; charset=UTF-8">
  <title>virtual guru</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  .login-box-body1
  {    
    /*background: #fff;*/
    padding: 20px;
    border-top: 0;
    color: #666;
  }
  .login-box1
  {
    width: 360px;
    margin: 12% auto;
  }
  </style>
  
</head>
<body class="hold-transition" style="background-color: rgba(0, 0, 0, 1.3);background-image: url(dist/img/bg_sk3_b.png)!important;background-repeat: no-repeat;background-position: center;">
<div class="login-box" ><!-- class="login-box" -->
  <div class="login-logo">
    <a href="index.php" style="font-family:segoe print;background:white "><b>Virtual Guru</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body1">
    <!-- <p class="login-box-msg">Sign in to your Profile</p> -->

    <form action="Profile/CheckLogin" method="post">
      <div class="form-group has-feedback">
        <input type="text" style="background: #eeeaf5;" class="form-control font_family" name="username" id="username" placeholder="UserName">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" style="background: #eeeaf5;font-family:segoe print;" class="form-control" name="password" id="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <!-- <label>
             <input type="checkbox"> Remember Me
                
            </label>-->
              <!-- <a href="ForgotPassword">I forgot my password</a> -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat" style="margin-left: -112px;font-family:segoe print;">LOGIN</button>          
        </div>
        <div>&nbsp;</div>
        <div class="col-xs-12 text-center">
          <a href="ForgotPassword" style="font-family:segoe print;text-decoration: underline;color:#00a65a">Forgot Password</a>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<footer>
  <div style="text-align: center">
      <strong>&copy; <?=date('Y');?>. Powered by </strong>ayan Technologies
  </div>
</footer>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
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
