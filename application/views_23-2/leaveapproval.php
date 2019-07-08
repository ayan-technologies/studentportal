<?php 
$page='Leave';
include_once 'header.php'; 

if($this->session->userdata['userdetails']->EmployeeUserRole!=1 && $this->session->userdata['userdetails']->EmployeeUserRole!=5){
    header('Location:Index');
}

require_once 'application/models/ManageProfile.php';
$getuser = new ManageProfile();

?>
  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <div id="imgload" style="display:none" ></div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee Leave / Permission History : <?=date('F - Y')?> 
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="LeaveList">Employee Leave Requests</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" style="clear:both;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Emp Name</th>
                  <th>EMP Code</th>
                  <th>Type</th>
                  <th style="width:25%;">Reason</th>
                  <th>Date</th>
                  <th>#Days</th>
                  <th>Is Informed</th>
                  <th>Status</th>
                  <th>Applied On</th>
                  <th style="width:15%;">Status Details</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=0;

                    if($leavelist!=''){
                        foreach($leavelist as $leave){ $i++;
                        if($leave['LeaveType']=='Leave'){
                            $trb="#B2EBF2";
                        }else{                   
                            $trb="#D1C4E9";
                        }
                        if($leave['LeaveStatus']=='Approved'){
                            $st=" style='background-color:#00695c; color:#fff; padding:3px; '";
                        }elseif($leave['LeaveStatus']=='Rejected'){
                            $st=" style='background-color:#d32f2f; color:#fff; padding:3px; '";  
                        }else{
                            $st="";
                        }?>
                        <tr id="row_<?=$i?>" style="background-color:<?=$trb?>;">
                          <td><?=$i?></td>
                          <td>
                            <?php
                                $employeename = $getuser->GetEmployeeName($leave['LeaveEmployee']);                            
                            ?>
                            <?=$employeename->EmpName?>
                          </td>
                          <td>
                            <?php                            
                                $employeename = $getuser->GetEmployeeField($leave['LeaveEmployee'],'EmployeeCode');                            
                            ?>
                            <?=$employeename->EmployeeCode?>
                          </td>

                          <td><?=$leave['LeaveType']?></td>
                          <td>
                                <?=$leave['LeaveReason']?>
                                <?php if($leave['LeaveIsCancelled']==1){ echo "<br>Cancel Reason:".$leave['LeaveCancelReason']; }?>
                          </td>
                          <?php $cls=''; if($leave['LeaveSession']=='Half Day' && $leave['LeaveType']=='Leave'){ $cls='dualcolor'; }?>
                          <td class="<?=$cls?>" align="center">
                            <?php if($leave['LeaveType']=='Leave'){ 
                                if($leave['LeaveFromDate']==$leave['LeaveToDate']){
                                   echo date('d-m-Y',strtotime($leave['LeaveFromDate'])); 
                                }else{
                                   echo date('d-m-Y',strtotime($leave['LeaveFromDate']))." - ".date('d-m-Y',strtotime($leave['LeaveToDate']));  
                                }
                            }
                            else{ echo date('d-m-Y',strtotime($leave['LeavePermissionDate']))." <br> ".date('h:i A',strtotime($leave['LeavePermissionFrom']))." - ".date('h:i A',strtotime($leave['LeavePermissionTo'])); } ?>
                          </td>
                          <td><?=$leave['LeaveDays']?></td>
                          <td><?php if($leave['LeaveIsIntimated']==1){ echo 'Yes'; }else{ echo 'No'; }?></td> 
                          <td><span <?=$st?>><?=$leave['LeaveStatus']?></span></td>
                          <td><?=$leave['LeaveAppliedon']?></td>
                          <td>
                              <?php
                              if($leave['LeaveCancelApprovedBy']>0){
                                $employeename = $getuser->GetEmployeeName($leave['LeaveCancelApprovedBy']);                            
                                ?>
                                <?=$employeename->EmpName?><br>
                                <?=date("d-m-Y h:i A", strtotime($leave['LeaveCancelApprovedDate']))?><br>
                                <?=$leave['LeaveCancelStatusReason']?>
                              <?php }elseif($leave['LeaveApprovedBy']>0){
                                    $employeename = $getuser->GetEmployeeName($leave['LeaveApprovedBy']);                            
                                  ?>
                                  <?=$employeename->EmpName?><br>
                                  <?=date("d-m-Y h:i A", strtotime($leave['LeaveApprovedDate']))?><br>
                                  <?=$leave['LeaveStatusReason']?>
                              <?php } ?>
                          </td>
                          <td>
                            <?php if($leave['LeaveStatus']=='Cancel Request'){?><div class="fa fa-edit" data-toggle="modal" data-target="#modal-cancel" onclick="return setleaveid('<?=$leave['LeaveID']?>');" style="cursor: pointer;"></div><?php } ?>
                            <?php if($leave['LeaveStatus']=='Pending'){?><div class="fa fa-edit" data-toggle="modal" data-target="#modal-default" onclick="return setleaveid('<?=$leave['LeaveID']?>');" style="cursor: pointer;"></div><?php } ?>
                          </td>
                        </tr>                        
                    <?php }}else{ ?>
                        <tr>
                            <td colspan="12" align='center'> No Records Found</td>
                        </tr>
                    <?php } ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
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
                            <button type="button" class="btn btn-primary" onclick="return appleave();">Submit</button>
                        </div>
                    </div>
                </form>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      
      
        <div class="modal fade" id="modal-cancel">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Approve Leave</h4>
                </div>
                <form name="approval" id="approval" method="post" class="form-horizontal">
                    <input type="hidden" name="clid" id="clid" value="">
                    <div class="box-body">                        
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Leave Status?</label>
                            <div class="col-sm-9" style="margin-top: 7px;">
                                <div class="col-sm-3"><input type="radio" class="col-sm-2" name="cstatus" id="cstatusyes" value="Approved" > &nbsp; Approved </div>
                                <div class="col-sm-3"><input type="radio" class="col-sm-2" name="cstatus" id="cstatusno" value="Rejected" > &nbsp; Rejected </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Note</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="cnote" name="cnote" placeholder="Note to Employee" style="resize: none; width:94%; height: 75px;"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="return cancelleave();">Submit</button>
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
 
<?php include_once 'footer.php'; ?>

  <script>
      function setleaveid(id){
          $("#lid").val(id);
          $("#clid").val(id);
          
      }
    
    function appleave(){

        $('#imgload').show();
        
        if(document.getElementById('statusyes').checked==false && document.getElementById('statusno').checked==false){
          swal({
              text: "Please Mention Request Status?",
              type: "success",
              timer: 1200
              });
            $('#imgload').hide();
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
              swal("Changes Made Successful!", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "LeaveList";
            }
            });
                $('#imgload').hide();
                $('#modal-default').modal('hide');
            },
            error: function(response){
              swal("Changes Made Successful!", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "LeaveList";
            }
            });
                $('#modal-default').modal('hide');
            }
        });
        e.preventDefault();
        
    }
    
    function cancelleave(){
        
        if(document.getElementById('cstatusyes').checked==false && document.getElementById('cstatusno').checked==false){
          swal({
              text: "Please Mention Cancel Request Status?",
              type: "success",
              timer: 1200
              });
            return false;
        }
        
        var intim;
        if(document.getElementById('cstatusyes').checked==true){
            intim='Approved';
        }else{
            intim='Rejected';
        }
       
         
        var approveid='<?=$this->session->userdata['userdetails']->EmployeeID?>';
        var lid= $('#clid').val();
        var note=$('#cnote').val();
        
        $.ajax({
            url:'Leave/CancelLeaveStatus',
            type: 'POST',
            dataType: 'json',
            data: {LeaveStatus:intim,LeaveCancelStatusReason:note,LeaveCancelApprovedBy:approveid,LeaveID:lid},
            success: function(response){
              swal("Changes Made Successful", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "LeaveList";
            }
            });
                
                $('#modal-default').modal('hide');
            },
            error: function(response){
              swal("Changes Made Successful", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "LeaveList";
            }
            });                
                $('#modal-default').modal('hide');
            }
        });
        e.preventDefault();
        
    }
</script>
  
<style>
    @media(min-width:767px){
        #marks{
            bottom: -30px;
        }
    }
</style>