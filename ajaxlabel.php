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

	// get labels
	if (isset($_GET['l'])) {
		$sql = "SELECT label_name FROM labels";
		$data =""; // instantiated the variable $data
		$i = 1;
		// queried the database
		$result = mysqli_query($conn,$sql) or die (mysqli_error());
		if ($result) {
			$row_cnt = mysqli_num_rows($result);
			if ($row_cnt > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					// php if else shorthand or tennary operator 
					$i == $row_cnt ? $data.= $row['label_name'] : $data.= $row['label_name'].",";
					$i++;
				}
			}else{
				$data = "no records";
				
			}
			
		}else{
			$data= "querry error";
		}
		// $data = json_encode($data);
		echo  $data;
	}  // end if


 ?>