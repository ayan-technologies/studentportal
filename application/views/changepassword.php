<?php 
$page='Profile';
$spage='My Profile';
include_once 'header.php'; 

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Your Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="MyProfile">My Profile</a></li> 
        <li class="active"><a href="ChangePassword">Change Password</a></li> 
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
                <input type="hidden" name="opass" id="opass" value="<?=base64_decode($userdetails->EmployeePassword)?>">
                <div class="box-body">
                    <div id="showerror" class="showmsg"></div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Old Password</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="password" name="pass" id="pass" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">New Password</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="password" name="npass" id="npass" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Repeat Password</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input type="password" name="rpass" id="rpass" style="width:20%;" value="" ></div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="return checkpass();" >Submit</button>
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
    $('#showerror').hide();
    function checkpass(){
      $('#imgload').show();

        if(document.getElementById('pass').value==''){
          swal({
              text: "Please enter password",
              type: "success",
              timer: 1200
              });
              $('#imgload').hide();
              document.getElementById('pass').focus();
            return false;
        }
        if(document.getElementById('npass').value==''){
          swal({
              text: "Please enter new password",
              type: "success",
              timer: 1200
              });
              $('#imgload').hide(); 
              document.getElementById('npass').focus();      
            return false;
        }
        if(document.getElementById('rpass').value==''){
          swal({
              text: "Please enter repeat password",
              type: "success",
              timer: 1200
              });
              $('#imgload').hide();  
              document.getElementById('rpass').focus();     
            return false;
        }
       
        var opass= $('#opass').val();
        var pass=$('#pass').val();
        var npass=$('#npass').val();
        var rpass= $('#rpass').val();        
        var eid= $('#eid').val();
        
        if(opass!=pass){
            $('#showerror').show();
            $("#showerror").html('Old Password Was Wrong');
            $("#showerror").css('background-color','#FF5252'); 
            $('#imgload').hide();
            return false;
        }else{
            $('#showerror').hide();
            $("#showerror").html('');
        } 
        
        if(npass!=rpass){
            $('#showerror').show();
            $("#showerror").html('New Password Mismatch');
            $("#showerror").css('background-color','#FF5252');
            $('#imgload').hide(); 
            return false;
        }else{
            $('#showerror').hide();
            $("#showerror").html('');
        } 
        var formdata={
            Password:npass,
            EID:eid
        };
        
        $.ajax({
            url:'Employee/ChangePassword',
            type: 'POST',
            //dataType: 'json',
            data: formdata,
            success: function(response){ 
            $('#imgload').hide();               
                $('#showerror').show();
                $("#showerror").html('Password Changed successfully');
                $("#showerror").css('background-color','##00BFA5');
                $("#opass").val(npass);
                swal("Password Changed successfully", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "Signout";
            }
            });
            },
            error: function(err){
                $('#showerror').show();
                $("#showerror").html('Password Changed successfully');
                $("#showerror").css('background-color','##00BFA5');
                $("#opass").val(npass);
        
            }
        });
        
    }
</script>
  
