<?php 
$page='Notification';
include_once 'header.php';

require_once 'application/models/ManageNotification.php';
$setNotification = new ManageNotification();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-md-8"><h4>Student List</h4></div>
        <div class="col-md-6" style="text-align: right;"><h4>Notification</h4></div>
        <ol class="breadcrumb">
        <li><a href="Index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="StudentList">Student</a></li> 
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Manage Notification               
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button> -->
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                <textarea id="editor1" name="editor1" rows="10" cols="80">
                  Manage your text in your own way.
                </textarea>

                 <div class="box-footer clearfix">
                  <button type="button" class="pull-right btn btn-default" id="publishData" onclick=''>Publish</button>
                </div>
              </form>
            </div>
          </div>
        </div> 
      </div>
    </section>
</div> 
<?php include_once 'footer.php';?>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>