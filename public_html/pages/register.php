<?php include ("../common/document-head.php"); ?>

<body>

<?php include("../common/navigation.php"); ?>

<?php
if( $Name == "" ){
	include("register-logged-in.php");
}
else if( $Name !== "" ){
	echo "<hr /><h1>You are already logged in <br> Redirecting . . . .</h1><hr />";
	header("Refresh: 2;url=profile.php");
}

?>


<?php include("../common/footer.php"); ?>


</body>

</html>
