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
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" 
style="background-image: url(dist/img/white_bg.jpg)!important;">
    <!-- Content Header (Page header) -->
<!-- <section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a>
    </li>
  </ol>
</section> -->

    <!-- Main content -->
<section class="content">
    <?php if($this->session->userdata['userdetails']->EmployeeUserRole==1){?> 
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-2 col-xs-6">
          <div class="">
          <div onclick="showMenu('dash')">           
            <img src='./dist/Icons/Dashboard.png' style="max-width:100px">
            <!-- <span id='name_dash' class="font_family" style="padding: 15%;">Dashboard
            </span> -->
             <div class="btn-group">
            <button type="button" class="btn btn-default font_family">Dashboard</button>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu font_family" role="menu">
                    <li data-toggle="modal" data-target="#modal-default"><a href="#">Quick Notes</a></li>
                    <li><a href="#">Recent</a></li>                   
                  </ul>
            </div>
          </div> 
           <!--  <div class="span_class" id="sub_menu_dash" hidden="">
              <span>
                <a href="#"></a>
                  <span class="font_family" style="background-color: #c9bce8;cursor:pointer">Quick Notes</span>
                <input type="button" class="btn btn-secondary" value="Quick Notes" /></a>
                &nbsp;
                <a href="#"></a>
                  <span class="font_family" style="background-color: #c9bce8">Recent</span>
              </span>
            </div> -->
        </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box">            
            <div class="icon"></div>
            <img src='./dist/Icons/My profile Icon.png' style="max-width:100px">
          </div>
          <span style="padding: 15%;font-family:segoe print;">Profile</span>
        </div>
        <div class="col-lg-2 col-xs-6">
          <div class="small-box">            
            <div class="icon"></div>
            <img src='./dist/Icons/Students.png' style="max-width:100px">
          </div>
        </div>
        
        <div class="col-lg-2 col-xs-6">
          <div class="small-box">            
            <div class="icon"></div>
            <img src='./dist/Icons/Dashboard.png' style="max-width:100px">
          </div>
          </div>
        </div>
      </div>

    <?php } ?>
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

<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script>
  $(function () {
    var dateToday = new Date();
    var ponemonth = new Date(dateToday.setMonth(dateToday.getMonth() - 1));
    $('.pdate').datepicker({
        startDate: ponemonth,
        dateFormat:'DD-MM-yy',
        autoclose: true,
        todayHighlight: true,
    })
  });
</script>

<script>
function eventupdation()
{
  alert("all is well");
  var type=$('#sel_type option:selected').val();
  alert(type);
}
function showMenu(type)
{
  if(type=='dash')
  {
    $('#sub_menu_'+type).show();
    $('#name_'+type).hide();
  }
}

</script>