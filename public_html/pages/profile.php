<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>
<?php
    ini_set('mysql.connect_timeout',300);
    ini_set('default_socket_timeout',300);
?>
<?php
  $GET_ID = $_GET["ID"];
  $Ref = parse_url($_SERVER['HTTP_REFERER']);
  $Referer = basename($Ref["path"]);
  // echo $Referer;
?>

<body>

<?php include("../common/navigation.php"); ?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<div class="content">
<div class="content-accepted-bids-history">


<?php
// --------------------------------------------------
if( $_SESSION["Password"] == "" ){
	echo "<hr /><h3>Error: You are not logged in <br> Redirecting . . . . </h3><hr />";
	header("Refresh: 2;url=login.php");
}
else if( $_SESSION["Password"] !== "" && $GET_ID == "" ){
	include("profile-logged-in.php");
}
else if( $_SESSION["Password"] !== "" && $GET_ID !== "" &&
         $Referer == "showJobs.php" || $Referer == "showJobsForOneClient.php" ||
         $Referer == "showJobsPending.php" || $Referer == "showJobsScheduled.php" ||
         $Referer == "showBids.php" || $Referer == "accepted_bids_history.php"
       ){
	include("profile-logged-in-view-user.php");
}
// ---------------------------------------------------
?>


</div>
</div>

</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
