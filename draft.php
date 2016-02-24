<!DOCTYPE html>
<?php 

  // echo "string";
  include 'class/smstext.class.php';
  $smstext = new smstext();

  // Get the id given
  $draft_id = $_GET['id'];

  // delete draft
  if (isset($_GET['delete'])) {
    $smstext->delete($_GET['delete']);
    header('Location:draftsms.php?delete=1');
    exit();
  }
  

  if (isset($_POST['submit-sms'])) {

    // get the field data
    $recipients  = trim($_POST['recipient-phone']);
    $message     = trim($_POST['smstext']);

    // $sent = $smstext->sendSms($recipients,$message);
    $sent = 'Success';
    
    // if there is an error stay on page and show error

    // only if the sms is sent
    // then save the da
    if ($sent =='Success') {
      //save the data
      $is_draft = 0;
      $saved = $smstext->update($draft_id,$recipients,$message,$is_draft);

      // redirect to inbox and show sucess message
      header("Location: sentsms.php?sent=sucess");
      exit(); // prevent the est of page from showing accidentaly
    }


  } // endif


  /** 
  *
  * get the variables
  * update the table
  * use update()
  * stay on page and display u[dated data
  **/

  if (isset($_POST['draft-sms']) ):
    // get the field data
    $recipients  = trim($_POST['recipient-phone']);
    $message     = trim($_POST['smstext']);

    //update the data
    $is_draft = 1;
    $updated = $smstext->update($draft_id,$recipients,$message,$is_draft);
  endif;


  // get the data from table
  $draft_sms = $smstext ->getSingle($draft_id);

 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>SMSAPP | Edit Draft</title>
    <?php include "includes/_metaheader.php"; ?>
    <?php include "includes/_csslinks.php"; ?>
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- TAGIT INSTRUCTIONS -->

    <!-- 2 CSS files are required: -->
    <!--   * Tag-it's base CSS (jquery.tagit.css). -->
    <!--   * Any theme CSS (either a jQuery UI theme such as "flick", or one that's bundled with Tag-it, e.g. tagit.ui-zendesk.css as in this example.) -->
    <!-- The base CSS and tagit.ui-zendesk.css theme are scoped to the Tag-it widget, so they shouldn't affect anything else in your site, unlike with jQuery UI themes. -->
    <link href="dist/css/tagit/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="dist/css/tagit/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
    <!-- If you want the jQuery UI "flick" theme, you can use this instead, but it's not scoped to just Tag-it like tagit.ui-zendesk is: -->
    <!--   <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css"> -->

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
            Draft Messages
            <small><?php echo $smstext->total_draft ?> </small>
          </h1>
          <?php include "includes/_breadcrums.php"; ?>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- 
            show an alert ito show you are editing a draft SMS
           -->
          <?php if (isset($_GET['draft']) && isset($_GET['draft']) == 1):?>
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>  <i class="icon fa fa-check"></i> You are now editing a draft.</h4>
            </div>
          <?php endif; ?>

          <!-- 
            show an alert if the update goes well
           -->
          <?php if (isset($updated) && isset($updated) == 1):?>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>  <i class="icon fa fa-check"></i> Draft sms updated.</h4>
            </div>
          <?php endif; ?>

          <!-- 
            show an alert if the update does not go well
           -->
          <?php if (isset($updated) && isset($updated) != 1):?>
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Error. Not updated. Please contact your administrator</h4>
              <p><?php echo $updated; ?></p>
            </div> 
          <?php endif; ?>

          <!-- 
          show an alert if the sending and updating goes well
          -->
          <?php if (isset($sent) == 'Success' && isset($saved) == 1): ?>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>  <i class="icon fa fa-check"></i> Sucess!</h4>
            </div>
          <?php endif ?>

          <!-- 
          show an alert if the sending and updating does not go well
          -->
          <?php if (isset($sent) && isset($sent) != 'Success'): ?>
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>
                <i class="icon fa fa-ban"></i>
                 Error. SMS not sent. Please contact your administrator <br/>
                 <?php echo isset($sent); ?>
              </h4>
            </div> 
          <?php endif ?>

          <div class="row">
            <div class="col-md-3">
              <a href="mailbox.php" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
              <!-- mailbox side menu -->
              <?php include 'includes/_mailboxmenu.php' ?>
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                
                <form action="" method="post">

                  <div class="box-header with-border">
                    <h3 class="box-title">Compose New Sms</h3>
                    <div class="pull-right">
                      <input type="submit" class="btn btn-primary" value="send" name="submit-sms"></input>
                    </div>
                  </div><!-- /.box-header -->

                  <div class="box-body">
                    <div class="form-group">
                      <!-- <input class="form-control" placeholder="To:" name="recipient-phone" value="<?php //echo $draft_sms['phone']; ?>"> -->
                      <input  id="mySingleField" name="recipient-phone" type="hidden" value="<?php echo $draft_sms['phone']; ?>"> 
                      <ul id="singleFieldTags"> </ul>
                    </div>
                  
                    <div class="form-group">
                      <textarea id="" class="form-control" style="height: 200px" name="smstext">
                        <?php echo $draft_sms['smstext']; ?>
                      </textarea>
                    </div>

                    <input type="hidden" name="draf_sms_id" value="<?php $draft_sms['id'] ?>" />
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <div class="pull-right">
                      <!-- <a href="" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</a> -->
                      <input type="submit" class="btn btn-default" value="Save Draft" name="draft-sms"></input>
                      <!-- <input type="submit" class="btn btn-primary" value="send" name="submit-sms"></input> -->
                      <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o" name="submit-sms"></i> Send</button> -->
                    </div>
                    <a href="?delete=<?php echo $draft_sms['id']; ?>&id=<?php echo $draft_sms['id']; ?>" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
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

    <!-- Jquery Tagit -->
    <!-- jQuery and jQuery UI are required dependencies. -->
    <!-- Although we use jQuery 1.4 here, it's tested with the latest too (1.8.3 as of writing this.) -->
    <!-- // <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

    <!-- The real deal -->
    <script src="dist/js/tagit/tag-it.js" type="text/javascript" charset="utf-8"></script>
    <!-- tagit page javascript - cutom -->
    <script src="dist/js/tagit/tag-it-send-to.js" type="text/javascript" charset="utf-8"></script>

    
  </body>
</html>
