<?php
ob_start();
include ("dbconfig_coxplore.php");
if(isset($_POST['update'])){

  $id = $_POST["id"];

  $hotel_name = $_POST["hotel_name"];
  $hotel_details = html_entity_decode($_POST['hotel_details']);
  $hotel_phone = $_POST["hotel_phone"];
  $hotel_website = $_POST["hotel_website"];
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

  $sql = "UPDATE hotel SET hotel_name = '$hotel_name',hotel_details = '$hotel_details', hotel_phone = '$hotel_phone', hotel_website = '$hotel_website',latitude = '$latitude',longitude = '$longitude' WHERE id=$id";
  
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