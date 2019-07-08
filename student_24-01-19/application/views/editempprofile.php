<?php 
$page='Employee';
$spage='Edit Employee';
include_once 'header.php'; 
if($this->session->userdata['userdetails']->EmployeeUserRole!=1 && $this->session->userdata['userdetails']->EmployeeUserRole!=2){
    header('Location:Index');
}

 require_once 'application/models/ManageEmployee.php';
 $getlist = new ManageEmployee();

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Profile
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
             <form name="editprofile" id="editprofile" action="Employee/EditEmpProfile" method="post" class="form-horizontal" enctype="multipart/form-data" onsubmit="return validate()" >
                <input type="hidden" name="eid" id="eid" value="<?=$empdet->EmployeeEmpID?>">
                <div class="box-body">
                    <?php if($_REQUEST['success']==1){?>
                    <div class="col-sm-12" style="text-align: center; color:#009688"><h3>Employee Profile Updated Successfully</h3></div>
                    <?php } ?>
                    <div ></div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">UserName</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="uname" id="uname" readonly="" style="width:20%;" value="<?=$empdet->EmployeeUserName?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">FirstName</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="fname" id="fname" style="width:20%;" value="<?=$empdet->EmployeeFirstName?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">LastName</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="lname" id="lname" style="width:20%;" value="<?=$empdet->EmployeeLastName?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Code</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="code" id="code" style="width:20%;" value="<?=$empdet->EmployeeCode?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Role</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                                <?php
                                $dept = $getlist->GetList('userroles');
                                ?>
                                <select name="role" id="role" style="width:20%" >
                                    <option value="">Select Role</option>
                                    <?php foreach($dept as $dep){ ?>
                                    <option value="<?=$dep['UserRoleID']?>" <?php if($dep['UserRoleID']==$empdet->EmployeeUserRole){?>selected="selected"<?php } ?> ><?=$dep['UserRoleName']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Department</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                                <?php
                                    $dept=$getlist->GetList('department');
                                ?>
                                <select name="dept" id="dept" onchange="editdept(this.value);" style="width:20%" >
                                    <option value="">Select Department</option>
                                    <?php foreach($dept as $dep){ ?>
                                    <option value="<?=$dep['DepartmentID']?>" <?php if($dep['DepartmentName']==$empdet->DepartmentName){?>selected="selected"<?php } ?> ><?=$dep['DepartmentName']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Designation</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12" id="Selectdept">
                                <?php
                                    $dept=$getlist->GetdesigList($empdet->EmployeeDepartment);
                                ?>
                                <select name="desig" id="desig" style="width:20%" >
                                    <option value="">Select Designation</option>
                                    <?php foreach($dept as $dep){ ?>
                                    <option value="<?=$dep['DesignationID']?>" <?php if($dep['DesignationName']==$empdet->DesignationName){?>selected="selected"<?php } ?> ><?=$dep['DesignationName']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Join Date</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="jdate" id="jdate" style="width:20%;" value="<?=date("m/d/Y",strtotime($empdet->EmployeeJoinDate))?>"   ></div>
                        </div>
                    </div>                    
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Join Designation</label>
                         <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12" id="Selectjoindept">
                                <?php
                                    $dept=$getlist->GetdesigList($empdet->EmployeeDepartment);
                                ?>
                                <select name="desig" id="desig" style="width:20%" >
                                    <option value="">Select Designation</option>
                                    <?php foreach($dept as $dep){ ?>
                                    <option value="<?=$dep['DesignationID']?>" <?php if($dep['DesignationName']==$empdet->DesignationName){?>selected="selected"<?php } ?> ><?=$dep['DesignationName']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Mobile</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="mobile" id="mobile" style="width:20%;" pattern="^\d{10}$" value="<?=$empdet->EmployeeMobile?>"   ></div>
                        </div>
                    </div>
                                            
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="email" id="email" style="width:20%;" value="<?=$empdet->EmployeeEmail?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Personal Email</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="pemail" id="pemail" style="width:20%;" value="<?=$empdet->EmployeePersonalEmail?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Alternative Contact No -1</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="alt1" id="alt1" style="width:20%;" value="<?=$empdet->EmployeeAltMobile1?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Alternative Contact No -2</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="alt2" id="alt2" style="width:20%;" value="<?=$empdet->EmployeeAltMobile2?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Marital Status</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                                <select name="marital" id="marital" style="width:20%;" >
                                    <option value="">Select</option>
                                    <option value="Single" <?php if($empdet->EmployeeMaritalStatus=='Single'){?> selected="selected" <?php } ?>>Single</option>
                                    <option value="Married" <?php if($empdet->EmployeeMaritalStatus=='Married'){?> selected="selected" <?php } ?>>Married</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Is On Notice Period?</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="radio" name="resigned" id="resigned1" value="0" <?php if($empdet->EmployeeInNotice==0){?>checked="checked"<?php } ?> > No &nbsp; &nbsp; <input type="radio" name="resigned" id="resigned2" value="1" <?php if($empdet->EmployeeInNotice==1){?>checked="checked"<?php } ?> > Yes</div>
                        </div>
                    </div>
                     <?php if($empprofile->EmployeeInNotice=='1'){?><?php } ?>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Releaved On Date</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="rdate" id="rdate" style="width:20%;" value="<?php if($empdet->EmployeeReleavedOn!='0000-00-00'){ echo date("m/d/Y",strtotime($empdet->EmployeeReleavedOn)); } ?>"  ></div>
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="address" id="address" style="width:20%;" value="<?=$empdet->EmployeeAddress?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Address Line-2</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="address2" id="address2" style="width:20%;" value="<?=$empdet->EmployeeAddress2?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="city" id="city" style="width:20%;" value="<?=$empdet->EmployeeCity?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="state" id="state" style="width:20%;" value="<?=$empdet->EmployeeState?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="country" id="country" style="width:20%;" value="<?=$empdet->EmployeeCountry?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Zipcode</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="zipcode" id="zipcode" style="width:20%;" value="<?=$empdet->EmployeeZipcode?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Bank Name</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="bank" id="bank" style="width:20%;" value="<?=$empdet->EmployeeBankName?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Account Name</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="accname" id="accname" style="width:20%;" value="<?=$empdet->EmployeeBankAccName?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Account No.</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="accno" id="accno" style="width:20%;" value="<?=$empdet->EmployeeBankAccNo?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Branch</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="branch" id="branch" style="width:20%;" value="<?=$empdet->EmployeeBankBranch?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">IFSC</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="ifsc" id="ifsc" style="width:20%;" value="<?=$empdet->EmployeeBankIFSC?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">PAN Card No.</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="pan" id="pan" style="width:20%;" value="<?=$empdet->EmployeePanCard?>"  ></div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="file" name="empimg" id="empimg" value="" >
                                <input type="hidden" name="oldempimg" id="oldempimg" value="<?=$empdet->EmployeeImage?>" >
                                <?php if($empdet->EmployeeImage!='' && file_exists("empimage/".$empdet->EmployeeImage)){?>
                                    <img src="empimage/<?=$empdet->EmployeeImage?>" class="img-circle" alt="User Image"  style='max-width: 200px;'>
                                <?php }else{ ?>
                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
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

  
<script>
  $(function () {
     
    //Date picker
    $('#jdate').datepicker({
        autoclose: true
    })
    
    //Date picker
    $('#rdate').datepicker({
        autoclose: true
    })
    
    
  });
</script>

<script type="text/javascript">
 function validate() {
        
if(document.getElementById('fname').value==''){
            swal({
              text: "Please Enter Your First Name",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('fname').focus();
            return false;
        }
        if(document.getElementById('lname').value==''){
            swal({
              text: "Please Enter Your Lastname Password",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('lname').focus();
            return false;
        }

         if(document.getElementById('code').value==''){
            swal({
              text: "Please Enter Code",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('code').focus();
            return false;
        }
        if(document.getElementById('role').value==''){
            swal({
              text: "Please Select Role",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('role').focus();
            return false;
        }
        if(document.getElementById('dept').value==''){
            swal({
              text: "Please Select Department",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('dept').focus();
            return false;
        }
        if(document.getElementById('desig').value==''){
            swal({
              text: "Please Select Designation",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('desig').focus();
            return false;
        }
         if(document.getElementById('jdate').value==''){
            swal({
              text: "Please Select Joining Date",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('jdate').focus();
            return false;
        }
        if(document.getElementById('jdesig').value==''){
            swal({
              text: "Please Select Join Designation",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('jdesig').focus();
            return false;
        }
        if(document.getElementById('mobile').value==''){
            swal({
              text: "Please Enter Your Mobile No",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('mobile').focus();
            return false;
        }
         if(document.getElementById('email').value==''){
            swal({
              text: "Please Enter Your Email",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('email').focus();
            return false;
        }
        if(document.getElementById('pemail').value==''){
            swal({
              text: "Please Enter Your Personal Email",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('pemail').focus();
            return false;
        }
        if(document.getElementById('pemail').value==''){
            swal({
              text: "Please Enter Your Personal Email",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('pemail').focus();
            return false;
        }
        if(document.getElementById('alt1').value==''){
            swal({
              text: "Please Enter Your Alternative No",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('alt1').focus();
            return false;
        }

        if(document.getElementById('city').value==''){
            swal({
              text: "Please Select Your City",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('city').focus();
            return false;
        }

         if(document.getElementById('state').value==''){
            swal({
              text: "Please Select Your State",
              type: "success",
              timer: 1200
              });
            
            
            document.getElementById('state').focus();
            return false;
        }
          if(document.getElementById('country').value==''){
            swal({
              text: "Please Select Your Country",
              type: "success",
              timer: 1200
              });
            
            
            document.getElementById('country').focus();
            return false;
        }

        if(document.getElementById('zipcode').value==''){
            swal({
              text: "Please Enter Your Zipcode",
              type: "success",
              timer: 1200
              });
            
            
            document.getElementById('zipcode').focus();
            return false;
        }

   return true;
}
</script>

<script type="text/javascript">
   function editdept(val){


  $.ajax({
            url:'Employee/UserDeptEdit',
            type: 'POST',
           //dataType: 'json',
            data: {EmployeeDepartment:val},
               success: function(response){  
            item = JSON.parse(response) ; 
              $('#Selectdept').html(item[0]);
              $('#Selectjoindept').html(item[1]);

                
            },
            error: function(err){
                alert("Data Error");
            }
        });
   }


</script>