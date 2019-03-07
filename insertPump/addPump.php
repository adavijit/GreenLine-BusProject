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
if(!isset($_SESSION['a_id'])){
    header("location:../index.php?admin=notLoggedIn");
}
// else{

// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/font-awesome1.min.css">
<script src="../js/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="../css/bootstrap-datepicker.css" />
<script src="../js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="../css/node_modules/glyphicons-only-bootstrap/css/bootstrap.min.css">
    <script type="text/javascript">
        function printDiv(divName){
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

    <link rel="stylesheet" href="../css/logout.css">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
  @font-face {
      font-family: KoHo;
      src: url(../assets/KoHo-Regular.ttf);
  }
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
     font-family: 'KoHo', sans-serif;
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
<body background="../assets/new.png" style="background-repeat: no-repeat;background-size: cover;">
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
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
					<li><a href="../admin.php" style="cursor: pointer;">Home</a></li>
                    <li><a href="../adminResults/showAdminResults.php" style="cursor: pointer;">Show Details</a></li>
                    <li>
                        <form action="../logout.inc.php" method="POST">
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
					<li><a href="../insertBus/addBus.php">BUS</a></li>
					<li><a href="../insertDriver/addDriver.php">DRIVER</a></li>
					<li><a href="../insertRoute/addRoute.php">ROUTE</a></li>
					<li><a href="#"  style="color: black;">PUMP</a></li>
				</ul>
				<ul class="nav nav-pills nav-stacked">
          <li class="active"><a>Add / Edit / Remove</a></li>
          <li><a href="../insertAdmin/addAdmin.php">Admin</a></li>
          <li><a href="../insertUser/addUser.php">User</a></li>
				</ul>
			</div>
			<div class="col-md-10.5 content">
	            <div class="panel panel-default">
								<div class="table-responsive">
								<br />
								 <div align="center">
									<button type="button" name="add" id="add" class="btn btn-info">Add</button>
                                     <button type="submit" style="padding-right:50px; color:black;" onclick="printDiv('printMe')" value="Print" name="Pump" class="btn btn-warning"><span class="glyphicon glyphicon-print"></span>  Print</button>
                                     <div id="alert_message"></div>
                                     <div id="printMe">
								    <table id="user_data" class="table table-bordered table-striped">
                                        <thead>
                                         <tr>
                                            <th>Pump name</th>
                                            <th>Pump address</th>
                                            <th>Insert / Delete</th>
                                         </tr>
                                        </thead>
								    </table>
                                 </div>
                                 </div>

								</div>

	            </div>
			</div>

		</div>

</body>
</html>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetchPump.php",
     type:"POST"
    }
   });
  }

  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"updatePump.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
     fetch_data();
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
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });

  $(document).on('click', '#insert', function(){
   var pump_name = $('#data1').text();
   var pump_address = $('#data2').text();

   if(pump_name != '' )
   {
    $.ajax({
     url:"insertPump.php",
     method:"POST",
     data:{pump_name:pump_name, pump_address:pump_address},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
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

  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"deletePump.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });
</script>
