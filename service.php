<?php //service.profile.php seller/service title
include 'includes/function.php';
	
	if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['service'])&& isset($_GET['seller'])){
		
		$gig_url = sanitizeString($_GET['service']);
		$seller_name = sanitizeString($_GET['seller']);
		
		$gig_url = str_replace('-',' ',$gig_url);
	
$gig_query = selectMysql($pdo, "SELECT * FROM gig_details INNER JOIN user_biodata ON gig_details.sellerid=user_biodata.userid 
WHERE gig_details.name = '".$gig_url."'");
		if ($gig_query->rowCount() == 0){
			//return to previous page
			//header("Location: javascript://history.go(-1)");
		}else{
		$gig = array();
		$seller = array();
		while($row =$gig_query->fetch(PDO::FETCH_ASSOC)){
	 $gig['ID'] = $row['gigid'];
	 $gig['name'] = $row['name'];
	 $gig['desc'] = $row['description'];
	 $gig['sellerid'] = $row['sellerid'];
	 $gig['subcatid'] = $row['subcatid'];
	 $gig['require'] = $row['requirement'];
	 $seller['ID']  = $row['userid'];
	 $seller['name']  = $row['username'];
	 $seller['email']  = $row['email'];
	 $seller['location']  = $row['location'];
	 $seller['level']  = $row['level'];
	 
	}
	
	if($seller_name != $seller['name']){
	//echo $seller_name .' '.$seller['name'];
	//header("Location: javascript://history.go(-1)");
	//echo 'go back';
	} 
	else{
	$price_query = selectMysql($pdo, "SELECT * FROM price where gigid ='".$gig['ID']."'" );
	$price = array();
	while($prices = $price_query->fetch(PDO::FETCH_NUM)){
		$price['standard'] = $prices[2];
		$price['extra1'] = $prices[3];
		$price['extra2'] = $prices[4];
	}
	$extra_query = selectMysql($pdo, "SELECT * FROM gig_extra WHERE gigid = '".$gig['ID']."'");
	$extra_desc = array();
	while($extras = $extra_query->fetch(PDO::FETCH_NUM)){
		$extra_desc['desc1'] = $extras[2];
		$extra_desc['desc2'] = $extras[3];
	}
	$dur_query = selectMysql($pdo, "SELECT * FROM duration WHERE gigid = '".$gig['ID']."'");
	$gig_dur = array();
	while ($durs = $dur_query->fetch(PDO::FETCH_NUM)){
		$gig_dur['std'] = $durs[2];
		$gig_dur['extra1'] = $durs[3];
		$gig_dur['extra2'] = $durs[4];
	$image_query= selectMysql($pdo, "SELECT filestore.filepath FROM filestore WHERE filestore.authorid= '".$gig['ID']."'");
 
	//$sc = $image_query->fetchColumn(0);
	
	
	$userdp_query = selectMysql($pdo, "SELECT filestore.filepath, filestore.description FROM filestore WHERE filestore.authorid= '".$seller['ID']."' and filestore.description = 'user-profile' ");
	$usersrc = $userdp_query->fetchColumn();
	
	include 'service.html';
		}
	}
	}
		
	}else{
		//return to previous page
		echo 'sorry';
	}
		
?>
