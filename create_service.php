<?php //index.create-service.php
include  'includes/function.php';
//something went wrong with image that is making the service not to have it's own page 
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['username']) && isset($_GET['option'])){
	$username = sanitizeString($_GET['username']);
	$option = sanitizeString($_GET['option']);
	
	//check username matches session value and session value isset
	if($username != $_SESSION['username'] || !isset($_SESSION['username'])){
		header("Location:login/login.html");
	}
	else if ($option != 'create-service'){
			header("Location: javascript://history.go(-1)");
	}
	else{
		include 'create-service.html';
	}
}
else{
	header("Location:login/login.html");
}

$gigtitle= "";
$stdprice = "3000";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action']== 'Submit'){
//print_r($_POST);
	$gigtitle= sanitizeString($_POST['gig']['title']);
	$gigcategory= sanitizeString($_POST['gig']['category']);
	if(!isset($_POST['gig']['subcategory'])){
		$gigsubcategory= "";
	}
	else{
	$gigsubcategory= sanitizeString($_POST['gig']['subcategory']);
	}
	$gigdesc= sanitizeString($_POST['gig']['desc']);
	$gigrequire= sanitizeString($_POST['gig']['require']);
	
	//will work on tag list later 
	//$gigtaglist= sanitizeString($_POST['gig']['tag_list']['0']);
	$gigstddur= sanitizeString($_POST['gig']['standard']['dur']);
	
	$gigextra1price= sanitizeString($_POST['gig']['extra1']['price']);
	$gigextra1desc= sanitizeString($_POST['gig']['extra1']['desc']);
	$gigextra1dur= sanitizeString($_POST['gig']['extra1']['dur']);
	
	$gigextra2price= sanitizeString($_POST['gig']['extra2']['price']);
	$gigextra2desc= sanitizeString($_POST['gig']['extra2']['desc']);
	$gigextra2dur= sanitizeString($_POST['gig']['extra2']['dur']);
	
	 
	if ($gigtitle ==""){
		 $gigtitle_error = '<div class="text-warning"><span class="fa fa-times"></span>Gig title cannot be empty.</div>';
	}
	
	if (strlen($gigtitle) > 80){
				$gigtitle_error = '<div class="text-warning"><span class="fa fa-times"></span>Gig title has cannot exceed 80 characters.</div>';
	}
	if($gigcategory=="" || $gigcategory=="Select Gig Category"){
			$gigcategory_error='<div class="text-warning"><span class="fa fa-times"></span>Please select a valid category for your Gig.</div>';
	}
	 if($gigsubcategory=="" || $gigsubcategory=="Select Gig Subcategory"){
				$gigsubcategory_error='<div class="text-warning"><span class="fa fa-times"></span>Please select a valid subcategory for your Gig.</div>';
	}
	if($gigdesc ==""){
				$gigdesc_error='<div class="text-warning"><span class="fa fa-times"></span>Please give a short description about your Gig.</div>';
	}
	if($gigrequire ==""){
				$gigrequire_error='<div class="text-warning"><span class="fa fa-times"></span>Please provide a list of what you will need from the customer to provide the service.</div>';
		}
	if($gigstddur =="Select Duration of Delivery" ){
				$gigstddur_error='<div class="text-warning"><span class="fa fa-times"></span>Please select a time duration for Gig delivery.</div>';
	}
	if($gigextra1desc =="" && $gigextra1price !=="" ){
		$gigextra1desc_error = '<div class="text-warning"><span class="fa fa-times"></span>Please give details about your Gig extra.</div>';
	}
	if($gigextra1desc !==""){
		if($gigextra1price < 3000){
				$gigextra1price_error='<div class="text-warning"><span class="fa fa-times"></span>Prices for Gig extra must be above standard price.</div>';
			}
			if($gigextra1price ==""){
				$gigextra1price_error='<div class="text-warning"><span class="fa fa-times"></span>Please enter a price for your Gig extra.</div>';
			}
			
			if( $gigextra1dur =="Select Duration of Delivery"){
				$gigextra1dur_error= '<div class="text-warning"><span class="fa fa-times"></span>Please select a time duration for Gig delivery.</div>';
			}
	}
	if($gigextra2desc =="" && $gigextra2price !==""){
		$gigextra2desc_error = '<div class="text-warning"><span class="fa fa-times"></span>Please give details about your Gig extra.</div>';
	}
	if($gigextra2desc !==""){
			if($gigextra2price < 3000){
				$gigextra2price_error='<div class="text-warning"><span class="fa fa-times"></span>Prices for Gig extra must be above standard price.</div>';
			}
			if($gigextra2price ==""){
				$gigextra2price_error='<div class="text-warning"><span class="fa fa-times"></span>Please enter a price for your Gig extra .</div>';
			}
			
			if($gigextra2dur =="Select Duration of Delivery"){
				$gigextra2dur_error= '<div class="text-warning"><span class="fa fa-times"></span>Please select a time duration for Gig delivery.</div>';
			}
				
	}
	if(!is_uploaded_file($_FILES['gig_photo_1']['tmp_name'])){
		$image1_error ='<div class="text-warning"><span class="fa fa-times"></span>Please provide appropriate image for your Gig.</div>';
	}
	if(!is_uploaded_file($_FILES['gig_photo_2']['tmp_name'])){
		$image2_error ='<div class="text-warning"><span class="fa fa-times"></span>Please provide appropriate image for your Gig.</div>';
	}	
	if(isset($gigtitle_error) || isset($gigcategory_error) ||
	isset($gigsubcategory_error) || isset($gigrequire_error)|| isset($gigdesc_error) || isset($gigstddur_error) || isset($gigextra1dur_error) || isset($gigextra1desc_error) || isset($gigextra1price_error)|| isset($gigextra2desc_error) || isset($gigextra2dur_error) || isset($gigextra2price_error) || isset($image1_error)|| isset($image2_error)){
		include ("create-service.html");
		exit();
	
	}
		 else{
	
	
	 
		//queries
	//get userid
	$result = selectMysql($pdo, "SELECT userid FROM user_biodata WHERE username= '$username'");
	$field = $result->fetchColumn();
	
	//get subcategory id
	$subcatquery =selectMysql($pdo, "SELECT id FROM gig_category WHERE name='$gigsubcategory'");
	$field2 = $subcatquery->fetchColumn();
	
	 //get category id
	 $catquery = selectMysql($pdo, "SELECT id FROM category WHERE name='$gigcategory'");
	 $field3 = $catquery->fetchColumn();
	 
	//create id for gig using subcatid and catid
		$gig_id = $field3.$field2.random(16);

		//collect the photos and treat them so we can see how it turns up.
	//First image collection
		
		//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//		$_POST['action']== 'image1'){
// Bail out if the file isn't really an upload
				
			// first image upload	
			if (!is_uploaded_file($_FILES['gig_photo_1']['tmp_name'])){
$image_error ='<div class="text-warning"><span class="fa fa-times"></span>Please provide appropriate image for your Gig.</div>';
include 'create-service.html';
exit();

} 
		elseif (isset($_FILES['gig_photo_1']['name'])){
				$rnd_id2 = random(12);
	 $photo = $_FILES['gig_photo_1']['name'];
	
	$photo = explode('.', $photo);
	
	 $ext = $photo[1];
	
	 if ( $ext == "jpg" || $ext == "png" || $ext == "PNG" || $ext == "jpeg" || $ext == "gif" || $ext =="JPG"){
				 $saveto = "/gigs/profile/img/".time()."_"."$rnd_id2"."_"."$gig_id.$ext";
		move_uploaded_file($_FILES['gig_photo_1']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] .$saveto);
		
		$typeok = TRUE;
		switch($_FILES['gig_photo_1']['type']){
case "gig_photo_1/gif": $ext= ".gif"; $src = imagecreatefromgif($saveto); break;
case "gig_photo_1/jpeg":  $ext= ".jpg";$src = imagecreatefromjpeg($saveto); break;
case "gig_photo_1/pjpeg":  $ext= ".jpg"; $src = imagecreatefromjpeg($saveto); break;
case "gig_photo_1/png":  $ext= ".png"; $src = imagecreatefrompng($saveto); break;
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

$uploadfile = $_FILES['gig_photo_1']['tmp_name'];
$uploadname = $_FILES['gig_photo_1']['name'];
$uploadtype = $_FILES['gig_photo_1']['type'];
$uploaddesc = "gig-profile";
//later change the source path when testing on the net


$src = 'http://'.$site_url.$saveto;




//echo $src;
	$uploadname = sanitizeString($uploadname);
	
	$image_query = queryMysql($pdo, "INSERT INTO filestore SET filename='".$uploadname."', mimetype='".$uploadtype."', description='".$uploaddesc."', filepath='".$src."', authorid='".$gig_id."'");

}
else {
	$image1_error ='<div class="text-warning"><span class="fa fa-times"></span>Please provide appropriate image format for your Gig.</div>';
	include 'create-service.html';
exit();
}
//if typeok == FALSE
			 }
			 else {
				echo "file wasnt sent";
			}
		

		
			
			
			
			
			//second image upload
		
		
		if (isset($_FILES['gig_photo_2']['name'])){
				$rnd_id3 = random(12);
	 $photo2 = $_FILES['gig_photo_2']['name'];

	$photo2 = explode('.', "$photo2");
	
	 $ext2 = $photo2[1];
	
	 if ( $ext2 == "jpg" || $ext2 == "png" || $ext2 == "PNG" || $ext2 == "jpeg" || $ext2 == "gif" || $ext2 =="JPG"){
				 $saveto2 = "/gigs/profile/img/".time()."_"."$rnd_id3"."_"."$gig_id.$ext2";
		move_uploaded_file($_FILES['gig_photo_2']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $saveto2);
		$typeok = TRUE;
		switch($_FILES['gig_photo_2']['type']){
case "gig_photo_2/gif": $ext2= ".gif"; $src2 = imagecreatefromgif($saveto2); break;
case "gig_photo_2/jpeg":  $ext2= ".jpg";$src2 = imagecreatefromjpeg($saveto2); break;
case "gig_photo_2/pjpeg":  $ext2= ".jpg"; $src2 = imagecreatefromjpeg($saveto2); break;
case "gig_photo_2/png":  $ext2= ".png"; $src2 = imagecreatefrompng($saveto2); break;
default: $typeok = FALSE; break;
}
			if ($typeok){
			list($w, $h) = getimagesize($saveto2);
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
$tmp2 = imagecreatetruecolor($tw, $th);
imagecopyresampled($tmp2, $src2, 0, 0, 0, 0, $tw, $th, $w, $h);
imageconvolution($tmp2, array(array(−1, −1, −1),
array(−1, 16, −1), array(−1, −1, −1)), 8, 0);
imagejpeg($tmp, $saveto2);
imagedestroy($tmp2);
imagedestroy($src2);

}

$uploadfile2 = $_FILES['gig_photo_2']['tmp_name'];
$uploadname2 = $_FILES['gig_photo_2']['name'];
$uploadtype2 = $_FILES['gig_photo_2']['type'];
$uploaddesc2 = "gig-profile-2";
//later change the source path when testing on the net

$src2 = "http://".$site_url.$saveto2;
	$uploadname2 = sanitizeString($uploadname2);
	
	$image_query = queryMysql($pdo, "INSERT INTO filestore SET filename='".$uploadname2."', mimetype='$uploadtype2', description='$uploaddesc2', filepath='$src2', authorid='$gig_id'");



}
else {
	$image2_error ='<div class="text-warning"><span class="fa fa-times"></span>Please provide appropriate image format for your Gig.</div>';
	include 'create-service.html';
exit();
}
//if typeok == FALSE
			 }
			 else {
				echo "file wasnt sent";
			}
	
		 //insert gig details 
	 $gigsql=queryMysql($pdo, "INSERT INTO gig_details SET gigid='$gig_id', name='$gigtitle', description='$gigdesc', sellerid='$field', subcatid='$field2',requirement='$gigrequire' ");
	 
	
	//insert price details
	
	$price_query = queryMysql($pdo, "INSERT INTO price SET gigid='$gig_id', extra1='$gigextra1price', extra2='$gigextra2price'");
	
 
	
	//insert extras description
	if ($gigextra1desc !==""){
		$extradesc_query = queryMysql($pdo, "INSERT INTO gig_extra SET gigid='$gig_id', extra1_desc='$gigextra1desc', extra2_desc='$gigextra2desc'");
	}
	
	// insert delivery duration
	
		$duration_query = queryMysql($pdo, "INSERT INTO duration SET gigid='$gig_id', standard='$gigstddur', extra1='$gigextra1dur', extra2='$gigextra2dur'");
	
	$gig_url= str_replace(' ','-',$gig['name']);
	
	
		header("Location:../../".$_SESSION['username']."/".$gigtitle."");
		}
}
		
		else{
				//leave this place blank
				//header("Location:includes/error.html.php");		//return user to create service if the request method is not post.
					//header("Location: javascript://history.go(-1)");
		}
	?>