<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$GET_job_ID = $_GET["job_ID"];
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle">Bidding Session has been closed! <hr class="outlineHr" /></h1>

<div class="content">
<div class="content-confirm-Bid">


<?php

$sql_Check_User_Authenticity = " SELECT * FROM jobs_posts WHERE job_ID='$GET_job_ID' ";
$query_Check_User_Authenticity = $connection->query($sql_Check_User_Authenticity);
while( $row = $query_Check_User_Authenticity->fetch_assoc() ){
  $client_Email = $row["client_Email"];

  if( $_SESSION["Email"] == $client_Email ){
    $sql_Update_Jobs_Posts_Table = " UPDATE jobs_posts, jobs_bids
                                     SET jobs_posts.job_Status='Scheduled', jobs_bids.job_Status='Scheduled'
                                     WHERE jobs_posts.job_ID='$GET_job_ID' AND jobs_bids.job_ID='$GET_job_ID' ";
    $query_Update_Jobs_Posts_Table = $connection->query($sql_Update_Jobs_Posts_Table);
    if( $query_Update_Jobs_Posts_Table ){
      echo "<hr /><h1>Thank you for choosing VarsityHire <br /> The posts has been moved to scheduled tab . . . . </h1><hr />";

      /******************************************************************************/
  		$sql_Fetch_Mail_Info_Student = " SELECT * FROM students
                                       INNER JOIN jobs_bids_details
                                       ON students.ID=jobs_bids_details.bid_Student_ID
                                       AND jobs_bids_details.job_ID='$GET_job_ID'
                                       AND jobs_bids_details.bid_Status='accepted' ";
  		$query_Fetch_Mail_Info_Student = $connection->query($sql_Fetch_Mail_Info_Student);
  		while( $row_info = $query_Fetch_Mail_Info_Student->fetch_assoc() ){
  			$student_Fname = $row_info["Fname"];
        $student_Email = $row_info["Email"];
  		}

      $sql_Fetch_Mail_Info_Client = " SELECT * FROM jobs_posts
                                      INNER JOIN clients
                                      ON jobs_posts.client_ID=clients.ID
                                      INNER JOIN other
                                      ON jobs_posts.job_ID=other.Job_ID
                                      AND jobs_posts.job_ID='$GET_job_ID' ";
      $query_Fetch_Mail_Info_Client = $connection->query($sql_Fetch_Mail_Info_Client);
      while( $row_info = $query_Fetch_Mail_Info_Client->fetch_assoc() ){
        $client_Fname = $row_info["Fname"];
        $job_Category_Temporary= $row_info["Job_category_temporary"];
        $job_Time = $row_info["Time"];
        $job_Address = $row_info["Address"];
        $job_PostalCode = $row_info["PostalCode"];
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
  		$mail->AddAddress($student_Email);                  // name is optional

  		$mail->WordWrap = 50;                                 // set word wrap to 50 characters
  		$mail->IsHTML(true);                                  // set email format to HTML

  		$mail->Subject = " A reminder of your upcoming appointment with $client_Fname ";

  		$mail->Body = "
  		<html>
  		<head>
  			<title>Varistyhire Inc.</title>
  		</head>
  		<body>

  			<div style='border: 2px solid white; padding: 40px; text-align: justify;'>
  				<p>
          <strong> Hi $student_Fname</strong>, <br />

          Just a friendly reminder of your upcoming appointment. <br /><br />

          <u> Job Summary: </u> <br /><br />

          <div>
            <div style='display: inline-block; width: 30%; text-align: center; background: #a5ffce;'> Job Category: </div>
            <div style='display: inline-block; width: 60%; text-align: left; background: #e0e0e0;'> $job_Category_Temporary </div>
          </div>

          <div>
            <div style='display: inline-block; width: 30%; text-align: center; background: #a5ffce;'> Time of Appointment: </div>
            <div style='display: inline-block; width: 60%; text-align: left; background: #e0e0e0;'> $job_Time </div>
          </div>

          <div>
            <div style='display: inline-block; width: 30%; text-align: center; background: #a5ffce;'> Full Address: </div>
            <div style='display: inline-block; width: 60%; text-align: left; background: #e0e0e0;'> $job_Address </div>
          </div>

          <div>
            <div style='display: inline-block; width: 30%; text-align: center; background: #a5ffce;'> Postal Code: </div>
            <div style='display: inline-block; width: 60%; text-align: left; background: #e0e0e0;'> $job_PostalCode </div>
          </div><br /><br />

          Remember to bring any equipment or materials
          that you specified you would supply. We also recommend that you discuss payment methods with the
          customer prior to service start time. <br /><br />

          <strong> Payment for Services</strong> <br />
          Payments should be completed between the customer and the student directly upon completion of the
          job. Common methods of payment include cash, electronically using your online banking, or other
          online payment methods of choice. We recommend that you discuss preferred payment options with
          the customer prior to starting work. <br /><br />

          <strong> Student Reviews</strong> <br />
          Following the job we will send the customer a survey to evaluate your performance. The survey will ask
          the customer to rate your work on the following criteria: timeliness, cleanliness, quality of work, and
          subject knowledge. Reviews will be shown to customers on your future offers, so make sure to leave a
          good impression! <br /><br />

          <strong> Cancellation Policy</strong> <br />
          A reminder that when you place an offer on a job, you are committing to the customer that you will be
          available to do the work. Cancellations after your offer has been accepted will result in a Cancellation;
          point being applied to your reviews, which will appear on your future offers to customers. We
          understand that issues may arise that are out of your control, and encourage you to notify us as soon as
          possible if this is the case. The cancellation policy can be viewed in detail within the Terms of Service
          located on our website.
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
  			echo "Student Has been emailed about the appointment";
  		}
  		/******************************************************************************/



    }
  }
  else{
    echo "Sorry user not authenticated";
  }

}

?>


</div>
</div>

</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
