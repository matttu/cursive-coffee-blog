<?php function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
} ?>

<div id="logo-menu">
	<div id="logo">
		<a href="http://localhost/greatbigwinter/cursive-coffee/">
			<img src="http://localhost/greatbigwinter/cursive-coffee/pictures/logo.png" alt="blog" />
		</a>
	</div>
<!-- corners -->
<div id="leftcorner"></div>
<div id="rightcorner">
	<table>
		<tr>
			<td><a href="http://localhost/greatbigwinter/cursive-coffee/login/" <?php if(curPageURL()=='http://localhost/greatbigwinter/cursive-coffee/login/'){ echo 'id="active"'; } ?>>Login</a></td>
	<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] != '') { ?>
			<td><a href="http://localhost/greatbigwinter/cursive-coffee/logout/" <?php if(curPageURL()=='http://localhost/greatbigwinter/cursive-coffee/logout/'){ echo 'id="active"'; } ?>>Logout</a></td>
			<td><a href="http://localhost/greatbigwinter/cursive-coffee/create-post/" <?php if(curPageURL()=='http://localhost/greatbigwinter/cursive-coffee/create-post/'){ echo 'id="active"'; } ?>>Create&nbsp;Post</a></td>
	<?php } ?>
		</tr>
	</table>
</div>
<!-- Header -->
<div id="header-left">
		<nav>
		<div id="navbar">
		<table>
			<tr>
				<td><a href="http://localhost/greatbigwinter/cursive-coffee/about" <?php if(curPageURL()=='http://localhost/greatbigwinter/cursive-coffee/backupse/dev%20backups/production/about/'){ echo 'id="active"'; } ?>>About</a></td>
				<td><a href="http://localhost/greatbigwinter/cursive-coffee/news" <?php if(curPageURL()=='http://localhost/greatbigwinter/cursive-coffee/backupse/dev%20backups/production/news/'){echo 'id="active"'; } ?>>News</a></td>
			</tr>	
		</table>	
		</div>
		</nav>
</div>
	<div id="header-right">
	<div id="social-media">
		<a href="http://www.twitter.com/cursivecoffee" target="#"><img src="http://localhost/greatbigwinter/cursive-coffee/pictures/social-media/twitter.png" /></a>
		<a href="http://www.facebook.com/cursivecoffee " target="#"><img src="http://localhost/greatbigwinter/cursive-coffee/pictures/social-media/facebook.png" /></a>
		<a href="http://cursivecoffee.tumblr.com " target="#"><img src="http://localhost/greatbigwinter/cursive-coffee/pictures/social-media/tumblr.png"></a>
	</div>
	</div>
</div>
