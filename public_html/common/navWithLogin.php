<?php
function echoSelectedClassIfRequestMatches($requestUri)
{

  $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
  echo ' <a href="pages/how_it_works.php" id="how_it_works">How it Works</a>';

}
?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<nav class="navWithLogin">
<ul>
	<div class="row upperRow">
		<li class="menu"><a href="" id="navMenuBtn"><span class="glyphicon glyphicon-tasks"></span></a></li>
		<li class="title"><a href="index.php"><img src="pics/icon2.png" alt="" />ARSITYHIRE </a></li>
	</div>
	<div class="row lowerRow">
		<li class="leftItems"><?=echoSelectedClassIfRequestMatches("index")?></li>
		<!--<li class="leftItems"><a id="" <?=echoSelectedClassIfRequestMatches("showJobsPending")?> href="pages/showJobsPending.php">Scheduled</a></li>
		<li class="leftItems"><a id="" <?=echoSelectedClassIfRequestMatches("showJobsPopular")?> href="pages/showJobsPopular.php">Pending Offer</a></li>
		<li class="leftItems"><a id="" <?=echoSelectedClassIfRequestMatches("history")?> href="pages/history.php">Training Center</a></li>-->
		<li class="register"><a id="signUp" href="pages/register.php">Sign Up</a></li>
		<li class="login">
			<span id="login">LOGIN</span>
			<form action="scripts/loginProcess.php" method="post">
				<div>
          <input type="text" name="email" placeholder="email" />
				  <input type="password" name="password" placeholder="password" /><br>
        </div>
				<input type="submit" class="submitBtn" value="LOGIN"/>
			</form>
		</li>
	</div>
</ul>
</nav>
</div>
</div>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
	<div class="cPanel cPanelLoggedOut">
		<a href="" id="closeCpanelLoggedOut"><div> <span>CLOSE</span> <span class="el el-remove-sign cls-icon"></span> </div></a>
		<div class="siteMap siteMapLoggedOut">

			<hr /><br><a href="pages/profile.php">Profile</a><br>

			<a href="pages/contact.php">Contact</a><br><br><hr /><br>
			<a href="pages/terms_of_use.php">Terms Of Use</a><br><br><hr /><br>

		</div>
	</div>
</div>
</div>
