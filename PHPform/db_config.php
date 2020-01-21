<?php
	$server = "127.0.0.1";//"localhost";
	$username = "root";
	$password = "q]/z.q]/z.";
	$dbname = "Airline";

	// Create Connection
	$connection = new mysqli($server, $username, $password, $dbname);
	
	if (!$connection) {
		die("Database connection failed " . mysqli_connect_error());
	}
	
	
?>