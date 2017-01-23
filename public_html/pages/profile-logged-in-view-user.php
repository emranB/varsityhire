<?php
$GET_ID = $_GET["ID"];

$sql_Check_User_Accessing_Profile = " SELECT * FROM students
																			UNION
																			SELECT * FROM clients
																			WHERE ID='$_SESSION[ID]' ";
$query_Check_User_Accessing_Profile = $connection->query($sql_Check_User_Accessing_Profile);
if( $query_Check_User_Accessing_Profile ){
	while( $row = $query_Check_User_Accessing_Profile->fetch_assoc() ){
		$chk_Email = $row["Email"];
		$chk_Password = $row["Password"];
		$chk_UserType = $row["UserType"];
	}
}


if( $chk_UserType == "Student" ){
  $sql_Fetch_Target_Profile_Info = " SELECT * FROM clients
	                                  --  INNER JOIN clients_additional_info
	                                  --  ON clients.ID=clients_additional_info.ID
	                                   INNER JOIN jobs_posts
	                                   ON clients.ID=jobs_posts.client_ID
	                                   AND clients.ID='$_GET[ID]' ";

$query_Fetch_Target_Profile_Info = $connection->query($sql_Fetch_Target_Profile_Info);
$fetch_Target_Count_Reviews = mysqli_num_rows($query_Fetch_Target_Profile_Info);
while( $row = $query_Fetch_Target_Profile_Info->fetch_assoc() ){

  $fetch_Target_UserType = $row["UserType"];
  $fetch_Target_Fname = $row["Fname"];
  $fetch_Target_Lname = $row["Lname"];
  $fetch_Target_Email = $row["Email"];
  $fetch_Target_PostalCode = $row["PostalCode"];

  $fetch_Target_job_Category = $row["job_Category"];
  $fetch_Target_job_Status = $row["job_Status"];

}

$sql_Fetch_Target_Profile_Secondary_Info = " SELECT * FROM clients_additional_info WHERE clients_additional_info.ID='$_GET[ID]' ";
$query_Fetch_Target_Profile_Secondary_Info = $connection->query($sql_Fetch_Target_Profile_Secondary_Info);
while( $row = $query_Fetch_Target_Profile_Secondary_Info->fetch_assoc() ){

  $fetch_Target_Phone = $row["Phone"];
  $fetch_Target_AdditionalComments = $row["AdditionalComments"];

}

}
/***********************************************************************************************************/
else if( $chk_UserType == "Client" ){

	$sql_Fetch_Target_Profile_Info = " SELECT * FROM students
                                    --  INNER JOIN students_reviews
                                    --  ON students.ID=students_reviews.student_ID
                                     WHERE students.ID='$GET_ID'
																		 ";
$query_Fetch_Target_Profile_Info = $connection->query($sql_Fetch_Target_Profile_Info);
$fetch_Target_Count_Reviews = mysqli_num_rows($query_Fetch_Target_Profile_Info);
while( $row = $query_Fetch_Target_Profile_Info->fetch_assoc() ){
  $fetch_Target_UserType = $row["UserType"];
  $fetch_Target_Fname = $row["Fname"];
  $fetch_Target_Lname = $row["Lname"];
  $fetch_Target_Email = $row["Email"];
  $fetch_Target_PostalCode = $row["PostalCode"];

 include("review_calculations_view_user_students.php");

}

$sql_Fetch_Target_Profile_Secondary_Info = " SELECT * FROM students_additional_info
																						 INNER JOIN students_skills
																						 ON students_additional_info.ID=students_skills.ID
																						 WHERE students_additional_info.ID='$GET_ID'
																						 ";
$query_Fetch_Target_Profile_Secondary_Info = $connection->query($sql_Fetch_Target_Profile_Secondary_Info);
while( $row = $query_Fetch_Target_Profile_Secondary_Info->fetch_assoc() ){

$fetch_Target_Phone = $row["Phone"];
$fetch_Target_School = $row["School"];
$fetch_Target_Program = $row["Program"];
$fetch_Target_YearGrade = $row["YearGrade"];
$fetch_Target_AdditionalComments = $row["AdditionalComments"];


}

$sql_Fetch_Number_Of_Cancellations = " SELECT * FROM students_reviews WHERE showed_up='No' AND student_ID='$GET_ID' ";
$query_Fetch_Number_Of_Cancellations = $connection->query($sql_Fetch_Number_Of_Cancellations);
$cancellations = mysqli_num_rows($query_Fetch_Number_Of_Cancellations);

}
/***********************************************************************************************************/


?>


  <div class="col-xs-12 col-md-3 col-lg-3">
  	<div class="profileLeftInfo">


  		<div class="row">
  			<div class="upload_user_photo">
          <?php
          function displayimage()
            {
                include("../../password/dbConnect.inc");
                $qry = " SELECT * FROM user_photos WHERE ID='$_GET[ID]' ";
                $result  = $connection->query($qry);
                while( $row = $result->fetch_assoc() )
                {
                    echo '<img src="data:image;base64,'.$row["Photo_Name"].' "> ';
                }
                $connection->close();
            }
          displayimage();
          ?>
  			</div>
  		</div>

  		<div class="primaryProfileInfo">

  			<div class="col-xs-12 col-md-12 col-lg-12">
  				<p class="profile_segment_title">
  				<?php
  					if( $fetch_Target_UserType == "Student" ){ echo "Current School Info"; }
  					else if( $fetch_Target_UserType == "Client" ){ echo "About"; }
  				?>
  				</p>
  			</div>

  				<?php
  				if($fetch_Target_UserType == "Student"){
  					echo "<div class='col-xs-12 col-md-5 col-lg-5 push_right'>Institution:</div>";
  					echo "<div class='col-xs-12 col-md-7 col-lg-7 push_right'>";
  						if( $fetch_Target_School == "" ){
  				 			echo '<i>(not specified)</i>';
  			 			}else if( $fetch_Target_School !== "" ){
  				 			echo $fetch_Target_School;
  			 			}
  					echo "</div>";
  				}
  				?>

  				<?php
  				if($fetch_Target_UserType == "Student"){
  					echo "<div class='col-xs-12 col-md-5 col-lg-5 push_right'>Program:</div>";
  					echo "<div class='col-xs-12 col-md-7 col-lg-7 push_right'>";
  						if( $fetch_Target_Program == "" ){
  				 			echo '<i>(not specified)</i>';
  			 			}else if( $fetch_Target_Program !== "" ){
  				 			echo $fetch_Target_UserType;
  			 			}
  					echo "</div>";
  				}
  				?>

  				<?php
  				if($fetch_Target_UserType == "Student"){
  					echo "<div class='col-xs-12 col-md-5 col-lg-5 push_right'>Year / Grade:</div>";
  					echo "<div class='col-xs-12 col-md-7 col-lg-7 push_right'>";
  						if( $fetch_Target_YearGrade == "" ){
  							echo "<i>(not specified)</i>";
  						}else if( $fetch_Target_UserType !== "" ){
  							echo $fetch_Target_UserType;
  						}
  					echo "</div>";
  				}
  				?>

  				<?php
  					if( $fetch_Target_UserType == "Student" ){
  						echo "<div class='col-xs-12 col-md-12 col-lg-12'>";
  						echo "<br /><p class='profile_segment_title'>About</p>";
  						echo "</div>";
  						echo "<div class='col-xs-12 col-md-12 col-lg-12 push_right'>$fetch_Target_AdditionalComments</div>";
  					}
  				?>

  				<?php
  					if( $fetch_Target_UserType == "Client" ){
  						echo "<div class='col-xs-12 col-md-12 col-lg-12'>";
  						echo "</div>";
  						echo "<div class='col-xs-12 col-md-12 col-lg-12 push_right'>$fetch_Target_AdditionalComments</div>";
  					}
  				?>

  		</div>

  	</div>
  </div>

  <div class="col-xs-12 col-md-9 col-lg-9">
  <div class="profileCenterInfo-Container">
  	<div class="profileCenterInfo">
  	<div class="profileCenterInfo-Inner">

  		<?php
			echo "<div class='title_info'>";
			echo "<h1 class='user_name'> $fetch_Target_Fname $fetch_Target_Lname </h1>";
			echo "<p> <i><b>User Type:</b></i> &nbsp $fetch_Target_UserType </p>";
			echo "<p> <i><b>Current Location:</b></i> $fetch_Target_PostalCode </p>";
			if( $fetch_Target_UserType == "Student" ){
				if( $fetch_Target_Count_Reviews !== "0" ){
					echo "<br /><p style='color:#a0a0a0'> <b> Rating: &nbsp </b> $avg_total_average / 5 &nbsp <span style='font-size:0.8em; color:inherit; letter-spacing:1.5px;'>($fetch_Target_Count_Reviews Review/s)</span> </p>";
	  			echo "<br /><p style='color:#a0a0a0'> <b> Cancellations: &nbsp </b> $cancellations </p>";
				}
  		}
			echo "</div>";
  		?>

			<div class="col-xs-12 col-md-8 col-lg-8">
  		<p class="profile_segment_title">REVIEWS</p>
  		<?php
  			if( $fetch_Target_UserType == "Student" ){

  				/************************ Fetch SQL Data ************************/
  				if( $fetch_Target_Count_Reviews !== "0" ){

						$sql4 =  " SELECT * FROM jobs_posts
													INNER JOIN jobs_bids_details
													ON jobs_posts.job_ID=jobs_bids_details.job_ID
												INNER JOIN students_reviews
													ON jobs_posts.job_ID=students_reviews.job_ID
													AND jobs_bids_details.bid_Status='accepted'
													AND students_reviews.student_ID='$_GET[ID]' ";
						$qry4 = $connection->query($sql4);
						$chk_If_Reviews_Exist = mysqli_num_rows($qry4);

						echo "<div class='review_overall'>";
							echo " $avg_total_timing / 5.0 &nbsp Timeliness <br /> ";
							echo " $avg_total_cleanliness / 5.0 &nbsp Cleanliness <br /> ";
							echo " $avg_total_quality_of_work / 5.0 &nbsp Quality <br /> ";
							echo " $avg_total_knowledge_of_activity / 5.0 &nbsp Subject Knowledge <br /> ";
						echo "</div><hr />";

						if( $chk_If_Reviews_Exist !== 0 ){
							while( $row2 = $qry4->fetch_assoc() ){
								$job_Category= $row2["job_Category"];
								$sql5 =  " SELECT * FROM clients
														INNER JOIN jobs_posts
															ON clients.ID=jobs_posts.Client_ID
														INNER JOIN $job_Category
															ON jobs_posts.job_ID=$job_Category.Job_ID
														INNER JOIN students_reviews
															ON jobs_posts.job_ID=students_reviews.job_ID
															AND students_reviews.student_ID='$_GET[ID]' ";
								$qry5 = $connection->query($sql5);
								$num_rows_reviews_of_specific_job = mysqli_num_rows($qry5);
								// echo $num_rows_reviews_of_specific_job;
								}
								while( $row3 = $qry5->fetch_assoc() ){

									$client_Fname = $row3["Fname"];
									$showed_up = $row3["showed_up"];

									if( $showed_up == "Yes" ){
										$client_review = $row3["average"] . " / 5";
									}else if( $showed_up == "No" ){
										$client_review = "(no show)";
									}

									$date_arr = explode(", ", $row3["Date"]);
									$date = strtotime($date_arr[0]);
									$date_full_format = date("F j, Y", $date);

									$additional_comments = $row3["additional_comments"];

									echo "<div class='review_group_container'>" ;
									echo " <div class='review_group'> " .
												 " <div> <span class='name'> $client_Fname </span> <span class='review'> Review: &nbsp $client_review </span> </div> " .
												 " <div> $date_full_format </div> " .
												 " <div> $additional_comments </div> " .
											 " </div><hr /> ";
									echo " </div> " ;

								}
							}
							else{
								echo "<i>(no reviews to show)</i>";
							}
					}

  			}
  			else if( $fetch_Target_UserType == "Client" ){
  				echo "<i> Coming Soon! </i>";
  			}
  			/*****************************************************************/

  		?>
			</div>


			<div class="col-xs-12 col-md-4 col-lg-4">
				<div class="skills">
				<p class="profile_segment_title">
					<strong>
						<?php
							if( $fetch_Target_UserType == "Client" ){ echo "Past Job Posts"; }
							else if( $fetch_Target_UserType == "Student" ){
								echo "SKILLS LISTED";
								echo "<p> * Students interested in Babysitting, Maid services and Personal
													Tutoring must provide a Report / Grade card </p><hr class='profileHr'/>";
							}
						?>
					</strong>
				</p>
				<div class="skills-inner">
					<?php
						if( $fetch_Target_UserType == "Student" ){
							if( $Skills == "" ){
								echo "<i>(not specified)</i>";
							}else if( $Skills !== "" ){
								echo "$Skills";
							}
						}
						else if( $fetch_Target_UserType == "Client" ){
							echo "<div class='profile_past_jobs'>";

							$sql_Fetch_Client_Job_Categories = " SELECT * FROM jobs_posts WHERE client_ID='$_GET[ID]' AND job_Status='Expired' ";
							$query_Fetch_Client_Job_Categories = $connection->query($sql_Fetch_Client_Job_Categories);
							if( $query_Fetch_Client_Job_Categories ){
								while( $row = $query_Fetch_Client_Job_Categories->fetch_assoc() ){
									$client_jobs_ids = $row["job_ID"];
									$client_jobs_categories = $row["job_Category"];

									$sql_Fetch_Client_Job_Dates = " SELECT * FROM $client_jobs_categories WHERE job_ID='$client_jobs_ids' ";
									$query_Fetch_Client_Job_Dates = $connection->query($sql_Fetch_Client_Job_Dates);
									while( $row2 = $query_Fetch_Client_Job_Dates->fetch_assoc() ){

										$client_jobs_dates = $row2["Date"];
										$dates_array = explode(", ", $client_jobs_dates);
										$date_to_show = $dates_array[0];

										$row_category = $client_jobs_categories;
										include("categories_rename.php");

										echo " <div class='col-xs-12 col-md-7 col-lg-7 title'> " .
														$val_row_category .
												 " </div> " .
												 " <div class='col-xs-12 col-md-5 col-lg-5 date'> " .
												 		$date_to_show .
												 " </div> " ;
									}
								}
							}

							echo "</div>";
						}
					?>
				</div>
				</div>

			</div>


  	</div>
  	</div>
  	</div>

  </div>
