<?php 	
	session_start();
	if (isset($_SESSION['email'])) {
	include('includes/connection.php');
	if (isset($_POST['submit_leave'])) {
		// code...
		$query = "insert into leaves values(null,$_SESSION[uid],'$_POST[subject]','$_POST[message]','No Action')";
		$query_run = mysqli_query($connection,$query);
		if ($query_run) {
     		echo "<script type='text/javascript'>
			alert('Leave Apply successfully..');
			window.location.href = 'user_dashboard.php';
			</script>";
     	}
     	else{
     		echo "<script type='text/javascript'>
			alert('Sorry, Please try again..');
			window.location.href = 'user _dashboard.php';
			</script>";
		}	
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User dashboard</title>
	<!-- jQuery file -->
	<script src="includes/jquery.js"></script>
	<!-- Bootstrap files -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- External css file -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script type="text/javascript">
		$(document).ready(function(){
			$("#update_task").click(function(){
				$("#right_sidebar").load("task.php");
			});
		});

		$(document).ready(function(){
			$("#manage_task").click(function(){
				$("#right_sidebar").load("manage_task.php");
			});
		});

		$(document).ready(function(){
			$("#apply_leave").click(function(){
				$("#right_sidebar").load("leaveForm.php");
			});
		});

		$(document).ready(function(){
			$("#leave_status").click(function(){
				$("#right_sidebar").load("leave_status.php");
			});
		});
	</script>
</head>
<body>
	<!-- header section start -->
			<nav class="navbar navbar-inverse" id="header">
				<div class="container-fluid">
					<div class="navbar-header">
						<h2 class="navbar-brand  active"><b>Online Task Management System</b></h2>
					</div>
				    <div class="" style="float: right;">
							<!-- <b>Email:</b> <?php echo $_SESSION['email']; ?> -->
							<span style="margin-left: 25px;"><?php echo $_SESSION['name']; ?></span>
							<a href=""><i class="fa fa-user-circle-o" style="font-size:25px;color: black; margin-left: 10px;"></i></a>
						</div>
				</div>
	        </nav>
        <!-- header section end-->
	<div class="row">
		<div class="col-md-2" id="left_sidebar">
			<table class="table">
				<tr>
					<td style="text-align: center;">
						<a href="user_dashboard.php" type="button" id="logout_link">Dashboard</a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<a type="button" class="link" id="update_task" style="text-decoration: none;">Update task</a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<a type="button" class="link" id="apply_leave" style="text-decoration: none;">Apply leave</a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<a type="button" class="link" id="leave_status" style="text-decoration: none;">Leave status</a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<a href="logout.php" type="button" id="logout_link">Logout</a>
					</td>
				</tr>
			</table>
		</div>
		<div class="col-md-8" id="right_sidebar">
			<h3 style="color:red"><b><u>Instructions for Employees :</u></b></h3>
			<ul style="line-height: 2.5em; font-size: 1.2em; list-style-type: none;">
				<li>1. All the employee should mark their attendence daily.</li>
				<li>2. Everyone must complete the task assigned to them.</li>
				<li>3. Kindly maintain decorum of the office.</li>
				<li>4. Keep office and your area neat and clean.</li>
			</ul>
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