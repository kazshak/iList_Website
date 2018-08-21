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
		$linkID = @mysql_connect("localhost", "brenda", "nemikat6")
					or die("Could not connect to MySQL database");
		@mysql_select_db("brenda_adtracker") or die("Could not select database");
		$name = $_POST['name'];
		$email = $_POST['email'];
		$datestamp = $_POST['datestamp'];
		$where = $_SERVER['HTTP_REFERER'];
		
		$query = "INSERT INTO NashvilleHomeSearch SET Name='$name', email='$email', datestamp='$datestamp', wherefrom='$where'";
		
		$result = mysql_query($query);
		
		if ($result) echo "<p><h1>Thank You For Signing Our Guestbook!</h1></p>";
		else echo "<p>Something went wrong!</p>";
		
		mysql_close($linkID);
	}
	
	include "guestbook.php";
?>

		
</body>
</html>
