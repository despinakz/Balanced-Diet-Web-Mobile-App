<?php  
 
	// When user press the 'Log Out' button. . . 
	
	session_start(); //...access to SESSION values

	session_destroy(); //...destroy all SESSION values 
	
	header("location:index.php"); //...and finally we redirect in basic/main page which is 'index.php'

?>
