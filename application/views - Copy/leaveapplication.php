<?php 
$page='Leave';
$spage='Leave Approval';
include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$getuser = new ManageProfile();

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$leave->LeaveType?> <?php if($leave->LeaveIsCancelled=='1'){ echo 'Cancallation'; }?> Approval
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
             <form name="approval" id="approval" method="post" class="form-horizontal" onsubmit="return stopsubmit();">
                <input type="hidden" name="lid" id="lid" value="<?=$leave->LeaveID?>" >
                <div class="box-body">
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Name:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                                <?php
                                    $employeename = $getuser->GetEmployeeName($leave->LeaveEmployee);                            
                                ?>
                                <?=$employeename->EmpName?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Code:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                                <?php                            
                                $employeename = $getuser->GetEmployeeField($leave->LeaveEmployee,'EmployeeCode');                            
                                ?>
                                <?=$employeename->EmployeeCode?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Application Type:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$leave->LeaveType?></div>
                        </div>
                    </div>
                    <?php if($leave->LeaveIsCancelled==0){ ?>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Reason:</label>
                            <div class="col-sm-9" style="margin-top: 7px;">
                                <div class="col-sm-12"><?=$leave->LeaveReason?></div>
                            </div>
                        </div>

                        <?php if($leave->LeaveType=='Leave'){?>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Date:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12">
                                        <?php  if($leave->LeaveFromDate==$leave->LeaveToDate){
                                            echo date('d-m-Y',strtotime($leave->LeaveFromDate)); 
                                        }else{
                                            echo date('d-m-Y',strtotime($leave->LeaveFromDate))." - ".date('d-m-Y',strtotime($leave->LeaveToDate)); 
                                        } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">#Days:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=$leave->LeaveDays?></div>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Date:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12">
                                        <?php  echo date('d-m-Y',strtotime($leave->LeavePermissionDate))." &nbsp; ".date('h:i A',strtotime($leave->LeavePermissionFrom))." - ".date('h:i A',strtotime($leave->LeavePermissionTo)); ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Is Informed?:</label>
                            <div class="col-sm-9" style="margin-top: 7px;">
                                <div class="col-sm-12"><?php if($leave->LeaveIsIntimated==1){ echo 'Yes'; }else{ echo 'No'; }?></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Applied On:</label>
                            <div class="col-sm-9" style="margin-top: 7px;">
                                <div class="col-sm-12"><?=$leave->LeaveAppliedon?></div>
                            </div>
                        </div>
                        <?php if($leave->LeaveStatus=='Pending'){ ?>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Leave Status?:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-3"><input type="radio" class="col-sm-2" name="status" id="statusyes" value="Approved" > &nbsp; Approved </div>
                                    <div class="col-sm-3"><input type="radio" class="col-sm-2" name="status" id="statusno" value="Rejected" > &nbsp; Rejected </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Note:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="note" name="note" placeholder="Note to Employee" style="resize: none; width:94%; height: 75px;"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="return appleave();">Submit</button>
                            </div>
                        <?php }else{ ?>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Leave Status:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=$leave->LeaveStatus?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Note:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=$leave->LeaveStatusReason?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Marked By:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <?php
                                        $employeename = $getuser->GetEmployeeName($leave->LeaveApprovedBy);                            
                                    ?>
                                    <div class="col-sm-12"><?=$employeename->EmpName?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Status Date:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=$leave->LeaveApprovedDate?></div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php }else{ ?>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Reason:</label>
                            <div class="col-sm-9" style="margin-top: 7px;">
                                <div class="col-sm-12"><?=$leave->LeaveCancelReason?></div>
                            </div>
                        </div>
                        <?php if($leave->LeaveType=='Leave'){?>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Date:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12">
                                        <?php  if($leave->LeaveFromDate==$leave->LeaveToDate){
                                            echo date('d-m-Y',strtotime($leave->LeaveFromDate)); 
                                        }else{
                                            echo date('d-m-Y',strtotime($leave->LeaveFromDate))." - ".date('d-m-Y',strtotime($leave->LeaveToDate)); 
                                        } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">#Days:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=$leave->LeaveDays?></div>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Date:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12">
                                        <?php  echo date('d-m-Y',strtotime($leave->LeavePermissionDate))." &nbsp; ".date('h:i A',strtotime($leave->LeavePermissionFrom))." - ".date('h:i A',strtotime($leave->LeavePermissionTo)); ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Applied On:</label>
                            <div class="col-sm-9" style="margin-top: 7px;">
                                <div class="col-sm-12"><?=$leave->LeaveCancelDate?></div>
                            </div>
                        </div>
                        <?php if($leave->LeaveStatus=='Cancel Request'){ ?>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Leave Status?:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-3"><input type="radio" class="col-sm-2" name="cstatus" id="cstatusyes" value="Approved" > &nbsp; Approved </div>
                                    <div class="col-sm-3"><input type="radio" class="col-sm-2" name="cstatus" id="cstatusno" value="Rejected" > &nbsp; Rejected </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Note:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="cnote" name="cnote" placeholder="Note to Employee" style="resize: none; width:94%; height: 75px;"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="return cancelleave();">Submit</button>
                            </div>
                        <?php }else{ ?>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Leave Status:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=$leave->LeaveStatus?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Note:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=$leave->LeaveCancelStatusReason?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Marked By:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <?php
                                        $employeename = $getuser->GetEmployeeName($leave->LeaveCancelApprovedBy);                            
                                    ?>
                                    <div class="col-sm-12"><?=$employeename->EmpName?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Status Date:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=$leave->LeaveCancelApprovedDate?></div>
                                </div>
                            </div>
                        <?php } ?>
                    
                    <?php } ?>
                </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include_once 'footer.php'; ?>

  <script>
    
    function appleave(){
        
        if(document.getElementById('statusyes').checked==false && document.getElementById('statusno').checked==false){
            alert('Please Mention Is Leave Status?');
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
        var note=$('#note').val();
        
        $.ajax({
            url:'Leave/ApproveRejectLeave',
            type: 'POST',
            dataType: 'json',
            data: {LeaveStatus:intim,LeaveStatusReason:note,LeaveApprovedBy:approveid,LeaveID:lid},
            success: function(response){
                alert('Changes Made Successful');
                window.location.href='LeaveList';
            },
            error: function(){
                alert('Changes Made Successful');
                window.location.href='LeaveList';
            }
        });
        
    }
    
    
    function cancelleave(){
        
        if(document.getElementById('cstatusyes').checked==false && document.getElementById('cstatusno').checked==false){
            alert('Please Mention Cancel Request Status?');
            return false;
        }
        
        var intim;
        if(document.getElementById('cstatusyes').checked==true){
            intim='Approved';
        }else{
            intim='Rejected';
        }
        
        var approveid='<?=$this->session->userdata['userdetails']->EmployeeID?>';
        var lid= $('#lid').val();
        var note=$('#cnote').val();
        
        $.ajax({
            url:'Leave/CancelLeaveStatus',
            type: 'POST',
            dataType: 'json',
            data: {LeaveStatus:intim,LeaveCancelStatusReason:note,LeaveCancelApprovedBy:approveid,LeaveID:lid},
            success: function(response){                
                alert('Changes Made Successful');
                window.location.href='LeaveList';
            },
            error: function(response){                
                alert('Changes Made Successful');
                window.location.href='LeaveList';
            }
        });
        e.preventDefault();
        
    }
    
    function stopsubmit(){
        return false;
    }
</script>
  
