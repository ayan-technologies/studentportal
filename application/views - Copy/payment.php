<?php 
$page='PaymentUpdation';
include_once 'header.php';
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
  <!-- Content Wrapper. Contains page content -->
  <div id="imgload" style="display:none;" ></div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Payment Notification</h1>
      <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="ApplyLeave">Payment</a></li> 
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12" >
          <div class="box text-center ">
            <div class="col-md-6">
            <div class="box-body centered">
              <div class="box box-info">
                <!-- form start -->
                <form id="myForm1" name="myForm1" method="post" class="form-horizontal" onsubmit="return stopsubmit();">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputApply" class="col-sm-3 control-label">Choose Class</label>
                        <div class="col-sm-9">
                          <select class="form-control select2" name="type" id="type" onchange="return showtype(this.value);" style="width: 100%;">
                              <option>Select</option>
                              <option>All</option>
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
                        </div>
                        <div id="showleave">
                          <div class="form-group">
                            <label for="inputApply" class="col-sm-3 control-label">Choose Section</label>
                              <div class="col-sm-9">
                                <select class="form-control select2" name="section" id="section" style="width: 100%;">
                                  <option>Select</option>
                                  <option>All</option>
                                  <option>A</option>
                                  <option>B</option>
                                  <option>C</option>
                                  <option>D</option> 
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputfeesFrom" class="col-sm-3 control-label">From Date</label>
                                <div class="col-sm-9">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                     <input type="text" class="form-control pull-right pdate" id="pdate" name="pdate">
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="inputfeesFrom" class="col-sm-3 control-label">Last Date</label>
                                <div class="col-sm-9">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                     <input type="text" class="form-control pull-right pdate" id="lastdate" name="lastdate">
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Message</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="message" name="mesasge" placeholder="mesasge">
                              </div>
                          </div>
                        </div>                                 
                        <div class="box-footer twoToneCenter">
                          <div class="col-xs-12">
                            <div class="col-sm-4">
                              <button type="submit" class="btn btn-default">Cancel</button>
                            </div>
                            <div class="col-sm-4">
                              <button style="margin-right: -47px" type="button" class="btn btn-success pull-center twoToneButton" onclick="return Checkleave();" >Submit</button>
                            </div>
                            <div class="col-sm-4">
                              <button type="button" style="margin-right: -41px"type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">Reminder</button>
                            </div>
                          </div>
                        </div>                     
                      </form>
              </div>
            </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title">Remider</h4>
                </div>
                <form name="approval" id="approval" method="post" class="form-horizontal">
                    <div class="box-body">                        
                        <div class="form-group">                           
                            <div class="col-sm-12" style="margin-top: 7px;">
                                <div>
                                  <p style="text-align: center">
                                  This is a reminder that the last date for the Tuition fee in '20th feb'<br>
                                  If you already paid the fees, please disregard this message
                                  <br><br>
                                  <span>
                                  Thank You,<br>
                                  Sample School
                                </span>
                                </p>
                                 </div>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="#">Send</button>
                        </div>
                    </div>
                </form>
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

<!-- bootstrap datepicker -->
<!-- bootstrap time picker -->
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
<script type="text/javascript">
  function  test()
  {
    alert("test123");
  }
</script>

