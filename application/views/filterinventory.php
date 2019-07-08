<?php 
$page='Inventory';
$spage='Inventory Requests';
include_once 'header.php'; 
if($this->session->userdata['userdetails']->EmployeeUserRole!=1 && $this->session->userdata['userdetails']->EmployeeUserRole!=2){
    header('Location:Index');
}
require_once 'application/models/ManageProfile.php';
$getuser = new ManageProfile();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header col-sm-12">

        
        <h1>
        Inventory Requests
       &nbsp;  -  &nbsp;<?php if($_REQUEST['inventorytype1']=='Approved') { ?> Item Returned <?php } elseif($_REQUEST['inventorytype1']=='Rejected') { ?>Return Rejected<?php } elseif($_REQUEST['inventorytype1']=='Pending') { ?>Return Request<?php } ?> <?php if($_REQUEST['inventorytype2']=='Approved') { ?>Request Approved<?php } elseif($_REQUEST['inventorytype2']=='Pending') { ?>Request Pending<?php } elseif($_REQUEST['inventorytype2']=='Rejected'){ ?>Request Rejected<?php } ?>
       <br/><br/>
        </h1>

        <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Employee Inventory Requests</li> 
        

        </ol>
        </section>

    <!-- Main content -->
    
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" style="margin-top:10px;">
                
                
                <a href="InventoryRequests"><div class="col-sm-2"><div class="colorbox" style="clear:both; cursor: pointer;" ></div><div class="colorboxtext" style="cursor: pointer;">View All</div></div></a>

                <?php if($_REQUEST['inventorytype1']!='Approved') { ?>
                    <a href="FilterInventory?inventorytype1=Approved"><div class="col-sm-2"><div class="colorbox" style="background-color:#80cbc4; clear:both; cursor: pointer;" ></div><div class="colorboxtext" style="cursor: pointer;">Item Returned</div></div></a>
<?php 
} 

 if($_REQUEST['inventorytype1']!='Rejected') { 

    ?>
                    <a href="FilterInventory?inventorytype1=Rejected"><div class="col-sm-2"><div class="colorbox" style="background-color:#ba68c8; clear:both;" ></div><div class="colorboxtext">Return Rejected</div></div></a>
<?php } 
if($_REQUEST['inventorytype1']!='Pending') { 

?>

                    <a href="FilterInventory?inventorytype1=Pending"><div class="col-sm-2" style="cursor: pointer;"><div class="colorbox" style="background-color:#90caf9; clear:both;" ></div><div class="colorboxtext">Return Request</div></div></a>
  <?php } 

    if($_REQUEST['inventorytype2']!='Approved') { 

?>

                    <a href="FilterInventory?inventorytype2=Approved"><div class="col-sm-2"><div class="colorbox" style="background-color:#9fa8da; clear:both;" ></div><div class="colorboxtext">Request Approved</div></div></a>

<?php }
if($_REQUEST['inventorytype2']!='Pending') { 

?>


                   <a href="FilterInventory?inventorytype2=Pending"> <div class="col-sm-2" style="cursor: pointer;"><div class="colorbox" style="background-color:#80deea; clear:both;" ></div><div class="colorboxtext")">Request Pending</div></div></a>
<?php }
if($_REQUEST['inventorytype2']!='Rejected') { 

?>


                    <a href="FilterInventory?inventorytype2=Rejected"><div class="col-sm-2" style="cursor: pointer;"><div class="colorbox" style="background-color:#ec407a; clear:both;" ></div><div class="colorboxtext">Request Rejected</div></div></a>
                <?php } ?>
                </div>
                <div class="col-sm-12">&nbsp;</div>
                <table id="example2" class="table table-bordered table-hover" style="padding-top:30px;">
                    <thead>
                        <tr>
                            <th style="width:5%;">Sl No.</th>
                            <th style="width:13%;">Employee</th>
                            <th style="width:10%;">Item</th>
                            <th style="width:10%;">Configuration</th>
                            <th style="width:10%;">Condition</th>
                            <th style="width:20%;">Item Out Status</th>
                            <th style="width:20%;">Item In Status</th>
                            <th style="width:7%;">Applied On</th>  
                            <th style="width:5%;">Return</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0;
                        $tot=0; $inhand=0; $returned=0;
                        if(isset($filterinventory) && $filterinventory!=''){
                            foreach($filterinventory as $list){ $i++;
                                $empname=$getuser->GetEmployeeName($list['InventoryEmployee']);
                                $outempname=$getuser->GetEmployeeName($list['InventoryOutInspectedBy']);
                                $inempname=$getuser->GetEmployeeName($list['InventoryInInspectedBy']);
                                if($list['InventoryInInspectedBy']>0 && $list['InventoryInStatus']=='Approved'){
                                    $trb="#80cbc4";
                                }elseif($list['InventoryInInspectedBy']>0 && $list['InventoryInStatus']=='Rejected'){
                                    $trb="#ba68c8";
                                }elseif($list['InventoryInDate']!='0000-00-00 00:00:00'){
                                    $trb="#90caf9";
                                }elseif($list['InventoryOutInspectedBy']>0 && $list['InventoryOutStatus']=='Approved'){
                                    $trb="#9fa8da";
                                }elseif($list['InventoryOutInspectedBy']>0 && $list['InventoryOutStatus']=='Rejected'){
                                    $trb="#ec407a";
                                }else{                   
                                    $trb="#80deea";
                                }
                            ?>
                                <tr id="row_<?=$i?>" style="background-color:<?=$trb?>;">
                                    <td><?=$i?></td>
                                    <td><?=$empname->EmpName?></td>
                                    <td><?=$list['InventoryItem']?></td>
                                    <td><?=$list['InventoryConfig']?></td>
                                    <td><?=$list['InventoryCondition']?></td>
                                    <td>
                                        Date : <?=date("d-m-Y",strtotime($list['InventoryOutDate']))?> &nbsp; &nbsp; Status : <?=$list['InventoryOutStatus']?><br>
                                        <?php if($list['InventoryOutInspectedBy']>0){ ?>
                                            Approved By : <?=$outempname->EmpName?><br>
                                            Comment : <?=$list['InventoryOutSign']?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($list['InventoryInDate']!='0000-00-00 00:00:00'){?>
                                            Date : <?=date("d-m-Y",strtotime($list['InventoryInDate']))?> &nbsp; &nbsp; Status : <?=$list['InventoryInStatus']?><br>
                                            <?php if($list['InventoryInInspectedBy']>0 && $list['InventoryInStatus']=='Pending'){ ?>
                                                Request Came Again
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if($list['InventoryInInspectedBy']>0 && $list['InventoryInStatus']=='Approved'){ ?>
                                            Approved By : <?=$inempname->EmpName?><br>
                                            By : <?=$inempname->EmpName?><br>
                                            Comment : <?=$list['InventoryInSign']?>
                                        <?php
                                            $returned++;
                                        } ?>
                                    </td>
                                    <td><?=date("d-m-Y",strtotime($list['InventoryAppliedon']))?></td>
                                    <td>                                        
                                        <?php if($list['InventoryInInspectedBy']>0 && $list['InventoryInStatus']=='Approved'){ ?>
                                            <img src='dist/img/returned.png' style="width:20px; height: 20px;" title="Returned">
                                        <?php }elseif($list['InventoryInInspectedBy']>0 && $list['InventoryInStatus']=='Rejected'){ ?>
                                            <img src='dist/img/delete.png' style="width:24px; height: 24px;" title="In Request Denied">
                                        <?php }elseif($list['InventoryInDate']!='0000-00-00 00:00:00'){ ?>
                                            <div data-toggle="modal" data-target="#modal-default"><img src='dist/img/inward.png' style="width:20px; height: 20px;" onclick="return setinventoryid('<?=$list['InventoryID']?>','in');" title="Request for Return"></div>
                                        <?php }elseif($list['InventoryOutInspectedBy']>0 && $list['InventoryOutStatus']=='Approved'){ ?>
                                            <img src='dist/img/onhand.png' style="width:20px; height: 20px;" title="With Employee">
                                        <?php }elseif($list['InventoryOutInspectedBy']>0 && $list['InventoryOutStatus']=='Rejected'){ ?>
                                            <img src='dist/img/cancelled.png' title="Out Request Denied">
                                        <?php }else{ ?>
                                            <div data-toggle="modal" data-target="#modal-default"><img src='dist/img/outward.png' onclick="return setinventoryid('<?=$list['InventoryID']?>','out',<?=$list['InventoryItemID']?>);" title="Waiting For Out Approval"></div>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                                <tr>
                                   <td colspan="8">&nbsp;</td>
                                </tr>
                                <tr>
                                   <td colspan="3">Total Item Out : <?=$i?></td>
                                   <td colspan="3">Total Item Returned : <?=$returned?></td>
                                   <td colspan="3">Total Pending Item: <?=$i-$returned?></td>
                                </tr>
                        <?php }else{ ?>
                                <tr>
                                   <td colspan="9" align="center"> No Item Found </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
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
                    <h4 class="modal-title">Approval for <span id='inn' style='text-transform:capitalize;'></span> Inventory</h4>
                </div>
                <form name="approval" id="approval" method="post" class="form-horizontal">
                    <input type="hidden" name="lid" id="lid" value="">
                    <input type="hidden" name="intype" id="intype" value="">
                    <input type="hidden" class="form-control" id="itemid" name="itemid" value="" >
                    <div class="box-body">                        
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Approval Status?</label>
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
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php include_once 'footer.php'; ?>

<script>
    
     function setinventoryid(id,type,item){
          $("#lid").val(id);       
          $("#intype").val(type);  
          $("#inn").html(type);
          $("#itemid").html(item); 
    }
    
    function appleave(){
        
        if(document.getElementById('note').value==''){

            swal({
              text: "Please Enter Note on Employee/Item",
              type: "success",
              timer: 1200
              });
            document.getElementById('note').focus();
            return false;
        }
        if(document.getElementById('statusyes').checked==false && document.getElementById('statusno').checked==false){
            swal({
              text: "Please Choose Approval Status",
              type: "success",
              timer: 1200
              });
            return false;
        }
        
        var approveid='<?=$this->session->userdata['userdetails']->EmployeeID?>';
        var lid= $('#lid').val();
        var note=$('#note').val();
        var type=$('#intype').val();
        var status= document.querySelector('input[name="status"]:checked').value;
        var itemid= $('#itemid').val();

        $.ajax({
            url:'Inventory/InventoryOutIn',
            type: 'POST',
            dataType: 'json',
            data: {InventoryType:type,InventoryNote:note,InventoryApprovedBy:approveid,InventoryID:lid,InventoryStatus:status,InventoryItemID:itemid},
            success: function(response){
                swal("Changes Made Successfully", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "InventoryRequests";
            }
            }); 

            },
            error: function(){
                 swal("Changes Made Successfully", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "InventoryRequests";
            }
            }); 
                
            }
        });
        
    }

function filter(val){

    var invtype = val;
    alert(invtype);

    $.ajax({
            url:'Inventory/filterInventory',
            type: 'POST',
            dataType: 'json',
            data: {InventoryOutStatus:invtype},
            success: function(response){
                window.location.href='FilterInventory';
            },
            error: function(){
                window.location.href='FilterInventory';
            }
        });

}

</script>

  
  