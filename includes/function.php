<?php 
//functions
session_start();
require 'connect_file.php';

if (get_magic_quotes_gpc())
{
$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
while (list($key, $val) = each($process))
{
foreach ($val as $k => $v)
{
unset($process[$key][$k]);
if (is_array($v))
{
$process[$key][stripslashes($k)] = $v;
$process[] = &$process[$key][stripslashes($k)];
}
else
{
$process[$key][stripslashes($k)] = stripslashes($v);
}
}
}
unset($process);
}



function queryMysql($pdo, $query){
 try{
	 $query = $pdo->exec($query);
 }catch (PDOException $e){
	 $output = 'Query failed '. $e->getMessage();
	 //include 'error.html.php';
 }
	return $query;	
}


function selectMysql($pdo, $query){
 try{
	 $query = $pdo->query($query);
 }catch (PDOException $e){
	 $output = 'Query failed '. $e->getMessage();
	 //include 'error.html.php';
 }
	return $query;	
} 

function destroySession(){
$_SESSION=array();
if (session_id() != "" || isset($_COOKIE[session_name()]))
setcookie(session_name(), '', time()-2592000, '/');
session_destroy();
}
//protection from hackers
function sanitizeString($var){
$var = strip_tags($var);
$var = htmlentities($var);
//this has just been added
//$var = mysqli_real_escape_string($var);

$var = stripslashes($var);
return $var;
}
//random number function
function  random($rand_id_lnth){
	$rnd_id = (uniqid(rand(),1));
	$rnd_id = sanitizeString($rnd_id);
	$rnd_id = str_replace(".","",$rnd_id);
	$rnd_id = strrev(str_replace("/","",$rnd_id));
	$rnd_id = substr($rnd_id, 0, $rand_id_lnth);
	return $rnd_id;
	}	
	
//function to calculate date differential
function dateDiff($date_to_check, $now_date){
$review_date = new DateTime($date_to_check);
	$interval =$review_date->diff($now_date);
	
 $review_day =$interval->format('%d');
 $review_month =$interval->format('%m');
 $review_year =$interval->format('%y');
 $review_hour = $interval->format('%H');
 $review_minute = $interval->format('%M');
 $review_sec = $interval->format('%S');
 

//echo year
if( $review_year < 1){$review_year ="";}
else if( $review_year == 1){ $review_year = $review_year.' year,';}
else { $review_year = $review_year.' years,';}

//echo month
if($review_month < 1){$review_month = "";}
else if( $review_month == 1){ $review_month = $review_month.' month,';}
else { $review_month = $review_month.' months, ';}

//echo day
if($review_day < 1){$review_day = "";}
else if( $review_day == 1){ $review_day = $review_day.' day';}
else { $review_day = $review_day.' days';}

//echo hour
if($review_hour < 1){$review_hour = "";}
else if( $review_hour == 1){ $review_hour = $review_hour.' hour';}
else { $review_hour = $review_hour.' hours';}

//echo minute
if($review_minute < 1){$review_minute = "";}
else if( $review_minute == 1){ $review_minute = $review_minute.' min';}
else { $review_minute = $review_minute.' mins';}

//echo second
if($review_sec < 1){$review_sec = "";}
else if( $review_sec == 1){ $review_sec = $review_sec.' sec';}
else { $review_sec = $review_sec.' secs';}

return $review_year.' '.$review_month.' '.$review_day.' '.$review_hour.' '.$review_minute.' '.$review_sec;
}
	
	function Supportmailer($site_url, $to_mail, $to_user, $body_html, $body ){
		require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'secure181.sgcpanel.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'support@myskilldomain.com';                 // SMTP username
$mail->Password = 'wesupport1';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('support@myskilldomain.com', 'MSD Support');
$mail->addAddress($to_mail, $to_user);     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('support@myskilldomain.com', 'MSD Support');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = $body_html;
$mail->AltBody = $body;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
	}
	
?>