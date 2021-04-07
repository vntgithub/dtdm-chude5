<?php 
		$username = $_POST['username'];
		$password = $_POST['password'];
		echo $username;
		echo $password;
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