<?php
ob_start();
include ("dbconfig_coxplore.php");
if(isset($_POST['update'])){

  $id = $_POST["id"];

//   $image_text = $_POST["image_text"];
  $image_get = $_POST["image_name"];
  $image_path = $_POST["image_path"];

  $image_get_two = $_POST["image_name_two"];
  $image_two_path = $_POST["image_two_path"];

  $image_get_three = $_POST["image_name_three"];
  $image_three_path = $_POST["image_three_path"];
 
  echo $image_get;
  $file = "uploaded_tourist_spot_image/". $image_get;
  $file_two = "uploaded_tourist_spot_image/". $image_get_two;
  $file_three = "uploaded_tourist_spot_image/". $image_get_three;


  if (!unlink($file) || !unlink($file_two) || !unlink($file_three))
    {
    echo ("Error deleting $file");
    echo ("Error deleting $file_two");
    echo ("Error deleting $file_three");
    }else
    {
    echo ("Deleted $file");
    echo ("Deleted $file_two");
    echo ("Deleted $file_three");
    }

  $image_store = rand().$_FILES['image']['name'];
  $image_url = "http://www.coxplorebd.com/uploaded_tourist_spot_image/".$image_store;
  $target = "uploaded_tourist_spot_image/".basename($image_store);

  $image_store_two = rand().$_FILES['image_two']['name'];
  $image_url_two =  "http://www.coxplorebd.com/uploaded_tourist_spot_image/".$image_store_two;
  $target_two = "uploaded_tourist_spot_image/".basename($image_store_two);

  $image_store_three = rand().$_FILES['image_three']['name'];
  $image_url_three =  "http://www.coxplorebd.com/uploaded_tourist_spot_image/".$image_store_three;
  $target_three = "uploaded_tourist_spot_image/".basename($image_store_three);

  $sql = "UPDATE tourist_spot SET image_one = '$image_store',image_one_path = '$image_url',image_two = '$image_store_two',image_two_path = '$image_url_two', image_three = '$image_store_three',image_three_path = '$image_url_three' WHERE id=$id";
  
  if (mysqli_query($db, $sql)) {
    header('Location:update_well.php');
  } else {
      echo "Error updating record: " . mysqli_error($db);
  }
  if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && move_uploaded_file($_FILES['image_two']['tmp_name'], $target_two) && move_uploaded_file($_FILES['image_three']['tmp_name'], $target_three)) {
      $msg = "Image uploaded successfully";
  }else{
      $msg = "Failed to upload image";
  }
  
  mysqli_close($db);
}
?>