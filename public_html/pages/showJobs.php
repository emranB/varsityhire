<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php");?>


<body>

<?php
include("../common/navigation.php");
$GET_job_ID = $_GET["job_ID"];
$GET_job_Category = $_GET["job_category"];
$GET_job_Title = $_GET["job_Title"];

if( $_GET["page_number"] == "" || $_GET["page_number"] == "1" ){
	$offset = "0";
}
else if( $_GET["page_number"] !== "" || $_GET["page_number"] !== "1" ){
	$offset = ($_GET["page_number"] - 1) * 5;
}
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<div class="content">
<div class="content-showJobs">

<?php

if( $GET_job_Category == ""){

	/******************** Unreplied Jobs ********************/
	echo "<h1 class='pageTitle'> Click on the job title to submit your bid </h1>";

	$sql_Fetch_IDs_Of_Unreplied_Jobs = " SELECT * FROM jobs_posts
																			 INNER JOIN jobs_bids
																			 ON jobs_posts.job_ID=jobs_bids.job_ID
																			 INNER JOIN clients
																			 ON jobs_posts.client_ID=clients.ID
																			 AND jobs_posts.job_Status='Open'
																			 AND jobs_bids.job_Status='Unreplied'
																			 ORDER BY job_Title
																			 LIMIT 5 OFFSET $offset
																			 ";

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
			$sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$job_ID' AND bid_Status<>'revoked' ";
			$query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
			$bids_Count = mysqli_num_rows($query_Fetch_Bids_Details);
			/**************** GET NUMBER OF REPLIES *******************/

			$row_category = $row["job_Category"];

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

			$sql_Fetch_Employer_Photo = " SELECT * FROM user_photos WHERE ID='$client_ID' ";
			$query_Fetch_Employer_Photo = $connection->query($sql_Fetch_Employer_Photo);
			if( $query_Fetch_Employer_Photo ){
				while( $row_photo = $query_Fetch_Employer_Photo->fetch_assoc() ){
					$client_photo = '<img src=" data:image;base64,'.$row_photo["Photo_Name"].' "> ';
				}
			}

			$location_to_profile = "pages/profile.php?ID=$client_ID";

			echo "<div class='row'>" .
						"<div class='col-xs-12 col-md-12 col-lg-12'>" .
						"<div class='jobs_posts'>" .

							"<div class='col-xs-12 col-md-3 col-lg-3 left_column'>" .
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
/************************************************************************************************************************************************/
							"</div>" .
							"<div class='col-xs-12 col-md-3 col-lg-3 right_column'>" .
								"<p>Total bids submitted :</p> <br />" .
								"<span class='bid_count'> $bids_Count </span>" .
							"</div>" .


						"</div>" .
						"</div>" .
					 "</div><br /><br />";


		}
/************************************************************/





	echo "<br />";





	/******************** Pending Jobs ********************/
	// echo "<hr /><strong><h2>P E N D I N G &nbsp J O B S</h2></strong>";
	$sql_Fetch_IDs_Of_Unreplied_Jobs = " SELECT * FROM jobs_posts
																			 INNER JOIN jobs_bids
																			 ON jobs_posts.job_ID=jobs_bids.job_ID
																			 INNER JOIN clients
																			 ON jobs_posts.client_ID=clients.ID
																			 AND jobs_posts.job_Status='Open'
																			 AND jobs_bids.job_Status='Pending'
																			 ORDER BY job_Title
																			 LIMIT 5 OFFSET $offset
																			 ";
	$query_IDs_Of_Unreplied_Jobs = $connection->query($sql_Fetch_IDs_Of_Unreplied_Jobs);

		while( $row = $query_IDs_Of_Unreplied_Jobs->fetch_assoc() ){
			$job_Category = $row["job_Category"];
			$job_ID = $row["job_ID"];
			$client_ID = $row["client_ID"];
			$job_Title = htmlspecialchars($row["job_Title"]);
			$client_Fname = $row["Fname"];

			$location = "pages/showJobDetailed.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
			$location2 = "pages/showJobs.php?job_category=$job_Category";

			/**************** GET NUMBER OF REPLIES *******************/
			$sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$job_ID' AND bid_Status<>'revoked' ";
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

			/**************************** Temporary Solution to Category *****************************/
			$sql_Fetch_Job_Category_Temporary = " SELECT Job_category_temporary FROM other WHERE Job_ID='$job_ID' ";
			$query_Fetch_Job_Category_Temporary = $connection->query($sql_Fetch_Job_Category_Temporary);
			while( $row = $query_Fetch_Job_Category_Temporary->fetch_assoc() ){

				$Job_category_temporary = $row["Job_category_temporary"];
				/*******************************************************************/
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
				/*******************************************************************/

				$location_to_profile = "pages/profile.php?ID=$client_ID";

				echo "<div class='row'>" .
							"<div class='col-xs-12 col-md-12 col-lg-12'>" .
							"<div class='jobs_posts'>" .

								"<div class='col-xs-12 col-md-3 col-lg-3 left_column'>" .
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
/************************************************************************************************************************************************/
								"</div>" .
								"<div class='col-xs-12 col-md-3 col-lg-3 right_column'>" .
									"<p>Total bids submitted :</p> <br />" .
									"<span class='bid_count'> $bids_Count </span>" .
								"</div>" .


							"</div>" .
							"</div>" ;

							if( $_SESSION["UserType"] == "Student" ){
								$sql_Fetch_User_Bid = " SELECT * FROM jobs_bids_details WHERE job_ID='$job_ID' AND bid_Student_ID='$_SESSION[ID]' ";
								$query_Fetch_User_Bid = $connection->query($sql_Fetch_User_Bid);
								$num_rows_Fetch_User_Bid = mysqli_num_rows($query_Fetch_User_Bid);
								if( $num_rows_Fetch_User_Bid > 0 ){
									while( $row_bid_details = $query_Fetch_User_Bid->fetch_assoc() ){
										$bid_Amount = $row_bid_details["bid_Amount"];
										$bid_Comments = $row_bid_details["bid_Comments"];
										$bid_Status = strtoupper($row_bid_details["bid_Status"]);
									}
									echo "<div class='bid_details_row'> " .
											 "<div class='col-xs-12 col-md-3 col-lg-3'>" .
											 		"Your Bid Amount: <br />" . "<strong>$ $bid_Amount</strong>" .
											 "</div>" .
											 "<div class='col-xs-12 col-md-6 col-lg-6'>" .
		 									 		"Your Bid Comments: <br />" . $bid_Comments .
		 									 "</div>" .
											 "<div class='col-xs-12 col-md-3 col-lg-3'>" .
	 										 		"Bid Status: <br />" . $bid_Status .
	 										 "</div>" .
											 "</div>" ;
								}
							}


				 echo "</div><br /><br /><br />";
			}
	    /*****************************************************************************************/


		}
/************************************************************/

/******************************************* Paginate Job Posts **********************************************/
	$sql_Fetch_Number_Of_Unreplied_Jobs = " SELECT * FROM jobs_posts
																				  INNER JOIN jobs_bids
																				  ON jobs_posts.job_ID=jobs_bids.job_ID
																				  INNER JOIN clients
																				  ON jobs_posts.client_ID=clients.ID
																				  AND jobs_posts.job_Status='Open'
																				  AND jobs_bids.job_Status<>'Expired'
																				  ORDER BY job_Title
																				 ";
	$query_Fetch_Number_Of_Unreplied_Jobs = $connection->query($sql_Fetch_Number_Of_Unreplied_Jobs);
	$number_Of_Unreplied_Jobs = mysqli_num_rows($query_Fetch_Number_Of_Unreplied_Jobs);

	$number_of_pages = ceil($number_Of_Unreplied_Jobs / 10);

	echo " <ul class='pagination'> ";
	for( $i=1; $i<=$number_of_pages; $i++ ){
		echo "<li><a href='pages/showJobs.php?page_number=$i'> $i </a></li>";
	}
	echo " </ul> ";
/*************************************************************************************************************/

}

else if( $GET_job_Category !== "" ){
	// echo "<h1 class='pageTitle'>" . $GET_job_Category . "<hr class='outlineHr' /></h1>";

	$sqlShowJobsByCategory = " SELECT * FROM jobs_posts WHERE job_Category='$GET_job_Category' ";
	$queryShowJobsByCategory = $connection->query($sqlShowJobsByCategory);

	if( $queryShowJobsByCategory ){
		while( $row = $queryShowJobsByCategory->fetch_assoc() ){
			$job_Category = $row["job_Category"];
			$job_ID = $row["job_ID"];
			$job_Title = htmlspecialchars($row["job_Title"]);
			$location = "pages/showJobDetailed.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title&&date_Start=$date_Start";
			$location2 = "pages/showJobs.php?job_category=$job_Category";

			/**************** GET NUMBER OF REPLIES *******************/
			$sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$job_ID' AND bid_Status<>'revoked' ";
			$query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
			$bids_Count = mysqli_num_rows($query_Fetch_Bids_Details);
			/**************** GET NUMBER OF REPLIES *******************/

			echo "<div class='row'>" .
						"<div class='col-xs-12 col-md-2 col-lg-2'>" .

						"</div>".
						"<div class='col-xs-12 col-md-8 col-lg-8'>" .
						"<div class='jobs_posts'>" .
							"<div class='row'>" . "Job ID: " . "$row[job_ID]" . "</div>" .
							"<div class='row'>" . "Client ID: " . "$row[client_ID]" . "</div>" .
							"<div class='row'>" . "Client Email: " . "$row[client_Email]" . "</div>" .
							"<div class='row'>" . "Job Category: " . "<strong><a href='$location2'>" . "$row[job_Category]" . "</a></div>" .
							"<div class='row'>" . "Job Title: " . "<strong><a href='$location'>" . "$row[job_Title]" . "</a></strong>" . "<a href='' ><span class='replies'>Replies: " . $bids_Count . "</span></a></div>" .
						"</div>" .
						"</div>";

			echo "</div>";
		}
	}
}
$connection->close();
?>

</div>
</div>

</div>
</div>
<br /><br /><br />
<?php include("../common/footer.php"); ?>

</body>

</html>
