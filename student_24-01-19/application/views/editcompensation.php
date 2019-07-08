<?php 
$page='Profile';
$spage='Edit Compensation Leave';
include_once 'header.php';

if($this->session->userdata['userdetails']->EmployeeUserRole!=1 && $this->session->userdata['userdetails']->EmployeeUserRole!=2){
    header('Location:Index');
}

require_once 'application/models/ManageLeave.php';
 $getlist = new ManageLeave();

?>

  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
<style>
    @media (min-width){
    .centered {
       margin: 0 auto;
   }
   .bootstrap-timepicker-widget>.dropdown-menu>.open{
            margin-left:150px;
   }

  
</style>
  <!-- Content Wrapper. Contains page content -->
  <div id="imgload" style="display:none"/ ></div>
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit Compensation Leave</h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="CompensationLeave">Edit Compensation Leave</a></li> 
      </ol>
    </section>
   <div id="cont"></div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12" >
          <div class="box text-center ">
            <div class="col-md-6">
            <div class="box-body centered">
              <div class="box box-info">
                <!-- form start -->
                <form id="myForm1" name="myForm1" method="post" class="form-horizontal">

                  <div class="box-body">
  
                    <div class="form-group">
                        <label for="inputApply" class="col-sm-3 control-label">Select Department</label>
                        <div class="col-sm-9">
                         <select class="form-control select2" name="department" id="department" onchange="showemp(this.value);" style="width: 100%;">
                                <option>Select</option>
                               
                    <?php 
                    foreach($listdept as $dept){
                    ?>
                                <option value="<?=$dept['DepartmentID'];?>" <?php if($dept['DepartmentID']==$compdata['DepartmentID']) { ?>selected='selected'<?php } ?>><?=$dept['DepartmentName']?></option><?php } ?>
                                
                            </select>

                      </div>
                    </div>

                    <div class="form-group">
                        <label for="inputApply" class="col-sm-3 control-label">Select Employee</label>
                        <div class="col-sm-9" id="Selectemplist" >
                       
                            <select class="form-control select2" name="empid" id="empid" style="width: 100%;">
                                <option value="" >Select</option>
                               <?php 
                    foreach($listemp as $emp){
                    ?>
                    <option value="<?=$emp['EmployeeEmpID']?>" <?php if($emp['EmployeeEmpID']==$compdata['EmployeeEmpID']) {?>selected='selected'<?php }?>><?=$emp['EmployeeFirstName']?></option> <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                      
                  
                      
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">No of Days</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="noday" name="noday" value="<?=$compdata['NoDays']?>" placeholder="No of Days">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Given By</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="given" name="given" value="<?php echo $compdata['GivenBy']; ?>" placeholder="Given By">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Reason</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="reason" name="reason" value="<?php echo $compdata['Reason']; ?>" placeholder="Reason">
                      </div>
                    </div>
                 
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer twoToneCenter">
                    <a href="CompensationHistory" class="btn btn-default">Cancel</a>
                    <button type="button" class="btn btn-info pull-right twoToneButton" onclick="return editcompensation(<?php echo $compdata['CompensationID'] ?>);" >Submit</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
            </div>
            </div>
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php include_once 'footer.php';?>

  <script type="text/javascript">
      
   function {
        
        $.ajax({
            url:'Leave/ListDept',
            type: 'POST',
            dataType: 'json',
            //data: {},
               success: function(response,data){
               
            },
            error: function(){
            }
        });
        
    }

    
    
</script>
<script type="text/javascript">
  
function showemp(val){

      $.ajax({
            url:'Leave/Emplist',
            type: 'POST',
           // dataType: 'json',
            data: {EmployeeDepartment:val},
               success: function(response){               
               
               $('#Selectemplist').html(response);
                
            },
            error: function(err){
                alert("Data Error");
            }
        });


    }

</script>

<script type="text/javascript">
  
 function editcompensation(val){

  $('#imgload').show();

  if(document.getElementById('department').value==''){

          swal({
          text: "Please Select Department",
          type: "success",
          timer: 1200
          });
          document.getElementById('department').focus();
            $('#imgload').hide();
            return false;
            
        }
        if(document.getElementById('empid').value==''){

          swal({
          text: "Please Select Employee",
          type: "success",
          timer: 1200
          });
          document.getElementById('empid').focus();
            $('#imgload').hide();
            return false;
            
        }
        if(document.getElementById('noday').value==''){

          swal({
          text: "Please Enter No of Days",
          type: "success",
          timer: 1200
          });
          document.getElementById('noday').focus();
            $('#imgload').hide();
            return false;
            
        }

        if(document.getElementById('given').value==''){

          swal({
          text: "Please Enter Given By",
          type: "success",
          timer: 1200
          });
          document.getElementById('given').focus();
            $('#imgload').hide();
            return false;
            
        }

         if(document.getElementById('reason').value==''){

          swal({
          text: "Please Enter Reason",
          type: "success",
          timer: 1200
          });
          document.getElementById('reason').focus();
            $('#imgload').hide();
            return false;
            
        }

  
  var department = document.getElementById('department').value;
  
  var employee = document.getElementById('empid').value;

  var noday = document.getElementById('noday').value;
  
  var given = document.getElementById('given').value;

  var reason = document.getElementById('reason').value;


  $.ajax({

    url: 'Leave/UpdateCompensation',
    type: 'POST',
    data: {CompensationID:val,DepartmentID:department,EmployeeEmpID:employee,NoDays:noday,Reason:reason, GivenBy:given},
    success: function(response){
      $('#imgload').hide();

       swal("Compensation Edited Successfully", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "CompensationHistory";
            }
            });              
               


    },
    error: function(err){

    }


  });


 }


    

</script>

<!-- bootstrap datepicker -->
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script>
  $(function () {
    var dateToday = new Date();
    var ponemonth = new Date(dateToday.setMonth(dateToday.getMonth() - 1));
   
    //Date picker Leave
    $('#fromdate').daterangepicker({
        minDate: ponemonth,
        
        autoclose: true,
        
      })
    
    //Date picker for permission
    $('#pdate').datepicker({
        dateFormat:'DD-MM-yy',
        autoclose: true
    })
    
    //Timepicker
    $('.fromtime').timepicker({
        showInputs: false
    })
    $('.totime').timepicker({
        showInputs: false
        
    })

    
  })
</script>
<script type="text/javascript">

  function calculateTime() {


    var starttime = $('.fromtime').val();
    var endtime = $('.totime').val();
    

    var diff = (( new Date("1970-1-1"+' '+endtime ) - new Date("1970-1-1"+' '+starttime) ) / 1000 / 60 / 60 );
    
   if(diff > 2){
swal({
              text: "Max permission granted is 2 hrs",
              type: "success",
              timer: 1300
              });

   return false;

   }
}
</script>

