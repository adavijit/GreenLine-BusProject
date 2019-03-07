<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<?php session_start(); ?>
<?php
if (isset($_POST['bus_det'])) {
 
 $sql1= "SELECT * FROM main_input WHERE bus_no = '$_POST[bus_det]';";
$result1 = mysqli_query($conn, $sql1);
echo "<div id='printMe'>";
 echo "
  <table class='table' style='padding-left:510px;'  >
  <thead class='head-dark'>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Date</th>
      <th scope='col'>Bus Route</th>
      <th scope='col'>Bus Number</th>
      <th scope='col'>Driver Name</th>
      <th scope='col'>Pump Name</th>
      <th scope='col'>Fuel Taken(LTR)</th>
      <th scope='col'>Rate On Date</th>
      <th scope='col'>Distance Covered</th>
      <th scope='col'>Challan Number</th>
      <th scope='col'>Amount Paid</th>
      <th scope='col'>Amount Due</th>
      <th scope='col'>Mileage</th>
    </tr>
  </thead>
  <tbody>";
if (mysqli_num_rows($result1) > 0) {
	

 while ($row1 = mysqli_fetch_assoc($result1)) 
 {
 	/*$date = $row1['dates'];
 	$bus_route = $row1['bus_route'];
 	$driver_name = $row1['driver_name'];
 	$pump_name = $row1['pump_name'];
 	$distance_covered = $row1['distance_covered'];
 	$milage = $row1['milage'];
 	echo "$date <br> $bus_route <br> $driver_name <br> $pump_name <br>$distance_covered<br>$milage";*/

 	echo"<tr>
      <th scope='row'>$row1[id]</th>
      <td>$row1[dates]</td>
      <td>$row1[bus_route]</td>
      <td>$row1[bus_no]</td>
      <td>$row1[driver_name]</td>
      <td>$row1[pump_name]</td>
      <td>$row1[fuel_taken]</td>
      <td>$row1[rate_on_date]</td>
      <td>$row1[distance_covered]</td>
      <td>$row1[chalan_no]</td>
      <td>$row1[amount_paid]</td>
      <td>$row1[due_payment]</td>
      <td>$row1[milage]</td>

    </tr>";

 }
echo "<br>";
 

 }

  else
 {
 	echo "no data found";
 }
 echo "</div>";
  echo "</table>";
}

  else
 {
 	echo "ghgh";
 }
  ?>