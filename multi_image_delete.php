<?php
include("dbconfig_coxplore.php");


$id = mysqli_real_escape_string($db, $_GET['id']);
$result = mysqli_query($db,"SELECT * FROM multi_image where id=" . $id);

while($row = mysqli_fetch_array($result)) 
{ 


   //Image One
   $image = $row["image_one"];


   //Image Two
   $image_two = $row["image_two"];


   //Image Two
   $image_three = $row["image_three"];


}


  echo $image;

  $file = "uploaded_slider_image/".$image;
  $file_two = "uploaded_slider_image/".$image_two;
  $file_three = "uploaded_slider_image/".$image_three;

  if (!unlink($file) || !unlink($file_two) || !unlink($file_three))
    {
    echo ("Error deleting $file");
    }
  else
    {
    echo ("Deleted $file");
    echo ("Deleted $file_two");
    echo ("Deleted $file_three");
    }
  
  // $id = isset($_GET['id']) ? $_GET['id'] : '';
  // sql to delete a record
  $sql = "DELETE FROM multi_image WHERE id=$id";
  
  if (mysqli_query($db, $sql)) {
      // echo "Record deleted successfully";
      header("Location:multi_image_list.php");
  } else {
      echo "Error deleting record: " . mysqli_error($db);
  }

  mysqli_close($db);

?>