<?php 
$page='Inventory';
$spage='Inventory Approval';
include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$getuser = new ManageProfile();

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inventory In/Out Approval
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
             <form name="approval" id="approval" method="post" class="form-horizontal" onsubmit="return stopsubmit();">
                <input type="hidden" name="lid" id="lid" value="<?=$inventory->InventoryID?>" >
                <div class="box-body">
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Name:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                                <?php
                                    $employeename = $getuser->GetEmployeeName($inventory->InventoryEmployee);                            
                                ?>
                                <?=$employeename->EmpName?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Item:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                                <?=$inventory->InventoryItem?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Configuration:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$inventory->InventoryConfig?></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Condition:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$inventory->InventoryCondition?></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Out Date:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">
                                <?php echo date('d-m-Y',strtotime($inventory->InventoryOutDate))?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Applied On:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><?=$inventory->InventoryAppliedon?></div>
                        </div>
                    </div>
                    
                    <input type="hidden" class="form-control" readonly="readonly" id="itemid" name="itemid" value="<?=$inventory->InventoryItemID?>" placeholder="Item ID">
                    <?php if($_REQUEST['Type']=='Out'){?>
                        <?php if($inventory->InventoryOutInspectedBy==0){ ?>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Out Note/Comment:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="outnote" name="outnote" placeholder="Note to Employee" style="resize: none; width:94%; height: 75px;"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="return appleave('out','Approved');">Approve</button>
                                <button type="button" class="btn btn-primary" onclick="return appleave('out','Rejected');">Hold On</button>
                            </div>
                        <?php }else{ ?>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Approved By:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <?php
                                        $employeename = $getuser->GetEmployeeName($inventory->InventoryOutInspectedBy);                            
                                    ?>
                                    <div class="col-sm-12"><?=$employeename->EmpName?></div>
                                </div>
                            </div>                    
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Out Note/Comment:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=$inventory->InventoryOutSign?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Approved Date:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=date('d-m-Y h:i:s A',strtotime($inventory->InventoryOutApprovedDate))?></div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    
                    <?php if($_REQUEST['Type']=='In'){?>
                    
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Approved By:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <?php
                                        $employeename = $getuser->GetEmployeeName($inventory->InventoryOutInspectedBy);                            
                                    ?>
                                    <div class="col-sm-12"><?=$employeename->EmpName?></div>
                                </div>
                            </div>                    
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Out Note/Comment:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=$inventory->InventoryOutSign?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Approved Date:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=date('d-m-Y h:i:s A',strtotime($inventory->InventoryOutApprovedDate))?></div>
                                </div>
                            </div>
                        <?php if($inventory->InventoryInInspectedBy==0){ ?>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">In Note/Comment:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="innote" name="innote" placeholder="Note to Employee" style="resize: none; width:94%; height: 75px;"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="return appleave('in','Approved');">Approve</button>
                                <button type="button" class="btn btn-primary" onclick="return appleave('in','Rejected');">Hold On</button>
                            </div>
                        <?php }else{ ?>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Approved By:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <?php
                                        $employeename = $getuser->GetEmployeeName($inventory->InventoryInInspectedBy);                            
                                    ?>
                                    <div class="col-sm-12"><?=$employeename->EmpName?></div>
                                </div>
                            </div>                    
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">In Note/Comment:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=$inventory->InventoryInSign?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Approved Date:</label>
                                <div class="col-sm-9" style="margin-top: 7px;">
                                    <div class="col-sm-12"><?=date('d-m-Y h:i:s A',strtotime($inventory->InventoryInApprovedDate))?></div>
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

    
    function appleave(type,status){
        
        var note;
        if(type=='out'){        
            if(document.getElementById('outnote').value==''){
                alert('Please Enter Note on Employee/Item');
                return false;
            }
            note=$('#outnote').val();
        }else{
            if(document.getElementById('innote').value==''){
                alert('Please Enter Note on Employee/Item');
                return false;
            }
            note=$('#innote').val();
        }
         
        var approveid='<?=$this->session->userdata['userdetails']->EmployeeID?>';
        var lid= $('#lid').val();        
        var itemid= $('#itemid').val();
        
        $.ajax({
            url:'Inventory/InventoryOutIn',
            type: 'POST',
            dataType: 'json',
            data: {InventoryType:type,InventoryNote:note,InventoryApprovedBy:approveid,InventoryID:lid,InventoryStatus:status,InventoryItemID:itemid},
            success: function(response){
                alert('Changes Made Successful');
               window.location.href='InventoryHistory';
            },
            error: function(){
                alert('Changes Made Successful');
               window.location.href='InventoryHistory';
            }
        });
        
    }
    
    function stopsubmit(){
        return false;
    }
</script>
  
