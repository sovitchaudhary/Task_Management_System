<?php
	session_start();
	include('../includes/connection.php');
	if(isset($_POST['adminLogin'])) {
		$query = "select email,password,name from admins where email = '$_POST[email]' AND password = '$_POST[password]'";
		$query_run = mysqli_query($connection,$query);
		if(mysqli_num_rows($query_run)){
			while($row = mysqli_fetch_assoc($query_run)){
				$_SESSION['email'] = $row['email'];
				$_SESSION['name'] = $row['name'];

			}
			echo "<script type='text/javascript'>
			window.location.href = 'admin_dashboard.php';
			</script>";
		}
		else{
			echo "<script type='text/javascript'>
			alert('Please enter correct email and password!');
			window.location.href = 'admin_login.php';
			</script>";
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin login</title>
	<!-- jQuery file -->
	<script src="../includes/jquery.js"></script>
	<!-- Bootstrap files -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<!-- External css file -->
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 m-auto" id="user_login_page">
				<form action="" method="post">
					<center><h3>Admin Login</h3></center>
					<div class="mb-3">
						<label class="form-label">Email address</label>
						<input type="email" name="email" class="form-control" id="" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" name="password" class="form-control" id="" required>
					</div>
					<center>
						<button type="submit" name="adminLogin" class="btn btn-primary">Login</button>
					</center>
				</form>
				<br>
				<button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
		              type="submit"><i class="fab fa-google me-2"></i><a href="https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri=YOUR_REDIRECT_URI&client_id=YOUR_CLIENT_ID&scope=SCOPE"> Sign in with google</a></button>
		            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
		              type="submit"><i class="fab fa-facebook-f me-2"></i><a href="https://www.facebook.com/login/"> Sign in with facebook</a></button>
				<center><a href="../index.php" class="btn btn-danger">Go to Home</a></center>
			</div>
		</div>
</body>
</html>