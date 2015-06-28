<?php include('./includes/dblogin.inc.php') ?>

<?php 

if (!(isset($_SESSION['admin']) && $_SESSION['admin'] != '')) {

	header ("Location: login.php");

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog: Home</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Matt Usifer" />
	<meta name="description" content="This is just a skeleton of a blog" />
	<meta name="keywords" content="Blog, Outline, Oh yeah" />
		
	<link rel="icon" 
      type="image/png" 
      href="/pictures/c.png">
	<link rel="stylesheet"
	  href="styles/stylez.css"
	  type="text/css"
	  media="screen" />
<!--[if lte IE 6]>
<style>
</style>
<![endif]-->
<script type="text/javascript" src="/cursive-coffee/ckeditor/ckeditor.js"></script>
</head>
<body>
<!-- header -->
	<?php include('./includes/menu.inc.php') ?>

<div id="container">
	<div id="header">
		Delete Post
	</div>

	<div id="content">
	<?php
	$postIdVar = $_GET['postId'];

	mysql_query("DELETE FROM posts where id=$postIdVar");
	?>
			<div style="text-align:center; font-size: 2em; margin: 50px auto 0; width: 500px; display: block; border: 1px solid #fff;">
			That post is history<br><br>
			<span style="font-size: .75em;">Back to <a href='./news'>news</a>.</span>
			</div>
	</div>	
</div>
</body>
</html>