<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Thank You Screen</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#999999">
<script language="php">
	$recipient = "bshakir@ilistrealty.net";
	$subject = "I Would Like A C.M.A.";
	$timestamp = date( "F d, Y G:i:s", time() );
	$headers = "From:".$_POST['emailadd']."\r\n";
	$headers .= "Reply-to:".$_POST['emailadd']."\r\n";
	$headers .= "Content-Type: text/html;\r\n charset=\"iso-8859-1\"\r\n";
	$body = "
	<html>
	<head><title>I Need A CMA</title></head>
	<body>
	<p><h1>Message sent ".$timestamp.", From ".$_POST['FirstName']." ".$_POST['LastName'].".
	The property for which I would like a CMA is located at ".$_POST['propaddress'].".
	Please call us at ".$_POST['PhoneNumber']." or email us at ".$_POST['emailadd'].".
	Additional Comments: ".$_POST['comments']."
	</h1></p>
	</body>
	</html>";
	
	mail( $recipient, $subject, $body, $headers);
</script>
<p align="center" class="slogan"><br />Thank You For Your Message.  Someone Will Contact You Soon.<br />
<a href="index.html" class="slogan">Return To iList Realty Home Page</a></p>
</body>
</html>
