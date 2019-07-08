<?php 
$page='Inventory';
$spage='Inventory Category';
include_once 'header.php'; 

if($this->session->userdata['userdetails']->EmployeeUserRole!=1 && $this->session->userdata['userdetails']->EmployeeUserRole!=2){
    header('Location:Index');
}
?>

require_once 'application/models/ManageProfile.php';
$getuser = new ManageProfile();
?>
<div id="imgload" style="display:none"/ ></div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-md-8"><h4>Inventory Category</h4></div>
        <div class="col-md-6" style="text-align: right;"><h3><a class="fa fa-edit" data-toggle="modal" data-target="#modal-add" style="font-size:18px; cursor: pointer;">Add New Category</a></h3></div>
        <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="InventoryCategory">Inventory Category</a></li> 
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
                        <th>Category Name</th>
                        <th>Created By</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0;
                    if(isset($categorylist)){
                        foreach($categorylist as $list){ $i++;
                        
                        ?>
                            <tr id="row_<?=$i?>">
                                <td><?=$i?></td>
                                <td><?=$list['CategoryName']?></td>
                                <td><?=$list['EmployeeUserName']?></td>
                                <td><?=date("Y-m-d",strtotime($list['CategoryDate']))?></td>
                                <td>            
                                    <span class="fa fa-edit" data-toggle="modal" data-target="#modal-edit" onclick="return setinventoryid('<?=$list['CategoryID']?>','<?=$list['CategoryName']?>');" style="cursor: pointer;"></span>
                                    <span onclick="delinventory('<?=$list['CategoryID']?>')" style="cursor: pointer;"><i class="fa fa-trash-o" style="font-size:17px"></i></span>

                                </td>
                            </tr>
                        <?php }}else{ ?>
                            <tr>
                               <td colspan="9" align="center"> No Category Found </td>
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
      
      
        <div class="modal fade" id="modal-add">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Category</h4>
                </div>
                <form name="approval" id="approval" method="post" class="form-horizontal">
                    <div class="box-body"> 
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Category Name" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="return addcate();">Add Category</button>
                        </div>
                    </div>
                </form>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      
        
        <div class="modal fade" id="modal-edit">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Category</h4>
                </div>
                <form name="approval" id="approval" method="post" class="form-horizontal">
                    <input type="hidden" name="lid" id="lid" value="">
                    <input type="hidden" name="row" id="row" value="">
                    <div class="box-body"> 
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ename" name="ename" placeholder="Category Name" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="return editcate();">Update</button>
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
    
     function setinventoryid(id,name){
          $("#lid").val(id);         
          $("#ename").val(name); 
      }
    
    function addcate(){
         $('#imgload').show();
        
        if(document.getElementById('name').value==''){
            swal({
              text: "Please Enter Category Name",
              type: "success",
              timer: 1200
              });
              
            $('#imgload').hide();
            document.getElementById('name').focus();
            return false;
        }
         
        var empid='<?=$this->session->userdata['userdetails']->EmployeeID?>';
        var name=$('#name').val();

        $.ajax({
            url:'Inventory/CategoryAdd',
            type: 'POST',
            dataType: 'json',
            data: {CategoryName:name,CategoryEmployee:empid},
            success: function(response){
                $('#imgload').hide();
               swal("Category Added Successfully", "You clicked the button!", "success").then(okay => {
            if (okay) {
           window.location.href = "InventoryCategory";
            }
            });
            },
            error: function(){
                $('#imgload').hide();
                swal("Category Added Successfully", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "InventoryCategory";
            }
            });
            
            }
        });
        
    }
    
    function editcate(){
         $('#imgload').show();
        
        if(document.getElementById('ename').value==''){
            swal({
              text: "Please Enter Note on Employee/Item",
              type: "success",
              timer: 1200
              });
              
            $('#imgload').hide();
            document.getElementById('ename').focus();
            return false;
        }
         
        var empid='<?=$this->session->userdata['userdetails']->EmployeeID?>';
        var lid= $('#lid').val();
        var name=$('#ename').val();

        $.ajax({
            url:'Inventory/CategoryEdit',
            type: 'POST',
            dataType: 'json',
            data: {CategoryName:name,CategoryEmployee:empid,CategoryID:lid},
            success: function(response){
                $('#imgload').hide();
            swal("Edit Category Successfully", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "InventoryCategory";
            }
            });
            
            },
            error: function(){
            swal("Edit Category Successfully", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "InventoryCategory";
            }
            });
            
            }
        });
        
    }

 function delinventory(val){
        $('#imgload').show();
        if(confirm("Are you sure want to delete this Inventory Category?")){

        $.ajax({
            url:'Inventory/CategoryDelete',
            type: 'POST',
            
            data: {CategoryID:val},
            success: function(response){
                $('#imgload').hide();
             swal("Category Deleted Successfully", "You clicked the button!", "success").then(okay => {
                if (okay) {
                window.location.href = "InventoryCategory";
                }
                });
                
            },
            error: function(error){
                alert('Data Error');
            }
        });
        }
    }



</script>

  
  