<?php // user profile.php
include 'includes/function.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['username'])){
	$username = sanitizeString($_GET['username']);
	
	//check username matches session value and session value isset
	if($username != $_SESSION['username'] || !isset($_SESSION['username'])){
		header("Location:login/login.html");
	}
	else{
		include 'dashboard.html';
	}
}
else{
	header("Location:login/login.html");
}
		


	
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['storyline'])){
	$text = sanitizeString($_POST['storyline']);
	$textsql = queryMysql($pdo, "UPDATE  user_biodata SET  storyline ='".$text."' WHERE  user_biodata.username ='".$username."'");

	if (!$textsql){
		$story_error = "Sorry re-enter storyline";
		include ("dashboard.html");
	}else{
	
	 $_SESSION['storyline']= $text;
		header("Location:dashboard.html");
	}
}	
elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action']== 'Submit'){
// Bail out if the file isn't really an upload
if ($_FILES['upload']['tmp_name'] == ""){
$picture_error = 'There was no file uploaded!';
include "dashboard.html";
} 
elseif (isset($_FILES['upload']['name'])){
	
	$rnd_id2 = random(32);
	 $photo = $_FILES['upload']['name'];
	
	$photo = explode('.', "$photo");
	
	 $ext = $photo[1];
	
	 if ( $ext == "jpg" || $ext == "png" || $ext == "PNG" || $ext == "jpeg" || $ext == "gif" || $ext =="JPG"){
				 $saveto = "/users/profile/img/".time()."_"."$rnd_id2"."_"."$nameid.$ext";
		move_uploaded_file($_FILES['upload']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $saveto);
		$typeok = TRUE;
		switch($_FILES['upload']['type']){
case "upload/gif": $ext= ".gif"; $src = imagecreatefromgif($saveto); break;
case "upload/jpeg":  $ext= ".jpg";// Allow both regular and progressive jpegs
case "upload/pjpeg":  $ext= ".jpg"; $src = imagecreatefromjpeg($saveto); break;
case "upload/png":  $ext= ".png"; $src = imagecreatefrompng($saveto); break;
default: $typeok = FALSE; break;
}
		if ($typeok){
			list($w, $h) = getimagesize($saveto);
			$max = 100;//previous value 100
			$tw = $w;
			$th = $h;
				if ($w > $h && $max < $w){
					$th = $max / $w * $h;
					$tw = $max;
				}elseif ($h > $w && $max < $h){
					$tw = $max / $h * $w;
					$th = $max;
					}elseif ($max < $w){
						$tw = $th = $max;
						}
$tmp = imagecreatetruecolor($tw, $th);
imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
imageconvolution($tmp, array(array(−1, −1, −1),
array(−1, 16, −1), array(−1, −1, −1)), 8, 0);
imagejpeg($tmp, $saveto);
imagedestroy($tmp);
imagedestroy($src);

}
$uploadfile = $_FILES['upload']['tmp_name'];
$uploadname = $_FILES['upload']['name'];
$uploadtype = $_FILES['upload']['type'];
$uploaddesc = "user-profile";
//later change the source path when testing on the net

$src = "http://".$site_url.$saveto;
	$uploadname = sanitizeString($uploadname);
	
	$image_query = queryMysql($pdo, "INSERT INTO filestore SET filename='$uploadname', mimetype='$uploadtype', description='$uploaddesc', filepath='$src', authorid='$nameid'");
	header("Location:dashboard.html");
	
	
		
		
	 } 
	 else {
	echo "we have a problem";
		
		 header("Location:dashboard.html");
}
}		 
}


	
?>
