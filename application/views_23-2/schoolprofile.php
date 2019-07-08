<?php 
$spage='SchoolProfile';

include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$getSchoolProfile = new ManageProfile();

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        School Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="MyProfile">School Profile</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <?php
                // print_r($_SESSION['userdetails']);
                // print_r($_SESSION['getuser_Data']);
                // $user_data=$getSchoolProfile->GetSchoolData();
                $userdetails=$this->session->userdata['userdetails'];
            ?>
            <form method="post" class="form-horizontal" >
                 <div class="box-body">
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">School Name</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">XXXX</div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">Address 1<br>
                                street name<br>
                                District<br>
                                pincode</div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Phone No:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">123456789</div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Mobile:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">7894563210</div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">schoolemail@schoolemail.com</div>
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
                </div>  
            </form>           
          </div>
        </div>       
      </div>     
    </section>
</div>  

<?php include_once 'footer.php'; ?>

  
