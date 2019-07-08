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
  <title>Student Portal</title>
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
  <style type="text/css">
    #load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("loader/loader4.gif") no-repeat center center rgba(0,0,0,0.25)
}
 #imgload{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("loader/loader4.gif") no-repeat center center rgba(0,0,0,0.25)

}
.toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
.toggle.ios .toggle-handle { border-radius: 20px; }
</style>


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="load"></div>
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="Index" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Student</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Student Portal</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
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
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" onclick='window.location.href="MyProfile";' style="cursor:pointer;">
        <div class="pull-left image">            
            <?php if($this->session->userdata['userdetails']->EmployeeImage!='' && file_exists("empimage/".$this->session->userdata['userdetails']->EmployeeImage)){?>
                <img src="empimage/<?=$this->session->userdata['userdetails']->EmployeeImage?>" class="img-circle" alt="User Image" style="width:50px;">
            <?php }else{ ?>
                <img src="dist/img/avatar5.png" alt="User Image" class="img-circle" style="width:50px;">
            <?php } ?>            
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata['userdetails']->EmployeeUserName?></p>
          <!-- <a>Emp Code: <?=$this->session->userdata['userdetails']->EmployeeCode?></a> -->
        </div>
        <div class="col-md-12">&nbsp;</div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($page=='Dashboard'){?>active<?php } ?> treeview">
          <a href="Index" onclick='window.location.href="Index";'>
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

      <?php if($this->session->userdata['userdetails']->EmployeeUserRole==4 ){?>
      <li class="<?php if($page=='Attendance'){?>active<?php } ?> treeview">  
        <a href="Attendance" onclick='window.location.href="Attendance";'> 
          <i class="fa fa-check-square-o"></i> <span>Attendance Automation</span>
        </a>
      </li>       
      <?php }?>
        
        <li class="<?php if($page=='Profile'){?>active<?php } ?> treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="MyProfile" <?php if($spage=='My Profile'){?>style="color:#fff;"<?php } ?>><i class="fa fa-circle-o"></i> My Profile</a></li>
            <li><a href="SchoolProfile" <?php if($spage=='SchoolProfile'){?>style="color:#fff;"<?php } ?>><i class="fa fa-circle-o"></i> School Profile</a></li>
            <!-- <li><a href="LeaveHistory" <?php if($spage=='Leave History'){?>style="color:#fff;"<?php } ?>><i class="fa fa-circle-o"></i> Leave History</a></li> -->
            <li><a href="ApplyLeave" <?php if($spage=='Apply Leave'){?>style="color:#fff;"<?php } ?>><i class="fa fa-circle-o"></i> Apply Leave</a></li>
          </ul>
        </li>
        <?php if($this->session->userdata['userdetails']->EmployeeUserRole==1 || $this->session->userdata['userdetails']->EmployeeUserRole==2){?>
        <li class="<?php if($page=='Employee'){?>active<?php } ?> treeview">
          <a href="EmployeeList" onclick='window.location.href="EmployeeList";'>
            <i class="fa fa-users"></i>
            <span>Employees</span>
          </a>
        </li>
        <?php } if($this->session->userdata['userdetails']->EmployeeUserRole==1 || $this->session->userdata['userdetails']->EmployeeUserRole==2 || $this->session->userdata['userdetails']->EmployeeUserRole==4){?>
          <li class="<?php if($page=='StudentList'){?>active<?php } ?> treeview">
          <a href="StudentList" onclick='window.location.href="StudentList";'>
            <i class="fa fa-graduation-cap"></i>
            <span>Students</span>
          </a>
        </li>
      
      <?php } if($this->session->userdata['userdetails']->EmployeeUserRole==1 || $this->session->userdata['userdetails']->EmployeeUserRole==2 ){?>         
        <li class="<?php if($page=='Leave'){?>active<?php } ?> treeview">
          <a href="LeaveList" onclick='window.location.href="LeaveList";'>
            <i class="fa fa-envelope"></i>
            <span>Employee Leave Requests</span>
          </a>
        </li>     
      <?php } if($this->session->userdata['userdetails']->EmployeeUserRole==4 ){?>         
      <li class="<?php if($page=='Leave'){?>active<?php } ?> treeview">
          <a href="LeaveList" onclick='window.location.href="LeaveList";'>
            <i class="fa fa-envelope"></i>
            <span>Student Leave Requests</span>
          </a>
        </li>
      <?php }?>

      <li class="<?php if($page=='Calander'){?>active<?php } ?> treeview">
          <a href="LeaveCalender" onclick='window.location.href="LeaveCalender";'>
            <i class="fa fa-calendar"></i> <span>Leave Calender</span>
          </a>
      </li>
      <?php if($this->session->userdata['userdetails']->EmployeeUserRole==1 || $this->session->userdata['userdetails']->EmployeeUserRole==2 ){?>
      <li class="<?php if($page=='Notification'){?>active<?php } ?> treeview">  
        <a href="Notification" onclick='window.location.href="Notification";'> 
          <i class="fa fa-pencil-square-o"></i> <span>Event Updates</span> 
        </a>
      </li>
      <li class="<?php if($page=='PaymentUpdation'){?>active<?php } ?> treeview">  <a href="PaymentUpdation" onclick='window.location.href="PaymentUpdation";'> 
          <i class="fa fa-money"></i> <span>Payment Notification</span> 
        </a>
      </li>
    <?php }  ?>
    <?php if($this->session->userdata['userdetails']->EmployeeUserRole==4 || $this->session->userdata['userdetails']->EmployeeUserRole==5){?>
     <li class="<?php if($page=='TimeTable'){?>active<?php } ?> treeview">
          <a href="TimeTable" onclick='window.location.href="TimeTable";'>
            <i class="fa fa-calendar-check-o"></i>           
            <span>TimeTable</span>
          </a>
        </li>
        <li class="<?php if($page=='ExamTimeTable'){?>active<?php } ?> treeview">
          <a href="ExamTimeTable" onclick='window.location.href="ExamTimeTable";'>
            <i class="fa fa-calendar-plus-o"></i>
            <span>Exam TimeTable</span>
          </a>
        </li>
      <?php }?>
    <?php if($this->session->userdata['userdetails']->EmployeeUserRole==4 || $this->session->userdata['userdetails']->EmployeeUserRole==5) {?>
      <li class="<?php if($page=='ReportCard'){?>active<?php } ?> treeview">  
        <a href="ReportCard" onclick='window.location.href="ReportCard";'> 
          <i class="fa fa-clipboard"></i> <span>Report Card</span> 
        </a>       
      </li>
    <?php }?>
    
        <li class="<?php if($page=='TranspotationDetails'){?>active<?php } ?> treeview">
          <a href="TranspotationDetails" onclick='window.location.href="TranspotationDetails";'>
            <i class="fa fa-bus"></i>           
            <span>Transpotation Details</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

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