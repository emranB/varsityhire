<?php include ("../common/document-head.php"); ?>

<body>

<?php include("../common/navigation.php"); ?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<div class="contentTwo">

<?php

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$postalcode = $_POST["postalCode"];
$email = $_POST["email"];
$password = $_POST["password"];
/*************** Generate Unique Job ID ****************/
function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
    return $key;
}
$unique_ID_str_1 = random_string(3);
$unique_ID_str_2 = random_string(3);
$time = time();
$time_str_2 = substr($time, -3);
$unique_ID = $unique_ID_str_1 . $time_str_2 . $unique_ID_str_2;
/********************************************************/

/* Check if email already exists*/
// $sqlCheckEmail = " (SELECT * FROM students WHERE Email='$email')
//                       UNION
//                    (SELECT * FROM clients WHERE Email='$email') ";
$sqlCheckEmail = " SELECT * FROM clients WHERE Email='$email' ";
$queryCheckEmail = $connection->query($sqlCheckEmail);
$rowExists = mysqli_num_rows($queryCheckEmail);
if( $rowExists > "0" ){
	echo "<h1>Error: Email already exists in database! <br> Redirecting......</h1>";
	header('Refresh: 2;url=../pages/register.php');
	exit();
}
else if( $rowExists == "0" ){
/* Check if email already exists*/

/* Enter details to database*/
date_default_timezone_set('America/Halifax');
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO clients(
				ID, UserType, Fname, Lname, Email, Password, PostalCode, RegistrationTime
  			)
  			VALUES (
  				'$unique_ID', 'Client', '$fname', '$lname', '$email', '$password', '$postalcode', '$date'
  			)";

$query = $connection->query($sql);

if($query){

  // /******************************************************************************/
  // include("../PHPMailer/class.phpmailer.php");
  // include("../PHPMailer/class.smtp.php");
  // include("../PHPMailer/class.pop3.php");
  // require "../PHPMailer/PHPMailerAutoload.php";
  //
  // $mail = new PHPMailer();
  //
  // $mail->IsSMTP();
  // $mail->Host = "smtp.gmail.com";
  // $mail->SMTPAuth = true;
  // $mail->Username = "blooddrunk.n@gmail.com";
  // $mail->Password = "gallbetron";
  //
  // $mail->SMTPOptions = array(
  //     'ssl' => array(
  //         'verify_peer' => false,
  //         'verify_peer_name' => false,
  //         'allow_self_signed' => true
  //     )
  // );
  //
  // $mail->From = "admin@beta.varsityhire.com";
  // $mail->FromName = "VarsityHire";
  // $mail->AddAddress($email);
  //
  // $mail->WordWrap = 50;
  // $mail->IsHTML(true);
  //
  //   $location_to_account_verification = " http://beta.varsityhire.com/scripts/verify_user_account.php?   ID=$unique_ID&&UserType=Client&&action=verify ";
  //
  // $mail->Subject = "Welcome, verify your account email";
  // $mail->Body = "
  // <html>
  // <head>
  //   <title>Varistyhire Inc.</title>
  // </head>
  // <body>
  //
  //   <div style='border: 2px solid white; padding: 15px 5%; text-align: justify;'>
  //     <p>
  //       Hi " . strtoupper($fname) . ", <br /><br />
  //       Welcome to Varsityhire. <br /><br />
  //       You are now part of an awesome community where hundreds of students are
  //       ready to help you with your everyday tasks. The service is completely free to use, get started today by
  //       verifying your account and posting your first job!!
  //     </p>
  //   </div>
  //
  //   <div style='border: 2px solid white; padding: 30px 5%; text-align: center;'>
  //     <a style='text-decoration: none; color: #262626; background: #a5ffce; padding: 10px 100px; border: 2px solid #262626; border-radius: 10px;'
  //        href='$location_to_account_verification'> Click here to activate your account </a>
  //   </div>
  //
  //   <br /><br />
  //
  //   <div style='border: 2px solid #e0e0e0; padding: 15px 5%; text-align: center; background: #e0e0e0;'>
  //     <p>
  //       connecting Students looking for work, with local Residents looking to hire <br />
  //       <i> Varsityhire, Inc. </i> <br />
  //       <i> Calgary, AB </i> <br />
  //     </p>
  //   </div>
  //
  // </body>
  // </html>
  // ";
  //
  // $mail->AltBody = "";
  //
  // if(!$mail->Send()){
  //    echo "Message could not be sent. <p>";
  //    echo "Mailer Error: " . $mail->ErrorInfo;
  //    exit;
  // }else{
  //   echo "<h2> An email has been sent to your inbox for verification purposes </h2>";
  // }
  // /******************************************************************************/



	/* Display user details */
	echo "<h1>Thank you for registering, <strong>" . $fname . "</strong></h1>";
	echo "<hr />";
	echo "<p>Your Login Credentials <br />";
	echo "Name: " . $fname . " ". $lname . "<br />";
	echo "User Type: <strong>Client</strong><br />";
	echo "Postal Code: " . $postalcode . "<br />";
	echo "Emal: " . $email . "<br />";
	echo "Password: " . $password . "<br />";
	echo "</p>";

echo "<hr />" .
		"<div class='row'>" .
		"<div class='col-xs-12 col-md-12 col-lg-12'>" .
			"<hr />" .
        "<strong><b><h1> Enter your email and password into the login feature on the task bar above! </h1></b></strong>" .
      "<hr />" .
		"</div></div>";
/* Display user details */





}else{
	echo "Server Response 404: Failed to add user";
}
/* Enter details to database*/

}

$connection->close();
?>



</div>
</div>
</div>


</body>

</html>
