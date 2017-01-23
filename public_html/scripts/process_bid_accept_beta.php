<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$GET_job_ID = $_GET["job_ID"];
$GET_bid_ID = $_GET["bid_ID"];
$GET_action = $_GET["action"];
?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle"> Accept Bid </h1>

<div class="content">
<div class="content-confirm-Bid">


<?php
/*****************************/
$location_beta_2 = "scripts/showBids.php?job_ID=$GET_job_ID&&bid_ID=$GET_bid_ID ";

echo " <div class='col-xs-12 col-md-12 col-lg-12'> " .
     "<div class='jobs_posts_hidden'>" ;


      // $sql_Get_Bid_Details = " SELECT * FROM jobs_bids_details WHERE bid_ID='$GET_bid_ID' AND  job_ID='$GET_job_ID'  ";
      // $query_Get_Bid_Details = $connection->query($sql_Get_Bid_Details);
      // if($query_Get_Bid_Details){
      //   echo 'ok';
      //   while( $row = $query_Get_Bid_Details->fetch_assoc() ){
      //     $bid_ID = $row["bid_ID"];
      //     $job_ID = $row["job_ID"];
      //   }
      //   echo $bid_ID;
      // }

// echo $GET_job_ID . " " . $GET_bid_ID . " " . $GET_action;

if( $GET_action == "accept" ){
  $sql_Accept_Bid = " UPDATE jobs_bids_details SET bid_Status='accepted' WHERE bid_ID='$GET_bid_ID' ";
  $query_Accept_Bid = $connection->query($sql_Accept_Bid);
  if( $query_Accept_Bid ){

    /************************************************************************************************/
    $sql_Fetch_Mail_Info_Student = " SELECT * FROM jobs_bids_details
                                     INNER JOIN students
                                     ON jobs_bids_details.bid_Student_ID=students.ID
                                     AND jobs_bids_details.bid_ID='$GET_bid_ID' ";
    $query_Fetch_Mail_Info_Student = $connection->query($sql_Fetch_Mail_Info_Student);
    while( $row_info = $query_Fetch_Mail_Info_Student->fetch_assoc() ){
      $student_Fname = $row_info["Fname"];
      $student_Email = $row_info["Email"];
    }

    $sql_Fetch_Mail_Info_Client = " SELECT * FROM jobs_bids_details
                                     INNER JOIN jobs_posts
                                     ON jobs_bids_details.job_ID=jobs_posts.job_ID
                                     INNER JOIN clients
                                     ON jobs_posts.client_ID=clients.ID
                                     AND jobs_bids_details.bid_ID='$GET_bid_ID' ";
    $query_Fetch_Mail_Info_Client = $connection->query($sql_Fetch_Mail_Info_Client);
    while( $row_info = $query_Fetch_Mail_Info_Client->fetch_assoc() ){
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
    $mail->AddAddress($student_Email);                  // name is optional

    $mail->WordWrap = 50;                                 // set word wrap to 50 characters
    $mail->IsHTML(true);                                  // set email format to HTML

    $mail->Subject = "Your Offer Has Been Accepted!";

    $mail->Body = "
    <html>
    <head>
      <title>Varistyhire Inc.</title>
    </head>
    <body>

      <div style='border: 2px solid white; padding: 40px; text-align: justify;'>
        <p>
          Hi " . strtoupper($student_Fname) . ", <br /><br />
          We are pleased to say that your offer for the below appointment has been accepted by the customer,
          $client_Fname, congratulations! The customer contact information is now visible in the job
          details under your <i>Scheduled</i> tab. Please reach out to them at your earliest convenience to arrange
          the start date/time and discuss any further details.
        </p><br /><br />
        <p>
          <strong> Payment for Services </strong> <br />
          Payments should be completed between the customer and the student directly upon completion of the
          job. Common methods of payment include cash, electronically using your online banking, or other
          online payment methods of choice. We recommend that you discuss preferred payment options with
          the customer prior to starting work.
        </p><br />
        <p>
          <strong> Student Reviews </strong> <br />
          Following the job we will send the customer a survey to evaluate your performance. The survey will ask
          the customer to rate your work on the following criteria: timeliness, cleanliness, quality of work, and
          subject knowledge. Reviews will be shown to customers on your future offers, so make sure to leave a
          good impression!
        </p><br />
        <p>
          <strong> Cancellation Policy </strong> <br />
          A reminder that when you place an offer on a job, you are committing to the customer that you will be
          available to do the work. Cancellations after your offer has been accepted will result in a &quot;Cancellation&quot;
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
      echo "An email has been sent to your inbox";
    }
    /************************************************************************************************/

    echo "<hr /><h1> BID SUBMITTED! </h1>";
    echo "<p>Redirecting . . . .</p><hr />";
    header("Refresh: 1;url=../pages/showBids.php?job_ID=$GET_job_ID");
  }
  else{
    echo "failed accepting bid!";
  }
}

else if( $GET_action == "revoke" ){
  $sql_Revoke_Bid = " UPDATE jobs_bids_details SET bid_Status='revoked' WHERE bid_ID='$GET_bid_ID' ";
  $query_Revoke_Bid = $connection->query($sql_Revoke_Bid);
  if( $query_Revoke_Bid ){

    echo "<hr /><h1> BID REVOKED! </h1>";
    echo "<p>Redirecting . . . .</p><hr />";

    if( $UserType == "Client" ){
      header("Refresh: 1;url=../pages/showBids.php?job_ID=$GET_job_ID");
    }
    else if( $UserType == "Student" ){
      header("Refresh: 1;url=../pages/showJobsScheduled.php");

      /************************************************************************************************/
      $sql_Fetch_Mail_Info_Student = " SELECT * FROM jobs_bids_details
                                       INNER JOIN students
                                       ON jobs_bids_details.bid_Student_ID=students.ID
                                       AND jobs_bids_details.bid_ID='$GET_bid_ID' ";
      $query_Fetch_Mail_Info_Student = $connection->query($sql_Fetch_Mail_Info_Student);
      while( $row_info = $query_Fetch_Mail_Info_Student->fetch_assoc() ){
        $student_Fname = $row_info["Fname"];
      }

      $sql_Fetch_Mail_Info_Client = " SELECT * FROM jobs_bids_details
                                       INNER JOIN jobs_posts
                                       ON jobs_bids_details.job_ID=jobs_posts.job_ID
                                       INNER JOIN clients
                                       ON jobs_posts.client_ID=clients.ID
                                       AND jobs_bids_details.bid_ID='$GET_bid_ID' ";
      $query_Fetch_Mail_Info_Client = $connection->query($sql_Fetch_Mail_Info_Client);
      while( $row_info = $query_Fetch_Mail_Info_Client->fetch_assoc() ){
        $client_Fname = $row_info["Fname"];
        $client_Email = $row_info["Email"];
        $job_Status = $row_info["job_Status"];
      }

      include("../PHPMailer/class.phpmailer.php");
      include("../PHPMailer/class.smtp.php");
      include("../PHPMailer/class.pop3.php");
      require "../PHPMailer/PHPMailerAutoload.php";

      /************** Send mail to client only if bid has been revoked from a SCHEDULED job **************/
      if( $job_Status == "Scheduled" ){
        $mail_to_student = new PHPMailer();

        $mail_to_student->IsSMTP();                                      // set mailer to use SMTP
        $mail_to_student->Host = "localhost";  // specify main and backup server
        $mail_to_student->SMTPAuth = true;     // turn on SMTP authentication
        $mail_to_student->Username = "admin@beta.varsityhire.com";  // SMTP username
        $mail_to_student->Password = "Ga11betron"; // SMTP password

        $mail_to_student->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail_to_student->From = "admin@beta.varsityhire.com";
        $mail_to_student->FromName = "VarsityHire";
        $mail_to_student->AddAddress($client_Email);                     // name is optional

        $mail_to_student->WordWrap = 50;                                 // set word wrap to 50 characters
        $mail_to_student->IsHTML(true);                                  // set email format to HTML

        $mail_to_student->Subject = " Unfortunately $student_Fname had to cancel ";

        $mail_to_student->Body = "
        <html>
        <head>
          <title>Varistyhire Inc.</title>
        </head>
        <body>

          <div style='border: 2px solid white; padding: 40px; text-align: justify;'>
            <p>
            <strong> Hi $client_Fname </strong> <br />,
            Unfortunately <strong> $student_Fname </strong> has canceled their services
            for your upcoming appointment. Not to worry, reposting is quick and easy.
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

        $mail_to_student->AltBody = "";

        if(!$mail_to_student->Send()){
           echo "Message could not be sent. <p>";
           echo "Mailer Error: " . $mail_to_student->ErrorInfo;
           exit;
        }else{
          echo "An email has been sent to your inbox";
        }
      }
      /************************************************************************************************/

    }

  }
  else{
    echo "failed revoking bid!";
  }
}



              // if( $GET_bid_ID !== "" && $_GET["action"] == "accept" ){
              //   $sql_Update_Bid_Status = " UPDATE jobs_bids_details
              //                              SET bid_Status='accepted'
              //                              WHERE bid_ID='$GET_bid_ID'
              //                              AND job_ID='$GET_job_ID' ";
              //   $query_Update_Bid_Status = $connection->query($sql_Update_Bid_Status);
              //         if( $query_Update_Bid_Status ){
              //           echo "accepted";
              //         }else{
              //           echo "failed";
              //         }
              // }else if( $GET_bid_ID !== ""  && $_GET["action"] == "revoke" ){
              //   $sql_Update_Bid_Status_2 = " UPDATE jobs_bids_details
              //                                SET bid_Status='pending'
              //                                WHERE bid_ID='$GET_bid_ID' ";
              //   $query_Update_Bid_Status_2 = $connection->query($sql_Update_Bid_Status_2);
              //         if( $query_Update_Bid_Status_2 ){
              //           echo "revoked";
              //         }else{
              //           echo "failed";
              //         }
              // }

        echo "<br><br>";
    echo "</div>" .
"</div>" ;
/*****************************/


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
