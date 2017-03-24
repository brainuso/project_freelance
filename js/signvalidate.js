//sign up validation
	 function validateName(){
		var user = document.getElementById("username").value;
		var nameformat = /^[a-zA-Z0-9]/;
		
		if (user ==""){
			document.getElementById("username-error").innerHTML = '<span class="fa fa-times text-warning"> Please enter username or email</span>';
		} else if (user.length > 5){
			 if(nameformat.test(user)) {
			document.getElementById("username-error").innerHTML = '<span class="fa fa-check text-success"> Valid Username</span>';
			} else{
			document.getElementById("username-error").innerHTML = '<span class="text-danger fa fa-times"> Incorrect username</span>';
			}
		}else{
		document.getElementById("username-error").innerHTML = '<span class="fa fa-times text-warning"> Username must be over 5 characters</span>';
		}
	}
	 
	
	
	function validateEmail(){
	 var email = document.getElementById("email").value;
	 var mailformat =  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	 
	 if (email ==""){
		document.getElementById("email-error").innerHTML = '<span class="text-warning fa fa-times"> Please enter email</span>'
	 } else if(mailformat.test(email))  {
			document.getElementById("email-error").innerHTML = '<span class="fa fa-check text-success"> Valid Email</span>';
			}else{
			document.getElementById("email-error").innerHTML = '<span class="text-danger fa fa-times"> Invalid email, check again</span>';}
	}
	
	function validatePassword(){
		var pass = document.getElementById("password").value;
		var pass2 = document.getElementById("password2").value;
		if (pass ==""){
		 document.getElementById("password-error").innerHTML = '<span class="fa fa-times text-warning"> Please enter password</span>';
		}else if (pass.length > 6){
			
			 if ((pass == "password")||(pass == "Password")||(pass == "password123")||(pass == "Password123")){
			 document.getElementById("password-error").innerHTML = '<span class="text-warning fa fa-times "> Please, even I know your Password :p </span>';
			 }else {
				 document.getElementById("password-error").innerHTML = '<span class="fa fa-check text-success">Correct password Length</span>';
			 }
		}else {
			 document.getElementById("password-error").innerHTML = '<span class="text-warning fa fa-times "> Passwords must be at least 6 characters and above</span>';
		}
			
		if (pass2 ==""){
		 document.getElementById("password2-error").innerHTML = '<span class="fa fa-times text-warning"> Please enter password</span>';
		}else if(pass == pass2){
		document.getElementById("password2-error").innerHTML = '<span class="fa fa-check text-success"> Password match</span>';
		}else if (!(pass == pass2)){
			document.getElementById("password2-error").innerHTML = '<span class="fa fa-times text-warning"> Passwords do not match, Please re-enter password</span>';
		}
		}
		
		function validateLocation(){
			var loc = document.getElementById("location").value;
			if (loc == ""){
				document.getElementById("location-error").innerHTML = '<span class="text-danger fa fa-times"> Please select a Location</span>';
			} else if(loc == "Select Location") {
				document.getElementById("location-error").innerHTML = '<span class="text-warning fa fa-times"> Select Location is not a location</span>';
			} else {
			document.getElementById("location-error").innerHTML = '<span class="text-success fa fa-check"> Location noted</span>';}
			}
		
		function validateAccept(){
		
		 
		 if (document.getElementById("accept").checked == true){ 
				document.getElementById("accept-error").innerHTML = '<span class="text-success fa fa-check"> Thank You</span>';
		 } else {
			document.getElementById("accept-error").innerHTML = '<span class="text-warning fa fa-check"> Please tick the box</span>';
		}
		}


   