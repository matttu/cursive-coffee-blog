<?php
session_start();
$_SESSION['admin'] = '';
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog: Logged out</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Matt Usifer" />
	<meta name="description" content="This is just a skeleton of a blog" />
	<meta name="keywords" content="Blog, Outline, Oh yeah" />
		
	<link rel="stylesheet"
	  href="../styles/stylez.css"
	  type="text/css"
	  media="screen" />
	<link rel="stylesheet"
	  href="..styles/admin.css"
	  type="text/css"
	  media="screen" />

<!--[if lte IE 6]>
<style>
</style>
<![endif]-->

<!-- text editor scripts -->
<script type="text/javascript" src="/cursive-coffee/ckeditor/ckeditor.js"></script>
</head>

<body>
<!-- header -->
	<?php include('../includes/menu.inc.php') ?>

<div id="container">

	<div id="header">
		Congratulations
	</div>

	<div id="content" style="text-align:center; font-size: 1.5em;">
		You're all logged out.
	</div>	
</div>

</body>
</html>