<?php
$connect = mysqli_connect("localhost", "root", "", "project");
if(isset($_POST["driver_name"], $_POST["driver_phone_no"] , $_POST["driver_address"]))
{
 $name = mysqli_real_escape_string($connect, $_POST["driver_name"]);
 $phone = mysqli_real_escape_string($connect, $_POST["driver_phone_no"]);
 $address= mysqli_real_escape_string($connect, $_POST["driver_address"]);
 $query = "INSERT INTO driver( driver_name, driver_phone_no , driver_address) VALUES('$name', '$phone' , '$address')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
 else {
   echo "asdsas";
 }
}
?>
