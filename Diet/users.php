<?php
	
	//Include the file which create the connection with our DB 'diet'
	include 'config.php';
	
	//Write and execute the SQL Selection 
	$sql = "SELECT * FROM users";
	$res = $conn->query($sql);
	
	if ( $res->num_rows > 0) //if SQL Select has results to return
	{ 
		while ($row = $res->fetch_assoc()) //for all returned records
		{
			$json_array[] = $row; //save the records in json format
		}	
	}
	else //if there is no record to be returned
	{ 
	  echo 'There is no user in DB';   
	}
	
	
	$usersData = json_encode($json_array); //create a json representation of a data
	echo $usersData; //return the data ( = users' info)
	
	//close DB connection
	$conn->close();
?>