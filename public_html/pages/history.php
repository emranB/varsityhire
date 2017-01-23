<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php include("../common/navigation.php"); ?>

<div class="bodyOutline">

<div class="content">
<div class="content-stripe-signup">



<?php

$sqlMyJobPosts = " SELECT * FROM jobs_posts
          INNER JOIN jobs_bids
          ON jobs_posts.job_ID=jobs_bids.job_ID
          AND jobs_posts.job_Status='Expired'
          AND jobs_posts.client_Email='$_SESSION[Email]' ";
$queryMyJobPosts = $connection->query($sqlMyJobPosts);
$num_rows_queryMyJobPosts = mysqli_num_rows($queryMyJobPosts);

if( $num_rows_queryMyJobPosts !== 0 ){
  echo "<strong><h1 class='pageTitle'> PAST JOBS </h1></strong>";
}else{
  echo "<strong><h1 class='pageTitle'> NO PREVIOUS TABS COPLETED </h1></strong>";
}

while( $row = $queryMyJobPosts->fetch_assoc() ){
  $job_Category = $row["job_Category"];
  $job_ID = $row["job_ID"];
  $job_Title = htmlspecialchars($row["job_Title"]);
  $client_ID = $row["client_ID"];
  $location = "pages/showJobDetailed.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
  $location2 = "pages/showJobs.php?job_category=$job_Category";


  /**************** GET NUMBER OF REPLIES *******************/
  $sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$job_ID' ";
  $query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
  $bids_Count = mysqli_num_rows($query_Fetch_Bids_Details);
  /**************** GET NUMBER OF REPLIES *******************/

  $row_category = $row["job_Category"];
  if( $row_category == "dog_walking" ){
    $val_row_category = "Dog Walking";
  }
  else if( $row_category == "exterior_window_washing" ){
    $val_row_category = "Exterior Window Washing";
  }
  else if( $row_category == "delivery" ){
    $val_row_category = "Flyer and Mail Delivery";
  }
  else if( $row_category == "garage_shop_shed_cleaning" ){
    $val_row_category = "Garage, Shop and Shed Cleaning";
  }
  else if( $row_category == "gutter_cleaning" ){
    $val_row_category = "Gutter Cleaning";
  }
  else if( $row_category == "house_cleaning" ){
    $val_row_category = "House Cleaning";
  }
  else if( $row_category == "international_languages" ){
    $val_row_category = "International Languages";
  }
  else if( $row_category == "landscaping" ){
    $val_row_category = "Landscaping";
  }
  else if( $row_category == "moving" ){
    $val_row_category = "Moving and Delivery Assistance";
  }
  else if( $row_category == "music_lessons" ){
    $val_row_category = "Music Lessons";
  }
  else if( $row_category == "outdoor_seasonal_decorations" ){
    $val_row_category = "Outdoor Seasonal Decorations";
  }
  else if( $row_category == "painting" ){
    $val_row_category = "Painting and Staining";
  }
  else if( $row_category == "pressure_washing" ){
    $val_row_category = "Pressure Washing";
  }
  else if( $row_category == "private_event_assistance" ){
    $val_row_category = "Private Event Assistance";
  }
  else if( $row_category == "rv_boat_cleaning" ){
    $val_row_category = "RV and Boat Cleaning";
  }
  else if( $row_category == "snow_removal" ){
    $val_row_category = "Snow and Ice Removal";
  }
  else if( $row_category == "tutoring" ){
    $val_row_category = "Tutoring";
  }
  else if( $row_category == "vehicle_care" ){
    $val_row_category = "Vehicle Care";
  }
  else if( $row_category == "yard_care" ){
    $val_row_category = "Yard Care and Gardening";
  }
  else if( $row_category == "other" ){
    $val_row_category = "Other";
  }

  include("../scripts/sql_get_dates.php");
  include("../scripts/sql_get_photo.php");
  $location_bids_accepted = "pages/accepted_bids_history.php?client_ID=$client_ID&&job_ID=$job_ID&&job_Category=$row_category";

  $sql_Fetch_Job_Category_Temporary = " SELECT Job_category_temporary FROM other WHERE Job_ID='$job_ID' ";
  $query_Fetch_Job_Category_Temporary = $connection->query($sql_Fetch_Job_Category_Temporary);
  while( $row2 = $query_Fetch_Job_Category_Temporary->fetch_assoc() ){
    $Job_category_temporary = $row2["Job_category_temporary"];
  }
  /************************************************************************/
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
  /************************************************************************/

  echo "<div class='row'>" .

        "<div class='col-xs-12 col-md-12 col-lg-12'>" .
        "<div class='jobs_posts'>" .


          "<div class='col-xs-12 col-md-3 col-lg-3 left_column'>" .
            $client_photo .
          "</div>" .
          "<div class='col-xs-12 col-md-6 col-lg-6 center_column'> " .

            " <p><span> $val_row_category </span></p> " .

            " <p><span><strong><a href='$location'> $row[job_Title] </a></strong></span></p> " .

            " <p> Date(s) of venue: <br /> " .
            " $date_str </p> " .
            " <p> Time of Appointment: <br /> " .
            " $time </p> " .
            " <p> Postal Code: <br /> " .
            " $PostalCode </p> " .

          "</div>" .
          "<div class='col-xs-12 col-md-3 col-lg-3 right_column'>" .
            "<p>Total bids submitted :</p> <br />" .
            "<span class='bid_count'><a href='$location_bids_accepted'> $bids_Count </a></span>" .
          "</div>" .

        "</div>" .
        "</div>" .

        "</div><br /><br />" ;

}



?>

</div>
</div>

</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
