<!DOCTYPE html>
<html>
<head>
	<title>Add count</title>
	

</head>
<body>
	<form method="POST" action="adduser.php">
		<table>
			<tr>
				<td>Username</td>
				<td>
					<input type="text" name="username">		
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="text" name="password">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Sign up">
				</td>
			</tr>
		</table>
	</form>
	<?php 
	function pg_connection_string_from_database_url() {
	  extract(parse_url($_ENV["DATABASE_URL"]));
	  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

		$db = pg_connect(pg_connection_string_from_database_url() );
	   if(!$db){
	      echo "Error : Unable to open database\n";
	   } else {
	      echo "Opened database successfully\n";
	   }
	   
	   $sql = "INSERT INTO my_accounts (USERNAME, PASSWORD) VALUES ('$username', '$password')";
	   $ret = pg_query($db, $sql);
	   if(!$ret){
	      echo pg_last_error($db);
	   } else {
	      echo "Add user successfully\n";
	   }
	   pg_close($db);
	?>

</body>
</html>
