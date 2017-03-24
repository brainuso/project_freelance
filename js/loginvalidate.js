	//login form validation /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	
	function validateUser(){
		var user = document.getElementById("user").value;
		var mailformat =  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var nameformat = /^[a-zA-Z0-9]/;
		
		if (user ==""){
			document.getElementById("user-error").innerHTML = '<span class="fa fa-times text-warning"> Please enter username or email</span>';
		} else if (user.length > 5){
			 if(mailformat.test(user))  {
			document.getElementById("user-error").innerHTML = '<span class="fa fa-check text-success"> Valid Email</span>';
			}else if(nameformat.test(user)) {
			document.getElementById("user-error").innerHTML = '<span class="fa fa-check text-success"> Valid Username</span>';
			} else{
			document.getElementById("user-error").innerHTML = '<span class="text-danger fa fa-times"> Wrong username</span>';}
		}else{
		document.getElementById("user-error").innerHTML = '<span class="fa fa-times text-warning"> Username should be over 5 characters</span>';}
			
		 
			
	}
	
	function valPassword(){
		var pass = document.getElementById("pass").value;
		if (pass ==""){
		 document.getElementById("pass-error").innerHTML = '<span class="fa fa-times text-warning"> Please enter password</span>';
		}else if (pass.length > 6){
			
			 if ((pass == "password")||(pass == "Password")||(pass == "password123")||(pass == "Password123")){
			 document.getElementById("pass-error").innerHTML = '<span class="text-warning fa fa-times "> Please, even I know your Password :p </span>';
			 }else {
				 document.getElementById("pass-error").innerHTML = '<span class="fa fa-check text-success">Correct password Length</span>';
			 }
		}else {
			 document.getElementById("pass-error").innerHTML = '<span class="text-warning fa fa-times "> Passwords must be at least 6 characters and above</span>';
		}
	}