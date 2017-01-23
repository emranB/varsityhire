<?php include ("../common/document-head.php"); ?>

<body>

<?php include("../common/navigation.php"); ?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle">Contact Us <hr class="outlineHr" /></h1>

<div class="content">
<div class="content-postJob">


<form action="scripts/feedbackProcess.php">

<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-6">
		<label for="fname">First Name: </label><br>
		<input type="text" name="fname" value=" <?php echo "$Fname"; ?> " />
	</div>
	<div class="col-xs-12 col-md-6 col-lg-6">
		<label for="lname">Last Name: </label><br>
		<input type="text" name="lname" value=" <?php echo "$Lname"; ?> " />
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<label for="email">Email: </label><br>
		<input type="email" name="email" value=" <?php echo "$Email"; ?> " />
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<label for="subject">Subject: </label><br>
		<input type="text" name="subject" />
	</div>
</div>

<hr />

<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<label for="comments">Comments: </label><br>
		<textarea name="comments" id="comments" cols="" rows=""></textarea>
	</div>
</div>

<br><br><hr class="pageEndHr" /><br><br>
<input type="submit" class="customBtn1" value="SUBMIT" />


</form>



</div>
</div>

</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
