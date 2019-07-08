<?php
$page='Dashboard';
include_once 'header.php';
require_once 'application/models/ManageLeave.php';
$getleavelist = new ManageLeave();

require_once 'application/models/ManageProfile.php';
$getuser = new ManageProfile();

require_once 'application/models/ManageEmployee.php';
$getemp = new ManageEmployee();

// require_once 'application/models/ManageStudents.php';
// $getemp = new ManageStudents();
?>
<div id="imgload" style="display:none" ></div>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
      <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
        <?php if($this->session->userdata['userdetails']->EmployeeUserRole==5 ){?>
                <div class="box box-info">
                    <div class="box-header">
                      <i class="fa fa-list"></i>
                      <h3 class="box-title">Home Work</h3>
                    </div>
                    <div class="row">                      
                        <div  class="col-sm-12">
                        <table id="example2" class="table table-bordered">
                        <tr>
                          <th>#</th>  
                          <th>Subject</th>
                          <th>Today Homework</th>
                        </tr>
                        <tr>
                          <td>1</td>  
                          <td>English</td>
                          <td>Testing entry for homework.</td>
                        </tr>
                        <tr>
                          <td>2</td>  
                          <td>Tamil</td>
                          <td>Testing entry for homework.</td>
                        </tr>
                        <tr>
                          <td>3</td>  
                          <td>Maths</td>
                          <td>Testing entry for homework.</td>
                        </tr>
                        <tr>
                          <td>4</td>  
                          <td>Social Science</td>
                          <td>Testing entry for homework.</td>
                        </tr>
                        <tr>
                          <td>5</td>  
                          <td>Science</td>
                          <td>Testing entry for homework.</td>
                        </tr>
                        <tr>
                          <td>6</td>  
                          <td>Hindi</td>
                          <td>Testing entry for homework.</td>
                        </tr>
                        <tr>
                          <td>7</td>  
                          <td>CS</td>
                          <td>Testing entry for homework.</td>
                        </tr>
                      </table>
                    </div>
                    </div>
                  </div>
        <?php } if($this->session->userdata['userdetails']->EmployeeUserRole==4 ){?>
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-list"></i>
              <h3 class="box-title">Home Work</h3>
            </div>                                       
            <div class="row"> 
              <div  class="col-sm-12">
                <div class='col-md-10 form-group'>
                <label>Class</label>&nbsp;&nbsp;
                    <select class="form-control1" style="max-width: 20%">
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
                    <label>Section</label>&nbsp;&nbsp;
                    <select class="form-control1" style="max-width: 20%">
                        <option>Select</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                    </select>&nbsp;
                    <label>Class</label>&nbsp;&nbsp;
                    <select class="form-control1" style="max-width: 20%">
                        <option>Select</option>
                        <option>Tamil</option>
                        <option>English</option>
                        <option>Maths</option>
                        <option>Science</option>
                        <option>Social Science</option>
                        <option>Computer Science</option>
                        <option>Hindi</option>
                        <option>Business Maths/Physics</option>
                        <option>Commerce/Chemistry</option>
                        <option>Accounts</option>
                        <option>Biology/Zoology</option>
                    </select>
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
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <div class="box-header">
                  <i class="fa fa-envelope"></i>
                      <h3 class="box-title">Quick Notes</h3>
                </div>
              </div>                  
              <div class="box-tools">             
              </div>               
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
                  <button type="button" class="pull-right btn btn-default" id="sendEmail" onclick='return quickmail();' >Send <i class="fa fa-arrow-circle-right"></i></button>
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
                  <button type="button" class="pull-right btn btn-default" id="sendEmail" onclick='return quickmail();' >Send <i class="fa fa-arrow-circle-right"></i></button>
                </div>
            </form>                 
                 <!-- <form action="homework" name='home_work' id='home_work' method="post">
                  <div class="box-body">
                    <div class="form-group col-md-12"></div>
                    <div>
                      <textarea class="textarea" name='message' id='message' placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required='required'></textarea>
                    </div>
                  </div>
                  <div class="box-footer clearfix">
                    <button type="button" class="pull-right btn btn-default" >Send</button>
                  </div>
                </form> -->
              </div>
               <!--  <div class="box-footer clearfix">
                  <button type="button" class="pull-right btn btn-primary" >Send</button>
                </div>  -->                  
                </div>
              </div>
          </div>        
        <!-- <?php }?> -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-6 connectedSortable">
           <!-- <?php if($this->session->userdata['userdetails']->EmployeeUserRole==1){?> -->
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
               <!--  <div class="box-footer clearfix">
                  <button type="button" class="pull-right btn btn-primary" >Send</button>
                </div>  -->                  
                </div>
              </div>
          </div>
        <?php }?>
          <?php if($this->session->userdata['userdetails']->EmployeeUserRole==4){?>
            <div class="row">
            <div class="col-md-6">
            </div>
            <!-- <div class="col-md-12">             
              <div class="box box-widget">
                <div class="box-header with-border">
                  <div class="user-block">
                    <div class="box-header">
                      <i class="fa fa-envelope"></i>
                      <h3 class="box-title">Quick Notes</h3>
                    </div>
                  </div>                  
                  <div class="box-tools">
                  </div>             
                </div>               
                <div class="box-body">                 
                 <form action="QuickMail" name='qmail' id='qmail' method="post">
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
            </div> -->
            <?php }if($this->session->userdata['userdetails']->EmployeeUserRole==5 || $this->session->userdata['userdetails']->EmployeeUserRole==4){?>
            <div class="col-md-12">            
            </div>
            <div class="col-md-12">
              <!-- Box Comment -->
              <div class="box box-widget">
                <div class="box-header with-border">
                  <div class="user-block">
                    <span class="username">Event List</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="box-tools">
                  </div>             
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="overflow-y: scroll;max-height: 250px;" > 
                <div class="row">                      
                        <div  class="col-sm-12">
                        <table id="example2" class="table table-bordered">
                        <tr>
                          <th>#</th>  
                          <th>Date</th>
                          <th>Event</th>
                        </tr>
                        <tr>
                          <td>1</td>  
                          <td>01-11-2018</td>
                          <td>Test Event1</td>
                        </tr>
                        <tr>
                          <td>2</td>  
                          <td>10-01-2019</td>
                          <td>Test Event2</td>
                        </tr>
                        <tr>
                          <td>3</td>  
                          <td>10-09-2018</td>
                          <td>Test Event3</td>
                        </tr>
                        <tr>
                          <td>4</td>  
                          <td>12-06-2018</td>
                          <td>Test Event4</td>
                        </tr>                      
                      </table>
                    </div>
                    </div>               
                  <!-- <h4>Event Notification</h4>
                  <div style="background-color: #3c8dbc;color: white;">
                  <p>Far far away, behind the word mountains, far from the
                    countries Vokalia and Consonantia, there live the blind
                    texts. Separated they live in Bookmarksgrove right at
                  </p>
                </div> -->
              </div>
              </div>
              <div class="box box-widget">
                <div class="box-header with-border">
                  <div class="user-block">
                    <span class="username">Notification</span>
                    <span class="description">Shared publicly - 7:30 PM Today</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="box-tools">
                  </div>             
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="overflow-y: scroll;max-height: 250px;" >                
                  <h4>Notification Data</h4>
                  <div style="background-color: #3c8dbc;color: white;">
                  <p>Far far away, behind the word mountains, far from the
                    countries Vokalia and Consonantia, there live the blind
                    texts. Separated they live in Bookmarksgrove right at
                  </p>
                </div>
                <div>
                  <p>Far far away, behind the word mountains, far from the
                    countries Vokalia and Consonantia, there live the blind
                    texts. Separated they live in Bookmarksgrove right at
                  </p>
                </div>
              </div>
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
            </div>
         <?php }?>

        </section>
        <!-- right col -->
    </div>
      <!-- /.row (main row) -->
    <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Approve Leave</h4>
                </div>
                <form name="approval" id="approval" method="post" class="form-horizontal">
                    <input type="hidden" name="lid" id="lid" value="">
                    <input type="hidden" name="row" id="row" value="">
                    <input type="hidden" name="lptype" id="lptype" value="">
                    <div class="box-body">                        
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Leave Status?</label>
                            <div class="col-sm-9" style="margin-top: 7px;">
                                <div class="col-sm-3"><input type="radio" class="col-sm-2" name="status" id="statusyes" value="Approved" > &nbsp; Approved </div>
                                <div class="col-sm-3"><input type="radio" class="col-sm-2" name="status" id="statusno" value="Rejected" > &nbsp; Rejected </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Note</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="note" name="note" placeholder="Note to Employee" style="resize: none; width:94%; height: 75px;"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="return appleave('leave');">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
      
    <div class="modal fade" id="modal-email">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Email List</h4>
                </div>
                <form name="approval" id="approval" method="post" class="form-horizontal">
                    <input type="hidden" name="lid" id="lid" value="">
                    <input type="hidden" name="row" id="row" value="">
                    <div class="box-body">                         
                        <div class="col-sm-12">
                            <div class="col-sm-12" style="background-color:#b2b2b2; line-height: 30px; border: 1px solid #ccc;">
                                <div class="col-sm-2 knob-label" style="padding:0px;"><input type="checkbox" name="user" id="user" value="All" onclick="return checkall();"> <b>Select</b></div>
                                <div class="col-sm-10 knob-label"><b>Email Address</b></div>
                            </div>
                            <div class="col-sm-12"> &nbsp; </div>
                            <div class="col-sm-12" style="max-height:650px; overflow: auto;">
                                 <?php 
                                    $i=0;
                                    $getemail=$getemp->GetEmpEmails();
                                    if($getemail!=''){
                                    foreach($getemail as $email){ $i++;
                                ?>
                                
                                    <div style="width:10%; float: left;"><input type="checkbox" name="user_<?=$i?>" id="user_<?=$i?>" value="<?=$email['EmployeeEmail']?>" onclick="return setemail();"></div>
                                    <div style="width:90%; float: left;"><?=$email['EmployeeUserName']?> < <?=$email['EmployeeEmail']?> ></div>
                                    <div class="col-sm-12" style="height: 10px;"></div>
                                <?php }}else{ ?> 
                                    <div class="col-sm-12" align='center'> No Records Found</div>
                                <?php } ?>
                            </div>

                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="ccmodal-email">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Email List</h4>
                </div>
                <form name="approval" id="approval" method="post" class="form-horizontal">
                    <input type="hidden" name="lid" id="lid" value="">
                    <input type="hidden" name="row" id="row" value="">
                    <div class="box-body">  
                        <div class="col-sm-12">
                            <div class="col-sm-12" style="background-color:#b2b2b2; line-height: 30px; border: 1px solid #ccc;">
                                <div class="col-sm-2 knob-label" style="padding:0px;"><input type="checkbox" name="ccuser" id="ccuser" value="All" onclick="return checkallcc();"> <b>Select</b></div>
                                <div class="col-sm-10 knob-label"><b>Email Address</b></div>
                            </div>
                            <div class="col-sm-12"> &nbsp; </div>
                            <div class="col-sm-12" style="max-height:650px; overflow: auto;">
                                 <?php 
                                    $i=0;
                                    $getemail=$getemp->GetEmpEmails();
                                    if($getemail!=''){
                                    foreach($getemail as $email){ $i++;
                                ?>
                                
                                    <div style="width:10%; float: left;"><input type="checkbox" name="ccuser_<?=$i?>" id="ccuser_<?=$i?>" value="<?=$email['EmployeeEmail']?>" onclick="return setccemail();"></div>
                                    <div style="width:90%; float: left;"><?=$email['EmployeeUserName']?> < <?=$email['EmployeeEmail']?> ></div>
                                    <div class="col-sm-12" style="height: 10px;"></div>
                                <?php }}else{ ?> 
                                    <div class="col-sm-12" align='center'> No Records Found</div>
                                <?php } ?>
                            </div>

                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
</section>
    <!-- /.content -->
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
</script>

<script>
function checkall(){
        var tt="<?=$i?>";
        var em='';
        if(document.getElementById('user').checked==true){
            for(var t=1;t<=tt;t++){
                document.getElementById('user_'+t).checked=true;
                if(em==''){
                    em=document.getElementById('user_'+t).value;
                }else{
                    em=em+','+document.getElementById('user_'+t).value;
                }
            }
        }else{
            for(var t=1;t<=tt;t++){
                document.getElementById('user_'+t).checked=false;
            }
            em='';
        }
        $('#emailto').val(em);
    }
    
    function checkallcc(){
        var tt="<?=$i?>";
        var em='';
        if(document.getElementById('ccuser').checked==true){
            for(var t=1;t<=tt;t++){
                document.getElementById('ccuser_'+t).checked=true;
                if(em==''){
                    em=document.getElementById('ccuser_'+t).value;
                }else{
                    em=em+','+document.getElementById('ccuser_'+t).value;
                }
            }
        }else{
            for(var t=1;t<=tt;t++){
                document.getElementById('ccuser_'+t).checked=false;
            }
            em='';
        }
        $('#ccemailto').val(em);
    }
      
    function setemail(){
        var tt="<?=$i?>";
        var em='';
        for(var t=1;t<=tt;t++){
           
            if(document.getElementById('user_'+t).checked==true){
                if(em==''){
                    em=document.getElementById('user_'+t).value;
                }else{
                    em=em+','+document.getElementById('user_'+t).value;
                }
            }
        }
        $('#emailto').val(em);
    }
      
      
    function setccemail(){
        var tt="<?=$i?>";
        var em='';
        for(var t=1;t<=tt;t++){
           
            if(document.getElementById('ccuser_'+t).checked==true){
                if(em==''){
                    em=document.getElementById('ccuser_'+t).value;
                }else{
                    em=em+','+document.getElementById('ccuser_'+t).value;
                }
            }
        }
        $('#ccemailto').val(em);
    }
    
    function setleaveid(id,row,type){
          $("#lid").val(id);
          $("#row").val(row);
          $("#lptype").val(type);
          
    }

    
    function appleave(type){
        
        if(document.getElementById('statusyes').checked==false && document.getElementById('statusno').checked==false){
          swal({
              text: "Please Mention Is Leave Status?",
              type: "success",
              timer: 1300
              });
            return false;
        }
        
        var intim;
        if(document.getElementById('statusyes').checked==true){
            intim='Approved';
        }else{
            intim='Rejected';
        }
       
         
        var approveid='<?=$this->session->userdata['userdetails']->EmployeeID?>';
        var lid= $('#lid').val();
        var row= $('#row').val();        
        var lptype= $('#lptype').val();
        var note=$('#note').val();
        
        $.ajax({
            url:'Leave/ApproveRejectLeave',
            type: 'POST',
            dataType: 'json',
            data: {LeaveStatus:intim,LeaveStatusReason:note,LeaveApprovedBy:approveid,LeaveID:lid},
            success: function(){
              swal({
              text: "Changes Made Successful",
              type: "success",
              timer: 1200
              });

                $('#leaveid').val('');
                $('#note').val('');
                document.getElementById('statusyes').checked=false;document.getElementById('statusno').checked=false;
                $('#modal-default').modal('hide');
                $('#'+lptype+'row'+row).remove();
            },
            error: function(){
              swal({
              text: "Changes Made Successful",
              type: "success",
              timer: 1200
              });
                $('#leaveid').val('');
                $('#note').val('');
                document.getElementById('statusyes').checked=false;document.getElementById('statusno').checked=false;
                $('#modal-default').modal('hide');
                $('#'+lptype+'row'+row).remove();
            }
        });
        e.preventDefault();
        
    }
    

    function quickmail(){
         
        if(document.getElementById('emailto').value==''){
          swal({
              text: "Please Select/ Enter Email Address",
              type: "success",
              timer: 1200
              });

            return false;
        }
        
        if(document.getElementById('subject').value==''){
          swal({
              text: "Please Mention Mail Subject",
              type: "success",
              timer: 1200
              });
            return false;
        }
        
        if(document.getElementById('message').value==''){
          swal({
              text: "Please Mention Mail Content",
              type: "success",
              timer: 1200
              });
            return false;
        }
        $('#imgload').show();
         
        var emailto= $('#emailto').val();
        var ccemailto= $('#ccemailto').val();
        var subject=$('#subject').val();
        var message=$('#message').val();
        
        $.ajax({
            url:'Dashboard/QuickMail',
            type: 'POST',
            dataType: 'json',
            data: {emailto:emailto,ccemailto:ccemailto,subject:subject,message:message},
            beforeSend: function(){
                //alert('hai');
            },
            success: function(){
                $('#imgload').hide();
              swal({
              text: "Your Email has been Sent",
              type: "success",
              timer: 1200
              });

                $('#qmail')[0].reset();
                $('#emailto').val('');
                $('#ccemailto').val('');
                $('#subject').val('');
                $('#message').val('');
                var tt="<?=$i?>";
                for(var t=1;t<=tt;t++){
                    document.getElementById('user_'+t).checked=false;
                } 
                for(var t=1;t<=tt;t++){
                    document.getElementById('ccuser_'+t).checked=false;
                }
            },
            error: function(){
                $('#imgload').hide();
              swal({
              text: "Your Email has been Sent",
              type: "success",
              timer: 1200
              });
                $('#qmail')[0].reset();
                $('#emailto').val('');
                $('#ccemailto').val('');
                $('#subject').val('');
                $('#message').val('');
                var tt="<?=$i?>";
                for(var t=1;t<=tt;t++){
                    document.getElementById('user_'+t).checked=false;
                }
                for(var t=1;t<=tt;t++){
                    document.getElementById('ccuser_'+t).checked=false;
                }
            }
        });
        
    }
    
function enableothers()
{
  var seltype = $('#sel_type :selected').val();
  if(seltype=='stud')
  {       
        $("#sel_class").prop("disabled", false);
        $("#sel_sec").prop("disabled", false);
  }
}
</script>