<?php
  $db =  mysqli_connect("localhost", "coxplorebd_enigmasystems", "8&49IJG&&iJE", "coxplorebd_root");
  $msg = "";

  if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  ?>