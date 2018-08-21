<?php
    header('Content-Type: application/json');

	$recipient="kazshak@gmail.com";
	$subject="Visited Your Website";
	$timestamp = date( "F d, Y G:i:s", time() );
	$headers = "From:".$_POST['emailadd']."\r\n";
	
	$body = "
	Message sent ".$timestamp.", From ".$_POST['firstname']." ".$_POST['lastname']."
	We are ".$_POST['buysell']." our home.
	Please call us at ".$_POST['phonenumber']." or email us at ".$_POST['emailadd'].".
	Additional Comments: ".$_POST['body']."
	";
	mail( $recipient, $subject, $body, $headers);

?>
