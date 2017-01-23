<?php
include("../common/document-head.php");
include("../common/sessionVariables.php");
?>

<body>
<a href='index.php' class='btn btn-warning'>Back to Home</a>
<?php

if( $Name == "" ){

echo "<div class='row'> " .
		"<div class='col-xs-12 col-md-12 col-lg-12'> " .
			"<div class='contentTwo'>" .
				"<h1><strong>Student</strong> Login Center</h1>" .
				"<p>Login Below</p><hr />" .
				"<form class='logform' action='scripts/loginProcess.php' method='post'>" .
					"<input type='text' name='email' placeholder='email / username' /><br>" .
					"<input type='password' name='password' placeholder='password' /><br><br><br>" .
					"<input type='submit' name='submit' value='Login' />" .
				"</form>" .
			"</div>" .
		"</div>" .
		"</div>";

}
else if( $Name !== "" ){

include("navigation.php");
echo "<div class='row'> " .
		"<div class='col-xs-12 col-md-12 col-lg-12'> " .
			"<div class='contentTwo'>" .
				"<h1>Members Area | <strong>Students</strong></h1>" .
				"<h3>Your are already logged in as <strong>" . $Name . "<br>" . $Email . "</strong></h3>" .
			"</div>" .
		"</div>" .
		"</div>";

}

?>

</body>

</html>
