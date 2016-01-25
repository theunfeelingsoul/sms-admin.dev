<!DOCTYPE html>
<?php 
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include 'class/smstext.php';

    $smstext = new smstext();

    $data=$smstext->getSingle($id);

  }

 ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMSAPP | Read Sms</title>
    <?php include "includes/_metaheader.php"; ?>
    <?php include "includes/_csslinks.php"; ?>
    <!-- fullCalendar 2.2.5-->
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
            Read Sms
          </h1>
          <?php include "includes/_breadcrums.php"; ?>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <a href="compose.php" class="btn btn-primary btn-block margin-bottom">Compose</a>
              <?php include 'includes/_mailboxmenu.php' ?>
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Read Sms</h3>
                  <div class="box-tools pull-right">
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    <!-- <h3>Message Subject Is Placed Here</h3> -->
                    <h5>To: <?php echo $data['phone']; ?> <span class="mailbox-read-time pull-right">15 Feb. 2015 11:03 PM</span></h5>
                  </div><!-- /.mailbox-read-info -->
                  <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Reply"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Forward"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button>
                  </div><!-- /.mailbox-controls -->
                  <div class="mailbox-read-message">
                    <p><?php echo $data['smstext']; ?></p>
                  </div><!-- /.mailbox-read-message -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button class="btn btn-default"><i class="fa fa-reply"></i> Resend</button>
                  </div>
                  <button class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                  <button class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
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
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
  </body>
</html>
