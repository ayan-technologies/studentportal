<?php 
$page='Employee';
include_once 'header.php';
if($this->session->userdata['userdetails']->EmployeeUserRole!=1 && $this->session->userdata['userdetails']->EmployeeUserRole!=2){
    header('Location:Index');
}
?>
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
      <h1>Edit Designation</h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="CompensationLeave">Edit Designation </a></li> 
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
                                <option value="">Select</option>
                    <?php 
                    foreach($listdept as $list){
                    ?>
                                <option value="<?php echo $list['DepartmentID']; ?>"<?php if($list['DepartmentID']==$desiglist['DepartmentID']) { ?> selected = 'selected'<?php } ?>><?php echo $list['DepartmentName']; ?></option><?php } ?>
                                
                            </select>
                        </div>
                    </div>

                                     
                      
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Designation Name</label>

                      <div class="col-sm-9">
                        <?php// print_r($desiglist); ?>
                        <input type="text" class="form-control" id="designame" name="designame" value="<?php echo $desiglist['DesignationName'];?>" placeholder="Designation Name">
                      </div>
                    </div>
                    

                 
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer twoToneCenter">
                    <a href="Designation" class="btn btn-default">Cancel</a>
                    <button type="button" class="btn btn-info pull-right twoToneButton" onclick="return editdesignation(<?php echo $desiglist['DesignationID'];?>);" >Submit</button>
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
function editdesignation(val){

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

        if(document.getElementById('designame').value==''){

          swal({
          text: "Please Enter Designation Name",
          type: "success",
          timer: 1200
          });
          document.getElementById('designame').focus();
            $('#imgload').hide();
            return false;
            
        }

  
  var department = document.getElementById('department').value;
  
  var designame = document.getElementById('designame').value;


  $.ajax({

    url: 'Employee/UpdateDesignation',
    type: 'POST',
    data: {DesignationID:val,DesignationDepartment:department, DesignationName:designame},
    success: function(response){

       $('#imgload').hide();

      swal("Designation Updated Successfully", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "Designation";
            }
            });              
               

    },
    error: function(err){
   
    alert('Data Error');
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

