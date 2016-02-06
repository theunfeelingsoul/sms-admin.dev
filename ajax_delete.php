<?php 

		$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "smsapp";
	// made connection
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	// check connection
	if (!$conn) {
		die(mysql_connection_error());
	}


	
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
			$sql = "DELETE FROM sentsms WHERE id=$id";

			// queried the database
			$result = mysqli_query($conn,$sql) or die (mysqli_error());
			if ($result) {
				$data = 'deleted';
				
			}else{
				$data= mysqli_error();
			}
			// $data = json_encode($data);
			echo  $data;
		} // end if


 ?>