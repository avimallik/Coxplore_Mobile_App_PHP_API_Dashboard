<?php

include ("dbconfig_coxplore.php");
if(isset($_GET['id'])) {
    $id_temp= $_GET['id'];
    $result = mysqli_query($db,"SELECT * FROM admin where id=" . $id_temp);
    echo "<table>";
    while($row = mysqli_fetch_array($result)) 
    { 
       $id = $row["id"];

       $admin_name = $row["admin_name"];
       $password = $row["password"];
    
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

  
  <form method="POST" action="admin_update_manipule.php" enctype="multipart/form-data">

   <center>
   <input type="text" name = "id" value = "<?php echo $id; ?>" style = "visibility: hidden;" readonly>
   </center><br>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Admin Name</label>
        <div class="col-xs-10">
            <input type="text" id="inputSuccess" class="form-control" placeholder="Type image title" name="admin_name"  value = "<?php echo $admin_name;?>" >
        </div>
    </div>

    <div class="form-group has-success">
        <label class="col-xs-2 control-label" for="inputSuccess">Password</label>
        <div class="col-xs-10">
            <input type="password" id="inputSuccess" class="form-control" placeholder="Type image title" name="password"  value = "<?php echo $password;?>">
        </div>
    </div>

<br>
<center>
  	<div>
  		<button type="submit" class="btn btn-primary" style = "width:80%"name="update">Update Admin Information</button>
  	</div>
</center>      
<br>

<!-- creating a CKEditor instance called myeditor -->
<script type="text/javascript">
	CKEDITOR.replace('myeditor');
</script>
</form>


</div>
<br><br>

</div>
</body>
</html>


