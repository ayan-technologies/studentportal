<?php
$page='Dashboard';
include_once 'header.php';

require_once 'application/models/ManageLeave.php';
$getleavelist = new ManageLeave();

require_once 'application/models/ManageProfile.php';
$getuser = new ManageProfile();

require_once 'application/models/ManageEmployee.php';
$getemp = new ManageEmployee();

// require_once 'application/models/ManageStudents.php';
// $getemp = new ManageStudents();
?>
<div id="imgload" style="display:none" ></div>
<div class="content-wrapper bg_img">

  <!-- Main content -->
<section class="content">
    <!-- <?php if($this->session->userdata['userdetails']->EmployeeUserRole==1){?> <?php } ?> -->
      <!-- Small boxes (Stat box) -->
      <?php print_r ($this->session->userdata['userdetails']->EmployeeUserRole);
      print_r ($this->session->userdata['userdetails']);?>
      <div class="row">
        <?php if($this->session->userdata['userdetails']->EmployeeUserRole==4 ){?>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="Attendance";'>
            <img style="max-width:100px;" src='./dist/Icons/01 Attendance 2.png'>
            <br>
            <button type="button" class="btn btn-default font_family">Attendance</button>
            <!-- <span class="font_family">Attendance</span> -->
          </div>
        </div>

        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center" onclick='window.location.href="Dashboard";'>
              <img src='./dist/Icons/03 Homework 2.png' onclick="hideMenu('dash')" style="max-width:100px;cursor:pointer">
               <br>
               <!-- <span class="font_family">Home Work</span> -->
              <button type="button" class="btn btn-default font_family" onclick='window.location.href="Dashboard";'>Home Work 
              </button>
          </div>
        </div>
        
        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center">            
            <img src='./dist/Icons/14 Assignment.png' style="max-width:100px;max-height: 100px">
            <br>
            <!-- <span class="font_family">Assignment</span> -->
            <button type="button" class="btn btn-default font_family" onclick='window.location.href="Assignment";'>Assignment</button>
          </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="Quicknotes";'>
              <img src='./dist/Icons/02 Quick Mail 02.png' onclick="hideMenu('dash')" style="max-width:100px;">
              <br>    
                <!-- <span class="font_family">Quick Mail</span> -->    
                <button type="button" class="btn btn-default font_family" onclick='window.location.href="Quicknotes";'>Quick Mail 
                </button>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="StudentList";'>            
            <img src='./dist/Icons/17 Students.png' style="max-width:100px">
            <br> 
             <!-- <span class="font_family">Student Details</span>  -->          
            <button type="button" onclick='window.location.href="StudentList";' class="btn btn-default font_family">Student Details</button>
          </div>
        </div>
        
        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center;cursor:pointer">
          <div style="cursor:pointer" onclick='window.location.href="TimeTable";'>        
            <img src='./dist/Icons/09 Time Table 02.png' style="max-width:100px">
            <br>
            <!-- <span class="font_family">Time Table</span> -->
            <button type="button" class="btn btn-default font_family">Time Table</button>
          </div>
          </div>
        </div>

        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="ExamTimeTable";'>
            <img src='./dist/Icons/10 Exam Schedule.png' style="max-width:100px">
            <br>
            <!-- <span class="font_family">Exam Schedule</span> -->
            <button type="button" class="btn btn-default font_family" onclick='window.location.href="ExamTimeTable";'>Exam Schedule</button>
          </div>
        </div>

        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="ReportCard";'>
            <img src='./dist/Icons/11 Report card.png' style="max-width:100px">
            <br>
            <!-- <span class="font_family">Report Card</span> -->
            <button type="button" class="btn btn-default font_family" onclick='window.location.href="ReportCard";'> Report Card</button>
          </div>
        </div>

        <div class="col-lg-2 col-xs-6">
              <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="PaymentUpdation";'>
                <img src='./dist/Icons/15 Payment.png' style="max-width:100px">
                <br>
                <!-- <span class="font_family">Payment</span> -->
                <button onclick='window.location.href="PaymentUpdation";' type="button" class="btn btn-default font_family"> Payment </button>
                </div>
        </div>

        <div class="col-lg-2 col-xs-6">
          <div class="small-box"  style="text-align: center;cursor:pointer" onclick='window.location.href="LeaveList";'>           
            <img src='./dist/Icons/07 Leave requests.png' style="max-width:100px">
            <br> 
            <!-- <span class="font_family">Leave Approval</span>  -->          
             <button type="button" onclick='window.location.href="LeaveList";' class="btn btn-default font_family">Leave Approval</button>
          </div>
        </div>
      
      <?php } if($this->session->userdata['userdetails']->EmployeeUserRole==1 || $this->session->userdata['userdetails']->EmployeeUserRole==2){?>
        <div class="col-lg-2 col-xs-6">
            <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="Quicknotes";'>
              <img src='./dist/Icons/02 Quick Mail 02.png' onclick="hideMenu('dash')" style="max-width:100px;">
              <br>    
                <!-- <span class="font_family">Quick Mail</span> -->    
                <button type="button" class="btn btn-default font_family" onclick='window.location.href="Quicknotes";'>Quick Mail 
                </button>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="EmployeeList";'>            
            <img src='./dist/Icons/05 Staff Profile.png' style="max-width:100px">
            <br>
           <!--  <span class="font_family">Employee Details</span> -->
            <button type="button" onclick='window.location.href="EmployeeList";' class="btn btn-default font_family">
              Employee Details</button>
          </div>
        </div>

        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="StudentList";'>            
            <img src='./dist/Icons/17 Students.png' style="max-width:100px">
            <br> 
             <!-- <span class="font_family">Student Details</span>  -->          
            <button type="button" onclick='window.location.href="StudentList";' class="btn btn-default font_family">Student Details</button>
          </div>
        </div>
      
        <div class="col-lg-2 col-xs-6">
              <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="Notification";'> 
                  <img src='./dist/Icons/Note-512.png' style="max-width:100px">
                  <br>
                  <!-- <span class="font_family">Leave Calender</span>  --> 
                  <button type="button" onclick='window.location.href="Notification";' class="btn btn-default font_family">Event Updates</button>
                </div> 
        </div> 

        <div class="col-lg-2 col-xs-6">
          <div class="small-box"  style="text-align: center;cursor:pointer" onclick='window.location.href="LeaveList";'>           
            <img src='./dist/Icons/07 Leave requests.png' style="max-width:100px">
            <br> 
            <!-- <span class="font_family">Leave Approval</span>  -->          
             <button type="button" onclick='window.location.href="LeaveList";' class="btn btn-default font_family">Leave Approval</button>
          </div>
        </div>

         <?php } if($this->session->userdata['userdetails']->EmployeeUserRole==5){?>

        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center" onclick='window.location.href="Dashboard";'>
              <img src='./dist/Icons/03 Homework 2.png' onclick="hideMenu('dash')" style="max-width:100px;cursor:pointer">
               <br>
               <!-- <span class="font_family">Home Work</span> -->
              <button type="button" class="btn btn-default font_family" onclick='window.location.href="Dashboard";'>Home Work 
              </button>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center">            
            <img src='./dist/Icons/14 Assignment.png' style="max-width:100px;max-height: 100px">
            <br>
            <!-- <span class="font_family">Assignment</span> -->
            <button type="button" class="btn btn-default font_family" onclick='window.location.href="Assignment";'>Assignment </button>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="Quicknotes";'>
              <img src='./dist/Icons/02 Quick Mail 02.png' onclick="hideMenu('dash')" style="max-width:100px;">
              <br>    
                <!-- <span class="font_family">Quick Mail</span> -->    
                <button type="button" class="btn btn-default font_family" onclick='window.location.href="Quicknotes";'>Quick Mail 
                </button>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center;cursor:pointer">
          <div style="cursor:pointer" onclick='window.location.href="TimeTable";'>        
            <img src='./dist/Icons/09 Time Table 02.png' style="max-width:100px">
            <br>
            <!-- <span class="font_family">Time Table</span> -->
            <button type="button" class="btn btn-default font_family">Time Table</button>
          </div>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="ExamTimeTable";'>
            <img src='./dist/Icons/10 Exam Schedule.png' style="max-width:100px">
            <br>
            <!-- <span class="font_family">Exam Schedule</span> -->
            <button type="button" class="btn btn-default font_family" onclick='window.location.href="ExamTimeTable";'>Exam Schedule</button>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="ReportCard";'>
            <img src='./dist/Icons/11 Report card.png' style="max-width:100px">
            <br>
            <!-- <span class="font_family">Report Card</span> -->
            <button type="button" class="btn btn-default font_family" onclick='window.location.href="ReportCard";'> Report Card</button>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
              <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="PaymentUpdation";'>
                <img src='./dist/Icons/15 Payment.png' style="max-width:100px">
                <br>
                <!-- <span class="font_family">Payment</span> -->
                <button onclick='window.location.href="PaymentUpdation";' type="button" class="btn btn-default font_family"> Payment </button>
                </div>
        </div>
        <?php  }?>
        <div class="col-lg-2 col-xs-6">
            <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="LeaveCalender";'>
            <img src='./dist/Icons/08 Leave Calendar 01.png' style="max-width:100px">
            <br> 
            <!-- <span class="font_family">Leave Calender</span>  -->
            <button type="button" onclick='window.location.href="LeaveCalender";' class="btn btn-default font_family">Leave Calender</button>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center;cursor:pointer" onclick='window.location.href="TranspotationDetails";'>            
            <img src='./dist/Icons/12 Transportation.png' style="max-width:100px;">
            <br>
            <!-- <span class="font_family">Transpotation Details</span> -->
            <button type="button" class="btn btn-default font_family" onclick='window.location.href="TranspotationDetails";'> Transpotation Details</button>
          </div>
        </div>

        <div class="col-lg-2 col-xs-6">
          <div class="small-box" style="text-align: center;cursor:pointer" 
            onclick='window.location.href="SchoolProfile";'>            
            <img src='./dist/Icons/13 Contact Us.png' style="max-width:100px">
            <br>
            <!-- <span class="font_family">Contact Details</span> -->
            <button type="button" class="btn btn-default font_family" 
            onclick='window.location.href="SchoolProfile";'>Contact Details</button>
          </div>
        </div>
    </div>          
      <!-- Main row -->
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content" style="width: 150%;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Staff Replacement</h4>
              </div>
              <div class="modal-body">
                Under Construction
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