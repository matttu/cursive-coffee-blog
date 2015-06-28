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
	  href="./styles/stylez.css"
	  type="text/css"
	  media="screen" />
	<link rel="stylesheet"
	  href="./styles/create-post.css"
	  type="text/css"
	  media="screen" />
<!--[if lte IE 6]>
<style>
</style>
<![endif]-->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="create-post/nicedit/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
      
	bkLib.onDomLoaded(function() { 
		new nicEditor(
			{
				fullPanel : true,
				uploadURI: 'create-post/nicedit/nicUpload.php',
				iconsPath : 'create-post/nicedit/nicEditorIcons.gif'
			}).panelInstance('editor1');
	});
    </script>
</head>
<body>
<!-- header -->
	<?php include('./includes/menu.inc.php') ?>

<div id="container">
	<div id="header">
		Edit Post
	</div>

	<div id="content">
	<?php
	$postIdVar = $_GET['postId'];

	if(isset($_POST['submit'])) {
		$title = addslashes($_POST['title']);
		$content = addslashes($_POST['content']);

		mysql_query("UPDATE posts SET title='$title', content='$content' where id=$postIdVar");
		?>
			<div style="text-align:center; font-size: 2em; margin: 50px auto 0; width: 500px; display: block; border: 1px solid #fff;">
			REMIX!<br><br>
			<span style="font-size: .75em;">Click <a href='./news'>here</a> to see it</span>
			</div>
	<?php
	} else {
		$sql = mysql_query("SELECT * FROM posts where id=$postIdVar");
		if (!$sql) {
			exit('<p> Error performing query: ' .
			mysql_error() . '<p/>');
		} else {
			$row=mysql_fetch_array($sql);
			$title = $row['title'];
			$content=$row['content'];
		}
	?>
		<div id="createPost">
			<form action='edit-post.php?postId=<?php echo $postIdVar ?>' method='post'>
				<input type='text' name='title' value="<?php echo htmlspecialchars($title); ?>" /><br />
				<textarea id="editor1" name='content'><?php echo htmlspecialchars($content); ?></textarea> <br />
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