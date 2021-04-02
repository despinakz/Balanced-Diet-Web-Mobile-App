<?php
	session_start(); //call this function in order to call and use $_SESSION variables 
	
	//Include the file which create the connection with our DB 'diet'
	include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Welcome to "Balanced Diet"</title>
		
		<!-- meta-tags about viewport and encoding -->
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
		<!--link rel="stylesheet" href="assets/jqueryUI/jquery-ui.min.css">
		<script src="assets/jqueryUI/external/jquery/jquery.js"></script>
		<script src="assets/jqueryUI/jquery-ui.min.js"></script-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<!-- AOS (Animate On Scroll) -->
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		
		<!-- External CSS Stylesheet -->
		<link rel="stylesheet" type="text/css" href="assets/css/index.css">
		
		<!-- External jQuery -->
		<script type="text/javascript" src="assets/jQuery/index.js"></script>

		
	</head>
	
	<body>
		
		<!-- NavBar -->
		<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
			
			<div class="d-flex flex-row">
				<div class="p-0">
					<!-- Logo image on navbar-->
					<a class="navbar-brand">
						<img src="assets/images/logo.png" id="logoImg" width="50" height="50" class="d-inline-block align-top img-fluid" alt="Logo Img">
					</a>
				</div>
				<div class="p-0">
					<!-- 3 lines which are visible for medium-small-xs devices = navigation dropdown-button -->
					<button class="navbar-toggler mt-3" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
			</div>
			
			
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<!--li class="nav-item active"><a class="nav-link" href="#">Home</a></li-->
					
					<!-- 'Balanced Diet' dropdown -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Balanced Diet
						</a>
						<div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
							<!--li class="nav-item"--><a class="nav-link dropdown-item" href="#whoWeAre">Who We Are?</a><!--/li-->
							<!--li class="nav-item"--><a class="nav-link dropdown-item" href="#aboutUs">About Us</a><!--/li-->
							<!--li class="nav-item"--><a class="nav-link dropdown-item" href="#clientsSaid">Our Clients Said</a><!--/li-->
							<div class="dropdown-divider"></div>
							
							<!-- button which opens the Contact modal form -->
							<button class="btn btn-outline-primary btn-sm ml-1" data-toggle="modal" data-target="#contactModal">Contact Us</button>
						</div>
					</li>
					
					<!-- other nav items on the naqvbar -->
					<li class="nav-item"><a class="nav-link" href="#ourTeam">Our Team</a></li>
					<li class="nav-item"><a class="nav-link" href="#faqs">FAQs</a></li>
					<li class="nav-item"><a class="nav-link" href="#bmi">Your BMI</a></li>
					<li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>
					<li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
					
					
					<?php  
						 
						if (isset($_SESSION['name'])) // If user is logged-in..then we add a button 'Log-Out' & the user's name 
						{  
							echo 
							'
							<li class="nav-item">
								<a href="logout.php" class="btn btn-info stretched-link btn-sm mt-1">Log-Out</a>
							</li>
							<li class="nav-item ml-lg-1 mt-1">
								<div id="usernameDiv" class="text-dark"><i class="fa fa-user" style="font-size:30px;color:#17A2B8"></i></div>
							</li>
							<li class="nav-item">
								<div class="text-dark">'.$_SESSION['name'].'</div>
							</li>
							';
						}  
						else // If user is a quest ( = anybody is logged-in)..then we add a button 'Sign In' & a button 'Log-In'
						{
							echo '<li class="nav-item ml-lg-1 mt-1"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#registerModal">Sign In</a></li>';
							echo '<li class="nav-item ml-lg-1 mt-1"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#loginModal">Log-In</button></li>';
						}
						
					?>  
						
					
				</ul>
			</div>
		</nav>
		
		<!-- Sign In (or Registration) Modal -->
		<div class="modal text-dark fade" id="registerModal" data-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Sign In</h4>
						<button type="button" class="close" id="closeXSign" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body ( = the Sign in form) -->
					<div class="modal-body">
							<div id="regStatus"></div>
							<div class="form-row">
								<div class="col">
									<input type="text" class="form-control" id="name" placeholder="Name">
									<small class="text-danger" id="nameNotice">Please enter your full name!</small>
									<small class="text-danger" id="validNameNotice">Please enter a valid name!</small>
									<input type="email" class="form-control mt-1" id="mail" placeholder="e-mail">
									<small class="text-danger" id="mailNotice">Please enter your e-mail!</small>
									<small class="text-danger" id="validMailNotice">Please enter a valid e-mail address!</small>
								</div>
							</div>
							<div class="form-row">
								<div class="col">
									<input type="text" class="form-control mt-3" id="username" placeholder="Username">
									<small class="text-danger" id="usernameNotice">Please enter your username!</small>
									<small class="text-danger" id="usernameExistanceNotice">The username already exists!</small>
									<div class="input-group">
										<input type="password" class="form-control mt-1" id="pass" placeholder="Password">
										<div class="input-group-append">
											<button class="btn btn-secondary mt-1" type="button" id="hideShowPass">
												<i class="fa fa-eye-slash" aria-hidden="true"></i>
											</button>
										</div>
									</div>
									<small class="text-danger" id="passNotice">Please enter your password and check it from the eye-icon!</small>
								</div>
							</div>
							<div class="form-row">
								<button type="button" id="submitBtn" class="btn btn-success mt-4">Submit</button>
								<button id="reset" class="btn btn-primary mt-4 ml-1">Reset</button>
							</div>
						
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" id="closeSignInModal" class="btn btn-dark" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Log In Modal -->
		<div class="modal text-dark fade" id="loginModal" data-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Log-In</h4>
						<button type="button" class="close" id="closeXLog" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body ( = the Log in form) -->
					<div class="modal-body">
							<div id="loginStatus"></div>
							<div class="form-row">
								<div class="col">
									<input type="text" class="form-control mt-3" id="loginUsername" placeholder="Username">
									<small class="text-danger" id="loginUsernameNotice">Please enter your username!</small>
									<div class="input-group">
										<input type="password" class="form-control mt-1" id="loginPass" placeholder="Password">
										<div class="input-group-append">
											<button class="btn btn-secondary mt-1" type="button" id="hideShowPassLog">
												<i class="fa fa-eye-slash" aria-hidden="true"></i>
											</button>
										</div>
									</div>
									<small class="text-danger" id="loginPassNotice">Please enter your password and check it from the eye-icon!</small>
								</div>
							</div>
							<div class="form-row"><button type="button" id="loginBtn" class="btn btn-success mt-4">Login</button></div>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" id="closeLogInModal" class="btn btn-dark" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- PAGE 1 -->
		<!-- Container 1 (Who We Are) -->
		<div class="container-fluid p-0 text-center" id="whoWeAre">
			<div id="carousel1" class="carousel slide" data-ride="carousel">
				
				<!-- 3 slides = 3 indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel1" data-slide-to="0" class="active"></li>
					<li data-target="#carousel1" data-slide-to="1"></li>
					<li data-target="#carousel1" data-slide-to="2"></li>
				</ol>
				
				<div class="carousel-inner">
					<!-- 1st Slide-Image -->
					<div class="carousel-item active">
					    <img class="w-100" src="assets/images/healthConcept2.jpg" alt="First slide">
					    <div class="carousel-caption">
							<h3>Welcome to "Balanced Diet"</h3>
							<p>Nutrition Center</p>
						</div>
					</div>
					
					<!-- 2nd Slide-Image -->
					<div class="carousel-item">
					  <img class="w-100" src="assets/images/fruitMix.jpeg" alt="Second slide">
					  <div class="carousel-caption">
							<h3>Our certified Nutritionists and Dietitians can assist you with:</h3>
							<p id="secondCarouselCaption">
								Weight Loss & Gain, Metabolism Testing,
								Disease-Specific Nutrition Coaching, 
								Nutrition Supplement Consultations, 
							    and Food Sensitivity Testing.
							</p>
						</div>
					</div>
					
					<!-- 3d Slide-Image -->
					<div class="carousel-item">
					  <img class="w-100" src="assets/images/fruitMix2.jpg" alt="Third slide">
					  <div class="carousel-caption">
							<h3>The Key to Wellness is to</h3>
							<p>Accept Personal Responsibility for Your Health and Well-Being.</p>
						</div>
					</div>
				</div>
				
				<!-- Previous arrow -->
				<a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				
				<!-- Next arrow -->
				<a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				
		    </div>
	    </div>
		
		<!-- Container 2 (About Us) -->
		<div class="container-fluid text-center" id="aboutUs" data-aos="fade-up">
			<h3>About Us</h3>
			<div class="row mt-5">
				<div class="col-sm-6">
					<!-- YouTube Responsive video -->
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/KD-FmeueFUo"></iframe>
					</div>
				</div>
				
				<div class="col-sm-6 mt-1">
					<!-- Company Info -->
					<p>
						Welcome to Balanced Diet Center, your trusted place to find credible information on healthy eating and lifestyle. 
						With its team of volunteer experts, who sift through the available information, the Balanced Diet Center brings you evidence 
						based and peer-reviewed articles.
					</p>
					
					<!-- Button that is going to 'Out Team' Page when we click it -->
					<button id="ourTeamBtn" type="button" class="btn btn-info">Check out OUR TEAM</button>
				</div>
			</div>
		</div>
		
		<!-- Container 3 (Our Clients Said) -->
		<div class="container-fluid text-center" id="clientsSaid">
			<h3>Our Clients Said</h3>
		    <div id="carousel2" class="carousel slide mt-5 container" data-interval="false">
					
					<!-- 5 slides = 5 indicators -->
					<ol class="carousel-indicators">
					  <li data-target="#carousel2" data-slide-to="0" class="active"></li>
					  <li data-target="#carousel2" data-slide-to="1"></li>
					  <li data-target="#carousel2" data-slide-to="2"></li>
					  <li data-target="#carousel2" data-slide-to="3"></li>
					  <li data-target="#carousel2" data-slide-to="4"></li>
					  <li data-target="#carousel2" data-slide-to="5"></li>
					</ol>
					
					<div class="carousel-inner">
						<div class="carousel-item active container">
							<div class="row">
								<div class="col-md-12 p-4">
									<!-- Slide-Review 1 -->
									<blockquote>
										<p>
											<i class="fa fa-quote-left" aria-hidden="true"></i>
											Jessica is a consummate professional in every sense of the word, her no-nonsense towards nutrition and her clients tell me that she really 
											cares about the results that both she and her client gets. 
											She is well-informed as to the necessary approaches to client-based dietetics, and shows a caring attitude by going that extra step.
											<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
										<footer class="blockquote-footer">Taylor Miller</footer>
								    </blockquote>
								</div>
								
							</div>
						</div>
						
						<div class="carousel-item container">
							<div class="row">
								<div class="col-md-12 p-4">
									<!-- Slide-Review 2 -->
									<blockquote>
										<p>
											<i class="fa fa-quote-left" aria-hidden="true"></i>
											With Melissa’s help I have lost 16 pounds (so far). 
											Melissa Parisi listens to me, understands my goal, and gives me very realistic and practical advice that works for me. 
											I am confident that because of the things she is teaching me I will be able to meet my goal, and maintain it.
											<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
										<footer class="blockquote-footer">Valeria Smith</footer>
									</blockquote>
								</div>
							</div>
						</div>
						
						<div class="carousel-item container">
							<div class="row">
								<div class="col-md-12 p-4">
									<!-- Slide-Review 3 -->
									<blockquote>
										<p>
											<i class="fa fa-quote-left" aria-hidden="true"></i>
											Working with Melissa, Jessica and other team has been a fantastic journey. 
											I knew my diet needed to be corrected and all the team was just the person to help me do it! 
											I had a number of issues in my personal life that needed improvement - stress, dizziness and sleeping, 
											all controlled by my diet. I highly recommend to try Cheri's program and see how you can live the best 
											life possible!
											<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
										<footer class="blockquote-footer">James Kalvin</footer>
									</blockquote>
								</div>
							</div>
						</div>
						
						<div class="carousel-item container">
							<div class="row">
								<div class="col-md-12 p-4">
									<!-- Slide-Review 4 -->
									<blockquote>
										<p>
											<i class="fa fa-quote-left" aria-hidden="true"></i>
											Cheri and her staff are unbelievably friendly and welcoming.  
											Regardless of any issues you may be experiencing, The "Balanced Diet" Nutrition Center is worth checking out.  
											The body knows what it needs and Cheri and her staff are there to help translate for you.
											<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
										<footer class="blockquote-footer">Elizabeth Dezzler</footer>
									</blockquote>
								</div>
							</div>
						</div>
						
						<div class="carousel-item container">
							<div class="row">
								<div class="col-md-12 p-4">
									<!-- Slide-Review 5 -->
									<blockquote>
										<p>
											<i class="fa fa-quote-left" aria-hidden="true"></i>
											I would recommend Cheri very highly as I have recently finished a series of nutritional seminars with her as leadership. 
											She has definitely conveyed her knowledge of the field and has a wonderful manner with the people who attended the workshop. 
											Christine went that extra mile to help. She was enthusiastic as well. I learned a good deal and still try to practice her suggestions every day!
											<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
										<footer class="blockquote-footer">Jordan Williams</footer>
									</blockquote>
								</div>
							</div>
						</div>
						
						<div class="carousel-item container">
							<div class="row">
								<div class="col-md-12 p-4">
								    <!-- Slide-Review 6 -->
									<blockquote>
										<p>
											<i class="fa fa-quote-left" aria-hidden="true"></i>
											Cheri and her team are amazing! 
											I went to see her because of a itchy head and body, she is very  knowledgeable. 
											She has been patient with me as I like to  implement new things at my own pace and she just 
											encourages me to take it as slow as I feel I need. I've been improving week by week. 
											I would recommend you to give them a try, you won't be sorry! Thank you Cheri and staff for your warm welcome.
											<i class="fa fa-quote-right" aria-hidden="true"></i>
										</p>
										<footer class="blockquote-footer">Aria Delson</footer>
									</blockquote>
								</div>
								
								
							</div>
						</div>
					</div>
					
					<!-- Previous arrow -->
					<a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">
					  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					  <span class="sr-only">Previous</span>
					</a>
				
					<!-- Next arrow -->
					<a class="carousel-control-next" href="#carousel2" role="button" data-slide="next">
					  <span class="carousel-control-next-icon" aria-hidden="true"></span>
					  <span class="sr-only">Next</span>
					</a>
			</div>
		</div>
		
		<!-- Page 2 -->
		<!-- Container 4 (Our Team)-->
		<div class="container-fluid text-center" id="ourTeam">
			<h3>Our Team</h3>
			<div class="card-columns mt-5">
				
				<!-- Team Member 1 -->
				<div class="card">
					<img src="assets/images/team-member.png" class="card-img-top img-fluid" alt="Team Member Image">
					<div class="card-body">
					  <h5 class="card-title">Jessica Hugle-Foster</h5>
					  <p class="card-text">
						Jessica Hugle-Foster is the health coach for the Nutrition Center at Jefferson Health in New Jersey. 
						Jessica graduated Summa Cum Laude from Rowan University, where she specialized in Health Promotion and Fitness Management. 
						At Rowan, Jessica also earned her certification in Motivational Interviewing for the purposes of facilitating health behavior change. 
						She is also a certified Health Coach and has a specialization in Behavior Change through the American Council on Exercise (ACE).
					  </p>
					</div>
					<div class="card-footer">
						<small class="text-muted text-uppercase">Health Coach</small>
					</div>
				</div>
				
				<!-- Quote -->
				<div class="card p-3" id="quote2" data-aos="fade-right">
					<blockquote class="blockquote mb-0 card-body">
					  <p class="text-uppercase">A healthy outside starts from the iside</p>
					  <footer class="blockquote-footer">
						<small class="text-muted">
						  <cite title="Source Title">Robert Urich</cite>
						</small>
					  </footer>
					</blockquote>
				</div>
				
				<!-- Team Member 2 -->
				<div class="card">
					<img src="assets/images/team-member.png" class="card-img-top img-fluid" alt="Team Member Image">
					<div class="card-body">
					  <h5 class="card-title">Melissa Wadolowski</h5>
					  <p class="card-text">
						Melissa Wadolowski, RD, LDN, CHC, a 2011 Cum Laude graduate of Queens College, Flushing, NY is a Nutrition Education Specialist, 
						Registered Dietitian under the Commission of Dietetic Registration and a Licensed Dietitian Nutritionist. 
						Melissa completed her dietetic internship with Sodexo in Philadelphia, PA. She has been with the Jefferson nutrition team since 2016 
						and earned her Certified Health Coach credential in January of 2017. 
					  </p>
					  
					</div>
					<div class="card-footer">
						<small class="text-muted text-uppercase">Nutrition Education Specialist</small>
					</div>
				</div>
				
				<!-- Quote -->
				<div class="card text-white text-center p-3" id="quote1" data-aos="fade-up">
					<blockquote class="blockquote mb-0">
					    <p class="font-weight-light font-italic">
							Don't focus on 
							<p class="text-uppercase font-weight-light font-italic">how much you eat</p>
							Focus on 
							<p class="text-uppercase font-weight-light font-italic">what you eat</p>
						</p>
					</blockquote>
				</div>
				
			    <!-- Team Member 3 -->
				<div class="card text-center">
					<img src="assets/images/team-member.png" class="card-img-top img-fluid" alt="Team Member Image">
					<div class="card-body">
					  <h5 class="card-title">Melissa Parisi</h5>
					  <p class="card-text">
						Melissa Parisi, RD, is a 2019 Summa Cum Laude graduate from the Rutgers School of Health Professions program, 
						a Registered Dietitian through the Commission on Dietetic Registration, and Nutrition Education Specialist. 
						Originally obtaining a bachelors degree in Advertising from Rowan University and working in television for five years, 
						Melissa decided to make a career change into the Nutrition and Dietetics field in order to pursue her passion of helping others 
						build healthier lifestyles through a “food first” approach whenever possible.
					  </p>
					</div>
					<div class="card-footer">
						<small class="text-muted text-uppercase">Dietitian Expert</small>
					</div>
			    </div>
				
				<!-- Image -->
				<div class="card" data-aos="fade-left">
					<img src="assets/images/pineapples.jpg" class="img-fluid" alt="Pineapples Image">
				</div>
				
				<!-- Quote -->
				<div class="card p-3 text-right" id="quote3" data-aos="fade-left">
					<blockquote class="blockquote mb-0">
					  <p class="font-italic">You feel better when you're eating food that retains nutritional value</p>
					  <footer class="blockquote-footer">
						<small class="text-muted">
						  <cite title="Source Title">Amber Heard</cite>
						</small>
					  </footer>
					</blockquote>
			    </div>
				
				<!-- Team Member 4 -->
				<div class="card">
					<img src="assets/images/team-member.png" class="card-img-top img-fluid" alt="Team Member Image">
					<div class="card-body">
					  <h5 class="card-title">Cheri R. Leahy</h5>
					  <p class="card-text">
						Cheri Leahy, RDN is the Director of Nutrition for Bariatric Surgery at Jefferson Health in New Jersey. 
						A passionate nutritionist and health expert, Cheri earned her Bachelor of Science Degree in Nutrition and Dietetics from Meredith 
						College in Raleigh, NC, and completed a graduate program and clinical internship at Duke University Medical Center in Durham, NC. 
						Certified by the Academy of Nutrition and Dietetics, Cheri has presented nutrition and wellness 
						seminars nationally and authored a cookbook titled, “Portion 8.”
					  </p>
					  
					</div>
					<div class="card-footer">
						<small class="text-muted text-uppercase">Nutritionist and Health expert</small>
					</div>
				</div>
				
				<!-- Image -->
				<div class="card" data-aos="fade-up">
					<img src="assets/images/apples.jpg" class="card-img-top img-fluid" alt="Apples Image">
				</div>
			</div>
		</div>
		
		<!-- Page 3-->
		<!-- Container 5 (FAQs)-->
		<div class="container-fluid" id="faqs" data-aos="flip-left">
			<h3 class="text-center">FAQs</h3>
			
			<div class="accordion mt-5 container">
				
				<!-- 1 FAQ -->
				<div class="card">
					
					<!-- Question 1 -->
					<div class="card-header" id="headingOne">
						<h2 class="mb-0 text-center">
							<button class="btn btn-link accordionBtn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								What is a "healthy diet"?
							</button>
						</h2>
					</div>
					
					<!-- Answer 1 -->
					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body">
							A healthy eating pattern is one that provides enough of each essential nutrient from nutrient-dense foods, 
							contains a variety of foods from all of the basic food groups, and focuses on balancing calories consumed with calories 
							expended to help you achieve and sustain a healthy weight. This eating pattern limits intake of solid fats, sugar, salt (sodium) and alcohol.
						</div>
					</div>
					
				</div>
				
				<!-- 2 FAQ -->
				<div class="card">
					
					<!-- Question 2 -->
					<div class="card-header" id="headingTwo">
						<h2 class="mb-0 text-center">
							<button class="btn btn-link collapsed accordionBtn" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								How many calories do I need to burn to lose a pound of weight?
							</button>
						</h2>
					</div>
					
					<!-- Answer 2 -->
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body">
							You need to burn off 3,500 calories more than you take in to lose 1 pound. 
							This translates into a reduction of 500 calories per day to lose 1 pound in a week, or 1000 calories per day to lose 2 pounds in a week. 
							(1-2 pounds per week is generally considered to be a safe rate of weight loss.) 
							This can be achieved by eating fewer calories or using up more through physical activity. 
							A combination of both is best. 
						</div>
					</div>
					
				</div>
				
				<!-- 3 FAQ -->
				<div class="card">
					
					<!-- Question 3 -->
					<div class="card-header" id="headingThree">
					  <h2 class="mb-0 text-center">
						<button class="btn btn-link collapsed accordionBtn" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						    When I eat more than I need what happens to the extra calories?
						</button>
					  </h2>
					</div>
					
					<!-- Answer 3 -->
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						<div class="card-body">
							Consuming extra calories results in an accumulation of stored body fat and weight gain. 
							This is true whether the excess calories come from protein, fat, carbohydrate, or alcohol.
						</div>
					</div>
					
				</div>
				
				<!-- 4 FAQ -->
				<div class="card">
					
					<!-- Question 4 -->
					<div class="card-header" id="headingFour">
					  <h2 class="mb-0 text-center">
						<button class="btn btn-link collapsed accordionBtn" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
							I'm on a diet to lose weight. Do I still need to exercise?
						</button>
					  </h2>
					</div>
					
					<!-- Answer 4 -->
					<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
						<div class="card-body">
							Physical activity is a key component of helping you move toward a healthier weight, as it can help you achieve the appropriate calorie balance.
							People who exercise regularly may be more likely to keep the weight from coming back after losing weight.
						</div>
					</div>
					
				</div>
				
				<!-- 5 FAQ -->
				<div class="card">
					
					<!-- Question 5 -->
					<div class="card-header" id="headingFive">
					  <h2 class="mb-0 text-center">
						<button class="btn btn-link collapsed accordionBtn" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
							Can a supplement help me lose weight?
						</button>
					  </h2>
					</div>
					
					<!-- Answer 5 -->
					<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
						<div class="card-body">
							According to the National Institutes of Health, Office of Dietary Supplements, you should always check with your health care 
							provider before taking a supplement. For some people, a supplement can have harmful side effects and could interact with 
							prescription and over-the-counter medications. Also, the FDA regulates weight-loss supplements differently from prescription or 
							over-the-counter drugs. As with other dietary supplements, the FDA does not test or approve weight-loss supplements before they are sold. 
							Manufacturers are responsible for making sure their supplements are safe, and that the label claims are truthful and not misleading.
						</div>
					</div>
					
				</div>
				
				<!-- 6 FAQ -->
				<div class="card">
					
					<!-- Question 6 -->
					<div class="card-header" id="headingSix">
					  <h2 class="mb-0 text-center">
						<button class="btn btn-link collapsed accordionBtn" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
							Is it true that I can get all the vitamins/minerals I need from the food that I eat?
						</button>
					  </h2>
					</div>
					
					<!-- Answer 6 -->
					<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
						<div class="card-body">
							There is insufficient evidence to either recommend for or against the use of multivitamin/mineral supplements for the prevention of chronic 
							diseases for healthy Americans. It is recommended that you try to get all the vitamins/minerals you need by eating nutrient-dense 
							forms of foods, while balancing calorie intake with energy expenditure. Nutrient-dense foods contain essential vitamins and minerals, 
							and also fiber and other naturally occurring substances that may have positive health effects.
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<!-- Page 4  -->
		<!-- Container 6 (BMI Calculation)-->
		<div class="container-fluid text-center" id="bmi" data-aos="fade-up">
			
			<!-- title of this page -->
			<h4><code class="text-light">Calculate your BMI (Body Mass Index)</code></h4>
			
			<!-- Image with pomegranate -->
			<img src="assets/images/pomegranate.jpg" class="img-fluid rounded-circle mt-4" alt="Pomegranate Image">
			
			<!-- BMI Form-->
			<div class="d-flex justify-content-center w-50" id="bmiInputGroup">
				<div class="row" id="bmiForm">
				
					<select id="gender" class="form-control ml-1 col-xs-12 col-md-3 col-sm-12">
						<option value="" selected disabled>Choose</option>
						<option value="female">Female</option>
						<option value="male">Male</option>
					</select>
					
					<input type="text" id="weight" class="form-control ml-1 col-xs-12 col-md-3 col-sm-12" placeholder="Weight (kg)" title="Input Weight">
					<input type="text" id="height" class="form-control ml-1 col-xs-12 col-md-3 col-sm-12" placeholder="Height (m)" title="Input Height (e.g. 1.78)">
					
					
					<button type="button" id="calcBtn" class="btn btn-danger ml-1">Calculate</button>
				</div>
			</div>
			
			<!-- Notifications (for validation) -->
			<p class="text-danger" id="fieldNotice">Please fill out all inputs!</p>
			<p class="text-danger" id="zeroHeightNotice">The height should not be zero!</p>
			<p class="text-danger" id="zeroWeightNotice">The weight should not be zero!</p>
			<p class="text-danger" id="numericNoticeWeight">The weight must be only number (not string)!</p>
			<p class="text-danger" id="numericNoticeHeight">The height must be only number (not string)!</p>
			<p class="text-danger" id="validHeightFormat">The height has not valid format!</p>
			
			<!-- ajax-call returns here its results -->
			<div class="mt-4" id="bmiResults"></div>
			
		</div>
		
		<!-- Page 5  -->
		<!-- Container 7 (Blog)-->
		<div class="container-fluid" id="blog">
			
			<!-- title of this page -->
			<div class="text-center">
				<h3>Blog</h3>
				<p class="text-muted font-italic">Latest Articles</p>
			</div>
			
			<!-- Bootstrap Media -->
			<ul class="list-unstyled">
				
				<!-- Article 1 -->
				<li class="media col-xs-12" data-aos="fade-right">
					
					<!-- Image -->
					<img class="mr-3 mt-4 ml-3 img-fluid" src="assets/images/fruits.jpg" alt="Generic placeholder image">
					
					<!-- Article -->
					<div class="media-body mt-4">
					    <h5 class="mt-0 mb-1">The 20 Healthiest Fruits You Can Eat, According to a Nutritionist</h5>
						<article>
							<p>
								When it comes to eating more produce, you can't go wrong. Long story short: Every single fruit (and vegetable!) is a great option. 
								Research has shown eating a minimum of four to five servings per day helps to boost mood and reduce your risk of heart disease, 
								obesity, and type 2 diabetes. Yet according to the Centers for Disease Control and Prevention (CDC), only 10% of 
								Americans eat enough fruit — about 1½ to 2 cups daily. Many of us also miss out on sufficient dietary fiber, calcium, potassium, 
								and magnesium, all of which are found in abundance in produce. Potassium, for example, helps maintain a healthy blood pressure and 
								you'll get it easily in bananas, prunes, and cantaloupe. The fiber in fruit also supports better digestion and fills you up for fewer
								calories, making it a smart choice if you're trying to lose weight.
							</p>
							
							<!-- Slide Down Button -->
							<button type="button" id ="showArticle1Btn" class="btn btn-secondary btn-sm">Show More</button>
							
							<div id="showHideDiv1">
								<p>
									Whether you choose fresh or frozen, make it your goal to get more fruit into every meal. 
									Sprinkle mixed berries into morning oatmeal, carry a banana for a mid-afternoon snack, or toss avocado into a heart-healthy salad 
									at dinner. No matter how you slice it, eating more fruit can benefit your body and your mind — starting with 20 ideas below.
								</p>
								
								<mark>
									Watermelon, Apples, Mangos, Kiwis, Cherries, Bananas, Oranges, Grapes, Guava, Cantaloupe, Strawberries, Grapefruit, Blackberries, Avocados, 
									Plums, Blueberries, Lemons, Raspberries, Pears, Pomegranate.
								</mark>
							</div>
							
							<!-- Slide Up Button -->
							<button type="button" id ="hideArticle1Btn" class="btn btn-secondary btn-sm">Hide More</button>
							
						</article>
					</div>
				</li>
				
				<!-- Article 2 -->
				<li class="media my-4 col-xs-12" data-aos="fade-left">
					
					<!-- Image -->
					<img class="mr-3 ml-3 img-fluid" src="assets/images/lose-weight.jpg" alt="Generic placeholder image">
					
					<!-- Aricle -->
					<div class="media-body">
					    <h5 class="mt-0 mb-1">Diet & Weight Loss</h5>
					    <article>
							<p>
								A healthy weight is an important element of good health. 
								How much you eat—and what you eat—play central roles in maintaining a healthy weight or losing weight. 
								Exercise is the other key actor.
							</p>
							
							<p>
								For years, low-fat diets were thought to be the best way to lose weight. 
								A growing body of evidence shows that low-fat diets often don't work, in part because these diets often replace fat with 
								easily digested carbohydrates.
							</p>
							
							<!-- Slide Down Button -->
							<button type="button" id ="showArticle2Btn" class="btn btn-secondary btn-sm">Show More</button>
							
							<div id="showHideDiv2" class="text-left">
								<p>
									Hundreds of diets have been created, many promising fast and permanent weight loss. 
									Remember the cabbage soup diet? The grapefruit diet? How about the Hollywood 48 Hour Miracle diet, the caveman diet, 
									the Subway diet, the apple cider vinegar diet, and a host of forgettable celebrity diets?
								</p>
								
								<p>
									The truth is, almost any diet will work if it helps you take in fewer calories. Diets do this in two main ways:<br/>
									<i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> getting you to eat certain "good" foods and/or avoid "bad" ones<br/>
									<i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> changing how you behave and the ways you think or feel about food
								</p>
								
								<p>
									The best diet for losing weight is one that is good for all parts of your body, from your brain to your toes, 
									and not just for your waistline. It is also one you can live with for a long time. In other words, a diet that offers plenty of 
									good tasting and healthy choices, banishes few foods, and doesn't require an extensive and expensive list of groceries or supplements.
								</p>
								
								<p>
									One diet that fills the bill is a Mediterranean-type diet. Such a diet—and there are many variations—usually includes:<br/>
									<i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> several servings of fruits and vegetables a day<br/>
									<i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> whole-grain breads and cereals<br/>
									<i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> healthy fats from nuts, seeds, and olive oil<br/>
									<i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> lean protein from poultry, fish, and beans<br/>
									<i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> limited amounts of red meat<br/>
									<i class="fa fa-angle-right fa-lg" aria-hidden="true"></i> moderate wine consumption with meals (no more than two glasses a day for men; no more than one a day for women
								</p>
								
								<p>
									A Mediterranean-style diet is a flexible eating pattern. People who follow such diets tend to have lower rates of heart disease, 
									diabetes, dementia, and other chronic conditions.
								</p>
							
								<!-- Slide Up Button -->
								<button type="button" id ="hideArticle2Btn" class="btn btn-secondary btn-sm">Hide More</button>
							
							</div>
					    <article>
					</div>
				</li>
				
				<!-- Article 3 -->
				<li class="media" data-aos="fade-right">
					
					<!-- Image -->
					<img class="mr-3 ml-3 img-fluid" src="assets/images/coffee.jpg" alt="Generic placeholder image">
					
					<!-- Article -->
					<div class="media-body">
					    <h5 class="mt-0 mb-1">The buzz about caffeine and health</h5>
					    <article>
							<p>
								Americans are jolted with caffeine. On average, about 80% of adults take some form of caffeine every day, according to the FDA, 
								usually from coffee, tea, soda, or energy drinks.
							</p>
							
							<p>
								But does all that caffeine have any effect on your health — either good or bad? "While caffeine can give you a 
								temporary mental and physical boost, its impact depends on how much you consume and the source," says Dr. Stephen Juraschek, 
								an internal medicine specialist at Harvard-affiliated Beth Israel Deaconess Medical Center.
							</p>
							
							<!-- Slide Down Button -->
							<button type="button" id ="showArticle3Btn" class="btn btn-secondary btn-sm">Show More</button>
							
							<div id="showHideDiv3" class="text-left">
								<p>
									<h6>A stimulating effect</h6>
									Caffeine is a natural stimulant. Its main effect is on the central nervous system, where it can 
									increase alertness and 
									provide a needed boost when you are tired.
									Caffeine's effect peaks within an hour after consumption, and the body eliminates half of it within about four to six hours. 
									Yet, how people react to caffeine varies depending on their sensitivity and how quickly it is digested.
									"This is why some people can get a jolt from a small cup of coffee, while others can drink several cups and feel little, 
									if anything," says Dr. Juraschek. "It's also possible that your body can adjust to how it reacts to caffeine the more you consume."
									It's this variation that makes pinpointing caffeine's influence on health a challenge.<br/> 
									Still, science has shown some intriguing findings. For example:
								</p>
								
								<p>
									<h6>Heart.</h6>
									High doses of caffeine can temporarily raise your heart rate and blood pressure, which may pose dangers for some people with heart disease.
									Yet regular consumption does not disrupt your heart's rhythm enough to create the dangerous irregular pattern known as atrial 
									fibrillation, according to a study in the January 2016 Journal of the American Heart Association.
								</p>

								<p>
									<h6>Memory.</h6>
									Some research has suggested that caffeine may protect against dementia, including Alzheimer's disease. 
									One observational study in the Dec. 14, 2016, issue of The Journals of Gerontology: Series A found that adults ages 65 and older 
									who took an average of 261 milligrams (mg) of caffeine a day (about the amount in two to three 8-ounce cups of coffee) for 
									10 years reported fewer dementia symptoms compared with those who consumed an average of 64 mg daily (the amount in a little more 
									than half-cup of coffee). Still, it's not understood whether caffeine, or other nutrients in coffee like antioxidants or some 
									combination, is at play.
								</p>

								<p>
									<h6>Erectile function.</h6>
									Regular caffeine intake may improve erectile dysfunction (ED), suggests a 2015 study in the journal PLOS ONE. 
									Researchers compared daily caffeine intake and rates of ED in men who were part of the National Health and Nutrition Examination Survey.
									They found that those who consumed daily caffeine equal to two to three cups of coffee were 42% less likely to report 
									ED compared with those who drank less, and that the effect applied even to men who were overweight or had hypertension. 
									The connection may be related to caffeine's ability to increase blood flow, but more research is needed.
								</p>

								<p>
									<h6>Exercise.</h6>
									Many studies have found that a jolt of caffeine can improve athletic endurance and reduce fatigue. 
									The amounts often studied range from about 225 mg to 600 mg, taken about an hour beforehand. Yet, much of the research involves 
									high-level athletes, and the type of exercise tends to vary, says Dr. Juraschek, so it's not clear exactly how caffeine may help 
									the average person. "Consuming some caffeine before hitting the gym may work for some, but not for others," he says. 
									"It doesn't hurt to try, but be realistic that it probably won't make a huge impact on your results."
								</p>
														
								<p><h6>Watch your intake</h6>
									Overall, for most people, consuming caffeine poses no serious health risk if taken within safe amounts, 
									says Dr. Juraschek.
									People who have never had a heart attack or keep their blood pressure well controlled should consume no more than 400 mg per day, 
									which is the amount found in about four cups of coffee or up to 10 cups of black tea.
									"This amount is considered safe and isn't linked to any long-term effect on blood pressure or heart attack or stroke risk," 
									says Dr. Juraschek.
									However, if you've had a heart attack or been diagnosed with heart disease, you should keep your dosage to about half 
									that per day, says Dr. Juraschek.
									Your source of caffeine matters, too. Coffee and tea are great because they also contain some disease-fighting antioxidants, 
									but you want to avoid stirring in too much cream and sugar, which add extra calories and fat.
									Also skip the soda, or at least reduce your intake, as it often contains very high amounts of caffeine in a 
									single serving and is full of sugar and other unhealthy additives.
								</p>
							</div>
							
							<!-- Slide Up Button -->
							<button type="button" id ="hideArticle3Btn" class="btn btn-secondary btn-sm">Hide More</button>
							
					    </article>
					</div>
				</li>
				
				<!-- Article 4 -->
				<li class="media my-4" data-aos="fade-left">
					
					<!-- Image -->
					<img class="mr-3 ml-3 img-fluid" src="assets/images/vegetables.jpg" alt="Generic placeholder image">
					
					<!-- Article -->
					<div class="media-body">
					    <h5 class="mt-0 mb-1">A colorful meal of curried vegetables</h5>
						<article>
							
							<p><h6>Either fresh or frozen work well with this dish. </h6></p>
							
							<p>On rainy spring nights, when it’s cold and gray, curries make a warming, colorful meal.</p>
							
							<p>
								With a few shortcuts and some help from good-quality prepared spice pastes, a fine stew can be ready in a hurry. 
								While there are plenty of recipes for authentic Thai or Indian dishes, my curries are seat-of-the pants affairs.
							</p>
							
							<!-- Slide Down Button -->
							<button type="button" id ="showArticle4Btn" class="btn btn-secondary btn-sm">Show More</button>
							
							<div id="showHideDiv4" class="text-left">
								<p>
									Curry paste, sold in small jars, is potent stuff. Just a couple of tablespoons will heat up a dish for four to six. 
									Once opened, the jars will last at least two months in the refrigerator, ready to season soups, rub over roast chicken, 
									spice up scrambled eggs, spark mayonnaise and yogurt dips, and embolden stews of chicken, fish, vegetables and tofu.
								</p>
								
								<p>
									They rely on different chiles and spices for their flavors, levels of heat and colorful hues. 
									Red curry paste is the most versatile, made with red chiles and tomato paste. Yellow curry paste, seasoned with turmeric and 
									lots of ginger, is a bit milder and a tad sweeter than the red. Green curry paste, the most popular in Thai cuisine, 
									is made with green chiles, as well as cilantro, makrut lime leaf and peel, and basil. I use them interchangeably.
								</p>
								
								<p>
									Awaiting the harvest of local vegetables at farmers markets and co-ops, I’m working through the stash of frozen cauliflower, 
									carrots and peas in my freezer. This curry makes those half-bags of freezer-weary veggies shine.
								</p>
								
								<p>
									You can use any combination of vegetables, fresh or frozen. Toss in roast chicken or cooked shrimp, 
									if you like, and serve over cooked barley, wheat berries or rice, with a few toasted pitas to wipe up the bowl. 
									Dinner is on!
								</p>
								
								<p><h6>Vegetable Curry</h6></p>
								
								<p>
									Serves 4.<br/>
									Note: The jarred Thai curry pastes speed the prep time in this dish. Substitute yellow or green curry paste, 
									if you prefer, and adjust the quantity of lime juice or honey to taste. You can add leftover cooked chicken or shrimp 
									for a heartier meal. A few spoonfuls of honey and lime juice give it a kick. From Beth Dooley.<br/>

									• 1 tbsp. coconut or vegetable oil<br/>
									• 1 tbsp. red curry paste or more to taste (see Note)<br/>
									• 1 small onion, chopped<br/>
									• Salt and freshly ground black pepper<br/>
									• 1 c. vegetable or chicken stock<br/>
									• 1 c. unsweetened canned coconut milk or half and half<br/>
									• 4 to 5 c. fresh or frozen vegetables, cut into 2- to 3-in. pieces (carrots, cauliflower, red peppers, peas)<br/>
									• 1 c. cooked or canned chickpeas, rinsed and drained<br/>
									• 2 tbsp. honey, or to taste<br/>
									• 2 tbsp. fresh lime or lemon juice, to taste<br/>
									• Cooked barley, wheat berries or rice<br/>
									• Chopped fresh cilantro or parsley for garnish<br/>
								</p>
								
								<p>
									Directions<br/>
									In a large deep pot, heat the oil over medium-low heat and sauté the curry paste with the onion until it softens, about 2 to 3 minutes. Season with salt and pepper and stir in the stock, coconut milk, and the vegetables.
									Bring to a simmer and cook until the vegetables are just tender. The fresh vegetables will take about 8 to 10 minutes, the frozen vegetables will need only about 3 to 5 minutes.
									Add the chickpeas and season with the honey and lime juice to taste. Serve over cooked barley, wheat berries or rice. Garnish with the cilantro or parsley.<br/>
								</p>
								
								<p>
									Nutrition information per serving:<br/>
									Calories 210 Fat 6 g<br/>
									Sodium 440 mg Carbohydrates 36 g<br/>
									Saturated fat 4 g Added sugars 11 g<br/>
									Protein 7 g Cholesterol 0 mg<br/>
									Dietary fiber 7 g<br/>
									Exchanges per serving: 2 ½ carb, 1 medium-fat protein.
								</p>
							</div>
							
							<!-- Slide Up Button -->
							<button type="button" id ="hideArticle4Btn" class="btn btn-secondary btn-sm">Hide More</button>
							
						</article>
					</div>
				</li>
			</ul>
		</div>
		
		<!-- Page 6  -->
		<!-- Container 8 (Contact Us)-->
		<div class="container-fluid text-center text-light" id="contact" data-aos="fade-up">
			
			<h3>Contact Us</h3>
			
			<div class="row pt-4 mt-5">
				<div class="col-md-6 col-xs-12">
					<!-- Google Map -->
					<div class="embed-responsive embed-responsive-16by9">
					  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3055.3301291219846!2d-75.32313608461601!3d40.023408179412876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c6bff458d0b267%3A0x4f9303f4c1f24fa0!2s915%20Lancaster%20Ave%2C%20Bryn%20Mawr%2C%20PA%2019010%2C%20USA!5e0!3m2!1sen!2sgr!4v1586447095704!5m2!1sen!2sgr" 
								width="500" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
				</div>
				<div class="col-md-6 col-xs-12 mt-5">
					
					<!-- Contact Info -->
					<h4>Contact Address</h4>
					<p><i class="fa fa-home mr-2"></i>915 Lancaster Ave, Bryn Mawr, PA 19010, United States</p>
					<p><i class="fa fa-phone mr-2"></i>+1 215-398-0000</p>
					
					<!-- button that opens the Contact modal form -->
					<button class="btn btn-primary mt-4" data-toggle="modal" data-target="#contactModal">Contact Form</button>
				</div>
			</div>
		</div>
		
		<!-- Contact Modal -->
			<div class="modal text-dark" id="contactModal" data-backdrop="static">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Contact Form</h4>
							<button type="button" class="close" id ="closeXcontact" data-dismiss="modal">&times;</button>
						</div>
						
						<!-- Modal body ( = contact form) -->
						<?php
							if (isset($_SESSION['username'])) //if some user is logged in, then fill the name and email fields with the user's name & email
							{
								$name = '';
								$mail = '';
								$sql = "
										SELECT name, email
										FROM users
										WHERE username='".$_SESSION['username']."'
									   ";
								$res = $conn->query($sql);
								
								if ( $res->num_rows > 0) //if SQL Select has results to return
								{ 
									while ($row = $res->fetch_assoc()) 
									{
										$name = $row['name'];
										$mail = $row['email'];
									}	
								}
								else
								{ 
									 echo 'Oops! Something went wrong!';
								}
							
								echo '
								<div class="modal-body">
									<div id="contactStatus"></div>
									<div class="form-row">
										<div class="col-xs-12 mt-1">
											<input type="text" class="form-control" id="_name" value="'.$name.'" disabled>
											<small id="contactNameNotice" class="text-danger">Please enter your name!</small>
										</div>
										<div class="col-xs-12 mt-1">
											<input type="text" class="form-control" id="_mail" value="'.$mail.'" disabled>
											<small id="contactEmailNotice" class="text-danger">Please enter your e-mail!</small>
										</div>
									</div>
									<input type="text" class="form-control mt-2" id="_subject" placeholder="Subject" maxlength="200">
									<small id="contactSubjNotice" class="text-danger">Please enter a subject!</small>
									<textarea type="text" class="form-control mt-2 mb-3" id="_msg" placeholder="Message" rows="3"></textarea>
									<small id="contactMessageNotice" class="text-danger">Please enter your message!</small>
									<div class="form-row">
										<button id="msgSubmitBtn" type="button" class="btn btn-success ml-2">Submit</button>
									</div>
								</div>';
							}
							else //if user is a guest use the empty form
							{
								echo '
								<div class="modal-body">
									<div id="contactStatus"></div>
									<div class="form-row">
										<div class="col-xs-12 mt-1">
											<input type="text" class="form-control" id="_name" placeholder="Name">
											<small id="contactNameNotice" class="text-danger">Please enter your name!</small>
											<small id="validContactNameNotice" class="text-danger">Please enter a valid name!</small>
										</div>
										<div class="col-xs-12 mt-1">
											<input type="text" class="form-control" id="_mail" placeholder="e-mail">
											<small id="contactEmailNotice" class="text-danger">Please enter your e-mail!</small>
											<small class="text-danger" id="validContactEmailNotice">Please enter a valid e-mail address!</small>
										</div>
									</div>
									<input type="text" class="form-control mt-2" id="_subject" placeholder="Subject" maxlength="200">
									<small id="contactSubjNotice" class="text-danger">Please enter a subject!</small>
									<textarea type="text" class="form-control mt-2 mb-3" id="_msg" placeholder="Message" rows="3"></textarea>
									<small id="contactMessageNotice" class="text-danger">Please enter your message!</small>
									<div class="form-row">
										<button id="msgSubmitBtn" type="button" class="btn btn-success ml-2">Submit</button>
									</div>
								</div>';
							}
						?>
						
						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" id="closeContactBtn" class="btn btn-dark" data-dismiss="modal">Close</button>
						</div>

					</div>
				</div>
			</div>
		
		<!-- Footer -->
		<footer class="container-fluid text-dark p-3 text-center" id="footer">
			<small>1st Project - Web Programming 2019-2020.</small><br/>
			<small>Created by Despina Kozoni <a href="mailto:despinakoz@gmail.com">despinakoz@gmail.com</a></small>
			<small>All rights reserved. <i class="fa fa-copyright" aria-hidden="true"></i></small><br/>
			
			<!-- button which goes to adminPage.php in order to see the registered users' info -->
			<a href="adminPage.php" class="btn btn-outline-secondary btn-sm">Administration</a>
		</footer>
		
		<!-- This line initialize the AOS javascript code in order to have animation while scroll the webpage -->
		<!-- we write it here because it is the only 'position' that these javascript can run -->
		<!-- this animation works only for medium-large screens, we disable the animation for mobiles -->
		<script>AOS.init({disable:'mobile'});</script>
		
	</body>
</html>