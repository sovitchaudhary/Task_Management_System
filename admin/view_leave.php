<?php
	session_start();
	if (isset($_SESSION['email'])) {
	include('../includes/connection.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<center><h3>All leave applications</h3></center>
	<table class="table" style="background-color: #f9d1d1;">
		<tr style="background-color: #808282;">
			<td>S.No</td>
			<td>User</td>
			<td>Subject</td>
			<td style="width:30%;">Message</td>
			<td>Status</td>
			<td>Action</td>
		</tr>
		<?php
			$sno = 1;
			$query = "select * from leaves";
			$query_run = mysqli_query($connection,$query);
			while ($row = mysqli_fetch_assoc($query_run)) {
				?>
				<tr>
					<td><?php echo $sno; ?></td>
					<?php 
						$query1 = "select name from users where uid = $row[uid]";
						$query_run1 = mysqli_query($connection,$query1);
						while ($row1 = mysqli_fetch_assoc($query_run1)) {
							?>
							<td><?php echo $row1['name']; ?></td>
							<?php
						}
					 ?>
					 <td><?php echo $row['subject']; ?></td>
					 <td><?php echo $row['message']; ?></td>
					 <td><?php echo $row['status']; ?></td>
					 <td><a href="approve_leave.php?id=<?php echo $row['lib']; ?>">Approve</a> | <a href="reject_leave.php?id=<?php echo $row['lib']; ?>">Reject</a></td>	
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
		header('Location: admin_login.php');
	}
?>