<?php
	
	// This file is very useful for connection with our DB without writting the same code & again in different php files.
	// We just include this file to other files where is necessary.
	
	$hostname = "localhost"; 
	$username = "root"; 
	$password = ""; 
	$dbname = "diet";
    
	$conn = new mysqli($hostname , $username, $password, $dbname);
    if ($conn->connect_error) { 
		die("Connection failed: " . $conn->connect_error); 
	}
?>