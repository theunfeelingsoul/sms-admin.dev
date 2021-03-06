<!DOCTYPE html>

<?php

include "includes/_config.php";
if(isset($_POST['bts'])){


  $id = $_POST['id'];
  $name = $_POST['nm'];
  $gender = $_POST['gd'];
  $telp = $_POST['tl'];
  $idnumber = $_POST['idnumber'];



    $sql = "UPDATE personal SET name='$name' ,gender='$gender', telp='$telp' ,idnumber='$idnumber' WHERE id_personal='$id'";

    if ($mysqli->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
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
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <!-- <h3 class="box-title">Update contact</h3> -->
                </div><!-- /.box-header -->
                <!-- form start -->

                <?php 
                  if(isset($_GET['u'])):
                   if(isset($_POST['bts'])):
                        $stmt = $mysqli->prepare("UPDATE personal SET name=?, gender=?, telp=?, idnumber=? WHERE id_personal=?");
                        $stmt->bind_param('sssss', $nm, $gd, $tl, $idnumber, $id);

                        $nm = $_POST['nm'];
                        $gd = $_POST['gd'];
                        $tl = $_POST['tl'];
                        $idnumber = $_POST['idnumber'];
                        $id = $_POST['id'];

                        if($stmt->execute()):
                             echo "<script>location.href='viewContact.php'</script>";
                        else:
                             echo "<script>alert('".$stmt->error."')</script>";
                        endif;
                   endif;
                   $res = $mysqli->query("SELECT * FROM personal WHERE id_personal=".$_GET['u']);
                   $row = $res->fetch_assoc();
            
                 ?>
                <form role="form" action="" method="post">
                <input type="hidden" value="<?php echo $row['id_personal'] ?>" name="id"/>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id=""  name="nm" value="<?php echo $row['name'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control" name="gd">
                        <option><?php echo $row['gender'] ?></option>
                        <option>Male</option>
                        <option>Female</option>
               
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Phone</label>
                      <input type="tel" class="form-control" id=""  name="tl" value="<?php echo $row['telp'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">ID number</label>
                      <input type="text" class="form-control" id=""  name="idnumber" value="<?php echo $row['idnumber'] ?>">
                    </div>
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="bts">Submit</button>
                  </div>
                </form>
              <?php
                endif;
              ?>

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
