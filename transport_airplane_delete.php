<?php
ob_start();
include("dbconfig_coxplore.php");

  $id = mysqli_real_escape_string($db, $_GET['id']);
  $image = mysqli_real_escape_string($db, $_GET['image']);
  echo $image;

  $file = "uploaded_transport_airplane_image/".$image;
  if (!unlink($file))
    {
    echo ("Error deleting $file");
    }
  else
    {
    echo ("Deleted $file");
    }
  
  // $id = isset($_GET['id']) ? $_GET['id'] : '';
  // sql to delete a record
  $sql = "DELETE FROM transport_airplane WHERE id=$id";
  
  if (mysqli_query($db, $sql)) {
      // echo "Record deleted successfully";
      header("Location:delete_well.php");
  } else {
      echo "Error deleting record: " . mysqli_error($db);
  }

  mysqli_close($db);

?>