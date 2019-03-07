<?php
$connect = mysqli_connect("localhost", "root", "", "project");
if(isset($_POST["dates"], $_POST["bus_route"] , $_POST["bus_no"], $_POST["driver_name"], $_POST["pump_name"], $_POST["fuel_taken"],
$_POST["rate_on_date"], $_POST["distance_covered"], $_POST["chalan_no"], $_POST["oil_cost"], $_POST["amount_paid"]))
{
 $dates = mysqli_real_escape_string($connect, $_POST["dates"]);
 $bus_route = mysqli_real_escape_string($connect, $_POST["bus_route"]);
 $bus_no= mysqli_real_escape_string($connect, $_POST["bus_no"]);
 $driver_name=mysqli_real_escape_string($connect, $_POST["driver_name"]);
  $pump_name=mysqli_real_escape_string($connect, $_POST["pump_name"]);
   $fuel_taken=mysqli_real_escape_string($connect, $_POST["fuel_taken"]);
    $rate_on_date=mysqli_real_escape_string($connect, $_POST["rate_on_date"]);
     $distance_covered=mysqli_real_escape_string($connect, $_POST["distance_covered"]);
      $chalan_no=mysqli_real_escape_string($connect, $_POST["chalan_no"]);
       $oil_cost=$fuel_taken*$rate_on_date;
        $amount_paid=mysqli_real_escape_string($connect, $_POST["amount_paid"]);
        if ($amount_paid=='')
        {
          $amount_paid=0;
        }
        $due_payment=$oil_cost-$amount_paid;
        $milage=mysqli_real_escape_string($connect, $_POST["milage"]);
        $sql= "SELECT distance_covered FROM main_input WHERE bus_no='$bus_no' and pump_name='$pump_name' ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($connect,$sql);
        $print_data = mysqli_fetch_row($result);
        $newMileage=($distance_covered-$print_data[0])/$fuel_taken;
 $query = "INSERT INTO main_input( dates, bus_route , bus_no ,driver_name ,pump_name ,fuel_taken,rate_on_date,distance_covered,chalan_no,oil_cost,amount_paid,due_payment,milage)
  VALUES('$dates', '$bus_route' , '$bus_no' ,'$driver_name','$pump_name','$fuel_taken','$rate_on_date','$distance_covered','$chalan_no','$oil_cost','$amount_paid','$due_payment','$newMileage')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
 else {
   echo "not inserted";
 }
}
?>
