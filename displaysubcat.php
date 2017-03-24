<?php //subcat.php ajax correspondence
include 'includes/function.php';

$q = sanitizeString($_GET['q']);

$ql = selectMysql($pdo, "SELECT id FROM category WHERE name='".$q."'");
$id = $ql->fetchColumn();
  
$subsql = selectMysql($pdo, "SELECT gig_category.id, gig_category.name, gig_category.title FROM gig_category WHERE catid ='".$id."'");
if($subsql){
 $sublist = array();
 

										
 echo '<label for="select" class="col-lg-2 control-label" id="subcat-label">Subcategory</label>
										<div class="col-lg-5">
											<select class="form-control" id="gig-subcategory" name="gig[subcategory]" style="border: 1px solid #01A1DC;">
												<option>Select Gig Subcategory</option>';
 	while($row =$subsql->fetch(PDO::FETCH_NUM)){
	 $sublist['ID'] = $row[0];
	 $sublist['name'] = $row[1];
	 $sublist['title'] = $row[2];
	 echo '<option value="'.($sublist['name']).'">'.($sublist['title']).'</option>';
}
echo '	</select>
										</div>
 ';
}else echo "query failed";
?>