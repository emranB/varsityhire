<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$GET_ID = $_GET["ID"];
$GET_UserType = $_GET["UserType"];
$GET_Action = $_GET["action"];
?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle">Post New Job </h1>

<div class="content">
<div class="content-verify-user-account">


<?php
// ----------------------------------------------------------------------------- //

if( $GET_Action == "verify" ){

  if( $GET_UserType == "Student" ){
    $sql_Verify_User = " UPDATE students SET account_status='verified' WHERE ID='$GET_ID' ";
    $query_Verify_User = $connection->query($sql_Verify_User);
    if( $query_Verify_User ){
      echo "<hr /><h1> Account Succesfully Verified! <br /> Please Login With Your Credentials </h1><hr />";
    }else{
      echo "<hr /><h1> Failed to verify account </h1><hr />";
    }
  }

  else if( $GET_UserType == "Client" ){
    $sql_Verify_User = " UPDATE clients SET account_status='verified' WHERE ID='$GET_ID' ";
    $query_Verify_User = $connection->query($sql_Verify_User);
    if( $query_Verify_User ){
      echo "<hr /><h1> Account Succesfully Verified! <br /> Please Login With Your Credentials </h1><hr />";
    }else{
      echo "<hr /><h1> Failed to verify account </h1><hr />";
    }
  }

}


// ----------------------------------------------------------------------------- //


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
