<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['insert']))
{
  echo "fsdf";
    //$bus_no = mysqli_real_escape_string($conn,$_POST['inp']);

  //  $sql= "SELECT distance_covered FROM main_input WHERE bus_no='$bus_no' ORDER BY id DESC LIMIT 1";

    //$result = mysqli_query($conn,$sql);
  //  $print_data = mysqli_fetch_row($result);
    $dates = mysqli_real_escape_string($conn,$_POST['dates']);
    $bus_route = mysqli_real_escape_string($conn,$_POST['bus_route']);
    $bus_no = mysqli_real_escape_string($conn,$_POST['bus_no']);
    $driver_name = mysqli_real_escape_string($conn,$_POST['driver_name']);
    $pump_name = mysqli_real_escape_string($conn,$_POST['pump_name']);
    $fuel_taken = mysqli_real_escape_string($conn,$_POST['fuel_taken']);
    $rate_on_date = mysqli_real_escape_string($conn,$_POST['rate_on_date']);
    $distance_covered = mysqli_real_escape_string($conn,$_POST['distance_covered']);
    $chalan_no = mysqli_real_escape_string($conn,$_POST['chalan_no']);
    $amount_paid = mysqli_real_escape_string($conn,$_POST['amount_paid']);



    $query = "INSERT INTO main_input
      (dates, bus_route, bus_no, driver_name,pump_name,fuel_taken, rate_on_date , distance_covered, chalan_no , amount_paid)
      VALUES ('$dates', '$bus_route', '$bus_no', '$driver_name' , '$pump_name' , '$fuel_taken' ,'$rate_on_date', '$distance_covered' ,'$chalan_no' ,'$amount_paid')
      ";
  if(mysqli_query($conn, $query)){
    echo "inserted";
  }
}




 ?>
