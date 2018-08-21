<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<BODY MARGINHEIGHT="0" MARGINWIDTH="0" TOPMARGIN="0" RIGHTMARGIN="0" BOTTOMMARGIN="0" LEFTMARGIN="0">
<table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%" background="images/main_bg.gif"><tr><td>
<table align="center" width="895" cellspacing="0" cellpadding="0" border="0">
<tr>
<TD colspan="2" height="88" class="menu-bg" style="background-image: url('images/menu_bg.gif'); background-repeat: repeat-x">
<table cellpadding="0" cellspacing="0" width="100%" border="0"><tr>
                <td class="company" style="padding-left: 20px;"><img src="images/logo.gif" alt="Nashville Real Estate Flat Fee" width="150" height="88" align="absmiddle" style="margin-right: 5px">                </td>
                <td align="right"><table cellpadding="0" cellspacing="0" align="right"><td><img src="images/abullet.gif" alt="Nashville Real Estate Flat Fee" width="12" height="12" border="0"></td>
                <td><span class="menu">Home</span></td><td /><td><a href="FAQs.html"><img src="images/bullet.gif" alt="Nashville Real Estate Flat Fee" width="12" height="12" border="0"></a></td>
                <td><a href="FAQs.html"><span class="menu">FAQs</span></a></td><td />
                <td><a href="AboutUs.html">"<img src="images/bullet.gif" alt="Nashville Real Estate Flat Fee" width="12" height="12" border="0"></a></td>
                <td><a href="AboutUs.html" class="menu">About</a></td><td />
				<td><a href="PricingOptions.html"><img src="images/bullet.gif" alt="Nashville Real Estate Flat Fee" width="12" height="12" border="0"></a></td>
				<td><a href="PricingOptions.html" class="menu">Pricing Options </a></td><td />
                <td><a href="FeaturedListings.php#viewpoint1"><img src="images/bullet.gif" alt="Nashville Real Estate Flat Fee" width="12" height="12" border="0"></a></td>
				<td><a href="FeaturedListings.php#viewpoint1" class="menu">Featured Listings</a></td>
                <td width="20"><div style="width:20px; height:1px;"><spacer type="block" width="20" height="1"></spacer></div></td></tr></table></td></tr></table>
</tr>
<tr>
<td width="895" height="225" align="Right" valign="top"><img src="images/header2.gif" alt="Nashville Real Estate Flat Fee" border="0" style="margin-bottom:-4px;" /></td>
</tr>
<tr>
<td width="100%" height="60" align="center" valign="middle" bgcolor="#C0C0C0">
<form action="guestbook.php" method="post">
	<p>
		<strong><h1>THANK YOU FOR VISITING OUR WEBSITE<br />
		PLEASE TAKE A MOMENT TO SIGN OUR GUESTBOOK<br /></h1>
		YOU WILL BE REDIRECTED TO OUR SITE AFTER YOU CLICK SUBMIT<br />
		</strong>
		<br />
		PLEASE ENTER YOUR FIRST AND LAST NAME:<br />
		<input type="text" name="name" size="50" maxlength="150" value="" />
	</p>
	<p>
		PLEASE ENTER YOUR EMAIL ADDRESS:<br />
		<input type="text" name="email" size="50" maxlength="150" />
	</p>
	<p>
		PLEASE ENTER THE CURRENT DATE:<br />
		<?php 
		$now = date( "F d, Y G:i:s", time() );
		echo "<input type=\"text\" name=\"datestamp\" size=\"50\" maxlength=\"150\" value=\".$now.\" />"
		?>
		
	</p>
	<p>
		<input type="hidden" name="wherefrom" size="150" value="NashvilleHomeSearch" />
		<input type="hidden" name="finalpage" size="150" value="http://www.ilistrealty.net/FeaturedListings.php#viewpoint1" />
		<input type="submit" name="submit" value="SUBMIT!" />
	</p>
</form>
</td></tr></table>

		
</body>
</html>
