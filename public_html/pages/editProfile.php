<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php include("../common/navigation.php"); ?>

<?php

if( $Name == "" ){
	echo "<hr /><h1>Sorry you are not logged in <br> Redirecting . . . . </h1><hr />";
	header("Refresh: 2;url=login.php");
}
else if( $Name !== "" ){
	include("editProfile-logged-in.php");
}

?>

<?php include("../common/footer.php"); ?>

</body>

</html>
