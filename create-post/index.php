<?php include('../includes/dblogin.inc.php') ?>
<?php if (!(isset($_SESSION['admin']) && $_SESSION['admin'] != '')) { header("Location: ../login"); } ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cursive Coffee | Create Post</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Matt Usifer" />
	<meta name="description" content="This is just a skeleton of a blog" />
	<meta name="keywords" content="Blog, Outline, Oh yeah" />
		
	<link rel="icon" 
      type="image/png" 
      href="/pictures/c.png">
	<link rel="stylesheet"
	  href="../styles/stylez.css"
	  type="text/css"
	  media="screen" />
	<link rel="stylesheet"
	  href="../styles/create-post.css"
	  type="text/css"
	  media="screen" />

<!--[if lte IE 6]>
<style>
</style>
<![endif]-->

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="nicedit/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
      
	bkLib.onDomLoaded(function() { 
		new nicEditor(
			{
				fullPanel : true,
				uploadURI: 'nicedit/nicUpload.php',
				iconsPath : 'nicedit/nicEditorIcons.gif'
			}).panelInstance('editor1');
	});
    </script>

</head>

<body>
<!-- header -->
	<?php include('../includes/menu.inc.php'); ?>

<div id="container">

	<div id="content">
	<div id="header">
		Create Post
	</div>
	<?php
	if(isset($_POST['submit'])) {
		$title = addslashes($_POST['title']);
		$content = addslashes($_POST['content']);
		date_default_timezone_set('America/New_York');
		$date = date('Y-m-d');

		mysql_query("INSERT INTO posts (title, content, date) VALUES('$title', '$content', '$date')");
		?>
			<div style="text-align:center; font-size: 2em; margin: 50px auto 0; width: 500px; display: block; border: 1px solid #fff;">
			NICE<br><br>
			<span style="font-size: .75em;">Click <a href='../news'>here</a> to see it</span>
			</div>
	<?php
	} else {
	?>

		<div id="createPost">
			<form action='index.php' method='post'>
				<input type='text' name='title' placeholder='Title' /><br />
				<textarea id="editor1" name="content">
				</textarea> 
				<br />
				<input type='submit' name='submit' value='Post' />
			</form>
		</div>
	<?php
	}
	?>

	</div>	
</div>

</body>
</html>