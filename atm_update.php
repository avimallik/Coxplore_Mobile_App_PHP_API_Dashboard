<?php
include ("navbar_easy.php");
include ("dbconfig_coxplore.php");
if(isset($_GET['id'])) {
    $id_temp = $_GET['id'];
    $result = mysqli_query($db,"SELECT * FROM atm where id=" . $id_temp);
    echo "<table>";
    while($row = mysqli_fetch_array($result)) 
    { 
       $id = $row["id"];

       $atm_name = $row["atm_name"];
       $atm_details = $row["atm_details"];
       $phone = $row["phone"];
       $latitude = $row["latitude"];
       $longitude = $row["longitude"];

       $image = $row["image"];
       $image_path = $row["image_path"];

    } 
    mysqli_close($db);
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
<!-- make sure the src path points to your copied ckeditor folder -->
<script src="ckeditor/ckeditor.js"></script>

<style type="text/css">
    #content{
        width: 50%;
        margin: 20px auto;
      
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
</style>
</head>
<body>

<div id="content">

  
  <form method="POST" action="atm_update_manipule.php" enctype="multipart/form-data">

   <center>
   <input type="text" name = "id" value = "<?php echo $id; ?>" style = "visibility: hidden;" readonly>
   </center><br>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Rescue Team Name</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Rescue Team Name" name="hospital_name"  value = "<?php echo $atm_name;?>" >
        </div>
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Rescue Team Details</label>
        <div class="col-md-12">
        <textarea id="myeditor" name="hospital_details" id="myeditor"><?php echo $atm_details;?></textarea>
        </div>
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Phone Number</label>
        <div class="col-xs-10">
        <input type="text" id="inputSuccess" name="phone" class="form-control" placeholder="Type Phone Number" name="phone"  value = "<?php echo $phone;?>">
        </div>
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Map Latitude</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Type Map Latitude" name="latitude"  value = "<?php echo $latitude;?>">
        </div>
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Map Longitude</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Type Map Longitude" name="longitude" value = "<?php echo $longitude;?>">
        </div>
    </div>
<br>
<center>
  	<div>
  		<button type="submit" class="btn btn-primary" style = "width:80%"name="update">Update Information</button>
  	</div>
</center>      
<br>

<!-- creating a CKEditor instance called myeditor -->
<script type="text/javascript">
	CKEDITOR.replace('myeditor');
</script>
</form>

<center>
    <div>
      <button type="submit" class="btn btn-primary" style = "width:80%" onclick="window.location.href='atm_list.php'">Rescue Team List</button>
  	</div>
</center>

</div>
<br><br>

<center><p>Image quality must be under 1 Mega Bytes in PNG format</p></center>
<div id="content">

<form method="POST" action="atm_update_image_manipule.php" enctype="multipart/form-data">
<input type="text" name = "id" value = "<?php echo $id; ?>" style = "visibility: hidden;" readonly >
    <input type="text" name = "image_name" value = "<?php echo $image;?>" style = "visibility: hidden;" readonly > 
    <input type="text" name = "image_path" value = "<?php echo $image_path;?>"  style = "visibility: hidden;" readonly > 
    <center>

   <div class = "row">

    <div class="col-md-7">
       <input type="file" name="image">
       <img src = "image/icon/gallery.png" style="width:50px; height:50px"/>
    </div>

 </div>


  	<div>
  	 <button type="submit" name="update" class="btn btn-primary" style = "width:80%">Update Image</button>
  	</div>
 </center> 
 </form>
</div>
</body>
</html>


