<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript">
function handleResponse(a) {
  document.write("<p class=\"progress\">                                               </p><p class=\"progress\">"+a+" % Downloaded</p>")
}
</script>
</head>
<style type="text/css">
<!--
p.progress {
	position:absolute;
	margin-top:300px;
	margin-left:200px;
	background-color:#FFFFFF;
	
}
#KAZIFRAME {
	background-color:#0099FF;
	border:thick;
	height:200px;
	width:200px;
	visibility:hidden;

}
-->
</style>
<body>
<script language="php">

If (isset($_POST['test1'])) {

	echo "Starting File Download";

	$server_name = "DEP.REALTRACS.COM";
	$userID = "ShakirFTP";
	$userpass = "99652";
	$local_file = "IDXResFile.txt";
	$server_file = "IDXResFile061409.txt";

	$local_handle = fopen($local_file, 'w');
	$conn_id = ftp_connect($server_name);

	$login_result = ftp_login($conn_id, $userID, $userpass);

	$fs = ftp_size($conn_id, $server_file);

	$ret = ftp_nb_fget($conn_id, $local_handle, $server_file, FTP_BINARY);
	while ($ret == FTP_MOREDATA) {

	   clearstatcache(); // <- this is important
	   $dld = filesize($local_file);
	   if ( $dld > 0 ){
	       // calculate percentage
	       $i = ($dld/$fs)*100;
		   echo "<script type=\"text/javascript\">window.parent.handleResponse($i)</script>";

// <p class=\"progress\">                                               </p><p class=\"progress\">$i % Dowloaded</p>";
		}   

	   // Continue downloading...
	   $ret = ftp_nb_continue($conn_id);
	}

	ftp_close($conn_id);

	if ($ret != FTP_FINISHED) {
	   echo "There was an error downloading the file...";
	   exit(1);
	}
}
</script>
<iframe id="KAZIFRAME" name="mainiframe" src="blank.html">
</iframe>
<br />
<form action="testftp.php" target="mainiframe" method="post">
<label>Click To Download The IDX File  </label><input type="submit" name="test1" value="DOWNLOAD" />
</form>
<h1 style="font-size:24px">
</body>
</html>
