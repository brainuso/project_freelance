<?php // header.php


$catsql= selectMysql($pdo, "SELECT id, name, title FROM category");
 $catlist = array();
 

if (isset($_SESSION['username'])){
	$notify_sql= selectMysql($pdo, "SELECT COUNT(*) AS num FROM notifications WHERE receiverid='".$_SESSION['userID']."' AND seen='0'");

$notificate = $notify_sql->fetchColumn();


	$loggedin = TRUE;
	$name =sanitizeString($_SESSION['username']);
echo'
		<nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   <a href="http://'.$site_url.'/" class="navbar-brand"><img class="img-responsive" src="http://'.$site_url.'/img/sitebrand.png" alt="ChoiceWorker"/></a>
					
					<a type="button" class="navbar-left navbar-toggle btn btn-default" 
                    data-toggle="collapse" 
                    data-target="#navbar-main">
                Categories
            </a>
				</div>
                
				<div id="navbar" class="navbar-collapse collapse ">
                    <form class="navbar-form navbar-right" id="search" action="http://'.$site_url.'/search/" method="GET" role="form">
                        <div class="form-group">
                            <input name="q" placeholder="Search..." class="form-control" type="text">
                        </div>
                        <button type="submit" class="btn btn-default">
                          <i class="fa fa-search"></i>
                        </button>
                    </form>
 '; 
 if ($notificate != 0){
	 echo '<div class="nav navbar-nav navbar-right"> 
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="user-link" aria-expanded="false"> '.$name.'<span class="caret"></span> <span class="badge">'.$notificate.'</span> </a>
                            <ul class="dropdown-menu" aria-labelledby="">
			<li><a href="http://'.$site_url.'/'.$name.'">My Dashboard</a></li>
			<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/edit-service/">My Gigs</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/analytics#order-queue">My Orders</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/messages/">My Messages</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/request/manage_request.html">My Requests</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/request/requests.html">Requests</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/post-request">Post a Request</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/bids">My Bids</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/settings.html">Settings</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/support.html">Help</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/logout">Logout</a></li>
            </ul>
			</li>
			
			</div>';
 }
 else {
	 echo'<div class="nav navbar-nav navbar-right"> 
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="user-link" aria-expanded="false"> '.$name.'<span class="caret"></span> </a>
                            <ul class="dropdown-menu" aria-labelledby="">
	
						<li><a href="http://'.$site_url.'/'.$name.'">My Dashboard</a></li>
			<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/edit-service/">My Gigs</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/analytics#order-queue">My Orders</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/messages/">My Messages</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/request/manage_request.html">My Requests</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/request/requests.html">Requests</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/post-request">Post a Request</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/bids">My Bids</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/settings.html">Settings</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/'.$name.'/support.html">Help</a></li>
				<hr>
				<li><a href="http://'.$site_url.'/logout">Logout</a></li>
            </ul>
			</li>
			
			</div>';
 }
	 
	 echo '
   <!--/.top navbar-collapse -->
				</div>
		   </div>
        </nav>
        	
			
		<nav class="">
		
		
	
	<div class=" nav navbar-default navbar-collapse collapse" id="navbar-main" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">';
		 
while($row =$catsql->fetch(PDO::FETCH_NUM)){
	 $catlist['ID'] = $row[0];
	 $catlist['name'] = $row[1];
	 $catlist['title'] = $row[2];
	 
	  $subsql = selectMysql($pdo, "SELECT gig_category.id, gig_category.name, gig_category.title FROM gig_category WHERE catid ='".$catlist['ID']."'");
 $sublist = array();
	
	 echo  '<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="'.$catlist['name'].'" aria-expanded="false">'.$catlist['title'].'</a>
				<ul class="dropdown-menu" aria-labelledby="'.$catlist['name'].'">
				<li class="dropdown-header"><a href="http://'.$site_url.'/category/'.($catlist['name']).'">'.($catlist['title']).'</a></li>
					<hr>	';
					while($rows =$subsql->fetch(PDO::FETCH_NUM)){
	 $sublist['ID'] = $rows[0];
	 $sublist['name'] = $rows[1];
	 $sublist['title'] = $rows[2];
	
					echo '
					<li><a href="http://'.$site_url.'/category/'.($catlist['name']).'/'.($sublist['name']).'">'.($sublist['title']).'</a></li>';
					}
					
					echo '
				</ul>
	</li>';

}
		echo '</ul>

	</div>
	
   
	</nav>
';
}
else{
	echo'
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="http://'.$site_url.'/" class="navbar-brand"><img class="img-responsive" src="http://'.$site_url.'/img/sitebrand.png" alt="ChoiceWorker"/></a>
					<a type="button" class="navbar-left navbar-toggle btn btn-default" 
                    data-toggle="collapse" 
                    data-target="#navbar-main">
                Categories
            </a>
				</div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form name="signup" role="form" method="POST" action="http://'.$site_url.'/login/login.php" class="navbar-form navbar-right">
                        <div class="form-group">
                            <input required placeholder="Username/Email" class="form-control" name="username" id="user"/>
                        </div>
                        <div class="form-group">
                            <input required  placeholder="Password" class="form-control" id="pass" name="password" type="password">
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                    </form>
					<div class=" navbar-form navbar-right">	
		
		<a href="http://'.$site_url.'/login/signup.html" class="btn btn-default" type="">Sign Up</a>
			</div>
                </div>
                <!--/.navbar-collapse -->
            </div>
        </nav>
        <!--second nav bar or categories-->
		
		<nav class="">
		
	<div class=" nav navbar-default navbar-collapse collapse" id="navbar-main" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">';
while($row =$catsql->fetch(PDO::FETCH_NUM)){
	 $catlist['ID'] = $row[0];
	 $catlist['name'] = $row[1];
	 $catlist['title'] = $row[2];
	 
	  $subsql = selectMysql($pdo, "SELECT gig_category.id, gig_category.name, gig_category.title FROM gig_category WHERE catid ='".$catlist['ID']."'");
 $sublist = array();
 
	 echo  '<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="'.$catlist['name'].'" aria-expanded="false">'.$catlist['title'].'</a>
				<ul class="dropdown-menu" aria-labelledby="'.$catlist['name'].'">
				<li class="dropdown-header"><a href="http://'.$site_url.'/category/'.($catlist['name']).'">'.($catlist['title']).'</a></li>
					<hr>	';
					while($rows =$subsql->fetch(PDO::FETCH_NUM)){
	 $sublist['ID'] = $rows[0];
	 $sublist['name'] = $rows[1];
	 $sublist['title'] = $rows[2];
					echo '
					<li><a href="http://'.$site_url.'/category/'.($catlist['name']).'/'.($sublist['name']).'">'.($sublist['title']).'</a></li>';
					}
					echo '
				</ul>
            </li>';
}
		echo '</ul>
	</div>
	</nav>
';
}
	
?>