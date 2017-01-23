<!-- Document Head -->
<?php include("../password/dbConnect.inc"); session_start(); ?>
<?php include("common/sessionVariables.php"); ?>
<!DOCTYPE html>

<html>
<head>

<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Varsity Hire</title>
<base href="http://localhost/my_files/varsity-hire/public_html/" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="css/elusive-icons/css/elusive-icons.css">
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/navWithLogin.css" />
<script type="text/javascript" src="scripts/custom.js"></script>

</head>

<body>

<div class="row">
<div class="homeFirstDiv">
	<?php include("common/navigation.php"); ?>
	<h1>GET THE JOB DONE</h1><hr />
	<?php include("pages/carousel.php"); ?>
	<p>CONNECTING STUDENTS LOOKING FOR WORK <br> WITH RESIDENTS LOOKING TO HIRE</p>
	<br>
	<!-- <a href="pages/postJob.php" class="customBtn1">FEATURED ON</a> -->
	<br><br><br>
	<a href="#homeThirdDiv" class="scrollDown">
		<span class="glyphicon glyphicon-chevron-down"></span>
	</a>
</div>
</div>


<div class="row">
<div class="homeFeaturedOn">
	<h1 class='featured_h1'> FEATURED ON: </h1>
	<div class="col-xs-12 col-md-4 col-lg-4"><img src="pics/featured_on_1.jpg" alt=""></div>
	<div class="col-xs-12 col-md-4 col-lg-4"><a href="http://www.cbc.ca/news/canada/calgary/varsityhire-calgary-student-jobs-1.3537899"><img src="pics/featured_on_2.jpg" alt=""></a></div>
	<div class="col-xs-12 col-md-4 col-lg-4"><a href="http://www.techvibes.com/blog/varsityhire-2016-04-08"><img src="pics/featured_on_3.jpg" alt=""></a></div>
</div>
</div>
<hr style="border: 0 solid #262626; margin-bottom: 100px;">

<div class="row">
<div id="homeThirdDiv" class="homeThirdDiv">
<div class="col-xs-12 col-md-4 col-lg-4">
	<div class='card'>
		<div class='front face'>
			<span class="glyphicon glyphicon-dashboard"></span>
			<hr style="border:2px solid #262626;"/><h1>SAVE TIME AND MONEY</h1>
		</div>
		<div class="back face">
			<p>Student workers offer a convenient, cost-effective way
			to have jobs completed at your home without interrupting your day-to-day life.</p>
		</div>
	</div>
</div>
<div class="col-xs-12 col-md-4 col-lg-4">
	<div class='card'>
		<div class='front face'>
			<span class="el el-usd"></span>
			<hr style="border:2px solid #262626;"/><h1>PICK YOUR PRICE</h1>
		</div>
		<div class="back face">
			<p>Post your required job, VARSITYHIRE student workers will
			make price offers, and you select the price and worker that best suits you.</p>
		</div>
	</div>
</div>
<div class="col-xs-12 col-md-4 col-lg-4">
	<div class='card'>
		<div class='front face'>
			<span class="el el-wrench"></span>
			<hr style="border:2px solid #262626;"/><h1>QUALITY SERVICE</h1>
		</div>
		<div class="back face">
			<p>VARSITYHIRE student workers are rated after each
			service to guarantee a maintained high standard.</p>
		</div>
	</div>
</div>
</div>
</div>


<div class="row">
	<div class="footer" style="margin-top: 0;">
		<h3>Copyright 2016 <br><strong>VARSITYHIRE</strong></h3>
	</div>
</div>


</body>

</html>
