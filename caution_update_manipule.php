<?php
ob_start();
include ("dbconfig_coxplore.php");
if(isset($_POST['update'])){

  $id = $_POST["id"];

  $caution_details = html_entity_decode($_POST['caution_details']);

  $sql = "UPDATE caution SET caution_details = '$caution_details' WHERE id=$id";
  
  if (mysqli_query($db, $sql)) {
    header('Location:update_well.php');
  } else {
      echo "Error updating record: " . mysqli_error($db);
  }
  // if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  //     $msg = "Image uploaded successfully";
  // }else{
  //     $msg = "Failed to upload image";
  // }
  
  mysqli_close($db);
}
?>