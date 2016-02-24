<!DOCTYPE html>
<?php 
  include 'class/smstext.class.php';

  $smstext = new smstext();

  // $total_sent = $smstext->countSentSMS();                        // total sent SMSs 
  // $total_draft = $smstext->countDraftSMS();                        // total SMSs

  $data = $smstext->getDraftSms(); // return draft SMSs

 ?>
<html>
  <head>
    <title>SMSAPP | Drafts</title>
    <?php include "includes/_metaheader.php"; ?>
    <?php include "includes/_csslinks.php"; ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
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
            Draft Messages
            <small><?php echo $smstext->total_draft ?> </small>
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
              <h4>  <i class="icon fa fa-check"></i>Draft SMS deleted.</h4>
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
                  <h3 class="box-title">Draft Messages</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="sentsms-table">
                      <thead>
                        <!-- <td>checkbox</td> -->
                        <th>Number</th>
                        <th>Message</th>
                        <!-- <th>Time</th> -->
                      </thead>
                      <tbody>
                        
                          <?php 
                            if($data): // check if there is any data first
                              $n ="";
                              foreach ($data as $value):
                                $phone = $value['phone'];
                                if (strlen($phone) >= 20):
                                    $phone = substr($phone, 0, 27). " ... ";
                                endif;
                                ?>
                                  <tr id="tr_<?php echo $value['id'] ?>">
                                    <!-- <td><input type="checkbox" name="case" id="<?php //echo $value['id'] ?>"></td> -->
                                    <td class=""><a href="draft.php?draft=1&id=<?php echo $value['id'] ?>"><?php echo $phone; ?></a></td>
                                    <td class=""><b><a href="draft.php?draft=1&id=<?php echo $value['id'] ?>"><?php echo $value['smstext']; ?></a></td>
                                    <!-- <td class="">5 mins ago</td> -->
                                  </tr>

                                <?php                             
                              endforeach;
                            endif;
                           ?>
                          
                        
                      </tbody>
                    </table><!-- /.table -->
                </div><!-- /.box-body -->
             
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
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
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

    <!-- data tables -->
    <script>
      $(function () {
        $("#sentsms-table").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

  </body>
</html>
