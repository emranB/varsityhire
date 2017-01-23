<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$GET_job_ID = $_GET["job_ID"];
$GET_job_Category = $_GET["job_category"];
$GET_job_Title = $_GET["job_Title"];
?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle">Edit Job</h1>

<div class="content">
<div class="content-editJobPostProcess">


<?php

/*****************************************************/
$A1 = $_POST["A1"];

$A2 = $_POST["A2"];
if( $A2 == "Half" ){
	$val_A2 = "Half an hour";
}
else if( $A2 == "One" ){
	$val_A2 = "One hour";
}
else if( $A2 == "OneAndHalf" ){
	$val_A2 = "One and a half hours";
}
else if( $A2 == "Two" ){
	$val_A2 = "Two hours";
}
else if( $A2 == "Other" ){
	$val_A2 = "Other";
}

$A3 = $_POST["A3"];
$A4 = $_POST["A4"];
$A5 = $_POST["A5_Years"] . " years, " . $_POST["A5_Months"] . " months";

$A6 = $_POST["A6"];
if( $A6 == "Yes" ){
	$val_A6 = "Yes, all of it";
}
else if( $A6 == "No" ){
	$val_A6 = "No, none of it";
}
else if( $A6 == "Some" ){
	$val_A6 = "Some of it";
}

$A7 = $_POST["A7"];

$A8 = $_POST["A8"];
if( $A8 == "Yes" ){
	$val_A8 = "Yes, all of it";
}
else if( $A8 == "No" ){
	$val_A8 = "No, none of it";
}
else if( $A8 == "Some" ){
	$val_A8 = "Some of it";
}

$A9 = $_POST["A9"];

$job_title = $_POST["job_title"];
$date_Start = $_POST["date_start"];
/*****************************************************/


if( $Name == "" ){
	echo "<hr /><h1>Error: You must be logged in as a <strong>Client </strong> to post jobs <br> Redirecting . . . . </h1><hr />";
	header("Refresh: 2;url=../index.php");
}
else if( $Name !== "" && $UserType == "Client" ){


$sqlUpdateJobPost_Primary = " UPDATE jobs_posts " .
								" SET job_Title='$job_title', date_Start='$date_Start'
								  WHERE Job_ID='$GET_job_ID' ";
$queryUpdateJobPost_Primary	= $connection->query($sqlUpdateJobPost_Primary);

if( $queryUpdateJobPost_Primary ){

/************************ Change Based on Category*******************/
$sqlUpdateJobPost = " UPDATE " . $GET_job_Category .
						" SET A1='$A1', A2='$val_A2', A3='$A3', A4='$A4',
							  A5='$A5', A6='$val_A6', A7='$A7', A8='$val_A8', A9='$A9'
						  WHERE Job_ID='$GET_job_ID' ";
/************************ Change Based on Category*******************/
$queryUpdateJobPost = $connection->query($sqlUpdateJobPost);

if( $queryUpdateJobPost ){
	echo "<hr /><h1>Successfully Updated <strong> $GET_job_Title </strong> </h1><hr />";

	$sqlFetchUpdateJobPost = " SELECT * FROM jobs_posts WHERE job_ID='$GET_job_ID' ";
	$queryFetchUpdateJobPost = $connection->query($sqlFetchUpdateJobPost);
	$num_rows = mysqli_num_rows($queryFetchUpdateJobPost);

	while( $row = $queryFetchUpdateJobPost->fetch_assoc() ){

		if( $num_rows == "0" ){
			echo "<hr /><h1>Error: No Records Found <br> Redirecting . . . . </h1><hr />";
			header("Refresh: 2;url=../pages/index.php");
		}
		else if( $num_rows !== "0" ){
			$Job_ID = $row["job_ID"];
			$Job_Category = $row["job_Category"];
			$Job_Title = $row["job_Title"];

			$location = "pages/showJobDetailed.php?job_category=$Job_Category&&job_ID=$Job_ID&&job_Title=$Job_Title";
			header("Refresh: 2;url=$location");

			echo "<a href='$location' class='customBtn1'>BACK</a>";
		}
	}
}

}
}

$connection->close();

?>


</div>
</div>

</div>
</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
