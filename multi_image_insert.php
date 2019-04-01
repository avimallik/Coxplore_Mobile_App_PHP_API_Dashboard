<?php
	// Create database connection
	include "navbar_easy.php";
	include "dbconfig_coxplore.php";

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
	  // Get image name
	
  	// Get text
  
        //For Image One Insertion
        $image_one_name	 = mysqli_real_escape_string($db, $_POST['image_one_name']);
		$image_one = rand().$_FILES['image']['name'];
	    $target = "uploaded_slider_image/".basename($image_one);
        $image_one_path = "http://localhost/coxplore/uploaded_slider_image/".$image_one ;

        //For Image Two Insertion
        $image_two_name	 = mysqli_real_escape_string($db, $_POST['image_two_name']);
		$image_two = rand().$_FILES['image_two']['name'];
	    $target_two = "uploaded_slider_image/".basename($image_two);
        $image_two_path = "http://localhost/coxplore/uploaded_slider_image/".$image_two ;

          //For Image Two Insertion
            $image_three_name	 = mysqli_real_escape_string($db, $_POST['image_three_name']);
          $image_three = rand().$_FILES['image_three']['name'];
            $target_three = "uploaded_slider_image/".basename($image_three);
                $image_three_path = "http://localhost/coxplore/uploaded_slider_image/".$image_three ;
        
		
       
        // header ('Location:multi_list.php');
    if(empty($image_one_name) || empty($image_two_name) || empty($image_three_name)){
      echo '<script language="javascript">';
      echo 'alert("Some Field is Empty You Must Insert Suitable Data On It !")';
      echo '</script>';
    }else{
     // execute query
      $sql = "INSERT INTO multi_image (image_one,image_one_name,image_one_path,image_two,image_two_name,image_two_path,image_three,image_three_name,image_three_path) VALUES ('$image_one','$image_one_name','$image_one_path','$image_two','$image_two_name','$image_two_path','$image_three','$image_three_name','$image_three_path')"; 
      header ('Location:multi_image_list.php');     
      mysqli_query($db, $sql);
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && move_uploaded_file($_FILES['image_two']['tmp_name'], $target_two) && move_uploaded_file($_FILES['image_three']['tmp_name'], $target_three)) {
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
  <form method="POST" action="multi_image_insert.php" enctype="multipart/form-data">

   <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Image One Name</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Type Image Name" name="image_one_name">
        </div>
    </div>

  	<div>
  	  <input type="file" name="image">
  	</div>  <br>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Image Two Name</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Type Image Name" name="image_two_name">
        </div>
    </div>

    <div>
  	  <input type="file" name="image_two">
  	</div> <br>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Image Three Name</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Type Image Name" name="image_three_name">
        </div>
    </div> 

    <div>
  	  <input type="file" name="image_three">
  	</div>


<br>
    <center>
  	<div>
      <button type="submit" class="btn btn-primary" style = "width:80%" name="upload">Add Slider Images</button>
  	</div>
    </center>

<script type="text/javascript">
	CKEDITOR.replace('myeditor');
</script>

  </form>

  <center>
    <div>
  		<!-- <center><a href = "transport_bus_list.php"><button type="submit">Bus Transport List</button></a></center> -->
      <button type="submit" class="btn btn-primary" style = "width:40%" onclick="window.location.href='multi_image_list.php'">Slider Images</button>
    </div>
  </center>