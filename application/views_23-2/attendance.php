<?php 
$page='Attendance';
include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$getattendanceReport = new ManageProfile();

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attendance Automation
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="MyProfile">Attendance</a></li> 
      </ol>
    </section>
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
              <table id="example3" class="table table-bordered">
                <thead>
                    <tr>
                      <th>S.no</th>
                      <th>Name</th> 
                      <!-- <th>1</th>
                      <th>2</th>
                      <th>3</th>
                      <th>4</th>
                      <th>5</th>
                      <th>6</th>  
                      <th>7</th>  
                      <th>8</th>
                      <th>9</th>
                      <th>10</th>
                      <th>11</th>
                      <th>12</th>
                      <th>13</th>
                      <th>14</th> 
                      <th>15</th>  
                      <th>16</th>
                      <th>17</th>
                      <th>18</th>-->
                      <th>Feb-19</th>
                      <th>Feb-20</th>
                      <th>Feb-21</th>
                      <!--<th>22</th>
                      <th>23</th>
                      <th>24</th>
                      <th>25</th>
                      <th>26</th>
                      <th>27</th>
                      <th>28</th>
                      <th>29</th>
                      <th>30</th>
                      <th>31</th> -->
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Student 1</td>
                    <!-- <td id="st_1_01">
                      <span class="col-sm-1" id="1_01_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_01_M')">P</span>  -->                    
                      <!-- <span class="col-sm-1" id="1_01_A" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_01_M')" onclick="changeattendance('1_01_A')">P</span><br> 
                    </td>-->
                    <!-- <td id="st_1_02">
                      <span class="col-sm-1" id="1_02_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_02_M')">P</span>  
                    </td>                   
                    <td id="st_1_03">
                      <span class="col-sm-1" id="1_03_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_03_M')">P</span>  
                    </td>
                    <td id="st_1_04">
                      <span class="col-sm-1" id="1_04_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_04_M')">P</span>  
                    </td>
                    <td id="st_1_05">
                      <span class="col-sm-1" id="1_05_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_05_M')">P</span>  
                    </td>
                    <td id="st_1_06">
                      <span class="col-sm-1" id="1_06_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_06_M')">P</span>  
                    </td>
                    <td id="st_1_07">
                      <span class="col-sm-1" id="1_07_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_07_M')">P</span>  
                    </td>
                    <td id="st_1_08">
                      <span class="col-sm-1" id="1_08_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_08_M')">P</span>  
                    </td>
                    <td id="st_1_09">
                      <span class="col-sm-1" id="1_09_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_09_M')">P</span>  
                    </td>
                    <td id="st_1_10">
                      <span class="col-sm-1" id="1_10_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_10_M')">P</span>  
                    </td>
                    <td id="st_1_11">
                      <span class="col-sm-1" id="1_11_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_11_M')">P</span>  
                    </td>
                    <td id="st_1_12">
                      <span class="col-sm-1" id="1_12_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_12_M')">P</span>  
                    </td>
                    <td id="st_1_13">
                      <span class="col-sm-1" id="1_13_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_13_M')">P</span>  
                    </td>
                    <td id="st_1_14">
                      <span class="col-sm-1" id="1_14_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_14_M')">P</span>  
                    </td> -->
                   <!--  <td id="st_1_15">
                      <span class="col-sm-1" id="1_15_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('1_15_M')">P</span>
                    </td>
                    <td id="st_1_16">
                      <span disabled="disabled" class="col-sm-1" id="1_16_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('1_16_M')">P</span>  
                    </td>
                    <td id="st_1_17">
                      <span disabled="disabled" class="col-sm-1" id="1_17_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('1_17_M')">P</span>  
                    </td>
                    <td id="st_1_18">
                      <span disabled="disabled" class="col-sm-1" id="1_18_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('1_18_M')">P</span> 
                    </td> -->
                    <td id="st_1_19">
                      <span disabled="disabled" class="col-sm-1" id="1_19_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('1_19_M')">P</span>  
                    </td>
                    <td id="st_1_20">
                      <span class="col-sm-1" id="1_20_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('1_20_M')">P</span>
                    </td>
                    <td id="st_1_21">
                      <span class="col-sm-1" id="1_21_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('1_21_M')">P</span>  
                    </td>
                    <!-- <td id="st_1_22">
                      <span class="col-sm-1" id="1_22_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_22_M')">P</span>  
                    </td>
                    <td id="st_1_23">
                      <span class="col-sm-1" id="1_23_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_23_M')">P</span>
                    </td>
                    <td id="st_1_24">
                      <span class="col-sm-1" id="1_24_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_24_M')">P</span> 
                    </td>
                    <td id="st_1_25">
                      <span class="col-sm-1" id="1_25_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_25_M')">P</span> 
                    </td>
                    <td id="st_1_26">
                      <span class="col-sm-1" id="1_26_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_26_M')">P</span>  
                    </td>
                    <td id="st_1_27">
                      <span class="col-sm-1" id="1_27_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_27_M')">P</span>
                    </td>
                    <td id="st_1_28">
                      <span class="col-sm-1" id="1_28_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_28_M')">P</span>
                    </td>
                    <td id="st_1_29">
                      <span class="col-sm-1" id="1_29_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_29_M')">P</span>
                    </td>
                    <td id="st_1_30">
                      <span class="col-sm-1" id="1_30_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_30_M')">P</span>
                    </td>
                    <td id="st_1_31">
                      <span class="col-sm-1" id="1_31_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_31_M')">P</span>
                    </td> -->
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Student 2</td>
                    <!-- <td id="st_2_01">
                      <span class="col-sm-1" id="2_01_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_01_M')">P</span>  -->                    
                      <!-- <span class="col-sm-1" id="1_01_A" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_01_M')" onclick="changeattendance('1_01_A')">P</span><br> 
                    </td>-->
                    <!-- <td id="st_2_02">
                      <span class="col-sm-1" id="2_02_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_02_M')">P</span>  
                    </td>                   
                    <td id="st_2_03">
                      <span class="col-sm-1" id="2_03_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_03_M')">P</span>  
                    </td>
                    <td id="st_1_04">
                      <span class="col-sm-1" id="1_04_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_04_M')">P</span>  
                    </td>
                    <td id="st_2_05">
                      <span class="col-sm-1" id="2_05_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_05_M')">P</span>  
                    </td>
                    <td id="st_2_06">
                      <span class="col-sm-1" id="2_06_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_06_M')">P</span>  
                    </td>
                    <td id="st_2_07">
                      <span class="col-sm-1" id="2_07_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_07_M')">P</span>  
                    </td>
                    <td id="st_2_08">
                      <span class="col-sm-1" id="2_08_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_08_M')">P</span>  
                    </td>
                    <td id="st_2_09">
                      <span class="col-sm-1" id="2_09_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_09_M')">P</span>  
                    </td>
                    <td id="st_2_10">
                      <span class="col-sm-1" id="2_10_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_10_M')">P</span>  
                    </td>
                    <td id="st_2_11">
                      <span class="col-sm-1" id="2_11_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_11_M')">P</span>  
                    </td>
                    <td id="st_2_12">
                      <span class="col-sm-1" id="2_12_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_12_M')">P</span>  
                    </td>
                    <td id="st_2_13">
                      <span class="col-sm-1" id="2_13_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_13_M')">P</span>  
                    </td>
                    <td id="st_2_14">
                      <span class="col-sm-1" id="2_14_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_14_M')">P</span>  
                    </td>
                    <td id="st_2_15">
                      <span class="col-sm-1" id="2_15_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('2_15_M')">P</span>  
                    </td>
                    <td id="st_2_16">
                      <span class="col-sm-1" id="2_16_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('2_16_M')">P</span>  
                    </td>
                    <td id="st_2_17">
                      <span class="col-sm-1" id="2_17_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('2_17_M')">P</span>  
                    </td>
                    <td id="st_2_18">
                      <span class="col-sm-1" id="2_18_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('2_18_M')">P</span> 
                    </td> -->
                    <td id="st_2_19">
                      <span class="col-sm-1" id="2_19_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('2_19_M')">P</span>  
                    </td>
                    <td id="st_2_20">
                      <span class="col-sm-1" id="2_20_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('2_20_M')">P</span>
                    </td>
                    <td id="st_2_21">
                      <span class="col-sm-1" id="2_21_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('2_21_M')">P</span>  
                    </td>
                    <!-- <td id="st_2_22">
                      <span class="col-sm-1" id="2_22_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_22_M')">P</span>  
                    </td>
                    <td id="st_2_23">
                      <span class="col-sm-1" id="2_23_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_23_M')">P</span>
                    </td>
                    <td id="st_2_24">
                      <span class="col-sm-1" id="2_24_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_24_M')">P</span> 
                    </td>
                    <td id="st_2_25">
                      <span class="col-sm-1" id="2_25_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_25_M')">P</span> 
                    </td>
                    <td id="st_2_26">
                      <span class="col-sm-1" id="2_26_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_26_M')">P</span>  
                    </td>
                    <td id="st_2_27">
                      <span class="col-sm-1" id="2_27_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_27_M')">P</span>
                    </td>
                    <td id="st_2_28">
                      <span class="col-sm-1" id="2_28_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_28_M')">P</span>
                    </td>
                    <td id="st_2_29">
                      <span class="col-sm-1" id="2_29_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_29_M')">P</span>
                    </td>
                    <td id="st_2_30">
                      <span class="col-sm-1" id="2_30_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_30_M')">P</span>
                    </td>
                    <td id="st_2_31">
                      <span class="col-sm-1" id="2_31_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_31_M')">P</span>
                    </td> -->
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Student 3</td>
                    <!-- <td id="st_2_01">
                      <span class="col-sm-1" id="2_01_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_01_M')">P</span>  -->                    
                      <!-- <span class="col-sm-1" id="1_01_A" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_01_M')" onclick="changeattendance('1_01_A')">P</span><br> 
                    </td>-->
                    <!-- <td id="st_2_02">
                      <span class="col-sm-1" id="2_02_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_02_M')">P</span>  
                    </td>                   
                    <td id="st_2_03">
                      <span class="col-sm-1" id="2_03_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_03_M')">P</span>  
                    </td>
                    <td id="st_1_04">
                      <span class="col-sm-1" id="1_04_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_04_M')">P</span>  
                    </td>
                    <td id="st_2_05">
                      <span class="col-sm-1" id="2_05_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_05_M')">P</span>  
                    </td>
                    <td id="st_2_06">
                      <span class="col-sm-1" id="2_06_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_06_M')">P</span>  
                    </td>
                    <td id="st_2_07">
                      <span class="col-sm-1" id="2_07_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_07_M')">P</span>  
                    </td>
                    <td id="st_2_08">
                      <span class="col-sm-1" id="2_08_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_08_M')">P</span>  
                    </td>
                    <td id="st_2_09">
                      <span class="col-sm-1" id="2_09_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_09_M')">P</span>  
                    </td>
                    <td id="st_2_10">
                      <span class="col-sm-1" id="2_10_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_10_M')">P</span>  
                    </td>
                    <td id="st_2_11">
                      <span class="col-sm-1" id="2_11_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_11_M')">P</span>  
                    </td>
                    <td id="st_2_12">
                      <span class="col-sm-1" id="2_12_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_12_M')">P</span>  
                    </td>
                    <td id="st_2_13">
                      <span class="col-sm-1" id="2_13_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_13_M')">P</span>  
                    </td>
                    <td id="st_2_14">
                      <span class="col-sm-1" id="2_14_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_14_M')">P</span>  
                    </td> 
                    <td id="st_3_15">
                      <span class="col-sm-1" id="3_15_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('3_15_M')">P</span>  
                    </td>
                    <td id="st_3_16">
                      <span class="col-sm-1" id="3_16_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('3_16_M')">P</span>  
                    </td>
                    <td id="st_3_17">
                      <span class="col-sm-1" id="3_17_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('3_17_M')">P</span>  
                    </td>
                    <td id="st_3_18">
                      <span class="col-sm-1" id="3_18_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('3_18_M')">P</span> 
                    </td>-->
                    <td id="st_3_19">
                      <span class="col-sm-1" id="3_19_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('3_19_M')">P</span>  
                    </td>
                    <td id="st_3_20">
                      <span class="col-sm-1" id="3_20_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('3_20_M')">P</span>
                    </td>
                    <td id="st_3_21">
                      <span class="col-sm-1" id="3_21_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('3_21_M')">P</span>  
                    </td>
                    <!-- <td id="st_2_22">
                      <span class="col-sm-1" id="2_22_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_22_M')">P</span>  
                    </td>
                    <td id="st_2_23">
                      <span class="col-sm-1" id="2_23_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_23_M')">P</span>
                    </td>
                    <td id="st_2_24">
                      <span class="col-sm-1" id="2_24_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_24_M')">P</span> 
                    </td>
                    <td id="st_2_25">
                      <span class="col-sm-1" id="2_25_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_25_M')">P</span> 
                    </td>
                    <td id="st_2_26">
                      <span class="col-sm-1" id="2_26_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_26_M')">P</span>  
                    </td>
                    <td id="st_2_27">
                      <span class="col-sm-1" id="2_27_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_27_M')">P</span>
                    </td>
                    <td id="st_2_28">
                      <span class="col-sm-1" id="2_28_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_28_M')">P</span>
                    </td>
                    <td id="st_2_29">
                      <span class="col-sm-1" id="2_29_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_29_M')">P</span>
                    </td>
                    <td id="st_2_30">
                      <span class="col-sm-1" id="2_30_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_30_M')">P</span>
                    </td>
                    <td id="st_2_31">
                      <span class="col-sm-1" id="2_31_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_31_M')">P</span>
                    </td> -->
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Student 4</td>
                    <!-- <td id="st_2_01">
                      <span class="col-sm-1" id="2_01_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_01_M')">P</span>  -->                    
                      <!-- <span class="col-sm-1" id="1_01_A" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_01_M')" onclick="changeattendance('1_01_A')">P</span><br> 
                    </td>-->
                    <!-- <td id="st_2_02">
                      <span class="col-sm-1" id="2_02_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_02_M')">P</span>  
                    </td>                   
                    <td id="st_2_03">
                      <span class="col-sm-1" id="2_03_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_03_M')">P</span>  
                    </td>
                    <td id="st_1_04">
                      <span class="col-sm-1" id="1_04_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('1_04_M')">P</span>  
                    </td>
                    <td id="st_2_05">
                      <span class="col-sm-1" id="2_05_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_05_M')">P</span>  
                    </td>
                    <td id="st_2_06">
                      <span class="col-sm-1" id="2_06_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_06_M')">P</span>  
                    </td>
                    <td id="st_2_07">
                      <span class="col-sm-1" id="2_07_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_07_M')">P</span>  
                    </td>
                    <td id="st_2_08">
                      <span class="col-sm-1" id="2_08_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_08_M')">P</span>  
                    </td>
                    <td id="st_2_09">
                      <span class="col-sm-1" id="2_09_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_09_M')">P</span>  
                    </td>
                    <td id="st_2_10">
                      <span class="col-sm-1" id="2_10_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_10_M')">P</span>  
                    </td>
                    <td id="st_2_11">
                      <span class="col-sm-1" id="2_11_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_11_M')">P</span>  
                    </td>
                    <td id="st_2_12">
                      <span class="col-sm-1" id="2_12_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_12_M')">P</span>  
                    </td>
                    <td id="st_2_13">
                      <span class="col-sm-1" id="2_13_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_13_M')">P</span>  
                    </td>
                    <td id="st_2_14">
                      <span class="col-sm-1" id="2_14_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_14_M')">P</span>  
                    </td> 
                    <td id="st_4_15">
                      <span class="col-sm-1" id="4_15_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('4_15_M')">P</span>  
                    </td>
                    <td id="st_4_16">
                      <span class="col-sm-1" id="4_16_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('4_16_M')">P</span>  
                    </td>
                    <td id="st_4_17">
                      <span class="col-sm-1" id="4_17_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('4_17_M')">P</span>  
                    </td>
                    <td id="st_4_18">
                      <span class="col-sm-1" id="4_18_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('4_18_M')">P</span> 
                    </td>-->
                    <td id="st_4_19">
                      <span class="col-sm-1" id="4_19_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('4_19_M')">P</span>  
                    </td>
                    <td id="st_4_20">
                      <span class="col-sm-1" id="4_20_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('4_20_M')">P</span>
                    </td>
                    <td id="st_4_21">
                      <span class="col-sm-1" id="4_21_M" style="color: white;background-color: green;width:2px;text-align: center;cursor:pointer" onclick="changeattendance('4_21_M')">P</span>  
                    </td>
                    <!-- <td id="st_2_22">
                      <span class="col-sm-1" id="2_22_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_22_M')">P</span>  
                    </td>
                    <td id="st_2_23">
                      <span class="col-sm-1" id="2_23_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_23_M')">P</span>
                    </td>
                    <td id="st_2_24">
                      <span class="col-sm-1" id="2_24_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_24_M')">P</span> 
                    </td>
                    <td id="st_2_25">
                      <span class="col-sm-1" id="2_25_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_25_M')">P</span> 
                    </td>
                    <td id="st_2_26">
                      <span class="col-sm-1" id="2_26_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_26_M')">P</span>  
                    </td>
                    <td id="st_2_27">
                      <span class="col-sm-1" id="2_27_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_27_M')">P</span>
                    </td>
                    <td id="st_2_28">
                      <span class="col-sm-1" id="2_28_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_28_M')">P</span>
                    </td>
                    <td id="st_2_29">
                      <span class="col-sm-1" id="2_29_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_29_M')">P</span>
                    </td>
                    <td id="st_2_30">
                      <span class="col-sm-1" id="2_30_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_30_M')">P</span>
                    </td>
                    <td id="st_2_31">
                      <span class="col-sm-1" id="2_31_M" style="color: white;background-color: green;width:2px;text-align: center" onclick="changeattendance('2_31_M')">P</span>
                    </td> -->
                  </tr>
                </tbody>
              </table>              
              <tfoot>
                <br>
                <button style=" margin-left: 44%;margin-bottom: 1%" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Make Report</button>
                <div class="col-xs-12">
                  &nbsp;&nbsp;&nbsp;
                </div>
              </tfoot>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->

      <div class="modal fade col-xs-12 col-sm-9 col-md-12" id="modal-default" style="overflow-x: scroll;">
          <div class="modal-dialog">
            <div class="modal-content" style="width: 150%;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Attendanc Report</h4>
              </div>
              <div class="modal-body">                
                <div class="box-body">                        
                  <div class="form-group">                           
                    <div class="col-sm-12" style="margin-top: 7px;">
                      <div>
                        <p style="text-align: center">
                          <span style=" font-size: 22px">Class:LKG &nbsp;&nbsp;&nbsp;&nbsp;Sec:'A'
                            <br>
                          <span style="font-size: 15px">
                            No.of Presents: 45
                            <br>
                            No.of Absents:  2
                          </span>  
                        <br><br>
                        <span style="font-size: 20px">
                          Thank You,<br>
                          Sample School
                        </span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Send Report</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
    </section>
</div>  
<?php include_once 'footer.php';?>
<script>
function changeattendance(type)
{
  var val=$('#'+type).text(); 
    if(val=='P')
    {
      $('#'+type).text('L');
      $('#'+type).attr('style','color: white;background-color: red;width:2px;');
    }
    if(val=='L')
    {
      $('#'+type).text('P');
      $('#'+type).attr('style','color: white;background-color: green;width:2px;');
    }
}
</script>
