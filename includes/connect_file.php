<?php
// function.php
//$dbhost = 'localhost'; // Unlikely to require changing
//$dbname = 'myskilld_myskilldomain'; // Modify these...
//$dbusername = 'brainuso'; // ...variables according
//$dbpassword = 'fiverr'; // ...to your installation
//$appname = 'MSD'; // ...and preference

//connect to database

try
{
$pdo = new PDO('mysql:host=localhost;dbname=project_freelance', 'brainuso',
'fiverr');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec('SET NAMES "utf8"');

$site_url ="localhost/www.choiceworker.com";
}
catch (PDOException $e)
{
$output = 'Unable to connect to the database server' . $e->getMessage();
include 'error.html.php';
exit();
}

//$connection= mysqli_connect("$dbhost", "$dbusername", "$dbpassword") or die(mysqli_error());
//mysqli_select_db("$dbname", "") or die(mysqli_error());





?>