<?php	//search index.php
 include '../includes/function.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET'){
 $q = "";
 $q = sanitizeString($_GET['q']);
  if ($q =="" || $q ==" "){
	  $search_error = "Oops! </br> Please enter appropriate search terms.";
	include ('search.html');
	//echo"";
		exit();
 } 
  else{
	$sql = selectMysql($pdo, "SELECT gig_details.gigid, gig_details.name, gig_details.sellerid, gig_details.subcatid, price.standard FROM gig_details 
	INNER JOIN price WHERE gig_details.name LIKE '%".$q."%' AND gig_details.gigid=price.gigid LIMIT 0,16");

if ($sql->rowCount() == 0){
	$search_error = "Oops! </br> Could not find services related to your search. Please use different search terms";
	include ('search.html');
	exit();
}else{


//		$gig = array();

		
		
include('search.html');
  }
}
}
?>