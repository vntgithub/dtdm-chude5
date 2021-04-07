<!DOCTYPE html>
<html>
<head>
	<title>List acount</title>
	<style type="text/css">
		table, tr, td, th {
			border: 1px solid #000;
		}
	</style>
</head>
<body>
	<h1>List acount</h1>
	<table>
		<tr>
			<th>Username</th>
			<th>Pass word</th>
		</tr>
		<tr>
			<td>acount1</td>
			<td>acount1</td>
		</tr>
		<tr>
			<td>acount2</td>
			<td>acount2</td>
		</tr>
		<?php 
		function pg_connection_string_from_database_url() {
		  extract(parse_url($_ENV["DATABASE_URL"]));
		  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
		}
			$db = pg_connect(pg_connection_string_from_database_url() );
		    if(!$db){
		      echo "Error : Unable to open database\n";
		   	} else {
		      echo "Opened database successfully\n";
		   	}
		   
		   $sql =<<<EOF
		      SELECT * FROM my_accounts;
		EOF;

		   $ret = pg_query($db, $sql);
		   if(!$ret){
		      echo pg_last_error($db);

		   } else {
		   		while($row = pg_fetch_row($ret)) {
			      echo "
			      	<tr>
						<td>". $row[0] ."</td>
						<td>". $row[1] ."</td>
					</tr>
			      ";
			     
  				 }
		      echo "Fetch data successfully\n";
		   }
		   pg_close($db);
		 ?>
	</table>
</body>
</html>