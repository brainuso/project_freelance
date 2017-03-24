<?php //email account confirmation
 include 'includes/function.php';
 $keys = sanitizeString($_GET['passkey']);
 $sql  = selectMysql($pdo, "SELECT * FROM temp_user WHERE confirm_code = '$keys'");
 if ($sql->rowCount() == 1){
			while($lists = $sql->fetch(PDO::FETCH_NUM)){
			$user_id  = $lists[1];
			$username = $lists[2];
			$email  = $lists[3];
			$password = $lists[4];
			$location = $lists[5];
			$storyline = $list [7];
			$sql2 = queryMysql($pdo, "INSERT INTO user_biodata SET userid='$user_id', username='$username',
			email='$email', password='$password', location='$location'");
			
			if ($sql2 == TRUE){
			$sql3 = queryMysql($pdo, "DELETE FROM temp_user WHERE confirm_code = '".$keys."'");

			$_SESSION['ID'] = md5(microtime().$_SERVER['REMOTE_ADDR']);
									$_SESSION['userID'] = $user_id;
									$_SESSION['username']= $username;
								$_SESSION['password']=$password;
								$_SESSION['email']=$email;
								$_SESSION['storyline']=$storyline;
								$_SESSION['location']=$location;
								$_SESSION['linker']="signup";
			header("Location:".$_SESSION['username']."");
			}else {
			echo ' Failed to activate account. Please sign up again <a href="login/signup.html">Sign Up</a>';
			}
			}
}
else  {
		echo 'Wrong Activation Code. Please sign up again<a href="login/signup.html">Sign Up</a>';
		}
?>