<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle">Jobs Pending </h1>

<div class="content">
<div class="content-showJobs">

<?php

if( $_SESSION["UserType"] == "Student" ){

	$sql_Fetch_IDs_Of_Unreplied_Jobs = " SELECT * FROM jobs_posts
																			 INNER JOIN jobs_bids
																			 ON jobs_posts.job_ID=jobs_bids.job_ID
																			 INNER JOIN jobs_bids_details
																			 ON jobs_bids.job_ID=jobs_bids_details.job_ID
																			 INNER JOIN clients
																			 ON jobs_posts.client_ID=clients.ID
																			 AND jobs_bids.job_Status='Pending'
																			 AND jobs_bids_details.bid_Student_ID='$_SESSION[ID]' ";
	$query_IDs_Of_Unreplied_Jobs = $connection->query($sql_Fetch_IDs_Of_Unreplied_Jobs);

		while( $row = $query_IDs_Of_Unreplied_Jobs->fetch_assoc() ){
			$job_Category = $row["job_Category"];
			$job_ID = $row["job_ID"];
			$job_Title = htmlspecialchars($row["job_Title"]);
			$client_ID = $row["client_ID"];
			$client_Fname = $row["Fname"];

			$location = "pages/showJobDetailed.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
			$location2 = "pages/showJobs.php?job_category=$job_Category";

			/**************** GET NUMBER OF REPLIES *******************/
			$sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$job_ID' ";
			$query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
			$bids_Count = mysqli_num_rows($query_Fetch_Bids_Details);
			/**************** GET NUMBER OF REPLIES *******************/

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
					$postalCode = strtoupper($row_date["PostalCode"]);

					$full_date = date("F j, Y", strtotime($date_str) );
			  }
			}

			include("../scripts/sql_get_photo.php");

			$location_to_profile = "pages/profile.php?ID=$client_ID";

			echo "<div class='row'>" .
					 "<div class='jobs_posts'>" .

			 	 		"<div class='col-xs-12 col-md-3 col-lg-3 left_column'>" .
						 	$client_photo .
					 	"</div>" .
					 	"<div class='col-xs-12 col-md-6 col-lg-6 center_column'> " .
/*******************************************************************************************************************************/
							" <section class='col-xs-12 col-md-4 col-lg-4'>
							   	<p class='details'> <strong>$full_date</strong> </p>
							 </section> " .
							" <section class='col-xs-12 col-md-4 col-lg-4'>
							   	<p class='details'> $time </p>
							 </section> " .
							" <section class='col-xs-12 col-md-4 col-lg-4'>
							   	<p class='details'> $postalCode </p>
							 </section> <br />" .

							" <section class='col-xs-12 col-md-12 col-lg-12'>
									<p class='details'>
										<strong>$val_row_category</strong>
										&nbsp
										<strong><i><a href='$location'> (view details) </a></i></strong>
									</p>
								</section> " .

							" <section class='col-xs-12 col-md-6 col-lg-6'>
						 		<p class='details'> Employer Name:
						 		<span><strong><a href='$location_to_profile'> $client_Fname </a></strong></span></p>
						 	</section> " .
/*******************************************************************************************************************************/
					 	"</div>" .
					 	"<div class='col-xs-12 col-md-3 col-lg-3 right_column'>" .
						 	"<p>Number of Student Offers :</p> <br />" .
						 	"<span class='bid_count'> $bids_Count </span>" .
					 	"</div>" .

						"</div>" .
						"</div>" ;

						if( $_SESSION["ID"] == $row["bid_Student_ID"] ){
							$sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details
																					INNER JOIN jobs_posts
																					ON jobs_bids_details.job_ID=jobs_posts.job_ID
																					AND jobs_posts.job_ID='$job_ID' ";
							$query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
							if( $query_Fetch_Bids_Details ){
								while( $row2 = $query_Fetch_Bids_Details->fetch_assoc() ){
									$bids_details_table_Bid_ID = $row2["bid_ID"];
									$bids_details_table_Job_ID = $row2["job_ID"];
									$bids_details_table_Student_ID = $row2["bid_Student_ID"];
									$bids_details_table_Bid_Amount = $row2["bid_Amount"];
									$bids_details_table_Bid_Comments = $row2["bid_Comments"];

									$location_revoke_bid = "scripts/revoke_bid_process.php?job_ID=$bids_details_table_Job_ID&&student_ID=$bids_details_table_Student_ID";

									if( $bids_details_table_Student_ID == $_SESSION["ID"] ){
										echo "<div class='bid_details_row_two' style='width: 61%;'> " .

													 "<span style='background: #e0e0e0; min-height: 45px; height: auto; border-radius: 25px 0 25px 25px;' class='col-xs-12 col-md-3 col-lg-3'>" .
													 		"Your Bid Amount: <br />" . "<strong>$ $bids_details_table_Bid_Amount</strong>" .
													 "</span>" .

													 "<a href='$location_revoke_bid' class='customBtn3' >" .
													   "<div class='col-xs-12 col-md-6 col-lg-6' style=' min-height: 45px; height: auto; '>" .
													        " Cancel Bid " .
													   "</div>" .
													 "</a>" .

													 "<span style='background: #e0e0e0; min-height: 45px; height: auto; border-radius: 0 25px 25px 25px;' class='col-xs-12 col-md-3 col-lg-3'>" .
				 									 		"Your Bid Comments: <br />" . $bids_details_table_Bid_Comments .
				 									 "</span>" .

												 "</div>" ;
									}
								}
							}
						}

				 echo "</div><br /><br /><br />";
		}

}

else if($_SESSION["UserType"] == "Client" ){

}

$connection->close();

?>



</div>
</div>

</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
