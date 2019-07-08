<?php 
$page='TranspotationDetails';
include_once 'header.php'; 

require_once 'application/models/ManageProfile.php';
$gettransportationData = new ManageProfile();

?> 
<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Transpotation Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="MyProfile">Transpotation Details</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div style="text-align: center;">
              <b><h3 class="box-title">Sample School</h3><br></b>
            </div>
           </div> 
            <!-- /.box-header -->
            <?php
                 // print_r($_SESSION['userdetails']);
                 // print_r($_SESSION['userdetails']->{'EmployeeDesignation'});                
                // $user_data=$getSchoolProfile->GetSchoolData();
                $userdetails=$this->session->userdata['userdetails'];
            ?>
            <?php if($_SESSION['userdetails']->{'EmployeeDesignation'}==5 
            || $_SESSION['userdetails']->{'EmployeeDesignation'}==4 ) {?>
            <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header" style="text-align: center;">
                      <b><span>Transpotation Details</span></b>
                      </div>
                    <div class="col-sm-12 form-group"></div>
                    <form method="post" class="form-horizontal" >
                 <div class="box-body">
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Bus No</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">123</div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Route</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">yyyyy </div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Driver Name</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">yyyyy</div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Mobile:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">7894563210</div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Incharge Name</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">rrrrr</div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Incharge No:</label>
                        <div class="col-sm-9" style="margin-top: 7px;">
                            <div class="col-sm-12">1234567897
                            </div>
                        </div>
                    </div>
                </div>  
            </form>                  
          </div>
      </div> 
            <?php } if($_SESSION['userdetails']->{'EmployeeDesignation'}==1) {?>
            <div class="row">
             <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div style="text-align: center;">
                  <b><span>Transportation Details</span></b>
                  </div>
                </div>
                <div class="box-body">
                  <div class="col-sm-12 form-group"></div>
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>                            
                            <th style="text-align: center">Sno</th>
                            <th style="text-align: center">Bus No.</th>
                            <th style="text-align: center">Bus Route</th>
                            <th style="text-align: center">Incharge Name</th>
                            <th style="text-align: center">Incharge No.</th>
                            <th style="text-align: center">Driver Name</th>
                            <th style="text-align: center">Driver No.</th>
                            <th style="text-align: center">Action</th>
                        </tr>                         
                    </thead>
                    <tbody>
                    <tr>   
                      <td>1</td>            
                      <td><input type="text" class="form-control " id="busno" value="1"></td>                            
                      <td><input type="text"  class="form-control " id="route" value="xxxx route"></td>
                      <td><input type="text"  class="form-control " id="inchargename" value="Incharge Name"></td>
                      <td><input type="text"  class="form-control " id="inchargeno" value="1234564"></td>
                      <td><input type="text"  class="form-control " id="mark5" value="Driver Name"></td> 
                      <td><input type="text"  class="form-control " id="driverno" value="1234564"></td>                    
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
  
