<?php 
$page='Inventory';
$spage='Inventory List';
include_once 'header.php'; 

if($this->session->userdata['userdetails']->EmployeeUserRole!=1 && $this->session->userdata['userdetails']->EmployeeUserRole!=2){
    header('Location:Index');
}

require_once 'application/models/ManageProfile.php';
$getuser = new ManageProfile();

require_once 'application/models/ManageInventory.php';
$getcate = new ManageInventory();
$catlist=$getcate->Category();
?>
    <div id="imgload" style="display:none"/ ></div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-md-8"><h4>Inventory Item List</h4></div>
        <div class="col-md-6" style="text-align: right;"><h3><a class="fa fa-edit" data-toggle="modal" data-target="#modal-add" style="font-size:18px; cursor: pointer;">Add New Item List</a></h3></div>
        <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="InventoryList">Inventory List</a></li> 
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
                        <th>Item Name</th>
                        <th>Item Category</th>
                        <th>Item Configuration</th>
                        <th>Item Condition</th>
                        <th>Created</th>
                        <th>Created Date</th>
                        <th>Image</th>
                        <th>isActive</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0;
                    if(isset($itemlist)){
                        foreach($itemlist as $list){ $i++;
                            $empname=$getuser->GetEmployeeName($list['ItemEmployee']);
                        ?>
                            <tr id="row_<?=$i?>">
                                <td><?=$i?></td>
                                <td><?=$list['ItemName']?></td>
                                <td><?=$list['CategoryName']?></td>
                                <td><?=$list['ItemConfiguration']?></td>
                                <td><?=$list['ItemCondition']?></td>
                                <td><?=$empname->EmpName?></td>
                                <td><?=date("Y-m-d",strtotime($list['ItemDate']))?></td>
                                <td><img src="inventoryimage/<?=$list['ItemImage']?>" onerror="this.src = 'dist/img/items.png'" style="width: 80px; height: 80px;"></td>
                                <td><?php if($list['isActive']=='0'){
                                    echo 'Y';
                                }else {
                                    echo 'N';
                                } ?></td>
                               
                                <td> 
                                         
                                    <span class="fa fa-edit" data-toggle="modal" data-target="#modal-edit" onclick="return setinventoryid('<?=$list['ItemID']?>','<?=$list['ItemName']?>','<?=$list['ItemConfiguration']?>','<?=$list['ItemCondition']?>','<?=$list['CategoryID']?>', '<?=$list['ItemImage']?>', '<?=$list['isActive']?>');" style="cursor: pointer;"></span>
                                    <span onclick="deletecat('<?=$list['ItemID']?>','<?=$list['ItemImage']?>')" style="cursor: pointer;"><i class="fa fa-trash-o" style="font-size:17px"></i></span>
                                
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
                    <h4 class="modal-title">Add New Item</h4>
                </div>
                <form name="approval" id="approval" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="box-body"> 
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Item Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Item Name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Item Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="cate" name="cate" >
                                    <option value="">Select Category</option>
                                    <?php foreach($catlist as $lst){ ?>
                                        <option value="<?=$lst['CategoryID']?>"><?=$lst['CategoryName']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Item Configuration</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="config" name="config" placeholder="Item Configuration" style="resize: none; width:94%; height: 75px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Item Condition</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="cond" name="cond" placeholder="Item Condition" style="resize: none; width:94%; height: 75px;"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input id="inp" type='file'>
                            <!-- <p id="b64"></p> -->
                            <img id="imgg" height="150" style="max-width:95%;">
                            </div>
                            <input type="hidden" id="img_val">
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">isActive?</label>
                    <div class="col-sm-9">
                    <div class="col-sm-12 mb-2" style="margin-top: -5px;">
                    <label class="checkbox-inline">
                    <input type="checkbox" id="isactive" name="isactive" value="1" checked data-toggle="toggle" data-style="ios">
                    </label>

                    </div>

                    </div>
                    </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="return addcate();">Add Item</button>
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
                            <label for="inputEmail3" class="col-sm-3 control-label">Item Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ename" name="ename" placeholder="Item Name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Item Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="ecate" name="ecate" >
                                    <option value="">Select Category</option>
                                    <?php foreach($catlist as $lst){ ?>
                                        <option value="<?=$lst['CategoryID']?>"><?=$lst['CategoryName']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Item Configuration</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="econfig" name="econfig" placeholder="Item Configuration" style="resize: none; width:94%; height: 75px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Item Condition</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="econd" name="econd" placeholder="Item Condition" style="resize: none; width:94%; height: 75px;"></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12"><input id="einp" type='file'>
                                <img id="eimg" height="150">
                            <!-- <p id="eb64"></p> -->
                            <img id="einpimg" src=""  height="150" width="150">
                            </div>
                            <input type="hidden" id="eimg_val">
                        </div>
                    </div><br>
                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">isActive?</label>
                    <div class="col-sm-9">
                    <div class="col-sm-12 mb-2" style="margin-top: -5px;">
                    <label class="checkbox-inline">
                    <input type="checkbox" id="eisactive" name="eisactive" data-toggle="toggle" data-style="ios">
                    </label>

                    </div>

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
    
     function setinventoryid(id,name,config,cond,cate,vimg, isactv){
          $("#lid").val(id);         
          $("#ename").val(name);                       
          //$("#ecate").val(cate); 
          $("#econfig").val(config); 
          $("#econd").val(cond);

         if (isactv == 1) {
       
           $('#eisactive').bootstrapToggle('on')
           $('#eisactive').val('1');
            
        } else{
       
           $('#eisactive').bootstrapToggle('off')
           $('#eisactive').val('0');
        
         }

          $("#einp").show();
          if(vimg!=''){ 
          $('#einpimg').attr('src','inventoryimage/'+vimg);
            } else {
            $("#einpimg").hide();
      }
          $('select[name^="ecate"]').val(cate);
      }
  function readFile() {
  
  if (this.files && this.files[0]) {
    
    var FR= new FileReader();
    
    FR.addEventListener("load", function(e) {
      var imgval=document.getElementById("imgg").src       = e.target.result;
            
      $('#img_val').val(imgval);
     
    }); 
    
    FR.readAsDataURL( this.files[0] );
  }
  
}
document.getElementById("inp").addEventListener("change", readFile);

function editreadFile() {
  
  if (this.files && this.files[0]) {
    
    var FR= new FileReader();
    
    FR.addEventListener("load", function(e) {
      var imgval=document.getElementById("eimg").src       = e.target.result;

      $('#eimg_val').val(imgval);
     
    }); 
    
    FR.readAsDataURL( this.files[0] );
  }
  
}

document.getElementById("einp").addEventListener("change", editreadFile);
    
    function addcate(){
        $('#imgload').show();
        
        if(document.getElementById('name').value==''){
            swal({
              text: "Please Enter Item Name",
              type: "success",
              timer: 1200
              });
            $('#imgload').hide();
            document.getElementById('name').focus();
            return false;
        }
        if(document.getElementById('cate').value==''){
            swal({
              text: "Select Item Category",
              type: "success",
              timer: 1200
              });
            $('#imgload').hide();
            document.getElementById('cate').focus();
            return false;
        }
        if(document.getElementById('config').value==''){
            swal({
              text: "Please Enter Item Configuration",
              type: "success",
              timer: 1200
              });
            $('#imgload').hide();
            document.getElementById('config').focus();
            return false;
        }
        if(document.getElementById('cond').value==''){
            swal({
              text: "Please Enter Item Condition",
              type: "success",
              timer: 1200
              });
            $('#imgload').hide();
            document.getElementById('cond').focus();
           return false;
        }
        var vimg=$('#img_val').val();
        var empid='<?=$this->session->userdata['userdetails']->EmployeeID?>';
        var name=$('#name').val();
        var cate=$('#cate').val();
        var config=$('#config').val();
        var cond=$('#cond').val();
        var isactive=$('#isactive').val();
       
         
        $.ajax({
            url:'Inventory/ItemAdd',
            type: 'POST',
            data: {ItemName:name,ItemEmployee:empid,ItemCategory:cate,ItemConfiguration:config,ItemCondition:cond,ItemImage:vimg,isActive:isactive},
            success: function(response){
                $('#imgload').hide();
                swal("Item Added Successfully", "You clicked the button!", "success").then(okay => {
                if (okay) {
                window.location.href = "InventoryList";
                }
                });
            },
            error: function(err){
              alert('Data Error');
            }
        });
        
    }
    
    
    function editcate(){
         
        $('#imgload').show();

        if(document.getElementById('ename').value==''){
            swal({
              text: "Please Enter Item Name",
              type: "success",
              timer: 1200
              });
            $('#imgload').hide();
            document.getElementById('ename').focus();
            return false;
        }
        if(document.getElementById('ecate').value==''){
            swal({
              text: "Select Item Category",
              type: "success",
              timer: 1200
              });
            $('#imgload').hide();
            document.getElementById('ecate').focus();
            return false;
        }
        if(document.getElementById('econfig').value==''){
            swal({
              text: "Please Enter Item Configuration",
              type: "success",
              timer: 1200
              });
            $('#imgload').hide();
            document.getElementById('econfig').focus();
            return false;
        }
        if(document.getElementById('econd').value==''){
            swal({
              text: "Please Enter Item Condition",
              type: "success",
              timer: 1200
              });
            $('#imgload').hide();
            document.getElementById('econd').focus();
            return false;
        }
        var eimg=$('#eimg_val').val(); 
        var empid='<?=$this->session->userdata['userdetails']->EmployeeID?>';
        var lid= $('#lid').val();
        var name=$('#ename').val();
        var cate=$('#ecate').val();
        var config=$('#econfig').val();
        var cond=$('#econd').val();
        var isactive=$('#eisactive').val();

        if($('#eisactive').is(":checked")){

         isactive='1';

        } else {
         isactive='0';
        }


        $.ajax({
            url:'Inventory/ItemEdit',
            type: 'POST',
            data: {ItemName:name,ItemEmployee:empid,ItemCategory:cate,ItemConfiguration:config,ItemCondition:cond,ItemID:lid,ItemImage:eimg, isActive:isactive},
            success: function(response){
                $('#imgload').hide();
                
                swal("Item Edited Successfully", "You clicked the button!", "success").then(okay => {
                if (okay) {
                window.location.href = "InventoryList";
                }
                });
            },
            error: function(err){
              alert('Data Error');
            }
        });
        
    }


    function deletecat(val,img){
      $('#imgload').show();
       if(confirm("Are you sure want to delete this Inventory?")){
            $.ajax({
            url:'Inventory/ItemDelete',
            type: 'POST',
            //dataType: 'json',
            data: {ItemID:val,ItemImage:img},
            success: function(response){

                $('#imgload').hide();
                
                swal("Inventory Deleted Successfully", "You clicked the button!", "success").then(okay => {
                if (okay) {
                window.location.href = "InventoryList";
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

  
  