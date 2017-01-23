<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php include("../common/navigation.php"); ?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<div class="content">
<div class="content-accepted-bids-history">

<?php
// --------------------------------------------------

if( $UserType == "Student"){
  echo "<hr /><h1> Student Account Settings </h1><hr />";
  $sql_Fetch_Info = " SELECT * FROM students
                      INNER JOIN students_additional_info
                      WHERE students.ID=students_additional_info.ID
                      AND students.ID='$ID' ";
}
else if( $UserType == "Client"){
  echo "<hr /><h1> Customer Account Settings </h1><hr />";
  $sql_Fetch_Info = " SELECT * FROM clients
                      INNER JOIN clients_additional_info
                      WHERE clients.ID=clients_additional_info.ID
                      AND clients.ID='$ID' ";
}
$query_Fetch_Info = $connection->query($sql_Fetch_Info);
if( $query_Fetch_Info ){
  while( $row = $query_Fetch_Info->fetch_assoc() ){
    $Email = $row["Email"];
    $Password = $row["Password"];
  }

  $location_update_password = "scripts/update_password.php";

  echo "<div class='private_info_container'>";

  echo "<p style='font-size:1.3em;'> The below information is private to your account: </p><br />";

  echo "<strong>" .
          "<div class='col-xs-12 col-md-4 col-lg-4'> Email: </div>" .
       "</strong>" .
       "<div class='col-xs-12 col-md-8 col-lg-8'> $Email </div>" .
       "<strong>" .
          "<div class='col-xs-12 col-md-4 col-lg-4'> Password: </div>" .
       "</strong>" .
       "<div class='col-xs-12 col-md-8 col-lg-8'> $Password &nbsp  </div>" ;

  echo "<br /><br />";

  echo "<hr /><a href='$location_update_password'>
          <strong style='letter-spacing: 3px; font-size: 1.3em; color: #FF5E5F;'>
            <span class='el el-edit'> &nbsp </span>
            UPDATE PASSWORD
          </strong>
        </a><hr />";

  // echo "<hr />";
  // echo "<form action='' method='post' class='form-inline'>";
  // echo "<div class='col-xs-12 col-md-12 col-lg-12 form-group'>
  //         <label for='update_Password'> Update Password: </label>
  //         <input type='text' name='update_Password' id='update_Password' class='form-control'>
  //         <button type='submit' class='btn btn-success'> Update </button>
  //       </div>";
  // echo "</form>";
  // echo "<hr />";


  echo "<p> Want to change your account email or password?
            Simply send us an email at <span style='color:red; '>info@varsityhire.com</span>
            and we will assist you! </p>";

  echo "</div>";

}

// --------------------------------------------------
?>

</div>
</div>

</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
