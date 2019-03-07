<?php
$connect = mysqli_connect("localhost", "root", "", "project");
if(isset($_POST["bus_route"]))
{
 $bus_route = mysqli_real_escape_string($connect, $_POST["bus_route"]);
 $query = "INSERT INTO bus_route(bus_route) VALUES('$bus_route')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }

}
?>
