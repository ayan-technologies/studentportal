<?php 
$page='Inventory';
$spage='Make Inventory';
include_once 'header.php';

require_once 'application/models/ManageInventory.php';
$getitem = new ManageInventory();
$itemlist=$getitem->Item('request');
?>
<style>
    @media (min-width){
    .centered {
       margin: 0 auto;
   }
   .bootstrap-timepicker-widget>.dropdown-menu>.open{
            margin-left:150px;
   }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div id="imgload" style="display:none"/ ></div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Request Inventory</h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="RequestInventory">Request Inventory</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12" >
          <div class="box ">
            <div class="col-md-6">
            <div class="box-body centered">
              <div class="box box-info">
                <!-- form start -->
                <form id="myForm1" name="myForm1" method="post" class="form-horizontal" onsubmit="return stopsubmit();">
                    <div class="box-body">
                        <div class="col-sm-12" style='height: 10px;'>&nbsp;</div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Item</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="invenitem" name="invenitem" onchange="return getitem(this.value);" >
                                    <option value="">Select Item</option>
                                    <?php foreach($itemlist as $list){ ?>
                                        <option value="<?=$list['ItemName']?>',:'<?=$list['ItemConfiguration']?>',:'<?=$list['ItemCondition']?>',:'<?=$list['ItemID']?>"><?=$list['ItemName']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12" style='height: 10px;'>&nbsp;</div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Configuration</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" readonly="readonly" id="config" name="config" placeholder="Item Configuration" style='width: 100%; height: 75px; resize: none;'></textarea>
                                <input type="hidden" class="form-control" readonly="readonly" id="item" name="item" placeholder="Item Name">
                                <input type="hidden" class="form-control" readonly="readonly" id="itemid" name="itemid" placeholder="Item ID">
                            </div>
                        </div>
                        <div class="col-sm-12" style='height: 10px;'>&nbsp;</div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Condition</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" readonly="readonly" id="condition" name="condition" placeholder="Item Condition" style='width: 100%; height: 75px; resize: none;'></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12" style='height: 10px;'>&nbsp;</div>
                        <div class="form-group">
                            <label for="inputLeaveFrom" class="col-sm-3 control-label">Out Date</label>
                            <div class="col-sm-9">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="outdate" name="outdate">
                              </div>
                            </div>
                        </div>
                    </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="button" class="btn btn-info pull-right" onclick="return test();">Submit</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
            </div>
            </div>
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
<?php include_once 'footer.php';?>

  <script type="text/javascript">
      
        
    function test(){
      $('#imgload').show();
        if(document.getElementById('item').value==''){
          swal({
              text: "Please select Item Name",
              type: "success",
              timer: 1200
              });
          document.getElementById('item').focus();
           
            $('#imgload').hide();
            return false;
        }
        
        if(document.getElementById('outdate').value==''){
          swal({
              text: "Please Enter Date",
              type: "success",
              timer: 1200
              });
          document.getElementById('outdate').focus();
            return false;
        }

         
        var empid='<?=$this->session->userdata['userdetails']->EmployeeID?>';
        var item= $('#item').val();
        var config=$('#config').val();
        var condition=$('#condition').val();
        var outdate=$('#outdate').val();
        var itemid= $('#itemid').val();
        
        $.ajax({
            url:'Inventory/AddInventory',
            type: 'POST',
            dataType: 'json',
            data: {InventoryEmployee:empid,InventoryItem:item,InventoryConfig:config,InventoryCondition:condition,InventoryOutDate:outdate,InventoryItemID:itemid},
            beforeSend: function(){
            },
            success: function(response,data){   
            $('#imgload').hide();
            swal("Your Inventory request has been Submitted!", "You clicked the button!", "success").then(okay => {
            if (okay) {
              $('#myForm1')[0].reset();
            window.location.href = "InventoryHistory";
            }
            });
                   
            },
            error: function(){
                //console.log(xhr);
            }
        });
        
    }
   
  $(function () {
   
    //Date picker for permission
    $('#outdate').datepicker({
        startDate: new Date(),
        todayHighlight: true,
        autoclose: true
    })
   
    
  })
  
  function getitem(val){
        var items=val.split("',:'");
        $('#item').val(items[0]);
        $('#config').val(items[1]);
        $('#condition').val(items[2]);
        $('#itemid').val(items[3]);
  }
  
  
    function stopsubmit(){
        return false;
    }
</script>
