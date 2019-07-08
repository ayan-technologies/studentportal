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
                // print_r($_SESSION['userdetails']);
                // print_r($_SESSION['getuser_Data']);
                $user_data=$getuser->getUserDetails();
                // print_r($user_data);
                // print_r($user_data->{'DesignationName'});
                $userdetails=$this->session->userdata['userdetails'];
            ?>
             <form method="post" class="form-horizontal" >
                <input type="hidden" name="eid" id="eid" value="<?=$userdetails->EmployeeID?>">
                <div class="box-body">
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">FullName</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$user_data->{'EmployeeFirstName'}?> </div>
                        </div>
                    </div>
                    
                    <!-- <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Code</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeeCode?></div>
                        </div>
                    </div> -->
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Department</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$user_data->{'DepartmentName'}?></div>
                        </div>
                    </div>
                      
                    <?php if($this->session->userdata['userdetails']->EmployeeUserRole==1 || $this->session->userdata['userdetails']->EmployeeUserRole==2|| $this->session->userdata['userdetails']->EmployeeUserRole==3|| $this->session->userdata['userdetails']->EmployeeUserRole==4){?>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Designation</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->{'DesignationName'}?></div>
                        </div>
                    </div>
                <?php }?>
                    <?php if($this->session->userdata['userdetails']->EmployeeUserRole==5){?>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Standard:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">1</div>
                        </div>
                    </div>
                

                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Section:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$user_data->{'section'}?></div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Exam_No:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$user_data->{'Exam_no'}?></div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Academic Year:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$user_data->{'Academic_year'}?></div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">DOB:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=date('d-m-Y',strtotime($user_data->{'DOB'}))?></div>
                        </div>
                    </div>
                    <?php }?>
                    <!-- <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Join Date</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$userdetails->EmployeeJoinDate?></div>
                        </div>
                    </div> -->
                    
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
                            <div class="col-sm-12"><?=$user_data->{'EmployeeMobile'}?></div>
                        </div>
                    </div>
                  
                    <div class="col-sm-6 form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Marital Status</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$user_data->{'EmployeeMaritalStatus'}?></div>
                        </div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$user_data->{'EmployeeEmail'}?></div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Personal Email</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$user_data->{'EmployeePersonalEmail'}?></div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Alternative Contact No -1</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$user_data->{'EmployeeAltMobile1'}?></div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Alternative Contact No -2</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$user_data->{'EmployeeAltMobile2'}?></div>
                        </div>
                    </div>
                    <?php if($this->session->userdata['userdetails']->EmployeeUserRole==1 || $this->session->userdata['userdetails']->EmployeeUserRole==2|| $this->session->userdata['userdetails']->EmployeeUserRole==3|| $this->session->userdata['userdetails']->EmployeeUserRole==4){?>
                    <div class="col-sm-6 form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">PAN Card No.</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$user_data->{'EmployeePanCard'}?></div>
                        </div>
                    </div>
                   <?php  }?>
                    <div class="col-sm-12 form-group"></div>
                    
                    <div class="col-sm-6 form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$user_data->{'EmployeeAddress'}?><br>
                                <?=$user_data->{'EmployeeAddress2'}?><br>
                                <?=$user_data->{'EmployeeCity'}?><br>
                                <?=$user_data->{'EmployeeState'}?><br>
                                <?=$user_data->{'EmployeeCountry'}?><br>
                                <?=$user_data->{'EmployeeZipcode'}?>
                            </div>
                        </div>
                    </div>
                    
                    <?php if($this->session->userdata['userdetails']->EmployeeUserRole==1 || $this->session->userdata['userdetails']->EmployeeUserRole==2|| $this->session->userdata['userdetails']->EmployeeUserRole==3|| $this->session->userdata['userdetails']->EmployeeUserRole==4){?>
                    <div class="col-sm-6 form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Bank Details</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                            <?=$user_data->{'EmployeeBankAccName'}?><br>
                            <?=$user_data->{'EmployeeBankAccNo'}?><br>
                            <?=$user_data->{'EmployeeBankName'}?>
                            </div>
                        </div>
                    </div>
                <?php }?>
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

  
