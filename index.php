<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap-4.1.1-dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/bootstrap.min.css">

     <!-- jQuery library -->
     <script src="js/jquery.min.js"></script>

     <!-- Latest compiled JavaScript -->
     <script src="js/bootstrap.min.js"></script>
     <script src="js/0.js"></script>
    <link rel="stylesheet" href="css/av.css">
    <link rel="stylesheet" href="css/bd.css">
    <link rel="stylesheet" href="css/logout.css">
    <link rel="stylesheet" href="css/font.css">
    <title>Document</title>
</head>
	<body background="assets/wp2.png">
		<center><img src="assets/greenline.png" style="margin-top:100px;" alt="" width="370" height="250"></center>

	<nav class="main-nav">

	<ul style="margin-top:100px; font-size: 20px;">
		<li><a  href="#" data-target="#admin" data-toggle="modal">Admin</a></li>
		<li><a  href="#0" data-target="#operator" data-toggle="modal">Operator</a></li>
	</ul>

	<!-- admin login-->
	<div class="modal fade" id="admin">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-center">
					<span>
					<img src="assets/admin.png" width="60" height="60"><br><span class="logo">Admin signIN</span>
				</div>
				<div class="modal-body log">
					<form action="admin.inc.php" method="POST">
						<div class="row">
							<div class="col-md-5"> <span class="option">Admin loginID</span></div>

							<div class="col-md-7 place"><input type="text" placeholder="Enter your ID" name="adminID" class="place"></div>
						</div>
						<div class="row">
							<div class="col-md-5"><span class="option">Admin Password<span></div>

							<div class="col-md-7"><input type="password" placeholder="Enter your password" name="passAD" class="place"></div>
						</div>
						<div class="row">
							<div class="col-md-4"></div>

							<div class="col-md-4 btn btn-success">
								<button class="log-in" type="submit" name="adSubmitlogIn">Log in</button>
							</div>

						</div>
<!--						<span class="psw">Forgot password?</span>-->

					</form>
				</div>
				<div class="modal-footer">


					<div class="row">
						<form action="index.php" method ="POST">
					<div class="col-md-11"><input type="submit" name="" value="CANCEL"class="btn btn-danger"></div>
					</form>
				</div></div>
			</div>
		</div>
	</div>
	<!-- admin login ends-->

	<!-- operator login-->
	<div class="modal fade" id="operator">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-center">
					<span>
					<img src="assets/admin.png" width="60" height="60"><br><span class="logo">Operator signIN</span>
				</div>
				<div class="modal-body log">
					<form action="login.inc.php" method="POST">
						<div class="row">
							<div class="col-md-5"> <span class="option">Operator loginID</span></div>

							<div class="col-md-7 place"><input type="text" placeholder="Enter your ID" name="operatorID" class="place"></div>
						</div>
						<div class="row">
							<div class="col-md-5"><span class="option">Operator Password<span></div>

							<div class="col-md-7"><input type="password" placeholder="Enter your password" name="passOP" class="place"></div>
						</div>
						<div class="row">
							<div class="col-md-4"></div>

							<div class="col-md-4 btn btn-success">
								<button class="log-in" type="submit" name="submitlogIn">Log in</button>
							</div>
                        </div>
<!--						<span class="psw">Forgot password?</span>-->

					</form>
				</div>
				<div class="modal-footer">


					<div class="row">
						<form action="index.php" method ="POST">
					<div class="col-md-11"><input type="submit" name="" value="CANCEL"class="btn btn-danger"></div>
					</form>
				</div></div>
			</div>
		</div>
	</div>
	<!-- operator login ends-->
</nav>
<!--<img src="assets/bus1.png" style="margin-top:180px; margin-left: 100px;" alt="" width="280" height="190">-->

	</body>
</html>
