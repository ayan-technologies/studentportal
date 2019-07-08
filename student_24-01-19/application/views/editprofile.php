<?php 
$page='Profile';
$spage='My Profile';
include_once 'header.php'; 

?>
<img id="imgload" style="display:none"/ >
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Your Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="MyProfile">My Profile</a></li> 
        <li class="active"><a href="EditProfile">Edit Profile</a></li> 
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
             <form name="editprofile" id="editprofile" action="Employee/EditEmployee" method="post" class="form-horizontal" enctype="multipart/form-data" >
                <input type="hidden" name="eid" id="eid" value="<?=$userdetails->EmployeeEmpID?>">
                <div class="box-body">
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">FirstName</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="fname" id="fname" style="width:20%;" value="<?=$userdetails->EmployeeFirstName?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">LastName</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="lname" id="lname" style="width:20%;" value="<?=$userdetails->EmployeeLastName?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Mobile</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="mobile" id="mobile" style="width:20%;" pattern="^\d{10}$" value="<?=$userdetails->EmployeeMobile?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Personal Email</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="pemail" id="pemail" style="width:20%;" value="<?=$userdetails->EmployeePersonalEmail?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Alternative Contact No -1</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="alt1" id="alt1" style="width:20%;" pattern="^\d{10}$" value="<?=$userdetails->EmployeeAltMobile1?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Alternative Contact No -2</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="alt2" id="alt2" style="width:20%;" pattern="^\d{10}$" value="<?=$userdetails->EmployeeAltMobile2?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Marital Status</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                                <select name="marital" id="marital" style="width:20%;" >
                                    <option value="">Select</option>
                                    <option value="Single" <?php if($userdetails->EmployeeMaritalStatus=='Single'){?> selected="selected" <?php } ?>>Single</option>
                                    <option value="Married" <?php if($userdetails->EmployeeMaritalStatus=='Married'){?> selected="selected" <?php } ?>>Married</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="address" id="address" style="width:20%;" value="<?=$userdetails->EmployeeAddress?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Address Line-2</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="address2" id="address2" style="width:20%;" value="<?=$userdetails->EmployeeAddress2?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="city" id="city" style="width:20%;" value="<?=$userdetails->EmployeeCity?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="state" id="state" style="width:20%;" value="<?=$userdetails->EmployeeState?>" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Country</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="country" id="country" style="width:20%;" value="<?=$userdetails->EmployeeCountry?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Zipcode</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="zipcode" id="zipcode" style="width:20%;" value="<?=$userdetails->EmployeeZipcode?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Bank Name</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="bank" id="bank" style="width:20%;" value="<?=$userdetails->EmployeeBankName?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Account Name</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="accname" id="accname" style="width:20%;" value="<?=$userdetails->EmployeeBankAccName?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Account No.</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="accno" id="accno" style="width:20%;" value="<?=$userdetails->EmployeeBankAccNo?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Branch</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="branch" id="branch" style="width:20%;" value="<?=$userdetails->EmployeeBankBranch?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">IFSC</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="ifsc" id="ifsc" style="width:20%;" value="<?=$userdetails->EmployeeBankIFSC?>"  ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">PAN Card No.</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="text" name="pan" id="pan" style="width:20%;" value="<?=$userdetails->EmployeePanCard?>"  ></div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="file" name="empimg" id="empimg" value="" >
                                <input type="hidden" name="oldempimg" id="oldempimg" value="<?=$userdetails->EmployeeImage?>" >
                                <?php if($userdetails->EmployeeImage!='' && file_exists("empimage/".$userdetails->EmployeeImage)){?>
                                    <img src="empimage/<?=$userdetails->EmployeeImage?>" class="img-circle" alt="User Image" style='max-width: 200px;'>
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
    function Editprofile(){
        $('#imgload').show();

        if(document.getElementById('fname').value==''){
            swal({
              text: "Please Enter Username Name",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('fname').focus();
            $('#imgload').hide();
            return false;
        }
        if(document.getElementById('lname').value==''){
            swal({
              text: "Please Enter LastName",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('lname').focus();
            $('#imgload').hide();
            return false;
        }

        if(document.getElementById('mobile').value==''){
            swal({
              text: "Please Enter Your Mobile No",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('mobile').focus();
            $('#imgload').hide();
            return false;
        }
         if(document.getElementById('pemail').value==''){
            swal({
              text: "Please Enter Your Email",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('pemail').focus();
            $('#imgload').hide();
            return false;
        }

        if(document.getElementById('alt1').value==''){
            swal({
              text: "Please Enter Your Alternative No",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('alt1').focus();
            $('#imgload').hide();
            return false;
        }

         if(document.getElementById('marital').value==''){
            swal({
              text: "Please Enter Your Marital Status",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('marital').focus();
            $('#imgload').hide();
            return false;
        }

        if(document.getElementById('address').value==''){
            swal({
              text: "Please Enter Your Address ",
              type: "success",
              timer: 1200
              });
            
            document.getElementById('address').focus();
            $('#imgload').hide();
            return false;
        }
       
        var fname= $('#fname').val();
        var lname=$('#lname').val();
        var mobile= $('#mobile').val();
        var pemail=$('#pemail').val();
        var alt1= $('#alt1').val();
        var alt2=$('#alt2').val();
        var marital= $('#marital').val();
        var address=$('#address').val();
        var img= $('#empimg').val();
        var eid= $('#eid').val();
        
        var formdata= new FormData($("form#editprofile")[0]);
        
        //console.log(formdata);
        
        if(img==''){
            var pimg= $('#empimg').val();
        }else{
            var pimg= $('#oldempimg').val();
        }
        
        $.ajax({
            url:'Employee/EditEmployee',
            type: 'POST',
            dataType: 'json',
            data: formdata,
            success: function(response){
                swal("Changes Made Successful", "You clicked the button!", "success")
                 $('#imgload').hide();
                 
                alert('Changes Made Successful');
            },
            error: function(){
                 swal("Changes Made Successful", "You clicked the button!", "success")
                alert('Changes Made Successful');
            }
        });
        
    }
</script>
  
