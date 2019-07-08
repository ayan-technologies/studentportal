<?php 
$page='Profile';
$spage='Designation';
include_once 'header.php'; 
if($this->session->userdata['userdetails']->EmployeeUserRole!=1 && $this->session->userdata['userdetails']->EmployeeUserRole!=2){
    header('Location:Index');
}


?>

  <!-- Content Wrapper. Contains page content -->
  <div id="imgload" style="display:none"/ ></div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        Designation 
      </h1>
      <div class="col-md-6" style="text-align: right;"><h4><a href="AddDesignation">Add New Designation</a></h4></div>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="LeaveHistory">Designation</a></li> 
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
                  <th>Department</th>
                  <th>Designation Name</th>
                  <th>Created By</th>
                  <th>Created Date</th>                  
                          
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                       $i=0;               
                    foreach($desiglist as $desig){ $i++;?>
                            <tr>
                              <td><?=$i?></td>
                              <td><?=$desig['DepartmentName'];?></td>
                              <td><?=$desig['DesignationName'];?></td>
                              <td><?=$desig['EmployeeUserName'];?></td>
                              <td><?=$desig['DesignationCreatedDate'];?></td>
                              <td><span onclick='window.location.href="EditDesignation?DesignationID=<?=$desig['DesignationID']?>";' style="cursor: pointer;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a> <span style="cursor: pointer;" onclick="deletedesig(<?=$desig['DesignationID'];?>);"><i class="fa fa-trash-o" style="font-size:17px"></i></span></td>
                            
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

<script type="text/javascript">
 function deletedesig (val){


  if(confirm("Are you sure want to delete this Data?")){

  $.ajax({

    url:'Employee/DeleteDesignation',
    type: 'POST',
    dataType: 'json',
    data: {DesignationID:val},
    success: function(response){
      swal("Designation Deleted Successfully", "You clicked the button!", "success").then(okay => {
            if (okay) {
            window.location.href = "Designation";
            }
            });  
   

    },

    error: function(err){

      alert('Data Error');


    }

  });
}

 }


</script>


  