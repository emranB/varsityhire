<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$GET_client_ID = $_GET["client_ID"];
$GET_job_ID = $_GET["job_ID"];
$GET_job_Category = $_GET["job_Category"];
$GET_job_Title = $_GET["job_Title"];
$Ref = parse_url($_SERVER['HTTP_REFERER']);
$Referer = basename($Ref["path"]);

?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<!-- <h1 class="pageTitle"> Confirm Bid </h1> -->

<div class="content">
<div class="content-accepted-bids-history">


<?php


/*****************************/
echo "<strong><hr /><h2 style='padding: 1% 15%; text-align:justify;'> For each completed job, please review the students
                         in order to help them obtain more
                         work and improve their performance. Job reviews
                         are also displayed to future customers
                         along with student offers, making it easier for them
                         to select offers for their posting.
     </h2><hr /></strong>";


$sql_Fetch_Bidder_Details = " SELECT * FROM $GET_job_Category
                              INNER JOIN jobs_bids_details
                              ON $GET_job_Category.Job_ID=jobs_bids_details.job_ID
                              INNER JOIN students
                              ON jobs_bids_details.bid_Student_ID=students.ID
                              -- INNER JOIN user_photos
                              -- ON students.ID=user_photos.ID
                              WHERE jobs_bids_details.bid_Status='accepted'
                              AND jobs_bids_details.job_ID='$GET_job_ID' ";
$query_Fetch_Bidder_Details = $connection->query($sql_Fetch_Bidder_Details);
  if( $query_Fetch_Bidder_Details ){

    while( $row = $query_Fetch_Bidder_Details->fetch_assoc() ){
			$job_Category = $GET_job_Category;
			$job_ID = $GET_job_ID;
			$student_ID = $row["bid_Student_ID"];
			$student_Fname = $row["Fname"];

			$location = "pages/review_student.php?student_ID=$student_ID&&job_ID=$job_ID&&client_ID=$GET_client_ID";

			$row_category = $GET_job_Category;

      $sql_Fetch_Category_Name = " SELECT Job_category_temporary FROM other WHERE Job_ID='$job_ID' ";
      $query_Fetch_Category_Name = $connection->query($sql_Fetch_Category_Name);
      while( $row_Category = $query_Fetch_Category_Name->fetch_assoc() ){
        $Job_category_temporary = $row_Category["Job_category_temporary"];
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

			$sql_Get_Date_Of_Venue = " SELECT * FROM jobs_posts
																 INNER JOIN $GET_job_Category
																 ON jobs_posts.job_ID=$GET_job_Category.job_ID ";
			$query_Get_Date_Of_Venue = $connection->query($sql_Get_Date_Of_Venue);
			if( $query_Get_Date_Of_Venue ){
				while( $row_date = $query_Get_Date_Of_Venue->fetch_assoc() ){
					$date = $row_date["Date"];
					$time = $row_date["Time"];
          $postal_Code = $row_date["PostalCode"];

          $full_date = date("F j, Y", strtotime($date) );

				}
			}

			$sql_Fetch_Student_Photo = " SELECT * FROM user_photos WHERE ID='$student_ID' ";
			$query_Fetch_Student_Photo = $connection->query($sql_Fetch_Student_Photo);
			if( $query_Fetch_Student_Photo ){
				while( $row_photo = $query_Fetch_Student_Photo->fetch_assoc() ){
					$student_photo = '<img src=" data:image;base64,'.$row_photo["Photo_Name"].' "> ';
				}
			}

			$sql_Check_If_Student_Has_Already_Been_Reviewed = " SELECT * FROM students_reviews
                                                          WHERE client_ID='$GET_client_ID'
                                                          AND job_ID='$GET_job_ID'
                                                          AND student_ID='$student_ID' ";
			$query_Check_If_Student_Has_Already_Been_Reviewed = $connection->query($sql_Check_If_Student_Has_Already_Been_Reviewed);
			$num_rows_Check_If_Student_Has_Already_Been_Reviewed = mysqli_num_rows($query_Check_If_Student_Has_Already_Been_Reviewed);
      while( $row_review = $query_Check_If_Student_Has_Already_Been_Reviewed->fetch_assoc() ){
        $average = $row_review["average"];
        $showed_up = $row_review["showed_up"];
      }

      $location_to_student_profile = "pages/profile.php?ID=$student_ID";
      $location_to_job_details = "pages/showJobDetailed.php?job_ID=$job_ID&&job_category=$job_Category&&job_Title=$GET_job_Title";


			echo "<div class='row'>" .
						"<div class='col-xs-12 col-md-12 col-lg-12'>" .
						"<div class='jobs_posts'>" ;
     if( $num_rows_Check_If_Student_Has_Already_Been_Reviewed == "0" ){
       echo "<div class='col-xs-12 col-md-3 col-lg-3 left_column active'>";
     }
     else if( $num_rows_Check_If_Student_Has_Already_Been_Reviewed > "0" ){
       echo "<div class='col-xs-12 col-md-3 col-lg-3 left_column inactive'>";
     }
						echo $student_photo .
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
                      <strong><i><a href='$location_to_job_details'> (view details) </a></i></strong>
                    </p>
                  </section> " .

                 " <section class='col-xs-12 col-md-6 col-lg-6'>
                    <p class='details'><a href='$location_to_student_profile'> $student_Fname </a></p>
                  </section> " .
/************************************************************************************************************************************************/
							"</div>" .
				      "<div class='col-xs-12 col-md-3 col-lg-3 right_column'>" ;
              if( $Referer == "history.php" && $num_rows_Check_If_Student_Has_Already_Been_Reviewed == "0" ){
           echo "<a href='$location&&action=review' class='btnReview btn-block'>Review Student</a><br />" .
                "<a href='$location&&action=no_show' class='btnReview btn-block'>Did not show up</a>" ;
              }
              else if( $Referer == "history.php" && $num_rows_Check_If_Student_Has_Already_Been_Reviewed > "0" && $showed_up == "No" ){
           echo "<p>Your Review:</p> <br />" . "<span style='font-size:3em;'>No Show</span>";
              }
              else if( $Referer == "history.php" && $num_rows_Check_If_Student_Has_Already_Been_Reviewed > "0" && $showed_up == "Yes"){
           echo "<p>Your Review:</p> <br />" . "<span class='bid_count'>$average/5</span>";
              }
              else if( $Referer == "showJobsScheduled.php" ){
                echo "<h2>Student can only be reviewed once job has moved to history</h2>";
              }else{
                header("../index.php");
              }
					echo "</div>" .

						"</div>" .
						"</div>" .
					 "</div><br /><br />" ;

					"</div>" .
					"</div>" .
				 "</div><br /><br />";
		}
  }
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
