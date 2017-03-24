<?php

 $stringexp = explode('@',$_SESSION['email']);
echo' <nav class="navbar navbar-default">
<div class= "container">
<div class= "row col-lg-12 text-center">

	<h3 class="text-danger"><strong>Dear '.$name.', Kindly activate your account.<br/><small>Email was sent to '.$_SESSION['email'].'</small></strong></h3>
	<a href ="http://www.'.$stringexp[1].'" class="btn btn-success" target="_blank">GO to '.$stringexp[1].'</a>

</div>
</div>
</nav>';

?>