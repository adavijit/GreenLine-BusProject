<?php
$connect = mysqli_connect("localhost", "root", "", "project");
if(isset($_POST["pump_name"], $_POST["pump_address"] ))
{
 $pump_name = mysqli_real_escape_string($connect, $_POST["pump_name"]);
 $pump_address = mysqli_real_escape_string($connect, $_POST["pump_address"]);
 $query = "INSERT INTO pump_details( pump_name, pump_address ) VALUES('$pump_name', '$pump_address' )";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>
