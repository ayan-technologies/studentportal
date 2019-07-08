<?php
if($this->session->userdata['userdetails']->EmployeeUserRole==''){    
    if($_SESSION['URI']==''){
        $_SESSION['URI']=$_SERVER['REQUEST_URI'];
    }    
    header("Location:Login");
}

if($this->session->userdata['userdetails']->EmployeeUserRole!=1 && $this->session->userdata['userdetails']->EmployeeUserRole!=5 && $spage=='Leave Approval'){  
    header('Location:Index');
}

if($this->session->userdata['userdetails']->EmployeeUserRole!=1 && $this->session->userdata['userdetails']->EmployeeUserRole!=2 && $spage=='Inventory Approval'){
    header('Location:Index');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Virtual Guru</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">  
  
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link href="https://code.jquery.com/jquery-3.3.1.js">
 <link href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.1019/css/jquery.dataTables.min.css">
  <style type="text/css">
    #load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("loader/bars.svg") no-repeat center center rgba(0,0,0,0.25)
}
 #imgload{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("loader/bars.svg") no-repeat center center rgba(0,0,0,0.25)
}
.bg_img
{
  background-image: url(dist/img/white_bg.jpg)!important;
}
.toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
.toggle.ios .toggle-handle { border-radius: 20px; }
</style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="skin-blue hold-transition layout-top-nav">
  <!--  -->
<div id="load"></div>
<div class="wrapper bg_img">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand  font_family"><b>Virtual</b>Guru</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left">
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <a href="Index">
                Home
              </a>
            </li>
            <?php if($this->session->userdata['userdetails']->EmployeeUserRole==4 ){?>
            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Event Update</li>
                <li>
                  <!-- Inner menu: contains the tasks -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i>Event list for this month.....
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
          <?php }?>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- <?php if($this->session->userdata['userdetails']->EmployeeImage!='' && file_exists("empimage/".$this->session->userdata['userdetails']->EmployeeImage)){?> -->
                    <img src="empimage/<?=$this->session->userdata['userdetails']->EmployeeImage?>" class="user-image" alt="User Image">
               <!--  <?php }else{ ?> -->
                    <img src="dist/img/avatar5.png" alt="User Image" class="user-image">
               <!--  <?php } ?> -->
                <span class="hidden-xs"><?=$this->session->userdata['userdetails']->EmployeeUserName?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- <?php if($this->session->userdata['userdetails']->EmployeeImage!='' && file_exists("empimage/".$this->session->userdata['userdetails']->EmployeeImage)){?> -->
                    <img src="empimage/<?=$this->session->userdata['userdetails']->EmployeeImage?>" class="img-circle" alt="User Image">
                <!-- <?php }else{ ?> -->
                    <img src="dist/img/avatar5.png" alt="User Image" class="img-circle">
                <!-- <?php } ?> -->
                <p>
                  <?=$this->session->userdata['userdetails']->EmployeeFirstName?> <?=$this->session->userdata['userdetails']->EmployeeLastName?><br><?=$this->session->userdata['userdetails']->DesignationName?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="MyProfile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="Signout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          </ul>
      </div>
          <!-- /.navbar-custom-menu -->
        </div>
    </nav>
  </header>  
</section>
<script type="text/javascript">
  document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
       document.getElementById('contents').style.visibility="hidden";
  } else if (state == 'complete') {
      setTimeout(function(){
         document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
         document.getElementById('contents').style.visibility="visible";
      },1000);
  }
}
</script>