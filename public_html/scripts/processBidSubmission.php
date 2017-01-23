<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$job_ID = $_GET["job_ID"];
$job_Category = $_GET["job_category"];
$job_Title = $_GET["job_Title"];
?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle"> <?php echo strtoupper($job_Title); ?> <hr class="outlineHr" /></h1>

<div class="content">
<div class="content-processBidSubmission">

<?php
/************ Get form Values ****************/
$bid_Amount = $_POST["bid_amount"];
$bid_Comments = $_POST["bid_comments"];

/************ Check if user has already bid on a post **************/
$sql_Check_If_User_Has_Already_Bid_On_Post = " SELECT * FROM jobs_bids_details WHERE job_ID='$job_ID' ";
$query_Check_If_User_Has_Already_Bid_On_Post = $connection->query($sql_Check_If_User_Has_Already_Bid_On_Post);
$num_rows_query_Check_If_User_Has_Already_Bid_On_Post = mysqli_num_rows($query_Check_If_User_Has_Already_Bid_On_Post);
if( $query_Check_If_User_Has_Already_Bid_On_Post && $num_rows_query_Check_If_User_Has_Already_Bid_On_Post !== 0 ){
	// echo $num_rows_query_Check_If_User_Has_Already_Bid_On_Post;
	while( $row = $query_Check_If_User_Has_Already_Bid_On_Post->fetch_assoc() ){
		$bids_details_table_Student_ID = $row["bid_Student_ID"];

		if( $bids_details_table_Student_ID == $_SESSION["ID"] ){
			echo "Error: You may only reply once to each job post <br>";
		}
		else{
			/************ Enter bids details info **************/

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


			$sql_Enter_Bids_Details_Info = " INSERT INTO jobs_bids_details (
												bid_ID, job_ID, bid_Student_ID, bid_Amount, bid_Comments, bid_Status
											 )
											 VALUES (
												'$unique_ID', '$job_ID', '$_SESSION[ID]', '$bid_Amount', '$bid_Comments', 'pending'
											 )";
			$query_Enter_Bids_Details_Info = $connection->query($sql_Enter_Bids_Details_Info);

			/************ Get details of bids **************/
			$sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$job_ID' ";
			$query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
			$bids_Count = mysqli_num_rows($query_Fetch_Bids_Details);
			if( $bids_Count == "0" ){
				$job_Status = "Unreplied";
			}
			else if( $bids_Count !== "0" ){
				$job_Status = "Pending";
			}

			/************ Enter bids primary info **************/
			if( $query_Enter_Bids_Details_Info ){

				/******************************************************************************/
				$sql_Fetch_Mail_Info = " SELECT * FROM jobs_posts
				 											 	 INNER JOIN clients
																 ON jobs_posts.client_ID=clients.ID
																 AND jobs_posts.job_ID='$job_ID' ";
				$query_Fetch_Mail_Info = $connection->query($sql_Fetch_Mail_Info);
				while( $row_info = $query_Fetch_Mail_Info->fetch_assoc() ){
					$client_Email = $row_info["Email"];
					$client_Fname = $row_info["Fname"];
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

				$mail->Subject = "New student offer awaiting";

				$mail->Body = "
				<html>
				<head>
					<title>Varistyhire Inc.</title>
				</head>
				<body>

					<div style='border: 2px solid white; padding: 40px; text-align: justify;'>
						<p>
						Hi " . strtoupper($client_Fname) . ", <br /><br />
						Great news, you have a new offer awaiting on your recently listed job posting! <br />
						Review the offer and student’s information to determine if you would like
						to accept or reject. Undecided on the offer? Wait
						to see if any other students make offers before you make your decision. Don’t wait too long though, the
						offer may have an expiry on it, or could be cancelled by the student at any time as they may find
						another job during that timeframe!
						</p>
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

				$sql_Enter_Bids_Primary_Info = " UPDATE jobs_bids SET job_Status='$job_Status', job_Bids_Count='$bids_Count' WHERE job_ID='$job_ID' ";
				$query_Enter_Bids_Primary_Info = $connection->query($sql_Enter_Bids_Primary_Info);
				if( $query_Enter_Bids_Primary_Info ){
					echo "<h1><hr />Thank you for your bid. <br /> You will be notified immediately when the client accepts or declines your offer <hr /></h1>";
				}
				else{
					// echo "Route 1: Error: Failed to Add To Primary (details) table <br>";
				}
			}
			else{
				// echo "Route 1: Error: Failed to Add To Secondary table <br>";
			}

		}
	}
}

/*******************************************************************************************/

else if( $query_Check_If_User_Has_Already_Bid_On_Post && $num_rows_query_Check_If_User_Has_Already_Bid_On_Post == 0 ){

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


			$sql_Enter_Bids_Details_Info = " INSERT INTO jobs_bids_details (
												bid_ID, job_ID, bid_Student_ID, bid_Amount, bid_Comments, bid_Status
											 )
											 VALUES (
												'$unique_ID', '$job_ID', '$_SESSION[ID]', '$bid_Amount', '$bid_Comments', 'pending'
											 )";
			$query_Enter_Bids_Details_Info = $connection->query($sql_Enter_Bids_Details_Info);

			/************ Get details of bids **************/
			$sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$job_ID' ";
			$query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
			$bids_Count = mysqli_num_rows($query_Fetch_Bids_Details);
			if( $bids_Count == "0" ){
				$job_Status = "Unreplied";
			}
			else if( $bids_Count !== "0" ){
				$job_Status = "Pending";
			}

			/************ Enter bids primary info **************/
			if( $query_Enter_Bids_Details_Info ){

				/******************************************************************************/
				$sql_Fetch_Mail_Info = " SELECT * FROM jobs_posts
																 INNER JOIN clients
																 ON jobs_posts.client_ID=clients.ID
																 AND jobs_posts.job_ID='$job_ID' ";
				$query_Fetch_Mail_Info = $connection->query($sql_Fetch_Mail_Info);
				while( $row_info = $query_Fetch_Mail_Info->fetch_assoc() ){
					$client_Email = $row_info["Email"];
					$client_Fname = $row_info["Fname"];
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

				$mail->Subject = "New student offer awaiting";
				$mail->Body = "
				<html>
				<head>
					<title>Varistyhire Inc.</title>
				</head>
				<body>

					<div style='border: 2px solid white; padding: 5%; text-align: justify;'>
						<p>
						Hi " . strtoupper($client_Fname) . ", <br /><br />
						Great news, you have a new offer awaiting on your recently listed job posting! <br />
						Review the offer and student's information to determine if you would like
						to accept or reject. Undecided on the offer? Wait
						to see if any other students make offers before you make your decision. Don't wait too long though, the
						offer may have an expiry on it, or could be cancelled by the student at any time as they may find
						another job during that timeframe!
						</p>
					</div>

					<br /><br />

					<div style='border: 2px solid #e0e0e0; padding: 5% 20%; text-align: center; background: #e0e0e0;'>
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

				// echo "Successfully Added To Secondary (details) table <br>";
				$sql_Enter_Bids_Primary_Info = " UPDATE jobs_bids SET job_Status='$job_Status', job_Bids_Count='$bids_Count' WHERE job_ID='$job_ID' ";
				$query_Enter_Bids_Primary_Info = $connection->query($sql_Enter_Bids_Primary_Info);
				if( $query_Enter_Bids_Primary_Info ){
					//echo "Route 2: Successfully Added To Primary  table <br>";
					echo "<hr /><h1>Thank you for your bid. <br /> You will be notified immediately when the client accepts or declines your offer. </h1><hr />";
				}
				else{
					// echo "Route 2: Error: Failed to Add To Primary (details) table <br>";
				}
			}
			else{
				// echo "Route 2: Error: Failed to Add To Secondary table <br>";
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
