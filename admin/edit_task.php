<?php
	session_start();
	if (isset($_SESSION['email'])) {
		include('../includes/connection.php'); 
		if (isset($_POST['edit_task'])) {
			$query = "update tasks set uid = $_POST[id],description = '$_POST[description]',start_date = '$_POST[start_date]',end_date = '$_POST[end_date]' where tid = $_GET[id]";
			$query_run = mysqli_query($connection,$query);
			if ($query_run) {
				echo "<script type='text/javascript'>
				alert('Task updated successfully..');
				window.location.href = 'admin_dashboard.php';
				</script>";
	     	}
	     	else{
	     		echo "<script type='text/javascript'>
				alert('Error, Please try again..');
				window.location.href = 'admin_dashboard.php';
				</script>";
	     	}
		}
	 ?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>TMS</title>
		<script src="../includes/jquery.js"></script>
		<!-- Bootstrap files -->
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<!-- External css file -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
	</head>
	<body>
		 <div class="row" id="header">
		 	<div class="col-md-12">
		 		<div class="col-md-4" style="display: inline-block;">
					<h2 id="head"><b>Task Management System</b></h2>
				</div>
		 	</div>
		 </div>
		 <div class="row">
		 	<div class="col-md-4 m-auto"><br>
		 		<h3>Edit The Task</h3><br>
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
								<label>Select User:</label>
								<select class="form-control" name="id" required>
									<option>--select--</option>
									<?php 
									    $query1 = "select uid,name from users";
									    $query_run1 = mysqli_query($connection,$query1);
									    if (mysqli_num_rows($query_run1)) {
									    	while ($row1 = mysqli_fetch_assoc($query_run1)) {
									    		?>
									    		<option value="<?php echo $row1['uid']; ?>"><?php echo $row1['name']; ?></option>
									    		<?php
									    	}
									    }
									 ?>
								</select>
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" rows="3" cols="50" name="description" placeholder="" required><?php echo $row['description']; ?></textarea>
							</div>
							<div class="form-group">
								<label>Start date:</label>
								<input type="date" class="form-control" name="start_date" value="<?php echo $row['start_date']; ?>">
							</div>
							<div class="form-group">
								<label>End date:</label>
								<input type="date" class="form-control" name="end_date" value="<?php echo $row['end_date']; ?>">
							</div><br>
							<input type="submit" class="btn btn-warning" name="edit_task" value="Update">
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
		header('Location: admin_login.php');
	}
?>