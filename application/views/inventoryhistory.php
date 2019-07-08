<?php 
$page='Inventory';
$spage='Inventory History';
include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$getuser = new ManageProfile();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inventory List
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="InventoryHistory">Inventory History</a></li> 
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
                        <th style="width:5%;">Sl No.</th>
                        <th style="width:13%;">Item</th>
                        <th style="width:13%;">Configuration</th>
                        <th style="width:13%;">Condition</th>
                        <th style="width:21%;">Item Out Status</th>
                        <th style="width:21%;">Item In Status</th>
                        <th style="width:8%;">Applied On</th>  
                        <th style="width:6%;">Status</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0;
                    $tot=0; $inhand=0; $returned=0;
                    if(isset($inventorylist)){
                        foreach($inventorylist as $list){ $i++;
                            $outempname=$getuser->GetEmployeeName($list['InventoryOutInspectedBy']);
                            $inempname=$getuser->GetEmployeeName($list['InventoryInInspectedBy']);
                        ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$list['InventoryItem']?></td>
                                <td><?=$list['InventoryConfig']?></td>
                                <td><?=$list['InventoryCondition']?></td>
                                <td>
                                    Date : <?=date("d-m-Y",strtotime($list['InventoryOutDate']))?> &nbsp; &nbsp; Status : <?=$list['InventoryOutStatus']?><br>
                                    <?php if($list['InventoryOutInspectedBy']>0){ ?>
                                        Inspected By : <?=$outempname->EmpName?><br>
                                        Comment : <?=$list['InventoryOutSign']?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($list['InventoryInDate']!='0000-00-00 00:00:00'){?>
                                        Date : <?=date("d-m-Y",strtotime($list['InventoryInDate']))?> &nbsp; &nbsp; Status : <?=$list['InventoryInStatus']?><br>
                                    <?php } ?>
                                    <?php if($list['InventoryInInspectedBy']>0){ ?>
                                        Inspected By : <?=$inempname->EmpName?><br>
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
                                        <img src='dist/img/delete.png' style="width:32px; height: 32px; " title="Return Request Denied"> &nbsp; 
                                        <img src='dist/img/outward.png' onclick="return itemin('<?=$list['InventoryID']?>');" title="Send Return Request Again" style="cursor: pointer;">
                                        
                                    <?php }elseif($list['InventoryInDate']!='0000-00-00 00:00:00'){ ?>
                                        <img src='dist/img/rotate.png' style="width:20px; height: 20px;" title="Return Request Sent">
                                        
                                    <?php }elseif($list['InventoryOutInspectedBy']>0 && $list['InventoryOutStatus']=='Approved'){ ?>
                                        <img src='dist/img/outward.png' onclick="return itemin('<?=$list['InventoryID']?>');" title="Request Approved, Click To return" style="cursor: pointer;">
                                        
                                    <?php }elseif($list['InventoryOutInspectedBy']>0 && $list['InventoryOutStatus']=='Rejected'){ ?>
                                        <img src='dist/img/cancelled.png' title="Out Request Denied">
                                    <?php }else{ ?>
                                        <img src='dist/img/inward.png' style="width:20px; height: 20px;" title="Waiting for Approval">
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                            <tr>
                               <td colspan="8">&nbsp;</td>
                            </tr>
                            <tr>
                               <td colspan="2">Total Item : <?=$i?></td>
                               <td colspan="2">Total Item Returned : <?=$returned?></td>
                               <td colspan="2">Total Item In-Hand : <?=$i-$returned?></td>
                               <td colspan="2"></td>
                            </tr>
                    <?php }else{ ?>
                            <tr>
                               <td colspan="8" align="center"> No Item Found </td>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php include_once 'footer.php'; ?>

<script>
    function itemin(id){
        if (confirm("Are you sure want to Return this Item?")) {
            var empid='<?=$this->session->userdata['userdetails']->EmployeeID?>';
            $.ajax({
                url:'Inventory/ReturnInventory',
                type: 'POST',
                dataType: 'json',
                data: {InventoryEmployee:empid,InventoryID:id},
                beforeSend: function(){
                    
                },
                success: function(response,data){               
                    alert('Your Inventory Return has been Submitted');
                    $('#myForm1')[0].reset();
                    window.location.href='InventoryHistory';
                },
                error: function(){
                    
                }
            });
        
        }
    }
</script>

  
  