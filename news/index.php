<?php include('../includes/dblogin.inc.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Cursive Coffee | News</title>

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
	  href="../styles/news.css"
	  type="text/css"
	  media="screen" />
	<link rel='stylesheet' 
	  media='screen and (min-width: 600px) and (max-width: 1000px)' 
	  href='../styles/middle.css' />
	<link rel='stylesheet' 
	  media='screen and (max-width: 600px)' 
	  href='../styles/small.css' />  
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<!--[if lte IE 6]>
<style>
</style>
<![endif]-->

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">

function deletePost(postId) {
	$( "#dialog-confirm" ).dialog({
		resizable: false,
		height:200,
		modal: true,
		buttons: {
			"Delete post": function() {
			$( this ).dialog( "close" );
			window.location='../delete-post.php?postId='+postId;
			},
			Cancel: function() {
			$( this ).dialog( "close" );
			}
		}
	});
}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46696808-1', 'cursivecoffee.com');
  ga('send', 'pageview');

</script>
</head>
<body>
		
<!-- header -->
	<?php include('../includes/menu.inc.php') ?>

<div id="container">
	<div id="content">
	<div id="header">
		News
	</div>
			<?php 
			$page=0;

			if($pageVar = $_GET['page']) {
				$page=$pageVar-1;
			}

			$sql = mysql_query("select * from (SELECT id,title,content,`date`,@rownum:=@rownum+1 as row FROM posts, (select @rownum:=0)rn order by id desc)this where this.row >= 1+($page*3) order by id desc limit 3");
			$max_page_sql= mysql_fetch_array(mysql_query("select count(*) as total from posts"));
			$count=$max_page_sql['total'];
			$max_page= floor($max_page_sql['total']/3)-1;

			if ($count==0) { ?> 
			<div style="text-align:center; font-size: 1.5em; margin: 50px auto 0; width: 500px; display: block;">
			<span>Posts coming soon!</span>
			</div>			<?php } else {

			while($row = mysql_fetch_array($sql)) {
			?>
				<div class="post-mega-box">
				<?php 	for($i=0; $i<3; $i++) {
					if ($i > 0) {
						$row = mysql_fetch_array($sql);
					} 
					if (!empty($row)) {
					$id = $row['id'];
					$title = $row['title'];
					$content = $row['content'];
					$date=$row['date'];

					$year=substr($date,0,4);
					if (substr($date,5,2)=='01') {
						$month='January';
					} elseif (substr($date,5,2)=='02') {
						$month='February';
					} elseif (substr($date,5,2)=='03') {
						$month='March';
					} elseif (substr($date,5,2)=='04') {
						$month='April';
					} elseif (substr($date,5,2)=='05') {
						$month='May';
					} elseif (substr($date,5,2)=='06') {
						$month='June';
					} elseif (substr($date,5,2)=='07') {
						$month='July';
					} elseif (substr($date,5,2)=='08') {
						$month='August';
					} elseif (substr($date,5,2)=='09') {
						$month='September';
					} elseif (substr($date,5,2)=='10') {
						$month='October';
					} elseif (substr($date,5,2)=='11') {
						$month='November';
					} elseif (substr($date,5,2)=='12') {
						$month='December';
					}

					$day=substr($date,8,2);
				?>
					<div class="post-box">
						<div class="post-date">
							<?php echo $day.' '.$month.' '.$year; ?>
						</div>
						<h3 class="post-title"><?php echo $title; ?></h3>

						<p class="post-content"><?php echo $content; ?></p>

						<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] != '') { 
							$_SESSION['content'] = $content;
							$_SESSION['title'] = $title;
						?>
							<div class="edit-post"><a href="../edit-post.php?postId=<?php echo $id ?>">Edit Post</a></div>
							<div class="delete-post"><a href="#" class="delete-post" onclick="deletePost(<?php echo $id ?>)">Delete Post</a></div>
						<?php } ?>
					</div>
				<?php
						}
					}
				?>
				<?php if($page!=0) { ?>
					<div id="prev-page"><a href="./index.php?page=<?php echo $page; ?>">previous page</a></div>
				<?php } 
				if($page<$max_page) { ?>
					<div id="next-page"><a href="./index.php?page=<?php echo $page+2; ?>">next page</a></div>
					</div>
			<?php
				}
			}
		}
			?>
	</div>
</div>

<?php include('../includes/footer.inc.php') ?>

<div id="dialog-confirm" title="Are you sure?" style="display: none; ">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This shit is irreversible.</p>
</div>
</body>
</html>