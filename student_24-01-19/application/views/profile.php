<?php 
$page='Profile';
$spage='My Profile';
include_once 'header.php'; 
require_once 'application/models/ManageProfile.php';
$getuser = new ManageProfile();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="MyProfile">My Profile</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <?php
                $userdetails=$this->session->userdata['userdetails'];
            ?>
             <form name="approval" id="approval" method="post" class="form-horizontal">
                <input type="hidden" name="eid" id="eid" value="<?=$userdetails->EmployeeID?>">
                <div class="box-body">
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">FullName</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeeFirstName?> <?=$userdetails->EmployeeLastName?></div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Student Code</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeeCode?></div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Department</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->DepartmentName?></div>
                        </div>
                    </div>
                    
                   <!--  <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Designation</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->DesignationName?></div>
                        </div>
                    </div> -->
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Join Date</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeeJoinDate?></div>
                        </div>
                    </div>
                    
                    <!-- <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Join Designation</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                                <?php 
                                    $empjndesig = $getuser->GetEmployeeJoinDesignation($userdetails->EmployeeDepartment,$userdetails->EmployeeJoinDesignation);
                                    echo $empjndesig->DesignationName
                                ?>
                            </div>
                        </div>
                    </div> -->
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Mobile</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeeMobile?></div>
                        </div>
                    </div>
                    
                    <!-- <div class="col-sm-6 form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Marital Status</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeeMaritalStatus?></div>
                        </div>
                    </div> -->
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeeEmail?></div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Personal Email</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeePersonalEmail?></div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Alternative Contact No -1</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeeAltMobile1?></div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Alternative Contact No -2</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeeAltMobile2?></div>
                        </div>
                    </div>
                    
                    <!-- <div class="col-sm-6 form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">PAN Card No.</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeePanCard?></div>
                        </div>
                    </div> -->
                    <div class="col-sm-12 form-group"></div>
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeeAddress?><br><?=$userdetails->EmployeeAddress2?><br><?=$userdetails->EmployeeCity?><br><?=$userdetails->EmployeeState?><br><?=$userdetails->EmployeeCountry?>-<?=$userdetails->EmployeeZipcode?></div>
                        </div>
                    </div>
                    
                   <!--  <div class="col-sm-6 form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Bank Details</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeeBankAccName?><br><?=$userdetails->EmployeeBankName?><br><?=$userdetails->EmployeeBankAccNo?><br><?=$userdetails->EmployeeBankBranch?><br><?=$userdetails->EmployeeBankIFSC?></div>
                        </div>
                    </div> -->
                    
                    <div class="col-sm-12 modal-footer">
                        <button type="button" class="btn btn-primary" onclick="window.location.href='EditProfile'">Edit Profile</button>
                        <button type="button" class="btn btn-primary" onclick="window.location.href='ChangePassword'">Change Password</button>
                    </div>
                </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include_once 'footer.php'; ?>

  
