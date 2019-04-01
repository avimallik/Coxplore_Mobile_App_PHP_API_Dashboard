<?php
ob_start();
include("dbconfig_coxplore.php");

  $id = mysqli_real_escape_string($db, $_GET['id']);

  // $id = isset($_GET['id']) ? $_GET['id'] : '';
  // sql to delete a record
  $sql = "DELETE FROM admin WHERE id=$id";
  
  if (mysqli_query($db, $sql)) {
      // echo "Record deleted successfully";
      header("Location:delete_well.php");
  } else {
      echo "Error deleting record: " . mysqli_error($db);
  }

  mysqli_close($db);

?>