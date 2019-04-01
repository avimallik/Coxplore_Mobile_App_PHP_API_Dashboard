<?php
include ("navbar_easy.php");
include ("dbconfig_coxplore.php");
if(isset($_GET['id'])) {
    $id_temp = $_GET['id'];
    $result = mysqli_query($db,"SELECT * FROM tourist_spot where id=" . $id_temp);
    echo "<table>";
    while($row = mysqli_fetch_array($result)) 
    { 
       $id = $row["id"];

       $tourist_spot_details = $row["tourist_spot_details"];
       $tourist_spot_name = $row["tourist_spot_name"];
       $latitude = $row["latitude"];
       $longitude = $row["longitude"];

       //Image One
       $image = $row["image_one"];
       $image_path = $row["image_one_path"];
    //    $image_one_name = $row["image_one_name"];

       //Image Two
       $image_two = $row["image_two"];
       $image_two_path = $row["image_two_path"];
    //    $image_two_name = $row["image_two_name"];

       //Image Two
       $image_three = $row["image_three"];
       $image_three_path = $row["image_three_path"];
    //    $image_three_name = $row["image_three_name"];

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

<div class="container" style = "height: 800px">
  <div class="row" >
    <div class="col-sm-6" style="border: 1px solid #969696;">

    <form method="POST" action="tourist_spot_update_manipule.php" enctype="multipart/form-data">
    <!---Image Name input fields-->
    <div class="col-md-1">
    <input type="text" name = "id" value = "<?php echo $id; ?>" style = "visibility: hidden;" readonly >
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Tourist Spot Name</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Type Tourist Spot Name" name="tourist_spot_name" value = "<?php echo $tourist_spot_name; ?>">
        </div>
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Tourist Spot Details</label>
        <div class="col-md-12">
        <textarea id="myeditor" name="tourist_spot_details" id="myeditor"><?php echo $tourist_spot_details;?></textarea>
        </div>
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Map Latitude</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Type Map Latitude" name="latitude" value = "<?php echo $latitude; ?>">
        </div>
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Map Longitude</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Type Map Longitude" name="longitude" value = "<?php echo $longitude; ?>">
        </div>
    </div>

    <div>
  	 <center><button type="submit" name="update" class="btn btn-primary" style = "width:80%">Update Information</button><br></center>
  	</div>

<script type="text/javascript">
	CKEDITOR.replace('myeditor');
</script>

</form>
</div>

<div class="col-sm-6" style="border : 1px solid #969696">
<form method="POST" action="tourist_spot_update_image_manipule.php" enctype="multipart/form-data">
<div class = "container">
<div class = "row">

    <div class="col-md-1">
    <input type="text" name = "id" value = "<?php echo $id; ?>" style = "visibility: hidden;" readonly >
    </div>

    <div class="col-md-1">
    <input type="text" name = "image_name" value = "<?php echo $image;?>" style = "visibility: hidden;" readonly > 
    </div>

    <div class="col-md-1">
    <input type="text" name = "image_path" value = "<?php echo $image_path;?>" style = "visibility: hidden;" readonly > 
    </div>

    <div class="col-md-1">
    <input type="text" name = "image_name_two" value = "<?php echo $image_two;?>" style = "visibility: hidden;" readonly > 
    </div>

    <div class="col-md-1">
    <input type="text" name = "image_two_path" value = "<?php echo $image_two_path;?>" style = "visibility: hidden;" readonly >
    </div>

    <div class="col-md-1">
    <input type="text" name = "image_name_three" value = "<?php echo $image_three;?>" style = "visibility: hidden;" readonly > 
    </div>

    <div class="col-md-1">
    <input type="text" name = "image_three_path" value = "<?php echo $image_three_path;?>" style = "visibility: hidden;" readonly >
    </div>

 </div>
 </div>

<center>
<div class = "container">
<center><p>Image quality must be under 1 Mega Bytes in PNG format</p></center><br>
    Image One <input type="file" name="image"><br><br>
    Image Two <input type="file" name="image_two"><br><br>
    Image Three <input type="file" name="image_three"><br><br>
 </div>

<div>
<button type="submit" name="update" class="btn btn-primary" style = "width:80%">Update Image</button>
</div>
 </center> 
 </form>
</div>



</body>
</html>


