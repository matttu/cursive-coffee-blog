<?php include('./includes/dblogin.inc.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Cursive Coffee | Burlington, Vermont</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Matt Usifer" />
	<meta name="description" content="Burlington's finest Coffee and Espresso Catering" />
	<meta name="keywords" content="Coffee, Cursive, Burlington, Vermont, Barista, Jim, Osborn, Sam, Clifton" />
		
	<link rel="icon" 
      type="image/png" 
      href="pictures/c.png">
	<link rel="stylesheet"
	  href="styles/stylez.css"
	  type="text/css"
	  media="screen" />
	<link rel="stylesheet" 
		href="styles/nivo-slider.css" 
		type="text/css" />
	<link rel="stylesheet"
	  href="styles/home.css"
	  type="text/css"
	  media="screen" />
	<link rel='stylesheet' 
	  media='screen and (min-width: 600px) and (max-width: 900px)' 
	  href='styles/middle.css' />
	<link rel='stylesheet' 
	  media='screen and (max-width: 600px)' 
	  href='styles/small.css' />  
	<link rel='stylesheet' 
	  media='screen and (max-height: 50px)' 
	  href='styles/short.css' />  
<!--[if lte IE 6]>
<style>
</style>
<![endif]-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript">
$('div#kettle').mouseover(function() {

		$(this).attr('style','width:300px; margin-left:-150px;');
		$(this).find('span').fadeIn();

	});
$('div#kettle').mouseleave(function() {

		$(this).find('span').hide();
		$(this).attr('style','width:80px; margin-left:-40px;');

	});
});
</script>
</head>
<body>
		
<!-- header -->
	<?php include('./includes/menu.inc.php') ?>

<div id="container">
		<div id="slider">
			<img src="pictures/fjord0.jpg" alt="" />
		</div>
</div>

<?php include('./includes/footer.inc.php') ?>
</body>
</html>