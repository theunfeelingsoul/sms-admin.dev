<!DOCTYPE html>

<?php

  include 'class/class.group.php';
  $G = new Group();
  $id = $_GET['u'];
  // get single
  $group = $G->Single($id);

if(isset($_POST['update'])){

  $label_name = $_POST['label_name'];
  $id = $_POST['id'];

  $update = $G->update($id,$label_name);

  // if update is succesful
  if ($update == 1) {
   // add the id and an update variable of 1
   header("Location:updateGroup.php?u=$id&update=1");  
  }
 
}


?>

<html>
  <head>
  <title>SMSAPP | Update Contacts</title>
  <?php include "includes/_metaheader.php"; ?>
  <?php include "includes/_csslinks.php"; ?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- header -->
      <?php include "includes/_header.php"; ?>

      <!-- Left side column. contains the logo and sidebar -->
      <?php include "includes/_leftsidebar.php" ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Contact
            <!-- <small>Preview</small> -->
          </h1>
          <?php include "includes/_breadcrums.php"; ?>
        </section>

        <!-- Main content -->
        <section class="content">

          <?php if (isset($_GET['update']) && isset($_GET['update']) == 1): ?>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>  <i class="icon fa fa-check"></i> Group Updated. &nbsp;&nbsp;  <SMALL> <a href="viewGroups.php">View group here</a></SMALL></h4>
            </div>
          <?php endif; ?>

          <?php if (isset($update) && isset($update) == 0): ?>
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>  <i class="icon fa fa-check"></i> Error. Please contact your administrator <br><?= $update; ?></h4>
            </div>
          <?php endif; ?>
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <!-- <h3 class="box-title">Update contact</h3> -->
                </div><!-- /.box-header -->
                <!-- form start -->

               
                <form role="form" action="" method="post">
                <input type="hidden" value="<?php echo $group['id'] ?>" name="id"/>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="">Group Name</label>
                      <input type="text" class="form-control" id=""  name="label_name" value="<?= $group['label_name'] ?>">
                    </div>
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                  </div>
                </form>
             
              </div><!-- /.box -->
            </div><!--/.col (left) -->

           
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!-- footer -->
      <?php include "includes/_footercopyright.php"; ?>

      <!-- Control Sidebar -->
     <?php include "includes/_controlsidebar.php"; ?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
