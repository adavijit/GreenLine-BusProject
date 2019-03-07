<?php
session_start();
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

//session_start();
if(!isset($_SESSION['a_id'])){
    header("location:../index.php?admin=notLoggedIn");
}
$sql = "SELECT * FROM main_input where dates = CURDATE()";
$result = mysqli_query($conn, $sql);
$todayEntry=mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/logout.css">
    <link rel="stylesheet" href="../css/font.css">
    <script src="../js/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css" />
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/jquery.table2excel.js"></script>
    <link rel="stylesheet" href="../css/node_modules/glyphicons-only-bootstrap/css/bootstrap.min.css">
</script>
   <script type="text/javascript">
   function printDiv(divName){
   var printContents = document.getElementById(divName).innerHTML;
   var originalContents = document.body.innerHTML;
   document.body.innerHTML = printContents;
   window.print();
   document.body.innerHTML = originalContents;
 }

    </script>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
  .dataTables_filter {
   width: 50%;
   float: right;
   text-align: right;
}
  @font-face {
      font-family: KoHo;
      src: url(../assets/KoHo-Regular.ttf);
  }
  body {
    font-family: 'KoHo', sans-serif;
  }

      #start_date{
          width:250px;
          align='middle';
          margin-left:550px; '
      }
      #end_date{
           width:250px;
          align='middle';
          margin-left:550px;

      }
      #search{
          margin-left:550px;
      }
      #add{
          margin-left:265px;
      }
      #wall {
        position:relative;
        width: 100%;
        height: 200px;
        top: -16px;
        background: rgb(255,255,255);
        text-align: center;
        padding-top: 49px;
        color: rgb(255,255,255);
      }

      #eye-l, #eye-r {
        position:absolute;
        z-index: 20;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: rgb(255,255,255);
        margin-top:8px;
        left: 8px;
        margin-left: -8px;
        animation: search 2.3s infinite;
          -o-animation: search 2.3s infinite;
          -ms-animation: search 2.3s infinite;
          -webkit-animation: search 2.3s infinite;
          -moz-animation: search 2.3s infinite;
        box-sizing: border-box;
          -o-box-sizing: border-box;
          -ms-box-sizing: border-box;
          -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
        border: 5px solid rgb(16,102,29);
      }

      #eye-r {
        margin-left: 8px;
      }

      #nose {
        position:relative;
        width: 24px;
        height: 24px;
        border: 5px solid rgb(26,161,26);
        border-radius: 50%;
        border-top-color: transparent;
        background: rgb(26,161,26);
        top:20px;
        left:-11px;
        transform: rotate(35deg);
          -o-transform: rotate(35deg);
          -ms-transform: rotate(35deg);
          -webkit-transform: rotate(35deg);
          -moz-transform: rotate(35deg);
        animation: noser 2.3s infinite;
          -o-animation: noser 2.3s infinite;
          -ms-animation: noser 2.3s infinite;
          -webkit-animation: noser 2.3s infinite;
          -moz-animation: noser 2.3s infinite;
      }

      #mouth{
        position:relative;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgb(26,161,26);
        margin-top:33px;
        float:left;
        margin-left: 5px;
        animation: search 2.3s infinite;
          -o-animation: search 2.3s infinite;
          -ms-animation: search 2.3s infinite;
          -webkit-animation: search 2.3s infinite;
          -moz-animation: search 2.3s infinite;
      }

      #man {
        position:relative;
        width: 81px;
        height: 114px;
        border: 8px solid rgb(26,161,26);
        border-radius: 50%;
        margin-left:50%;
        left: -41px;
        animation: pop 9.2s infinite;
          -o-animation: pop 9.2s infinite;
          -ms-animation: pop 9.2s infinite;
          -webkit-animation: pop 9.2s infinite;
          -moz-animation: pop 9.2s infinite;
      }







      @keyframes search {
        0%, 100% { transform:translate(0px, 0px);}
        50% {transform:translate(52px, 0px);}
      }

      @-o-keyframes search {
        0%, 100% { -o-transform:translate(0px, 0px);}
        50% {-o-transform:translate(52px, 0px);}
      }

      @-ms-keyframes search {
        0%, 100% { -ms-transform:translate(0px, 0px);}
        50% {-ms-transform:translate(52px, 0px);}
      }

      @-webkit-keyframes search {
        0%, 100% { -webkit-transform:translate(0px, 0px);}
        50% {-webkit-transform:translate(52px, 0px);}
      }

      @-moz-keyframes search {
        0%, 100% { -moz-transform:translate(0px, 0px);}
        50% {-moz-transform:translate(52px, 0px);}
      }

      @keyframes noser {
        0%, 100% { transform:translate(0px, 0px) rotate(35deg);}
        50% {transform:translate(70px, 0px) rotate(-35deg);}
      }

      @-o-keyframes noser {
        0%, 100% { -o-transform:translate(0px, 0px) rotate(35deg);}
        50% {-o-transform:translate(70px, 0px) rotate(-35deg);}
      }

      @-ms-keyframes noser {
        0%, 100% { -ms-transform:translate(0px, 0px) rotate(35deg);}
        50% {-ms-transform:translate(70px, 0px) rotate(-35deg);}
      }

      @-webkit-keyframes noser {
        0%, 100% { -webkit-transform:translate(0px, 0px) rotate(35deg);}
        50% {-webkit-transform:translate(70px, 0px) rotate(-35deg);}
      }

      @-moz-keyframes noser {
        0%, 100% { -moz-transform:translate(0px, 0px) rotate(35deg);}
        50% {-moz-transform:translate(70px, 0px) rotate(-35deg);}
      }

      @keyframes pop {
        0%, 100% { transform:translate(0px, 130px)}
        20%, 80% { transform:translate(0px, 16px)}
      }

      @-o-keyframes pop {
        0%, 100% { -o-transform:translate(0px, 130px)}
        20%, 80% { -o-transform:translate(0px, 16px)}
      }

      @-ms-keyframes pop {
        0%, 100% { -ms-transform:translate(0px, 130px)}
        20%, 80% { -ms-transform:translate(0px, 16px)}
      }

      @-webkit-keyframes pop {
        0%, 100% { -webkit-transform:translate(0px, 130px)}
        20%, 80% { -webkit-transform:translate(0px, 16px)}
      }

      @-moz-keyframes pop {
        0%, 100% { -moz-transform:translate(0px, 130px)}
        20%, 80% { -moz-transform:translate(0px, 16px)}
      }
  </style>
</head>
<body background="../assets/new.png" style="background-repeat: no-repeat;background-size: cover;">

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">GreenLine</a>
      </div>
      <ul class="nav navbar-nav navbar-right">

             <li class="active"><a><?php echo "Hey, ". "$_SESSION[a_name]"; ?></a></li>
        <li><a href="../admin.php">Home</a></li>
        <li  class="active"><a href="#">Show Results</a></li>
          <li>
              <form action="../logout.inc.php" method="POST">
                <li style="margin-right:5px;"><button type="submit" name="submitLogOut" class="btn btn-danger navbar-btn btn-circle">Logout</button></li>
              </form>
          </li>
      </ul>
    </div>
  </nav>
<div class="container">
<div class="row">
                <div class="panel">
                    <div class="panel-heading">
                      <i class="icon icon-chevron-up chevron"></i>
                  </div>
                  <div class="panel-content">
                    <form  action="#" method="post">
                    <center><div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                      <button type="submit" style="padding-right:50px;"  value="Date" name="All" class="btn btn-primary"><span class="glyphicon glyphicon-th"></span> All</button>
                        <button type="submit" style="padding-right:50px;"  value="Bus" name="Bus"  class="btn btn-primary"><span class="glyphicon glyphicon-road"></span> Bus</button>
                        <button type="submit" style="padding-right:50px;"  value="Driver" name="Driver" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Driver</button>
                        <button type="submit" style="padding-right:50px;"  value="Pump" name="Pump" class="btn btn-primary"><span class="glyphicon glyphicon-tint"></span> Pump</button>

                      <button type="submit" style="padding-right:50px; color:black;"   onclick="printDiv('printMe')"  value="Print" class="btn btn-warning"><span class="glyphicon glyphicon-print"></span> Print</button>
  <button type="submit"  name="export" id="export" style="padding-right:50px; color:black;"   class="btn btn-warning"><span class="glyphicon glyphicon-share"></span> Export</button>
                      </center>
                      </div>
                    </form>

                  </div>
              </div>
              <?php if (!isset($_POST['All']) && !isset($_POST['Bus']) && !isset($_POST['Driver']) && !isset($_POST['Pump']) && !isset($_POST['bus_det']) && !isset($_POST['dt1'])
               && !isset($_POST['dt']) && !isset($_POST['dt3']) && !isset($_POST['dt2']) && !isset($_POST['pump_det'])  && !isset($_POST['driver_det'])


            ) {
              echo "
              <div id='man'>
              <div id='eye-l'></div>
              <div id='eye-r'></div>
              <div id='nose'></div>
              <div id='mouth'></div>
            </div>
            <div id='wall'></div>


              ";
              } ?>

</div>
<?php


#2_start
/*bus wise details*/
if (isset($_POST['Bus']))
  {       #list of buses


                    $sql = "SELECT * FROM bus_no";
                    $result = mysqli_query($conn, $sql);
                     echo "
                     <div id='printMe' style='width: 600px;
                     height: 300px;
                     top:0;
                     bottom: 0;
                     left: 0;
                     right: 0;
                     overflow-y:scroll;
                     padding-left:10px;
                     padding-right:10px;
                     margin: auto;'>
<center><h2>Bus List</h2></center>
                <div>
                ";


                if (mysqli_num_rows($result) > 0)
                 {
                     while($row = mysqli_fetch_assoc($result))
                     {
                       $test = $row['bus_no'];
                       echo "<center><form  action= 'showAdminResults.php' method = 'POST'><input type='submit' style='width:250px; margin-bottom:5px;' class='btn btn-success' name = 'bus_det' value ='$test'> </form></center>";
                       echo "<br>";
                     }

                 }

               echo"</div></div>";
                mysqli_close($conn);

}

/*bus details show*/

if (isset($_POST['bus_det']))
 {
    $tot_fuel_amt = 0;
$ltr = 0;
$amt_paid =0;
$tot_due = 0;
               #select date
                      $_SESSION['test'] = $_POST['bus_det'];
                       echo "<h2 style='margin-left:40%;';>BUS NO- $_SESSION[test] </h2></br>";
                      echo "<div class='col-lg-4 col-lg-offset-4'>
                          <div class='input-group'>
                          <form action='showAdminResults.php' method='POST'>
                          <div class='row'>
                          <div class=col-md-5><h4>Select Starting Date</h4></div>
                          <div class=col-md-6><h4>Select Ending Date</h4></div>
                           </div>
                              <div class='row'>
                                  <div class=col-md-5><input type='date' class='form-control' id='txtdate' name='start_date' style='height:40px';/></div>
                                  <div class=col-md-5><input type='date' class='form-control' id='txtdate1' name='end_date' style='height:40px';/></div>
                                  <div class=col-md-2><input type='submit' name ='dt1' value='GO' class='btn btn-info btn-lg' style='height:40px';></div>
                                </div>
                              </span>
                        </form>
                          </div>

                      </div></br></br></br></br></br></br>


                    ";
  /*UNFILTERED LIST of  the bus*/

                                $sql = "SELECT * FROM main_input WHERE bus_no = '$_POST[bus_det]';";
                                $result = mysqli_query($conn,$sql);
                                 echo "<div id='printMe'>";
                                  echo "<table id='myTable' class='table' style='padding-left:510px;'  >
                                    <thead class='head-dark'>
                                      <tr>

                                        <th scope='col'>Date</th>
                                        <th scope='col'>Bus Route</th>
                                        <th scope='col'>Bus Number</th>
                                        <th scope='col'>Driver Name</th>
                                        <th scope='col'>Pump Name</th>
                                        <th scope='col'>Fuel Taken(LTR)</th>
                                        <th scope='col'>Rate On Date</th>
                                        <th scope='col'>Distance Covered</th>
                                        <th scope='col'>Challan Number</th>
                                        <th scope='col'>Oil Cost</th>
                                        <th scope='col'>Amount Paid</th>
                                        <th scope='col'>Amount Due</th>
                                        <th scope='col'>Mileage</th>
                                      </tr>
                                    </thead>
                                    <tbody>";




                                for($i = mysqli_num_rows($result); $i > 0; $i--){

                                 while ($row = mysqli_fetch_assoc($result)) {

                                    echo"<tr>";

              $amt_paid = $amt_paid + $row['amount_paid'];
              $ltr = $ltr + $row['fuel_taken'];
              $tot_fuel_amt = $tot_fuel_amt + $row['oil_cost'];
              $tot_due = $tot_due + $row['due_payment'];
                                        echo "

                                          <td>$row[dates]</td>
                                          <td>$row[bus_route]</td>
                                          <td>$row[bus_no]</td>
                                          <td>$row[driver_name]</td>
                                          <td>$row[pump_name]</td>
                                          <td>$row[fuel_taken]</td>
                                          <td>$row[rate_on_date]</td>
                                          <td>$row[distance_covered]</td>
                                          <td>$row[chalan_no]</td>
                                          <td>$row[oil_cost]</td>
                                          <td>$row[amount_paid]</td>
                                          <td>$row[due_payment]</td>
                                          <td>$row[milage]</td>";

                                        echo "</tr>";
                                  }


                                 echo "</tbody>";
                               }


                               echo "</table>";

                               echo "<div class = 'row'>";

                echo "<div class='col-md-1'></div>";
                               echo "<div class='col-md-3'><b>Total Fuel (ltr)</b></div>";
                                echo "<div class='col-md-2'>$ltr</div>";
                                echo "<div class='col-md-3'><b>Total Oil cost (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$tot_fuel_amt</div>";
               echo "</div>";
        echo "<div class = 'row'>";

                    echo "<div class='col-md-1'></div>";
                                 echo "<div class='col-md-3'><b>Total Amount Paid (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$amt_paid</div>";
                                echo "<div class='col-md-3'><b>Total Amount Due (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$tot_due</div>";
                               echo "</div>";
                               mysqli_close($conn);
 /*UNFILTERED LIST OF THIS DRIVER*/

}


/*bus_datewise details*/
if (isset($_POST['dt1']))
{
    #filtered details of the bus
$tot_fuel_amt = 0;
$ltr = 0;
$amt_paid =0;
$tot_due = 0;
     $emp_query = "SELECT * FROM main_input WHERE 1 and bus_no = '$_SESSION[test]'";

                             $fromDate = $_POST['start_date'];
             $endDate = $_POST['end_date'];

             if(!empty($fromDate) && !empty($endDate)){
                $emp_query .= " and dates
                             between '".$fromDate."' and '".$endDate."' ";
             }
                            echo "<div id='printMe'>";
                            echo "<table id='myTable' class='table' style='padding-left:510px;'  >
                              <thead class='head-dark'>
                                <tr>
                                  <th scope='col'>Date</th>
                                  <th scope='col'>Bus Route</th>
                                  <th scope='col'>Bus Number</th>
                                  <th scope='col'>Driver Name</th>
                                  <th scope='col'>Pump Name</th>
                                  <th scope='col'>Fuel Taken(LTR)</th>
                                  <th scope='col'>Rate On Date</th>
                                  <th scope='col'>Distance Covered</th>
                                  <th scope='col'>Challan Number</th>
                                  <th scope='col'>Oil Cost</th>
                                  <th scope='col'>Amount Paid</th>
                                  <th scope='col'>Amount Due</th>
                                  <th scope='col'>Mileage</th>
                                </tr>
                              </thead>
                              <tbody>";


$emp_query .= " ORDER BY dates DESC";
$result = mysqli_query($conn,$emp_query);


if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){

              $amt_paid = $amt_paid + $row['amount_paid'];
              $ltr = $ltr + $row['fuel_taken'];
              $tot_fuel_amt = $tot_fuel_amt + $row['oil_cost'];
              $tot_due = $tot_due + $row['due_payment'];
            echo"<tr>";
            echo "

              <td>$row[dates]</td>
              <td>$row[bus_route]</td>
              <td>$row[bus_no]</td>
              <td>$row[driver_name]</td>
              <td>$row[pump_name]</td>
              <td>$row[fuel_taken]</td>
              <td>$row[rate_on_date]</td>
              <td>$row[distance_covered]</td>
              <td>$row[chalan_no]</td>
              <td>$row[oil_cost]</td>
              <td>$row[amount_paid]</td>
              <td>$row[due_payment]</td>
              <td>$row[milage]</td>";

            echo "</tr>";
          }
        }else{
          echo "<tr>";
          echo "<td colspan='4'>No record found.</td>";
          echo "</tr>";
        }

         echo "</table>";


         echo "<div class = 'row'>";

                echo "<div class='col-md-1'></div>";
                               echo "<div class='col-md-3'><b>Total Fuel (ltr)</b></div>";
                                echo "<div class='col-md-2'>$ltr</div>";
                                echo "<div class='col-md-3'><b>Total Oil Cost (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$tot_fuel_amt</div>";
               echo "</div>";
        echo "<div class = 'row'>";

                    echo "<div class='col-md-1'></div>";
                                 echo "<div class='col-md-3'><b>Total Amount Paid (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$amt_paid</div>";
                                echo "<div class='col-md-3'><b>Total Amount Due (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$tot_due</div>";
                                echo "</div>";

echo "</div>";
                                mysqli_close($conn);

}



#2_end





#3_start
/*Driver details list*/
            if (isset($_POST['Driver']))
              {
                            $sql = "SELECT * FROM driver";
                            $result = mysqli_query($conn, $sql);
                             echo "
                             <div id='printMe' style='width: 600px;
                             height: 300px;
                             top:0;
                             bottom: 0;
                             left: 0;
                             right: 0;
                             overflow-y:scroll;
                             padding-left:10px;
                             padding-right:10px;
                             margin: auto;'>
<center><h2>Driver List</h2></center>
                        <div>
                        ";


                        if (mysqli_num_rows($result) > 0)
                         {
                             while($row = mysqli_fetch_assoc($result))
                             {
                               $test_driver = $row['driver_name'];
                               echo "<center><form  action= 'showAdminResults.php' method = 'POST'><input type='submit' style='width:250px; margin-bottom:5px;' class='btn btn-success' name = 'driver_det' value ='$test_driver'> </form></center>";
                               echo "<br>";
                             }

                         }

                       echo"</div></div>";
                        mysqli_close($conn);

            }

/*driver details*/
if (isset($_POST['driver_det']))
 {
    #select date

                $_SESSION['test2'] = $_POST['driver_det'];
                    echo "<h2 style='margin-left:40%;';>DRIVER NAME - $_SESSION[test2] </h2></br>";
                    echo "<div class='col-lg-4 col-lg-offset-4'>
                      <div class='input-group'>
                      <form action='showAdminResults.php' method='POST'>
                      <div class='row'>
                      <div class=col-md-5><h4>Select Starting Date</h4></div>
                      <div class=col-md-6><h4>Select Ending Date</h4></div>
                       </div>
                          <div class='row'>
                              <div class=col-md-5><input type='date' class='form-control' id='txtdate' name='start_date' style='height:40px';/></div>
                              <div class=col-md-5><input type='date' class='form-control' id='txtdate1' name='end_date' style='height:40px';/></div>
                              <div class=col-md-2><input type='submit' name ='dt3' value='GO' class='btn btn-info btn-lg' style='height:40px';></div>
                            </div>
                          </span>
                    </form>
                      </div>

                  </div></br></br></br></br></br></br>


                " ;


  /*UNFILTERED LIST OF THE DRIVER*/
  $tot_fuel_amt = 0;
$ltr = 0;
$amt_paid =0;
$tot_due = 0;

                    $sql = "SELECT * FROM main_input WHERE driver_name = '$_POST[driver_det]';";
                    $result = mysqli_query($conn,$sql);
                     echo "<div id='printMe'>";
                      echo "<table class='table' id='myTable' style='padding-left:510px;'  >
                        <thead class='head-dark'>
                          <tr>

                            <th scope='col'>Date</th>
                            <th scope='col'>Bus Route</th>
                            <th scope='col'>Bus Number</th>
                            <th scope='col'>Driver Name</th>
                            <th scope='col'>Pump Name</th>
                            <th scope='col'>Fuel Taken(LTR)</th>
                            <th scope='col'>Rate On Date</th>
                            <th scope='col'>Distance Covered</th>
                            <th scope='col'>Challan Number</th>
                            <th scope='col'>Oil Cost</th>
                            <th scope='col'>Amount Paid</th>
                            <th scope='col'>Amount Due</th>
                            <th scope='col'>Mileage</th>
                          </tr>
                        </thead>
                        <tbody>";




                    for($i = mysqli_num_rows($result); $i > 0; $i--){

                      while ($row = mysqli_fetch_assoc($result)) {
                            $amt_paid = $amt_paid + $row['amount_paid'];
              $ltr = $ltr + $row['fuel_taken'];
              $tot_fuel_amt = $tot_fuel_amt + $row['oil_cost'];
              $tot_due = $tot_due + $row['due_payment'];
                        echo"<tr>";
                            echo "

                              <td>$row[dates]</td>
                              <td>$row[bus_route]</td>
                              <td>$row[bus_no]</td>
                              <td>$row[driver_name]</td>
                              <td>$row[pump_name]</td>
                              <td>$row[fuel_taken]</td>
                              <td>$row[rate_on_date]</td>
                              <td>$row[distance_covered]</td>
                              <td>$row[chalan_no]</td>
                              <td>$row[oil_cost]</td>
                              <td>$row[amount_paid]</td>
                              <td>$row[due_payment]</td>
                              <td>$row[milage]</td>";

                            echo "</tr>";
                      }


                     echo "</tbody>";
                   }


                   echo "</table>";

                    echo "<div class = 'row'>";

                echo "<div class='col-md-1'></div>";
                               echo "<div class='col-md-3'><b>Total Fuel (ltr)</b></div>";
                                echo "<div class='col-md-2'>$ltr</div>";
                                echo "<div class='col-md-3'><b>Total Oil Cost (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$tot_fuel_amt</div>";
               echo "</div>";
        echo "<div class = 'row'>";

                    echo "<div class='col-md-1'></div>";
                                 echo "<div class='col-md-3'><b>Total Amount Paid (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$amt_paid</div>";
                                echo "<div class='col-md-3'><b>Total Amount Due (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$tot_due</div>";
                                echo "</div>";
                                echo "</div>";
                   mysqli_close($conn);

 /*UNFILTERED LIST OF THIS DRIVER*/

}
/*DATEWISE FILTERED LIST OF DRIVER*/
                      if (isset($_POST['dt3']))
                      {
                        $tot_fuel_amt = 0;
$ltr = 0;
$amt_paid =0;
$tot_due = 0;

                           $emp_query = "SELECT * FROM main_input WHERE 1 and driver_name = '$_SESSION[test2]'";


                                                   $fromDate = $_POST['start_date'];
                                   $endDate = $_POST['end_date'];

                                   if(!empty($fromDate) && !empty($endDate)){
                                      $emp_query .= " and dates
                                                   between '".$fromDate."' and '".$endDate."' ";
                                   }
                                                  echo "<div id='printMe'>";
                                                  echo "<table id='myTable' class='table' style='padding-left:510px;'  >
                                                    <thead class='head-dark'>
                                                      <tr>
                                                        <th scope='col'>Date</th>
                                                        <th scope='col'>Bus Route</th>
                                                        <th scope='col'>Bus Number</th>
                                                        <th scope='col'>Driver Name</th>
                                                        <th scope='col'>Pump Name</th>
                                                        <th scope='col'>Fuel Taken(LTR)</th>
                                                        <th scope='col'>Rate On Date</th>
                                                        <th scope='col'>Distance Covered</th>
                                                        <th scope='col'>Challan Number</th>
                                                        <th scope='col'>Oil Cost</th>
                                                        <th scope='col'>Amount Paid</th>
                                                        <th scope='col'>Amount Due</th>
                                                        <th scope='col'>Mileage</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>";


                      $emp_query .= " ORDER BY dates DESC";
                      $result = mysqli_query($conn,$emp_query);


                      if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){

    $amt_paid = $amt_paid + $row['amount_paid'];
              $ltr = $ltr + $row['fuel_taken'];
              $tot_fuel_amt = $tot_fuel_amt + $row['oil_cost'];
              $tot_due = $tot_due + $row['due_payment'];
                                  echo"<tr>";
                                  echo "

                                    <td>$row[dates]</td>
                                    <td>$row[bus_route]</td>
                                    <td>$row[bus_no]</td>
                                    <td>$row[driver_name]</td>
                                    <td>$row[pump_name]</td>
                                    <td>$row[fuel_taken]</td>
                                    <td>$row[rate_on_date]</td>
                                    <td>$row[distance_covered]</td>
                                    <td>$row[chalan_no]</td>
                                    <td>$row[oil_cost]</td>
                                    <td>$row[amount_paid]</td>
                                    <td>$row[due_payment]</td>
                                    <td>$row[milage]</td>";

                                  echo "</tr>";
                                }
                              }else{
                                echo "<tr>";
                                echo "<td colspan='4'>No record found.</td>";
                                echo "</tr>";
                              }

                                                      echo "</table>";

                                                       echo "<div class = 'row'>";

                echo "<div class='col-md-1'></div>";
                               echo "<div class='col-md-3'><b>Total Fuel (ltr)</b></div>";
                                echo "<div class='col-md-2'>$ltr</div>";
                                echo "<div class='col-md-3'><b>Total Oil Cost (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$tot_fuel_amt</div>";
               echo "</div>";
        echo "<div class = 'row'>";

                    echo "<div class='col-md-1'></div>";
                                 echo "<div class='col-md-3'><b>Total Amount Paid (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$amt_paid</div>";
                                echo "<div class='col-md-3'><b>Total Amount Due (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$tot_due</div>";
                                echo "</div>";
                                  echo "</div>";

                                                      mysqli_close($conn);
           }

/*driver details ends*/
#3_end





#4_start
/*pump_lists*/
if (isset($_POST['Pump']))
            {
                  $sql = "SELECT * FROM pump_details";
                  $result = mysqli_query($conn, $sql);
                  echo "
                       <div id='printMe' style='width: 600px;
                       height: 300px;
                       top:0;
                       bottom: 0;
                       left: 0;
                       right: 0;
                       overflow-y:scroll;
                       padding-left:10px;
                       padding-right:10px;
                       margin: auto;'>
<center><h2>Pump List</h2></center>
                  <div>
                  ";
                if (mysqli_num_rows($result) > 0)
                   {
                       while($row = mysqli_fetch_assoc($result))
                       {
                         $test_pump = $row['pump_name'];
                         echo "<center><form  action= 'showAdminResults.php' method = 'POST'><input type='submit' style='width:250px; margin-bottom:5px;' class='btn btn-success' name = 'pump_det' value ='$test_pump'> </form></center>";
                         echo "<br>";
                       }

                   }


                 else {
                    echo "0 results";
                }
                  echo"</div></div>";
                  mysqli_close($conn);

    }


/*pump list ends*/
/*pump details*/
if (isset($_POST['pump_det']))
 {  #SELECT DATE


                    $_SESSION['test1'] = $_POST['pump_det'];
                     echo "<h2 style='margin-left:40%;';>PUMP NAME- $_SESSION[test1] </h2></br>";
                     echo "<div class='col-lg-4 col-lg-offset-4'>
                        <div class='input-group'>
                        <form action='showAdminResults.php' method='POST'>
                        <div class='row'>
                        <div class=col-md-5><h4>Select Starting Date</h4></div>
                        <div class=col-md-6><h4>Select Ending Date</h4></div>
                         </div>
                            <div class='row'>
                                <div class=col-md-5><input type='date' class='form-control' id='txtdate' name='start_date' style='height:40px';/></div>
                                <div class=col-md-5><input type='date' class='form-control' id='txtdate1' name='end_date' style='height:40px';/></div>
                                <div class=col-md-2><input type='submit' name ='dt2' value='GO' class='btn btn-info btn-lg' style='height:40px';></div>
                              </div>
                            </span>
                      </form>
                        </div>

                    </div></br></br></br></br></br></br>


                  ";

  /*UNFILTERED LIST*/
$tot_fuel_amt = 0;
$ltr = 0;
$amt_paid =0;
$tot_due = 0;

                                $sql = "SELECT * FROM main_input WHERE pump_name = '$_POST[pump_det]';";
                                $result = mysqli_query($conn,$sql);
                                 echo "<div id='printMe'>";
                                  echo "<table id='myTable' class='table' style='padding-left:510px;'  >
                                    <thead class='head-dark'>
                                      <tr>

                                        <th scope='col'>Date</th>
                                        <th scope='col'>Bus Route</th>
                                        <th scope='col'>Bus Number</th>
                                        <th scope='col'>Driver Name</th>
                                        <th scope='col'>Pump Name</th>
                                        <th scope='col'>Fuel Taken(LTR)</th>
                                        <th scope='col'>Rate On Date</th>
                                        <th scope='col'>Distance Covered</th>
                                        <th scope='col'>Challan Number</th>
                                        <th scope='col'>Oil Cost</th>
                                        <th scope='col'>Amount Paid</th>
                                        <th scope='col'>Amount Due</th>
                                        <th scope='col'>Mileage</th>
                                      </tr>
                                    </thead>
                                    <tbody>";




                                for($i = mysqli_num_rows($result); $i > 0; $i--){


                                  while ($row = mysqli_fetch_assoc($result)) {
                                    echo"<tr>";
                                    $amt_paid = $amt_paid + $row['amount_paid'];
              $ltr = $ltr + $row['fuel_taken'];
              $tot_fuel_amt = $tot_fuel_amt + $row['oil_cost'];
              $tot_due = $tot_due + $row['due_payment'];
                                        echo "

                                          <td>$row[dates]</td>
                                          <td>$row[bus_route]</td>
                                          <td>$row[bus_no]</td>
                                          <td>$row[driver_name]</td>
                                          <td>$row[pump_name]</td>
                                          <td>$row[fuel_taken]</td>
                                          <td>$row[rate_on_date]</td>
                                          <td>$row[distance_covered]</td>
                                          <td>$row[chalan_no]</td>
                                          <td>$row[oil_cost]</td>
                                          <td>$row[amount_paid]</td>
                                          <td>$row[due_payment]</td>
                                          <td>$row[milage]</td>";

                                        echo "</tr>";
                                  }

                                #}
                                 echo "</tbody>";
                               }


                               echo "</table>";

                               echo "<div class = 'row'>";

                echo "<div class='col-md-1'></div>";
                               echo "<div class='col-md-3'><b>Total Fuel (ltr)</b></div>";
                                echo "<div class='col-md-2'>$ltr</div>";
                                echo "<div class='col-md-3'><b>Total Oil Cost (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$tot_fuel_amt</div>";
               echo "</div>";
        echo "<div class = 'row'>";

                    echo "<div class='col-md-1'></div>";
                                 echo "<div class='col-md-3'><b>Total Amount Paid (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$amt_paid</div>";
                                echo "<div class='col-md-3'><b>Total Amount Due (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$tot_due</div>";
                                echo "</div>";
                                echo "</div>";
                               mysqli_close($conn);
 /*UNFILTERED LIST OF THIS DRIVER*/

}
/*show_pumpwise_date details */
                    if (isset($_POST['dt2']))


                    {

                      $tot_fuel_amt = 0;
$ltr = 0;
$amt_paid =0;
$tot_due = 0;
                         $emp_query = "SELECT * FROM main_input WHERE 1 and pump_name = '$_SESSION[test1]'";


                                                 $fromDate = $_POST['start_date'];
                                 $endDate = $_POST['end_date'];

                                 if(!empty($fromDate) && !empty($endDate)){
                                    $emp_query .= " and dates
                                                 between '".$fromDate."' and '".$endDate."' ";
                                 }
                                                echo "<div id='printMe'>";
                                                echo "<table class='table' id='myTable' style='padding-left:510px;'  >
                                                  <thead class='head-dark'>
                                                    <tr>
                                                      <th scope='col'>Date</th>
                                                      <th scope='col'>Bus Route</th>
                                                      <th scope='col'>Bus Number</th>
                                                      <th scope='col'>Driver Name</th>
                                                      <th scope='col'>Pump Name</th>
                                                      <th scope='col'>Fuel Taken(LTR)</th>
                                                      <th scope='col'>Rate On Date</th>
                                                      <th scope='col'>Distance Covered</th>
                                                      <th scope='col'>Challan Number</th>
                                                      <th scope='col'>Oil Cost</th>
                                                      <th scope='col'>Amount Paid</th>
                                                      <th scope='col'>Amount Due</th>
                                                      <th scope='col'>Mileage</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>";


                    $emp_query .= " ORDER BY dates DESC";
                    $result = mysqli_query($conn,$emp_query);


                    if(mysqli_num_rows($result) > 0){
                              while($row = mysqli_fetch_assoc($result)){
                                    $amt_paid = $amt_paid + $row['amount_paid'];
              $ltr = $ltr + $row['fuel_taken'];
              $tot_fuel_amt = $tot_fuel_amt + $row['oil_cost'];
              $tot_due = $tot_due + $row['due_payment'];


                                echo"<tr>";
                                echo "

                                  <td>$row[dates]</td>
                                  <td>$row[bus_route]</td>
                                  <td>$row[bus_no]</td>
                                  <td>$row[driver_name]</td>
                                  <td>$row[pump_name]</td>
                                  <td>$row[fuel_taken]</td>
                                  <td>$row[rate_on_date]</td>
                                  <td>$row[distance_covered]</td>
                                  <td>$row[chalan_no]</td>
                                  <td>$row[oil_cost]</td>
                                  <td>$row[amount_paid]</td>
                                  <td>$row[due_payment]</td>
                                  <td>$row[milage]</td>";

                                echo "</tr>";
                              }
                            }else{
                              echo "<t#r>";
                              echo "<td colspan='4'>No record found.</td>";
                              echo "</tr>";
                            }
                              echo "</table>";

                            echo "<div class = 'row'>";

                echo "<div class='col-md-1'></div>";
                               echo "<div class='col-md-3'><b>Total Fuel (ltr)</b></div>";
                                echo "<div class='col-md-2'>$ltr</div>";
                                echo "<div class='col-md-3'><b>Total Oil Cost (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$tot_fuel_amt</div>";
               echo "</div>";
        echo "<div class = 'row'>";

                    echo "<div class='col-md-1'></div>";
                                 echo "<div class='col-md-3'><b>Total Amount Paid (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$amt_paid</div>";
                                echo "<div class='col-md-3'><b>Total Amount Due (Rs.)</b></div>";
                                echo "<div class='col-md-2'>$tot_due</div>";
                                echo "</div>";
                                  echo "</div>";
                            mysqli_close($conn);

                    }
/*end pump details*/
if (isset($_POST['All']))
{

  echo "    <div  class='col-md-10.5 content'>
              <div class='panel panel-default'>
              <div class='table-responsive'>
               <br />
               <div class='row'>
                <div class='input-daterange'>
                 <input type='text' name='start_date' id='start_date' placeholder='Starting Date'  class='form-control' />
                 <br>
                 <input type='text' name='end_date' placeholder='Ending Date' id='end_date'  class='form-control' />
                </div>

                    <br>

                <div class='col-md-4'>
                 <input type='button' name='search' id='search' value='Search' class='btn btn-info' />
                </div>
               <button type='button' name='add' id='add' class='btn btn-info'>Add</button>
               </div>
               <br />
<div id='printMe'>
               <table id='order_data' class='table table-bordered table-striped'>
                <thead >

                 <tr>
                 <th>Date</th>
                 <th>Bus Route</th>
                 <th>Bus Number</th>
                 <th>Driver Name</th>
                <th>Pump</th>
                <th>Fuel</th>
                <th>Rate Today</th>
                <th>Distance</th>
                <th>Challan No</th>
                <th>Oil Cost</th>
                <th>Paid</th>
                <th>Due</th>
                <th>Mileage</th>
                <th></th>

  <th>All Results</th>
                 </tr>

                </thead>

               </table>
</div>

              </div>

              </div>
              </div>";




          echo "</div>";
}
 ?>



</div>



</body>
</html>



<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

   $('.input-daterange').datepicker({
    todayBtn:'linked',
    format: "yyyy-mm-dd",
    autoclose: true,
    endDate:'0'
   });

   fetch_data('no');


   function fetch_data(is_date_search, start_date='', end_date='')
   {
    var dataTable = $('#order_data').DataTable({
     "processing" : true,
     "serverSide" : true,
     "order" : [],
     "ajax" : {
      url:"fetchMain.php",
      type:"POST",
      data:{
       is_date_search:is_date_search, start_date:start_date, end_date:end_date
      }
     }
    });
   }



   $('#search').click(function(){
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    if(start_date != '' && end_date !='')
    {

     $('#order_data').DataTable().destroy();
     fetch_data('yes', start_date, end_date);
    }
    else
    {
     alert("Both Date is Required");
    }
   });

  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"updateMain.php",
    method:"POST",

    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#order_data').DataTable().destroy();
     //fetch_data();
     location.reload();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });

  $('#add').click(function(){
   var html = '<tr>';
      html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
   html += '<td contenteditable id="data3"></td>';
   html += '<td contenteditable id="data4"></td>';
   html += '<td contenteditable id="data5"></td>';
   html += '<td contenteditable id="data6"></td>';
   html += '<td contenteditable id="data7"></td>';
   html += '<td contenteditable id="data8"></td>';
   html += '<td contenteditable id="data9"></td>';
   html += '<td  id="data10"></td>';
   html += '<td contenteditable id="data11"></td>';
   html += '<td  id="data12"></td>';
   html += '<td  id="data13"></td>';
html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';


   html += '</tr>';
   $('#order_data tbody').prepend(html);
 });

  $(document).on('click', '#insert', function(){
   var dates = $('#data1').text();
   var bus_route = $('#data2').text();
   var bus_no = $('#data3').text();
   var driver_name = $('#data4').text();
   var pump_name = $('#data5').text();
   var fuel_taken = $('#data6').text();
   var rate_on_date = $('#data7').text();
   var distance_covered = $('#data8').text();
   var chalan_no = $('#data9').text();
   var oil_cost = $('#data10').text();
   var amount_paid = $('#data11').text();
   var due_payment = $('#data12').text();
   var milage = $('#data13').text();


   if(bus_no != '')
   {
    $.ajax({
     url:"insertMain.php",
     method:"POST",
     data:{dates:dates,bus_route:bus_route,bus_no:bus_no,driver_name:driver_name,pump_name:pump_name,fuel_taken:fuel_taken,rate_on_date:rate_on_date,distance_covered:distance_covered,chalan_no:chalan_no,amount_paid:amount_paid,oil_cost:oil_cost,milage:milage,due_payment:due_payment},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#order_data').DataTable().destroy();
      //fetch_data();
      location.reload();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Both Fields is required");
   }
 });
 $('#myTable').DataTable();
 $("#export").click(function(){

   $("#myTable").table2excel({
     // exclude CSS class
     exclude: ".table",
     name: "Worksheet Name",
     filename: "records.xls" //do not include extension
   });
   $("#order_data").table2excel({
     // exclude CSS class
     exclude: ".table",
     name: "Worksheet Name",
     filename: "records.xlsx" //do not include extension
   });

 });
  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"deleteMain.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#order_data').DataTable().destroy();
      //fetch_data();
      location.reload();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
 });
});
</script>
