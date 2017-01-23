<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php include("../common/navigation.php"); ?>

<?php

if( $Name == "" ){
	echo "<hr /><h1>Sorry you are not logged in <br> Redirecting . . . . </h1><hr />";
	header("Refresh: 1;url=../index.php");
}
else if( $Name !== "" && $UserType == "Student" ){
	echo "<hr /><h1>Error: You must be logged in as a <strong>Client </strong> to post jobs <br> Redirecting . . . . </h1><hr />";
	header("Refresh: 1;url=../index.php");
}
else if( $Name !== "" && $UserType == "Client" ){
	include("postJobLoggedIn.php");
}

?>

<?php include("../common/footer.php"); ?>

</body>

</html>
