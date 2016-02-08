<!DOCTYPE html>

<?php

include "includes/_config.php";

if(isset($_POST['bts'])){
  if($_POST['nm']!=null && $_POST['gd']!=null && $_POST['tl']!=null  && $_POST['idnumber']!=null){
     $stmt = $mysqli->prepare("INSERT INTO personal(name,gender,telp,idnumber) VALUES (?,?,?,?)");
     $stmt->bind_param('ssss', $nm, $gd, $tl, $idnumber);

     $nm = $_POST['nm'];
     $gd = $_POST['gd'];
     $tl = $_POST['tl'];
     $idnumber = $_POST['idnumber'];

     if($stmt->execute()){
      //echo "sucess";
      $status = 1;
     }else{
       $status = 0;
       $error = $mysqli->error;
     }
  }else{
    // echo "please fill in all ";
  }
}
?>

<html>
  <head>
    <title>SMSAPP | Add Contact</title>
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
            Add a Contact
            <!-- <small>Preview</small> -->
          </h1>
          <?php include "includes/_breadcrums.php"; ?>
        </section>

        <!-- Main content -->
        <section class="content">
          <?php if (isset($status) && isset($status) == 1): ?>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>  <i class="icon fa fa-check"></i> Contact Added! &nbsp;&nbsp;  <SMALL> <a href="viewContact.php">View contact here</a></SMALL></h4>
            </div>
          <?php endif; ?>

          <?php if (isset($status) && isset($status) == 0): ?>
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>  <i class="icon fa fa-check"></i> Error. Please contact your administrator <br> <?php echo $error ?></h4>
            </div>
          <?php endif; ?>
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- <div class="box-header with-border"> -->
                  <!-- <h3 class="box-title">Quick Example</h3> -->
                <!-- </div>/.box-header -->
                <!-- form start -->
                <form role="form" action="" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="" placeholder="Enter name" name="nm">
                    </div>
                    <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control" name="gd">
                        <option>Male</option>
                        <option>Female</option>
               
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Phone</label>
                      <input type="tel" class="form-control" id="" placeholder="Enter phone" name="tl">
                    </div>
                    <div class="form-group">
                      <label for="">ID number</label>
                      <input type="text" class="form-control" id="" placeholder="Enter ID number" name="idnumber">
                    </div>
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="bts">Submit</button>
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
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
