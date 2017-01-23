<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>


<body>

<?php
include("../common/navigation.php");
$GET_job_Category = $_GET["job_category"];
$GET_job_ID = $_GET["job_ID"];
$GET_job_Title = $_GET["job_Title"];
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle">Jobs Pending </h1>

<div class="content">
<div class="content-cancel-job-post">

<?php

$location = "scripts/process_cancel_job_post.php?job_category=$GET_job_Category&&job_ID=$GET_job_ID&&job_Title=$GET_job_Title";

echo "<div class='col-lg-12 col-md-12 col-xs-12'>" .
     "<div class='cofirm_bid_bid_details'>" .
        "<div class='col-lg-6 col-md-6 col-xs-12'> Job Category: </div>" .
        "<div class='col-lg-6 col-md-6 col-xs-12'> $GET_job_Category </div>" .
        "<div class='col-lg-6 col-md-6 col-xs-12'> Job Title: </div>" .
        "<div class='col-lg-6 col-md-6 col-xs-12'> $GET_job_Title </div>" .
        "<a href='$location' class='confirm_bid_acceptance'>" .
          "<div class='col-lg-12 col-md-12 col-xs-12'>Confirm Job Post Cancellation</div>" .
        "</a>".
     "</div>".
     "</div>";


$connection->close();

?>



</div>
</div>

</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
