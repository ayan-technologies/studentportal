<?php 
$page='Calander';
include_once 'header.php'; 
$leavelist=json_encode($leavehistory);

require_once 'application/models/ManageCalender.php';
$getcalender = new ManageCalender();


?>

  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

  <!-- Content Wrapper. Contains page content -->
  <div id="imgload" style="display:none"/ ></div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Leave Calendar
        <small>With Employee Leave History</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="LeaveCalender">Leave Calender</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <!-- /.col -->
        <div class="col-md-6">
            
            <div class="col-sm-12" style='height: 50px;'>
                <div class="col-sm-3">
                    <div class="colorbox" style="background-color:#f56954; clear:both;" ></div><div class="colorboxtext">Leave</div>
                </div>
                <div class="col-sm-3">
                    <div class="colorbox" style="background-color:#00c0ef; clear:both;" ></div><div class="colorboxtext">Permission</div>
                </div>
                <div class="col-sm-3">
                    <div class="colorbox" style="background-color:#f39c12; clear:both;" ></div><div class="colorboxtext">Official Leave</div>
                </div>
            </div>
            <div class="col-md-12"> 
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
                        <div id="calendar" style='width:99%; border: 1px #ccc solid; margin-left: 5px;'></div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                <?php

                    $nyr=date('Y')+1;
                    $yr=date('Y');
                   // echo date('m');
                    if(date('m')=='12'){
                        $sdate=$yr.'-01-01';
                        $edate=$nyr.'-12-31';
                    }else{
                        $sdate=$yr.'-01-01';
                        $edate=$yr.'-12-31';
                    }                    
                    $holiday=$getcalender->HolidayList($sdate,$edate)
                ?>
                <div style="float:left; font-size:18px; line-height: 50px; margin-left: 10px;">Holiday Calender : <?=date("d-m-Y", strtotime($sdate));?> - <?=date("d-m-Y", strtotime($edate));?> </div>
              
              <div style="float:left; font-size:18px; line-height: 50px; margin-left: 10px;">
                <?php 
                if($this->session->userdata['userdetails']->EmployeeUserRole==1 or $this->session->userdata['userdetails']->EmployeeUserRole==2) { ?>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Holiday</button><?php } ?></div>

                 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Holiday</h4>
        </div>
        <div class="modal-body">
  
        <div class="row">
          <div class="col-md-2"><label>Leave Date</label></div>
          <div class="col-md-10"><input type="text" name="hdate" id="hdate" class="form-control" 
    id="inputEmail3" placeholder="Leave Date" style="width: 50%;" /></div>

        </div>
        <div class="row">
          <br/>
         <div class="col-md-2"><label>Leave For</label></div>
         <div class="col-md-10">
           <input type="text" class="form-control" 
    id="leavefor" placeholder="Leave For" style="width: 50%;"/>
         </div>

        </div>
                    
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" onclick="return Addholiday();" >Add</button>
        </div>
      </div>
      
    </div>
  </div>
                
            </div>
            <div class="col-md-12"> 
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <table id="emplist" class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>#</th>
                                <th>Date</th>
                                <th>Day</th>
                                <th>Holiday</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $j=0; if($holiday){ foreach($holiday as $list){ $j++;?>
                              <tr>
                                <td><?=$j?></td>
                                <td align="center"><?=$list['Start']?></td>
                                <td align="center"><?=$list['Day']?></td>
                                <td><?=$list['Title']?></td>

                                <?php 
                                    if($this->session->userdata['userdetails']->EmployeeUserRole==1 or $this->session->userdata['userdetails']->EmployeeUserRole==2) { ?>
                                    <td><span style="cursor: pointer;" onclick="deleteholi(<?=$list['offid']?>);"><i class="fa fa-trash-o" style="font-size:17px"></i></span></td>
<?php } ?>

                              </tr>
                              <?php } } ?>
                          </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  
  

<?php include_once 'footer.php'; ?>

  <!-- fullCalendar -->
<script src="bower_components/moment/moment.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="bower_components/fullcalendar/dist/locale-all.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
 

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      locale: 'en-au',
      columnFormat: 'ddd',
      //Random default events
      events    : <?=$leavelist?>,
      editable  : false,
      droppable : false, // this allows things to be dropped onto the calendar !!!
      
    })

    /* ADDING EVENTS */
    
    $('.datepicker datepicker-inline').css("display", "none");
    
    $('.datepicker datepicker-inline').style.display="none";
   
    $(document).ready(function() {
        $(".datepicker datepicker-inline").hide();
    });
    
  })
</script>
<script type="text/javascript">
   $('#hdate').datepicker({
        dateFormat:'DD-MM-yy',
        autoclose: true
    })
</script>

<script type="text/javascript">
  function Addholiday(){
    $('#imgload').show();
var userrole = '<?=$this->session->userdata['userdetails']->EmployeeUserRole?>';
if(userrole !='1' && userrole !='2') {
  return false;
}
if(document.getElementById('hdate').value==''){

swal({
          text: "Please Select Leave Date",
          type: "success",
          timer: 1200
          });
document.getElementById('hdate').focus();
          //alert('Please Select Apply Type');
            $('#imgload').hide();
            return false;

}
if(document.getElementById('leavefor').value==''){

swal({
          text: "Please Enter Leave for",
          type: "success",
          timer: 1200
          });
document.getElementById('leavefor').focus();
          //alert('Please Select Apply Type');
            $('#imgload').hide();
            return false;

}
  var hdate = document.getElementById('hdate').value;

  var leavefor = document.getElementById('leavefor').value;

    $.ajax({
            url:'Calender/AddHoliday',
            type: 'POST',
           // dataType: 'json',
            data: {OfficialLeaveFrom:hdate, OfficialLeave:leavefor},
           success: function(response){  
           $('#imgload').show();  
        swal("Holiday Add Successfully", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "LeaveCalender";
            }
            });
                                  
            },
            error: function(err){
            
              alert('Data Error');
                
            }
        });


  }

</script>

<script type="text/javascript">
  function deleteholi(val){

    $('#imgload').show();

    if(confirm("Are you sure want to delete this Data?")){


  $.ajax({

    url:'Calender/DeleteHoliday',
    type: 'POST',
    dataType: 'json',
    data: {OfficialID:val},
    success: function(response){
      $('#imgload').hide();
      swal("Holiday Deleted Successfully", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "LeaveCalender";
            }
            });

    },

    error: function(err){


    }

  });
}


  }
</script>
    