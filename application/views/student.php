<style type="text/css">
  .form_control2
  {
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
  }
</style>
<?php 
$page='StudentList';
include_once 'header.php';
 
// if($this->session->userdata['userdetails']->EmployeeUserRole!=1 && $this->session->userdata['userdetails']->EmployeeUserRole!=2){
//     header('Location:Index');
// }

require_once 'application/models/ManageStudents.php';
$getstudent = new ManageStudents();

require_once 'application/models/ManageProfile.php';
$getuser = new ManageProfile();

require_once 'application/models/ManageDashboard.php';
$getClassSub = new ManageDashboard();

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
          <div class="modal-dialog modal-md" >
            <div class="modal-content" style="overflow-x: scroll;">
              <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                  <span aria-hidden="true">&times;</span></button>-->
                <h4 class="modal-title">New Student Registration</h4>
              </div>              
                <div>
                  &nbsp;&nbsp;&nbsp;
                </div>
                <div class="modal-body">
                 <div style="padding-left: 90px;">
                    <label class="col-sm-4">Student Id :</label>
                    <input class="col-sm-4 form_control2" type="text" id="std_id">
                    <br><br>
                    <label class="col-sm-4">Student Name :</label>
                    <input class="col-sm-4 form_control2" type="text" id="newstd_name">
                    <br><br>
                    <label class="col-sm-4">Father's Name :</label>
                    <input class="col-sm-4 form_control2" type="text" id="father_name"><br><br>
                    <label class="col-sm-4">Mother's Name :</label>
                    <input class="col-sm-4 form_control2" type="text" id="mothers_name"><br><br>
                    <label class="col-sm-4">Class:</label>
                    <select class="col-sm-4 form_control2" id="classId" name="classId" style="max-width: 50%">
                        <option value="">--Select--</option>
                        <?php  
                          $ClassDetails=$getClassSub->getClassData();
                          foreach($ClassDetails as $classData){
                        ?>
                        <option value=<?php echo $classData['id']; ?>>
                          <?php echo $classData['class']; ?></option>
                          <?php } ?>
                    </select>
                    <!-- <input class="col-sm-4" type="text" id="std_name"> -->
                    <br><br>
                    <label class="col-sm-4">Section :</label>
                    <select class="col-sm-4 form_control2" id="section_id" name="section_id" style="max-width: 50%">
                        <option value="">--Select--</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                    <br><br>
                    <label class="col-sm-4">DOB :</label>
                    <input class="col-sm-4 form_control2 pdate" type="text" id="std_dob"><br><br>
                    <label class="col-sm-4">Email Id :</label>
                    <input class="col-sm-4 form_control2" type="text" id="email_id"><br><br>
                    <label class="col-sm-4">Phone No :</label>
                    <input class="col-sm-4 form_control2" type="text" id="phn_no"  onkeypress="return isNumberKey(event);"><br><br>
                    <label class="col-sm-4">Alternative No :</label>
                    <input class="col-sm-4 form_control2" type="text" id="altphn_no"  onkeypress="return isNumberKey(event);"><br><br>
                    <label class="col-sm-4">Address :</label>
                    <textarea class="col-sm-4 form_control2" type="text" id="address"></textarea><br><br>
                 </div>
                 <div>
                  &nbsp;&nbsp;&nbsp;
                 </div>
                 <div align="center">
                    <button type="button" class="btn btn-primary" onclick="studentsave()">    Save 
                    </button>
                 </div>
                 </div>
                <div>
                  &nbsp;
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save </button> -->
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
  function isNumberKey(evt){        
        var charCode = (evt.which) ? evt.which : event.keyCode;
        //if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode > 46)
        if(charCode==32 || charCode==40 || charCode==41 || charCode==43 || charCode==45 || charCode==46 || (charCode>=48 && charCode<=58)) // 32 - space, 40 - (, 41 - ), + - 43, - - 45, . - 46, 48 to 57 - 0 to 9, 58 - :
        {            
            return true;
        }
            return false;
        return true;
    }

$(function () {
    var dateToday = new Date();
    var ponemonth = new Date(dateToday.setMonth(dateToday.getMonth() - 1));
    $('.pdate').datepicker({
        // startDate: ponemonth,
        dateFormat:'DD-MM-yy',
        autoclose: true,
        todayHighlight: true,
    })
  });

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

    function studentsave()
    {
      var stdname=$("#newstd_name").val();
      var stdid=$("#std_id").val();
      var fathersname=$("#father_name").val();
      var mothersname=$("#mothers_name").val();
      var class_id=$('#classId :selected').val();
      var sectionid=$('#section_id :selected').val();
      var dob=$('#std_dob').val();
      var email_id=$("#email_id").val();
      var phn=$("#phn_no").val();
      var alt_num=$("#altphn_no").val();
      var address=$("#address").val();
      
      if(stdname!='' && stdid!='' || fathersname!='' || mothersname!='' && class_id!='' && sectionid!='' && dob!='' && email_id!='' && phn!='' && alt_num!='' && address!='')
      {
         $.ajax({
              url:'Student/addstudent',
              type: 'POST',
              // dataType: 'json',
              data: {
                    stu_name:stdname,
                    std_id:stdid,
                    father_name:fathersname,
                    mother_name:mothersname,
                    classid:class_id,
                    sec_id:sectionid,
                    std_dob:dob,
                    email:email_id,
                    contact_no:phn,
                    contact_no2:alt_num,
                    std_address:address
              },
              success: function(response,data)
              {
                if(response==0)
                {
                    swal({
                        text: "Student Id is already Existing",
                        type: "warning",
                        timer: 3000
                      });
                }
                else if(response=='')
                {
                  swal({
                      text: "There is some issue to add student!",
                      type: "warning",
                      timer: 3000
                  }); 
                }
                else
                {
                  swal({
                      text: "Student Added Successfully",
                      type: "success",
                      timer: 3000
                  });  
                  $("#newstd_name").val('');
                  $("#std_id").val('');
                  $("#father_name").val('');
                  $("#mothers_name").val('');
                  $('#std_dob').val('');
                  $("#email_id").val('');
                  $("#phn_no").val('');
                  $("#altphn_no").val('');
                  $("#address").val('');
                }
              }
         });
    }
    else
    {
      swal({
              text: "Some data missing",
              type: "warning",
              timer: 3000
          }); 
    }
    }
</script>