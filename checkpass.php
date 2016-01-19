<!DOCTYPE html>
<html>
<head>
	<title>cgheck pass</title>
 <?php include "includes/_csslinks.php"; ?>

 <style type="text/css">
 .dd{
 	/*margin-top:200px;*/
 	margin: 200px auto;
 }
 </style>
</head>
<body>

<?php 

include "includes/_config.php";

if (isset($_GET['sub'])) {
	$pass=$_GET['pass'];

	$res = $mysqli->query("SELECT * FROM user WHERE password =".$_GET['pass']);

	echo $row_cnt = $res->num_rows;
}
 ?>

<div class="container dd">
	<!-- <form role="form" method="get" action="">
	<h2><a href="checkpass.php">RELOAD</a></h2>
		<div class="form-group">
			<input type="password" class="form-control" name="pass" />
		</div>
		<div class="form-group">
			<input type="submit" class="form-control" name="sub" />
		</div>

	</form> -->

	<a href="?d=16">link</a>

	<div class="alert alert-success alert-dismissable hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                    Success alert preview. Delete success..
                  </div>

                    <div class="alert alert-danger alert-dismissable hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Sorry. THere was an error. Please reload an try again.
                  </div> 
	
	
 </div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" id="33" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">

      

        <form role="form" method="get" action="pass.php" id="form">
		<!-- <h2>check pass</h2> -->
		<h2><a href="checkpass.php">RELOAD</a></h2>
		<!-- <div class="bg-red color-palette"><span><h5>Wrong password</h5></span></div> -->
			<div class="form-group password">
				<label class="control-label password-label hidden" for="inputError"><i class="fa fa-times-circle-o"></i> Wrong password</label>
				<input type="password" class="form-control" name="pass" />
			</div>
			<div class="form-group">
				<input type="submit" class="form-control" name="sub" />
			</div>
		</form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




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

    	<script type="text/javascript">
	      	$(function () {
			    var frm = $('#form');
			    frm.submit(function (ev) {
			        $.ajax({
			            type: frm.attr('method'),
			            url: frm.attr('action'),
			            data: frm.serialize(),
			            success: function (data) {
			            	if (data == 1) {

			            		var x=document.getElementById("hidden_delete_id");
			            		// console.log(x.value);
			            		// location.href="deleteContact.php?d="+x.value;
			            		$.post( "deleteContact.php?d="+x.value, function( data ) {
								  // $( ".result" ).html( data );
								  console.log(data);
								  if (data=='yes') {
								  	$( ".alert-success" ).removeClass( "hidden" );
								  	$('#myModal').modal('hide');
								  }else{
								  	$( ".alert-danger" ).removeClass( "hidden" );
								  	$('#myModal').modal('hide');
								  }
								});
			            		
			            	}else{
			            		// alert('no');
			            		$( ".password" ).addClass( "has-error" );
			            		$( ".password-label" ).removeClass( "hidden" );
			            	};
			            	
			            	// alert(data);
			            
			            }
			        });
			    ev.preventDefault();
			    });
			});
		</script>

		<?php if (isset($_GET['d'])) { 
		?>
		<input type="text" id="hidden_delete_id" value="<?php echo $_GET['d']; ?>" />
		<script type="text/javascript">
			$('#myModal').modal('show');
			//alert("yes");
		</script>

	<?php
	} ?>
</body>
</html>