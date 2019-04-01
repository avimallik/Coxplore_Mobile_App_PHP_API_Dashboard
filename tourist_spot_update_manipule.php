<?php
ob_start();
include ("dbconfig_coxplore.php");
if(isset($_POST['update'])){

  $id = $_POST["id"];

  $tourist_spot_name = $_POST['tourist_spot_name'];
  $tourist_spot_details = html_entity_decode($_POST['tourist_spot_details']);
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];


  $sql = "UPDATE tourist_spot SET tourist_spot_name = '$tourist_spot_name', tourist_spot_details = '$tourist_spot_details', latitude = '$latitude', longitude = '$longitude' WHERE id=$id";
  
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