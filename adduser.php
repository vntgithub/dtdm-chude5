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
	   echo $sql;
	   $ret = pg_query($db, $sql);
	   if(!$ret){
	      echo pg_last_error($db);
	   } else {
	      echo "Add user successfully\n";
	   }
	   pg_close($db);
	?>