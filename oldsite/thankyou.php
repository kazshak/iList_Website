<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Thank You Screen</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#999999">
<script language="php">
	$recipient="bshakir@ilistrealty.net";
	$subject="Visited Your Website";
	$timestamp = date( "F d, Y G:i:s", time() );
	$headers = "From:".$_POST['emailadd']."\r\n";
	
	$body = "
	Message sent ".$timestamp.", From ".$_POST['FirstName']." ".$_POST['LastName']."
	We are ".$_POST['BuySell']." our home.
	Please call us at ".$_POST['PhoneNumber']." or email us at ".$_POST['emailadd'].".
	Additional Comments: ".$_POST['comments']."
	";
	mail( $recipient, $subject, $body, $headers);
</script>
<p align="center" class="slogan"><br />Thank You For Your Message.  Someone Will Contact You Soon.<br />
<a href="index.html" class="slogan">Return To iList Realty Home Page</a></p>
</body>
</html>
