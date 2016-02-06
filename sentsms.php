<!DOCTYPE html>
<?php 
  include 'class/smstext.class.php';

  $smstext = new smstext();

  // Pagination
  $per_page = 6;                                            // records per page
  $total = $smstext->countSentSMS();                        // total record number
  $pages = ceil($total / $per_page);                        // total numberof pages
  $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;  // if no page requestdefault to 1
  $start = ($page-1) * $per_page;                           // record to start returning from

  $data = $smstext->getSentSmsPagination($start,$per_page); // return records with start and per page arguments

  // pagination links
  if ($page > 1 ):                                // if there is a page request
    if ($page < $pages ):                         // if records still exist
      $next_page     = $page+1;
      $next_page     = "?page=".$next_page;
      $previous_page = $page-1;
      $previous_page = "?page=".$previous_page;
    else:                                         // if last page request
      $next_page     = "";
      $previous_page = $page-1;
      $previous_page = "?page=".$previous_page;
    endif;
  else:                                           // if no page request
      $next_page     = $page+1;
      $next_page     = "?page=".$next_page;
      $previous_page = "";
  endif;



 ?>
<html>
  <head>
    <title>SMSAPP | Mailbox</title>
    <?php include "includes/_metaheader.php"; ?>
    <?php include "includes/_csslinks.php"; ?>
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
   
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
            Sent Messages
            <small><?php echo $total ?> </small>
          </h1>
          <?php include "includes/_breadcrums.php"; ?>
        </section>

        <!-- Main content -->

        <section class="content">
            <div class="alert alert-success alert-dismissable hide" id="delete-alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>  <i class="icon fa fa-check"></i>Deleted.</h4>
            </div>
          <?php if (isset($_GET['sent']) && isset($_GET['sent']) == 'sucess'):?>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>  <i class="icon fa fa-check"></i>SMS has been sent.</h4>
            </div>
          <?php endif; ?>

          <!-- if the delete request is there show info -->
          <?php if (isset($_GET['delete']) && isset($_GET['delete']) == '1'):?>
            <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>  <i class="icon fa fa-check"></i>An SMS has been deleted.</h4>
            </div>
          <?php endif; ?>
          <div class="row">
            <div class="col-md-3">
              <a href="composesms.php" class="btn btn-primary btn-block margin-bottom">Compose</a>
              <!-- mailbox side menu -->
              <?php include 'includes/_mailboxmenu.php' ?>
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Messages</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" placeholder="Search">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                      <button id="smstext-table-delete" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                      <!-- <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button> -->
                      <!-- <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button> -->
                    </div><!-- /.btn-group -->
                    <!-- pagination -->
                    <div class="pull-right">
                      <?php echo $start."-".($start + $per_page)?>
                      <div class="btn-group">
                        <!-- 
                            Button to search backwards 5 or n records 
                            Get the current page number and minus 5
                        -->
                          <a href="<?php echo $previous_page ?>">
                            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                          </a>
                        <!-- 
                            Button to search the next 5 or n records 
                            Get the current page number and minus 5
                        -->
                          <a href="<?php echo $next_page ?>">
                            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                          </a>
                       <!--  <a href="">
                          <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                        </a>  -->                       
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                    <!-- end pagination -->
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped" id="sentsms-table">
                      <tbody>
                        
                          <?php 
                          $n ="";
                            foreach ($data as $value) {
                              $phone = $value['phone'];
                              if (strlen($phone) >= 20) {
                                  $phone = substr($phone, 0, 27). " ... ";
                              }
                              
                              ?>
                                <tr id="tr_<?php echo $value['id'] ?>">
                                  <td><input type="checkbox" name="case" id="<?php echo $value['id'] ?>"></td>
                                  <!-- <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td> -->
                                  <td class="mailbox-name"><a href="read-mail.php?id=<?php echo $value['id'] ?>"><?php echo $phone; ?></a></td>
                                  <td class="mailbox-subject"><b><?php echo $value['smstext']; ?></td>
                                  <td class="mailbox-attachment"></td>
                                  <td class="mailbox-date">5 mins ago</td>
                                </tr>

                              <?php                             

                            }
                           ?>
                          
                        
                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                      <!-- <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button> -->
                      <!-- <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button> -->
                    </div><!-- /.btn-group -->
                    <!-- <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button> -->

                    <!-- pagination -->
                    <div class="pull-right">
                      <?php echo $start."-".($start + $per_page)?>
                      <div class="btn-group">
                        <!-- 
                            Button to search backwards 5 or n records 
                            Get the current page number and minus 5
                        -->
                          <a href="<?php echo $previous_page ?>">
                            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                          </a>
                        <!-- 
                            Button to search the next 5 or n records 
                            Get the current page number and minus 5
                        -->
                          <a href="<?php echo $next_page ?>">
                            <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                          </a>
                       <!--  <a href="">
                          <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                        </a>  -->                       
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                    <!-- end pagination -->
                  </div>
                </div>
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
    <!-- iCheck -->
    <!-- // <script src="plugins/iCheck/icheck.min.js"></script> -->
    <!-- Page Script -->
     <script src="dist/js/custom.js"></script>
    <script>
      // $(function () {
      //   //Enable iCheck plugin for checkboxes
      //   //iCheck for checkbox and radio inputs
      //   $('.mailbox-messages input[type="checkbox"]').iCheck({
      //     checkboxClass: 'icheckbox_flat-blue',
      //     radioClass: 'iradio_flat-blue'
      //   });

      //   //Enable check and uncheck all functionality
      //   $(".checkbox-toggle").click(function () {
      //     var clicks = $(this).data('clicks');
      //     if (clicks) {
      //       //Uncheck all checkboxes
      //       $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
      //       $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      //     } else {
      //       //Check all checkboxes
      //       $(".mailbox-messages input[type='checkbox']").iCheck("check");
      //       $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      //     }
      //     $(this).data("clicks", !clicks);
      //   });

      //   //Handle starring for glyphicon and font awesome
      //   $(".mailbox-star").click(function (e) {
      //     e.preventDefault();
      //     //detect type
      //     var $this = $(this).find("a > i");
      //     var glyph = $this.hasClass("glyphicon");
      //     var fa = $this.hasClass("fa");

      //     //Switch states
      //     if (glyph) {
      //       $this.toggleClass("glyphicon-star");
      //       $this.toggleClass("glyphicon-star-empty");
      //     }

      //     if (fa) {
      //       $this.toggleClass("fa-star");
      //       $this.toggleClass("fa-star-o");
      //     }
      //   });
      // });
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <script type="text/javascript">

      // delete the checked records
      // show the alert 
      $( "#smstext-table-delete" ).click(function() {
         $('[name=case]:checked').each(function () {
            var id = $(this).attr('id');
             $.post( "ajax_delete.php", { id: id }).done(function( data ) {
              console.log(data);
              $('#tr_'+id).remove();
              $( "#delete-alert" ).removeClass( "hide" );
            }); // end post
        }); // end .each()
      }); // end .click()


    </script>
  </body>
</html>
