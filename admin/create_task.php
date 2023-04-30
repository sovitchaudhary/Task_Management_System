<?php
 session_start();
	if (isset($_SESSION['email'])) { 
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<h3>Create a new Task</h3>
	<div class="row">
		<div class="col-md-6">
			<form action="" method="post">
				<div class="form-group">
					<label>Select User:</label>
					<select class="form-control" name="id">
						<option>--select--</option>
						<?php 
						    include('../includes/connection.php');
						    $query = "select uid,name from users";
						    $query_run = mysqli_query($connection,$query);
						    if (mysqli_num_rows($query_run)) {
						    	while ($row = mysqli_fetch_assoc($query_run)) {
						    		?>
						    		<option value="<?php echo $row['uid']; ?>"><?php echo $row['name']; ?></option>
						    		<?php
						    	}
						    }
						 ?>
					</select>
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" rows="3" cols="50" name="description" placeholder=""></textarea>
				</div>
				<div class="form-group">
					<label>Start date:</label>
					<input type="date" class="form-control" name="start_date">
				</div>
				<div class="form-group">
					<label>End date:</label>
					<input type="date" class="form-control" name="end_date">
				</div><br>
				<input type="submit" class="btn btn-warning" name="create_task" value="Create">
			</form>
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