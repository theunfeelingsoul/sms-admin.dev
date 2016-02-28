<!DOCTYPE html>
<?php 

  include 'class/class.group.php';
  $G = new Group();

  $counter = 1;

  $groups = $G->view();

?>
<html>
  <head>
    <title>SMSAPP | View Groups</title>
    <?php include "includes/_metaheader.php"; ?>
    <?php include "includes/_csslinks.php"; ?>
     <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
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
            View Groups
            <!-- <small>advanced tables</small> -->
          </h1>
          <?php include "includes/_breadcrums.php"; ?>


        </section>

         

        <!-- Main content -->
        <section class="content">
          <?php 

            if (isset($_GET['deleted'])) {
              $msg=(int)$_GET['deleted'];
              if ($msg == 1) {
           ?>
              <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>  <i class="icon fa fa-check"></i> Group deleted.</h4>
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
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
                  <div id="add-group-form">
                    
                    <div class="group-add-alert col-md-3 text-danger"> </div>
                  </div> <!-- /.add-group-form -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="contact-table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Group Name</th>
                        <th>Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        foreach ($groups as $key => $group):
                      ?>
                        <tr>
                          <!-- <td><?php // echo $row['id_personal'] ?></td> -->
                          <td><?= $counter++ ?></td>
                          <td><?= $group['label_name'] ?></td>
                          <td>
                          <a href="updateGroup.php?u=<?php echo $group['id'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
                          <a href="?deleting=<?php echo $group['id'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
                          </td>
                        </tr>
                      <?php
                      endforeach;
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Group name</th>
                        <th>Manage</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Password required to delete</h4>
            <p>the password is <b>1234</b> </p>
          </div>
          <div class="modal-body">

            <form role="form" method="get" action="pass.php" id="form" autocomplete="off">
            <!-- <h2>check pass</h2> -->
            <!-- <h2><a href="checkpass.php">RELOAD</a></h2> -->
            <!-- <div class="bg-red color-palette"><span><h5>Wrong password</h5></span></div> -->
              <div class="form-group password">
                <label class="control-label password-label hidden" for="inputError"><i class="fa fa-times-circle-o"></i> Wrong password</label>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" autocomplete="off"/>
              </div>
              <div class="form-group">
                <input type="submit" class="form-control btn btn-block btn-primary " value="submit" name="sub" />
              </div>
            </form>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#contact-table").DataTable();
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

    <!-- following script submits the modal form and checks the password.
    once successful it then deletes the selected record -->
    <script type="text/javascript">
      $(function () {
        var frm = $('#form'); // specify the form by its ID
        frm.submit(function (ev) {
            $.ajax({
                type: frm.attr('method'), //will tahe the method of the form 
                url: frm.attr('action'), // will take the action of the form
                data: frm.serialize(),
                success: function (data) {
                  // 1 reprsents a correct passowrd
                  if (data == 1) {
                      // access the id of record from hidden text field
                      var x=document.getElementById("hidden_delete_id");

                      // send id to the delete page
                      $.post( "deleteGroup.php?d="+x.value, function( data ) {
                      if (data=='yes') {
                        // if successful add the following get variable to display required css
                        location.href="viewGroups.php?deleted=1";
                      }else{
                        location.href="viewGroups.php?deleted=0";
                      }
                    });
                  }else{
                    // if passowrd is wrong add the relevant css to text box
                    $( ".password" ).addClass( "has-error" );
                    $( ".password-label" ).removeClass( "hidden" );

                    // remove red highlighting from textbox once user starts tying in box
                    $( "#pass" ).keypress(function() {
                      $( ".password" ).removeClass( "has-error" );
                      $( ".password-label" ).addClass( "hidden" );
                    });
                  };
                }
            });
        ev.preventDefault();
        });
      });
    </script>


    <!-- following script gets the get variable from clicked recored and displays modal -->
    <?php if (isset($_GET['deleting'])) { 
    ?>
      <input type="hidden" id="hidden_delete_id" value="<?php echo $_GET['deleting']; ?>" />
      <script type="text/javascript">
        $('#myModal').modal('show');
      </script>

    <?php
      } 
    ?>

    <script type="text/javascript">

      // check the records 
      // add them to a group from the select input

      $( "#add-group-form-btn" ).click(function() {
        var checked_boxes = $('[name=checkgroup]:checked').size(); // get the number of the checked contacts
        var groupname = $( "#add-group-form-select option:selected" ).text(); // value of drop down

          $('[name=checkgroup]:checked').each(function () { // use loop to insert data one by one
            var id = $(this).attr('id'); // id of checkbox which is the id of the contact
              $.post( "ajaxlabel.php", { id: id , g : groupname}).done(function( data ) {
                console.log(data);
                $('#contact-table :checked').removeAttr('checked'); // clear the checkboxes
              }); // end $.post()
          }); // end .each()

          $( ".group-add-alert" ).append( checked_boxes+" contacts added to "+groupname ); // add some text to show what has happned

          setTimeout(function() {
            $( ".group-add-alert" ).empty(); // renove the text after 5 seconds
          }, 5000); // end setTimeout()

      }); // end .click()


    </script>
  </body>
</html>
