<?php
//index.php
$connect = new PDO("mysql:host=localhost;dbname=project", "root", "");
function fill_unit_select_route($connect)
{
 $output = '';
 $query = "SELECT * FROM bus_route ORDER BY bus_route ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["bus_route"].'">'.$row["bus_route"].'</option>';
 }
 return $output;
}
function fill_unit_select_busno($connect)
{
 $output = '';
 $query = "SELECT * FROM bus_no ORDER BY bus_no ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["bus_no"].'">'.$row["bus_no"].'</option>';
 }
 return $output;
}
function fill_unit_select_driver($connect)
{
 $output = '';
 $query = "SELECT * FROM driver ORDER BY driver_name ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["driver_name"].'">'.$row["driver_name"].'</option>';
 }
 return $output;
}
function fill_unit_select_pump($connect)
{
 $output = '';
 $query = "SELECT * FROM pump_details ORDER BY pump_name ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["pump_name"].'">'.$row["pump_name"].'</option>';
 }
 return $output;
}
session_start();
if(!isset($_SESSION['u_id'])){
    header("location:index.php?user=notLoggedIn");
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>User Home</title>
  <script src="js/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
  <script src="js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="css/font.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
<link rel="stylesheet" href="css/bs3.css">
<link rel="stylesheet" href="css/node_modules/glyphicons-only-bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/logout.css">
     <style type="text/css">
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
       @font-face {
           font-family: KoHo;
           src: url(assets/KoHo-Regular.ttf);
       }
       body {
         font-family: 'KoHo', sans-serif;
       }
   </style>
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
                <li class="active"><a href="userHome.php">Home</a></li>
     <li><a href="showResults.php">Show Results</a></li>

                  <li><button type="submit" name="submitLogOut" class="btn btn-danger navbar-btn btn-circle">Logout</button></li>
                </form>
              </ul>
          </div>
        </div>
      </nav>
  <br />
 <span ><center><h2 style="margin-top:50px;">ENTER DETAILS</h2></center></span>
 <div class="bs-example">

   <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "project";
     //Create connection
     $conn = mysqli_connect($servername, $username, $password, $dbname);
     if(isset($_POST['insert']))
     {
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
          $sql= "SELECT distance_covered FROM main_input WHERE bus_no='$bus_no' and pump_name='$pump_name' ORDER BY id DESC LIMIT 1";
           $result = mysqli_query($conn,$sql);
          $print_data = mysqli_fetch_row($result);
          $oil_cost = $fuel_taken* $rate_on_date;
          $milageTotal = ($distance_covered - $print_data[0])/$fuel_taken;
          if ($amount_paid=='') {
            $amount_paid=0;
          }
          $due_payment= $oil_cost - $amount_paid;
         $query = "INSERT INTO main_input
           (dates, bus_route, bus_no, driver_name,pump_name,fuel_taken, rate_on_date , distance_covered, chalan_no , amount_paid,milage,oil_cost,due_payment)
           VALUES ('$dates', '$bus_route', '$bus_no', '$driver_name' , '$pump_name' , '$fuel_taken' ,'$rate_on_date', '$distance_covered' ,'$chalan_no' ,'$amount_paid', '$milageTotal',$oil_cost,$due_payment)
           ";
       if(mysqli_query($conn, $query)){
         echo "<div id='myElem'  class='alert alert-success'>Data Inserted</div>";
       }
       else{
         echo "<div id='myElem'  class='alert alert-danger'>Something wrong</div>";
       }
     }
      ?>
 	<form method="post" action="#">
         <div class="row">
             <div class="col-xs-4">Select Date
                 <div class="input-group">
                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                     <input type="date" id='txtDate'  style="width:200px;" name="dates" class="form-control item_unit" >
                 </div>
            </div>
            <div class="col-xs-4">Select Bus Route
                 <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-road"></span></span>
                     <select name="bus_route" style="width:200px;" class="form-control item_unit"><option value=""></option><?php echo fill_unit_select_route($connect); ?></select>
                 </div>
            </div>
            <div class="col-xs-4">Select Bus Number
                 <div class="input-group">
                       <span class="input-group-addon"><span class="glyphicon glyphicon-sort-by-order"></span></span>
                     <select name="bus_no"  class="form-control item_unit"><option value=""></option><?php echo fill_unit_select_busno($connect); ?></select>
            </div>
            </div>
            </div>
            <div class="row" style="margin-top:40px;">
            <div class="col-xs-4">Select Driver
                 <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                     <select name="driver_name" style="width:200px;" class="form-control item_unit"><option value=""></option><?php echo fill_unit_select_driver($connect); ?></select>
                 </div>
            </div>
            <div class="col-xs-4">Select Pump
                 <div class="input-group">
                     <span class="input-group-addon"><span class="glyphicon glyphicon-text-background"></span></span>
                     <select name="pump_name" style="width:200px;" class="form-control item_unit"><option value=""></option><?php echo fill_unit_select_pump($connect); ?></select>
                 </div>
            </div>
            <div class="col-xs-4">Enter Fuel(LTR)
                 <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-scale"></span></span>
                    <input name="fuel_taken"  class="form-control"  required="true" value="" type="text">
                 </div>
            </div>
         </div>
         <div class="row" style="margin-top:40px;">
             <div class="col-xs-4">Enter Today's Rate
                 <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
                    <input  name="rate_on_date" style="width:200px;"   class="form-control" required="true" value="" type="text">
                 </div>
             </div>
             <div class="col-xs-4">Enter Distance
                 <div class="input-group">
                       <span class="input-group-addon"><span class="glyphicon glyphicon-scale"></span></span>
                     <input name="distance_covered"  style="width:200px;" class="form-control" required="true" type="text">
                 </div>
             </div>
             <div class="col-xs-4">Enter Challan Number
                 <div class="input-group">
                       <span class="input-group-addon"><span class="glyphicon glyphicon-sort-by-order"></span></span>
                    <input  name="chalan_no" class="form-control" required="true"  value="" type="text">
                 </div>
             </div>
         </div>
         <div class="input-group" style="margin-top:40px;">
             <span class="input-group-addon">$</span>
            <input   name="amount_paid"  class="form-control" placeholder="Amount Paid" value="" type="text">
         </div>
         <button type="submit" style="margin-left:43%; margin-top: 20px;" name="insert" class="btn btn-primary" name="button">Submit</button>
     </form>
     <hr>
 </div>
 </body>
</html>
   <script>
   $("#myElem").show().delay(2000).fadeOut();
   var dateControler = {
       currentDate : null
   }
    $(document).on( "change", "#txtDate",function( event, ui ) {
           var now = new Date();
           var selectedDate = new Date($(this).val());

           if(selectedDate > now) {
               $(this).val(dateControler.currentDate)
           } else {
               dateControler.currentDate = $(this).val();
           }
       });
   </script>
