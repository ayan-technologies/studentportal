<?php
$page='Dashboard_New';
include_once 'header.php';

require_once 'application/models/ManageLeave.php';
$getleavelist = new ManageLeave();

require_once 'application/models/ManageProfile.php';
$getuser = new ManageProfile();

require_once 'application/models/ManageEmployee.php';
$getemp = new ManageEmployee();
?>
<div id="imgload" style="display:none" ></div>
<div class="content-wrapper bg_img">
<section class="content">
    <div class="row">
        <section class="col-lg-8 col-lg-offset-1 col-sm-9 col-sm-offset-1 col-md-8 col-md-offset-1 col-xs-12 col-xs-offset-1 connectedSortable" style="float: none;margin: 0 auto;">
        <?php if($this->session->userdata['userdetails']->EmployeeUserRole==5 ){
          ?>
                <div class="box box-info">
                    <div class="box-header">
                      <i class="fa fa-list"></i>
                      <h3 class="box-title">Home Work</h3>
                    </div>
                    <div class="row">                      
                        <div class="col-lg-8 col-lg-offset-1 col-sm-9 col-sm-offset-1 col-md-8 col-md-offset-1 col-xs-12 col-xs-offset-1 connectedSortable">
                        <table id="example2" class="cell-border table table-bordered table-hover" style="float: none;margin: 0 auto;">
                        <thead>
                          <th>#</th>  
                          <th>Subject</th>
                          <th>Today Homework</th>
                        </thead>
                        <tbody>
                          <?php                     
                            $i=0;
                            $today_homework=$getuser->gettodayhomework();
                            // print_r($today_homework);
                            foreach($today_homework as $homework_data)
                            {
                              $i++;                     
                          ?>
                          <tr id="row<?=$i?>" class="<?=$trb?>">
                          <td><?=$i?></td>  
                          <td><?=$homework_data['subject_name']?></td>
                          <td><?=$homework_data['homework']?></td>
                          <?php }?>
                          </tr>
                        </tbody>                        
                        </table>
                        </div>
                    </div>
                </div>
        <?php } if($this->session->userdata['userdetails']->EmployeeUserRole==4 ){
             // print_r($ClassSubject);
          ?>
          <div class="box box-info" style="background-image:'./dist/img/sketch1.jpg'">
            <div class="box-header">
              <i class="fa fa-list"></i>
              <h3 class="box-title">Home Work</h3>
            </div>                                       
            <div class="row"> 
              <div  class="col-sm-12">             
                <div class="box-body">                
                 <form action="homework" name='home_work' id='home_work' method="post">
                  <div class="box-body">
                    <div class="box-body">
                  <div class='col-md-4 form-group'>
                    <label>Choose Class</label>&nbsp;&nbsp;
                    <select class="form-control1" id="classId" name="classId" style="max-width: 50%">
                        <option value="">Select</option>
                        <?php
                          foreach($ClassDetails as $classData){
                        ?>
                        <option  value=<?php echo $classData['id']; ?>>
                          <?php echo $classData['class']; ?></option>
                          <?php } ?>
                    </select>
                  </div>
                  <div class='col-md-4 form-group'>
                    <label >Choose Section</label>&nbsp;&nbsp;
                    <select class="form-control1" id="section_id" name="section_id" style="max-width: 50%">
                        <option value="">Select</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>  
                    </select>
                  </div>
                  <div class='col-md-4 form-group'>
                    <label>Subject</label>&nbsp;&nbsp;
                    <select class="form-control1" id="subject" name="subject" style="max-width: 50%">
                        <option value="">Select</option>
                        <?php           
                          foreach($ClassSubject as $class_sub)
                          {
                        ?>
                        <option value=<?php echo $class_sub['id'];?>>
                          <?php echo $class_sub['subject_name']; ?></option>
                          <?php } ?>
                    </select>                  
                  </div>
                  <div class='col-md-10 form-group'>
                      <textarea class="textarea" name='message' id='message' placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required='required'>
                      </textarea>
                  </div>
                </div>                  
                </div>
                <div class="box-footer clearfix">
                  <button type="button" class="pull-right btn btn-primary" onclick="submitHomework()" >Send</button>
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

<script>
function submitHomework()
{  
  var workclass=$('#classId :selected').val();
  var worksection=$('#section_id :selected').val();
  var worksub=$('#subject :selected').val();
  var work_desc=$('#message').val();
  if(workclass!='' && worksection!='' && worksub!='' && work_desc!='')
  {
    $.ajax({
            url:'Dashboard/SubHomework',
            type: 'POST',
            dataType: 'json',
            data: {
                  class_:workclass,
                  section_:worksection,
                  subject_:worksub,
                  message:work_desc
            },
            success: function(response,data)
            {
              console.log(data);
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
    alert("some data is missing");
  }
}
</script>