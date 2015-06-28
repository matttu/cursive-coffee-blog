<?php include('../includes/dblogin.inc.php') ?>
<?php if(isset($_POST['submit'])) {

		//check login
		$name = $_POST['name'];
		$pass = $_POST['password'];

		$result = mysql_query("SELECT * FROM users WHERE username='$name' AND password='$pass'");
		$num = mysql_num_rows($result);

		if($num != 0) {
		    session_start();
			$_SESSION['admin'] = "admin";
			header("Location: ../index.php");
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog: Login</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Matt Usifer" />
	<meta name="description" content="This is just a skeleton of a blog" />
	<meta name="keywords" content="Blog, Outline, Oh yeah" />
		
	<link rel="stylesheet"
	  href="../styles/stylez.css"
	  type="text/css"
	  media="screen" />
	<link rel="stylesheet"
	  href="../styles/login.css"
	  type="text/css"
	  media="screen" />

<!--[if lte IE 6]>
<style>
</style>
<![endif]-->
</head>

<body>
<!-- header -->
	<?php include('../includes/menu.inc.php') ?>

<div id="container">
	<div id="header">Login</div>
	<div id="content">
	
	<?php if(isset($_POST['submit']) && $num == 0) {
		?>
			<div style="text-align:center; font-size: 2em; margin: 50px auto 0; width: 500px; display: block; border: 1px solid #fff;">
			Let's try that again<br><br>
			<span style="font-size: .75em;">Go <a href='index.php'>back</a></span>
			</div>
	<?php
	} elseif (isset($_SESSION['admin']) && $_SESSION['admin'] != '') {
		echo "You're already logged in";
	} else {	
	?>
		<form action='index.php' method='post'>
			Username: <input type='text' name='name' /><br>
			Password: <input type='password' name='password' /><br>
			<input type='submit' name='submit' value='Login' />
		</form>
	<?php 
	}
	?>
	</div>

</div>
</body>
</html>
