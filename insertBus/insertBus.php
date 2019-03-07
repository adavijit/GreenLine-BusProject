<?php
$connect = mysqli_connect("localhost", "root", "", "project");
if(isset($_POST["bus_no"]))
{
 $bus_no = mysqli_real_escape_string($connect, $_POST["bus_no"]);
 $query = "INSERT INTO bus_no(bus_no) VALUES('$bus_no')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
 else {
   echo "Something error from insertBus";
 }
}
?>
