<?php 
$page='TimeTable';
include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$getTimeTable = new ManageProfile();

require_once 'application/models/ManageDashboard.php';
$getClassSub = new ManageDashboard();
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
                        </tr>
                        </thead>
                        <tbody>
                         <?php                     
                            $i=0;
                            $studenttimetable=$getTimeTable->student_gettimetable();
                          ?>
                        </tbody>
                        <tr>
                          <td>1</td>
                          <!-- <td><?=$i?></td>
                          <?php }?> -->
                          <td>Monday</td>
                          <td><?=$studenttimetable[0]['mon_1']?></td>
                          <td><?=$studenttimetable[1]['mon_2']?></td>
                          <td><span class="label label-success"><?=$studenttimetable[2]['mon_3']?></span></td>
                          <td><?=$studenttimetable[3]['mon_4']?></td>
                          <td><?=$studenttimetable[4]['mon_5']?></td>
                          <td><span class="label label-primary"><?=$studenttimetable[5]['mon_6']?></span></td>
                          <td><?=$studenttimetable[6]['mon_7']?></td>
                          <td><?=$studenttimetable[7]['mon_8']?></td>
                          <td><span class="label label-success"><?=$studenttimetable[8]['mon_9']?></span></td>
                          <td><?=$studenttimetable[9]['mon_10']?></td>
                          <td><?=$studenttimetable[10]['mon_11']?></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Tuesday</td>
                          <td><?=$studenttimetable[0]['tue_1']?></td>
                          <td><?=$studenttimetable[1]['tue_2']?></td>
                          <td><span class="label label-success"><?=$studenttimetable[2]['tue_3']?></span></td>
                          <td><?=$studenttimetable[3]['tue_4']?></td>
                          <td><?=$studenttimetable[4]['tue_5']?></td>
                          <td><span class="label label-primary"><?=$studenttimetable[5]['tue_6']?></span></td>
                          <td><?=$studenttimetable[6]['tue_7']?></td>
                          <td><?=$studenttimetable[7]['tue_8']?></td>
                          <td><span class="label label-success"><?=$studenttimetable[8]['tue_9']?></span></td>
                          <td><?=$studenttimetable[9]['tue_10']?></td>
                          <td><?=$studenttimetable[10]['tue_11']?></td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Wednesday</td>
                          <td><?=$studenttimetable[0]['wed_1']?></td>
                          <td><?=$studenttimetable[1]['wed_2']?></td>
                          <td><span class="label label-success"><?=$studenttimetable[2]['wed_3']?></span></td>
                          <td><?=$studenttimetable[3]['wed_4']?></td>
                          <td><?=$studenttimetable[4]['wed_5']?></td>
                          <td><span class="label label-primary"><?=$studenttimetable[5]['wed_6']?></span></td>
                          <td><?=$studenttimetable[6]['wed_7']?></td>
                          <td><?=$studenttimetable[7]['wed_8']?></td>
                          <td><span class="label label-success"><?=$studenttimetable[8]['wed_9']?></span></td>
                          <td><?=$studenttimetable[9]['wed_10']?></td>
                          <td><?=$studenttimetable[10]['wed_11']?></td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Thursday</td>
                          <td><?=$studenttimetable[0]['thu_1']?></td>
                          <td><?=$studenttimetable[1]['thu_2']?></td>
                          <td><span class="label label-success"><?=$studenttimetable[2]['thu_3']?></span></td>
                          <td><?=$studenttimetable[3]['thu_4']?></td>
                          <td><?=$studenttimetable[4]['thu_5']?></td>
                          <td><span class="label label-primary"><?=$studenttimetable[5]['thu_6']?></span></td>
                          <td><?=$studenttimetable[6]['thu_7']?></td>
                          <td><?=$studenttimetable[7]['thu_8']?></td>
                          <td><span class="label label-success"><?=$studenttimetable[8]['thu_9']?></span></td>
                          <td><?=$studenttimetable[9]['thu_10']?></td>
                          <td><?=$studenttimetable[10]['thu_11']?></td>
                        </tr> 
                        <tr>
                          <td>5</td>
                          <td>Friday</td>
                          <td><?=$studenttimetable[0]['fri_1']?></td>
                          <td><?=$studenttimetable[1]['fri_2']?></td>
                          <td><span class="label label-success"><?=$studenttimetable[2]['fri_3']?></span></td>
                          <td><?=$studenttimetable[3]['fri_4']?></td>
                          <td><?=$studenttimetable[4]['fri_5']?></td>
                          <td><span class="label label-primary"><?=$studenttimetable[5]['fri_6']?></span></td>
                          <td><?=$studenttimetable[6]['fri_7']?></td>
                          <td><?=$studenttimetable[7]['fri_8']?></td>
                          <td><span class="label label-success"><?=$studenttimetable[8]['fri_9']?></span></td>
                          <td><?=$studenttimetable[9]['fri_10']?></td>
                          <td><?=$studenttimetable[10]['fri_11']?></td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>Saturday</td>
                          <td><?=$studenttimetable[0]['sat_1']?></td>
                          <td><?=$studenttimetable[1]['sat_2']?></td>
                          <td><span class="label label-success"><?=$studenttimetable[2]['fri_3']?></span></td>
                          <td><?=$studenttimetable[3]['sat_4']?></td>
                          <td><?=$studenttimetable[4]['sat_5']?></td>
                          <td><span class="label label-primary"><?=$studenttimetable[5]['fri_6']?></span></td>
                          <td><?=$studenttimetable[6]['sat_7']?></td>
                          <td><?=$studenttimetable[7]['sat_8']?></td>
                          <td><span class="label label-success"><?=$studenttimetable[8]['fri_9']?></span></td>
                          <td><?=$studenttimetable[9]['sat_10']?></td>
                          <td><?=$studenttimetable[10]['sat_11']?></td>
                        </tr> 
                      </table>
                    </div>
                  <!-- /.box -->
                </div>
            </div>             
            <?php if($_SESSION['userdetails']->{'EmployeeDesignation'}==4) {?>
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
                    <select class="form-control1" id="classId" name="classId" style="max-width: 50%" >
                        <option value="">Select</option>
                        <?php  
                          $ClassDetails=$getClassSub->getClassData();
                          foreach($ClassDetails as $classData){
                        ?>
                        <option value=<?php echo $classData['id']; ?>>
                          <?php echo $classData['class']; ?></option>
                          <?php } ?>
                    </select>
                    </div>
                    <div class='col-md-4 form-group'>
                    <label>Choose Section</label>&nbsp;&nbsp;
                    <select class="form-control1" id="section_id" name="section_id" style="max-width: 50%" onchange="gettimetable_data()">
                        <option value="">Select</option>
                        <option value='A'>A</option>
                        <option value='B'>B</option>
                        <option value='C'>C</option>
                        <option value='D'>D</option>                       
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
                      <?php                       
                        $TimeTable=$getClassSub->getdaylist();
                        // print_r($TimeTable);
                        foreach($TimeTable as $timetableData){
                      ?>                      
                      <td>1</td>  
                      <!-- <td><?php echo $timetableData['day_name']; ?></td>
                          <?php } ?> -->
                      <td>Monday</td>
                      <td><input class="col-xs-8" type="text" id="mon_first" value="English"></td>
                      <td><input class="col-xs-8" type="text" id="mon_sec" value="Tamil"></td>
                      <td><span id="mon_br" class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="mon_third" value="Maths"></td>
                      <td><input class="col-xs-8" type="text" id="mon_fourth" value="Science"></td>
                      <td><span id="mon_lunch" class="label label-primary">Lunch</span></td>
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
                      <td><span id="tue_br" class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="tue_third" value="Maths"></td>
                      <td><input class="col-xs-8" type="text" id="tue_fourth" value="Science"></td>
                      <td><span id="tue_lunch" class="label label-primary">Lunch</span></td>
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
                      <td><span id="wed_break" class="label label-success">Break</span></td>
                      <td><input class="col-xs-8"type="text" id="wed_third" value="Maths"></td>
                      <td><input class="col-xs-8" type="text" id="wed_fourth" value="Science"></td>
                      <td><span id="wed_lunch" class="label label-primary">Lunch</span></td>
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
                      <td><span id="thur_brk" class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="thur_third" value="Maths"></td>
                      <td><input class="col-xs-8" type="text" id="thur_fourth" value="Science"></td>
                      <td><span id="thur_lunch" class="label label-primary">Lunch</span></td>
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
                      <td><span id="fri_brk" class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="fri_third" value="Maths"></td>
                      <td><input class="col-xs-8" type="text" id="fri_fourth" value="Science"></td>
                      <td><span id="fri_lunch" class="label label-primary">Lunch</span></td>
                      <td><input class="col-xs-8" type="text" id="fri_fifth" value="ss"></td>
                      <td><input class="col-xs-8" type="text" id="fri_sixth" value="Hindi"></td>
                      <td><span id="fri_break" class="label label-success">Break</span></td>
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
                      <td><input class="col-xs-8" type="text" id="sat_first" value="English"></td>
                      <td><input class="col-xs-8" type="text" id="sat_sec" value="Tamil"></td>
                      <td><span id="sat_break" class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="sat_third" value="Maths"></td>
                      <td><input class="col-xs-8" type="text" id="sat_fourth" value="Science"></td>
                      <td><span id="sat_lunch" class="label label-primary">Lunch</span></td>
                      <td><input class="col-xs-8" type="text" id="sat_fifth" value="ss"></td>
                      <td><input class="col-xs-8" type="text" id="sat_sixth" value="Hindi"></td>
                      <td><span class="label label-success">Break</span></td>
                      <td><input class="col-xs-8" type="text" id="sat_seventh" value="Computer Science"></td>
                      <td><input class="col-xs-8" type="text" id="sat_eight" value="PT">
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
                      <button class="btn btn-primary" onclick="SaveTimetable()">Save</button>
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
<script type="text/javascript">
  function SaveTimetable() 
  {        
    var class_=$('#classId :selected').val();    
    var section=$("#section_id option:selected").val();
    var monday_timetable=[];
    var m_timetable={}

    m_timetable["1"]=$('#mon_first').val();
    m_timetable["2"]=$('#mon_sec').val();
    m_timetable["3"]=$('#mon_br').html();
    m_timetable["4"]=$('#mon_third').val();
    m_timetable["5"]=$('#mon_fourth').val();
    m_timetable["6"]=$('#mon_lunch').html();
    m_timetable["7"]=$('#mon_fifth').val();
    m_timetable["8"]=$('#mon_sixth').val();
    m_timetable["9"]=$('#mon_br').html();
    m_timetable["10"]=$('#mon_seventh').val();
    m_timetable["11"]=$('#mon_eight').val();
    monday_timetable.push(m_timetable);   
    // console.log(monday_timetable);
    
    var tuesday_timetable=[];
    var tues_timetable={}

    tues_timetable["1"]=$('#tue_first').val();
    tues_timetable["2"]=$('#tue_sec').val();
    tues_timetable["3"]=$('#tue_br').html();
    tues_timetable["4"]=$('#tue_third').val();
    tues_timetable["5"]=$('#tue_fourth').val();
    tues_timetable["6"]=$('#tue_lunch').html();
    tues_timetable["7"]=$('#tue_fifth').val();
    tues_timetable["8"]=$('#tue_sixth').val();
    tues_timetable["9"]=$('#tue_br').html();
    tues_timetable["10"]=$('#tue_seventh').val();
    tues_timetable["11"]=$('#tue_eight').val();
    tuesday_timetable.push(tues_timetable);
    // console.log(tuesday_timetable);   

    var wednesday_timetable=[];
    var wed_timetable={};

    wed_timetable["1"]=$('#wed_first').val();
    wed_timetable["2"]=$('#wed_sec').val();
    wed_timetable["3"]=$('#wed_break').html();
    wed_timetable["4"]=$('#wed_third').val();
    wed_timetable["5"]=$('#wed_fourth').val();
    wed_timetable["6"]=$('#wed_lunch').html();
    wed_timetable["7"]=$('#wed_fifth').val();
    wed_timetable["8"]=$('#wed_sixth').val();
    wed_timetable["9"]=$('#wed_break').html();
    wed_timetable["10"]=$('#wed_seventh').val();
    wed_timetable["11"]=$('#wed_eight').val();
    wednesday_timetable.push(wed_timetable);
    // console.log(wednesday_timetable);

    var thursday=[];
    var thurs_timetable={};

    thurs_timetable["1"]=$('#thur_first').val();
    thurs_timetable["2"]=$('#thur_sec').val();
    thurs_timetable["3"]=$('#thur_brk').html();
    thurs_timetable["4"]=$('#thur_third').val();
    thurs_timetable["5"]=$('#thur_fourth').val();
    thurs_timetable["6"]=$('#thur_lunch').html();
    thurs_timetable["7"]=$('#thur_fifth').val();
    thurs_timetable["8"]=$('#thur_sixth').val();
    thurs_timetable["9"]=$('#thur_break').html();
    thurs_timetable["10"]=$('#thur_seventh').val();
    thurs_timetable["11"]=$('#thur_eight').val();
    thursday.push(thurs_timetable);   

    var friday=[];
    var fri_timetable={};

    fri_timetable["1"]=$('#fri_first').val();
    fri_timetable["2"]=$('#fri_sec').val();
    fri_timetable["3"]=$('#fri_brk').html();
    fri_timetable["4"]=$('#fri_third').val();
    fri_timetable["5"]=$('#fri_fourth').val();
    fri_timetable["6"]=$('#fri_lunch').html();
    fri_timetable["7"]=$('#fri_fifth').val();
    fri_timetable["8"]=$('#fri_sixth').val();
    fri_timetable["9"]=$('#fri_break').html();
    fri_timetable["10"]=$('#fri_seventh').val();
    fri_timetable["11"]=$('#fri_eight').val();
    friday.push(fri_timetable);    

    var saturday=[];
    var sat_timetable={};

    sat_timetable["1"]=$('#sat_first').val();
    sat_timetable["2"]=$('#sat_sec').val();
    sat_timetable["3"]=$('#sat_break').html();
    sat_timetable["4"]=$('#sat_third').val();
    sat_timetable["5"]=$('#sat_fourth').val();
    sat_timetable["6"]=$('#sat_lunch').html();
    sat_timetable["7"]=$('#sat_fifth').val();
    sat_timetable["8"]=$('#sat_sixth').val();
    sat_timetable["9"]=$('#sat_break').html();
    sat_timetable["10"]=$('#sat_seventh').val();
    sat_timetable["11"]=$('#sat_eight').val();
    saturday.push(sat_timetable);
    // console.log(saturday);
    if(class_!='' && section!='')
    {
       $.ajax({
              url: "Profile/SetTimeTable",
              type: "POST",             
              data:
              {
                  clss_id:class_,
                  class_sec:section,
                  monday_data:monday_timetable,
                  tuesday_data:tuesday_timetable,
                  wednesday_data:wednesday_timetable,
                  thursday_data:thurs_timetable,
                  friday_data:fri_timetable,
                  saturday_data:saturday
              },
              success: function(response,data){
                console.log(data);
                console.log(response);

                swal({
                    text: "TimeTable Added Successfully",
                    type: "success",
                    timer: 1200
                  });                
            }
    });
    }
    else
    {
      alert("Class or section is not selected");
    }
  
}
function gettimetable_data()
{
  var class_= $("#classId option:selected").val();  
  var secid=$("#section_id option:selected").val();
  $.ajax({
              url: "Profile/getTimeTableData",
              type: "POST",             
              data:
              {
                  clss_id:class_,
                  class_sec:secid
              },
              success: function(response,data){
                console.log(response);
                console.log(data);
                // swal({
                //     text: "TimeTable Added Successfully",
                //     type: "success",
                //     timer: 1200
                //   });                
            }
  });
  
}
</script>