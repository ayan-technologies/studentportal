<?php 
$page='ReportCard';
include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$getreportcarddata = new ManageProfile();

?>
<link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
<style>
    @media (min-width){
    .centered {
       margin: 0 auto;
   }
   .bootstrap-timepicker-widget>.dropdown-menu>.open{
            margin-left:150px;
   }
</style>  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report Card
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="MyProfile">Report Card</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div style="text-align: center;">
              <b><h3 class="box-title">Sample School</h3><br>
              </b>
            </div>
          </div>
            <!-- /.box-header -->
            <?php
                 // print_r($_SESSION['userdetails']);
                 // print_r($_SESSION['userdetails']->{'EmployeeDesignation'});                
                // $user_data=$getSchoolProfile->GetSchoolData();
                $userdetails=$this->session->userdata['userdetails'];
            ?>
            <?php if($_SESSION['userdetails']->{'EmployeeDesignation'}==5) {?>
            <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header" style="text-align: center;">
                      <b>
                      <span>Progress Card</span><br>
                      <span>Std VI'st(2018-2019)</span><br></b>
                      </div>&nbsp;&nbsp;&nbsp;
                      <b><span>Name: YYYY</span></b>
                    </div>
                    <div class="col-sm-12 form-group"></div>
                    <div class="box-body ">
                      <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th>Sno</th>
                          <th>Subjects</th>
                          <th>Maximum Marks</th>
                          <th>I Mid Term</th>
                          <th>Quarterly</th>
                          <th>II Mid Term</th>
                          <th>Half Yearly</th>
                          <th>III Mid Term</th>
                          <th>Annuals</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>1</td>  
                          <td>English</td>
                          <td>100</td>
                          <td>90</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>2</td>  
                          <td>Tamil</td>
                          <td>100</td>
                          <td>90</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>3</td>  
                          <td>Science</td>
                          <td>100</td>
                          <td>80</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>4</td>  
                          <td>Social Science</td>
                          <td>100</td>
                          <td>90</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>5</td>  
                          <td>Maths</td>
                          <td>100</td>
                          <td>90</td>
                          <td></td> 
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        </tbody>
                        <tr>
                          <th></th>
                          <th>Total</th>
                          <th>500</th>
                          <th>430</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                        <tr>
                          <th></th>
                          <th>Average</th>
                          <th>100%</th>
                          <th>86%</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                      </table>
                    </div>
                  <!-- /.box -->
                </div>
            </div> 
            <?php } if($_SESSION['userdetails']->{'EmployeeDesignation'}==4) {?>
            <div class="row">
             <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div style="text-align: center;">
                    <b><span>Report Card</span></b>                 
                  </div>                
                </div>
                <div class="box-body">
                  <div class="col-sm-12 form-group"></div>
                  <table id="example2" class="table table-bordered">
                    <thead>
                        <tr>                            
                            <th style="text-align: center">Sno</th>
                            <th style="text-align: center">Std. Name</th>
                            <th style="text-align: center">Sub 1</th>
                            <th style="text-align: center">Sub 2</th>
                            <th style="text-align: center">Sub 3</th>
                            <th style="text-align: center">Sub 4</th>
                            <th style="text-align: center">Sub 5</th>
                            <th style="text-align: center">Total/Grade</th>
                            <th style="text-align: center">Percentage</th>
                            <th style="text-align: center">Attendance</th>
                            <th style="text-align: center">Action</th>
                        </tr>                         
                    </thead>
                    <tbody>
                    <tr>   
                      <td>1</td>                   
                      <td>Student1</td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark1" value=""></td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark2" value=""></td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark3" value=""></td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark4" value=""></td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark5" value=""></td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark6" value=""></td>
                      <td></td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark10" value=""></td>
                      <td>
                        <button class="btn btn-block btn-success"><i class="fa fa-save"></i></button>
                        <button class="btn btn-block btn-primary">
                          <i class="fa fa-edit"></i></button>
                      </td>                    
                    </tr>
                   <tr>   
                      <td>2</td>                   
                      <td>Student2</td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark1" value=""></td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark2" value=""></td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark3" value=""></td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark4" value=""></td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark5" value=""></td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark6" value=""></td>
                      <td></td>
                      <td><input type="text" class="col-xs-4 form-control" id="mark10" value=""></td>
                      <td>
                        <button class="btn btn-block btn-success"><i class="fa fa-save"></i></button>
                        <button class="btn btn-block btn-primary">
                          <i class="fa fa-edit"></i></button>
                      </td>                    
                    </tr>
                    </tbody>
                    </table>
                    <!-- <tfoot class="text-center" >
                        <button class="btn btn-primary">Save</button>
                    </tfoot>     -->
                </div>
              <!-- /.box -->
            </div>
            </div>  
            <?php }?>      
    </div>
</div>       
</div>     
</section>
</div>  

<?php include_once 'footer.php'; ?>

<script>
  $(function () 
  {
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
  
