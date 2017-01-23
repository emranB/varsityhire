<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>
<?php
  $Ref = parse_url($_SERVER['HTTP_REFERER']);
  $Referer = basename($Ref["path"]);
  // echo $Referer;
?>


<body>

<?php
include("../common/navigation.php");
$job_ID = $_GET["job_ID"];
$job_Category = $_GET["job_category"];
$job_Title = htmlspecialchars($_GET["job_Title"]);
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<div class="row"><h1 class="pageTitle"> <?php echo strtoupper($job_Title); ?> </h1></div>

<div class="content">
<div class="content-postJob">


<?php


$sqlShowJobDetailed = " SELECT * FROM $job_Category WHERE job_ID='$job_ID' ";
$queryShowJobDetailed = $connection->query($sqlShowJobDetailed);

if( $queryShowJobDetailed ){
	$num_rows = mysqli_num_rows($queryShowJobDetailed);

	if( $num_rows == "0" ){
		echo "<hr /><h1> Error: No records found <br> Redirecting . . . . </h1><hr />";
		if( $UserType == "Student" ){
			header("Refresh: 2;url=../pages/showJobs.php");
		}
		else if( $UserType == "Client" ){
			// header("Refresh: 2;url=../pages/showJobsForOneClient.php");
		}
	}
	else if( $num_rows !== "0" ){
		if( $job_Category == "dog_walking" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$address = $row["PostalCode"];
				$time = $row["Time"];

				echo "<div class='job_details'>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How long of a walk would you like your dog(s) to have: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What type of Dog do you own: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How old is your dog: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
 						"<div class='col-xs-12 col-md-4 col-lg-4'>$address</div>" . "</div>" .
 					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
 						"<div class='col-xs-12 col-md-4 col-lg-4'>$time</div>" . "</div>" .
					 "</div>";


				$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
				$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
				while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
					$originalPoster = $row["client_Email"];
					$status = $row["job_Status"];
				}

				$sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				$query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
					$bid_Student_ID = $row["bid_Student_ID"];
				}

				$sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				$query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
					$stripe_user_id = $row["stripe_user_id"];
				}

				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
			  else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster or a student to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "exterior_window_washing" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
						"<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue </div>" .
 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many exterior windows and/or doors in your residence to be cleaned: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What percent (%) of your windows will require a ladder or work at heights: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is the average size of your windows: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
						"<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div>" .
					 "</div>";

				$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
				$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
				while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
					$originalPoster = $row["client_Email"];
					$status = $row["job_Status"];
				}

				$sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				$query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
					$bid_Student_ID = $row["bid_Student_ID"];
				}

				$sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				$query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
					$stripe_user_id = $row["stripe_user_id"];
				}

				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "delivery" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$A10 = $row["A10"];
				$A11 = $row["A11"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
							"<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Starting Date: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What type of items do you have to deliver: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>";

				if( $A1 == "to_specific_address" ){
					echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Describe the type of items you want to have delivered: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many items do you have to be delivered: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How do you want the items to be delivered: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Enter the addresses that the items should be delivered to: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" ;
				}
				else if( $A1 == "to_set_areas" ){
					echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Describe the type of items you want to have delivered: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many items do you have to be delivered: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How do you want the items to be delivered: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Enter the areas or communities that the items should be delivered to: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" ;
				}

				echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A10</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A11</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div>" .
						 "</div>";

				$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
				$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
				while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
					$originalPoster = $row["client_Email"];
					$status = $row["job_Status"];
				}

				$sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				$query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
					$bid_Student_ID = $row["bid_Student_ID"];
				}

				$sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				$query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
					$stripe_user_id = $row["stripe_user_id"];
				}

				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "garage_shop_shed_cleaning" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$A10 = $row["A10"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
							"<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Subservices selected: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>";

				if( $A1 == "garbage_clean_up" ){
					echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the floor area of the space to be cleaned: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How much garbage is in the space that needs to be cleaned out: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Where is the garbage going: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How do you want the items to be delivered: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>";

								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
					 						"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
					 					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
					 						"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A10</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div>" .
										 "</div>";
				}
				else if( $A1 == "organize_and_put_away_items" ){
					echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the floor area of the space to be cleaned: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How much cluster and misplaced items are in the space: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Is there heavy lifting involved (over 50 lbs): </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>";

								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
					 						"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
					 					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
					 						"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div>";
										 "</div>";
				}
				else if( $A1 == "other" ){
					echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What type of items do you have to deliver: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Describe the scope, details, and size/quantity of the service you would like: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the number of hours that this service will take: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>";

								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
					 						"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
					 					 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
					 						"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div>";
										 "</div>";
				}

					$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
					$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
					while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
						$originalPoster = $row["client_Email"];
						$status = $row["job_Status"];
				 }
				 $sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				 $query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				 while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
				 		$bid_Student_ID = $row["bid_Student_ID"];
				 }

				 $sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				 $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				 while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
				 		$stripe_user_id = $row["stripe_user_id"];
				 }

				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "gutter_cleaning" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is the total floor area of your residence: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many stories high (above-ground) is your residence: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the total length of gutters: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How long has it been since your last gutter cleanout: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div>" .
						 "</div>";

				 $sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
				 $queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
				 while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
				 		$originalPoster = $row["client_Email"];
				 		$status = $row["job_Status"];
				 }

				 $sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				 $query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				 while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
				 		$bid_Student_ID = $row["bid_Student_ID"];
				 }

				 $sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				 $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				 while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
				 		$stripe_user_id = $row["stripe_user_id"];
				 }


				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "house_cleaning" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1_arr = explode(', ', $row["A1"]);
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$A10 = $row["A10"];
				$A11 = $row["A11"];
				$A12 = $row["A12"];
				$A13 = $row["A13"];
				$A14 = $row["A14"];
				$A15 = $row["A15"];
				$A16 = $row["A16"];
				$A17 = $row["A17"];
				$A18 = $row["A18"];
				$A19 = $row["A19"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What areas of your house apply: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>".
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What type of residence are you in: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is the total floor area of your residence: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What percent of the floor area is carpet: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many stories in your residence: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Do you have any cleaning product preferences: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Do you own pets that shed: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>";

				if( in_array('bedrooms_and_living_area', $A1_arr )  ){
					echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many bedrooms in your residence: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many living rooms in your residence: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>";
				}
				if( in_array('bathrooms', $A1_arr )  ){
					echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many bathrooms in your residence: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A10</div>" . "</div>";
				}
				if( in_array('kitchens', $A1_arr )  ){
					echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>KITCHENS </h1> <br> How many kitchens in your residence: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A11</div>" . "</div>";
				}
				if( in_array('laundry_package', $A1_arr )  ){
					echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many total loads of laundry do you estimate (including separating whites): </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A12</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Describe the type and number of items you would like washed and dried. Specify anything that must be air-dried (not be put in dryer). Specify the types and number of items you would like ironed: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A13</div>" . "</div>" ;
				}
				if( in_array('deep_cleaning_package', $A1_arr )  ){
					echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>ow many windows and doors in your residence: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A14</div>" . "</div>" .
							 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is the average size of your windows: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A15</div>" . "</div>" ;
				}

				 echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
							 "<div class='col-xs-12 col-md-4 col-lg-4'>$A16</div>" . "</div>" .
							"<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A17</div>" . "</div>" .
							"<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
								"<div class='col-xs-12 col-md-4 col-lg-4'>$A18</div>" . "</div>" .
							"<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
							 "<div class='col-xs-12 col-md-4 col-lg-4'>$A19</div>" . "</div>" .
							"<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
							 "<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
							"<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
							 "<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div>" .
							"</div>";

				 $sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
				 $queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
				 while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
				 	 $originalPoster = $row["client_Email"];
				 	 $status = $row["job_Status"];
				 }

				 $sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				 $query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				 while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
				 	$bid_Student_ID = $row["bid_Student_ID"];
				 }

				 $sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				 $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				 while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
				 	$stripe_user_id = $row["stripe_user_id"];
				 }


				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "international_languages" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Select your age group: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>".
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What languages can you currently speak/write: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is your current proficiency in the language you would like to learn: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What are you interested in (select all that apply): </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment (specific areas of focus, location details, books or materials to be used, special needs, etc.): </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div></div>";

					$sqlMakeEditableOnlyByOriginalPoster = " SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
					$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
					while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
						$originalPoster = $row["client_Email"];
						$status = $row["job_Status"];
				 }

				 $sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				 $query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				 while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
				 	$bid_Student_ID = $row["bid_Student_ID"];
				 }

				 $sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				 $query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				 while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
				  $bid_Student_ID = $row["bid_Student_ID"];
				 }

				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "landscaping" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$A10 = $row["A10"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Subservices selected: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>".
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Describe the scope of work: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Describe the quantity, size, or scale of the work: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many hours do you require assistance for: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Are there any special working conditions (ex: working at heights, heavy lifting, wet areas, etc: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A10</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div></div>";

			 	$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
			 	$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
		 		while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
			 		$originalPoster = $row["client_Email"];
			 		$status = $row["job_Status"];
			  }

				$sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				$query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
					$bid_Student_ID = $row["bid_Student_ID"];
				}

				$sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				$query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
					$stripe_user_id = $row["stripe_user_id"];
				}


				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "moving" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will this service require the student to bring a vehicle: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>".
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Is there heavy lifting involved (over 50 lbs): </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many hours do you require assistance for: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div></div>";

					$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
					$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
					while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
						$originalPoster = $row["client_Email"];
						$status = $row["job_Status"];
				 }
				 $sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				 $query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				 while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
				 	$bid_Student_ID = $row["bid_Student_ID"];
				 }

				 $sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				 $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				 while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
				 	$stripe_user_id = $row["stripe_user_id"];
				 }


				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "music_lessons" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is your current proficiency with this instrument or musical activity: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>".
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment (styles and genres, personal goals, room setup, other details): </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div></div>";

					$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
					$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
					while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
						$originalPoster = $row["client_Email"];
						$status = $row["job_Status"];
					}

					$sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
					$query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
					while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
						$bid_Student_ID = $row["bid_Student_ID"];
					}
					$sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
					$query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
					while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
						$stripe_user_id = $row["stripe_user_id"];
					}


				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "outdoor_seasonal_decorations" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1_arr = explode(',', $row["A1"]);
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$A10 = $row["A10"];
				$A11 = $row["A11"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Outdoor Seasonal Activities Subservices (select all that apply): </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>".
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is the total floor area of your residence: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many stories high (above-ground) is your residence: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many hours do you require assistance for: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>";

						if( in_array('install_decorations', $A1_arr )  ){
							echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Describe the type and amount (length, number of items) of decorations and/or lights that need to be taken down: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>";
						}
						if( in_array('take_down_decorations', $A1_arr )  ){
							echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the area of the patio stones and/or walkways to be washed: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>";
						}

				echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A10</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A11</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div></div>";

					$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
					$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
					while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
						$originalPoster = $row["client_Email"];
						$status = $row["job_Status"];
				 }
				 $sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				 $query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				 while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
				 	$bid_Student_ID = $row["bid_Student_ID"];
				 }

				 $sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				 $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				 while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
				 	$stripe_user_id = $row["stripe_user_id"];
				 }


				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "pressure_washing" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1_arr = explode(',', $row["A1"]);
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$A10 = $row["A10"];
				$A11 = $row["A11"];
				$A12 = $row["A12"];
				$A13 = $row["A13"];
				$A14 = $row["A14"];
				$A15 = $row["A15"];
				$A16 = $row["A16"];
				$A17 = $row["A17"];
				$A18 = $row["A18"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Pressure Washing Subservices (select all that apply): </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>";

						if( in_array('patio_stone_and_walkways', $A1_arr )  ){
							echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the area of the patio stones and/or walkways to be washed: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>";
						}
						if( in_array('driveways', $A1_arr )  ){
							echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the area of your driveway: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>";
						}
						if( in_array('exterior_walls', $A1_arr )  ){
							echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What type of structure/residence do you want washed: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
						       "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is the total length (all sides added together) of your structure/residence: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
									 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many stories high (above-ground) is your structure: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>";
						}
						if( in_array('deck_surfaces', $A1_arr )  ){
							echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the total area(s) of your deck surfaces: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>";
						}
						if( in_array('fences', $A1_arr )  ){
							echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is the total length (all sections added together) of your fence: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
									 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is the average above-ground height of your fence: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
									 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Do you require one or both side of the fence to be washed: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A10</div>" . "</div>";
						}
						if( in_array('other', $A1_arr )  ){
							echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Describe the surfaces or items that you would like washed: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A11</div>" . "</div>" .
									 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the total area(s) of the surfaces to be washed: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A12</div>" . "</div>" .
									 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the number of hours that this service will take: </div>" .
										"<div class='col-xs-12 col-md-4 col-lg-4'>$A13</div>" . "</div>";
						}

				echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A14</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A15</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A16</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A17</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A18</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div></div>";

					$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
					$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
					while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
						$originalPoster = $row["client_Email"];
						$status = $row["job_Status"];
				 }
				 $sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				 $query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				 while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
				 	$bid_Student_ID = $row["bid_Student_ID"];
				 }

				 $sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				 $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				 while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
				 	$stripe_user_id = $row["stripe_user_id"];
				 }


				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "private_event_assistance" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$A10 = $row["A10"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Subservices selected: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What type of event will you be hosting: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many guests do you anticipate to have at the event: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many hours do you require assistance for: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Describe the duties and tasks you would like assistance with: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A10</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div></div>";

				$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
				$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
				while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
					$originalPoster = $row["client_Email"];
					$status = $row["job_Status"];
				}

				$sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				$query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
					$bid_Student_ID = $row["bid_Student_ID"];
				}

				$sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				$query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
					$stripe_user_id = $row["stripe_user_id"];
				}


				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["Email"] !== "" && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "rv_boat_cleaning" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$A10 = $row["A10"];
				$A11 = $row["A11"];
				$A12 = $row["A12"];
				$A13 = $row["A13"];
				$A14 = $row["A14"];
				$A15 = $row["A15"];
				$A16 = $row["A16"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>RV and Boat Cleaning Subservices (select all that apply): </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What type of recreational vehicle/pleasure-craft do you own: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is the length of your vehicle/pleasure-craft: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" ;

							if( in_array('interior_quick_cleanup_package', $A1_arr )  ){
								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Which of the following amenities does your vehicle/pleasure-craft have: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What percent of the floor area is carpet: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is the current state of the interior space: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>";
							}
							if( in_array('interior_full_cleaning_package', $A1_arr )  ){
								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Which of the following amenities does your vehicle/pleasure-craft have: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What percent of the floor area is carpet: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is the current state of the interior space: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>";
							}
							if( in_array('othe_rv_boat_cleaning', $A1_arr )  ){
								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Describe what you would like cleaned and/or washed: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A10</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the number of hours that this service will take: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A11</div>" ;
							}

				echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A12</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A13</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A14</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A15</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A16</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div></div>";

					$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
					$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
					while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
						$originalPoster = $row["client_Email"];
						$status = $row["job_Status"];
				 }

				 $sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				 $query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				 while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
					 $bid_Student_ID = $row["bid_Student_ID"];
				 }

				$sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				$query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
					$stripe_user_id = $row["stripe_user_id"];
				}

				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "painting" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1 = $row["A1"];

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Subservices selected: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>" ;

							if( $A1 == "interior"  ){
								$A2 = $row["A2"];
								$A3 = $row["A3"];
								$A4 = $row["A4"];
								$A5 = $row["A5"];
								$A6 = $row["A6"];
								$A7 = $row["A7"];
								$A8 = $row["A8"];
								$A9 = $row["A9"];
								$A10 = $row["A10"];
								$A11 = $row["A11"];
								$A12 = $row["A12"];
								$A13 = $row["A13"];
								$A14 = $row["A14"];
								$Address = $row["PostalCode"];
								$Time = $row["Time"];

								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What spaces do you need painted: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What surfaces do you need painted: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is the approx sq footage of the area to be painted: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
								 		 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How high is your ceiling: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many coats of paint do you require: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What kind of painting do you want done: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
								 		 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Does the room need to be prepped for painting or will everything be in place: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the number of hours that this service will take: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A10</div>" . "</div>" .
								 		 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A11</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A12</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A13</div>" . "</div>" .
								 		 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A14</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div></div>" ;
							}
							else if( $A1 == "exterior"  ){
								$A2 = $row["A2"];
								$A3 = $row["A3"];
								$A4 = $row["A4"];
								$A5 = $row["A5"];
								$A6 = $row["A6"];
								$A7 = $row["A7"];
								$A8 = $row["A8"];
								$A9 = $row["A9"];
								$A10 = $row["A10"];
								$A11 = $row["A11"];
								$A12 = $row["A12"];
								$A13 = $row["A13"];
								$A14 = $row["A14"];
								$Address = $row["PostalCode"];
								$Time = $row["Time"];

								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What type of residence are you in: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How many stories high (above-ground) is your structure: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What is the approx square footage of the house: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
								 		 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What percent (%) of the surface area will require to be painted: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What would you like painted (All walls, shutters, trim, facias): </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What kind of shape are the current walls in: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
								 		 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What type of exterior do you have: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the number of hours that this service will take: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A10</div>" . "</div>" .
								 		 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A11</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A12</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A13</div>" . "</div>" .
								 		 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A14</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div></div>" ;
							}

					$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
					$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
					while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
						$originalPoster = $row["client_Email"];
						$status = $row["job_Status"];
				 }
				 $sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				 $query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				 while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
				 	$bid_Student_ID = $row["bid_Student_ID"];
				 }

				 $sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				 $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				 while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
				 	$stripe_user_id = $row["stripe_user_id"];
				 }


				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "snow_removal" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1_arr = explode(',', $row["A1"]);
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$A10 = $row["A10"];
				$A11 = $row["A11"];
				$A12 = $row["A12"];
				$A13 = $row["A13"];
				$A14 = $row["A14"];
				$A15 = $row["A15"];
				$A16 = $row["A16"];
				$A17 = $row["A17"];
				$A18 = $row["A18"];
				$A19 = $row["A19"];
				$A20 = $row["A20"];
				$A21 = $row["A21"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];


				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Subservices selected: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>" ;

							if( in_array('shovel_driveway', $A1_arr )  ){
								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the area of your driveway: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the average depth of snow: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>How steep is the surface you need plowed: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" ;
							}
							if( in_array('gravel_salt_driveway', $A1_arr )  ){
								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the area of your driveway: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" ;
							}
							if( in_array('shovel_walkways', $A1_arr )  ){
								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the area of your walkways: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the average depth of snow: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" ;
							}
							if( in_array('gravel_salt_walkways', $A1_arr )  ){
								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the area of your walkways: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" ;
							}
							if( in_array('shovel_sidewalk', $A1_arr )  ){
								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the area of your walkways: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the average depth of snow: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A10</div>" ;
							}
							if( in_array('gravel_salt_sidewalk', $A1_arr )  ){
								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the area of your walkways: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A11</div>" ;
							}
							if( in_array('shovel_patios_and_decks', $A1_arr )  ){
								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the area of your walkways: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A12</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the average depth of snow: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A13</div>" ;
							}
							if( in_array('gravel_salt_patios_and_decks', $A1_arr )  ){
								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the area of your walkways: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A14</div>" ;
							}
							if( in_array('break_and_remove_surface_ice_build_up', $A1_arr )  ){
								echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the area of your walkways: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A15</div>" .
										 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Estimate the average depth of snow: </div>" .
											"<div class='col-xs-12 col-md-4 col-lg-4'>$A16</div>" ;
							}

				echo "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A17</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A18</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A19</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A20</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A21</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div></div>";

					$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
					$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
					while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
						$originalPoster = $row["client_Email"];
						$status = $row["job_Status"];
				 }
				 $sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				 $query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				 while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
				 	$bid_Student_ID = $row["bid_Student_ID"];
				 }

				 $sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				 $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				 while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
				 	$stripe_user_id = $row["stripe_user_id"];
				 }


				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "tutoring" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Select your education level: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What topic would you like assistance with: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What level/grade are you studying: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What are your objectives for the sessions: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment (specific areas of focus, location details, books or materials to be used, special needs, etc.): </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div></div>";

					$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
					$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
					while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
						$originalPoster = $row["client_Email"];
						$status = $row["job_Status"];
				 }
				 $sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				 $query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				 while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
				 	$bid_Student_ID = $row["bid_Student_ID"];
				 }

				 $sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				 $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				 while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
				 	$stripe_user_id = $row["stripe_user_id"];
				 }


				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "vehicle_care" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Date = $row["Date"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];
				$Address = $row["PostalCode"];
				$Time = $row["Time"];

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Date(s) of venue: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'>$Date</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Subservices selected: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A1</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>What type of vehicle do you own: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A2</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Where will your vehicle be located: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A3</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Select the Services you would like competed on this Vehicle: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'>$A4</div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Additional comments and description for your appointment (specific areas of focus, location details, books or materials to be used, special needs, etc.): </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A5</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the equipment required to do the job: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A6</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the equipment you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A7</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Will you provide the materials/supplies (consumables) required to do the job? </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A8</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Add a description to the materials/supplies you have, or require the Student to bring: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$A9</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Location of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Address</div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'>Time of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'>$Time</div>" . "</div></div>";

					$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
					$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
					while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
						$originalPoster = $row["client_Email"];
						$status = $row["job_Status"];
			   }

				 $sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				 $query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				 while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
				 	$bid_Student_ID = $row["bid_Student_ID"];
				 }

				 $sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = "SELECT * FROM students WHERE ID='$_SESSION[ID]' ";
				 $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
				 while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
				 	$stripe_user_id = $row["stripe_user_id"];
				 }


				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre>You have an existing bid on this post and may not bid again . . . .</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
		else if( $job_Category == "other" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){
				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$Job_category_temporary = $row["Job_category_temporary"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$Date = $row["Date"];
				$Frequency_Of_Recurring_Dates = $row["Frequency_Of_Recurring_Dates"];
				$Time = $row["Time"];
				$A7 = $row["A7"];
				$Address = $row["Address"];
				$PostalCode = strtoupper($row["PostalCode"]);

				/****************************************************************************/
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
				/****************************************************************************/

				echo "<div class='job_details'>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'> Job Category: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'> $val_row_category </div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'> Get creative, post any task, be as specific as possible: </div>" .
	 						"<div class='col-xs-12 col-md-4 col-lg-4'> $A1 </div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'> How many hours do you require assistance for: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'> $A2 </div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'> Will you provide the equipment/materials required to do the job: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'> $A3 </div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'> Add a description to the equipment required to do the job: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'> $A4 </div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'> Date(s) of venue: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'> $Date </div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'> Frequency of service required: </div>" .
							"<div class='col-xs-12 col-md-4 col-lg-4'> $Frequency_Of_Recurring_Dates </div>" . "</div>" .
						 "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'> Time of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'> $Time </div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'> Are you flexible with your date and time: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'> $A7 </div>" . "</div>" .
					   "<div class='row'><div class='col-xs-12 col-md-8 col-lg-8'> Location of service: </div>" .
						  "<div class='col-xs-12 col-md-4 col-lg-4'> $PostalCode </div>" . "</div>" .
						 "</div>" ;

					$sqlMakeEditableOnlyByOriginalPoster = "SELECT * FROM jobs_posts WHERE client_ID='$Client_ID' ";
					$queryMakeEditableOnlyByOriginalPoster = $connection->query($sqlMakeEditableOnlyByOriginalPoster);
					while( $row = $queryMakeEditableOnlyByOriginalPoster->fetch_assoc() ){
						$originalPoster = $row["client_Email"];
						$status = $row["job_Status"];
				 }

				$sql_Prevent_Student_From_Bidding_Twice = "SELECT * FROM jobs_bids_details WHERE job_ID='$Job_ID' ";
				$query_Prevent_Student_From_Bidding_Twice = $connection->query($sql_Prevent_Student_From_Bidding_Twice);
				while( $row = $query_Prevent_Student_From_Bidding_Twice->fetch_assoc() ){
					$bid_Student_ID = $row["bid_Student_ID"];
				}

				$sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = " SELECT * FROM students
                                                                         INNER JOIN student_id_card
                                                                         ON students.ID=student_id_card.ID
                                                                         AND students.ID='$_SESSION[ID]' ";
				$query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe = $connection->query($sql_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe);
      	while( $row = $query_Prevent_Student_From_Bidding_If_Not_Connected_To_Stripe->fetch_assoc() ){
					$student_ID_card_status = $row["student_ID_card_status"];
					$stripe_user_id = $row["stripe_user_id"];
				}

				echo "<br /><br />";
				if( $status == "Scheduled" ){
					echo "<hr /><h1>This Job post has been closed for bidding . . . . </h1><hr />";
				}
				else if( $Referer == "history.php" ){

				}
				else if( $_SESSION["Email"] !== "" && $_SESSION["Email"] == $originalPoster && $UserType == "Client" ){
					// $location = "pages/editJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					$location = "pages/cancel_job_post.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>CANCEL POST</a>";
				}
				// else if( $_SESSION["ID"] !== "" && $stripe_user_id == "" && $UserType == "Student" ){
				// 	echo "<pre>Stripe ID not found. Please go to your profile and explore HANDLE PAYMENTS to start bidding . . . .</pre>";
				// }
				else if( $_SESSION["ID"] !== "" && $UserType == "Student" && $student_ID_card_status == "pending" ){
					echo "<pre> Your STUDENT ID CARD must be verified by an admin, to bid on this job post </pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $bid_Student_ID && $UserType == "Student" ){
					echo "<pre> You have a previous or an existing bid on this post and may not bid again . . . . <br /> If you cancel this offer (from the PENDING OFFERS tab) you will not be able to make an offer on the same job posting again</pre>";
				}
				else if( $_SESSION["ID"] !== "" && $_SESSION["ID"] !== $bid_Student_ID && $UserType == "Student" && $student_ID_card_status == "verified" ){
					$location = "pages/replyToJobPost.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";
					echo "<a href='$location' class='customBtn1'>PLACE YOUR BID</a>";
				}
				else{
					echo "<pre>You must be logged in as the original poster to perform operations on this post . . . .</pre>";
				}

			}
		}
	}

}



?>


</div>
</div>

</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
