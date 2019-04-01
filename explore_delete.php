<?php
ob_start();
include("dbconfig_coxplore.php");
$id = mysqli_real_escape_string($db, $_GET['id']);
  $sql = "DELETE FROM explore WHERE id=$id";
  
  if (mysqli_query($db, $sql)) {
      // echo "Record deleted successfully";
      header("Location:delete_well.php");
  } else {
      echo "Error deleting record: " . mysqli_error($db);
  }

  mysqli_close($db);

?>