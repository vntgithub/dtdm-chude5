<!DOCTYPE html>
<html>
<head>
	<title>Vo Nhat Trieu B1706657</title>
</head>
<body>
	<form method="GET" action="">
		<table>
			<tr>
				<td>Ho ten</td>
				<td>
					<input type="text" name="name">		
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
					<input type="text" name="email">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="submit">
				</td>
			</tr>
			<tr>
				<td>
					<a href="./list_acount.php">Acount list</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="./add_acount.php">Add acount</a>
				</td>
			</tr>
		</table>
	</form>
	<?php 
		echo "Chao ban " . $_GET['name'] . ", email cua ban la: " . $_GET['email'];
 	?>
</body>
</html>