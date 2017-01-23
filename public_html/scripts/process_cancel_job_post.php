<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>


<body>

<?php
include("../common/navigation.php");
$GET_job_Category = $_GET["job_category"];
$GET_job_ID = $_GET["job_ID"];
$GET_job_Title = $_GET["job_Title"];
?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle">Jobs Pending </h1>

<div class="content">
<div class="content-cancel-job-post">

<?php

// echo $GET_job_Category . "<br />" . $GET_job_ID . "<br />" . $GET_job_Title;

$sql_Cancel_From_jobs_posts = " UPDATE jobs_posts SET job_Status='Cancelled' WHERE job_ID='$GET_job_ID' ";
$query_Cancel_From_jobs_posts = $connection->query($sql_Cancel_From_jobs_posts);
if($query_Cancel_From_jobs_posts){
  echo "<hr />Succesfully cancelled from jobs posts table!";
}

$sql_Cancel_From_jobs_bids = " UPDATE jobs_bids SET job_Status='Cancelled' WHERE job_ID='$GET_job_ID' ";
$query_Cancel_From_jobs_bids = $connection->query($sql_Cancel_From_jobs_bids);
if($query_Cancel_From_jobs_bids){
  echo "<hr />Succesfully cancelled from jobs bids table!";
}

$sql_Cancel_From_jobs_bids_details = " UPDATE jobs_bids_details SET bid_Status='cancelled' WHERE job_ID='$GET_job_ID' ";
$query_Cancel_From_jobs_bids_details = $connection->query($sql_Cancel_From_jobs_bids_details);
if($query_Cancel_From_jobs_bids_details){
  echo "<hr />Succesfully cancelled from jobs bids details table! <hr />";
}

echo "<p>Redirecting . . . .</p>";
header("Refresh: 1;url=../pages/showJobsForOneClient.php");


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
