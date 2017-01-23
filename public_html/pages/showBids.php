<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$GET_job_ID = $_GET["job_ID"];
// $GET_bid_ID = $_GET["bid_ID"];
// $GET_token = $_GET["token"];
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<div class="content">
<div class="content-confirm-Bid">


<?php
/*****************************/
echo "<strong><hr /><p style='padding: 5px 10%; text-align:justify; '>" . "

        When you accept an offer, you are committing to
        hiring the selected student(s) for the rate as
        offered by the student(s). You may select as many
        students as you require to complete your job.
        Once you are finished accepting offers, simply
        click the 'Send Offer Acceptance' button to
        notify the awarded students and schedule your work.
        This will close the offer stage. You will also be
        able to view the student's contact information at this time. <br /><br />

        Undecided on the offers? Wait to see if any other students
        make offers before you make your decision. Don’t wait too
        long though, the offers could be cancelled by the students
        at any time as they may find another job during that timeframe! " .

      "</p><hr /></strong>";

echo " <div class='col-xs-12 col-md-12 col-lg-12'> " .
      " <div class='jobs_posts_hidden_container'> ";


        $sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details
                                    INNER JOIN jobs_posts
                                    ON jobs_bids_details.job_ID=jobs_posts.job_ID
                                    AND jobs_posts.job_ID='$GET_job_ID' ";
        $query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
        if( $query_Fetch_Bids_Details ){
          while( $row2 = $query_Fetch_Bids_Details->fetch_assoc() ){
            $bids_details_table_Bid_ID = $row2["bid_ID"];
            $bids_details_table_Job_ID = $row2["job_ID"];
            $bids_details_table_Student_ID = $row2["bid_Student_ID"];
            $bids_details_table_Bid_Amount = $row2["bid_Amount"];
            $bids_details_table_Bid_Comments = $row2["bid_Comments"];
            $bids_details_table_Bid_Status = $row2["bid_Status"];

            $sql_Get_Student_Name = " SELECT * FROM students WHERE ID='$bids_details_table_Student_ID' ";
            $query_Get_Student_Name = $connection->query($sql_Get_Student_Name);
            while( $row_student = $query_Get_Student_Name->fetch_assoc() ){
              $student_Fname = $row_student["Fname"];
            }

            $location_to_profile = "pages/profile.php?ID=$bids_details_table_Student_ID";

            if( $row2["client_ID"] == $_SESSION["ID"] ){
              echo "<div class='jobs_posts_hidden'>" .

                    "<div class='row'>" .
                      "<div class='col-xs-12 col-md-4 col-lg-4'>" .
                        "<div class='photo'>";
                          $qry = " SELECT * FROM user_photos WHERE ID='$bids_details_table_Student_ID'";
                          $result  = $connection->query($qry);
                          while( $row = $result->fetch_assoc() )
                          {
                              echo '<img height="200" width="200" src="data:image;base64,'.$row["Photo_Name"].' "> ';
                          }
                   echo "</div>" .
                      "</div>" .
                      "<div class='col-xs-12 col-md-8 col-lg-8'>" .

                        "<div class='info'>" .
                          "<div class='col-xs-12 col-md-6 col-lg-6 right'>" .
                              "Student Name:" .
                           "</div>" .
                           "<div class='col-xs-12 col-md-6 col-lg-6 left'>" .
                              "<strong>$student_Fname </strong> <a href='$location_to_profile'><i>(view Profile)</i></a>" .
                           "</div>" .
                          "<div class='col-xs-12 col-md-6 col-lg-6 right'>" .
                              "Hourly Rate:" .
                           "</div>" .
                           "<div class='col-xs-12 col-md-6 col-lg-6 left'>" .
                              "$" . $bids_details_table_Bid_Amount .
                           "</div>" .
                          "<div class='col-xs-12 col-md-6 col-lg-6 right'>" .
                              "Bid Comments:" .
                           "</div>" .
                           "<div class='col-xs-12 col-md-6 col-lg-6 left'>" .
                              $bids_details_table_Bid_Comments .
                           "<br>" .
                        "</div>" ;



                    if( $bids_details_table_Bid_Status == "pending" ){
                      $location_beta_2 = "pages/confirm-bid.php?job_ID=$bids_details_table_Job_ID&&bid_ID=$bids_details_table_Bid_ID&&action=accept ";
                      echo "<div class='col-lg-12 col-md-12 col-xs-12 bid_actions_row_accepted'>" .
                              "<div class='col-lg-12 col-md-12 col-xs-12'><a href='$location_beta_2'>SEND OFFER ACCEPTANCE</a></div>".
                            "</div>" .
                           "</div></div></div></div><br /><br />" ;

                    }
                    else if( $bids_details_table_Bid_Status == "accepted" ){
                      $location_beta_2 = "pages/confirm-bid.php?job_ID=$bids_details_table_Job_ID&&bid_ID=$bids_details_table_Bid_ID&&action=revoke ";
                      echo "<div class='col-lg-12 col-md-12 col-xs-12 bid_actions_row_accepted'>" .
                              "<div class='col-lg-6 col-md-6 col-xs-12'> BID HAS BEEN ACCEPTED </div>" .
                              "<div class='col-lg-6 col-md-6 col-xs-12'><a href='$location_beta_2'> REVOKE BID </a></div>" .
                            "</div>" .
                            "</div></div></div></div><br /><br />" ;
                    }
                    else if( $bids_details_table_Bid_Status == "revoked" ){
                      echo "<div class='col-lg-12 col-md-12 col-xs-12 bid_actions_row_accepted'>" .
                              "<div class='col-lg-12 col-md-12 col-xs-12'> Bid was revoked by bidder </div>" .
                            "</div>" .
                            "</div></div></div></div><br /><br />" ;
                    }


              }
          }
        }

        echo "<br><br>";
        $url = "pages/close_bid_session.php?job_ID=$bids_details_table_Job_ID";
        echo "<a href='$url' id='close_Bid_Session' name='close_Bid_Session' class='customBtn1'>
                CLOSE BIDDING SESSION
              </a>";
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

<?php include("../common/footer.php"); ?>

</body>

</html>
