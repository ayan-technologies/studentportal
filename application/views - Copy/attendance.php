<?php 
$page='Attendance';
include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$getattendanceReport = new ManageProfile();

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Under Construction
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="MyProfile">Attendance</a></li> 
      </ol>
    </section>
</div>  
<?php include_once 'footer.php';?>
