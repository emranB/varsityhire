<!-- <div class="col-xs-12 col-md-12 col-lg-12">
<h1 class="pageTitle">
	<strong><?php echo $Name; ?></strong>'s Profile
</h1>
</div> -->



<div class="col-xs-12 col-md-12 col-lg-12">

<?php

	$sql_Check_User_Accessing_Profile = " SELECT * FROM students
																				UNION
																				SELECT * FROM clients
																				WHERE ID='$_SESSION[ID]' ";
	$query_Check_User_Accessing_Profile = $connection->query($sql_Check_User_Accessing_Profile);
	if( $query_Check_User_Accessing_Profile ){
		while( $row = $query_Check_User_Accessing_Profile->fetch_assoc() ){
			$chk_Email = $row["Email"];
			$chk_Password = $row["Password"];
		}
	}
	if( $_SESSION["UserType"] !== "" ){
		echo " <br /><br /><div class='col-xs-12 col-md-3 col-lg-3'> " .
				 		" <a href='pages/editProfile.php' class='profile_page_btn'>Edit Profile</a> " .
				 " </div><br /><br /><br /> ";

				//  " <div class='col-xs-12 col-md-6 col-lg-6'></div> " .
				 //
				//  " <div class='col-xs-12 col-md-3 col-lg-3'> " .
				// 		" <a href='pages/registerStripe.php' class='profile_page_btn'>Handle Payments</a> " .
				//  " </div> "	;
	}
?>


</div>

<br><br><br>

<?php
if( $_SESSION["UserType"] == "Student" ){

	include("review_calculations_student.php");

}
?>

<div class="col-xs-12 col-md-3 col-lg-3">
	<div class="profileLeftInfo">


		<div class="row">
			<div class="upload_user_photo">
        <?php
            if(isset($_POST['sumit']))
            {
                if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
                {
                    echo "Please select an image.";
                }
                else
                {
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $name= addslashes($_FILES['image']['name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                    saveimage($name,$image);
                }
            }
            displayimage();
            function saveimage($name,$image)
            {
								include("../../password/dbConnect.inc");
								$qry_chk = " SELECT * FROM user_photos WHERE ID='$_SESSION[ID]'";
                $result_chk  = $connection->query($qry_chk);
								$num_rows = mysqli_num_rows($result_chk);

								if( $num_rows == 1 ){
									$qry = " UPDATE user_photos
														SET Photo_Name='$image'
														WHERE UserType='$_SESSION[UserType]' AND ID='$_SESSION[ID]' ";
									$result  = $connection->query($qry);
									if($result)
									{
										// echo "<br/>Image uploaded.";
									}
										else
									{
										echo "<br/>Image not uploaded.";
									}
								}
								else if( $num_rows == 0 ){
									$qry = " INSERT INTO user_photos
														SET UserType='$_SESSION[UserType]', ID='$_SESSION[ID]', Photo_Name='$image' ";
	                $result  = $connection->query($qry);
	                if($result)
	                {
	                    // echo "<br/>Image uploaded.";
	                }
	                else
	                {
	                    echo "<br/>Image not uploaded.";
	                }
								}
            }
            function displayimage()
            {
								include("../../password/dbConnect.inc");
                $qry = " SELECT * FROM user_photos WHERE ID='$_SESSION[ID]'";
                $result  = $connection->query($qry);
                while( $row = $result->fetch_assoc() )
                {
                    echo '<img height="300" width="300" src="data:image;base64,'.$row["Photo_Name"].' "> ';
                }
                $connection->close();
            }
        ?>
				<br><br><form method="post" enctype="multipart/form-data">
					<div class="col-xs-12 col-md-7 col-lg-7"><input class="img_upload_btn" type="file" name="image" /></div>
					<div class="col-xs-12 col-md-5 col-lg-5"><input class="img_upload_btn" type="submit" name="sumit" value="Upload Photo" /></div>
				</form><br><hr>
			</div>
		</div>

		<div class="primaryProfileInfo">

			<div class="col-xs-12 col-md-12 col-lg-12">
				<p class="profile_segment_title">
				<?php
					if( $UserType == "Student" ){ echo "Current School Info"; }
					else if( $UserType == "Client" ){ echo "About"; }
				?>
				</p>
			</div>

				<?php
				if($UserType == "Student"){
					echo "<div class='col-xs-12 col-md-5 col-lg-5 push_right'>Institution:</div>";
					echo "<div class='col-xs-12 col-md-7 col-lg-7 push_right'>";
						if( $School == "" ){
				 			echo '<i>(not specified)</i>';
			 			}else if( $School !== "" ){
				 			echo $School;
			 			}
					echo "</div>";
				}
				?>

				<?php
				if($UserType == "Student"){
					echo "<div class='col-xs-12 col-md-5 col-lg-5 push_right'>Program:</div>";
					echo "<div class='col-xs-12 col-md-7 col-lg-7 push_right'>";
						if( $Program == "" ){
				 			echo '<i>(not specified)</i>';
			 			}else if( $Program !== "" ){
				 			echo $Program;
			 			}
					echo "</div>";
				}
				?>

				<?php
				if($UserType == "Student"){
					echo "<div class='col-xs-12 col-md-5 col-lg-5 push_right'>Year / Grade:</div>";
					echo "<div class='col-xs-12 col-md-7 col-lg-7 push_right'>";
						if( $YearGrade == "" ){
							echo "<i>(not specified)</i>";
						}else if( $YearGrade !== "" ){
							echo $YearGrade;
						}
					echo "</div>";
				}
				?>

				<?php
					if( $UserType == "Student" ){

						$sql_Fetch_Student_ID_Status = " SELECT * FROM student_id_card WHERE ID='$_SESSION[ID]' ";
						$query_Fetch_Student_ID_Status = $connection->query($sql_Fetch_Student_ID_Status);
						if($query_Fetch_Student_ID_Status){
							while( $row = $query_Fetch_Student_ID_Status->fetch_assoc() ){
								$Student_ID_Status = strtoupper($row["student_ID_card_status"]);
							}
						}
						if( $Student_ID_Status == "VERIFIED" ){
							$val_Status = "<span style='margin-left: 25%; color: #a5ffce;' class='el el-ok-circle'> $Student_ID_Status</span>";
						}else if( $Student_ID_Status == "PENDING" ){
							$val_Status = "<span style='margin-left: 25%; color: red;' class='el el-error-alt'> $Student_ID_Status</span>";
						}

						echo "<div class='col-xs-12 col-md-12 col-lg-12'>";
						echo "<br /><p class='profile_segment_title'>About</p>";
						echo "</div>";
						echo "<div class='col-xs-12 col-md-12 col-lg-12 push_right'>$AdditionalComments</div>";

						echo "<div class='col-xs-12 col-md-12 col-lg-12'>";
						echo "<br /><p class='profile_segment_title'>Handle Student ID</p>";
						echo "</div>";

						function displayID()
						{
								include("../../password/dbConnect.inc");
								$qry = " SELECT * FROM student_id_card WHERE ID='$_SESSION[ID]'";
								$result  = $connection->query($qry);
								$num_rows_result = mysqli_num_rows($result);
								if($num_rows_result > 0){
									while( $row = $result->fetch_assoc() )
									{
											echo '<br /><br /><img height="150" width="150" src="data:image;base64,'.$row["Photo_Name"].' "> <br /><br />';
									}
								}else{
									echo "<i>(No ID's provided)</i>";
								}

								$connection->close();
						}
						displayID();

						echo "<div class='col-xs-12 col-md-12 col-lg-12 push_right'>" .
										"ID Status: <span>$val_Status</span> " .
										"<form method='post' action='scripts/process_student_ID_card_upload.php' enctype='multipart/form-data'>" .
										"<br /><div class='col-xs-12 col-md-7 col-lg-7'><input class='img_upload_btn' type='file' name='image' /></div>" .
										"<div class='col-xs-12 col-md-5 col-lg-5'><input class='img_upload_btn' type='submit' name='sumit' value='Upload Student ID' /></div>" .
										"</form>" .
										"<br><hr>".
								 "</div>";




					}
				?>

				<?php
					if( $UserType == "Client" ){
						echo "<div class='col-xs-12 col-md-12 col-lg-12'>";
						echo "</div>";
						echo "<div class='col-xs-12 col-md-12 col-lg-12 push_right'>$AdditionalComments</div>";
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
		echo "<h1 class='user_name'> $_SESSION[Fname] $_SESSION[Lname] </h1>";
		echo "<p> <i><b>User Type:</b></i> &nbsp $_SESSION[UserType] </p>";
		echo "<p> <i><b>Current Location:</b></i> $_SESSION[PostalCode] </p>";
		if( $_SESSION["UserType"] == "Student" ){
			if( $count_reviews !== "0" ){
				echo "<br /><p style='color:#a0a0a0'> <b> Rating: &nbsp </b> $avg_total_average / 5 &nbsp <span style='font-size:0.8em; color:inherit; letter-spacing:1.5px;'>($count_reviews Review/s)</span> </p>";
				echo "<br /><p style='color:#a0a0a0'> <b> Cancellations: &nbsp </b> $cancellations </p>";
			}
		}
		echo "</div>";
		?>

		<div class="col-xs-12 col-md-8 col-lg-8">
		<p class="profile_segment_title">REVIEWS</p>
		<?php
			if( $_SESSION["UserType"] == "Student" ){

					$sql4 =  " SELECT * FROM jobs_posts
												INNER JOIN jobs_bids_details
												ON jobs_posts.job_ID=jobs_bids_details.job_ID
											INNER JOIN students_reviews
												ON jobs_posts.job_ID=students_reviews.job_ID
												AND jobs_bids_details.bid_Status='accepted'
												AND students_reviews.student_ID='$_SESSION[ID]' ";
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
														AND students_reviews.student_ID='$_SESSION[ID]' ";
							$qry5 = $connection->query($sql5);
							$num_rows_reviews_of_specific_job = mysqli_num_rows($qry5);
							/****************************************************************/
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
			else if( $_SESSION["UserType"] == "Client" ){
				echo "<i> Coming Soon! </i>";
			}

		?>
		</div>


		<div class="col-xs-12 col-md-4 col-lg-4">
			<div class="skills">
			<p class="profile_segment_title">
				<strong>
					<?php
						if( $_SESSION["UserType"] == "Client" ){ echo "Past Job Posts"; }
						else if( $_SESSION["UserType"] == "Student" ){
							echo "SKILLS LISTED";
							echo "<p> * Students interested in Babysitting, Maid services and Personal
												Tutoring must provide a Report / Grade card </p><hr class='profileHr'/>";
						}
					?>
				</strong>
			</p>
			<div class="skills-inner">
				<?php
					if( $_SESSION["UserType"] == "Student" ){
						if( $Skills == "" ){
							echo "<i>(not specified)</i>";
						}else if( $Skills !== "" ){
							echo "$Skills";
						}
					}
					else if( $_SESSION["UserType"] == "Client" ){
						echo "<div class='profile_past_jobs'>";

						$sql_Fetch_Client_Job_Categories = " SELECT * FROM jobs_posts WHERE client_ID='$_SESSION[ID]' AND job_Status='Expired' ";
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

									$Job_category_temporary = $row2["Job_category_temporary"];
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
