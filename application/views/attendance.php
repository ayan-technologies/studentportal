<?php 
$page='Attendance';
include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$getattendanceReport = new ManageProfile();

require_once 'application/models/ManageStudents.php';
$getstudent = new ManageStudents();

require_once 'application/models/ManageDashboard.php';
$getClassSub = new ManageDashboard();
?>
<style type="text/css">
.menuactive { 
  color: #039cfd !important;
  text-decoration: underline;
}  
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attendance Automation
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="MyProfile">Attendance</a></li> 
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">  
            <div class="col-xs-12">&nbsp;</div>
            &nbsp;&nbsp;&nbsp;
               <!-- <label class="">Class:&nbsp;</label>
                 <select class="form-control1" id="classId" name="classId" style="max-width: 10%">
                  <option value=''>--Select--</option>
                  <?php  
                        $ClassDetails=$getClassSub->getClassData();
                          foreach($ClassDetails as $classData){
                        ?>
                        <option value=<?php echo $classData['id']; ?>>
                          <?php echo $classData['class']; ?></option>
                          <?php } ?>
                </select> &nbsp;&nbsp;&nbsp;          
                <label>Section:</label>&nbsp;&nbsp;
                <select class="form-control1" id="section_id" name="section_id" style="max-width: 10%" onchange="getstudent_list()">
                        <option value="">--Select--</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>  
                </select> -->
            <!-- /.box-header -->
            <div class="col-sm-12 form-group"></div>
            <!-- <div class="box-body table-responsive no-padding" style="margin-top:10px;"></div> -->
              <table id="example3" class="table table-bordered">
                <thead>
                    <tr>                      
                      <th>S.no</th>
                      <th>Name</th> 
                      <th hidden="">Current Date</th>
                      <!-- echo date('t'); -->
                      <!-- echo date('d F');?> -->
                      <?php
                      $month_count=date('t');
                      $date_count=date('t');
                      $month_name=date('M'); 
                      $current_date=date('d');
                      for($i=1;$i<=$month_count;$i++)
                      {?>
                        <th <?php if($i==$current_date){?> class='menuactive' style="cursor: pointer;" <?php } ?>><?php echo $i;echo '-';echo $month_name;}?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php                   
                    $i=0; 
                    $j=0;
                    $selectedclassStudent=$getstudent->getclassstudentlist();
                    $getattendancevalue=$getstudent->getAttendance();
                    // print_r($getattendancevalue);
                    // print_r($getattendancevalue[0]['created_date']);
                    $date=$getattendancevalue[0]['created_date'];
                    $month = date('m', strtotime($date));
                    $day=date('d', strtotime($date));
                    
                    if(isset($selectedclassStudent))
                    {
                      foreach($selectedclassStudent as $std_data)
                      {                        
                        // print_r($std_data);
                        $i++;
                        $j++;
                        $month_name=date('M'); 
                        // $current_date=date('d'); 
                        $current_date = date("j");
                        $cur_day=date("D");
                        print_r($month);
                        print_r($day);
                  ?> 
                  <tr id="row<?=$i?>" class="<?=$trb?>">
                    <td><?=$j?></td> 
                    <td><?=$std_data['std_name']?></td>
                    <td hidden><input type="text" id="currentval_<?=$current_date?>_<?=$j?>" value="<?=$std_data['std_id']?>"></td>  
                    <?php
                    for($i=1;$i<=$month_count;$i++)
                      { echo $i;?>
                        <td id="<?=$std_data['std_id']?>_<?=$i?>" >
                        <div id="present_<?=$std_data['std_id']?>_<?=$i?>"  >
                          <span class="col-sm-1" name="atten_present" 
                          id="<?=$std_data['std_id']?>_<?=$i?>_p"
                          <?php if($i==$current_date){?> style="color: white;background-color: green;width:2px;text-align: center;cursor: pointer" 
                            onclick="changeattendance('<?=$std_data['std_id']?>_<?=$i?>','p')">P</span>
                          <?php }?> 
                          <span class="col-sm-1" name="atten_present" 
                          id="<?=$std_data['std_id']?>_<?=$i?>_p"
                          <?php if($i<$current_date || $i==$day){?>
                          <?php if($getattendancevalue[$i-1]['present_absent']=='P'){?> style="color: white;background-color: green;width:2px;text-align: center;cursor: pointer">
                          <?=$getattendancevalue[$i-1]['present_absent']?>
                          </span>
                          <?php }}?>
                           
                          <input type="hidden" name="nstdid_<?=$i?>" id="stdid_<?=$std_data['std_id']?>_<?=$i?>" value="P">
                        </div>
                        <div id="leave_<?=$std_data['std_id']?>_<?=$i?>" hidden="">
                          <span class="col-sm-1" name="atten_leave" id="<?=$std_data['std_id']?>_<?=$i?>_l"
                          <?php if($i==$current_date){?> onclick="changeattendance('<?=$std_data['std_id']?>_<?=$i?>','l')" style="color: white;background-color: red;width:2px;text-align: center;cursor: pointer">L
                          </span><?php }?> 
                        </td>
                      </div>
                      <?php }?>
                  </tr>
                <?php } }else{ ?>
                            <tr>
                               <td colspan="9" align="center"> No student found </td>
                            </tr>
                    <?php } ?>
                </tbody>
              </table>              
              <tfoot>
                <br>
                <button style=" margin-left: 44%;margin-bottom: 1%" class="btn btn-primary" onclick="saveattendance(<?php echo $current_date?>)">Save</button>
                <button style=" margin-left: 44%;margin-bottom: 1%" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Make Report</button>
                <div class="col-xs-12">
                  &nbsp;&nbsp;&nbsp;
                </div>
              </tfoot>            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->

      <div class="modal fade col-xs-12 col-sm-9 col-md-12" id="modal-default" style="overflow-x: scroll;">
          <div class="modal-dialog">
            <div class="modal-content" style="width: 150%;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Attendanc Report</h4>
              </div>
              <div class="modal-body">                
                <div class="box-body">                        
                  <div class="form-group">                
                    <div class="col-sm-12" style="margin-top:7px;">
                      <div>
                        <p style="text-align: center">
                          <span style=" font-size: 22px">Class:LKG &nbsp;&nbsp;&nbsp;&nbsp;Sec:'A'
                            <br>
                          <span style="font-size: 15px">
                            No.of Presents: 45
                            <br>
                            No.of Absents:  2
                          </span>  
                        <br><br>
                        <span style="font-size: 20px">
                          Thank You,<br>
                          Sample School
                        </span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Send Report</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
    </section>
</div>  
<?php include_once 'footer.php';?>
<script>
 function getstudent_list()
 {
    var workclass=$('#classId :selected').val();
    var worksection=$('#section_id :selected').val();
    // alert(worksection); 
    $.ajax({
            url:'Student/selstudentdata',
            type: 'POST',            
            data: {
                  class_:workclass,
                  section_:worksection
            },
            success: function(response,data)
            {              
              // console.log(response);
              console.log(data);
              var records = JSON.parse(response);
            }
        });
 } 
function changeattendance(type,atten)
{
  var workclass=$('#classId :selected').val();
  var worksection=$('#section_id :selected').val(); 

  var arr = type.split('_');
  var std_id=arr[0];
  var row_val=arr[1];

  var val=$('#'+type+'_'+atten).text(); 
  var trimStr = $.trim(val);
  
  if(workclass!='' || worksection!='')
  {    
    if(trimStr=='P')
      {        
        $('#leave_'+type).show();
        $('#present_'+type).hide();
        $('#stdid_'+type).val('L');
      }
      if(trimStr=='L')
      {                 
        $('#leave_'+type).hide();
        $('#present_'+type).show();
      }
  }
  else
  {
      swal({
            text: "Class or section is empty",
            type: "success",
            timer: 3000
          });
    }
}
function saveattendance(curdate)
{    
  
  var workclass=$('#classId :selected').val();
  var worksection=$('#section_id :selected').val();
  var cur_row=curdate;
  var today = new Date();
  var today_string = today.getDate();  
  var taskArray = new Array(); 
  var studentId=new Array()  ;
  var i=1;
  $("input[name=nstdid_"+cur_row+"]").each(function() {
    if(i!=undefined){
      var pre_abs=$('#currentval_'+cur_row+'_'+i).val();       
      var atten=$('#stdid_'+pre_abs+'_'+cur_row).val();
      var trimStr = $.trim(atten);      
      taskArray.push(trimStr); 
      studentId.push(pre_abs);   
      i++;  
    }      
  });
  console.log(taskArray);
  // console.log(studentId);
  if(workclass!='' || worksection!='')
  { 
    $.ajax({
            url:'Assignment/setAttendance',
            type: 'POST',            
            data: {
                  class_:workclass,
                  section_:worksection,
                  present_val:taskArray,
                  student_id:studentId
            },
            success: function(response,data)
            {              
              swal({
                    text: "Successfully Send",
                    type: "success",
                    timer: 3000
                });             
            }
        });
  }  
  else
  {
    swal({
            text: "Class or section is empty",
            type: "success",
            timer: 3000
          });
  }
}
</script>
