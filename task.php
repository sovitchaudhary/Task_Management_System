<?php
	session_start();
	if (isset($_SESSION['email'])) {
	include('includes/connection.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- jQuery file -->
	<script src="includes/jquery.js"></script>
	<!-- Bootstrap files -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- External css file -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	
</head>
<body>
	<center><h3>Yours Tasks</h3></center>
	<table class="table" style="background-color: #808282;width: 68vw;">
		<tr>
			<th>S.No</th>
			<th>Task ID</th>
			<th>Description</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		<?php
			$query = "select * from tasks where uid = $_SESSION[uid]"; 
			$sno = 1;
			$query_run = mysqli_query($connection,$query);
			while($row = mysqli_fetch_assoc($query_run)){
				?>
				<tr style="background-color: #f9d1d1;">
					<td><?php echo $sno; ?></td>
					<td><?php echo $row['tid']; ?></td>
					<td><?php echo $row['description']; ?></td>
					<td><?php echo $row['start_date']; ?></td>
					<td><?php echo $row['end_date']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td><a href="update_status.php?id=<?php echo $row['tid'];?>">Update</a></td>
				</tr>
				<?php
				$sno = $sno + 1;
			}
		 ?>
	</table>

</body>
</html>
<?php
	}
	else{
		header('Location: user_login.php');
	}
?>