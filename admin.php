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


if(!isset($_SESSION['a_id'])){
    header("location:index.php?admin=notLoggedIn");
}
$sql = "SELECT * FROM main_input where dates = CURDATE()";
$result = mysqli_query($conn, $sql);
$todayEntry=mysqli_num_rows($result);
// else{

// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <script src="js/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
  <script src="js/bootstrap-datepicker.js"></script>
	<link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/logout.css">
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
  @font-face {
      font-family: KoHo;
      src: url(assets/KoHo-Regular.ttf);
  }
  body {
    font-family: 'KoHo', sans-serif;
  }
  .progress{
    width: 150px;
    height: 150px;
    line-height: 150px;
    background: none;
    margin: 0 auto;
    box-shadow: none;
    position: relative;
}
.progress:after{
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 12px solid #fff;
    position: absolute;
    top: 0;
    left: 0;
}
.progress > span{
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
}
.progress .progress-left{
    left: 0;
}
.progress .progress-bar{
    width: 100%;
    height: 100%;
    background: none;
    border-width: 12px;
    border-style: solid;
    position: absolute;
    top: 0;
}
.progress .progress-left .progress-bar{
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left;
}
.progress .progress-right{
    right: 0;
}
.progress .progress-right .progress-bar{
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    -webkit-transform-origin: center right;
    transform-origin: center right;
    animation: loading-1 1.8s linear forwards;
}
.progress .progress-value{
    width: 90%;
    height: 90%;
    border-radius: 50%;
    background: #44484b;
    font-size: 24px;
    color: #fff;
    line-height: 135px;
    text-align: center;
    position: absolute;
    top: 5%;
    left: 5%;
}
.progress.blue .progress-bar{
    border-color: #049dff;
}
.progress.blue .progress-left .progress-bar{
    animation: loading-2 1.5s linear forwards 1.8s;
}
.progress.yellow .progress-bar{
    border-color: #fdba04;
}
.progress.yellow .progress-left .progress-bar{
    animation: loading-3 1s linear forwards 1.8s;
}
.progress.pink .progress-bar{
    border-color: #ed687c;
}
.progress.pink .progress-left .progress-bar{
    animation: loading-4 0.4s linear forwards 1.8s;
}
.progress.green .progress-bar{
    border-color: #1abc9c;
}
.progress.green .progress-left .progress-bar{
    animation: loading-5 1.2s linear forwards 1.8s;
}
@keyframes loading-1{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
    }
}
@keyframes loading-2{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(144deg);
        transform: rotate(144deg);
    }
}
@keyframes loading-3{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }
}
@keyframes loading-4{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(36deg);
        transform: rotate(36deg);
    }
}
@keyframes loading-5{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(126deg);
        transform: rotate(126deg);
    }
}
@media only screen and (max-width: 990px){
    .progress{ margin-bottom: 20px; }
}

  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;


  }
  .box
  {
   width:1270px;
   padding:20px;
   background-color:#fff;
   border:1px solid #ccc;
   border-radius:5px;
   margin-top:25px;
   box-sizing:border-box;
  }
  </style>
</head>
<body background="assets/wpp.png" style="background-repeat: no-repeat;background-size: cover;" >
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					GreenLine
				</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav navbar-right">
          <li class="active"><a><?php echo "Hey, ". "$_SESSION[a_name]"; ?></a></li>
					<li class="active"><a href="admin.php" style="cursor: pointer;">Home</a></li>
                    <li><a href="adminResults/showAdminResults.php" style="cursor: pointer;">Show Details</a></li>
                    <li>
                        <form action="logout.inc.php" method="POST">
                            <li style="margin-right:5px;"><button type="submit" name="submitLogOut" class="btn btn-danger navbar-btn btn-circle">Logout</button></li>
                        </form>
                    </li>

					</ul>
				</div>
			</div>
		</nav>
		<div class="container-fluid main-container">
			<div class="col-md-2 sidebar">
				<ul class="nav nav-pills nav-stacked">

					<li class="active"><a>Data</a></li>
					<li><a href="insertBus/addBus.php">BUS</a></li>
					<li><a href="insertDriver/addDriver.php">DRIVER</a></li>
					<li><a href="insertRoute/addRoute.php">ROUTE</a></li>
					<li><a href="insertPump/addPump.php">PUMP</a></li>
				</ul>
				<ul class="nav nav-pills nav-stacked">

					<li class="active"><a>Add / Edit / Remove</a></li>
					<li><a href="insertAdmin/addAdmin.php">Admin</a></li>
          <li><a href="insertUser/addUser.php">User</a></li>
				</ul>
			</div>
			<div class="col-md-10.5 content">

<section id="carousel">
 <div class="container">
	 <div class="row">
		 <div class="col-md-8 col-md-offset-2">
							 <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
			 <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">

				 <div class="carousel-inner">
					 <div class="active item">
					<center>	 <blockquote>
							 <h1>GreenLine</h1>
                        <footer class="blockquote-footer">Welcome to admin page of GreenLine<br></br>
                        <br><b>Total number of entries done today!!</b></br></footer>
						 </blockquote></center>

					 </div>
				 </div>
			 </div>
       <div class="progress blue">

           <span class="progress-left">
               <span class="progress-bar"></span>
           </span>

           <span class="progress-right">
               <span class="progress-bar"></span>
           </span>

<div class="progress-value"><?php echo "$todayEntry"; ?></div>
       </div>
		 </div>

	 </div>

   <div class="row">

   <div class="col-md-12 col-sm-10">



        </div>

    </div>
 </div>
</section>
			</div>

		</div>

</body>
</html>
