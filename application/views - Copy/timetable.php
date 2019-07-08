<?php 
$page='TimeTable';
include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$getTimeTable = new ManageProfile();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Time Table
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="MyProfile">Time Table</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" style="text-align: center;">
              <b><h3 class="box-title">Sample School</h3><br></b>
            </div>      
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
                      <b><span>Time Table For the Academic Year of 2019-2020</span></b>
                      </div>
                    </div>           
                    <div class="box-body">
                      <table class="table table-bordered">
                        <tr>
                          <th>#</th>  
                          <th>Day</th>
                          <th>1</th>
                          <th>2</th>
                          <th></th>
                          <th>3</th>
                          <th>4</th>
                          <th></th>
                          <th>5</th>
                          <th>6</th>
                          <th></th>
                          <th>7</th>
                          <th>8</th>
                        </tr>
                        <tr>
                          <td>1</td>  
                          <td>Monday</td>
                          <td>English</td>
                          <td>Tamil</td>
                          <td><span class="label label-success">Break</span></td>
                          <td>Maths</td>
                          <td>Science</td>
                          <td><span class="label label-primary">Lunch</span></td>
                          <td>Social Science</td>
                          <td>Hindi</td>
                          <td ><span class="label label-success">Break</span></td>
                          <td>Computer Science</td>
                          <td>PT</td>
                        </tr>
                        <tr>
                          <td>2</td>  
                          <td>Tuesday</td>
                          <td>English</td>
                          <td>Tamil</td>
                          <td><span class="label label-success">Break</span></td>
                          <td>Maths</td>
                          <td>Science</td>
                          <td><span class="label label-primary">Lunch</span></td>
                          <td>Social Science</td>
                          <td>Hindi</td>
                          <td ><span class="label label-success">Break</span></td>
                          <td>Computer Science</td>
                          <td>PT</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Wednesday</td>
                          <td>English</td>
                          <td>Tamil</td>
                          <td><span class="label label-success">Break</span></td>
                          <td>Maths</td>
                          <td>Science</td>
                          <td><span class="label label-primary">Lunch</span></td>
                          <td>Social Science</td>
                          <td>Hindi</td>
                          <td ><span class="label label-success">Break</span></td>
                          <td>Computer Science</td>
                          <td>PT</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Thursday</td>
                          <td>English</td>
                          <td>Tamil</td>
                          <td><span class="label label-success">Break</span></td>
                          <td>Maths</td>
                          <td>Science</td>
                          <td><span class="label label-primary">Lunch</span></td>
                          <td>Social Science</td>
                          <td>Hindi</td>
                          <td ><span class="label label-success">Break</span></td>
                          <td>Computer Science</td>
                          <td>PT</td>
                        </tr>
                        <tr>
                          <td>5</td>  
                          <td>Friday</td>
                          <td>English</td>
                          <td>Tamil</td>
                          <td><span class="label label-success">Break</span></td>
                          <td>Maths</td>
                          <td>Science</td>
                          <td><span class="label label-primary">Lunch</span></td>
                          <td>Social Science</td>
                          <td>Hindi</td>
                          <td ><span class="label label-success">Break</span></td>
                          <td>Computer Science</td>
                          <td>PT</td>
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
                  <b><span>Time Table For the Academic Year of 2019-2020</span></b>
                </div>
                  <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      </div>
                    </div>
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
                    <div class="col-sm-12 form-group"></div>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Day</th>
                            <th>1</th>
                            <th>2</th>
                            <th></th>
                            <th>3</th>
                            <th>4</th>
                            <th></th>
                            <th>5</th>
                            <th>6</th>
                            <th></th>
                            <th>7</th>
                            <th>8</th> 
                           <!--  <th>Action</th>    -->                   
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>  
                      <td>Monday</td>
                      <td><input class="col-xs-8" type="text" id="mon_first" value="English"></td>
                      <td><input class="col-xs-8" type="text" id="mon_sec" value="Tamil"></td>
                      <td><span  class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="mon_third" value="Maths"></td>
                      <td><input class="col-xs-8" type="text" id="mon_fourth" value="Science"></td>
                      <td><span class="label label-primary">Lunch</span></td>
                      <td><input class="col-xs-8" type="text" id="mon_fifth" value="ss"></td>
                      <td><input class="col-xs-8" type="text" id="mon_sixth" value="Hindi"></td>
                      <td><span class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="mon_seventh" value="Computer Science"></td>
                      <td><input class="col-xs-8" type="text" id="mon_eight" value="PT">
                      </td>
                      <!-- <td>
                        <button class="fa fa-eye" id="delete<?=$i?>" onclick="">
                        </button>
                        <button class="fa fa-remove" id="delete<?=$i?>" onclick="" >
                        </button>
                      </td> -->
                    </tr>
                    <tr>
                      <td>2</td>  
                      <td>Tuesday</td>
                      <td><input class="col-xs-8" type="text" id="tue_first" value="English"></td>
                      <td><input class="col-xs-8" type="text" id="tue_sec" value="Tamil"></td>
                      <td><span class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="tue_third" value="Maths"></td>
                      <td><input class="col-xs-8" type="text" id="tue_fourth" value="Science"></td>
                      <td><span class="label label-primary">Lunch</span></td>
                      <td><input class="col-xs-8" type="text" id="tue_fifth" value="ss"></td>
                      <td><input class="col-xs-8" type="text" id="tue_sixth" value="Hindi"></td>
                      <td><span class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="tue_seventh" value="Computer Science"></td>
                      <td><input class="col-xs-8" type="text" id="tue_eight" value="PT">
                      </td>
                      <!-- <td>
                        <button class="fa fa-eye" id="delete<?=$i?>" onclick="">
                        </button>
                        <button class="fa fa-remove" id="delete<?=$i?>" onclick="" >
                        </button>
                      </td> -->
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Wednesday</td>
                      <td><input class="col-xs-8" type="text" id="wed_first" value="English"></td>
                      <td><input class="col-xs-8" type="text" id="wed_sec" value="Tamil"></td>
                      <td><span class="label label-success">Break</span></td>
                      <td><input class="col-xs-8"type="text" id="wed_third" value="Maths"></td>
                      <td><input class="col-xs-8" type="text" id="wed_fourth" value="Science"></td>
                      <td><span class="label label-primary">Lunch</span></td>
                      <td><input class="col-xs-8" type="text" id="wed_fifth" value="ss"></td>
                      <td><input class="col-xs-8" type="text" id="wed_sixth" value="Hindi"></td>
                      <td><span class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="wed_seventh" value="Computer Science"></td>
                      <td><input class="col-xs-8" type="text" id="wed_eight" value="PT">
                      </td>
                      <!-- <td>
                        <button class="fa fa-eye" id="delete<?=$i?>" onclick="">
                        </button>
                        <button class="fa fa-remove" id="delete<?=$i?>" onclick="" >
                        </button>
                      </td> -->
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Thursday</td>
                      <td><input class="col-xs-8" type="text" id="thur_first" value="English"></td>
                      <td><input class="col-xs-8" type="text" id="thur_sec" value="Tamil"></td>
                      <td><span class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="thur_third" value="Maths"></td>
                      <td><input class="col-xs-8" type="text" id="thur_fourth" value="Science"></td>
                      <td><span class="label label-primary">Lunch</span></td>
                      <td><input class="col-xs-8" type="text" id="thur_fifth" value="ss"></td>
                      <td><input class="col-xs-8" type="text" id="thur_sixth" value="Hindi"></td>
                      <td><span class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="thur_seventh" value="Computer Science"></td>
                      <td><input class="col-xs-8" type="text" id="thur_eight" value="PT">
                      </td>
                      <!-- <td>
                        <button class="fa fa-eye" id="delete<?=$i?>" onclick="">
                        </button>
                        <button class="fa fa-remove" id="delete<?=$i?>" onclick="" >
                        </button>
                      </td> -->
                    </tr>
                    <tr>
                      <td>5</td>  
                      <td>Friday</td>
                      <td><input class="col-xs-8" type="text" id="fri_first" value="English"></td>
                      <td><input class="col-xs-8" type="text" id="fri_sec" value="Tamil"></td>
                      <td><span class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="fri_third" value="Maths"></td>
                      <td><input class="col-xs-8" type="text" id="fri_fourth" value="Science"></td>
                      <td><span class="label label-primary">Lunch</span></td>
                      <td><input class="col-xs-8" type="text" id="fri_fifth" value="ss"></td>
                      <td><input class="col-xs-8" type="text" id="fri_sixth" value="Hindi"></td>
                      <td><span class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="fri_seventh" value="Computer Science"></td>
                      <td><input class="col-xs-8"type="text" id="fri_eight" value="PT">
                      </td>
                     <!--  <td>
                        <button class="fa fa-eye" id="delete<?=$i?>" onclick="">
                        </button>
                        <button class="fa fa-remove" id="delete<?=$i?>" onclick="" >
                        </button>
                      </td> -->
                    </tr> 
                    <tr>
                      <td>6</td>  
                      <td>Saturday</td>
                      <td><input class="col-xs-8" type="text" id="mon_first" value="English"></td>
                      <td><input class="col-xs-8" type="text" id="mon_sec" value="Tamil"></td>
                      <td><span class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="mon_third" value="Maths"></td>
                      <td><input class="col-xs-8" type="text" id="mon_fourth" value="Science"></td>
                      <td><span class="label label-primary">Lunch</span></td>
                      <td><input class="col-xs-8" type="text" id="mon_fifth" value="ss"></td>
                      <td><input class="col-xs-8" type="text" id="mon_sixth" value="Hindi"></td>
                      <td><span class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="mon_seventh" value="Computer Science"></td>
                      <td><input class="col-xs-8" type="text" id="mon_eight" value="PT">
                      </td>
                      <!-- <td>
                        <button class="fa fa-eye" id="delete<?=$i?>" onclick="">
                        </button>
                        <button class="fa fa-remove" id="delete<?=$i?>" onclick="" >
                        </button>
                      </td> -->
                    </tr>
                    </tbody>
                    </table>
                    <tfoot>
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


  
