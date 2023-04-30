<?php
	session_start();
	if (isset($_SESSION['email'])) { 
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h3>Apply leave</h3><br>
	<div class="row">
		<div class="col-md-6">
			<form action="" method="post">
				<div class="form-group">
					<input type="text" class="form-control" name="subject" placeholder="Enter Your Subject">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" cols="50" name="message" placeholder="Type message ....">
					</textarea>
				</div>
				<input type="submit" class="btn btn-warning" name="submit_leave">
			</form>
		</div>
	</div>
</body>
</html>
<?php
	}
	else{
		header('Location: user_login.php');
	}
?>