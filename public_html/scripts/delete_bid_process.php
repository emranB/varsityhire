<?php include ("../common/document-head.php"); session_start();?>
<?php include ("../common/sessionVariables.php"); ?>


<body>

<?php
include("../common/navigation.php");
$_GET_job_ID = $_GET["job_ID"];
$_GET_student_ID = $_GET["student_ID"];
?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle"> Delete Bid </h1>

<div class="content">
<div class="content-delete_bid">

<?php

if($_SESSION["ID"] == $_GET_student_ID ){

	$sql_Delete_Bid = " DELETE FROM jobs_bids_details
                      WHERE job_ID='$_GET_job_ID'
                      AND bid_Student_ID='$_GET_student_ID' ";
	$query_Delete_Bid = $connection->query($sql_Delete_Bid);
  if( $query_Delete_Bid ){
    echo "<pre>Your bid has been deleted: <br /> Student ID: $_GET_student_ID</pre>";

    /**************** GET BID COUNT *******************/
    $sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$_GET_job_ID' ";
    $query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
    $bids_Count = mysqli_num_rows($query_Fetch_Bids_Details);
    /**************************************************/

    if( $bids_Count == 0 ){
      $status = "Unreplied";
		}
    else if( $bids_Count !== 0 ){
      $status = "Pending";
		}

	  $sql_Update_Bidding_Event = " UPDATE jobs_bids SET job_Status='$status', job_Bids_Count='$bids_Count' WHERE job_ID='$_GET_job_ID' ";
	  $query_Update_Bidding_Event = $connection->query($sql_Update_Bidding_Event);





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
