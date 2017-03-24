<?php //edit-gig.index.php
include 'includes/function.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['username']) && isset($_GET['option']) && !isset($_GET['service'])){
	$username = sanitizeString($_GET['username']);
	$option = sanitizeString($_GET['option']);
	
	//check username matches session value and session value isset
	if($username != $_SESSION['username'] || !isset($_SESSION['username'])){
		header("Location:login/login.html");
	} 
	else if ($option != 'edit-service'){
			//header("Location: javascript://history.go(-1)");
	}
	else{
		include 'user-service-list.html';
	}
}
 
//edit button
else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['username'])==$_SESSION['username'] && isset($_GET['service']) && isset($_GET['option']) == "edit"){
	
	$gig_url = sanitizeString($_GET['service']);
		
		
		//gig-name-in-string to gig name in string
		$gig_url = str_replace('-',' ',$gig_url);
	
	
	//$gig_id = sanitizeString($_POST['gig_id']);
	
		//get gig details
		$gig_query = selectMysql($pdo, "SELECT * FROM gig_details WHERE sellerid = '".$_SESSION['userID']."' and name='".$gig_url."'");
		
	
	if ($gig_query->rowCount() == 0){
		$noservice = '<div class=""><span class="text-warning fa fa-warning"></span> Sorry, You do not have any Gigs currently being offered.<br/> Why not create one? <br/><a href="../create-gig/" class="btn btn-default">Create Gig</a>';
		include 'user-service-list.html';
		exit();
	}
	else{
		$gig = array();
		while ($row = $gig_query->fetch(PDO::FETCH_ASSOC)){
			 $gig['ID'] = $row['gigid'];
	 $gig['name'] = $row['name'];
	 $gig['desc'] = $row['description'];
	 $gig['sellerid'] = $row['sellerid'];
	 $gig['subcatid'] = $row['subcatid'];
	 $gig['require'] = $row['requirement'];
		
		
			$price_query = selectMysql($pdo, "SELECT * FROM price where gigid ='".$gig['ID'] ."'" );
	$price = array();
	while($prices = $price_query->fetch(PDO::FETCH_NUM)){
		$price['standard'] = $prices[2];
		$price['extra1'] = $prices[3];
		$price['extra2'] = $prices[4];
	}
	//get extras
	$extra_query = selectMysql($pdo, "SELECT * FROM gig_extra WHERE gigid = '".$gig['ID'] ."'");
	$extra_desc = array();
	while($extras = $extra_query->fetch(PDO::FETCH_NUM)){
		$extra_desc['desc1'] = $extras[2];
		$extra_desc['desc2'] = $extras[3];
	}
	//get duration
	$dur_query = selectMysql($pdo, "SELECT * FROM duration WHERE gigid = '".$gig['ID'] ."'");
	$dur = array();
	while ($durs = $dur_query->fetch(PDO::FETCH_NUM)){
		$dur['std'] = $durs[2];
		$dur['extra1'] = $durs[3];
		$dur['extra2'] = $durs[4];
	}
	
	//get gig subcategory
	$subcat_query = selectMysql($pdo, "SELECT title, catid, name FROM gig_category WHERE id = '".$gig['subcatid']."' ");
	while($q = $subcat_query->fetch(PDO::FETCH_NUM)){
		
		$gig['subcattitle'] = $q[0];
		$gig['catid'] = $q[1];
		$gig['subcatname'] = $q[2];
	
	
	//get gig category
	$cat_query = selectMysql($pdo, "SELECT title, name FROM category WHERE id = '".$gig['catid']."' ");
	while($r = $cat_query->fetch(PDO::FETCH_NUM)){
		
		$gig['cattitle'] = $r[0];
		$gig['catname'] = $r[1];
		
	}
	}
	
	$img_query1= selectMysql($pdo, "SELECT * FROM filestore WHERE authorid= '".$gig['ID']."' and filestore.description ='gig-profile'");
	
	while($j = $img_query1->fetch(PDO::FETCH_NUM)){
		$filename = $j[1];
		$mimetype = $j[2];
		$filepath = $j[4];
	}
	
	$img_query2= selectMysql($pdo, "SELECT * FROM filestore WHERE authorid= '".$gig['ID']."' and filestore.description ='gig-profile-2'");
	
		while($j = $img_query2->fetch(PDO::FETCH_NUM)){
		$filename2 = $j[1];
		$mimetype2 = $j[2];
		$filepath2 = $j[4];
	}
	
		}

 
	include ('edit-service-form.html');
	
	}
		
}
 
 //delete gig query 
	elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['username'])==$_SESSION['username'] && isset($_GET['service']) && isset($_GET['option']) == "delete"){
		
		$gig_url = sanitizeString($_GET['service']);
		
		
		//gig-name-in-string to gig name in string
		$gig_url = str_replace('-',' ',$gig_url);
	
	
		
		//$gig['ID'] = sanitizeString($_POST['gig_id']);
		$gig_query = selectMysql($pdo, "SELECT gigid FROM gig_details WHERE sellerid = '".$_SESSION['userID']."' and name='".$gig_url."'");
		
		$gig['ID'] = $gig_query->fetch();
		
		
		$order_sql = selectMysql($pdo, "SELECT orderid FROM order_transact WHERE gigid = '".$gig['ID']."' AND (status = '2' OR status = '3')");
		if ($order_sql->rowCount() > 0){
			$delete_error = '<span class="text-warning">You can not delete this Gig without completing all current orders.<br> If you have any new order requests, kindly decline.</span>';
			include 'user-service-list.html';
	exit();
	
		}
		else{
			$gig_query= queryMysql($pdo, "UPDATE gig_details SET status = 'INACTIVE' WHERE gigid='".$gig['ID']."'");
			
			include 'user-service-list.html';
			exit();
		/*	Once status is set inactive, service will not show. Admin may still view service and details and may delete it after a month
		
		//get gig details
		$gig_query = queryMysql($pdo, "DELETE  FROM gig_details WHERE sellerid = '".$_SESSION['userID']."' and gigid='".$gig['ID']."'");
		

		
	//delete prices	
		$price_query = queryMysql($pdo, "DELETE  FROM price where gigid ='".$gig['ID']."'" );
	
	//get extras
	$extra_query = queryMysql($pdo, "DELETE  FROM gig_extra WHERE gigid = '".$gig['ID']."'");
	
	//get duration
	$dur_query = queryMysql($pdo, "DELETE  FROM duration WHERE gigid = '".$gig['ID']."'");
	 
	$file_query = selectMysql($pdo, "SELECT filepath FROM filestore WHERE authorid = '".$gig['ID']."' ");
		if ($file_query->rowCount() == 0){
		return "";
		}
		else {
			while($enlist = $file_query->fetch(PDO::FETCH_NUM)){
				$filepath = $enlist[0];
			
				$filepath = explode('t/', $filepath);
				//filepath /myskilldomiain
				
				$filepath = $_SERVER['DOCUMENT_ROOT']. '/'. $filepath[1];
					if(file_exists($filepath)){
							unlink($filepath);
					}
			}
		}
	
	$file_delete = queryMysql($pdo, "DELETE FROM filestore WHERE authorid = '".$gig['ID']."' ");
	
	$review_query = queryMysql($pdo, "DELETE FROM review WHERE gigid = '".$gig['ID']."'");
	
	include 'user-service-list.html';
	exit();
	*/}
	}
	
	//submit changes from edit-service-form.html.php
elseif (isset($_POST['action']) && $_POST['action'] == "Submit Changes"){
	//echo " Connection approved";
	$gig_id = sanitizeString($_POST['gigid']);
	$gigtitle= sanitizeString($_POST['gig']['title']);
	$gigcategory= sanitizeString($_POST['gig']['category']);
	$gigsubcategory= sanitizeString($_POST['gig']['subcategory']);
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
	
	$oldfilename = sanitizeString($_POST['old_filename']);
	
	$filepath = sanitizeString($_POST['old_filepath']);
	
	if(isset($_POST['old_filepath_2'])){
	$oldfilename2 = sanitizeString($_POST['old_filename_2']);
	$filepath2 = sanitizeString($_POST['old_filepath_2']);
	}
	
	 
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
	if($gigextra1desc =="" && $gigextra1price !==""){
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
	
	if(isset($gigtitle_error) || isset($gigcategory_error) || isset($gigsubcategory_error) || isset($gigrequire_error)|| isset($gigdesc_error) || isset($gigstddur_error) || isset($gigextra1dur_error) || isset($gigextra1desc_error) || isset($gigextra1price_error)|| isset($gigextra2desc_error) || isset($gigextra2dur_error) || isset($gigextra2price_error)){
		include ("edit-service-form.html");
		exit();
	
	}
		 else{
	 //get subcategory id
	$subcatquery =selectMysql($pdo, "SELECT id FROM gig_category WHERE name='$gigsubcategory'");
	$field2 = $subcatquery->fetchColumn();
	
	//get category id
	 $catquery = selectMysql($pdo, "SELECT id FROM category WHERE name='$gigcategory'");
	 $field3 = $catquery->fetchColumn();
	 
	
	// first image upload	

		if (is_uploaded_file($_FILES['gig_photo_1']['tmp_name'])){
			//if file is uploaded, delete all previous file details
			$filepath = explode('/g', $filepath);
				//filepath /myskilldomiain
				
				$filepath = $_SERVER['DOCUMENT_ROOT']. '/g'. $filepath[1];
				if(file_exists($filepath)){
		unlink($filepath);
			$image_delete = queryMysql($pdo,"DELETE FROM filestore WHERE authorid='".$gig_id."' AND filename='".$oldfilename."'");
				}
				else{
					echo "sorry file not found";
				}
		
			
			
				$rnd_id2 = random(12);
	 $photo = $_FILES['gig_photo_1']['name'];
	$photo = explode('.', "$photo");
	
	 $ext = $photo[1];
	
	 if ( $ext == "jpg" || $ext == "png" || $ext == "PNG" || $ext == "jpeg" || $ext == "gif" || $ext =="JPG"){
				 $saveto = "/gigs/profile/img/".time()."_"."$rnd_id2"."_"."$gig_id.$ext";
		move_uploaded_file($_FILES['gig_photo_1']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $saveto);
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

$src = "http://".$site_url.$saveto;
	$uploadname = sanitizeString($uploadname);
	
	$image_query = queryMysql($pdo, "INSERT INTO filestore SET filename='$uploadname', mimetype='$uploadtype', description='$uploaddesc', filepath='$src', authorid='$gig_id'");



}
else {
	$image1_error ='<div class="text-warning"><span class="fa fa-times"></span>Please provide appropriate image format for your Gig.</div>';
	include 'create-gig.html';
exit();
}
//if typeok == FALSE
		
			 }
			
	
			//second image upload
		if (is_uploaded_file($_FILES['gig_photo_2']['tmp_name'])){
			//if file is uploaded, delete all previous file details
			if(isset($filepath2)){
			$filepath2 = explode('/g', $filepath2);
				//filepath2 /myskilldomiain
				
				$filepath2 = $_SERVER['DOCUMENT_ROOT']. '/g'. $filepath2[1];
				if(file_exists($filepath2)){
		unlink($filepath2);
		$image_delete2 = queryMysql($pdo,"DELETE FROM filestore WHERE authorid='".$gig_id."' AND filename='".$oldfilename2."'");
				}
				else{
					echo "sorry file not found";
				}
			
			}
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

$src2 = "http://".$site_url. $saveto2;
	$uploadname2 = sanitizeString($uploadname2);
	
	$image_query = queryMysql($pdo, "INSERT INTO filestore SET filename='$uploadname2', mimetype='$uploadtype2', description='$uploaddesc2', filepath='$src2', authorid='$gig_id'");


}
else {
	$image2_error ='<div class="text-warning"><span class="fa fa-times"></span>Please provide appropriate image format for your Gig.</div>';
	include 'create-gig.html';
exit();
}
		//if typeok == FALSE
		 }
			


	//queries
	//update gig details
	$details_query = queryMysql($pdo, "UPDATE gig_details SET  name='".$gigtitle."', description='".$gigdesc."', subcatid='".$field2."',requirement='".$gigrequire."' WHERE gigid= '".$gig_id."'");
	
	
	//udpdate price details
	
	$price_query = queryMysql($pdo, "UPDATE price SET extra1='".$gigextra1price."', extra2='".$gigextra2price."' WHERE gigid='".$gig_id."'");
	
 
	
	//update extras description
	
		$extradesc_query = queryMysql($pdo, "UPDATE gig_extra SET extra1_desc='$gigextra1desc', extra2_desc='$gigextra2desc' WHERE gigid='".$gig_id."'");
	
	
	// update delivery duration
	
		$duration_query = queryMysql($pdo, "UPDATE duration SET  standard='$gigstddur', extra1='$gigextra1dur', extra2='$gigextra2dur' WHERE gigid='".$gig_id."'");
	
	
	$gig_url= str_replace(' ','-',$gigtitle);
	

		header("Location:../".$seller['name']."/".$gig_url."");
	
	}
		} 
		
else if(!isset($_SESSION['userID'])){
	header("Location:../../login/login.html");

}else{
	header("Location: javascript://history.go(-1)");
}
	
	

 



?>