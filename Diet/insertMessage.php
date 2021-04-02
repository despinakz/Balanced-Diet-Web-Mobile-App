<?php
	
	//Include the file which create the connection with our DB 'diet'
	include 'config.php';
	
	//Get the values which sended via ajax call (from Contact form)
	$name = $_POST['name']; //there is no need for escape as we not allow special chars in name input field (validation)
	$email = mysqli_real_escape_string($conn, $_POST['email']); //escape characters (e.g single quote) in order to avoid injections & errors
	$subject = mysqli_real_escape_string($conn, $_POST['subject']); //escape characters (e.g single quote) in order to avoid injections & errors
	$message = mysqli_real_escape_string($conn, $_POST['message']); //escape characters (e.g single quote) in order to avoid injections & errors
	
	//Write and execute the SQL Insertion 
	$sql = "INSERT INTO messages (messageID,name,email,subject,message) VALUES ('','$name','$email','$subject','$message')";
	$result = $conn->query($sql);
	
	if ($result === TRUE) //if the INSERTION excecuted successfully
	{
		// return a successfull message
		echo '<p class="text-success">Your message has been successfully sented <i class="fa fa-smile-o" aria-hidden="true"></i></p>';
	}
	else 
	{
		// return an unsuccessfull message
		echo '<p class="text-danger">Unfortunately something went wrong with your message <i class="fa fa-frown-o" aria-hidden="true"></i></p>'
		
		//show the SQL error that occured
		.$conn -> error; 
	}
	
	//close DB connection
	$conn->close();
	
	
	
?>