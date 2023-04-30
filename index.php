<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OTMS</title>
	<!-- jQuery file -->
	<script src="includes/jquery.js"></script>
	<!-- Bootstrap files -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- External css file -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<!-- header section start -->
			<nav class="navbar navbar-inverse" id="header">
				<div class="container-fluid">
					<div class="navbar-header">
						<h2 class="navbar-brand  active"><b>Online Task Management System</b></h2>
					</div>
				</div>
	        </nav>
        <!-- header section end-->

		<div class="row" style="margin-top: 10px;">
			<div class="col-md-6 m-auto" id="home_page">
				<center>
				<h3>Choose login role ?</h3><br>
				<a href="user_login.php" class="btn btn-success" style="margin-right: 20px;">User Login</a>
				<a href="admin/admin_login.php" class="btn btn-info">Admin Login</a>
				</center><br>
				<center>
					Are You a New User? <a href="registration.php">register</a>
				</center>
			</div>
		</div>
</body>
</html>