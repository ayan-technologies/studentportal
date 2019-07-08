<?php 
$spage='SchoolProfile';

include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$getSchoolProfile = new ManageProfile();
?>
<style type="text/css">
    .cnt_label
    {
        margin-bottom: 0;
        text-align: left;
    }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg_img">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Contact Us
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="MyProfile">Contact Us</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="max-width: 70%;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <?php
                $userdetails=$this->session->userdata['userdetails'];
            ?>
            <form method="post" class="form-horizontal">
                <div class="col-xs-12">
                        &nbsp;&nbsp;&nbsp;
                </div>
                <div class="text-center">
                <img src='./dist/Icons/school.png' style="max-width:100px">

                 <div class="box-body">
                    <label for="schoolname" class="cnt_label">
                            Sample School
                    </label>
                    <div class="col-xs-12">
                        <!-- this is for one row space -->
                    </div>
                    <div class="col-xs-12">
                        <!-- this is for one row space -->
                    </div>
                        <div class="col-sm-6 form-group">
                        <label for="address" class="col-sm-3 control-label">Address:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">Address 1,
                                street name,
                                District,
                                pincode</div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Phone No:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">123456789, 7894563210</div>
                        </div>
                        <!-- <label for="inputPassword3" class="col-sm-3 control-label">Mobile:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">7894563210</div>
                        </div> -->
                        <label for="inputPassword3" class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">schoolemail@gmail.com</div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Social Media Link:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                                Facebook:<br>
                                Twitter:<br>
                                Youtube:
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <!-- this is for one row space -->
                    </div>
                    <div class="col-xs-12">
                        <!-- <iframe src='./dist/img/map.jpg'></iframe> -->
                        <img src="./dist/img/map.jpg" style='width: 100%;height: 100%;cursor:pointer' onclick='window.location.href="https://www.google.com/maps"' target="_blank">
                        <!-- onclick='window.location.href="Attendance" -->
                    </div>
                </div>  
            </form>           
          </div>
        </div>       
      </div>     
    </section>
</div>  

<?php include_once 'footer.php'; ?>

  
