<?php
ob_start();
include ("dbconfig_coxplore.php");
if(isset($_POST['update'])){

  $id = $_POST["id"];

//   $image_text = $_POST["image_text"];
  $image_get = $_POST["image_name"];
  $image_path = $_POST["image_path"];
 
  echo $image_get;
  $file = "uploded_hospital_image/". $image_get;


  if (!unlink($file))
    {
    echo ("Error deleting $file");
    }else
    {
    echo ("Deleted $file");
    }

  $image_store = rand().$_FILES['image']['name'];
  $image_url =  "http://www.coxplorebd.com/uploded_hospital_image/".$image_store;
  $target = "uploded_hospital_image/".basename($image_store);

  $sql = "UPDATE hospital SET image = '$image_store',image_path = '$image_url' WHERE id=$id";
  
  if (mysqli_query($db, $sql)) {
    header('Location:update_well.php');
  } else {
      echo "Error updating record: " . mysqli_error($db);
  }
  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
  }else{
      $msg = "Failed to upload image";
  }
  
  mysqli_close($db);
}
?>