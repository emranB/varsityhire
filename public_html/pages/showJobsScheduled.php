<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$GET_job_ID = $_GET["job_ID"];
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle"> Scheduled Jobs </h1>

<?php

if( $_SESSION["UserType"] == "Student" ){
  $sql_Fetch_IDs_Of_Unreplied_Jobs = " SELECT * FROM jobs_posts
                                         INNER JOIN jobs_bids
                                         ON jobs_posts.job_ID=jobs_bids.job_ID
                                         INNER JOIN jobs_bids_details
                                         ON jobs_bids.job_ID=jobs_bids_details.job_ID
                                         INNER JOIN clients
                                         ON jobs_posts.client_ID=clients.ID
                                         AND jobs_posts.job_Status='Scheduled'
                                         AND jobs_bids_details.bid_Status<>'revoked'
                                         AND jobs_bids_details.bid_Student_ID='$_SESSION[ID]' ";
$query_IDs_Of_Unreplied_Jobs = $connection->query($sql_Fetch_IDs_Of_Unreplied_Jobs);
$num_rows = mysqli_num_rows($query_IDs_Of_Unreplied_Jobs);

if( $num_rows == "0" ){
  echo "<hr /><h2>You currently have no scheduled jobs. <br />Go post your job to start receiveing bids on your task!</h2><hr />";
}
else if( $num_rows !== "0" ){
  while( $row = $query_IDs_Of_Unreplied_Jobs->fetch_assoc() ){
    $job_Category = $row["job_Category"];
    $job_ID = $row["job_ID"];
    $job_Title = htmlspecialchars($row["job_Title"]);
    $client_ID = $row["client_ID"];
    $client_Fname = $row["Fname"];
    $client_Email = $row["Email"];
    $bid_Student_ID = $row["bid_Student_ID"];

    $sql_Fetch_Client_Additional_Info = " SELECT * FROM clients_additional_info WHERE ID='$client_ID' ";
    $query_Fetch_Client_Additional_Info = $connection->query($sql_Fetch_Client_Additional_Info);
    while( $row_phone = $query_Fetch_Client_Additional_Info->fetch_assoc() ){
      if( $row_phone["Phone"] == "" ){
        $client_Phone = "(not provided)";
      }else if( $row_phone["Phone"] !== "" ){
        $client_Phone = $row_phone["Phone"];
      }
    }

    $student_ID = $row["bid_Student_ID"];
    $bid_ID = $row["bid_ID"];

    $location = "pages/showJobDetailed.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
    $location2 = "pages/showJobs.php?job_category=$job_Category";

    /******************************** GET NUMBER OF REPLIES ***********************************/
    $sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$job_ID' ";
    $query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
    $bids_Count = mysqli_num_rows($query_Fetch_Bids_Details);
    /******************************************************************************************/

    $row_category = $row["job_Category"];

    $sql_Fetch_Job_Category_Temporary = " SELECT Job_category_temporary FROM other WHERE Job_ID='$job_ID' ";
    $query_Fetch_Job_Category_Temporary = $connection->query($sql_Fetch_Job_Category_Temporary);
    while( $row2 = $query_Fetch_Job_Category_Temporary->fetch_assoc() ){
      $Job_category_temporary = $row2["Job_category_temporary"];
    }
    if( $Job_category_temporary == "dog_walking" ){
      $val_row_category = "Dog Walking";
    }
    else if( $Job_category_temporary == "exterior_window_washing" ){
      $val_row_category = "Exterior Window Washing";
    }
    else if( $Job_category_temporary == "delivery" ){
      $val_row_category = "Flyer and Mail Delivery";
    }
    else if( $Job_category_temporary == "garage_shop_shed_cleaning" ){
      $val_row_category = "Garage, Shop and Shed Cleaning";
    }
    else if( $Job_category_temporary == "gutter_cleaning" ){
      $val_row_category = "Gutter Cleaning";
    }
    else if( $Job_category_temporary == "house_cleaning" ){
      $val_row_category = "House Cleaning";
    }
    else if( $Job_category_temporary == "international_languages" ){
      $val_row_category = "International Languages";
    }
    else if( $Job_category_temporary == "landscaping" ){
      $val_row_category = "Landscaping";
    }
    else if( $Job_category_temporary == "moving" ){
      $val_row_category = "Moving and Delivery Assistance";
    }
    else if( $Job_category_temporary == "music_lessons" ){
      $val_row_category = "Music Lessons";
    }
    else if( $Job_category_temporary == "outdoor_seasonal_decorations" ){
      $val_row_category = "Outdoor Seasonal Decorations";
    }
    else if( $Job_category_temporary == "painting" ){
      $val_row_category = "Painting and Staining";
    }
    else if( $Job_category_temporary == "pressure_washing" ){
      $val_row_category = "Pressure Washing";
    }
    else if( $Job_category_temporary == "private_event_assistance" ){
      $val_row_category = "Private Event Assistance";
    }
    else if( $Job_category_temporary == "rv_boat_cleaning" ){
      $val_row_category = "RV and Boat Cleaning";
    }
    else if( $Job_category_temporary == "snow_removal" ){
      $val_row_category = "Snow and Ice Removal";
    }
    else if( $Job_category_temporary == "tutoring" ){
      $val_row_category = "Tutoring";
    }
    else if( $Job_category_temporary == "vehicle_care" ){
      $val_row_category = "Vehicle Care";
    }
    else if( $Job_category_temporary == "yard_care" ){
      $val_row_category = "Yard Care and Gardening";
    }
    else if( $Job_category_temporary == "other" ){
      $val_row_category = "Other";
    }

    $sql_Get_Date_Of_Venue = " SELECT * FROM other WHERE Job_ID='$job_ID' ";
    $query_Get_Date_Of_Venue = $connection->query($sql_Get_Date_Of_Venue);
    if( $query_Get_Date_Of_Venue ){
      while( $row_date = $query_Get_Date_Of_Venue->fetch_assoc() ){
        $date_str = $row_date["Date"];
        $time = $row_date["Time"];
        $PostalCode = strtoupper($row_date["PostalCode"]);

        $full_date = date("F j, Y", strtotime($date_str) );
      }
    }
    include("../scripts/sql_get_photo.php");


    /********************* Move jobs to HISTORY TAB **********************/
    date_default_timezone_set('Canada/Atlantic');

    $todays_date = date("Y-m-d");
    $date_arr = explode(", ", $date_str);
    $date = $date_arr[0];
    $date_of_venue_in_date = $date;

    $date_of_venue_in_minutes = strtotime($date_of_venue_in_date);
    $exp_date_in_minutes = $date_of_venue_in_minutes + ( 2 * 60 * 1000 );
    $exp_date_in_date = date("Y-m-d", $exp_date_in_minutes);

    $exp_date_in_days = floor( $exp_date_in_minutes - strtotime( $todays_date ) ) / ( 60 * 60 * 24 );
    $exp_date_in_days_whole_number = floor($exp_date_in_days);

    if( $todays_date >= $exp_date_in_date ){
      $sql_Update_Job_Status_To_Expired = " UPDATE jobs_posts, jobs_bids
                                              SET jobs_posts.job_Status='Expired', jobs_bids.job_Status='Expired'
                                              WHERE jobs_posts.job_ID='$job_ID' AND jobs_bids.job_ID='$job_ID' ";
      $query_Update_Job_Status_To_Expired = $connection->query($sql_Update_Job_Status_To_Expired);
      if($query_Update_Job_Status_To_Expired){
        echo "<div class='row'>" .
             "<div class='col-xs-12 col-md-12 col-lg-12'>" .
             "<div class='jobs_posts'>" .
                "<pre> This job post has expired and will be removed from this section. </pre>";
      }
    }else{
      echo "<div class='row'>" .
           "<div class='col-xs-12 col-md-12 col-lg-12'>" .
           "<div class='jobs_posts'>" ;

    }
    /*********************************************************************/

      $location_to_profile = "pages/profile.php?ID=$client_ID";
      $location_cancel_job_bid = " pages/confirm-bid.php?job_ID=$job_ID&&bid_ID=$bid_ID&&action=revoke ";

      echo "<div class='col-xs-12 col-md-3 col-lg-3 left_column'>" .
             $client_photo .
           "</div>" .

           "<div class='col-xs-12 col-md-6 col-lg-6 center_column'>" .
/************************************************************************************************************************************************/
              " <section class='col-xs-12 col-md-4 col-lg-4'>
                 <p class='details'> <strong>$full_date</strong> </p>
               </section> " .
              " <section class='col-xs-12 col-md-4 col-lg-4'>
                 <p class='details'> $time </p>
               </section> " .
              " <section class='col-xs-12 col-md-4 col-lg-4'>
                 <p class='details'> $PostalCode </p>
               </section> <br />" .

              // " <section class='col-xs-12 col-md-12 col-lg-12'>
              //    <p class='details'> <strong></strong> </p>
              //  </section> " .

              " <section class='col-xs-12 col-md-12 col-lg-12'>
                 <p class='details'>
                    <strong>$val_row_category</strong>
                    &nbsp
                    <strong><i><a href='$location'> (view details) </a></i></strong>
                 </p>
               </section> " .

              " <section class='col-xs-12 col-md-4 col-lg-4'>
                 <p class='details'> <strong class='title_name' ><a href='$location_to_profile'>$client_Fname</a></strong> </p>
               </section> " .
              " <section class='col-xs-12 col-md-4 col-lg-4'>
                 <p class='details'> <strong>$client_Phone</strong> </p>
               </section> " .
              " <section class='col-xs-12 col-md-4 col-lg-4'>
                 <p class='details'> $client_Email </p>
               </section> " .
 /************************************************************************************************************************************************/
           "</div>" ;

           echo "<div class='col-xs-12 col-md-3 col-lg-3 right_column'>" .
                   "<p>Accepted Bidders :</p>" ;
           $sql_Fetch_Photos_Of_All_Bidders = " SELECT * FROM jobs_bids_details
                                                INNER JOIN user_photos
                                                ON jobs_bids_details.bid_Student_ID=user_photos.ID
                                                AND jobs_bids_details.job_ID='$job_ID'
                                                AND jobs_bids_details.bid_Status='accepted' ";
           $query_Fetch_Photos_Of_All_Bidders = $connection->query($sql_Fetch_Photos_Of_All_Bidders);
           $num_rows_number_of_bidders = mysqli_num_rows($query_Fetch_Photos_Of_All_Bidders);
           if( $num_rows_number_of_bidders > 0 ){
             while( $row_photo = $query_Fetch_Photos_Of_All_Bidders->fetch_assoc() ){
               $bidder_photos = '<img class="stack_bidder_photos" src=" data:image;base64,'.$row_photo["Photo_Name"].' "> ';
               echo $bidder_photos;
             }
           }
          echo "</div>" ;

    echo "</div>" .
         "</div>" .
         "<div class='bid_details_row_two'> " .
           "<a href='$location_cancel_job_bid' class='customBtn3'>" .
             "<div class='col-xs-12 col-md-12 col-lg-12'>" .
                  " Cancel Bid " .
             "</div>" .
           "</a>" .
         "</div>" .
         "</div><br /><br />";

  }
  }
}
else if( $_SESSION["UserType"] == "Client" ){
  $sql_Fetch_IDs_Of_Unreplied_Jobs = " SELECT * FROM jobs_posts
                                         WHERE jobs_posts.job_Status='Scheduled'
                                         AND jobs_posts.client_ID='$_SESSION[ID]'
                                        --  ORDER BY Date
                                         ";
$query_IDs_Of_Unreplied_Jobs = $connection->query($sql_Fetch_IDs_Of_Unreplied_Jobs);
$num_rows = mysqli_num_rows($query_IDs_Of_Unreplied_Jobs);

if( $num_rows == 0 ){
  echo "<hr /><h2>You currently have no scheduled jobs. <br />Go post your job to start receiveing bids on your task!</h2><hr />";
}
else if( $num_rows !== 0 ){
  while( $row = $query_IDs_Of_Unreplied_Jobs->fetch_assoc() ){
    $job_Category = $row["job_Category"];
    $job_ID = $row["job_ID"];
    $job_Title = htmlspecialchars($row["job_Title"]);
    $client_ID = $row["client_ID"];

    $location = "pages/showJobDetailed.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
    $location2 = "pages/showJobs.php?job_category=$job_Category";

    /******************************* GET NUMBER OF REPLIES **********************************/
    $sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$job_ID' ";
    $query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
    $bids_Count = mysqli_num_rows($query_Fetch_Bids_Details);
    /****************************************************************************************/

    $sql_Fetch_Category_Name = " SELECT Job_category_temporary FROM other WHERE Job_ID='$job_ID' ";
    $query_Fetch_Category_Name = $connection->query($sql_Fetch_Category_Name);
    while( $row_Category = $query_Fetch_Category_Name->fetch_assoc() ){
      $Job_category_temporary = $row_Category["Job_category_temporary"];
    }
    $row_category = $row["job_Category"];
    if( $Job_category_temporary == "dog_walking" ){
      $val_row_category = "Dog Walking";
    }
    else if( $Job_category_temporary == "exterior_window_washing" ){
      $val_row_category = "Exterior Window Washing";
    }
    else if( $Job_category_temporary == "delivery" ){
      $val_row_category = "Flyer and Mail Delivery";
    }
    else if( $Job_category_temporary == "garage_shop_shed_cleaning" ){
      $val_row_category = "Garage, Shop and Shed Cleaning";
    }
    else if( $Job_category_temporary == "gutter_cleaning" ){
      $val_row_category = "Gutter Cleaning";
    }
    else if( $Job_category_temporary == "house_cleaning" ){
      $val_row_category = "House Cleaning";
    }
    else if( $Job_category_temporary == "international_languages" ){
      $val_row_category = "International Languages";
    }
    else if( $Job_category_temporary == "landscaping" ){
      $val_row_category = "Landscaping";
    }
    else if( $Job_category_temporary == "moving" ){
      $val_row_category = "Moving and Delivery Assistance";
    }
    else if( $Job_category_temporary == "music_lessons" ){
      $val_row_category = "Music Lessons";
    }
    else if( $Job_category_temporary == "outdoor_seasonal_decorations" ){
      $val_row_category = "Outdoor Seasonal Decorations";
    }
    else if( $Job_category_temporary == "painting" ){
      $val_row_category = "Painting and Staining";
    }
    else if( $Job_category_temporary == "pressure_washing" ){
      $val_row_category = "Pressure Washing";
    }
    else if( $Job_category_temporary == "private_event_assistance" ){
      $val_row_category = "Private Event Assistance";
    }
    else if( $Job_category_temporary == "rv_boat_cleaning" ){
      $val_row_category = "RV and Boat Cleaning";
    }
    else if( $Job_category_temporary == "snow_removal" ){
      $val_row_category = "Snow and Ice Removal";
    }
    else if( $Job_category_temporary == "tutoring" ){
      $val_row_category = "Tutoring";
    }
    else if( $Job_category_temporary == "vehicle_care" ){
      $val_row_category = "Vehicle Care";
    }
    else if( $Job_category_temporary == "yard_care" ){
      $val_row_category = "Yard Care and Gardening";
    }
    else if( $Job_category_temporary == "other" ){
      $val_row_category = "Other";
    }

    $sql_Get_Date_Of_Venue = " SELECT * FROM other WHERE Job_ID='$job_ID' ";
    $query_Get_Date_Of_Venue = $connection->query($sql_Get_Date_Of_Venue);
    if( $query_Get_Date_Of_Venue ){
      while( $row_date = $query_Get_Date_Of_Venue->fetch_assoc() ){
        $date_str = $row_date["Date"];
        $time = $row_date["Time"];
        $PostalCode = strtoupper($row_date["PostalCode"]);

        $full_date = date("F j, Y", strtotime($date_str) );
      }
    }
    include("../scripts/sql_get_photo.php");

    /************************** Move jobs to HISTORY TAB ********************************/
    date_default_timezone_set('Canada/Atlantic');

    $todays_date = date("Y-m-d");
    $date_arr = explode(", ", $date_str);
    $date = $date_arr[0];
    $date_of_venue_in_date = $date;

    $date_of_venue_in_minutes = strtotime($date_of_venue_in_date);
    $exp_date_in_minutes = $date_of_venue_in_minutes + ( 2 * 60 * 1000 );
    $exp_date_in_date = date("Y-m-d", $exp_date_in_minutes);

    $exp_date_in_days = floor( $exp_date_in_minutes - strtotime( $todays_date ) ) / ( 60 * 60 * 24 );
    $exp_date_in_days_whole_number = floor($exp_date_in_days);

    if( $todays_date >= $exp_date_in_date ){
      $sql_Update_Job_Status_To_Expired = " UPDATE jobs_posts, jobs_bids
                                              SET jobs_posts.job_Status='Expired', jobs_bids.job_Status='Expired'
                                              WHERE jobs_posts.job_ID='$job_ID' AND jobs_bids.job_ID='$job_ID' ";
      $query_Update_Job_Status_To_Expired = $connection->query($sql_Update_Job_Status_To_Expired);
      if($query_Update_Job_Status_To_Expired){
        echo "<div class='row'>" .
             "<div class='col-xs-12 col-md-12 col-lg-12'>" .
             "<div class='jobs_posts'>" .
                "<pre> This job post has expired and will be removed from this section. </pre>";

              /****************** Email Customer to Review Student who performed the task ******************/
                $sql_Fetch_Mail_Info_Student = " SELECT * FROM jobs_bids_details
                                                 INNER JOIN jobs_posts
                                                 ON jobs_bids_details.job_ID=jobs_posts.job_ID
                                                 INNER JOIN students
                                                 ON jobs_bids_details.bid_Student_ID=students.ID
                                                 AND jobs_bids_details.job_ID='$job_ID'
                                                 AND jobs_bids_details.bid_Status='accepted' ";
                $query_Fetch_Mail_Info_Student = $connection->query($sql_Fetch_Mail_Info_Student);
                while( $row_info = $query_Fetch_Mail_Info_Student->fetch_assoc() ){
                  $student_Fname = $row_info["Fname"];
                }

                $sql_Fetch_Mail_Info_Client = " SELECT * FROM jobs_posts
                                                 INNER JOIN clients
                                                 ON jobs_posts.client_ID=clients.ID
                                                 AND jobs_posts.job_ID='$job_ID' ";
                $query_Fetch_Mail_Info_Client = $connection->query($sql_Fetch_Mail_Info_Client);
                while( $row_info = $query_Fetch_Mail_Info_Client->fetch_assoc() ){
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

                $mail->Subject = " Review " . strtoupper($student_Fname). "'s services ";

                $mail->Body = "
                <html>
                <head>
                  <title>Varistyhire Inc.</title>
                </head>
                <body>

                  <div style='border: 2px solid white; padding: 40px; text-align: justify;'>
                    <p>
                      Hi " . strtoupper($client_Fname). ", <br /><br />

                      We would like to thank you again for choosing Varsityhire to help connect you with a student. Your job
                      has directly helped a local student pay for the high cost of further education and living expenses without
                      negatively impacting their studies. <br /><br />

                      For each completed job we ask the you, the customer, to review the student(s) in order to help them
                      obtain more work and improve their performance. Job reviews are also displayed to future customers
                      along with student offers, making it easier for them to select offers for their posting.
                      Sign on and select the “Review Student(s)” icon beside the completed job summary in the
                      “Job History” tab to complete a review. <br /><br />

                      We look forward to connecting you with students for future job requirements. <br /><br />

                      Appointment not completed or do you have concerns with the work? Let us know what the issue is. <br /><br />

                      <b><i> (REPORT ISSUE button – sends manual email to info@varsityhire.com) </i></b>
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
              /*********************************************************************************************/

      }
    }else{
      echo "<div class='row'>" .
           "<div class='col-xs-12 col-md-12 col-lg-12'>" .
           "<div class='jobs_posts'>" ;

    }
    /*****************************************************************************************/

      $location = " pages/accepted_bids_history.php?client_ID=$client_ID&&job_ID=$job_ID&&job_Category=other&&job_Title=$job_Title ";
      $location_reopen_bidding = " scripts/reopen_bidding.php?job_ID=$job_ID ";

      echo "<div class='col-xs-12 col-md-3 col-lg-3 left_column'>" .
             $client_photo .
           "</div>" .

           "<div class='col-xs-12 col-md-6 col-lg-6 center_column'>" .
/************************************************************************************************************************************************/
             " <section class='col-xs-12 col-md-4 col-lg-4'>
                <p class='details'> <strong>$full_date</strong> </p>
              </section> " .
             " <section class='col-xs-12 col-md-4 col-lg-4'>
                <p class='details'> $time </p>
              </section> " .
             " <section class='col-xs-12 col-md-4 col-lg-4'>
                <p class='details'> $PostalCode </p>
              </section> <br />" .

             " <section class='col-xs-12 col-md-12 col-lg-12'>
                <p class='details'>
                  <strong>$val_row_category</strong>
                  &nbsp
                  <strong><i><a href='$location'> (view details) </a></i></strong>
                </p>
              </section> " .
/************************************************************************************************************************************************/
           "</div>" .

           "<div class='col-xs-12 col-md-3 col-lg-3 right_column'>" .
             "<p>Accepted Offers :</p> <br />" .
             "<span class='bid_count'><a href='$location'> $bids_Count </a></span> <br /><i>(select to view)</i>" .
           "</div>" ;

    echo "</div>" .
    "</div>" .
    "</div>" .
    "<div class='bid_details_row_two'> " .
      "<a href='$location_reopen_bidding' class='customBtn3'>" .
        "<div class='col-xs-12 col-md-12 col-lg-12'>" .
           " Reopen Bidding " .
        "</div>" .
      "</a>" .
    "</div>" .
    "</div><br /><br />";

  }
}
}




?>


</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
