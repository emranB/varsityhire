<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$GET_job_ID = $_GET["job_ID"];
$GET_job_Category = $_GET["job_category"];
$GET_job_Title = $_GET["job_Title"];
?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle">Re-open Bidding</h1>

<div class="content">
<div class="content-editJobPostProcess">


<?php

/**************** GET NUMBER OF REPLIES *******************/
$sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$GET_job_ID' AND bid_Status<>'revoked' ";
$query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
$bids_Count = mysqli_num_rows($query_Fetch_Bids_Details);
/**************** GET NUMBER OF REPLIES *******************/

if( $bids_Count == "0" ){
  $sql_reopen_bidding_session_jobs_bids = " UPDATE jobs_bids SET job_Status='Unreplied' WHERE job_ID='$GET_job_ID' ";
}
else if( $bids_Count !== "0" ){
  $sql_reopen_bidding_session_jobs_bids = " UPDATE jobs_bids SET job_Status='Pending' WHERE job_ID='$GET_job_ID' ";
}

$sql_reopen_bidding_session_jobs_posts = " UPDATE jobs_posts SET job_Status='Open' WHERE job_ID='$GET_job_ID' ";

$query_reopen_bidding_session_jobs_posts = $connection->query($sql_reopen_bidding_session_jobs_posts);
$query_reopen_bidding_session_jobs_bids = $connection->query($sql_reopen_bidding_session_jobs_bids);



if( $query_reopen_bidding_session_jobs_posts && $query_reopen_bidding_session_jobs_bids ){

  /******************************************************************************/
  $sql_Fetch_Mail_Info_Student = " SELECT * FROM jobs_bids_details
                                   INNER JOIN students
                                   ON jobs_bids_details.bid_Student_ID=students.ID
                                   AND jobs_bids_details.job_ID='$GET_job_ID' ";
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
                                   AND jobs_bids_details.job_ID='$GET_job_ID' ";
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

  $mail->Subject = "$client_Fname had to re-open the bidding session";

  $mail->Body = "
  <html>
  <head>
    <title>Varistyhire Inc.</title>
  </head>
  <body>

    <div style='border: 2px solid white; padding: 40px; text-align: justify;'>
      <p>
        Hi " . strtoupper($student_Fname) . ", <br /><br />
        $client_Fname has re-opened your upcoming appointment. Not to worry, there
        will be lots more jobs that you can place offers on. We look forward to connecting you with other
        customers in the near future.
      </p><br /><br />
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
  /******************************************************************************/

  echo "<pre><h2>Job has been re-posted <br /> Redirecting . . . . </h2></pre>";
  $location = "../pages/showJobsForOneClient.php";
  header("Refresh: 1;url=$location");
}else{
  echo "Failed!";
}





$connection->close();
?>

</body>

</html>
