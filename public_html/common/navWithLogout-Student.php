<?php
function echoSelectedClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="selected"';
}

function show_user_img()
{

    $chk_uri = basename($_SERVER['REQUEST_URI'], ".php");
    if( $chk_uri == "index" ){
      include("../password/dbConnect.inc");
    }
    else{
      include("../../password/dbConnect.inc");
    }

    $qry = " SELECT * FROM user_photos WHERE ID='$_SESSION[ID]'";
    $result  = $connection->query($qry);
    $num_rows_img = mysqli_num_rows($result);
    if($result && $num_rows_img > "0" ){
      while( $row = $result->fetch_assoc() )
      {
          echo '<img class="nav_img" src="data:image;base64,'.$row["Photo_Name"].' "> ';
      }
    }
    $connection->close();
}
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<nav class="navWithLogout">
<ul>
	<div class="row upperRow">
		<li class="menu"><a href="" id="navMenuBtn"><span class="glyphicon glyphicon-tasks"></span></a></li>
		<li class="title"><a href="index.php"><img src="pics/icon2.png" alt="" />ARSITYHIRE </a></li>
	</div>
	<div class="row lowerRow">
		<li class="leftItems"><a id="" <?=echoSelectedClassIfRequestMatches("showJobs")?> href="pages/showJobs.php">Job Listings</a></li>
		<li class="leftItems"><a id="" <?=echoSelectedClassIfRequestMatches("showJobsScheduled")?> href="pages/showJobsScheduled.php">Scheduled</a></li>
		<li class="leftItems"><a id="" <?=echoSelectedClassIfRequestMatches("showJobsPending")?> href="pages/showJobsPending.php">Pending Offers</a></li>
		<li class="leftItems"><a id="" <?=echoSelectedClassIfRequestMatches("training_center")?> href="pages/training_center.php">Training Center</a></li>
		<li class="register"><a id="signUp" href="pages/profile.php">PROFILE</a></li>
		<li class="logout">
			<div><span> <?php show_user_img() ?> </span><span id="logout">LOGOUT</span></div>
			<form action="scripts/logoutProcess.php" method="post">
				<div>Logged in as: <?php echo "<strong>" . $UserType . "</strong>"; ?><br><strong><?php echo strToUpper("$Name") ?></strong></div>
        <input type="submit" class="submitBtn submitBtn_alt" name="logout" value="LOGOUT" />
			</form>
		</li>
	</div>
</ul>
</nav>
</div>


<div class="col-xs-12 col-md-12 col-lg-12">
	<div class="cPanel cPanelLoggedIn">
		<a href="" id="closeCpanelLoggedIn"><div> <span>CLOSE</span> <span class="el el-remove-sign cls-icon"></span> </div></a>
		<div class="siteMap siteMapLoggedIn">

      <a href="index.php">Home</a><br><br><hr /><br />

      <?php
      if( $_SESSION["UserType"] == "Student" ){
        // echo "<a href='pages/registerStripe.php'>Payment Settings</a><br><br><hr /><br />";
        echo "<a href='pages/account_settings.php'>Account Settings</a><br><br><hr /><br />";
      }
      ?>

			<a href="pages/how_it_works.php">How It Woks</a><br>
			<a href="pages/about.php">About Us</a><br><br><hr /><br>

			<a href="pages/profile.php">Profile</a><br>

			<a href="pages/contact.php">Contact</a><br><br><hr /><br>
			<a href="pages/terms_of_use.php">Terms Of Use</a><br><br><hr /><br>

		</div>
	</div>
</div>
