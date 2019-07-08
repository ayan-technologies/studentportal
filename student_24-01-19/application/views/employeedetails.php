<?php 
$page='Employee';
include_once 'header.php';

if($this->session->userdata['userdetails']->EmployeeUserRole!=1 && $this->session->userdata['userdetails']->EmployeeUserRole!=2){
    header('Location:Index');
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Employee Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="EmployeeList">Employees</a></li> 
        <li class="active"><a href="EmployeeDetails">Employee Details</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-5">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Profile Data</h3>
            </div>
              
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <td>Username</td>
                  <td><?=$empprofile->EmployeeUserName?></td>                  
                </tr>
                <tr>
                  <td>First Name</td>
                  <td><?=$empprofile->EmployeeFirstName?></td>                  
                </tr>                
                <tr>
                  <td>Last Name</td>
                  <td><?=$empprofile->EmployeeLastName?></td>                  
                </tr>
                <tr>
                  <td>Emp Code</td>
                  <td><?=$empprofile->EmployeeCode?></td>                  
                </tr>
                <tr>
                  <td>User Role</td>
                  <td><?=$empdata['Role']?></td>                  
                </tr>
                <tr>
                  <td>Department</td>
                  <td><?=$empdata['Dept']?></td>                  
                </tr>
                <tr>
                  <td>Designation</td>
                  <td><?=$empdata['Sign']?></td>                  
                </tr>
                <tr>
                  <td>Join Date</td>
                  <td><?=$empprofile->EmployeeJoinDate?></td>                  
                </tr>
                <tr>
                  <td>Join Designation</td>
                  <td><?=$empdata['Jsign']?></td>                  
                </tr>
                <tr>
                  <td>Official Email</td>
                  <td><?=$empprofile->EmployeeEmail?></td>                  
                </tr>
                <tr>
                  <td>Personal Email</td>
                  <td><?=$empprofile->EmployeePersonalEmail?></td>                  
                </tr>
                <tr>
                  <td>Mobile</td>
                  <td><?=$empprofile->EmployeeMobile?></td>                  
                </tr>
                <tr>
                  <td>Alternative Number-1</td>
                  <td><?=$empprofile->EmployeeAltMobile1?></td>                  
                </tr>
                <tr>
                  <td>Alternative Number-2</td>
                  <td><?=$empprofile->EmployeeAltMobile2?></td>                  
                </tr>
                <tr>
                  <td>Marital Status</td>
                  <td><?=$empprofile->EmployeeMaritalStatus?></td>                  
                </tr>
                <tr>
                  <td>PAN Card No.</td>
                  <td><?=$empprofile->EmployeePanCard?></td>                  
                </tr>
                <tr>
                  <td>Address</td>
                  <td><?=$empprofile->EmployeeAddress?><br><?=$empprofile->EmployeeAddress2?><br><?=$empprofile->EmployeeCity?><br><?=$empprofile->EmployeeState?><br><?=$empprofile->EmployeeCountry?><br><?=$empprofile->EmployeeZipcode?></td>                  
                </tr>
                <tr>
                  <td>Bank Details</td>
                  <td><?=$empprofile->EmployeeBankAccName?><br><?=$empprofile->EmployeeBankName?><br><?=$empprofile->EmployeeBankAccNo?><br><?=$empprofile->EmployeeBankBranch?><br><?=$empprofile->EmployeeBankIFSC?></td>                  
                </tr>
                <?php if($empprofile->EmployeeIsResigned=='0'){?>
                <tr>
                  <td>Is On Notice Period?</td>
                  <td><?php if($empprofile->EmployeeInNotice=='0'){ echo 'No'; }else{ echo 'Yes'; }?></td>                  
                </tr>
                <?php }else{ ?>
                <tr>
                  <td>Re-leaved On</td>
                  <td><?=date("jS m, Y",strtotime($empprofile->EmployeeReleavedOn))?></td>                  
                </tr>
                <?php }  ?>
                <tr>
                  <td>Image</td>
                  <td>
                    <?php if($empprofile->EmployeeImage!='' && file_exists("empimage/".$empprofile->EmployeeImage)){?>
                        <img src="empimage/<?=$empprofile->EmployeeImage?>" class="img-circle" alt="User Image" style='max-width: 200px;'>
                    <?php }else{ ?>
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <?php } ?>
                  </td>                  
                </tr>
                <tr>
                  <td colspan="2" align="right"><button type="submit" class="btn btn-primary" onclick="window.location.href='EditEmpProfile?EmpID=<?=$empprofile->EmployeeEmpID?>&Empdesig=<?=$empprofile->EmployeeDesignation?>'">Edit Employee Profile</button></td>                  
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <?php if($this->session->userdata['userdetails']->EmployeeUserRole!=3 || $this->session->userdata['userdetails']->EmployeeEmpID==$empprofile->EmployeeEmpID){?>
            <div class="col-md-7">              
              <div class="box">
                <div class="box-header">

                    <?php

                        $yr=date('Y');
                       $lyr=date('Y')-1;
                       $nyr=date('Y')+1;
                      // echo date('m');
                      if(date('m')<'04'){
                          $sdate='01-04-'.$lyr;
                          $edate='31-03-'.$yr;
                      }else{
                          $sdate='01-04-'.$yr;
                          $edate='31-03-'.$nyr;
                      }
                        
                    ?>
                    <div class="col-sm-8">
                        <i class="fa fa-list"></i>
                        <h3 class="box-title">Leave History : <?=$sdate?> to <?=$edate?> </h3>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="box-title" style="float: right;">Leave Balance : <?=$leavedays?> Days</h4>
                    </div>
                  
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <thead>
                        <tr>
                          <th style="width: 3%">#</th>
                          <th style="width: 12%;">Leave Type</th>
                          <th style="width: 37%;">Reason</th>
                          <th style="width: 15%;">Date</th>
                          <th style="width: 5%;">#Days</th>
                          <th style="width: 10%;">Status</th>
                          <th style="width: 18%;">Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0;

                        if(sizeof($empleave)>0){
                            foreach($empleave as $leave){ $i++;?>
                        <tr>
                          <td><?=$i?></td>
                          <td><?=$leave['LeaveType']?></td>
                          <td><?=$leave['LeaveReason']?></td>
                          <td>
                              <?php if($leave['LeaveType']=='Leave'){ echo date('d-m-Y',strtotime($leave['LeaveFromDate']))." to<br> ".date('d-m-Y',strtotime($leave['LeaveToDate']));  }
                              else{ echo date('d-m-Y',strtotime($leave['LeavePermissionDate']))." <br> ".date('h:i A',strtotime($leave['LeavePermissionFrom']))." - ".date('h:i A',strtotime($leave['LeavePermissionTo'])); } ?>
                          </td>
                          <td><?=$leave['LeaveDays']?></td>
                          <td><?=$leave['LeaveStatus']?></td>
                          <td><?=$leave['LeaveStatusReason']?></td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="7" align='center'> No Records Found</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
        <?php } ?>
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once 'footer.php';?>
