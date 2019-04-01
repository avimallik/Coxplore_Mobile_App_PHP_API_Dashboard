<?php
include ("navbar_easy.php");
include ("dbconfig_coxplore.php");
if(isset($_GET['id'])) {
    $id_temp = $_GET['id'];
    $result = mysqli_query($db,"SELECT * FROM caution where id=" . $id_temp);
    echo "<table>";
    while($row = mysqli_fetch_array($result)) 
    { 
       $id = $row["id"];
       $caution_details = $row["caution_details"];
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

<div class="container"style = "width : 800px">
    <form method="POST" action="caution_update_manipule.php" enctype="multipart/form-data">
    <!---Image Name input fields-->
    <div class="col-md-1">
    <input type="text" name = "id" value = "<?php echo $id; ?>" style = "visibility: hidden;" readonly >
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Explore Details</label>
        <div class="col-md-12">
        <textarea id="myeditor" name="caution_details" id="myeditor"><?php echo $caution_details;?></textarea>
        </div>
    </div>


    <div>
  	 <center><button type="submit" name="update" class="btn btn-primary" style = "width:80%">Update Information</button><br></center>
  	</div>
      </div>

<script type="text/javascript">
	CKEDITOR.replace('myeditor');
</script>

</form>
</div>



</body>
</html>


