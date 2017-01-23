<?php include ("sessionVariables.php"); ?>
<?php
if( $Name == "" ){
	include("navWithLogin.php");
}

if( $Name !== "" && $UserType == "Client" ){
	include("navWithLogout.php");
}

else if( $Name !== "" && $UserType == "Student" ){
	include("navWithLogout-Student.php");
}

?>
