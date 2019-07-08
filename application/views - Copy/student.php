<?php 
$page='StudentList';
include_once 'header.php';
 
// if($this->session->userdata['userdetails']->EmployeeUserRole!=1 && $this->session->userdata['userdetails']->EmployeeUserRole!=2){
//     header('Location:Index');
// }

require_once 'application/models/ManageStudents.php';
$getstudent = new ManageStudents();

// require_once 'application/models/ManageProfile.php';
// $getuser = new ManageProfile();

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-md-8"><h4>Student List</h4></div>
        <button type="button" style="float: right;margin-right: 13%;" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"> Add New Student</button>
       <!--  <div class="col-md-6" style="text-align: right;" data-toggle="modal" data-target="#modal-default"><a href=""><h4>Add New Student</a>
        </h4>
        </div> -->
        <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="StudentList">Student</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">  
            <div class="col-xs-12">&nbsp;</div>
            &nbsp;&nbsp;&nbsp;
               <label class="">Class:&nbsp;</label>
                <select class="form-control1" style="max-width: 10%">
                  <option>--Select--</option>
                  <option>LKG</option>
                  <option>UKG</option>
                  <option>I st </option>
                  <option>II nd</option>
                  <option>III rd</option>
                  <option>IV th</option>
                  <option>V th</option>
                  <option>VI th</option>
                  <option>VII th</option>
                  <option>VIII th</option>
                  <option>IX th</option>
                  <option>X th</option>
                  <option>XI th</option>
                  <option>XII th</option>
                </select>                
            &nbsp;&nbsp;&nbsp;          
              <label>Section:</label>&nbsp;&nbsp;
                    <select class="form-control1" style="max-width: 10%">
                        <option>Select</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>                       
                    </select>         
            <!-- /.box-header -->
            <div class="col-sm-12 form-group"></div>
            <!-- <div class="box-body table-responsive no-padding" style="margin-top:10px;"></div> -->
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                      <th>S.no</th>
                      <th>Department</th>	
                      <th>Student Id</th>
                      <th>Student Name</th>
                      <th>Date of Birth</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Mobile No.</th>  
                      <th>Action</th>  
                    </tr>
                </thead>
                <tbody>
                	<?php 
                		// print_r($stdlist);
                		$i=0;
                		foreach($stdlist as $std_data)
                		{
                			$i++;               			
                	?>                    
                    <tr id="row<?=$i?>" class="<?=$trb?>">
                      <td><?=$i?></td>	
                      <td><?=$std_data['DepartmentName']?></td>
                      <td><?=$std_data['std_id']?></td>
                      <td><?=$std_data['std_name']?></td>
                      <td><?=date('d-m-Y',strtotime($std_data['DOB']))?></td>
                      <td><?=$std_data['address']?></td>
                      <td><?=$std_data['std_email']?></td>
                      <td><?=$std_data['contatc_no']?></td>
                      <td align='center'>
                        <div class="fa fa-eye" style="cursor: pointer;" onclick='window.location.href="StudentDetails?StudentID=<?=$list['std_id']?>";'></div>
                        <?php if($this->session->userdata['userdetails']->EmployeeUserRole==1){?>
                            <button class="fa fa-remove" id="delete<?=$i?>" onclick="return deletestudent('<?=$list['std_id']?>','<?=$i?>')" style="background: none; border: none;"></button>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->

      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content" style="width: 150%;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>                     
                      <th>Student Name</th>
                      <th>Date of Birth</th>
                      <th>Address</th>                     
                      <th>Mobile No.</th> 
                      <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="text" id="std_name"></td>
                    <td><input type="text" id="std_name"></td>
                    <td><input type="text" id="std_name"></td>
                    <td><input type="text" id="std_name"></td>
                    <td><button class="btn-primary">Save</button></td>
                  </tr>
                  <tr>
                    <td><input type="text" id="std_name"></td>
                    <td><input type="text" id="std_name"></td>
                    <td><input type="text" id="std_name"></td>
                    <td><input type="text" id="std_name"></td>
                    <td><button class="btn-primary">Save</button></td>
                  </tr>
                  <tr>
                    <td><input type="text" id="std_name"></td>
                    <td><input type="text" id="std_name"></td>
                    <td><input type="text" id="std_name"></td>
                    <td><input type="text" id="std_name"></td>
                    <td><button class="btn-primary">Save</button></td>
                  </tr>
                </tbody>
              </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once 'footer.php';?>
<script type='text/javascript'>
    function deleteemp(id,row) {
        if(confirm("Are you sure want to delete this Employee?")){
            $.ajax({
                type: "POST",
                url: "Employee/DeleteEmployee?EmployeeID="+id,
                success: function(){
					swal("Student Detail Deleted Successfully!", "You clicked the button!", "success")
                 $('#row'+row).remove();
                }
            });
        }
    }
    $('#example1').DataTable({
        "order": false
    });

    function getstudentDetail()
    {
      alert("test123");
      $('#student_add_dialog').show();
    }
</script>