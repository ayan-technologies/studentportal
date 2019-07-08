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
<div id="imgload" style="display:none"></div>  
<div class="content-wrapper bg_img">
<!-- Main content -->
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row" style=" vertical-align: center">
        <div class="col-lg-2 col-xs-12">
          <div class="small-box" style="text-align: center">
          <div>           
            <img src='./dist/Icons/Student Profile.png' onclick="hideMenu('dash')" style="max-width:100px;cursor:pointer">
            <div class="btn-group">
                    <button type="button" class="btn btn-default font_family" onclick='window.location.href="Dashboard";'><a href="MyProfile" <?php if($spage=='My Profile'){?>style="color:#fff;"<?php }?>>My Profile</a> 
                    </button>
                </div>           
          </div>
        </div>
        </div>      
        <div class="col-lg-2 col-xs-12">
          <div class="small-box" style="text-align: center">
            <img style="max-width:100px;" src='./dist/Icons/My profile Icon.png'>
                <div class="btn-group">
                    <button type="button" class="btn btn-default font_family" onclick='window.location.href="Attendance";'><a href="SchoolProfile" <?php if($spage=='SchoolProfile'){?>style="color:#fff;"<?php } ?>>School Profile</a> 
                    </button>
                </div>
          </div>
        </div>
     
        <div class="col-lg-2 col-xs-12">
          <div class="small-box" style="text-align: center">            
            <img src='./dist/Icons/Leave Icon.png' style="max-width:100px">
            <button type="button" onclick='window.location.href="EmployeeList";' class="btn btn-default font_family">
              <a href="ApplyLeave" <?php if($spage=='Apply Leave'){?>style="color:#fff;"<?php }?>>Apply Leave</a></button>
          </div>
        </div>        
    </div>
</section>    
</div>
<?php include_once 'footer.php';?>