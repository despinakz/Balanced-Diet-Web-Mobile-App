<?php
	session_start(); //this method call is useful for set and get SESSION values
	
	//Include the file which create the connection with our DB 'diet'
	include 'config.php';
	
	//Get the values which sended via ajax call (from Log-In form)
	$_SESSION['username'] = mysqli_real_escape_string($conn, $_POST['username']); //escape characters (e.g single quote) in order to avoid injections & errors
	$password = $_POST['password']; //there is no need for escape
	
	// This is a string that is going to be returned as an ajax-call response
	$outputMessage = '';
	
	
	
	//Write and execute the SQL Selection based on username which user wrote in username input field
	$sql = "
			SELECT username, password, name
			FROM users
			WHERE username='".$_SESSION['username']."'
		   ";
	$res = $conn->query($sql);
	
	if ( $res->num_rows > 0) //if SQL Select has results to return
	{ 
		while ($row = $res->fetch_assoc()) //loop in DB records
		{
			if ( md5($password) == $row['password'] ) //if hashed password (which user wrote) is the same with password in a table's column 'password' 
			{
				$_SESSION['name'] = $row['name']; // then save the name of user in a global SESSION value
			}
			else //otherwise..
			{
				// save the string ='Wrong Password' in outputMessage value
				$outputMessage = '<p class="text-danger">Wrong password</p>';
			}
			
			
		}	
	}
	else // if DB doesn't return anything (= any record) --> that means that username which user wrote was wrong
	{ 
	   // so fill the outputMessage with value 'Wrong username' 
	   $outputMessage = '<p class="text-danger">Wrong username</p>';
	}
	
	//send as a ajax-response the message below
	echo $outputMessage;
	
	//close DB connection
	$conn->close();
	
?>