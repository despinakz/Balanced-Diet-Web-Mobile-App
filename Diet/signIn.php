<?php

	//Include the file which create the connection with our DB 'diet'
	include 'config.php';
	
	//Get the values which sended via ajax call (from SignIn form)
	$name = $_POST['name']; // get the value of name input field & there is no need for escape
	$email = mysqli_real_escape_string($conn, $_POST['email']); // get the value of email input field & escape characters (e.g single quote) in order to avoid injections & errors
	$username = mysqli_real_escape_string($conn, $_POST['username']); // get the value of username input field &//escape characters (e.g single quote) in order to avoid injections & errors
	$password = $_POST['password']; // get the value of password input field & there is no need for escape
	
	
	//Write and execute the SQL Selection based on username (which is unique on each record)
	$sqlSELECT = "SELECT username FROM users WHERE username='".$username."'";
	$resultSELECT = $conn->query($sqlSELECT);
	
	if ( $resultSELECT->num_rows > 0) //if SQL Select has results to return
	{ 
		while ($row = $resultSELECT->fetch_assoc()) 
		{
			$usernameExists = 1; //the username exists in DB
			echo $usernameExists; //return that information
		}	
	}
	else //if the username does not exists in DB so make a SQL Insertion
	{ 
	    //use MD5 hash function (32bit) to encrypted the password --> ensurance of privacy and security 
		$hashedPassword = md5($password); //this password is going to be inserted to the DB
	
		//Write and execute the SQL Insertion 
		$sql = "INSERT INTO users (username,password,name,email) VALUES ('$username','$hashedPassword','$name','$email')";
		$result = $conn->query($sql);
		
		
		if ($result === TRUE) //if the INSERTION excecuted successfully
		{
			//return a successfull message
			echo '<p class="text-success">Your registration has been successfully completed <i class="fa fa-smile-o" aria-hidden="true"></i></p>';
		}
		else 
		{
			//return an unsuccessfull message
			echo '<p class="text-danger">Unfortunately something went wrong with your registration<i class="fa fa-frown-o" aria-hidden="true"></i></p>'
			
			//show the SQL error that occured
			.$conn -> error; 
		}
	}
	
	
	//close DB connection
	$conn->close();
	
?>