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
<script type="text/javascript" src="scripts/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({
    effect: 'fade',               // Specify sets like: 'fold,fade,sliceDown'
    slices: 15,                     // For slice animations
    boxCols: 8,                     // For box animations
    boxRows: 4,                     // For box animations
    animSpeed: 500,                 // Slide transition speed
    pauseTime: 6000,  
    pauseOnHover: false,              // How long each slide will show
    startSlide: 0,                  // Set starting Slide (0 index)
    directionNav: false,             // Next & Prev navigation
    controlNav: false,               // 1,2,3... navigation
    controlNavThumbs: false,        // Use thumbnails for Control Nav
    manualAdvance: false,           // Force manual transitions
    randomStart: false,             // Start on a random slide
    beforeChange: function(){},     // Triggers before a slide transition
    afterChange: function(){},      // Triggers after a slide transition
    slideshowEnd: function(){},     // Triggers after all slides have been shown
    lastSlide: function(){},        // Triggers when last slide is shown
    afterLoad: function(){}         // Triggers when slider has loaded
});

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
		<div id="slideshow-caption">
		</div>
		<div id="slider" class="nivoSlider">
			<img src="pictures/slider/fjord0.jpg" alt="" />
		    <img src="pictures/slider/fjord2.jpg" alt="" />
		    <img src="pictures/slider/fjord3.jpg" alt="" />
		    <img src="pictures/slider/fjord4.jpg" alt="" />
		    <img src="pictures/slider/fjord5.jpg" alt="" />
		    <img src="pictures/slider/fjord6.jpg" alt="" />
		</div>
</div>

<?php include('./includes/footer.inc.php') ?>
</body>
</html>