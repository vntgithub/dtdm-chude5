<!DOCTYPE html>
<html>
<head>
	<title>chude5</title>
</head>
<body>
	<form method="GET">
		<label>Ho ten</label>
		<input type="text" name="name">
		<br>
		<label>Email</label>
		<input type="text" name="email">
	</form>
</body>
	<?php  
		echo "Chao ban $GET['name'], email cua ban la: $GET['email']";
	?>
</html>