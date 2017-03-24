<?php // logout.php
include_once '../includes/function.php';
if (isset($_SESSION['username']))
{
destroySession();
header("Location:../");
}
else echo "<div class='main'><br />" .
"You cannot log out because you are not logged in";
?>
<br /><br /></div></body></html>