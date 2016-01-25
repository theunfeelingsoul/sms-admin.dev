<!DOCTYPE html>
<?php 


  if (isset($_POST['submit-sms'])) {
    include 'class/smstext.php';
    $smstext = new smstext();

    // get the field data
     $recipients  = trim($_POST['recipient-phone']);
     $message     = trim($_POST['smstext']);
     
     $sent = $smstext->sendSms($recipients,$message);
    //save the data
    $saved = $smstext->create($recipients,$message);

    // echo "<div style=''>cc".$sent.$saved."</div>";

  }
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>AdminLTE 2 | Compose Message</title>
    <?php include "includes/_metaheader.php"; ?>
    <?php include "includes/_csslinks.php"; ?>
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
            Mailbox
            <small>13 new messages</small>
          </h1>
          <?php include "includes/_breadcrums.php"; ?>
        </section>

        <!-- Main content -->
        <section class="content">
          <?php 

            if (isset($sent)) {
              if ($sent == 'Success' && $saved ==1) {
           ?>
              <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>  <i class="icon fa fa-check"></i> Sucess!</h4>
              </div>
          <?php 

              }else{

           ?>
              <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Error. Please contact your administrator</h4>
              </div> 
          <?php 

              }
            }

           ?>
          <div class="row">
            <div class="col-md-3">
              <a href="mailbox.php" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
              <!-- mailbox side menu -->
              <?php include 'includes/_mailboxmenu.php' ?>
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Compose New Sms</h3>
                </div><!-- /.box-header -->
                <form action="" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <input class="form-control" placeholder="To:" name="recipient-phone">
                    </div>
                  
                    <div class="form-group">
                      <textarea id="" class="form-control" style="height: 200px" name="smstext">
                        
                      </textarea>
                    </div>
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <div class="pull-right">
                      <a href="" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</a>
                      <input type="submit" class="btn btn-primary" value="submit" name="submit-sms"></input>
                      <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o" name="submit-sms"></i> Send</button> -->
                    </div>
                    <a href="" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
                  </div><!-- /.box-footer -->
                </form>
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
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Page Script -->
    
  </body>
</html>
