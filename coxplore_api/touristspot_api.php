<?php

    include("dbconfig_coxplore.php");
    $sql = "SELECT *FROM tourist_spot ORDER BY tourist_spot_name ASC";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
      $rows = array();
       while($r = mysqli_fetch_assoc($result)) {
          $rows[] = $r; // with result object
        //  $rows[] = $r; // only array
       }
      echo json_encode($rows);

    } else {
        echo '{"result": "No data found"}';
    }
  ?>