<?php 
$page='Profile';
$spage='Leave History';
include_once 'header.php'; 
require_once 'application/models/ManageProfile.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div id="imgload" style="display:none"/ ></div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        Leave History
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="LeaveHistory">Leave History</a></li> 
      </ol>
    </section>

    <!-- Main content -->
        
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" style="margin-top:10px;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Type</th>
                  <th>Reason</th>
                  <th>Leave Date</th>
                  <th># Days</th>
                  <th>Is Informed</th>
                  <th>Status</th>
                  <th>Applied On</th>                  
                  <th>Status Details</th>            
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=0;
                        $tot=0; $totlev=0; $app=0; $reg=0; $cancapp=0; $cancrej=0; $pen=0;
                    if(isset($empleave)){
                        foreach($empleave as $leave){ $i++;?>
                            <tr>
                              <td><?=$i?></td>
                              <td><?=$leave['LeaveType']?></td>
                              <td>
                                <?=$leave['LeaveReason']?>
                                <?php if($leave['LeaveIsCancelled']==1){ echo "<br>Cancel Reason:".$leave['LeaveCancelReason']; }?>
                              </td>
                              <td>
                                <?php if($leave['LeaveType']=='Leave'){ 
                                    $ldate=$leave['LeaveFromDate'];
                                    if($leave['LeaveFromDate']==$leave['LeaveToDate']){
                                        echo date('d-m-Y',strtotime($leave['LeaveFromDate'])); 
                                    }else{
                                        echo date('d-m-Y',strtotime($leave['LeaveFromDate']))." - ".date('d-m-Y',strtotime($leave['LeaveToDate'])); 
                                    }   
                                }else{ 
                                    $ldate=$leave['LeavePermissionDate']; echo date('d-m-Y',strtotime($leave['LeavePermissionDate']))." &nbsp; ".date('h:i A',strtotime($leave['LeavePermissionFrom']))." - ".date('h:i A',strtotime($leave['LeavePermissionTo']));
                                } ?>
                              </td>
                              <td>
                                
                                <?=$leave['LeaveDays']?>
                                <?php
                                    if($leave['LeaveIsCancelled']=='0'){
                                        $totlev=$totlev+$leave['LeaveDays'];
                                    }
                                    $tot++;
                                    if($leave['LeaveStatus']=='Approved'){ $app++; }
                                    elseif($leave['LeaveStatus']=='Rejected'){ $reg++; }
                                    elseif($leave['LeaveStatus']=='Cancel Approved'){$cancapp++;}
                                    elseif($leave['LeaveStatus']=='Cancel Approved'){$cancrej++;}
                                    else {
                                        $pen++;
                                    }
                                ?>
                              </td>
                              <td><?php if($leave['LeaveIsIntimated']==1){ echo 'Yes'; }else{ echo 'No'; }?></td>
                              <td><?=$leave['LeaveStatus']?></td>
                              <td><?=$leave['LeaveAppliedon']?></td>
                              <td>
                                  <?php
                                  if($leave['LeaveApprovedBy']>0){
                                    $getuser = new ManageProfile();
                                    $employeename = $getuser->GetEmployeeName($leave['LeaveApprovedBy']);                            
                                  ?>
                                  <?=$employeename->EmpName?><br>
                                  <?=$leave['LeaveApprovedDate']?><br>
                                  <?=$leave['LeaveStatusReason']?>
                                  <?php } ?>
                              </td>
                              <td>
                                  <?php
                                if($leave['LeaveType']=='Permission'){
                                  $date=$leave['LeavePermissionDate'];
                                }
                                elseif($leave['LeaveType']=='Leave'){
                                  $date=$leave['LeaveToDate'];
                                }
                                $newDate = date("Y-m-d",strtotime($date."+7 day"));
                                 
                                 if($leave['LeaveIsCancelled']=='0' && $newDate>=date("Y-m-d")) 
                                 {

                                   ?>
                                  <button id="delete<?=$i?>" data-toggle="modal" data-target="#modal-default" onclick="return setleaveid('<?=$leave['LeaveID']?>','<?=$i?>')" >Cancel</button>
                                <?php } ?>
                              </td>
                            </tr>
                        <?php } ?>
                            <tr>
                               <td colspan="10">&nbsp;</td>
                            </tr>
                            <tr>
                               <td colspan="2">Total Leave : <?=$totlev?></td>
                               <td colspan="1">Total Applied : <?=$tot?></td>
                               <td colspan="2">Pending : <?=$pen?></td>
                               <td colspan="2">Total Approved : <?=$app?></td>
                               <td colspan="1">Total Rejected : <?=$reg?></td>
                               <td colspan="1">Cancelled Reject : <?=$cancrej?></td>
                               <td colspan="1">Cancelled Approve : <?=$cancapp?></td>
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
                  <h4 class="modal-title">Cancel Leave</h4>
                </div>
                <form name="approval" id="approval" method="post" class="form-horizontal">
                    <input type="hidden" name="lid" id="lid" value="">
                    <div class="box-body"> 
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Reason</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="note" name="note" placeholder="Reason For Cancel" style="resize: none; width:94%; height: 75px;"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="return cancelrequest();">Submit</button>
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
      }

    
    function cancelrequest(){
        
        $('#imgload').show();
        if(document.getElementById('note').value==''){
          swal({
              text: "Please Enter Reason For Cancelling",
              type: "success",
              timer: 2000
              });
         document.getElementById('note').focus();
            $('#imgload').hide();
            return false;
        }
         
        
        var lid= $('#lid').val();
        var note=$('#note').val();
        
        $.ajax({
            url:'Leave/CancelLeave',
            type: 'POST',
            dataType: 'json',
            data: {LeaveCancelReason:note,LeaveID:lid},
            success: function(response){
              $('#imgload').hide();
                $('#leaveid').val('');
                $('#note').val('');
                $('#modal-default').modal('hide');
                window.location.href="LeaveHistory";
            },
            error: function(response){
                $('#leaveid').val('');
                $('#note').val('');
                $('#modal-default').modal('hide');
                window.location.href="LeaveHistory";
            }
        });
        e.preventDefault();
        
    }
</script> 
  