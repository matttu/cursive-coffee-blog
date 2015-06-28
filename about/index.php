<?php include('../includes/dblogin.inc.php'); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Cursive Coffee | About</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Matt Usifer" />
	<meta name="description" content="Burlington's finest Coffee and Espresso Catering" />
	<meta name="keywords" content="Coffee, Cursive, Burlington, Vermont, Barista, Jim, Osborn, Sam, Clifton" />
		
	<link rel="icon" 
      type="image/png" 
      href="../pictures/c.png">
	<link rel="stylesheet"
	  href="../styles/stylez.css"
	  type="text/css"
	  media="screen" />
	<link rel="stylesheet"
	  href="../styles/about.css"
	  type="text/css"
	  media="screen" />
	<link rel='stylesheet' 
	  media='screen and (min-width: 600px) and (max-width: 900px)' 
	  href='../styles/middle.css' />
	<link rel='stylesheet' 
	  media='screen and (max-width: 600px)' 
	  href='styles/small.css' />  
	<link rel='stylesheet' 
	  media='screen and (max-height: 50px)' 
	  href='../styles/short.css' />  
<!--[if lte IE 6]>
<style>
</style>
<![endif]-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	$('div#about-bottom div.active').fadeIn();

	$('div#about-top a').click(function() {
		var contentId = $(this).attr('id') + '-content';
		var imgId = $(this).attr('id') + '-img';

		$('a.active').removeClass('active');
		$(this).addClass('active');
		$('div.active').removeClass('active').hide();
		$('#'+contentId).addClass('active').fadeIn();
	});

	$('div#about-top a').mouseover(function() {
		$('div#about-top a').addClass('blur');
		$(this).removeClass('blur');
	});

	$('div#about-top a').mouseleave(function() {
		$('div#about-top a').removeClass('blur');
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
	<?php include('../includes/menu.inc.php') ?>

<div id="container">
		<div id="content">
			<div id="about-top">
				<ul>
					<li><a href="#" id="about-main" class="active">About</a></li>
					<li><a href="#" id="about-coffee">Our Coffee</a></li>
					<li><a href="#" id="about-approach">Our Approach</a></li>
					<li><a href="#" id="about-contact">Contact/Booking</a></li>
				</ul>
			</div>
			<div id="about-bottom">
			<div id="about-left">
				<img src="./pictures/coffee.jpg" id="about-approach-img">
			</div>
			<div id="about-right">
				<div id="about-main-content" class="active">
					<p>Cursive Coffee is a mobile coffee company based in Burlington, VT. 
					We approach our ingredients with the same transparency, respect, and 
					enthusiasm that has become the hallmark of Vermont’s vibrant food culture, 
					and look forward to engaging this community, wherever we can. We take 
					shape as a brew bar, an espresso bar, an educational resource, or any
					amalgamation of the three. Regardless of where you may find us or what 
					your context may require, we are proud to present the most delicious beverage 
					and gratifying experience that we possibly can.</p> 
					<p>If you are interested in working 
					together, please email <a href="mailto:hello@cursivecoffee.com">Hello@CursiveCoffee.com</a>.</p>
				</div>
				<div id="about-coffee-content">
					<p>Our coffee is grown in many parts of the world, and is roasted by Irving Farm 
					Coffee Roasters. Irving Farm is a company that operates primarily in Manhattan, 
					with their roastery and an additional café in Millerton, New York, in the Hudson 
					Valley. There is no company we could be happier to work with. Every offering we’ve 
					tried has been absolutely phenomenal, and their approach to presenting these offerings 
					is engaging, transparent, and human. To learn more about Irving Farm, visit 
					<a href="http://www.irvingfarm.com" target="#">IrvingFarm.com</a>.</p>
					<a href="http://www.irvingfarm.com" target="#" id="irvingfarm">
					<img src="./pictures/irvingfarm.png">
					</a>
				</div>
				<div id="about-approach-content">
					<p>Our company can operate in several different ways, depending on the context. 
					For community or smaller events, you may see us as a <b>brew bar</b> – preparing single cups of coffee, 
					one at a time, each one utilizing the technique we feel best accentuates the coffee’s character. 
					This set-up is engaging and minimalist, fitting wonderfully alongside farm stands and 
					food trucks.</p>

					<p>For larger events or for catering, we can accompany our brew bar with an <b>espresso bar</b>, offering 
					single origin espresso and milk beverages from 2 oz (solo espresso) to 8 oz.</p>

					<p>For those seeking to enhance coffee service at their own establishment, Cursive is also happy 
					to <b>educate and advise</b>. Coffee is our favorite topic of conversation – we would love to talk to you 
					about it.</p>
				</div>
				<div id="about-contact-content">
				<p>For inquiries of any sort, please contact <a href="mailto:hello@cursivecoffee.com">Hello@CursiveCoffee.com</a></p>
				</div>
				</div>
			</div>
		</div>
</div>

<?php include('../includes/footer.inc.php') ?>
</body>
</html>