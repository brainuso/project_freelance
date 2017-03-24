<?php
//category and subcategory index file
include '../includes/function.php';

// category query display
if (isset($_GET['category']) && !isset($_GET['subcategory'])){
$category = sanitizeString($_GET['category']);

try{
	$sql= selectMysql($pdo, "SELECT * FROM category WHERE name ='".$category."'");
	}
catch (Exception $e){
	$error = 'Error fetching category: ' . $e->getMessage();
	include ('../includes/error.html.php');
	
	exit();
}
if ($sql->rowCount() ==0){
header ('Location:../includes/error.html.php');	
}
else{
	while ($row = $sql->fetch(PDO::FETCH_NUM)){
		$id = $row[0];
		$cname= $row[4];
		$title = $row[1];
		$storyline = $row[2];
		$description = $row[3];
	}
	include('category.html');
	}
}



//sub category query display
if (isset($_GET['subcategory']) && isset($_GET['category'])){
	$subcategory = sanitizeString($_GET['subcategory']);
	$category = sanitizeString($_GET['category']);
try{
	$sql= selectMysql($pdo, "SELECT gig_category.id, gig_category.name, gig_category.title, category.id, category.name, category.title FROM category 
	INNER JOIN gig_category ON category.id= gig_category.catid WHERE category.name ='".$category."' AND gig_category.name ='".$subcategory."'");
	}
catch (Exception $e){
	$error = 'Error fetching jokes: ' . $e->getMessage();
	exit();
}
if ($sql->rowCount() ==0){
header ('Location:../includes/error.html.php');
		
}
else{
	while ($row =$sql->fetch(PDO::FETCH_NUM)){
	$subid =$row[0];
	$subname = $row[1];
	$subtitle = $row[2];
	$catid = $row[3];
	$catname = $row[4];
	$cattitle = $row[5];
	}
	include('subcategory.html');
}
}

?>
