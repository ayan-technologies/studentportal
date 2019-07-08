<?php 
$page='Employee';
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
    <section class="content-header">
        <div class="col-md-8"><h4>Employee List</h4></div>
        
        <div class="col-md-6" style="text-align: right;"><h4><a href="AddEmployee">Add New Employee</a></h4></div>
        <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="EmployeeList">Employees</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" style="margin-top:10px;">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                      <th>Username</th>
                      <th>FullName</th>
                      <th>Empolyee Code</th>
                      <th>Designation</th>
                      <th>Email</th>
                      <th>Mobile No.</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach($emplist as $list){ $i++;
                    if($list['EmployeeDepartment']=='1'){
                        $trb='bg-purple';
                    }elseif($list['EmployeeDepartment']=='2'){
                        $trb='bg-teal';
                    }elseif($list['EmployeeDepartment']=='3'){
                        $trb='bg-green';
                    }elseif($list['EmployeeDepartment']=='4'){
                        $trb='bg-yellow';
                    }elseif($list['EmployeeDepartment']=='5'){
                        $trb='bg-aqua';
                    }else{
                        $trb='';
                    }
                    ?>
                    <tr id="row<?=$i?>" class="<?=$trb?>">
                      <td><?=$list['EmployeeUserName']?></td>
                      <td><?=$list['EmployeeFirstName']?> <?=$list['EmployeeLastName']?></td>
                      <td><?=$list['EmployeeCode']?></td>
                      <?php $desig=$getuser->GetEmployeeJoinDesignation($list['EmployeeDepartment'],$list['EmployeeDesignation']); ?>
                      <td><?=$desig->DesignationName?></td>
                      <td><?=$list['EmployeeEmail']?></td>
                      <td><?=$list['EmployeeMobile']?></td>
                      <td align='center'>
                        <div class="fa fa-eye" style="cursor: pointer;" onclick='window.location.href="EmployeeDetails?EmployeeID=<?=$list['EmployeeEmpID']?>";'></div>
                        <!--<div class="fa fa-edit"></div>-->
                        <?php if($this->session->userdata['userdetails']->EmployeeUserRole==1){?>
                            <button class="fa fa-remove" id="delete<?=$i?>" onclick="return deleteemp('<?=$list['EmployeeEmpID']?>','<?=$i?>')" style="background: none; border: none;"></button>
                        <?php } ?>
                      </td>
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
<?php include_once 'footer.php';?>

  <script>
    $("#emplist").on('click', deleteemp(id) {
        //$(this).closest('tr').remove();
        //$('#row'+id).remove();        
    });
    
    
</script>

<script type='text/javascript'>
    function deleteemp(id,row) {
        if(confirm("Are you sure want to delete this Employee?")){
            $.ajax({
                type: "POST",
                url: "Employee/DeleteEmployee?EmployeeID="+id,
                success: function(){

swal("Employee Deleted Successfully!", "You clicked the button!", "success")
                 $('#row'+row).remove();
                }
            });
        }
    }

    $('#example1').DataTable({
        "order": false
    });
</script>