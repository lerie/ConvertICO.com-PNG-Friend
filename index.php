<!doctype html>
<html lang="en">
<head>
	<!-- Lerie Taylor / 8:35 PM 4/22/2012 -->
	<title>ConvertICO.com PNG Archiver</title>

	<link rel="stylesheet" type="text/css" href="main.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>

	<script>
	var refreshId = setInterval(function()
	{
		$('#png_holder').load('png.php');
		$('#png_count').load('png_count.php');
	}, 5000);
	</script>
</head>
<body>
	<h1>ConvertICO.com PNG Friend</h1>
	<p>By Lerie Taylor<br/><a href="mailto:mr.lerie@gmail.com">mr.lerie@gmail.com</a><br/><a href="http://www.linkedin.com/profile/view?id=167476628">LinkedIN</a>, <a href="http://www.behance.net/lerie">behance</a>, <a href="http://codecanyon.net/user/lerie/portfolio">Envato</a></p>
	<h3>Right click, save picture</h3>

	<p class="text">This script will run until it hits 100 images, then it will archive the 100 images in a folder named for the first image in the set of 100 images. While you may not see all 100 images on the screen in front of you I assure you they are being archived. I will try to update this script as much ass possible to allow easier access to the png archives. There is nothing illegal about this script. This script simply helps me find free icons offered by ConvertICO.com's converter. Some images may only be suitable for adults, use at your own risk. If it stops moving just refresh the page.</p>
	<br clear="all" />

	<div id="png_count"><p>Counting files...</p></div>
	<div id="png_holder"><img src="loading23.gif" /></div>
</body>
</html>