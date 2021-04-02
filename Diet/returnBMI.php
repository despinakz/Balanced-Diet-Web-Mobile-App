<?php
	
	// take the values from select field & input fields
	$gender = $_POST['gender']; // get the value from gender select field
	$weight = $_POST['weight']; // get the value from weight input field
	$height = $_POST['height']; // get the value from height input field
	
	$BMI = round( ($weight/pow($height,2)), 2 ); //BMI Formula 
	
	if ($gender == 'female') // If user select 'Female' from select field
	{
		if ($BMI < 18.50){ 
			echo 'Your BMI is: <div class="font-weight-bold">'.$BMI.'</div><div class="font-italic font-weight-bold small">-Underweight</div>';
		}
		else if ( ($BMI >= 18.50) && ($BMI <=23.59) ){ 
			echo 'Your BMI is: <div class="font-weight-bold">'.$BMI.'</div><div class="font-italic font-weight-bold small">-Normal Weight</div>';
		}
		else if (($BMI >= 23.60) && ($BMI <=28.69)){
			echo 'Your BMI is: <div class="font-weight-bold">'.$BMI.'</div><div class="font-italic font-weight-bold small">-Obese 1st degree</div>';
		}
		else if (($BMI >= 28.70) && ($BMI <=40)){
			echo 'Your BMI is: <div class="font-weight-bold">'.$BMI.'</div><div class="font-italic font-weight-bold small">-Obese 2nd degree</div>';
		}
		else if ($BMI > 40){
			echo 'Your BMI is: <div class="font-weight-bold">'.$BMI.'</div><div class="font-italic font-weight-bold small">-Obese 3rd degree</div>';
		}
		else //if somethings goes wrong with BMI calculation then return an appopriate message
		{
			echo '<p class="text-danger">Something went wrong with BMI calculation!</p>';
		}
	}
	else if ($gender == 'male') // If user select 'Male' from select field
	{
		if ($BMI < 19.50){
			echo 'Your BMI is: <div class="font-weight-bold">'.$BMI.'</div><div class="font-italic font-weight-bold small">-Underweight</div>';
		}
		else if ( ($BMI >= 19.50) && ($BMI <=24.99) ){
			echo 'Your BMI is: <div class="font-weight-bold">'.$BMI.'</div><div class="font-italic font-weight-bold small">-Normal Weight</div>';
		}
		else if (($BMI >= 25) && ($BMI <=29.99)){
			echo 'Your BMI is: <div class="font-weight-bold">'.$BMI.'</div><div class="font-italic font-weight-bold small">-Obese 1st degree</div>';
		}
		else if (($BMI >= 30) && ($BMI <=40)){
			echo 'Your BMI is: <div class="font-weight-bold">'.$BMI.'</div><div class="font-italic font-weight-bold small">-Obese 2nd degree</div>';
		}
		else if ($BMI > 40){
			echo 'Your BMI is: <div class="font-weight-bold">'.$BMI.'</div><div class="font-italic font-weight-bold small">-Obese 3rd degree</div>';
		}
		else //if somethings goes wrong with BMI calculation then return an appopriate message
		{
			echo '<p class="text-danger">Something went wrong with BMI calculation!</p>';
		}
	}
		
		
	
	
?>