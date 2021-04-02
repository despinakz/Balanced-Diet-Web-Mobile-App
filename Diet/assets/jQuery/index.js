// == jQuery Code == // 
	
// The '// ===== //
		// ===== //' lines below : devides different functionalities which used to the website in order to make the code easy to read!
	
	//When the DOM is ready
	$(function(){
		
// ==================================================================================================================== //
// ==================================================================================================================== //
		
		// Some css for human icons in the "Our Team" page
		$('.card img[alt="Team Member Image"]').css({'width':'30%', 'heigth':'30%'}); 
		
// ==================================================================================================================== //
// ==================================================================================================================== //
		
		// EYE-ICON FUNCTIONALITY (show-hide password) --> Sign In Form
		$('#hideShowPass').click(function(event){
			
			event.preventDefault(); //prevent/block the event --> the click does not happen
			
			if ($('#pass').attr('type') == 'text') // if password input type is text (password is visible from user)...
			{
				$('#pass').attr('type', 'password'); //...then change the input type to "password"
				$('#hideShowPass i').addClass('fa-eye-slash'); //...add class "fa-eye-slash" in icon near input field
				$('#hideShowPass i').removeClass('fa-eye'); //...and remove the class with name "fa-eye" in icon near input field
			}
			else if ($('#pass').attr('type') == 'password') // if password input type is password (password is NOT visible from user)...
			{
				$('#pass').attr('type', 'text'); //...then change the input type to "text"
				$('#hideShowPass i').addClass('fa-eye'); //...add class "fa-eye" in icon near input field
				$('#hideShowPass i').removeClass('fa-eye-slash'); //...and remove the class with name "fa-eye-slash" in icon near input field
			}
			
		});
		
		// EYE-ICON FUNCTIONALITY (show-hide password)--> Log-In Form 
		// The code below has the same funcionality and logic with the code above
		$('#hideShowPassLog').click(function(event){
			
			event.preventDefault(); //prevent/block the event --> the click does not happen
			
			if ($('#loginPass').attr('type') == 'text'){
				
				$('#loginPass').attr('type', 'password');
				$('#hideShowPassLog i').addClass('fa-eye-slash');
				$('#hideShowPassLog i').removeClass('fa-eye');
			}
			else if ($('#pass').attr('type') == 'password'){
				
				$('#loginPass').attr('type', 'text');
				$('#hideShowPassLog i').addClass('fa-eye');
				$('#hideShowPassLog i').removeClass('fa-eye-slash');
			}
			
		});
		
// ==================================================================================================================== //
// ==================================================================================================================== //
		
		// When the button of 'About Us' section is clicked, then we go to 'Our Team' section
		$('#ourTeamBtn').click(function(){
			location.href = 'index.php#ourTeam';
		});
		
// ==================================================================================================================== //
// ==================================================================================================================== //
		
		//When the logo-image of navbar is clicked, then we go to 'Who We Are?' section which is the first section of our page
		$('#logoImg').click(function(){
			location.href = 'index.php';
		});
		
// ==================================================================================================================== //
// ==================================================================================================================== //
		
		// The functionality below refairs to "Blog" Page, where we have 4 articles and each of them has a 'Show More' button.
		// When THIS button is clicked, then we show the whole article which was hidden before, and we show also a 'Hide More' button,in order to minimize the 
		//length of the article and hide the paragraphs which were shown when we clicked the 'Show More' button.
		
		//Maybe will use the bind()...?????
		
		// First we hide the paragraphs from each article, we hide the 'Hide More' buttons as well
		$('#showHideDiv1, #showHideDiv2, #showHideDiv3, #showHideDiv4').toggle(); // hide paragraphs 
		$('#hideArticle1Btn, #hideArticle2Btn, #hideArticle3Btn, #hideArticle4Btn').toggle(); // hide 'Hide More' buttons
		
		// ----------------FIRST ARTICLE----------------//
		$('#showArticle1Btn').click(function() // if the 'Show More' button is clicked...
		{
			$('#showHideDiv1').slideDown(); //...then show the hidden paragraphs with slide-down animation
			$(this).hide(); //...hide the 'Show More' button
			$('#hideArticle1Btn').toggle();  //...and show the 'Hide More' button
		});
		
		$('#hideArticle1Btn').click(function() // if the 'Hide More' button is clicked...
		{
			$('#showHideDiv1').slideUp(); //...then hide the shown paragraphs with slide-up animation
			$(this).hide(); //...hide the 'Hide More' button
			$('#showArticle1Btn').toggle(); //...and show the 'Show More' button
		});
		
		// ----------------SECOND ARTICLE----------------//
		// We have exactly the same functionality with the code above which refered to First Article
		$('#showArticle2Btn').click(function(){
			$('#showHideDiv2').slideDown();
			$(this).hide();
			$('#hideArticle2Btn').toggle();
		});
		
		$('#hideArticle2Btn').click(function(){
			$('#showHideDiv2').slideUp();
			$(this).hide();
			$('#showArticle2Btn').toggle();
		});
		
		// ----------------THIRD ARTICLE----------------//
		// We have exactly the same functionality with the code above which refered to First Article
		$('#showArticle3Btn').click(function(){
			$('#showHideDiv3').slideDown();
			$(this).hide();
			$('#hideArticle3Btn').toggle();
		});
		
		$('#hideArticle3Btn').click(function(){
			$('#showHideDiv3').slideUp();
			$(this).hide();
			$('#showArticle3Btn').toggle();
		});
		
		// ----------------FOURTH ARTICLE----------------//
		// We have exactly the same functionality with the code above which refered to First Article
		$('#showArticle4Btn').click(function(){
			$('#showHideDiv4').slideDown();
			$(this).hide();
			$('#hideArticle4Btn').toggle();
		});
		
		$('#hideArticle4Btn').click(function(){
			$('#showHideDiv4').slideUp();
			$(this).hide();
			$('#showArticle4Btn').toggle();
		});
		
// ==================================================================================================================== //
// ==================================================================================================================== //
		
		// The funcionality below refers to 'BMI' Page
		
		// Firstly we hide some notifications (that will be very useful for the validation of BMI input fields) 
		// These notices are:  fieldNotice --> 'Please fill out all inputs!'
							// zeroHeightNotice --> 'The height should not be zero!'
							// numericNoticeWeight --> 'The weight must be only number (not string)!'
							// numericNoticeHeight --> 'The height must be only number (not string)!'
						   // zeroWeightNotice --> 'The weight should not be zero!'
							//validHeightFormat --> 'The height has not valid format!'
							  
		$('#fieldNotice,#zeroHeightNotice,#numericNoticeWeight,#numericNoticeHeight,#zeroWeightNotice,#validHeightFormat').hide(); 
		
		//this value is the accepted pattern for 'height' input field and is going to be helpful for validation for the BMI form!
			// height pattern --> abstract format = [one number].[number/numbers]
		var heightPattern = /^[1-2]{1}\.[0-9]/; 
		
		$('#calcBtn').click(function(event) // When the 'Calculate' button is clicked...
		{
			//...then we save in variables what user selected or fill for each field (1 select and 2 input fields)
			var gender = $('#gender > option:selected').val(); // gender ( = <select>)
			var weight = $('#weight').val(); // weight ( = <input> field)
			var height = $('#height').val(); // height ( = <input> field)
			
			// VALIDATION FOR BMI Input Fields
			if ( (gender === '') || (weight === '') || (height === '') ) // If user don't select/fill any select/input field...
			{
				$('#fieldNotice').show(); //...then show field notice paragraph --> 'Please fill out all inputs!'
				event.preventDefault(); //...and prevent the event ( = the event won't happen)
				
				if  ((!$.isNumeric(weight)) && (weight != '')) // If weight or height are not numbers/numerics ( = user write characters)...
				{
					$('#numericNoticeWeight').show(); //... then show numeric notice about weight
					event.preventDefault(); //...and prevent the event ( = the event won't happen)
				}
				
				if ((!$.isNumeric(height)) && (height != '')){
				
					$('#numericNoticeHeight').show(); //... then show numeric notice about height
					event.preventDefault(); //...and prevent the event ( = the event won't happen)
				}
			}
			else if (height === '0') // If user fill the height input with zero (which will cause problem with BMI calculation formula)...
			{
				$('#zeroHeightNotice').show(); //...then show notice about zero height --> 'The height should not be zero!'
				event.preventDefault(); //...and prevent the event ( = the event won't happen)
			}
			else if (heightPattern.test(height) == false) // if height input has not the appopriate format as height (e.g 1.65)...
			{
				$('#validHeightFormat').show(); //..then show the notice about valid height
				event.preventDefault(); //..and prevent the event
			}
			else if (weight === '0') // If user fill the weight input with zero (which is not exists in reality)...
			{
				$('#zeroWeightNotice').show(); //...then show notice about zero weight --> 'The weight should not be zero!'
				event.preventDefault(); //...and prevent the event ( = the event won't happen)
			}
			else if ( (weight === '0') && (height === '0') && (gender != '') ) //if weight & height are zero
			{
				// show the appopriate notices
				$('#zeroWeightNotice').show();
				$('#zeroHeightNotice').show();
				
				event.preventDefault(); //...and prevent the event ( = the event won't happen)
			}
			else if  ((!$.isNumeric(weight)) && (!$.isNumeric(height)) )  // If weight and height are not numbers/numerics ( = user write characters)...
			{
				$('#numericNoticeWeight').show(); //... then show numeric notice about weight
				$('#numericNoticeHeight').show(); //... then show numeric notice about height
				event.preventDefault(); //...and prevent the event ( = the event won't happen)
			}
			else if  ((!$.isNumeric(weight)) && ($.isNumeric(height)) )  // If only weight is not number/numeric ( = user write characters)...
			{
				$('#numericNoticeWeight').show(); //... then show numeric notice about weight
				event.preventDefault(); //...and prevent the event ( = the event won't happen)
			}
			else if  ( ($.isNumeric(weight)) && (!$.isNumeric(height)) )  // If only height is not number/numeric ( = user write characters)...
			{
				$('#numericNoticeHeight').show(); //... then show numeric notice about height
				event.preventDefault(); //...and prevent the event ( = the event won't happen)
			}
			else if  (!$.isNumeric(weight))  // If weight doesn't contain numbers/numerics ( = user write characters)...
			{
				$('#numericNoticeWeight').show(); //... then show numeric notice about weight
				//$('#numericNoticeHeight').show(); //... then show numeric notice about height
				event.preventDefault(); //...and prevent the event ( = the event won't happen)
			}
			else // Otherwise...
			{
				//$('#fieldNotice').hide(); //...hide notice paragraph
				
				//...send the data from BMI form (select & input fields) to a php page via ajax call
				$.ajax({
					url: 'returnBMI.php', //php page
					type: 'POST', //use POST method
					dataType: 'html', //the result will have HTML form
					data: 'gender='+gender+'&weight='+weight+'&height='+height, //send gender,weight,height = data from input fields and select
					success: function(result) // if the ajax call occured successfully...
					{
						$('#bmiResults').html(result); //...then write the result which ajax call returned into a <div> with id='bmiResults'
						
					},
					failure: function() // if the ajax call occured unsuccessfully...
					{
						//console.log('Something went wrong!');
						
						$('#bmiResults').html('Something went wrong!'); //...write a notice-message into that <div>
					}
				});
				
			}

			
		});
		
		// When user click ( = focus) on any BMI input field then the notice messages are going to be hided
		$('#gender, #weight, #height').focus(function(){
			$('#fieldNotice').hide(); //hide notice paragraph
			$('#zeroHeightNotice').hide(); //hide notice about zero height
			$('#zeroWeightNotice').hide(); //hide notice about zero weight
			$('#validHeightFormat').hide(); //hide notice about valid height format 
			
			//hide numeric notices
			$('#numericNoticeWeight').hide(); 
			$('#numericNoticeHeight').hide(); 
			
			$('#bmiResults').empty(); //delete results from BMI calculation in order to not confuse user with results when he/she is going to 
										//write something in a BMI field or focus on some field
		});
		
// ==================================================================================================================== //
// ==================================================================================================================== //
		
		//When click one option from navbar, then the navbar-dropwown slides-up automatically (this is visible for small-medium device width)
		$('.nav-item').click(function(){
			$('.navbar-toggler').click();
		});
		
// ==================================================================================================================== //
// ==================================================================================================================== //
		
		// The functionality below refers to 'Sign-In' modal form
		
		
		// Firstly we hide notices about Sign-In form (that will be very useful for the validation of Sign-In form) 
		// Notices are : nameNotice --> 'Please enter your full name!'
					  // mailNotice --> 'Please enter your e-mail!'
					  // usernameNotice --> 'Please enter your username!'
					  // usernameExistanceNotice --> 'The username already exists!'
					  // passNotice --> 'Please enter your password and check it from the eye-icon!'
					  // validNameNotice --> 'Please enter a valid name!'
					  // validMailNotice --> 'Please enter a valid e-mail address!'
		$('#nameNotice,#mailNotice,#usernameNotice,#passNotice,#usernameExistanceNotice,#validNameNotice,#validMailNotice').hide();
		
		//this value is the accepted pattern for 'name' input field and is going to be helpful for validation for the 'Sign-In' & 'Contact' forms!
		var namePattern = new RegExp('^[a-zA-Z ]{3,76}$'); //permit only alphabetical characters snd space..also allow 3 to 76 characters
		
		//this value is the accepted pattern for 'email' input field and is going to be helpful for validation for the 'Sign-In' & 'Contact' forms!
		var emailPattern = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; // abstract email format --> [string]@[string].[string]
		
														
		//When the 'Submit' button (from Sign-In form modal) is clicked...
		$('#submitBtn').click(function(event){
			
			// First we take the input fields' values
			var name = $('#name').val(); // user's name
			var email = $('#mail').val(); // user's email
			var username = $('#username').val(); // user's username
			var password = $('#pass').val(); // user's password
			
			
			
			//If the submit button of Sign In form is clicked and some or all inputs are epmty, then prevent the event 
				//and 'urge' the user to fill all input fields --> kind of form VALIDATION before ajax-call (maybe with bind???)
			
			if ( (name === '')&&(email === '')&&(username === '')&&(password === '') ) // If user don't fill any input field...
			{
				$('#nameNotice,#mailNotice,#usernameNotice,#passNotice').show(); //...then show all notices (that were hidden before)
				$('#name,#mail,#username,#pass').addClass('is-invalid');  //...and add class='is-invalid' to each input( = red frame around each field)
			}
			
			
			if ( name === '' ) // if name field is empty ( = user didn't fill this field)...
			{
				$('#nameNotice').show(); //...then show the name notice --> 'Please enter your full name!'
				event.preventDefault(); //...and prevent the click event
			}
			else if (namePattern.test(name) == false) // If name dosesn't contain numbers or/and special characters (except from space)...
			{	
				// --- VALIDATION fot 'name' input field in form 'Sign-In' --- //
				$('#validNameNotice').show(); //..show the appopriate notice
				$('#name').addClass('is-invalid'); //...and add class='is-invalid' to this input( = red frame around this field)
				event.preventDefault(); //...and prevent the click event
			}
			else if ( email === '') // If email field is empty ( = user didn't fill this field)...
			{
				$('#mailNotice').show(); //...then show the email notice --> 'Please enter your e-mail!'
				event.preventDefault(); //...and prevent the click event
			}
			else if (emailPattern.test(email) == false) // If email dosesn't has the appopriate format as e-mail address..
			{	
				// --- VALIDATION fot 'email' input field in form 'Sign-In' --- //
				$('#validMailNotice').show(); //..show the appopriate notice
				$('#mail').addClass('is-invalid'); //...and add class='is-invalid' to this input( = red frame around this field)
				event.preventDefault(); //...and prevent the click event
			}
			else if ( username === '') // if username field is empty ( = user didn't fill this field)...
			{
				$('#usernameNotice').show(); //...then show the username notice --> 'Please enter your username!'
				event.preventDefault(); //...and prevent the click event
			}
			else if ( password === '') // if password field is empty ( = user didn't fill this field)...
			{
				$('#passNotice').show(); //...then show the password notice --> 'Please enter your password and check it from the eye-icon!'
				event.preventDefault(); //...and prevent the click event
			}
			else // Otherwise...
			{
				//...send data ( = input fields from Sign-In form) to server via ajax call
				$.ajax({
						url: 'signIn.php', // php page we will send the data
						type: 'POST', //use POST method
						dataType: 'html', ////the result will have HTML form
						data: 'name='+name+'&email='+email+'&username='+username+'&password='+password, //data ( = user's inputs from form)
						success: function(result) // if the ajax call occured successfully...
						{
							if (result == '1') //if username is already exists in DB...
							{
								$('#usernameExistanceNotice').show(); //...then show the appopriate notice about username existance
								$('#username').addClass('is-invalid'); //...and add class='is-invalid' which creates a red frame around username input field 
																			
							}
							else //if username is NOT exists...
							{
								$('#regStatus').show(); //...then make the <div> visible
								$('#regStatus').html(result); //...write in this <div> the ajax-call returned data
								$('#regStatus').fadeOut(2200); //...div-content is shown firstly and we hide it after, by using fade out animation
								
								// finally clear the input fields & remove class 'is-valid'
								$('#name, #mail, #username, #pass').val(''); //clear inputs
								$('#name, #mail, #username, #pass').removeClass('is-valid'); //delete class = is-valid (green frame around input field
																								//is going to be deleted)
							}
							
							
						},
						failure: function() // if the ajax call occured unsuccessfully...
						{
							//console.log('Something went wrong!');
							
							$('#regStatus').html('Something went wrong!'); //...write a notice-message into that <div>
						}
					});
					
					
			}
		});
		
		// When user FOCUS on a specific input field from Sign-In modal form, then hide the appopriate notice (naybe needs bind????)
		
		// ---NAME INPUT FIELD (focus event)--- //
		$('#name').focus(function(){ //input field: name (when user focus on that field)
			$('#nameNotice').hide(); //..then hide the name notice
			$('#validNameNotice').hide(); //..hide the appopriate notice about valid name
			$(this).removeClass('is-invalid'); //remove class 'is-invalid' (remove red frame around input field)
			$(this).removeClass('is-valid'); //remove class 'is-valid' (remove green frame around input field)
		});
		
		// ---EMAIL INPUT FIELD (focus event)--- //
		$('#mail').focus(function(){ //input field: e-mail (when user focus on that field)
			$('#mailNotice').hide(); //..then hide the mail notice
			$('#validMailNotice').hide(); //..hide the appopriate notice about valid email address
			$(this).removeClass('is-invalid');//remove class 'is-invalid' (remove red frame around input field)
			$(this).removeClass('is-valid'); //remove class 'is-valid' (remove green frame around input field)
		});
		
		// ---USERNAME INPUT FIELD (focus event)--- //
		$('#username').focus(function(){ //input field: username (when user focus on that field)
			$('#usernameNotice').hide(); //..then hide the username notice
			$('#usernameExistanceNotice').hide(); //..then hide the notice about username existance
			$(this).removeClass('is-invalid'); //remove class 'is-invalid' (remove red frame around input field)
			$(this).removeClass('is-valid'); //remove class 'is-valid' (remove green frame around input field)
		});
		
		// ---PASSWORD INPUT FIELD (focus event)--- //
		$('#pass').focus(function(){ //input field: password (when user focus on that field)
			$('#passNotice').hide(); //..then hide the password notice
			$(this).removeClass('is-invalid'); //remove class 'is-invalid' (remove red frame around input field)
			$(this).removeClass('is-valid'); //remove class 'is-valid' (remove green frame around input field)
		});
		
		
		
		// If user LOST THE FOCUS of a specific field from Sign-In modal form & the field is empty, then the appopriate notice it is shown again
		
		// ---NAME INPUT FIELD (blur event)--- //
		$('#name').blur(function(){ //input field: name (when user lost focus ( = blur) on that field)
			
			if ($(this).val() == ''){ // if name input field is empty...
				$('#nameNotice').show(); //... then show the name notice message
				$(this).addClass('is-invalid'); //...and add a red frame around this field (class='is-invalid')
			}
			else{ //otherwise
				
				if (namePattern.test($(this).val()) == false){ //if user wrote something that is not valid as a name (based on regex pattern)
					
					$('#validNameNotice').show(); //..show the appopriate notice
					$('#name').addClass('is-invalid'); //...and add class='is-invalid' to this input( = red frame around the field)
				}
				else{ // otherwise if user wrote something that is valid as a name (based on regex patterns)
					$('#name').addClass('is-valid'); //...add a green frame around this field (class='is-valid')
				}
			}
		});
		
		// ---EMAIL INPUT FIELD (blur event)--- //
		$('#mail').blur(function(){ //input field: e-mail (when user lost focus ( = blur) on that field)
			
			if ($(this).val() == ''){ // if mail input field is empty...
				$('#mailNotice').show(); //... then show the mail notice message
				$(this).addClass('is-invalid'); //...and add a red frame around this field (class='is-invalid')
			}
			else{ //otherwise
				
				if (emailPattern.test($(this).val()) == false){ //if user wrote an e-mail with "unappopriate" format (according to regex pattern)
					
					$('#validMailNotice').show(); //..show the appopriate notice about valid mail address
					$('#mail').addClass('is-invalid'); //...and add class='is-invalid' to input( = red frame around the field)
				}
				else{ //otherwise..
					$('#mail').addClass('is-valid'); //...add a green frame around this field (class='is-valid')
				}
			}
		});
		
		// ---USERNAME INPUT FIELD (blur event)--- //
		$('#username').blur(function(){ //input field: username (when user lost focus ( = blur) on that field)
			if ($(this).val() == ''){ // if username input field is empty...
				$('#usernameNotice').show(); //... then show the username notice message
				$(this).addClass('is-invalid'); //...and add a red frame around this field (class='is-invalid')
			}
			else{ //otherwise
				$('#username').addClass('is-valid'); //...add a green frame around this field (class='is-valid')
			}
		});
		
		// ---PASSWORD INPUT FIELD (blur event)--- //
		$('#pass').blur(function(){ //input field: password (when user lost focus ( = blur) on that field)
			if ($(this).val() == ''){ // if password input field is empty...
				$('#passNotice').show(); //... then show the password notice message
				$(this).addClass('is-invalid'); //...and add a red frame around this field (class='is-invalid')
			}
			else{ //otherwise
				$('#pass').addClass('is-valid'); //...add a green frame around this field (class='is-valid')
			}
		});
		
		
		// When the Reset,Close or 'X' button from Sign-In modal form is clicked, then clear all input values 
		$('#reset, #closeSignInModal, #closeXSign').click(function(){
			
			$('#name, #mail, #username,#pass').val(''); //replace each input field with space (= clear values)
			$('#regStatus').empty(); //also reset/clear whatever is inside of div with id="regStatus"
			$('#nameNotice,#mailNotice,#usernameNotice,#passNotice,#usernameExistanceNotice,#validNameNotice,#validMailNotice').hide(); //hide all notices 
			$('#name,#mail,#username,#pass').removeClass('is-invalid'); //remove red frame around input fields
			$('#name,#mail,#username,#pass').removeClass('is-valid'); //remove green frame around input fields
		
		});
		
// ==================================================================================================================== //
// ==================================================================================================================== //
		
		// The functionality below refers to 'Log-In' modal form
		
		
		// Firstly we hide notices about Log-In form (that will be very useful for the validation of Log-In form) 
		// Notices are : loginUsernameNotice --> Please enter your username!
						// loginPassNotice --> 'Please enter your password and check it from the eye-icon!'
		$('#loginUsernameNotice,#loginPassNotice').hide();
		
		
		// When the 'Submit' button (from Login-In form modal) is clicked...
		$('#loginBtn').click(function(event){
			
			// First we take the input fields' values
			var username = $('#loginUsername').val(); // user's userame
			var password = $('#loginPass').val(); // user's password
			
			
			//If the login button of Log In form is clicked and some or all inputs are epmty, then prevent the event 
				//and 'urge' the user to fill all input fields --> kind of form VALIDATION before ajax-call (maybe with bind?)
			if ( (username === '')&&(password === '') ){ // if username & passsword fields are empty...
				$('#loginUsernameNotice,#loginPassNotice').show(); //...then show all notices
				$('#loginUsername,#loginPass').addClass('is-invalid'); //...and create a red frame around input fields
			}
			
			
			if ( username === ''){ // if username input field is empty...
				$('#loginUsernameNotice').show(); //...then show username notice
				event.preventDefault(); //..and prevent the click event
			}
			else if ( password === ''){ // if password input field is empty...
				$('#loginPassNotice').show(); //...then show password notice
				event.preventDefault(); //..and prevent the click event
			}
			else{ //Otherwise...
				//...send data (username & password that user entered) to server via ajax call
				$.ajax({
						url: 'logIn.php',
						type: 'POST',
						dataType: 'html',
						data: 'username='+username+'&password='+password,
						success: function(result){ // if the ajax call occured successfully...
							
							if (result != '') //if result is not space (= ajax has data to return)
								$('#loginStatus').html(result); //fill the <div> with what ajax-call returned
							else //otherwise 
								window.location = 'index.php'; //redirect to main page
								//location.reload();
							
							
							//finally clear the input fields & remove class 'is-valid'
							//$('#loginUsername, #loginPass').val(''); //clear inputs
							//$('#loginUsername, #loginPass').removeClass('is-valid'); //delete class = is-valid
							
						},
						failure: function(){ // if the ajax call occured unsuccessfully...
							//console.log('Something went wrong!');
							
							$('#loginStatus').html('Something went wrong!'); //...write a notice-message into that <div>
						}
					});
					
					
			}
		});
		
		//When user FOCUS on a specific input field from Log In modal form, then hide the appopriate notice (naybe needs bind)
		
		// ---USERNAME INPUT FIELD (focus event)--- //
		$('#loginUsername').focus(function(){ //input field: username
			$('#loginUsernameNotice').hide();
			
			//remove classes 'is-invalid' & 'is-valid'
			$(this).removeClass('is-invalid');
			$(this).removeClass('is-valid');
			
			$('#loginStatus').empty(); //clear the content of <div> where ajax call returns data maybe from another section
		});
		
		// ---PASSWORD INPUT FIELD (focus event)--- //
		$('#loginPass').focus(function(){ //input field: password
			$('#loginPassNotice').hide();
			
			//remove classes 'is-invalid' & 'is-valid'
			$(this).removeClass('is-invalid');
			$(this).removeClass('is-valid');
			
			$('#loginStatus').empty(); //clear the content of <div> where ajax call returns data
		});
		
		//if user LOST THE FOCUS (ΒLUR) of a specific field from Log In modal form & the field is empty, then the appopriate notice it is shown again
		
		// ---USERNAME INPUT FIELD (blur event)--- //
		$('#loginUsername').blur(function(){ //input field: username
			if ($(this).val() == ''){
				$('#loginUsernameNotice').show();
				$(this).addClass('is-invalid');
			}
			else{
				$('#loginUsername').addClass('is-valid'); 
			}
		});
		
		// ---PASSWORD INPUT FIELD (blur event)--- //
		$('#loginPass').blur(function(){ //input field: password
			if ($(this).val() == ''){
				$('#loginPassNotice').show();
				$(this).addClass('is-invalid');
			}
			else{
				$('#loginPass').addClass('is-valid'); 
			}
		});
		
		//When the Close or 'X' button from Login form is clicked, then clear all input values 
		$('#closeLogInModal, #closeXLog').click(function(){
			$('#loginUsername,#loginPass').val(''); //clear input fields values
			$('#loginUsernameNotice,#loginPassNotice').hide(); //hide all notices 
			
			//remove classes 'is-invalid' & 'is-valid' from all input fields
			$('#loginUsername,#loginPass').removeClass('is-invalid'); 
			$('#loginUsername,#loginPass').removeClass('is-valid'); 
			
			$('#loginStatus').empty(); //remove any ajax result that returned in that div 
			
		});
		
// ==================================================================================================================== //
// ==================================================================================================================== //
		
		// The functionality below refers to 'Contact' modal form
		
		//Fistly we hide all notices about contact form (that will be very useful for the validation of Contact form) 
		// Notices are : contactNameNotice --> 'Please enter your name!'
						//contactEmailNotice --> 'Please enter your e-mail!'
						//contactSubjNotice --> 'Please enter a subject!'
						//contactMessageNotice --> 'Please enter your message!'
						// validContactNameNotice --> 'Please enter a valid name!'
						// validContactEmailNotice --> 'Please enter a valid e-mail address!'
		$('#contactNameNotice,#contactEmailNotice,#contactSubjNotice,#contactMessageNotice,#validContactNameNotice,#validContactEmailNotice').hide();
		
		// When the 'Submit' button (Contact Form modal button) is clicked...
		$('#msgSubmitBtn').click(function(event){
			
			//...then take the inputs of the form
			var name = $('#_name').val(); //name input field
			var mail = $('#_mail').val(); // email input field
			var subj = $('#_subject').val(); //subject input field
			var mess = $('#_msg').val(); // message input field
			
			//if all inputs have no values, then show all the contact notices
			if ( (name == '') && (mail == '') && (subj == '') && (mess == '') ) {
				event.preventDefault(); //..and prevent the click event 
				$('#contactNameNotice,#contactEmailNotice,#contactSubjNotice,#contactMessageNotice').show(); //show notices
				$('#_name,#_mail,#_subject,#_msg').addClass('is-invalid'); //and create red frame around all input fields
			}
			
			// if only subject and message input fields are empty (--> it happens only if some user is logged in)
			if ( (subj == '') && (mess == '') ) {
				event.preventDefault(); //prevent the click event 
				$('#contactSubjNotice,#contactMessageNotice').show(); //show subject & message notices
				$('#_subject,#_msg').addClass('is-invalid'); //and create red frame around subject & message input fields
			}
			
			
			if ( name === '' ){ // If name input field is empty...
				$('#contactNameNotice').show(); //...then show the name notice
				$('#_name').addClass('is-invalid'); //..create a red frame around input field
				event.preventDefault(); //..and prevent the click event (it won't happen)
			}
			else if (namePattern.test(name) == false) // If name dosesn't contain numbers or/and special characters (except from space!)...
			{	
				// --- VALIDATION fot 'name' input field in form 'Contact' --- //
				$('#validContactNameNotice').show(); //..show the appopriate notice
				$('#_name').addClass('is-invalid'); //...and add class='is-invalid' to this input( = red frame around the field)
				event.preventDefault(); //...and prevent the click event
			}
			else if ( mail === ''){ // If mail input field is empty...
				$('#contactEmailNotice').show(); //...then show the mail notice
				$('#_mail').addClass('is-invalid'); //..create a red frame around input field
				event.preventDefault(); //..and prevent the click event (it won't happen)
			}
			else if (emailPattern.test(mail) == false) // If email doesn't has the appopriate format as e-mail address..
			{	
				// --- VALIDATION fot 'email' input field in form 'Sign-In' --- //
				$('#validContactEmailNotice').show(); //..show the appopriate notice about valid mail address
				$('#_mail').addClass('is-invalid'); //...and add class='is-invalid' to this input( = red frame around the field)
				event.preventDefault(); //...and prevent the click event
			}
			else if ( subj === ''){ // If subject niput field is empty...
				$('#contactSubjNotice').show(); //...then show the subject notice
				$('#_subject').addClass('is-invalid'); //..create a red frame arounf input field
				event.preventDefault(); //..and prevent the click event (it won't happen)
			}
			else if ( mess === ''){ // If message niput field is empty...
				$('#contactMessageNotice').show(); //...then show the message notice
				$('#_msg').addClass('is-invalid'); //..create a red frame arounf input field
				event.preventDefault(); //..and prevent the click event (it won't happen)
			}
			else{ //Otherwise...send data (contact form input fields) to server via ajax call
				
				$.ajax({
					url: 'insertMessage.php',
					type: 'POST',
					dataType: 'html',
					data: 'name='+name+'&email='+mail+'&subject='+subj+'&message='+mess, // values of input fields
					success: function(result){
						$('#contactStatus').show();
						$('#contactStatus').html(result); //fill this <div> with results which ajax-call returns
						$('#contactStatus').fadeOut(2200); //when message (ajax-call data) is shown, then we hide it by using fade out animation
						
						//finally clear the input fields & remove class 'is-valid'
						$('#_subject,#_msg').val(''); //clear inputs only message & subject
						$('#_name,#_mail,#_subject,#_msg').removeClass('is-valid'); //delete class = is-valid
						
					},
					failure: function() //if something goes wrong with ajax-call then show an appopriate message
					{
						//console.log('Something went wrong!');
						
						$('#contactStatus').html('Something went wrong!');
					}
				});
				
					
			}
			
			
		});
		
		//When user FOCUS ON a aspecific input field from Contact modal form, then hide the appopriate notice (naybe needs bind????)
		
		// ---NAME INPUT FIELD (focus event)--- //
		$('#_name').focus(function(){ //when focus on input field: name
			$('#contactNameNotice').hide(); //hide the name notice
			$('#validContactNameNotice').hide(); //..hide the appopriate notice about valid name
			
			// remove the 'is-valid' & 'is-invalid' (remove the green & red frame around input field respectively)
			$(this).removeClass('is-invalid');
			$(this).removeClass('is-valid');
		});
		
		// ---EMAIL INPUT FIELD (focus event)--- //
		$('#_mail').focus(function(){ //when focus on input field: email
			$('#contactEmailNotice').hide(); //hide the mail notice
			$('#validContactEmailNotice').hide(); //hide the mail notice about valid e-mail address
			
			// remove the 'is-valid' & 'is-invalid' (remove the green & red frame around input field respectively)
			$(this).removeClass('is-invalid');
			$(this).removeClass('is-valid');
		});
		
		// ---SUBJECT INPUT FIELD (focus event)--- //
		$('#_subject').focus(function(){ //when focus on input field: subject
			$('#contactSubjNotice').hide(); //hide the subject notice
			
			// remove the 'is-valid' & 'is-invalid' (remove the green & red frame around input field respectively)
			$(this).removeClass('is-invalid');
			$(this).removeClass('is-valid');
		});
		
		// ---MESSAGE INPUT FIELD (focus event)--- //
		$('#_msg').focus(function(){ //when focus on input field: mail
			$('#contactMessageNotice').hide(); //hide the message notice
			
			// remove the 'is-valid' & 'is-invalid' (remove the green & red frame around input field respectively)
			$(this).removeClass('is-invalid');
			$(this).removeClass('is-valid');
		});
		
		//if user LOST THE FOCUS (BLUR) of a specific field from Contact Form modal form & the field is empty, then the appopriate notice it is shown again
		
		// ---NAME INPUT FIELD (blur event)--- // 
		$('#_name').blur(function(){ 
			if ($(this).val() == ''){ // if name input field is empty..
				$('#contactNameNotice').show(); //..then show the appopriate notice asbout that input
				$(this).addClass('is-invalid'); //..and add class 'is-invalid' --> red frame around input field
			}
			else{ //otherwise..
				
				if (namePattern.test($(this).val()) == false){ //if user wrote something and it contains number or/and special characters
					
					$('#validContactNameNotice').show(); //..show the appopriate notice
					$(this).addClass('is-invalid'); //...and add class='is-invalid' to each input( = red frame around each field)
				}
				else{
					
					$(this).addClass('is-valid'); //..add class 'is-valid' --> green frame around input field
				}
			}
		});
		
		// ---EMAIL INPUT FIELD (blur event)--- //
		$('#_mail').blur(function(){ 
			if ($(this).val() == ''){ // if email input field is empty..
				$('#contactEmailNotice').show(); //..then show the appopriate notice asbout that input
				$(this).addClass('is-invalid'); //..and add class 'is-invalid' --> red frame around input field
			}
			else{ //otherwise..
				
				if (emailPattern.test($(this).val()) == false){ //if user wrote an e-mail with "unappopriate" format
					
					$('#validContactEmailNotice').show(); //..show the appopriate notice
					$(this).addClass('is-invalid'); //...and add class='is-invalid' to this input( = red frame around the field)
				}
				else{
					$(this).addClass('is-valid'); //..add class 'is-valid' --> green frame around input field
				}
			}
		});
		
		// ---SUBJECT INPUT FIELD (blur event)--- //
		$('#_subject').blur(function(){ 
			if ($(this).val() == ''){ // if subject input field is empty..
				$('#contactSubjNotice').show(); //..then show the appopriate notice asbout that input
				$(this).addClass('is-invalid'); //..and add class 'is-invalid' --> red frame around input field
			}
			else{ //otherwise..
				$(this).addClass('is-valid'); //..add class 'is-valid' --> green frame around input field
			}
		});
		
		// ---MESSAGE INPUT FIELD (blur event)--- //
		$('#_msg').blur(function(){
			if ($(this).val() == ''){ // if message input field is empty..
				$('#contactMessageNotice').show(); //..then show the appopriate notice asbout that input
				$(this).addClass('is-invalid'); //..and add class 'is-invalid' --> red frame around input field
			}
			else{ //otherwise..
				$(this).addClass('is-valid'); //..add class 'is-valid' --> green frame around input field
			}
		});
	
		//When the Close or 'X' button from Cotact form is clicked, then clear all input values 
		$('#closeContactBtn, #closeXcontact').click(function(){
			$('#_subject,#_msg').val(''); //cclear inputs only message & subject 
			$('#contactNameNotice,#contactEmailNotice,#contactSubjNotice,#contactMessageNotice,#validContactNameNotice,#validContactEmailNotice').hide(); //hide all notices 
			
			//remove classes below (red & green frame around inputs)
			$('#_name,#_mail,#_subject,#_msg').removeClass('is-invalid'); 
			$('#_name,#_mail,#_subject,#_msg').removeClass('is-valid'); 
			
			$('#contactStatus').empty(); //remove any ajax result that returned in that <div>
			
		});
		
		
		
// ==================================================================================================================== //
// ==================================================================================================================== //
		
	});