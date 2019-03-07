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

session_start();
if(!isset($_SESSION['u_id'])){
  header("location:index.php?user=notLoggedIn");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="jquery.table2excel.js"></script>
    <script type="text/javascript">
      src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"
    </script>
    <script type="text/javascript">
      src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"
    </script>
    <script type="text/javascript">
      src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"
    </script>
    <script type="text/javascript">
      src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"
    </script>
    <script type="text/javascript">
      src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"
    </script>
<script type="text/javascript">
  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"
</script>
<script type="text/javascript">
  src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"
</script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="css/av.css">
  <link rel="stylesheet" href="css/logout.css">
  <link rel="stylesheet" href="css/font.css">
  <script src="js/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
  <script src="js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="css/node_modules/glyphicons-only-bootstrap/css/bootstrap.min.css">
<script>
$(document).ready(function(){
       var now = new Date(),
       minDate = now.toISOString().substring(0,10);
       $('#txtdate').prop('max', minDate);
 });
</script>
<script>
$(document).ready(function(){
 var now = new Date(),
minDate = now.toISOString().substring(0,10);
 $('#txtdate1').prop('max', minDate);
 });
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
<style media="screen">
.dataTables_filter {
   width: 50%;
   float: right;
   text-align: right;
}
@font-face {
    font-family: KoHo;
    src: url(assets/KoHo-Regular.ttf);
}
body {
  font-family: 'KoHo', sans-serif;
}
#wall {
	position:relative;
	width: 100%;
	height: 250px;
	top: -16px;
	background: rgb(255,255,255);
	text-align: center;
	padding-top: 49px;
  margin-top: 40px;
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
.container1
{
background-color: yellowgreen;
}

.jumbotron {
position: relative;
padding: 40px 0;
color: #fff;
text-align: center;
text-shadow: 0 1px 3px rgba(0,0,0,.4), 0 0 30px rgba(0,0,0,.075);
background: #020031;
background: -moz-linear-gradient(45deg, #020031 0%, #6d3353 100%);
background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,#020031), color-stop(100%,#6d3353));
background: -webkit-linear-gradient(45deg, #020031 0%,#6d3353 100%);
background: -o-linear-gradient(45deg, #020031 0%,#6d3353 100%);
background: -ms-linear-gradient(45deg, #020031 0%,#6d3353 100%);
background: linear-gradient(45deg, #020031 0%,#6d3353 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#020031', endColorstr='#6d3353',GradientType=1 );
-webkit-box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
-moz-box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
box-shadow: inset 0 3px 7px rgba(0,0,0,.2), inset 0 -3px 7px rgba(0,0,0,.2);
}
/*
.jumbotron::after {
content: '';
display: block;
position: relative; /* changed by me */
top: 0;
right: 0;
bottom: 0;
left: 0;
background: url(../img/bs-docs-masthead-pattern.png) repeat center center;
opacity: .4;
}
.jumbotron {
margin-bottom: 0px;
background-image: src(images/screenshot.png);
background-position: 0% 25%;
background-size: cover;
background-repeat: no-repeat;
color: white;
text-shadow: black 0.3em 0.3em 0.3em;
}
.profile-img-card {
width: 96px;
height: 96px;
margin: 0 auto 10px;
display: block;
-moz-border-radius: 50%;
-webkit-border-radius: 50%;
border-radius: 50%;
}
.btn-signin {
/*background-color: #4d90fe; */
background-color: #ff6600;
/* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
padding: 0px;
font-weight: 700;
font-size: 14px;
height: 36px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
border-radius: 3px;
border: none;
-o-transition: all 0.218s;
-moz-transition: all 0.218s;
-webkit-transition: all 0.218s;
transition: all 0.218s;
}
.card-container.card {
width: 350px;
padding: 40px 40px;
}

.card {
background-color: #F7F7F7;
/* just in case there no content*/
padding: 20px 25px 30px;
margin: 0 auto 25px;
margin-top: 50px;
/* shadows and rounded borders */
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
border-radius: 2px;
-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.card-container.card {
width: 350px;
padding: 40px 40px;
}
/*
Free App template for Bootstrap 3
Code snippet by maridlcrmn for Bootsnipp.com
Follow me on Twitter @maridlcrmn
Image credits: unsplash.com
Image placeholders: placemi.com
*/


.mt-100 {
margin-top: 100px;
}
.mb-100 {
margin-bottom: 100px;
}

.icon {
width: 32px;
height: 32px;
text-align: center;
padding: 7px 8px;
border: 2px solid;
border-radius: 50%;
}

.header {
padding-top: 50px;
background-color: #eee;
overflow: hidden;
}
.footer {
color: #887;
background-color: #eee;
padding-top: 30px;
padding-bottom: 30px;
}

.content {
position: relative;
display: table;
width: 100%;
min-height: 100vh;
}
.pull-middle {
display: table-cell;
vertical-align: middle;
}


.phone {
position: relative;
max-width: 276px;
margin: 80px auto;
padding: 45px 9px 68px;
border: 2px solid #ddd;
border-radius: 20px;
background-color: #222;
box-shadow: 20px 20px 40px #887;
}

  .bs-example{
   margin-left: 320px;
   margin-right: 320px;
   margin-top: 50px;
  }
</style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body background="assets/new.png" style="background-repeat: no-repeat;background-size: cover;">

     <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand text-uppercase" href="#">GreenLine</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <form action="logout.inc.php" method="POST">
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><?php echo "Hey , ". "$_SESSION[u_name]"; ?></a></li>
                  <li ><a href="userHome.php">Home</a></li>
       <li class="active" style="margin-right:5px;"><a href="showResults.php">Show Results</a></li>

                    <li><button type="submit" name="submitLogOut" class="btn btn-danger navbar-btn btn-circle">Logout</button></li>
                  </form>
                </ul>
            </div>
          </div>
        </nav>
<div class="container" >
<div class="row">
              	<div class="panel">
                  	<div class="panel-heading">
                    	<i class="icon icon-chevron-up chevron"></i>

                	</div>
                  <div class="panel-content">
                    <form  action="#" method="post">
                    <center><div style="margin-top:15px;" class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                      <button type="submit" style="padding-right:50px;"  value="Date" name="All" class="btn btn-primary"><span class="glyphicon glyphicon-th"></span> All</button>
                      <button id="export">Export</button>

                        <button type="submit" style="padding-right:50px;"  value="Bus" name="Bus"  class="btn btn-primary"><span class="glyphicon glyphicon-road"></span> Bus</button>
                        <button type="submit" style="padding-right:50px;"  value="Driver" name="Driver" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Driver</button>
                        <button type="submit" style="padding-right:50px;"  value="Pump" name="Pump" class="btn btn-primary"><span class="glyphicon glyphicon-tint"></span> Pump</button>
                        <button type="submit" style="padding-right:50px; color:black;"   onclick="printDiv('printMe')"  value="Print" class="btn btn-warning"><span class="glyphicon glyphicon-print"></span> Print</button>
                      </center>
                      </div>
                    </form>

                  </div>
              </div>
              <?php if (!isset($_POST['All']) && !isset($_POST['Bus']) && !isset($_POST['Driver']) && !isset($_POST['Pump']) && !isset($_POST['bus_det']) && !isset($_POST['dt1'])
               && !isset($_POST['dt']) && !isset($_POST['dt3']) && !isset($_POST['dt2']) && !isset($_POST['pump_det'])  && !isset($_POST['driver_det'])


            ) {
              echo "
              <div style='margin-top:50px;' id='man'>
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
#1_start
/*All details from main_input*/
if (isset($_POST['All']))
     { /* select date*/
                  echo "<div class='col-lg-4 col-lg-offset-4'>
                        <div class='input-group'>
                        <form action='showResults.php' method='POST'>
                        <div class='row'>
                        <div class=col-md-5><h4>Select Starting Date</h4></div>
                        <div class=col-md-6><h4>Select Ending Date</h4></div>
                         </div>
                            <div class='row'>
                                <div class=col-md-5><input type='date' class='form-control' id='txtdate' name='start_date' style='height:40px';/></div>
                                <div class=col-md-5><input type='date' class='form-control' id='txtdate1' name='end_date' style='height:40px';/></div>
                                <div class=col-md-2><input type='submit' name ='dt' value='GO' class='btn btn-info btn-lg' style='height:40px';></div>
                              </div>
                            </span>
                      </form>
                        </div>

                    </div>

                  ";



  /*UNFILTERED LIST*/

                    $sql = "SELECT * FROM main_input;";
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
                            <th scope='col'>Distance Covered (KM)</th>
                            <th scope='col'>Challan Number</th>
                            <th scope='col'>Oil Cost</th>
                            <th scope='col'>Amount Paid</th>
                            <th scope='col'>Amount Due</th>
                            <th scope='col'>Mileage</th>
                          </tr>
                        </thead>
                        <tbody>";




                    for($i = mysqli_num_rows($result); $i > 0; $i--){

                    #$sql = "SELECT * FROM main_input WHERE driver_name = '$_POST[driver_det]';";
                    #$result2 = mysqli_query($conn,$sql);
                    #if (mysqli_num_rows($result2) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
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

                    #}
                     echo "</tbody>";
                   }


                   echo "</table>";
                   echo "</div>";
                   mysqli_close($conn);
 /*UNFILTERED LIST OF ALL INPUT*/

    }
/*ALL details datewise filtered*/
                    if (isset($_POST['dt']))
                    { $emp_query = "SELECT * FROM main_input WHERE 1 ";


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
                        mysqli_close($conn);
                }
/*datewise ALL details ends*/
#1_end

#2_start
/*bus wise details*/
if (isset($_POST['Bus']))
  {       #list of buses


                    $sql = "SELECT * FROM bus_no";
               	    $result = mysqli_query($conn, $sql);

                	   echo "
                	   <div id ='printMe' style='width: 600px;
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
                     	 echo "<center><form  action= 'showResults.php' method = 'POST'><input type='submit' style='width:250px; margin-bottom:5px;' class='btn btn-success' name = 'bus_det' value ='$test'> </form></center>";
              	       echo "<br>";
                 		 }

                 }

               echo"</div></div>";
                mysqli_close($conn);

}

/*bus details show*/
if (isset($_POST['bus_det']))
 {
               #select date
                      $_SESSION['test'] = $_POST['bus_det'];
                       echo "<h2 style='margin-left:40%;';>BUS NO - $_SESSION[test] </h2></br>";
                      echo "<div class='col-lg-4 col-lg-offset-4'>
                          <div class='input-group'>
                          <form action='showResults.php' method='POST'>
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
                               echo "</div>";
                               mysqli_close($conn);
 /*UNFILTERED LIST OF THIS DRIVER*/

}

/*bus_datewise details*/
if (isset($_POST['dt1']))
{
    #filtered details of the bus

                             echo "<h2 style='margin-left:38%;';>DETAILS OF BUS NO - $_SESSION[test] </h2></br>";
                             $emp_query = "SELECT * FROM main_input WHERE 1 and bus_no = '$_SESSION[test]' ";


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
                               echo "<center><form  action= 'showResults.php' method = 'POST'><input type='submit' style='width:250px; margin-bottom:5px;' class='btn btn-success' name = 'driver_det' value ='$test_driver'> </form></center>";
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
                      <form action='showResults.php' method='POST'>
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

                    $sql = "SELECT * FROM main_input WHERE driver_name = '$_POST[driver_det]';";
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
                   echo "</div>";
                   mysqli_close($conn);
 /*UNFILTERED LIST OF THIS DRIVER*/

}
/*DATEWISE FILTERED LIST OF DRIVER*/
                      if (isset($_POST['dt3']))
                      {
                        echo "<h2 style='margin-left:40%;';>DRIVER NAME - $_SESSION[test2] </h2></br>";

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
                         echo "<center><form  action= 'showResults.php' method = 'POST'><input type='submit' style='width:250px; margin-bottom:5px;' class='btn btn-success' name = 'pump_det' value ='$test_pump'> </form></center>";
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

                    $_SESSION['test3'] = $_POST['pump_det'];
                     echo "<h2 style='margin-left:40%;';>PUMP NAME- $_SESSION[test3] </h2></br>";
                     echo "<div class='col-lg-4 col-lg-offset-4'>
                        <div class='input-group'>
                        <form action='showResults.php' method='POST'>
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
                               echo "</div>";
                               mysqli_close($conn);
 /*UNFILTERED LIST OF THIS DRIVER*/

}
/*show_pumpwise_date details */
                    if (isset($_POST['dt2']))
                    {
 echo "<h2 style='margin-left:40%;';>PUMP NAME- $_SESSION[test3] </h2></br>";
                         $emp_query = "SELECT * FROM main_input WHERE 1 and pump_name = '$_SESSION[test3]' ";


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
                            mysqli_close($conn);

                    }
/*end pump details*/
#4_end
 ?>



</div>



</body>
</html>

<script>

$(document).ready(function(){

  $('#myTable').DataTable( {
         dom: 'Bfrtip',
         buttons: [ {
             extend: 'excelHtml5',
             customize: function( xlsx ) {
                 var sheet = xlsx.xl.worksheets['sheet1.xml'];

                 $('row c[r^="C"]', sheet).attr( 's', '2' );
             }
         } ]
     } );

});
$("#export").click(function(){
  $("#myTable").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "SomeFile" //do not include extension
  });
});
var dateControler = {
    currentDate : null
}

 $(document).on( "change", "#txtdate1",function( event, ui ) {
        var now = new Date();
        var selectedDate = new Date($(this).val());

        if(selectedDate > now) {
            $(this).val(dateControler.currentDate)
        } else {
            dateControler.currentDate = $(this).val();
        }
    });
</script>
