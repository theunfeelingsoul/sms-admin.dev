<?php
  include 'class/class.group.php';
  $G = new Group();
if(isset($_GET['d'])){
     $id = $_GET['d'];
     return $G->delete($id);
};
?>
