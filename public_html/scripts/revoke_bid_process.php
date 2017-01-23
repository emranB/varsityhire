<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>


<body>

<?php
include("../common/navigation.php");
$_GET_job_ID = $_GET["job_ID"];
$_GET_student_ID = $_GET["student_ID"];
?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle"> Delete Bid </h1>

<div class="content">
<div class="content-delete_bid">

<?php

if($_SESSION["ID"] == $_GET_student_ID ){

	$sql_Revoke_Bid = " UPDATE jobs_bids_details
											SET bid_Status='revoked'
                      WHERE job_ID='$_GET_job_ID'
                      AND bid_Student_ID='$_GET_student_ID' ";
	$query_Revoke_Bid = $connection->query($sql_Revoke_Bid);
  if( $query_Revoke_Bid ){

		/******************************************************************************/
		$sql_Fetch_Mail_Info_Student = " SELECT * FROM students WHERE ID='$_GET_student_ID' ";
		$query_Fetch_Mail_Info_Student = $connection->query($sql_Fetch_Mail_Info_Student);
		while( $row_info = $query_Fetch_Mail_Info_Student->fetch_assoc() ){
			$student_Fname = $row_info["Fname"];
		}

		$sql_Fetch_Mail_Info_Client = " SELECT * FROM jobs_posts
																		INNER JOIN clients
																		ON jobs_posts.client_ID=clients.ID
																		AND jobs_posts.job_ID='$_GET_job_ID' ";
		$query_Fetch_Mail_Info_Client = $connection->query($sql_Fetch_Mail_Info_Client);
		while( $row_info = $query_Fetch_Mail_Info_Client->fetch_assoc() ){
			$client_Fname = $row_info["Fname"];
			$client_Email = $row_info["Email"];
		}

		include("../PHPMailer/class.phpmailer.php");
		include("../PHPMailer/class.smtp.php");
		include("../PHPMailer/class.pop3.php");
		require "../PHPMailer/PHPMailerAutoload.php";

		$mail = new PHPMailer();

		$mail->IsSMTP();                                      // set mailer to use SMTP
		$mail->Host = "localhost";  // specify main and backup server
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = "admin@beta.varsityhire.com";  // SMTP username
		$mail->Password = "Ga11betron"; // SMTP password

		$mail->SMTPOptions = array(
				'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
				)
		);

		$mail->From = "admin@beta.varsityhire.com";
		$mail->FromName = "VarsityHire";
		$mail->AddAddress($client_Email);                  // name is optional

		$mail->WordWrap = 50;                                 // set word wrap to 50 characters
		$mail->IsHTML(true);                                  // set email format to HTML

		$mail->Subject = "Unfortunately $student_Fname had to cancel";

		$mail->Body = "
		<html>
		<head>
			<title>Varistyhire Inc.</title>
		</head>
		<body>

			<div style='border: 2px solid white; padding: 40px; text-align: justify;'>
				<p>
					Hi " . strtoupper($client_Fname) . ", <br /><br />
					Unfortunately $student_Fname has canceled their services for your upcoming appointment. <br />
					Not to worry, reposting is quick and easy. <br />
					Review the offer and student’s information to determine if you would like
					to accept or reject. Undecided on the offer? Wait
					to see if any other students make offers before you make your decision. Do not wait too long though, the
					offer may have an expiry on it, or could be cancelled by the student at any time as they may find
					another job during that timeframe!
				</p>
				<strong style='padding: 80px; text-align: center;'>
					Simply select the <i>Repost Job</i> in the <i>Scheduled</i> tab <br />
					to request another student.
				</strong>
			</div>

			<br /><br />

			<div style='border: 2px solid #e0e0e0; padding: 20px; text-align: center; background: #e0e0e0;'>
				<p>
					connecting Students looking for work, with local Residents looking to hire <br />
					<i> Varsityhire, Inc. </i> <br />
					<i> Calgary, AB </i> <br />
				</p>
			</div>

		</body>
		</html>
		";

		$mail->AltBody = "";

		if(!$mail->Send()){
			 echo "Message could not be sent. <p>";
			 echo "Mailer Error: " . $mail->ErrorInfo;
			 exit;
		}else{
			echo "Message has been sent";
		}
		/******************************************************************************/

    echo "<pre>Your bid has been deleted: <br /> Student ID: $_GET_student_ID</pre>";

    /**************** GET BID COUNT *******************/
    $sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$_GET_job_ID' AND bid_Status<>'revoked' ";
    $query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
    $bids_Count = mysqli_num_rows($query_Fetch_Bids_Details);
    /**************************************************/

    if( $bids_Count == 0 ){
      $status = "Unreplied";
		}
    else if( $bids_Count !== 0 ){
      $status = "Pending";
		}

	  $sql_Update_Bidding_Event = " UPDATE jobs_bids SET job_Status='$status', job_Bids_Count='$bids_Count' WHERE job_ID='$_GET_job_ID' ";
	  $query_Update_Bidding_Event = $connection->query($sql_Update_Bidding_Event);





  }

}




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
