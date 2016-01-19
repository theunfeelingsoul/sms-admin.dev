<?php 

include "includes/_config.php";

if (isset($_GET['pass'])) {
	$pass=$_GET['pass'];

	$res = $mysqli->query("SELECT * FROM user WHERE password =".$_GET['pass']);

	echo $row_cnt = $res->num_rows;

}

 ?>