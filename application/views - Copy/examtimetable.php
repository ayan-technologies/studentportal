<?php 
$page='ExamTimeTable';
include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$getexamTimeTable = new ManageProfile();

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
        Exam Time Table
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="MyProfile">Exam Time Table</a></li> 
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
                    <div class="box-header">
                      <div style="text-align: center;">
                      <span>I Mid Exam Time Table</span>(Based on the exam type selected by staff it will be changed)<br>
                      <span>Std VI'st(2018-2019)</span></b>
                      </div>
                      
                      <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">                  
                          </div>
                        </div>
                      </div>
                    </div>           
                    <div class="box-body ">
                      <table class="table table-bordered">
                        <tr>
                          <th>Date</th>
                          <th>Day</th>
                          <th>Subjects</th>
                          <th>Portion</th>
                          <th>Page no</th>
                        </tr>
                        <tr>
                          <td>1</td>  
                          <td>Monday</td>
                          <td>English</td>
                          <td>Lesson 1 to 5</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>2</td>  
                          <td>Tuesday</td>
                          <td>Tamil</td>
                          <td>Lesson 2 to 6</td>
                          <td></td>                         
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Wednesday</td>
                          <td>Maths</td>
                          <td>Chapter 6 to 10</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Thursday</td>
                          <td>Science</td>
                          <td>Lesson 4 and 5</td>
                          <td></td>
                        <tr>
                          <td>5</td>  
                          <td>Friday</td>
                          <td>Social Science</td>
                          <td>History 2 and 3<br>
                            Civics lesson 3 <br>
                            Geography lesson 5
                          </td>
                          <td></td>
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
                    <b><span>Exam Time Table</span></b>                 
                  </div>
                </div>
                <div class="box-body">
                    <div class='col-md-4 form-group'>
                    <label >Choose Class</label>&nbsp;&nbsp;
                    <select class="form-control1" style="max-width: 50%">
                        <option>Select</option>
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
                    </div>
                    <div class='col-md-4 form-group'>
                    <label >Choose Section</label>&nbsp;&nbsp;
                    <select class="form-control1" style="max-width: 50%">
                        <option>Select</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>                       
                    </select>
                    </div>
                    <div class='col-md-4 form-group'>
                    <label>Exam Type</label>&nbsp;&nbsp;
                    <select class="form-control1" style="max-width: 50%">
                        <option>Select</option>
                        <option>I Mid</option>
                        <option>Quarterly</option>
                        <option>II Mid</option>
                        <option>Half Yearly</option>
                        <option>III Mid</option>
                        <option>Annual</option>
                    </select>
                    </div>
                  <div class="col-sm-12 form-group"></div>
                  <table class="table table-bordered">
                    <thead>
                        <tr>                            
                            <th>Date</th>
                            <th>Day</th>
                            <th>Subjects</th>
                            <th>Portion</th>
                            <th>Page no</th>
                        </tr>                         
                    </thead>
                    <tbody>
                    <tr>                      
                      <td>
                        <input type="text" class="form-control2 pdate" id="pdate" name="pdate">
                      </td>
                      <td><input type="text"  class="form-control2" id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2" id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2" id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" class="form-control2 pdate" id="pdate1" name="pdate">
                      </td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" class="form-control2 pdate" id="pdate2
                        " name="pdate2">
                      </td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" class="form-control2 pdate" id="pdate3" name="pdate3">
                      </td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" class="form-control2 pdate" id="pdate4" name="pdate4">
                      </td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" class="form-control2 pdate" id="pdate5" name="pdate5">
                      </td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" class="form-control2 pdate" id="pdate6" name="pdate6">
                      </td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" class="form-control2 pdate" id="pdate7" name="pdate7">
                      </td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" class="form-control2 pdate" id="pdate8" name="pdate8">
                      </td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" class="form-control2 pdate" id="pdate9" name="pdate9">
                      </td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                    </tr>
                    <tr>
                      <td>
                        <input type="text" class="form-control2 pdate" id="pdate10" name="pdate10">
                      </td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                      <td><input type="text"  class="form-control2 " id="mon_first" value=""></td>
                    </tr>
                    </tbody>
                    </table>
                    <tfoot class="text-center" >
                        <button class="btn btn-primary">Save</button>
                    </tfoot>    
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
  
