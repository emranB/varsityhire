<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");

if( $_GET["page_number"] == "" || $_GET["page_number"] == "1" ){
	$offset = "0";
}
else if( $_GET["page_number"] !== "" || $_GET["page_number"] !== "1" ){
	$offset = ($_GET["page_number"] - 1) * 5;
}
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle">My Job Listings </h1>

<div class="content">
<div class="content-showJobsForOneClient">


<?php
$sql_Check_If_Job_Posts_Exists = " SELECT * FROM jobs_posts WHERE client_ID='$_SESSION[ID]' ";
$query_Check_If_Job_Posts_Exists = $connection->query($sql_Check_If_Job_Posts_Exists);
$num_rows = mysqli_num_rows($query_Check_If_Job_Posts_Exists);


if( $query_Check_If_Job_Posts_Exists ){
	if( $num_rows == 0 ){
		echo "<hr /><h1>You currently have no posted jobs. Go post your job to start receiveing bids on your task!</h1><hr />";
	}
	else if( $num_rows !== 0 ){

		$sqlMyJobPosts = " SELECT * FROM jobs_posts
												INNER JOIN jobs_bids
												ON jobs_posts.job_ID=jobs_bids.job_ID
												AND jobs_bids.job_Status='Unreplied'
												WHERE jobs_posts.job_Status='Open'
												AND jobs_posts.client_Email='$_SESSION[Email]'
												LIMIT 5 OFFSET $offset
												";
		$queryMyJobPosts = $connection->query($sqlMyJobPosts);
		$num_rows_queryMyJobPosts = mysqli_num_rows($queryMyJobPosts);
		// if( $num_rows_queryMyJobPosts !== 0 ){
		// 	echo "<strong><h2>U N R E P L I E D &nbsp J O B S</h2></strong>";
		// }else{
		// 	echo "<hr /><strong><h2>N O &nbsp U N R E P L I E D &nbsp J O B S . . . .</h2></strong>";
		// }


		while( $row = $queryMyJobPosts->fetch_assoc() ){
			$job_Category = $row["job_Category"];
			$job_ID = $row["job_ID"];
			$job_Title = htmlspecialchars($row["job_Title"]);
			$client_ID = $row["client_ID"];
			$location = "pages/showJobDetailed.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
			$location2 = "pages/showJobs.php?job_category=$job_Category";

			/**************** GET NUMBER OF REPLIES *******************/
			$sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$job_ID' AND bid_Status<>'revoked' ";
			$query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
			$bids_Count = mysqli_num_rows($query_Fetch_Bids_Details);
			/**************** GET NUMBER OF REPLIES *******************/

			$row_category = $row["job_Category"];
			include("../scripts/rename_categories.php");

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
							 		"<pre> This job post has expired and will be removed from this section. <br />  </pre>";
				}
			}else{
				echo "<div class='row'>" .
						 "<div class='col-xs-12 col-md-12 col-lg-12'>" .
						 "<div class='jobs_posts'>" ;

			}
			/*********************************************************************/

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
			echo 		" <div class='col-xs-12 col-md-3 col-lg-3 left_column'> " .
								$client_photo .
							" </div> " .
							" <div class='col-xs-12 col-md-6 col-lg-6 center_column'> " .
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

							" </div> " .

							" <div class='col-xs-12 col-md-3 col-lg-3 right_column'> " .
								" <p>View Student Offers :</p> <br /> " .
								" <span class='bid_count'> $bids_Count </span> " .
							" </div> " .

						" </div> " .
						" </div> " .
						" </div><br /><br /> " ;
		}













		$sql_Fetch_IDs_Of_Pending_Jobs = " SELECT * FROM jobs_posts
																			 INNER JOIN jobs_bids
																			 ON jobs_posts.job_ID=jobs_bids.job_ID
																			 AND jobs_bids.job_Status='Pending'
																			 AND jobs_posts.job_Status='Open'
																			 AND jobs_posts.client_ID='$_SESSION[ID]'
																			 LIMIT 5 OFFSET $offset
																			 ";
			$query_IDs_Of_Pending_Jobs = $connection->query($sql_Fetch_IDs_Of_Pending_Jobs);
			$num_rows_query_IDs_Of_Pending_Jobs = mysqli_num_rows($query_IDs_Of_Pending_Jobs);

			// if( $num_rows_query_IDs_Of_Pending_Jobs !== 0 ){
			// 	echo "<hr /><strong><h2>P E N D I N G &nbsp J O B S</h2></strong>";
			// }else{
			// 	echo "<hr /><strong><h2>N O &nbsp P E N D I N G &nbsp J O B S . . . .</h2></strong>";
			// }

				while( $row = $query_IDs_Of_Pending_Jobs->fetch_assoc() ){
					$job_Category = $row["job_Category"];
					$job_ID = $row["job_ID"];
					$client_ID = $row["client_ID"];
					$job_Title = htmlspecialchars($row["job_Title"]);
					$location = "pages/showJobDetailed.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location2 = "pages/showBids.php?job_ID=$job_ID";

					/**************** GET NUMBER OF REPLIES *******************/
					$sql_Fetch_Bids_Details = " SELECT * FROM jobs_bids_details WHERE job_ID='$job_ID' AND bid_Status<>'revoked' ";
					$query_Fetch_Bids_Details = $connection->query($sql_Fetch_Bids_Details);
					$bids_Count = mysqli_num_rows($query_Fetch_Bids_Details);
					/**************** GET NUMBER OF REPLIES *******************/

					$row_category = $row["job_Category"];
					include("../scripts/rename_categories.php");

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
									 		"<pre> This job post has expired and will be removed from this section.  </pre>";
						}
					}else{
						echo "<div class='row'>" .
								 "<div class='col-xs-12 col-md-12 col-lg-12'>" .
								 "<div class='jobs_posts'>" ;
					}
					/*********************************************************************/

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

					echo 		"<div class='col-xs-12 col-md-3 col-lg-3 left_column'>" .
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
										"<p>View Student Offers :</p> <br />" .
										"<span class='bid_count'>" .
											"<a href='$location2' id='show_Replies_Btn'>" .
												$bids_Count .
											"</a>" .
										"</span> <br /><i>(select to view)</i>" .
									"</div>" .


						"</div>" .
						"</div>" .
						"</div><br /><br /><br />";


				}

}

}

/******************************************* Paginate Job Posts **********************************************/
	$sql_Fetch_Number_Of_Unreplied_Jobs = " SELECT * FROM jobs_posts
																				  INNER JOIN jobs_bids
																				  ON jobs_posts.job_ID=jobs_bids.job_ID
																				  INNER JOIN clients
																				  ON jobs_posts.client_ID=clients.ID
																				  AND jobs_posts.job_Status='Open'
																				  AND jobs_bids.job_Status<>'Expired'
																					AND jobs_posts.client_ID='$_SESSION[ID]'
																				  ORDER BY job_Title
																				 ";
	$query_Fetch_Number_Of_Unreplied_Jobs = $connection->query($sql_Fetch_Number_Of_Unreplied_Jobs);
	$number_Of_Unreplied_Jobs = mysqli_num_rows($query_Fetch_Number_Of_Unreplied_Jobs);

	$number_of_pages = ceil($number_Of_Unreplied_Jobs / 10);

	echo " <ul class='pagination'> ";
	for( $i=1; $i<=$number_of_pages; $i++ ){
		echo "<li><a href='pages/showJobsForOneClient.php?page_number=$i'> $i </a></li>";
	}
	echo " </ul> ";
/*************************************************************************************************************/


$connection->close();
?>


</div>
</div>

</div>
</div>
<br><br><br>
<?php include("../common/footer.php"); ?>

</body>

</html>
