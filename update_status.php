<?php
	session_start();
	if (isset($_SESSION['email'])) {
	include('includes/connection.php'); 
	if (isset($_POST['update'])) {
		$query = "update tasks set status = '$_POST[status]' where tid = $_GET[id]";
		$query_run = mysqli_query($connection,$query);
		if ($query_run) {
			echo "<script type='text/javascript'>
			alert('Status updated successfully..');
			window.location.href = 'user_dashboard.php';
			</script>";
     	}
     	else{
     		echo "<script type='text/javascript'>
			alert('Error, Please try again..');
			window.location.href = 'user_dashboard.php';
			</script>";
     	}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update</title>

	<script src="includes/jquery.js"></script>
	<!-- Bootstrap files -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- External css file -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	 <div class="row" id="header">
	 	<div class="col-md-12">
	 		<div class="col-md-4" style="display: inline-block;">
				<h2 id="head"><b>Online Task Management System</b></h2>
			</div>
	 	</div>
	 </div>
	 <div class="row">
	 	<div class="col-md-4 m-auto"><br>
	 		<h3>Update The Task</h3><br>
	 		<?php 
	 			$query = "select * from tasks where tid = $_GET[id]";
	 			$query_run = mysqli_query($connection,$query);
	 			while($row = mysqli_fetch_assoc($query_run)){
	 		 ?>
	 		<form action="" method="post">
	 			<div class="form-group">
	 				<input type="hidden" name="id" class="form-control" value="" required>
	 			</div>
	 			<div class="form-group">
					<select class="form-control" name="status">
						<option>-select-</option>
						<option>In-Progress</option>
						<option>Complete</option>
					</select>
				</div>
				<input type="submit" class="btn btn-warning" name="update" value="Update">
	 		</form>
	 		<?php
	 			} 	
	 		 ?>
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