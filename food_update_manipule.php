<?php
ob_start();
include ("dbconfig_coxplore.php");
if(isset($_POST['update'])){

  $id = $_POST["id"];

  $restaurant_name = $_POST["restaurant_name"];
  $restaurant_details = html_entity_decode($_POST['restaurant_details']);
  $phone = $_POST['phone'];
  $latitude = $_POST["latitude"];
  $longitude = $_POST["longitude"];

  
//   $image_text = $_POST["image_text"];
  // $image_get = $_POST["image_name"];
  // $image_path = $_POST["image_path"];
 
  // echo $image_get;
  // echo $transport_details;
  // $file = "uploaded_transport_bus_image/". $image_get;


  // if (!unlink($file))
  //   {
  //   echo ("Error deleting $file");
  //   }else
  //   {
  //   echo ("Deleted $file");
  //   }

  // $image_store = rand().$_FILES['image']['name'];
  // $image_url =  "http://localhost/coxplore/uploaded_transport_bus_image/".$image_store;
  // $target = "uploaded_transport_bus_image/".basename($image_store);

  $sql = "UPDATE food SET restaurant_name = '$restaurant_name',restaurant_details = '$restaurant_details',phone = '$phone', latitude = '$latitude', longitude = '$longitude' WHERE id=$id";
  
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