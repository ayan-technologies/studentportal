<?php
$page='Dashboard';

include_once 'header.php';

require_once 'application/models/ManageLeave.php';
$getleavelist = new ManageLeave();

require_once 'application/models/ManageProfile.php';
$getuser = new ManageProfile();

require_once 'application/models/ManageEmployee.php';
$getemp = new ManageEmployee();

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
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
       <?php if($this->session->userdata['userdetails']->EmployeeUserRole==1){?> 
      <!-- Small boxes (Stat box) -->

      <!-- <div class="row">        
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-purple">
            <div class="inner">
              <p>Management</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="EmployeeList?Department=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>       
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-teal">
            <div class="inner">
              <p>Admin</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="EmployeeList?Department=2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>       
        <div class="col-lg-2 col-xs-6">         
          <div class="small-box bg-green">
            <div class="inner">
              <p>Animation Team</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="EmployeeList?Department=3" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>       
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <p>Web Development Team</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="EmployeeList?Department=4" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-2 col-xs-6">         
          <div class="small-box bg-aqua">
            <div class="inner">             
              <p>App Development Team</p>
            </div>
            <div class="icon">
              <i class="ion ion-person" ></i>
            </div>
            <a href="EmployeeList?Department=5" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>       
      </div> -->
       <?php } ?>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
            <?php if($this->session->userdata['userdetails']->EmployeeUserRole==1){?>
                <div class="box box-info">
                    <div class="box-header">
                      <i class="fa fa-list"></i>
                      <h3 class="box-title">Permission Request</h3>
                    </div>                   
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <div class="knob-label"><b>Student Name</b></div>
                            </div>
                            <!-- ./col -->
                            <div class="col-sm-4 text-center" style="border-right: 1px solid #f4f4f4">
                              <div class="knob-label"><b>Date</b></div>
                            </div>
                            <!-- ./col -->
                            <div class="col-sm-2 text-center" style="border-right: 1px solid #f4f4f4">
                              <div class="knob-label"><b>Status</b></div>
                            </div>
                            <div class="col-sm-2 text-center">
                              <div class="knob-label"><b>Action</b></div>
                            </div>
                            <div class="col-sm-12">&nbsp;</div>
                        </div>
                        <?php
                          $getleave=$getleavelist->ListLeave();
                          $i=0;$h=0;
                          foreach($getleave as $leave){
                              $i++; 
                              if($leave['LeaveStatus']=='Pending' && $leave['LeaveType']=='Permission'){
                                  $h=1;
                        ?>
                            <div class="col-sm-12" id="permisrow<?=$i?>" style="clear:both;"> 
                                <div class="col-sm-4 text-center">
                                  <div class="knob-label">
                                    <?php
                                        $employeename = $getuser->GetEmployeeName($leave['LeaveEmployee']);                            
                                    ?>
                                    <?=$employeename->EmpName?>
                                  </div>
                                </div>

                                <div class="col-sm-4 text-center">
                                  <div class="knob-label">
                                      <?php echo date('d-m-Y',strtotime($leave['LeavePermissionDate']))." ".date('h:i A',strtotime($leave['LeavePermissionFrom']))."-".date('h:i A',strtotime($leave['LeavePermissionTo']));  ?>
                                  </div>
                                </div>

                                <div class="col-sm-2 text-center">
                                  <div class="knob-label"><?=$leave['LeaveStatus']?></div>
                                </div>

                                <div class="col-sm-2 text-center">
                                  <div class="knob-label">
                                      <div class="fa fa-edit" data-toggle="modal" data-target="#modal-default" onclick="return setleaveid('<?=$leave['LeaveID']?>','<?=$i?>','permis');" style="cursor: pointer;"></div>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                     <div style="border-top: 1px #eee solid; height: 10px;"></div>
                                </div>
                            </div>

                        <?php }} ?>

                        <?php if($h==0){?>
                            <div class="col-sm-12 text-center" style="text-align:center; color:#373737;"> No Application </div>
                        <?php } ?>

                      <!-- ./col -->
                    </div>
                    <!-- /.row -->
                     
                </div>
        <?php } ?>
          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Email</h3>
              <!-- tools box -->
              
              <!-- /. tools -->
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

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-6 connectedSortable">
            <?php if($this->session->userdata['userdetails']->EmployeeUserRole==1){?>            
                <div class="box box-info">
                    <div class="box-header">
                      <i class="fa fa-list"></i>

                      <h3 class="box-title">Leave Request</h3>
                  
                    </div>
                    <!-- Map box -->
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <div class="knob-label"><b>Student Name</b></div>
                            </div>
                            <!-- ./col -->
                            <div class="col-sm-4 text-center" style="border-right: 1px solid #f4f4f4">
                              <div class="knob-label"><b>Date</b></div>
                            </div>
                            <!-- ./col -->
                            <div class="col-sm-2 text-center" style="border-right: 1px solid #f4f4f4">
                              <div class="knob-label"><b>Status</b></div>
                            </div>
                            <div class="col-sm-2 text-center">
                              <div class="knob-label"><b>Action</b></div>
                            </div>
                            <div class="col-sm-12">&nbsp;</div>
                        </div>
                        <?php
                          $getleave=$getleavelist->ListLeave();
                          $i=0;$h=0; 
                          foreach($getleave as $leave){
                              $i++; 
                              if($leave['LeaveStatus']=='Pending' && $leave['LeaveType']=='Leave'){
                                  $h=1;
                        ?>
                            <div class="col-sm-12" id="leaverow<?=$i?>" style="clear:both;"> 
                                <div class="col-sm-4 text-center">
                                  <div class="knob-label">
                                    <?php
                                        $employeename = $getuser->GetEmployeeName($leave['LeaveEmployee']);                            
                                    ?>
                                    <?=$employeename->EmpName?>
                                  </div>
                                </div>

                                <div class="col-sm-4 text-center">
                                  <div class="knob-label">
                                      <?php if($leave['LeaveDays']>1){echo date('d-m-Y',strtotime($leave['LeaveFromDate']))." - ".date('d-m-Y',strtotime($leave['LeaveToDate']));}else{ echo date('d-m-Y',strtotime($leave['LeaveFromDate'])); } ?>
                                  </div>
                                </div>

                                <div class="col-sm-2 text-center">
                                  <div class="knob-label"><?=$leave['LeaveStatus']?></div>
                                </div>

                                <div class="col-sm-2 text-center">
                                  <div class="knob-label">
                                      <div class="fa fa-edit" data-toggle="modal" data-target="#modal-default" onclick="return setleaveid('<?=$leave['LeaveID']?>','<?=$i?>','leave');" style="cursor: pointer;"></div>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                     <div style="border-top: 1px #eee solid; height: 10px;"></div>
                                </div>
                            </div>

                        <?php }} ?>

                        <?php if($h==0){?>
                            <div class="col-sm-12 text-center" style="text-align:center; color:#373737;"> No Application </div>
                        <?php } ?>

                      <!-- ./col -->
                    </div>
                    <!-- /.row -->
                     
                </div>                  
            <?php }else if($this->session->userdata['userdetails']->EmployeeUserRole==2){?>           
                <div class="box box-info">
                    <div class="box-header">
                      <i class="fa fa-list"></i>
                      <?php
                        $from="01-".date("m-Y");
                        $till="31-".date("m-Y");
                      ?>
                      <h3 class="box-title">Leave History : <?=$from?> to <?=$till?></h3>
                      
                    </div>
                    <!-- Map box -->
                    <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-3 text-center" style="border-right: 1px solid #f4f4f4">
                                    <div class="knob-label"><b>Student Name</b></div>
                                </div>
                                <div class="col-sm-3 text-center" style="border-right: 1px solid #f4f4f4">
                                  <div class="knob-label"><b>Date</b></div>
                                </div>                                
                                <div class="col-sm-2 text-center" style="border-right: 1px solid #f4f4f4">
                                  <div class="knob-label"><b>Type</b></div>
                                </div>
                                <div class="col-sm-1 text-center" style="border-right: 1px solid #f4f4f4">
                                  <div class="knob-label"><b>Status</b></div>
                                </div>
                                <div class="col-sm-3 text-center">
                                  <div class="knob-label"><b>Note</b></div>
                                </div>
                                
                                <div class="col-sm-12">&nbsp;</div>
                            </div>
                            <?php
                              $getleave=$getleavelist->MontlyLeaveList();
                              $h=0;
                              foreach($getleave as $leave){
                                $h=1;
                                if($leave['LeaveStatus']!='Cancel Approved'){
                            ?>
                                <div class="col-sm-12" style="clear:both;"> 
                                  <div class="col-sm-3 text-center">
                                    <div class="knob-label">
                                      <?php
                                          $employeename = $getuser->GetEmployeeName($leave['LeaveEmployee']);                            
                                      ?>
                                      <?=$employeename->EmpName?>
                                    </div>
                                  </div>

                                  <div class="col-sm-3 text-center">
                                    <div class="knob-label">
                                        <?php if($leave['LeaveType']=='Leave'){   
                                            if($leave['LeaveDays']>1){ echo date('d-m-Y',strtotime($leave['LeaveFromDate']))." - ".date('d-m-Y',strtotime($leave['LeaveToDate']));}else{ echo date('d-m-Y',strtotime($leave['LeaveFromDate'])); } 
                                        }else{ 
                                            echo date('d-m-Y',strtotime($leave['LeavePermissionDate']))." <br> ".date('h:i A',strtotime($leave['LeavePermissionFrom']))."-".date('h:i A',strtotime($leave['LeavePermissionTo']));  
                                        } ?>
                                    </div>
                                  </div>

                                  <div class="col-sm-2 text-center">
                                    <div class="knob-label">
                                        <?=$leave['LeaveType']?><br>
                                        <?php if($leave['LeaveType']=='Leave'){ echo $leave['LeaveSession']; }?>
                                    </div>
                                  </div>

                                  <div class="col-sm-1 text-center">
                                    <div class="knob-label"><?=$leave['LeaveStatus']?></div>
                                  </div>

                                  <div class="col-sm-3 text-center">
                                    <div class="knob-label"><?=$leave['LeaveStatusReason']?></div>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                     <div style="border-top: 1px #eee solid; height: 10px;"></div>
                                </div>

                            <?php } } ?>

                            <?php if($h==0){?>
                                <div class="col-sm-12 text-center" style="text-align:center; color:#373737;"> No Application </div>
                            <?php } ?>

                          <!-- ./col -->
                    </div>
                    <!-- /.row -->                    
                </div>                   
            <?php }else{?>         
                <div class="box box-info">
                    <div class="box-header">
                        <div class="col-sm-8">
                            <i class="fa fa-list"></i>
                            <?php 

                            $EmployeeID=$this->session->userdata['userdetails']->EmployeeEmpID;
$lyr=date('Y')-1;
        $yr=date('Y');
        $nyr=date('Y')+1;
        if(date('m')<'04'){
            $sdate=$lyr.'-04-01';
            $edate=$yr.'-03-31';

            $sdate1='01-04-'.$lyr;
            $edate1='31-03-'.$yr;
        }else{
            $sdate=$yr.'-04-01';
            $edate=$nyr.'-03-31';

            $sdate1='01-04-'.$yr;
            $edate1='31-03-'.$nyr;
        }
                            ?>
                            <h3 class="box-title">Leave History : <?=$sdate1?> to <?=$edate1?></h3>
                        </div>
                        <div class="col-sm-4">
                          <?php $leavedays=$getleavelist->EmpLeavedays($EmployeeID,$sdate,$edate); ?>
                            <h4 class="box-title" style="float: right;">Leave Balance : <?=$leavedays?> Days</h4>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-4 text-center" style="border-right: 1px solid #f4f4f4">
                                    <div class="knob-label"><b>Type</b></div>
                                </div>
                                <!-- ./col -->
                                <div class="col-sm-5 text-center" style="border-right: 1px solid #f4f4f4">
                                  <div class="knob-label"><b>Date</b></div>
                                </div>
                                <!-- ./col -->
                                <div class="col-sm-3 text-center" style="border-right: 1px solid #f4f4f4">
                                  <div class="knob-label"><b>Status</b></div>
                                </div>
                                <div class="col-sm-12">&nbsp;</div>
                            </div>
                            <?php
                                                           
                                $getleave=$getleavelist->EmpLeavelist($EmployeeID,$sdate,$edate);
                                $i=0;$h=0;
                                foreach($getleave as $leave){
                                    $i++; 
                                    $h=1;
                            ?>
                                    <div class="col-sm-12" id="cancelrow<?=$i?>" style="clear:both;"> 
                                        <div class="col-sm-4 text-center" >
                                          <div class="knob-label">
                                            <?=$leave['LeaveType']?>
                                          </div>
                                        </div>

                                        <div class="col-sm-5 text-center">
                                          <div class="knob-label">
                                          <?php if($leave['LeaveType']=='Leave'){ echo date('d-m-Y',strtotime($leave['LeaveFromDate']))." - ".date('d-m-Y',strtotime($leave['LeaveToDate']));  }
                                          else{ echo date('d-m-Y',strtotime($leave['LeavePermissionDate']))." &nbsp; ".date('h:i',strtotime($leave['LeavePermissionFrom']))." - ".date('h:i',strtotime($leave['LeavePermissionTo'])); } ?>
                                          </div>
                                        </div>

                                        <div class="col-sm-3 text-center">
                                          <div class="knob-label"><?=$leave['LeaveStatus']?></div>
                                        </div>

                                       
                                        <div class="col-sm-12">
                                            <div style="border-top: 1px #eee solid; height: 10px;"></div>
                                       </div>
                                    </div>
                            <?php }  ?>

                            <?php if($h==0){?>
                                <div class="col-sm-12 text-center" style="text-align:center; color:#373737;"> No Application </div>
                            <?php } ?>
                            <div style="clear:both;">&nbsp;</div>
                          <!-- ./col -->
                        </div>
                        <!-- /.row -->
                      
                </div>                 
            <?php } ?>
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
<!--                                <div class="col-sm-2"><input type="checkbox" name="user" id="user" value="All" onclick="return checkall();"> &nbsp; All</div> -->
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
<!--                                <div class="col-sm-2"><input type="checkbox" name="ccuser" id="ccuser" value="All" onclick="return checkallcc();"> &nbsp; All</div> -->
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
    
</script>