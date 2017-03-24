<?php
//review query.php

include 'includes/function.php';


	$gig_id = $_GET['gigid'];
	$review_text = sanitizeString($_GET['review_text']);
	$review_sender = sanitizeString($_GET['sender']);
	$review_ratings = sanitizeString($_GET['ratings']);
	
	//$now_date = new DateTime( date("Y-m-d H:i:s"));
	
	//have to generate the user id later in login.php and signup.php entry_date='".date()."
	
	
	if ($review_text !=="" and $review_ratings !== "" and $review_ratings !== "Select Rating" ){
	$reviewsql = queryMysql($pdo, "INSERT INTO review SET senderid= '".$_SESSION['userID']."', review='$review_text', gigid='".$gig_id."', ratings='$review_ratings'");
	if (!$reviewsql){
	 echo "failed";
	}else{
	
	$review_query = selectMysql($pdo, "SELECT review.gigid, review.senderid, review.review, user_biodata.username, review.ratings, review.entry_date FROM review 
	INNER JOIN user_biodata ON review.senderid =user_biodata.userid WHERE review.gigid='".$gig_id."' ORDER BY review.entry_date DESC");
	$review = array();
	$now_date = new DateTime( date("Y-m-d H:i:s"));
		//foreach($review_query as $lines){
		while($lines = $review_query->fetch(PDO::FETCH_NUM)){
			$review['ID'] = $lines[0];
			$review['senderID'] = $lines[1];
			$review['text'] = $lines[2];
			$review['sendername'] = $lines[3];
			$review['ratings'] = $lines[4];
			$review['entry_date'] = $lines[5];
			
			//date_period is not being echoed why?
			$date_period = dateDiff($review['entry_date'],$now_date);

			$image_sql = selectMysql($pdo, "SELECT filepath from filestore WHERE authorid ='".$review['senderID']."' AND description ='user-profile'");
			$review_image = $image_sql->fetchColumn();
			
								echo '  <div class="list-group-item">
                                            <div class="row">
                                                <div class="col-xs-3 col-md-3"> 
                                                    <div class="thumbnail"> 
                                                        <img src="'.$review_image.'" alt=""> 
                                                    </div>                                                     
                                                </div>
												<div class="col-xs-9 col-md-9">
													<h5 class="list-group-item-heading">
													'. $review['sendername']; for ($i= 1; $i <= $review['ratings']; $i++){
													echo '<cite><span class="pull-right fa fa-star" id="rating"></span></cite>';} echo '</h5>
													<p class="list-group-item-text">'. $review['text'].'</p> 
													<p><em>'.$date_period.' ago'.'</em></p>
                                                </div>
                                            </div>
                                        </div>';}
		}
	}
	else {
		$review_error = "<span class='text-warning'>Please enter valid Reviews and Ratings. Thank you.</span>";
		echo $review_error;
	
$review_query = selectMysql($pdo, "SELECT review.gigid, review.senderid, review.review, user_biodata.username, review.ratings, review.entry_date FROM review
 INNER JOIN user_biodata ON review.senderid =user_biodata.userid WHERE review.gigid='".$gig['ID']."' ORDER BY review.entry_date DESC");
	$review = array();
	$now_date = new DateTime( date("Y-m-d H:i:s"));
		//foreach($review_query as $lines){
		while($lines = $review_query->fetch(PDO::FETCH_NUM)){
			$review['ID'] = $lines[0];
			$review['senderID'] = $lines[1];
			$review['text'] = $lines[2];
			$review['sendername'] = $lines[3];
			$review['ratings'] = $lines[4];
			$review['entry_date'] = $lines[5];
			
			$date_period = dateDiff($review['entry_date'],$now_date);
	
						$image_sql = selectMysql($pdo, "SELECT filepath from filestore WHERE authorid ='".$review['senderID']."' AND description ='user-profile'");
			$review_image = $image_sql->fetchColumn();
						

							echo '  <div class="list-group-item">
                                            <div class="row">
                                                <div class="col-xs-3 col-md-3"> 
                                                    <div class="thumbnail"> 
                                                        <img src="'.$review_image.'" alt=""> 
                                                    </div>                                                     
                                                </div>
												<div class="col-xs-9 col-md-9">
													<h5 class="list-group-item-heading">
													'. $review['sendername']; for ($i= 1; $i <= $review['ratings']; $i++){
													echo '<cite><span class="pull-right fa fa-star" id="rating"></span></cite>';} echo '</h5>
													<p class="list-group-item-text">'. $review['text'].'</p> 
													<p><em>2'.$date_period.' ago'.'</em></p>
                                                </div>
                                            </div>
                                        </div>';}
	}
?>