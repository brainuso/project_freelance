<?php //HOME
include  'includes/function.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--SEO-->
		<meta name="Keywords" content="Gig, skill, online marketplace, services, ChoiceWorker, featured services, ">
		<meta name="Description" content="An online marketplace where everyday people can choose from quality services at affordable prices.">
		<meta name="author" content="">
        <meta name="google-site-verification" content="8eecgU41tTc6VawiYRwMwWHGW21KNb7av8D8iU2AEHA" />
        <title>ChoiceWorker | Home</title>
		<!--css include file-->
		  <?php include 'css/css.php';?>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        <?php include 'includes/header.php';?>
		<div class="main-header col-lg-12 col-md-12 col-xs-12" id="banner"> 
            <!--added a col-lg-12 rule to enable background image responsiveness to any screen size-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center"> 
                        <h1>Think It.<br><small>We will do it.</small></h1>
                        <form class="navbar-form" action="search/" method="GET" role="search">
                            <div class="form-group">
                                <input class="form-control" name="q" placeholder="Search..." type="text">
                                <button type="submit" class="btn btn-default">Search Services</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron"> 
            <div class="col-lg-12">
 <!-- Button trigger modal -->  <!-- Modal --> 
 <!--<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog"> 
 <div class="modal-content"> 
 <div class="modal-header"> 
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
<h4 class="modal-title">Sign Up </h4>
 </div> 
 <div class="modal-body"> 
 <div class= "row">
							<div class="col-lg-12">
								<form name="signup" role="form" method="POST" action="login/signup.php">
								<fieldset>
								<div class="form-group">
									<input class="form-control" required placeholder="Enter Username" name="username" id="username" type="text" value="<?php if(isset($username))echo $username;?>" onBlur="validateName()"> <div id="username-error"></div>
								</div>
								<div class="form-group">
									<input class="form-control" required placeholder="you@example.com" name="email" id="email" type="email" value="<?php if(isset($email))echo $email;?>" onBlur="validateEmail()"><div id="email-error"></div>
								</div>
								<div class="form-group">
									<input class="form-control" required placeholder="Password require alphanumeric characters a-z,0-9" name="password" id="password" type="password" value="" onBlur="validatePassword()"><div id="password-error"></div>
								</div>
								<div class="form-group">
									<input class="form-control" required placeholder="Re-enter Password " name="password2" id="password2" type="password" value="" onBlur="validatePassword()"><div id="password2-error"></div>
								</div>
								<div class="form-group">
									<select class="form-control" name="location" id="location" onchange="validateLocation()">
										<option>Select Location</option>
										<?php  $locsql = selectMysql($pdo, "SELECT id, name FROM location");
										while($row = $locsql->fetch(PDO::FETCH_NUM)){
	 $locationID = $row[0];
	 $locationName = $row[1];
echo "<option value=". $locationID.">". $locationName."</option>";
}
										?>
									</select>
								</div><div id="location-error"></div>
								<div class="pull-left">
									
									<label><input required type="checkbox" value="1" name="accept" id="accept" onblur="validateAccept()"/>
										<strong> I have read ChoiceWorker's <a href="terms_conditions.html">Terms and Conditions</a> along
										with the <a href="privacy_policy.html">Privacy Policy</a></strong></label>
										<div id="accept-error"></div>
								
										<?php if(isset($acc_error))echo $acc_error;?>
								</div>
								<div class="modal-footer">
								<input class="btn btn-primary"  type="submit" value="SignUp" >
								</div>
								</fieldset>
								</form>
							</div>	
						</div>
 </div> 

 </div><!-- /.modal-content --> 
 </div><!-- /.modal 
 </div>-->

 </div>
			
			<div class="container-fluid">
                <!-- Example featured services row columns of 4 services a row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2 class="text-center">
        Featured Services</h2>
                      	
						<?php //
						$gig_query = "SELECT gig_details.gigid, gig_details.name,  gig_details.sellerid, gig_details.subcatid, price.standard FROM gig_details INNER JOIN price WHERE gig_details.gigid=price.gigid AND gig_details.status='ACTIVE' LIMIT 0,16";
	
		$gig_query = selectMysql($pdo, $gig_query);

		 
		
		$gig = array();
		while($row = $gig_query->fetch(PDO::FETCH_NUM)){
	 $gig['ID'] = $row[0];
	 $gig['name'] = $row[1];
	 $gig['sellerid'] = $row[2];
	 $gig['subcatid'] = $row[3];
	 $gig['stdprice'] = $row[4];
	 
	 $file_query = selectMysql($pdo, "SELECT filepath FROM filestore INNER JOIN gig_details WHERE filestore.description='gig-profile' AND filestore.authorid ='".$gig['ID']."'");
	 
	 
	 $gig['imagepath'] = $file_query->fetchColumn();
		$seller_query = "SELECT username FROM user_biodata WHERE userid = '".$gig['sellerid']."'";
		
		$seller_query = selectMysql($pdo, $seller_query);
	
		$user = array();
		while ($users = $seller_query->fetch()){
			$seller['name'] = $users[0];
				
		}
	$gig_url= str_replace(' ','-',$gig['name']);
		
		
	 /*echo '<div class="col-lg-3 col-sm-4 col-md-3"> 
						<a href="'.$seller['name'].'/'.$gig['ID'].'">
							<div class="thumbnail"> 
                                <img src="'.$gig['imagepath'].'" class="" alt="'.$gig['name'].'"/> 
								<div class="caption"> 
                                    <h5>'.ucfirst($gig['name']).'</h5> 
                                    <p>By <span class="bold-italics">'.$seller['name'].'</span> <strong class="pull-right">&#8358;'.($gig['stdprice']).'</strong></p> 
                                    <p></p> 
                                </div>                                 
                            </div>
						</a>                             
                        </div>'*/
						
						
						echo '<div class="col-lg-3 col-sm-4 col-md-3"> 
						<a href="'.$seller['name'].'/'.$gig_url.'">
	                      <div class="thumbnail"> 
                                <img src="'.$gig['imagepath'].'" class="" alt="'.$gig['name'].'"/> 
								<div class="caption"> 
                                    <h5>'.ucfirst($gig['name']).'</h5> 
                                    <p>By <span class="bold-italics">'.$seller['name'].'</span> <strong class="pull-right">&#8358;'.($gig['stdprice']).'</strong></p> 
                                    
                                </div>                                 
                            </div>
						</a>                             
                        </div>';}?>
	 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <h2 class="">StartUp Pack <br><span class="fa fa-rocket fa-4x text-warning"></span></h2>
                        <h5 class="">Web Developer + Logo Designer + Name Engineer (optional) + Startup Consultant </h5>
                        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                    </div>
                    <div class="col-md-6 text-center">
                        <h2 class="">Social Pack <br><span class="fa fa-bullseye fa-4x text-warning"></span></h2>
                        <h5 class="">Influencers + Logo Designer + Ad builders</h5>
                        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                    </div>
                </div>
            </div>
            <div id="attention">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2>NEED IT. FIND IT. BUY IT.<br /></h2>
                            <h4> It's just that simple.</h4>
                        </div>
                        <div id="pitch-talk">
                            <div class="col-md-4 text-center">
                                <h4>PRICING</h4>
                                <p> Services on ChoiceWorker are affordably priced. Simply pick a service that fits your needs and place an order. Also, pick extras for added value.</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <h4>SAFETY AND SECURITY</h4>
                                <p>Our double checking system ensures that all transactions are safe and the interests of both the buyer and the seller are protected.</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <h4>RATINGS AND VERIFICATION</h4>
                                <p>Our seller levels, reviews and ratings mean that you’ll save time with no need to vet or source talent.</p>
                            </div>
                        </div>                         
                    </div>
                </div>
            </div>             
        </div>
        <?php include 'includes/footer.php';?>
		<!-- Main jumbotron for a primary marketing message or call to action -->         
        <!-- /container -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Js include file Placed at the end of the document so the pages load faster -->
        <?php include 'js/js.php';?>
		<script src="js/signvalidate.js"></script>
	
    </body>
</html>
