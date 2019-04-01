<?php
 include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Coxplore</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    #grid_counter{
        width:60%;
    }

}
  </style>
</head>
<body>
  
  
<br><br><br><br><br>
<div class="container-fluid bg-3 text-center" id="grid_counter">    
  <div class="row">
    <div class="col-sm-4">
      <a href = "hospital_list.php"><img src="image/icon/hospital.png" alt="Image" width="200" height="200"></a>
      <p>Hospital</p>
    </div>
    <div class="col-sm-4"> 
    <a href = "atm_list.php"><img src="image/icon/rescue_team.png" alt="Image" width="200" height="200"></a>
      <p>Rescue Team</p>
    </div>
    <div class="col-sm-4"> 
    <a href = "police_list.php"><img src="image/icon/police.png" alt="Image" width="200" height="200"></a>
      <p>Police</p>
    </div>

  </div>
</div>
</body>
</html>
