<?php 
$page='Quicknotes';
include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$getmailnotes = new ManageProfile();

require_once 'application/models/ManageDashboard.php';
$getClassSub = new ManageDashboard();
?> 
<div id="imgload" style="display:none" ></div>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg_img">
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
      <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-8 col-lg-offset-1 col-sm-9 connectedSortable" style="float: none;margin: 0 auto;">
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <div class="box-header">
                  <i class="fa fa-envelope"></i>
                      <h3 class="box-title">Quick Notes</h3>
                </div>
              </div>
          <?php if($this->session->userdata['userdetails']->EmployeeUserRole==5){?>
            <div class="row">                      
                        <div class="col-lg-8 col-lg-offset-1 col-sm-9 col-sm-offset-1 col-md-8 col-md-offset-1 col-xs-12 col-xs-offset-1 connectedSortable" style="float: none;margin: 0 auto;">
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>#</th>  
                              <th>Subject</th>
                              <th>Message</th>
                            </tr>
                          </thead>
                        <tbody>
                          <?php                     
                            $i=0;
                            $quicknotes=$getClassSub->getquickNotesData();
                            // print_r($quicknotes);
                            foreach($quicknotes as $Quick_Notes)
                            {
                               $i++;                     
                          ?>
                          <tr id="row<?=$i?>" class="<?=$trb?>">
                          <td><?=$i?></td>  
                          <td><?=$Quick_Notes['subject_name']?></td>                          
                          <td><?=$Quick_Notes['QuickMessage']?></td>
                          <?php }?>
                          </tr> 
                        </tbody>
                        </table>
                        </div>
                    </div>            
         <?php }?>

        <?php if($this->session->userdata['userdetails']->EmployeeUserRole==4 ){?>                          
              <form action="QuickMail" name='qmail' id='qmail' method="post">
                <div class="box-body">
                  <div class='col-md-4 form-group'>
                    <label >Choose Class</label>&nbsp;&nbsp;
                    <select class="form-control1" id="classId" style="max-width: 50%">
                        <option>Select</option>
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
                    <label >Choose Section</label>&nbsp;&nbsp;
                    <select class="form-control1" id="section_id" name="section_id" style="max-width: 50%">
                        <option>Select</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>                       
                    </select>
                  </div>
                  <div class='col-md-4 form-group'>
                    <label>Subject</label>&nbsp;&nbsp;
                    <select class="form-control1" id="subject" name="subject" style="max-width: 50%">
                        <option>Select</option>
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
                  <div class='col-md-10 form-group'>
                          <textarea class="textarea" name='message' id='message' placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required='required'>
                          </textarea>
                  </div>
                </div>
                <div class="box-footer clearfix">
                  <button type="button" class="pull-right btn btn-primary" id="sendEmail" onclick='return quickmail();' >Send <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </form>
          </div>
        <?php } if($this->session->userdata['userdetails']->EmployeeUserRole==1){?>
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-list"></i>
              <h3 class="box-title">Quick Notes</h3>
            </div>                                       
            <div class="row"> 
              <div  class="col-sm-12">
               <!--  <div class='col-md-10 form-group'></div> -->
                  <div class="col-sm-3">
                    <label>Type</label>&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
                  <div class="col-sm-3">
                    <label>Staff</label>&nbsp;&nbsp;
                  </div>
                  <div class="col-sm-3">
                    <label>Class</label>&nbsp;&nbsp;
                  </div>
                  <div class="col-sm-3"> 
                     <label>Section</label>&nbsp;&nbsp;
                  </div> 
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <select class="form-control1" id="sel_type" style="max-width: 15%">
                        <option value="0">Select</option>
                        <option value="staf">Teachers</option>
                        <option value="stud">Add Staff</option>
                        <option value="stud">Students</option>
                  </select>&nbsp;&nbsp;&nbsp;
                   
                    <select id="sel_sec" class="form-control1" style="max-width: 20%">
                        <option>Select</option>
                        <option>Teacher 1</option>
                        <option>Teacher 2</option>
                        <option>Teacher 3</option>
                        <option>Teacher 4</option>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <select id="sel_class" class="form-control1" style="max-width: 25%">
                        <option>Select</option>
                        <option>LKG</option>
                        <option>UKG</option>
                        <option>I st </option>
                        <option>II nd</option>
                        <option>III rd</option>
                        <option>IV th</option>
                        <option>V th</option>
                        <option>VI th</option>
                        <option>VII th</option>
                        <option>VIII th</option>
                        <option>IX th</option>
                        <option>X th</option>
                        <option>XI th</option>
                        <option>XII th</option>
                    </select>&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;
                    <select id="sel_sec" class="form-control1" style="max-width: 25%">
                        <option>Select</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                    </select>&nbsp;&nbsp;
                <div class="box-body">
                  <form action="QuickMail" name='qmail' id='qmail' method="post">
                    <div class="box-body">
                      <div class="form-group">
                          <div class="emailbox" style="width:94%;"><input type="email" class="form-control" name="emailto" id="emailto" placeholder="To Emails: Use ',' to Separate Emails or Select From Email Address List" required='required'></div>
                          <div class="emailuser" style="width:6%; text-align: center;" data-toggle="modal" data-target="#modal-email"><i class="fa fa-user" style="cursor: pointer;"></i></div>
                      </div>
                      <div class="form-group">
                          <div class="emailbox" style="width:94%;"><input type="email" class="form-control" name="ccemailto" id="ccemailto" placeholder="CC Emails: Use ',' to Separate Emails or Select From Email Address List" required='required'></div>
                          <div class="emailuser" style="width:6%; text-align: center;" data-toggle="modal" data-target="#ccmodal-email"><i class="fa fa-user" style="cursor: pointer;"></i></div>
                      </div>
                      <div class="form-group col-md-12"></div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="subject" id='subject' placeholder="Subject" required='required'>
                      </div>
                      <div>
                        <textarea class="textarea" name='message' id='message' placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required='required'></textarea>
                      </div>
                    </div>
                    <div class="box-footer clearfix">
                      <button type="button" class="pull-right btn btn-primary" id="sendEmail" onclick='return quickmail();' >Send <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                 </form> 
                </div>
              </div>
            </div>
          </div>               
        </div>
        </div>
      </section>        
        <section class="col-lg-6 connectedSortable">
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-list"></i>
              <h3 class="box-title">Event</h3>
            </div>                                       
            <div class="row"> 
              <div  class="col-sm-12">
                <div class='col-md-10 form-group'>
                  <div class="col-sm-3">
                    <label>Type</label>&nbsp;&nbsp;&nbsp;
                  </div>
                  <div class="col-sm-3">
                    <label>Staff</label>&nbsp;&nbsp;
                  </div>
                  <div class="col-sm-3">
                    <label>Class</label>&nbsp;&nbsp;
                  </div>
                  <div class="col-sm-3"> 
                     <label>Section</label>&nbsp;&nbsp;
                  </div>
                  
                  <select class="form-control1" id="sel_type" style="max-width: 20%">
                        <option value="0">Select</option>
                        <option value="staf">Teachers</option>
                        <option value="stud">Add Staff</option>
                        <option value="stud">Students</option>
                  </select>&nbsp;&nbsp;&nbsp;
                   
                    <select id="sel_sec" class="form-control1" style="max-width: 20%">
                        <option>Select</option>
                        <option>Teacher 1</option>
                        <option>Teacher 2</option>
                        <option>Teacher 3</option>
                        <option>Teacher 4</option>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <select id="sel_class" class="form-control1" style="max-width: 20%">
                        <option>Select</option>
                        <option>LKG</option>
                        <option>UKG</option>
                        <option>I st </option>
                        <option>II nd</option>
                        <option>III rd</option>
                        <option>IV th</option>
                        <option>V th</option>
                        <option>VI th</option>
                        <option>VII th</option>
                        <option>VIII th</option>
                        <option>IX th</option>
                        <option>X th</option>
                        <option>XI th</option>
                        <option>XII th</option>
                    </select>&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;
                    <select id="sel_sec" class="form-control1" style="max-width: 25%">
                        <option>Select</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                    </select>&nbsp;&nbsp;&nbsp;
                    <br><br>
                    <label>Event Date:</label>&nbsp;
                    <input type="text" class="pdate" id="pdate" name="pdate" style="max-width: 25%">
                </div>               
                <div class="box-body">                 
                 <form action="homework" name='home_work' id='home_work' method="post">
                  <div class="box-body">
                    <div class="form-group col-md-12"></div>
                    <div>
                      <textarea class="textarea" name='message' id='message' placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required='required'></textarea>
                    </div>
                  </div>
                  <div class="box-footer clearfix">
                  <button type="button" class="pull-right btn btn-default" >Send</button>
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
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<?php include_once 'footer.php'; ?>
<script type="text/javascript">
  function quickmail()
  {
    var quickclass=$('#classId :selected').val();
    var quicksection=$('#section_id :selected').val();
    var quicksub=$('#subject :selected').val();
    var quick_notes=$('#message').val();   
     $.ajax({
            url:'Dashboard/QuickNotes',
            type: 'POST',
            dataType: 'json',
            data: {
                  class_:quickclass,
                  section_:quicksection,
                  subject_:quicksub,
                  message:quick_notes
            },
            success: function(response,data)
            {
              console.log("test");
              console.log(data);              
              swal({
                    text: "Successfully Send",
                    type: "success",
                    timer: 3000
                });   
            }
  });
}
</script>
  
