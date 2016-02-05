<?php 
	
	//get the page name from the url
	$link = $_SERVER['PHP_SELF'];
	$link_array = explode('/',$link);
	$page = end($link_array);
	$filename = explode('.', $page);
	$filename =  $filename[0];
 ?>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="#"><?php echo ucfirst($filename) ?></a></li>
	<!-- <li class="active">General Elements</li> -->
</ol>