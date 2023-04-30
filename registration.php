<?php
	include('includes/connection.php');
	if(isset($_POST['userRegistration'])) {
		$query = "insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile])";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
			echo "<script type='text/javascript'>
			alert('User registered successfully..');
			window.location.href = 'index.php';
			</script>";
		}
		else{
			echo "<script type='text/javascript'>
			alert('Error... Plz try again.');
			window.location.href = 'registration.php';
			</script>";
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<!-- jQuery file -->
	<script src="includes/jquery.js"></script>
	<!-- Bootstrap files -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- External css file -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 m-auto">
				<form action="" method="post">
					<center><h3>Registration Form</h3></center>
                    <div class="mb-3">
						<label class="form-label">Username</label>
						<input type="text" name="name" class="form-control" placeholder="Enter your username" required>
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Email address</label>
						<input type="email" name="email" class="form-control" id="" placeholder="Enter your email" required >
					</div>
					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Password</label>
						<input type="password" name="password" class="form-control" id="" placeholder="Enter your password" required>
					</div>
                    <div class="mb-3">
						<label class="form-label">Phone No.</label>
						<input type="tel" name="mobile" class="form-control" placeholder="Phone number">
					</div>
					<center>
						<button type="submit" name="userRegistration" class="btn btn-primary">Register</button>
					</center>
				</form>
				<br>
				<center><a href="index.php" class="btn btn-danger">Go to Home</a></center>
			</div>
		</div>
</body>
</html>
