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
	<title></title>
</head>
<body>
	<center>
		<h3>Your Leave Application</h3>
	</center><br>
	<table class="table" style="background-color: #808282; widows: 80vw;">
		<tr>
			<th>S.No</th>
			<th>Subject</th>
			<th>Message</th>
			<th>Status</th>
		</tr>
		<?php
			$sno = 1;
			$query = "select * from leaves where uid = $_SESSION[uid]";
			$query_run = mysqli_query($connection,$query);
			while ($row = mysqli_fetch_assoc($query_run)) {
			 	?>
			 	<tr style="background-color: #f9d1d1;">
			 		<td><?php echo $sno; ?></td>
			 		<td><?php echo $row['subject']; ?></td>
			 		<td><?php echo $row['message']; ?></td>
			 		<td><?php echo $row['status']; ?></td>
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