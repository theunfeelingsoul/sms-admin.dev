<?php
include "includes/_config.php";
if(isset($_GET['d'])){
     $stmt = $mysqli->prepare("DELETE FROM personal WHERE id_personal=?");
     $stmt->bind_param('s', $id);

     $id = $_GET['d'];

     $stmt->execute();

     $stmt = $mysqli->prepare("DELETE FROM people_group WHERE person_id=?");
     $stmt->bind_param('s', $id);


     $stmt->execute();

     if($mysqli->affected_rows == 1){
          // echo "<script>location.href='viewContact.php'</script>";
          echo "yes";
     }else{
          // echo "<script>alert('".$stmt->error."')</script>";
          echo "no";
     }
};
?>
