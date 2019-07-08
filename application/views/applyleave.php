<?php 
$page='Profile';
$spage='Apply Leave';
include_once 'header.php';
?>

<link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
<style>
    @media (min-width){
    .centered {
       margin: 0 auto;
   }
 }
   .bootstrap-timepicker-widget>.dropdown-menu>.open{
            margin-left:150px;
   }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div id="imgload" style="display:none;" ></div>
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Apply Leave / Permission</h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="ApplyLeave">Apply Leave</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12" >
          <div class="box text-center ">
            <div class="col-md-6">
            <div class="box-body centered">
              <div class="box box-info">
                <!-- form start -->
                <form id="myForm1" name="myForm1" method="post" class="form-horizontal" onsubmit="return stopsubmit();">
                  <div class="box-body">
                    <div class="form-group">
                        <label for="inputApply" class="col-sm-3 control-label">Apply Type</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" name="type" id="type" onchange="return showtype(this.value);" style="width: 100%;">
                                <option value="">Select</option>
                                <option value="Leave">Leave</option>
                                <option value="Permission">Permission</option>
                            </select>
                        </div>
                    </div>
                      
                    <div id="showleave" style="display:none;">
                        <div class="form-group">
                            <label for="inputApply" class="col-sm-3 control-label">Leave Type</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" name="ltype" id="ltype" style="width: 100%;">
                                    <option value="">Select</option>
                                    <option value="Full Day">Full Day</option>
                                    <option value="Forenoon">Forenoon</option>
                                    <option value="Afternoon">Afternoon</option>
                                </select>
                            </div>
                        </div>
                    <div class="form-group">
                            <label for="inputLeaveFrom" class="col-sm-3 control-label">Leave From</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="fromdate" name="fromdate" >
                              </div>
                            </div>
                        </div>
                    </div>
                      
                    <div id="showpermission" style="display:none;">
                        
                        <div class="form-group">
                            <label for="inputLeaveFrom" class="col-sm-3 control-label">Permission Date</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="pdate" name="pdate">
                              </div>
                            </div>
                        </div>
                        <div class="bootstrap-timepicker">
                            <div class="form-group" id="showfromtime">
                                <label for="inputLeaveFrom" class="col-sm-3 control-label">From </label>
                                <div class="col-sm-9">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="text" class="form-control fromtime" id="fromtime" name="fromtime">
                                  </div>
                                </div>
                            </div>

                            <div class="form-group" id="showtotime">
                                <label for="inputLeaveTo" class="col-sm-3 control-label">To</label>
                                <div class="col-sm-9">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="text" class="form-control totime" id="totime" name="totime" onblur="calculateTime();">
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Reason</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="reason" name="reason" placeholder="Reason">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-3 control-label">Is Informed?</label>

                      <div class="col-sm-9" style="margin-top: 7px;">
                          <div class="col-sm-4">
                            <input type="radio" class="col-sm-2" name="informed" id="informedyes" value="1" >Yes </div>
                          <div class="col-sm-4">
                            <input type="radio" class="col-sm-2" name="informed" id="informedno" value="0" > No </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="isSubmit" id="isSubmit" value="0">
                  <!-- /.box-body -->
                  <div class="box-footer twoToneCenter">
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-default">Cancel</button>
                    </div>
                    <button type="button" class="btn btn-info pull-right twoToneButton" onclick="return Checkleave();" >Submit</button>
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
      
    function stopsubmit(){
        return false;
    }
    
    function showtype(val){
        
        if(val=='Leave'){
            $('#showleave').show();
            $('#showpermission').hide();
        }
        else if(val=='Permission'){
            $('#showleave').hide();
            $('#showpermission').show();
        }
        else{
            $('#showleave').hide();
            $('#showpermission').hide();
        }
    }
    
    function test(){
      $('#imgload').show();

        if(document.getElementById('type').value==''){          
          swal({
          text: "Please Select Apply Type",
          type: "success",
          timer: 1200
          });
          document.getElementById('type').focus();
            $('#imgload').hide();
            return false;
        }
        
        if(document.getElementById('type').value=='Leave'){
            if(document.getElementById('ltype').value==''){
              swal({
              text: "Please Select Leave Session",
              type: "success",
              timer: 1200
              });
              document.getElementById('ltype').focus();
                $('#imgload').hide();
                return false;
            }

            if(document.getElementById('fromdate').value==''){
              swal({
              text: "Please Select Leave Date",
              type: "success",
              timer: 1200
              });
               document.getElementById('fromdate').focus();
                $('#imgload').hide();
                return false;
            }             
        }else{
            if(document.getElementById('pdate').value==''){
              swal({
              text: "Please Enter Date",
              type: "success",
              timer: 1200
              });
              document.getElementById('pdate').focus();
                $('#imgload').hide();
                return false;
            }
            if(document.getElementById('fromtime').value==''){
              swal({
              text: "Please Enter From Time",
              type: "success",
              timer: 1200
              });
              document.getElementById('fromtime').focus();
                $('#imgload').hide();
                return false;
            }
                        
            if(document.getElementById('totime').value==''){
              swal({
              text: "Please Enter To Time",
              type: "success",
              timer: 1200
              });
              document.getElementById('totime').focus();
                $('#imgload').hide();
                return false;
            }
            var starttime = $('.fromtime').val();
            var endtime = $('.totime').val();
            var diff = (( new Date("1970-1-1"+' '+endtime ) - new Date("1970-1-1"+' '+starttime) ) / 1000 / 60 / 60 );
           if(diff > 2){
            swal({
              text: "Max permission granted is 2 hrs",
              type: "success",
              timer: 3000
              });
            $('#imgload').hide();
             return false;
           }
        }
        
        if(document.getElementById('reason').value==''){
          swal({
              text: "Please Enter Reason",
              type: "success",
              timer: 1200
              });
            $('#imgload').hide();
            document.getElementById('reason').focus();
            return false;
        }
        
        if(document.getElementById('informedyes').checked==false && document.getElementById('informedno').checked==false){
          swal({
              text: "Please Mention Is Intimated?",
              type: "success",
              timer: 1200
              });
          $('#imgload').hide();
            return false;
        }
        var intim
;        if(document.getElementById('informedyes').checked==true){
            intim='1';
        }else{
            intim='0';
        }

        if(document.getElementById('isSubmit').value=='1'){
          return false;
        }
         
        var empid='<?=$this->session->userdata['userdetails']->EmployeeID?>';
        var type= $('#type').val();
        var fdate=$('#fromdate').val();
        var ltype=$('#ltype').val();
        var pdate=$('#pdate').val();
        var ftime=$('#fromtime').val();
        var ttime=$('#totime').val();
        var reason=$('#reason').val();
            
        $.ajax({
            url:'Leave/AddLeave',
            type: 'POST',
            dataType: 'json',
            data: {LeaveEmployee:empid,LeaveType:type,LeaveReason:reason,LeaveFromDate:fdate,LeaveSession:ltype,LeaveIsIntimated:intim,LeaveStatus:'Pending',LeavePermissionDate:pdate,LeavePermissionFrom:ftime,LeavePermissionTo:ttime},
            beforeSend: function(){
                //alert('hai');
            },
            success: function(response,data){
                var id=response;
                //sendmail(id);
                $('#imgload').hide();
                document.getElementById('isSubmit').value='0'
                swal("Your Application has been Submitted!", "You clicked the button!", "success")
                $('#type').val('');
                $('#fromdate').val('');
                $('#todate').val('');
                $('#pdate').val('');
                $('#fromtime').val('');
                $('#totime').val('');
                $('#reason').val('');
                $('#showleave').hide();
                $('#showpermission').hide();
                document.getElementById('informedyes').checked=false;
                document.getElementById('informedno').checked=false;
            },
            error: function(){
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

    $('#pdate').datepicker({
        startDate: ponemonth,
        dateFormat:'DD-MM-yy',
        autoclose: true,
        todayHighlight: true,
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
        timer: 3000
      });
   return false;
   }
}
</script>
<script type="text/javascript">
function Checkleave(){
      var type = $('#type').val();
      var val = $('#fromdate').val();
      var pdate = $('#pdate').val();
      var pfrom = $('#fromtime').val();
      var pto = $('#totime').val();
              $.ajax({
              url:'Leave/CheckLeave',
              type: 'POST',
              data: {
                fdate:val,
                type:type,
                LeavePermissionDate:pdate,
                LeavePermissionFrom:pfrom,
                LeavePermissionTo:pto
              },
              success:function(response){
                console.log(response);
              if(response>0){  
                swal({
                    text: "Already Applied in this date please try another one",
                    type: "success",
                    timer: 3000
                });
                return false;

              } else {
                document.getElementById('isSubmit').value='0';
                test();
              }
              },
              error:function(err){
                alert('data error');
                return false;
              }
            });
}

</script>

