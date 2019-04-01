<?php
  // Create database connection
  ob_start();
	include "navbar_easy.php";
	include "dbconfig_coxplore.php";

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
	  // Get image name
	
  	// Get text
        $atm_name = mysqli_real_escape_string($db, $_POST['atm_name']);
        $atm_details = mysqli_real_escape_string($db, html_entity_decode($_POST['atm_details']));
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $latitude = mysqli_real_escape_string($db, $_POST['latitude']);
        $longitude = mysqli_real_escape_string($db, $_POST['longitude']);
      
		$image = rand().$_FILES['image']['name'];
	    $target = "uploaded_atm_image/".basename($image);
		$image_path = "http://www.coxplorebd.com/uploaded_atm_image/".$image ;

	  if(empty($atm_name) || empty($atm_details) || empty($phone)|| empty($latitude )|| empty($longitude)){
		echo '<script language="javascript">';
		echo 'alert("Some Field is Empty You Must Insert Suitable Data On It !")';
		echo '</script>';
	  }else{
		$sql = "INSERT INTO atm (atm_name,atm_details,phone,latitude,longitude,image,image_path) VALUES ('$atm_name','$atm_details','$phone','$latitude','$longitude','$image','$image_path')";
		// execute query
      mysqli_query($db, $sql);
      header ('Location:atm_list.php');
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
	  }
  	// image file directory
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="ckeditor/ckeditor.js"></script>

<style type="text/css">
   #content{
   	width: 80%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }

   body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>
</head>
<body>


<div id="content">
  <form method="POST" action="atm_insert.php" enctype="multipart/form-data">

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Rescue Team Name</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Rescue Team Name" name="atm_name">
        </div>
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Rescue Team Details</label>
        <div class="col-xs-10">
            <textarea id="myeditor" name="atm_details" id="myeditor"></textarea>
        </div>
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Rescue Team Number</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Rescue Team Number" name="phone">
        </div>
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Map Latitude</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Type Map Latitude" name="latitude">
        </div>
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Map Longitude</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Type Map Longitude" name="longitude">
        </div>
    </div>

    <center><p>Image quality must be under 1 Mega Bytes in PNG format</p></center>
    <img src="image/icon/gallery.png" style=" height: 50px ;width : 50px"><br>

  	<div>
  	  <input type="file" name="image">
  	</div>

<br>
    <center>
  	<div>
      <button type="submit" class="btn btn-primary" style = "width:80%" name="upload">Add Information</button>
  	</div>
    </center>

<script type="text/javascript">
	CKEDITOR.replace('myeditor');
</script>

  </form>

  <center>
    <div>
  		<!-- <center><a href = "transport_bus_list.php"><button type="submit">Bus Transport List</button></a></center> -->
      <button type="submit" class="btn btn-primary" style = "width:40%" onclick="window.location.href='atm_list.php'">Rescue Team List</button>
    </div>
  </center>