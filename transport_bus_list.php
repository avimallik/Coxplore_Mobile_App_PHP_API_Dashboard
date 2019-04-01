<?php
 include "navbar_easy.php";
?>
  <script type='text/javascript' src='javascript/filter.js'></script> 

  <style>

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
    border-right:1px solid #bbb;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
#myInput{
	padding: 13px;
}

      #myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 15px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
  </style>
</head>

<body>

<div class="container" style = "width:50%">
 <br>
 <font size = 5pt>Search</font>
 <div class="form-group has-feedback has-search">
    <span class="glyphicon glyphicon-search form-control-feedback"></span>
    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search Transport Name" title="Type in a name">
  </div>

</div>


<div class="container">
<br>
<a href = "transport_bus_insert.php"><button type="button" class="btn btn-primary btn-block">Add More Information</button></a>
</div>
<br>


<?php
include ("dbconfig_coxplore.php");
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM transport_bus";
$result = mysqli_query($db, $sql);

        echo "<div class='container' id = 'div_data_disp'>";
        echo "<div class='row-fluid'>";

        echo "<table class = 'table table-hover' id = 'myTable'>";
        echo "<thead>";
        echo "<tr>";
       
        echo "<th>Transport Name</th>";
        // echo "<th>Transport Website</th>";
        echo "<th>Transport Phone</th>";
        // echo "<th>Transport Details</th>";
        echo "<th>Image</th>";
        echo "<th>Operations</th>";
        echo "</tr>";
        echo "</thead>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        // echo " Name: " . $row["name"]. " - Age: " . $row["age"]. " Post: " . $row["post"]. "<br>";
        $id = $row["id"];
        $image = $row["image"];
        $sum = "id={$id} & image={$image}";

        echo "<tbody>";
        echo "<tr>";
       
        echo "<td>" ."<br>". $row["transport_name"] . "</td>";
        // echo "<td>" ."<br>". $row["transport_website"] . "</td>";
        echo "<td>" ."<br>". $row["transport_phone"] . "</td>";
        // echo "<td>" ."<br>". $row["transport_details"] . "</td>";
        

        echo "<td>" . "<img src ="
        ."uploaded_transport_bus_image/"
        .$row['image']." height = '100' width = '100'>". "</td>";
        // echo "<td>" . "<a href = 'dataedit.php? id=".$row["id"]"'>"  . 'edit' .   "</a>"  .    "</td>"; 
        echo "<td>  

                <a href='transport_bus_update.php?".$sum."' class='btn btn-success' role='button'><img src = 'image/icon/edit.png'/>More</a> <br><br>     
                <a href='transport_bus_delete.php?".$sum."' class='btn btn-danger' role='button'><img src = 'image/icon/delete.png'/> Delete</a>

              </td>";
        echo "</tr>";	
        echo "</tbody>";	

    }
} else {
   
}

echo "</table>";
mysqli_close($db);
?> 




</body>
</html>