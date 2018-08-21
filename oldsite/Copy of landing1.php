<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
		
	if (isset($_POST['submit']))
	{
		$linkID = @mysql_connect("localhost", $uname, $pass)
					or die("Could not connect to MySQL database");
		@mysql_select_db("adtracker") or die("Could not select database");
		$name = $_POST['name'];
		$email = $_POST['email'];
		$where = $_SERVER['HTTP_REFERER'];
		
		$query = "INSERT INTO NashvilleHomeSearch SET Name='$name', email='$email', wherefrom='$where'";
		
		$result = mysql_query($query);
		
		if ($result) echo "<p>Thank You For Signing Our Guestbook!</p>";
		else echo "<p>Something went wrong!</p>";
		
		mysql_close($linkID);
	}
	
	include "dblogin.php";
	include "guestbook.php";
?>
		
</body>
</html>
