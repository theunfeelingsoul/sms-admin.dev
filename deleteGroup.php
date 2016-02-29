<?php
	// include the class
	include 'class/class.group.php';

	// instantiate the class
	$G = new Group();

	// delete a record
	if(isset($_GET['d'])){
		$id = $_GET['d'];
		return $G->delete($id);
	};
?>
