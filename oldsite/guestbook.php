<?php
		
	function validate_email($email)
	{
		$regexp = "^([_a-z0-9-]+)(\'[_a-z0-9-]+)*@([a-z0-9-]+)
					(\.[a-z0-9-]+)*(\.[a-z]{2,4})$";
		
		if (eregi($regexp, $email)) return 1;
		else return o;
	}

	if (isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$datestamp = $_POST['datestamp'];
		$where = $_POST['wherefrom'];
		if (validate_email($email))
		{
			$linkID = @mysql_connect("localhost", "brenda", "nemikat6")
						or die("Could not connect to MySQL database");
			@mysql_select_db("brenda_adtracker") or die("Could not select database");
				
			$query = "INSERT INTO NashvilleHomeSearch SET Name='$name', email='$email', datestamp='$datestamp', wherefrom='$where'";
		
			$result = mysql_query($query);
		
			if ($result) echo "<a href=\"".$_POST['finalpage']."\"><p><h1>Thank You For Signing Our Guestbook! Click Here To Continue To Our Website</h1></p></a>";
			else echo "<p>Something went wrong!</p>";
		
			mysql_close($linkID);
		}
		else die("Invalid Email Address");
	}
	
?>
