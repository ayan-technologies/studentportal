<?php
$page='Assignment';
include_once 'header.php';

require_once 'application/models/ManageProfile.php';
$getassignment = new ManageProfile();

require_once 'application/models/ManageAssignment.php';
$assignment = new ManageAssignment();

require_once 'application/models/ManageDashboard.php';
$getClassSub = new ManageDashboard();
?>
<style>
    @media (min-width){
    .centered {
       margin: 0 auto;
   }
   .bootstrap-timepicker-widget>.dropdown-menu>.open{
            margin-left:150px;
   }
   }
</style> 
<div id="imgload" style="display:none" ></div>
<div class="content-wrapper bg_img">
<section class="content">
    <div class="row">
        <section class="col-lg-8 col-lg-offset-1 col-sm-9 col-sm-offset-1 col-md-8 col-md-offset-1 col-xs-12 col-xs-offset-1 connectedSortable" style="float: none;margin: 0 auto;">
        <?php if($this->session->userdata['userdetails']->EmployeeUserRole==5 ){?>
                <div class="box box-info">
                    <div class="box-header">
                      <i class="fa fa-list"></i>
                      <h3 class="box-title">Assignment Details</h3>
                    </div>
                    <div class="row">                      
                        <div class="col-lg-8 col-lg-offset-1 col-sm-9 col-sm-offset-1 col-md-8 col-md-offset-1 col-xs-12 col-xs-offset-1 connectedSortable" style="float: none;margin: 0 auto;">
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>#</th>  
                              <th>Subject</th>
                              <th>Assignment</th>
                              <th>Date of Submit</th>
                            </tr>
                          </thead>
                        <tbody>
                          <?php                     
                            $i=0;
                            $thisweek_assignment=$assignment->getcurrentAssignment();
                            
                            foreach($thisweek_assignment as $assignment)
                            {
                               $i++;                     
                          ?>
                          <tr id="row<?=$i?>" class="<?=$trb?>">
                          <td><?=$i?></td>  
                          <td><?=$assignment['subject_name']?></td>
                          <td><?=$assignment['assignment_topic']?></td>
                          <td><?=$assignment['date_of_submission']?></td>
                          <?php }?>
                          </tr> 
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
        <?php } if($this->session->userdata['userdetails']->EmployeeUserRole==4 ){?>
          <div class="box box-info" style="background-image:'./dist/img/sketch1.jpg'">
            <div class="box-header">
              <i class="fa fa-list"></i>
              <h3 class="box-title">Assignment</h3>
            </div>
            <div class="row"> 
              <div  class="col-sm-12">
                <!-- <?php
                  print_r($this->session->userdata['userdetails']);
                ?> -->
                <div class="box-body">
                 <form action="homework" name='home_work' id='home_work' method="post">
                  <div class="box-body">
                  <div class="box-body">
                  <div class='col-md-4 form-group'>
                    <label >Choose Class</label>&nbsp;&nbsp;
                    <select class="form-control1" id="classId" name="classId" style="max-width: 50%">
                        <option value="">Select</option>
                        <?php  
                          $ClassDetails=$getClassSub->getClassData();
                          foreach($ClassDetails as $classData){
                        ?>
                        <option value=<?php echo $classData['id']; ?>>
                          <?php echo $classData['class']; ?></option>
                          <?php } ?>
                    </select>
                  </div>
                  <div class='col-md-4 form-group'>
                    <label>Choose Section</label>&nbsp;&nbsp;
                    <select class="form-control1" id="section_id" name="section_id" style="max-width: 50%">
                        <option value="">--Select--</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                  </div>
                  <div class='col-md-4 form-group'>
                    <label>Subject</label>&nbsp;&nbsp;
                    <select class="form-control1" id="subject" name="subject" style="max-width: 50%">
                        <option value="0">Select</option>
                        <?php   
                          $ClassSubject=$getClassSub->getClassSubject();
                          foreach($ClassSubject as $class_sub)
                          {
                        ?>
                        <option value=<?php echo $class_sub['id'];?>>
                          <?php echo $class_sub['subject_name'];?>
                        </option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class='col-md-4 col-sm-12 form-group'>
                      <label>Assignment Topic:</label>
                      <input  class="form-control1" style="max-width: 50%" type="text" id="assignment_name" name="assignment_name">
                  </div>                 
                  <div class="col-md-3 col-sm-12 form-group">
                      <label>Date of submission:</label>
                  </div>
                  <div class="col-md-4 col-sm-12 form-group">
                      <input class="form-control1 pdate" type="text" style="max-width: 50%" id="pdate" name="pdate">
                  </div>
                  <div class='col-md-10 form-group'>
                    <textarea class="textarea" name='message' id='message' placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required='required'>
                    </textarea>
                  </div>
                </div>                  
                </div>
                <div class="box-footer clearfix">
                  <button type="button" class="pull-right btn btn-primary" onclick="assignmentsend()">Send</button>
                </div>
              </form>
              </div>
              </div>
            </div>
          </div>
      <?php }?>
        </section>
    </div>
</section>
</div>
<!-- /.content-wrapper -->
<?php include_once 'footer.php';?>

<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script>
  $(function () {
    var dateToday = new Date();
    var ponemonth = new Date(dateToday.setMonth(dateToday.getMonth() - 1));
    $('.pdate').datepicker({
        startDate: ponemonth,
        dateFormat:'DD-MM-yy',
        autoclose: true,
        todayHighlight: true,
    })
  });
  function assignmentsend()
  {
    var workclass=$('#classId :selected').val();
    var assignmentsection=$('#section_id :selected').val();   
    var assignmentsub=$('#subject :selected').val();
    var assignment_desc=$('#message').val();   
    var sub_date=$('#pdate').val();
    var assignment_topic=$('#assignment_name').val(); 
    if(workclass!='' && assignmentsection!='' && assignmentsub!='' && assignment_desc!='' && sub_date!='' && assignment_topic!='')
    {
       $.ajax({
            url:'Assignment/submitAssignment',
            type: 'POST',
            // dataType: 'json',
            data: {
                  class_:workclass,
                  section_:assignmentsection,
                  subject_:assignmentsub,
                  message:assignment_desc,
                  topic:assignment_topic,
                  submissionDate:sub_date,
                  type:'student'
            },
            success: function(response)
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
              text: "Some data missing",
              type: "warning",
              timer: 3000
          }); 
    }
  }
</script>