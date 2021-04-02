<?php
	session_start(); //call this function in order to call and use $_SESSION variables 
	
	//Include the file which create the connection with our DB 'diet'
	include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Welcome to "Balanced Diet" center </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		
		<!-- Favicon Icon -->
		<link rel="shortcut icon" type="image/png" href="assets/images/favicon.ico"/>
		
		<!-- Bootstrap 4 -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
			integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		
		<!-- jQuery & jQueryUI -->
		<link rel="stylesheet" href="assets/jqueryUI/jquery-ui.min.css">
		<script src="assets/jqueryUI/external/jquery/jquery.js"></script>
		<script src="assets/jqueryUI/jquery-ui.min.js"></script>
		
		
		
		
		<style>
			<!-- CSS -->
			body{
				/*font-family: "Century Gothic", CenturyGothic, Geneva, AppleGothic, sans-serif;*/
				line-height: 1.8;
				/*color: #f5f6f7;*/
			}
			
			.container-fluid {
				padding-top: 70px;
				padding-bottom: 70px;
				overflow-x:hidden;
			}
			
			nav{
				background: black;
				color: white;
			}
			
			#mainSection{
				background-image: url('assets/images/yellow.jpg');
				background-position: center;
				padding:13% 10%;
				background-repeat: no-repeat;
				background-size: cover;
				/*padding-bottom:19%;*/
			}
			
			
			#footer{
				padding-top: 60px; 
				
			}
			
			
			
			
			/* ------------- Scrollbar CSS ------------- */	
		
			/* width */
			::-webkit-scrollbar {
				width: 10px;
			}

			/* Track */
			::-webkit-scrollbar-track {
				background: #f1f1f1; 
			}

			/* Handle */
			::-webkit-scrollbar-thumb {
				background: #888; 
			}

			/* Handle on hover */
			::-webkit-scrollbar-thumb:hover {
					background: #555; 
			}
			
			/* ------- Mobile S (small) ------- */
			@media only screen and (max-width: 320px){
				
				#mainSection{
					padding:50% 10%;
				}
				
			}
			
			/* ------- Mobile M (medium) ------- */
			@media only screen and (min-width: 321px) and (max-width: 375px) {
				
				#mainSection{
					padding:55% 10%;
				}
			}
			
			/* ------- Mobile L (large) ------- */
			@media only screen and (min-width: 376px) and (max-width: 425px) {
				
				#mainSection{
					padding:65% 10%;
				}
			}
			
			/* ------- Tablet ------- */
			@media only screen and (min-width: 426px) and (max-width: 768px) {
			  
				#mainSection{
					padding:35% 10%;
				}
			
			}
			
			/* ------- Laptop ------- */
			@media only screen and (min-width: 769px) and (max-width: 1024px){
			  
				#mainSection{
					padding:25% 10%;
				}
			}
			
			/* ------- Laptop L (large) ------- */
			@media only screen and (min-width: 1025px) and (max-width: 1440px){
			  
				#mainSection{
					padding:21% 10%;
				}
				
				
			
			/* ------- 4K (e.g smart TVs) ------- */
			@media only screen and (min-width: 1441px){
			  
				#mainSection{
					padding:25% 10%;
				}
				
				button{
					font-size:40px !important;
				}

			}
			
		</style>
		
		<script>
			//When the DOM is ready
			$(function(){
				
				//When click one option from navbar then the navbar-dropwown slides up automatically (is visible for small-medium device width)
				$('.nav-item').click(function(){
					$('.navbar-toggler').click();
				});
				
				//When the image of navbar is clicked, then go to 'Who We Are?' section which is the first section of our page
				$('#logoImg').click(function(){
					location.href = 'index.php';
				});
				
				$('button').click(function(){
					$.ajax({
							url: 'users.php',
							type: 'POST',
							dataType: 'html',
							success: function(data){
								//$('#dbResults').html(data);
								data = $.parseJSON(data); //Parse JSON
								var html_to_append = '';
								html_to_append += '<table class="table table-hover mt-5 table-responsive-sm table-light"><thead class="thead-dark"><tr class="mt-3 text-uppercase"><th class="p-2">Name</th><th class="p-2">E-mail' +
								'</th><th class="p-2">Username</th></tr></thead>'; //<th class="p-2">Password</th>
								$.each(data, function(i, item) {
									html_to_append +=
										'<tr class="mt-3"><td class="p-1">' +
										item.name + 
										'</td><td class="p-1">' +
										item.email +
										'</td><td class="p-1">' +
										item.username +
										//'</td><td class="p-2">' +
										//item.password +
										'</td></tr>';
								});
								html_to_append += '</table>';
								
								$('#dbResults').html(html_to_append);
								
								//$('#dbResults').slideToggle();
							},
							failure: function(){
								console.log('Something went wrong!');
							}
					});
					
				});
			
			});
		</script>
		
	</head>
	
	<body>
		
		
		
		<!-- NavBar -->
		<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
			<div class="d-flex flex-row">
				<div class="p-0">
					<a class="navbar-brand" href="#">
						<img src="assets/images/logo.png" id="logoImg" width="50" height="50" class="d-inline-block align-top img-fluid" alt="">
					</a>
				</div>
				<div class="p-0">
					<button class="navbar-toggler mt-3" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
			</div>
			
			
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<!--li class="nav-item active"><a class="nav-link" href="#">Home</a></li-->
					<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
				</ul>
			</div>
		</nav>
		
		<div class="container-fluid text-center" id="mainSection">
			<button type="button" class="text-dark font-weight-bold btn btn-outline-warning">Check out our Registered Users</button>
			<div id="dbResults"></div>
		</div>
		

		
		
		<!-- Footer -->
		<footer class="container-fluid text-dark p-3 text-center" id="footer">
			<small>1st Project - Web Programming 2019-2020.</small><br/>
			<small>Created by Despina Kozoni <a href="mailto:despinakoz@gmail.com">despinakoz@gmail.com</a></small>
			<small>All rights reserved. <i class="fa fa-copyright" aria-hidden="true"></i></small><br/>
		</footer>
		
		
		
	</body>
</html>