<?php
		
	if (isset($_POST['submit']))
	{
		$linkID = @mysql_connect("localhost", "brenda", "nemikat6")
					or die("Could not connect to MySQL database");
		@mysql_select_db("brenda_adtracker") or die("Could not select database");
		$name = $_POST['name'];
		$email = $_POST['email'];
		$datestamp = $_POST['datestamp'];
		$where = $_POST['wherefrom'];
		
		$query = "INSERT INTO NashvilleHomeSearch SET Name='$name', email='$email', datestamp='$datestamp', wherefrom='$where'";
		
		$result = mysql_query($query);
		
		if ($result) echo "<p><h1>Thank You For Signing Our Guestbook!</h1></p>";
		else echo "<p>Something went wrong!</p>";
		
		mysql_close($linkID);
	}
	
?>
