<!DOCTYPE html>
<html>
<head>
	<title>Add count</title>
	

</head>
<body>
	<form method="POST">
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

</body>
</html>
<?php 
	$username = $_POST['username'];
	$password = $_POST['password'];

	$db = pg_connect(pg_connection_string_from_database_url() );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
   
   $sql =<<<EOF
      INSERT INTO my_accounts (USERNAME, PASSWORD) VALUES ('$username', '$password');
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Table created successfully\n";
   }
   pg_close($db);
?>