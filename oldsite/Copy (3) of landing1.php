<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form action="guestbook.php" method="post">
	<p>
		<strong><h1>THANK YOU FOR VISITING OUR WEBSITE<br />
		PLEASE TAKE A MOMENT TO SIGN OUR GUESTBOOK<br />
		</h1></strong>
		<br />
		Your First And Last Name:<br />
		<input type="text" name="name" size="50" maxlength="150" value="" />
	</p>
	<p>
		Your email address:<br />
		<input type="text" name="email" size="50" maxlength="150" value="" />
	</p>
	<p>
		Current date:<br />
		<input type="text" name="datestamp" size="50" maxlength="150" value="" />
	</p>
	<p>
		<input type="hidden" name="wherefrom" size="150" value="<?php echo $_SERVER['HTTP_REFERER'];?>" />
		<input type="submit" name="submit" value="SUBMIT!" />
	</p>
</form>


		
</body>
</html>
