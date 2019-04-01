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

  .jumbotron {
  height: 210px;
  color: #8e8e8e;
  text-shadow: #444 0 1px 1px;
  background:transparent;
}
  </style>
</head>
<body>
<div class="jumbotron">
  <div class="container text-center">
    <h1>Coxplore</h1>      
    <p>Dashboard for API Updation</p>
  </div>
</div>
  
<div class="container-fluid bg-3 text-center" id="grid_counter">    
  <div class="row">
  <a href = "explore_menu.php">
    <div class="col-sm-4">
      <img src="image/grid_icon/explore.png" alt="Image" width="200" height="200"><br>
      <p>Explore</p>
    </div>
    </a>

    <a href = "transport_menu.php">
    <div class="col-sm-4"> 
    <img src="image/grid_icon/transport.png" alt="Image" width="200" height="200"><br>
      <p>Transport</p>
    </div>
    </a>
    <a href = "hotel_list.php">
    <div class="col-sm-4"> 
    <img src="image/grid_icon/hotel.png" alt="Image" width="200" height="200"><br>
      <p>Hotel</p>
    </div>
    </a>
  </div>
</div>

<br>

<div class="container-fluid bg-3 text-center" id="grid_counter">    
  <div class="row">
    
  <a href = "tourist_spot_list.php">
    <div class="col-sm-4">
      <img src="image/grid_icon/touristspot.png" alt="Image" width="200" height="200"><br>
      <p>Tourist Spot</p>
    </div></a>
    <a href = "food_list.php"><div class="col-sm-4"> 
      <img src="image/grid_icon/food.png" alt="Image" width="200" height="200"><br>
      <p>Food</p>
    </div></a>
    <a href = "emergency_menu.php">
    <div class="col-sm-4"> 
      <img src="image/grid_icon/emmergency.png" alt="Image" width="200" height="200"><br>
      <p>Emergency</p>
    </div>
    </a>
  </div>
</div>

<br>

<div class="container-fluid bg-3 text-center" id="grid_counter">    
  <div class="row">

  <a href = "shopping_list.php"><div class="col-sm-4">
      <img src="image/grid_icon/shooping.png" alt="Image" width="200" height="200"><br>
      <p>Shopping</p>
    </div></a>

    <a href = "tourist_agent_list.php">
    <div class="col-sm-4"> 
      <img src="image/icon/atm.jpg" alt="Image" width="200" height="200"><br>
      <p>ATM</p>
    </div>
    </a>

    <a href = "multi_image_list.php">
    <div class="col-sm-4"> 
      <img src="image/grid_icon/explore.png" alt="Image" width="200" height="200"></a><br>
      <p>App Image Slider</p>
    </div></a>
  </div>

</div>

<br><br><br>

<footer class="container-fluid text-center">
  <p> Powered By <a href = "https://sites.google.com/view/enigmasystems/home">Enigma Systems ©</a></p>
</footer>

</body>
</html>
