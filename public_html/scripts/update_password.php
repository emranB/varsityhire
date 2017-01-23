<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php include("../common/navigation.php"); ?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<hr><h1> Update Password </h1><hr>

<div class="content">
<div class="content-accepted-bids-history">



<?php
// --------------------------------------------------
if( $_SESSION["ID"] !== "" ){
?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return validate_update_password();" method="post">
<div class="update_password_div">

  <div class="col-xs-12 col-md-4 col-lg-4">
    Username:
  </div>
  <div class="col-xs-12 col-md-8 col-lg-8">
    <?php echo $_SESSION["Name"]; ?>
  </div>

  <div class="col-xs-12 col-md-4 col-lg-4">
    Email:
  </div>
  <div class="col-xs-12 col-md-8 col-lg-8">
    <?php echo $_SESSION["Email"]; ?>
  </div>

  <div class="col-xs-12 col-md-4 col-lg-4">
    Old Password:
  </div>
  <div class="col-xs-12 col-md-8 col-lg-8">
    <?php echo $_SESSION["Password"]; ?>
  </div>

  <div class="col-xs-12 col-md-4 col-lg-4">
    New Password:
  </div>
  <div class="col-xs-12 col-md-8 col-lg-8">
    <input type="password" name="new_password" placeholder="6 characters, 1 uppercase, 1 numeric">
  </div>

  <div class="col-xs-12 col-md-4 col-lg-4">
    Retype New Password:
  </div>
  <div class="col-xs-12 col-md-8 col-lg-8">
    <input type="password" name="retype_new_password">
  </div>

  <input type="submit" value="UPDATE" name="update_password">

</div>
</form>


<?php
}

if( $_SESSION["UserType"] == "Student" ){
  $dbName = "students";
}
else if( $_SESSION["UserType"] == "Client" ){
  $dbName = "clients";
}

if( isset($_POST["update_password"]) ){
  $new_password = $_POST["new_password"];
  $retype_new_password = $_POST["retype_new_password"];

  if( $new_password !== "" && $retype_new_password !== "" && $new_password == $retype_new_password ){
    $sql_Update_User_Password = " UPDATE $dbName SET Password='$new_password' WHERE ID='$_SESSION[ID]' ";
    $query_Update_User_Password = $connection->query($sql_Update_User_Password);
    if( $query_Update_User_Password ){
      echo "<hr /><h1> SUCCESSFULLY UPDATED PASSWORD! </h1> <br /> <p> Redirecting . . . . </p><hr />";
      $_SESSION["Password"] = $new_password;
      header( "refresh:1; url=../pages/account_settings.php" );
    }else{
      echo "<hr /><h1> FAILED TO UPDATE PASSWORD! </h1><hr />";
    }
  }
  else{
    echo "<hr /><h1> FAILED TO UPDATE PASSWORD! </h1><hr />";
  }

}

// --------------------------------------------------
?>

</div>
</div>

</div>
</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
