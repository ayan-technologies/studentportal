<?php 
$page='Employee';
$spage='Add Employee';
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
        Add New Employee
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="EmployeeList">Employees</a></li> 
        <li class="active"><a href="AddEmployee">Add Employee</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
             <form name="editprofile" id="editprofile" action="Employee/AddEmployee" method="post" class="form-horizontal" enctype="multipart/form-data" onsubmit="return validate()" >
                <div class="box-body">
                    
                    <?php if($_REQUEST['success']==1){?>
                        <div class="col-sm-12" style="text-align: center; color:#009688">Employee Added Successfully</div>
                    <?php } ?>
                    
                    
                        
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="usname" id="usname" onblur="return checkemployee(this.value)" value="" style="width:20%;" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="password" name="uspass" id="uspass" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">FirstName</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="fname" id="fname" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">LastName</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="lname" id="lname" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Code</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="code" id="code" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Role</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                                <?php
                                    $dept=$getlist->GetList('userroles');
                                ?>
                                <select name="role" id="role" style="width:20%" >
                                    <option value="">Select Role</option>
                                    <?php foreach($dept as $dep){ ?>
                                    <option value="<?=$dep['UserRoleID']?>" ><?=$dep['UserRoleName']?></option>
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
                                <select name="dept" id="dept" style="width:20%" onchange="return userdept(this.value);" >
                                    <option value="">Select Department</option>
                                    <?php foreach($dept as $dep){ ?>
                                    <option value="<?=$dep['DepartmentID']?>" ><?=$dep['DepartmentName']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Designation</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12" id="Selectdept">
                              
                                <select name="desig" id="desig" style="width:20%">
                                 <option value="">Select Designation</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Join Date</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="jdate" id="jdate" style="width:20%;" value=""  ></div>
                        </div>
                    </div>                    
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Join Designation</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12" id="Selectjoindept">
                                <select name="jdesig" id="jdesig" style="width:20%" >
                                    <option value="">Select Designation
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Mobile</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="mobile" id="mobile" pattern="^\d{10}$" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="email" onblur="return checkemail(this.value)" id="email" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Personal Email</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="pemail" id="pemail" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Alternative Contact No -1</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="alt1" id="alt1" pattern="^\d{10}$" style="width:20%;" value=""></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Alternative Contact No -2</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="alt2" id="alt2" style="width:20%;" value=""  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Marital Status</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                                <select name="marital" id="marital" style="width:20%;" >
                                    <option value="">Select</option>
                                    <option value="Single" >Single</option>
                                    <option value="Married" >Married</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="address" id="address" style="width:20%;" value=""  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Address Line-2</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="address2" id="address2" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="city" id="city" style="width:20%;" value=""  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="state" id="state" style="width:20%;" value=""  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="country" id="country" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Zipcode</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="zipcode" id="zipcode" style="width:20%;" value=""  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Bank Name</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="bank" id="bank" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Account Name</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="accname" id="accname" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Account No.</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="accno" id="accno" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Branch</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="branch" id="branch" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">IFSC</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="ifsc" id="ifsc" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">PAN Card No.</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="pan" id="pan" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="file" name="empimg" id="empimg" value="" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-primary" >Submit</button>
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
<script type="text/javascript">
function checkemployee(val){


          $.ajax({
            type: 'POST',
            url:'Employee/Checkemployee',
            data: {EmployeeUserName:val},
            success: function(response){

               
               var obj = JSON.parse(response);

              if(obj[0].EmployeeUserName==val){

                swal("Username Already Exists!", "You clicked the button!", "warning").then(okay => {
                if (okay) {
                document.getElementById('usname').value='';
                }
                });

              } 
            },
            error: function(){
                
            }
        });

}
</script>

<script type="text/javascript">
function checkemail(val){


          $.ajax({
            type: 'POST',
           // dataType: 'json',
            url:'Employee/CheckemployeeEmail',
            data: {EmployeeEmail:val},
            success: function(response){

               
               var obj = JSON.parse(response);

              if(obj[0].EmployeeEmail==val){

                swal("Email Address Already Exists!", "You clicked the button!", "warning").then(okay => {
                if (okay) {
                document.getElementById('email').value='';
                }
                });


              } 
          
            },
            error: function(){
                
            }
        });

}
</script>


<script>
  $(function () {
     
    //Date picker
    $('#jdate').datepicker({
        autoclose: true
    })
    
    
  })
</script>
<script type="text/javascript">
 function validate() {
        
if(document.getElementById('usname').value==''){
            swal({
              text: "Please Enter Username Name",
              type: "success",
              timer: 1200
              });
            
            
            document.getElementById('usname').focus();
            return false;
        }
        if(document.getElementById('uspass').value==''){
            swal({
              text: "Please Enter User Password",
              type: "success",
              timer: 1200
              });
            
            
            document.getElementById('uspass').focus();
            return false;
        }

        if(document.getElementById('fname').value==''){
            swal({
              text: "Please Enter First name",
              type: "success",
              timer: 1200
              });
            
            
            document.getElementById('fname').focus();
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

   return true;
}
</script>


<script type="text/javascript">
   function userdept(val){

     
 $.ajax({
            url:'Employee/UserDept',
            type: 'POST',
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