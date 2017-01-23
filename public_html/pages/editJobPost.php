<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$job_ID = $_GET["job_ID"];
$job_Category = $_GET["job_category"];
$job_Title = htmlspecialchars($_GET["job_Title"]);
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle"> <?php echo "edit -- " . strtoupper($job_Title); ?> <hr class="outlineHr" /></h1>

<div class="content">
<div class="content-postJob">


<?php


$sqlShowJobDetailed = " SELECT * FROM " . $job_Category . " WHERE job_ID='$job_ID' ";
$queryShowJobDetailed = $connection->query($sqlShowJobDetailed);

if( $queryShowJobDetailed ){
	$num_rows = mysqli_num_rows($queryShowJobDetailed);

	if( $num_rows == "0" ){
		echo "<hr /><h1>Error: No records found <br> Redirecting . . . . </h1><hr />";
		if( $UserType == "Student" ){
			header("Refresh: 2;url=../pages/showsJobs.php");
		}
		else if( $UserType == "Client" ){
			header("Refresh: 2;url=../pages/showsJobsForOneCient.php");
		}
	}
	else if( $num_rows !== "0" ){
		if( $job_Category == "dog_walking" ){
			while( $row = $queryShowJobDetailed->fetch_assoc() ){

				$Job_ID = $row["Job_ID"];
				$Client_ID = $row["Client_ID"];
				$A1 = $row["A1"];
				$A2 = $row["A2"];
				$A3 = $row["A3"];
				$A4 = $row["A4"];
				$A5 = $row["A5"];
				$A6 = $row["A6"];
				$A7 = $row["A7"];
				$A8 = $row["A8"];
				$A9 = $row["A9"];

				/*echo "Job ID: " . "$Job_ID" . "<br><hr />" .
					 "Client ID: " . "$Client_ID" . "<br><hr />" .
					 "Is this a RECURRING service: " . "$A1" . "<br><hr />" .
					 "How long of a walk would you like your dog(s) to have: " . "$A2" . "<br><hr />" .
					 "Additional comments and description for your appointment: " . "$A3" . "<br><hr />" .
					 "What type of Dog do you own: " . "$A4" . "<br><hr />" .
					 "How old is your dog: " . "$A5" . "<br><hr />" .
					 "Will you provide the equipment required to do the job: " . "$A6" . "<br><hr />" .
					 "Add a description to the equipment you have, or require the Student to bring: " . "$A7" . "<br><hr />" .
					 "Will you provide the materials/supplies (consumables) required to do the job: " . "$A8" . "<br><hr />" .
					 "Add a description to the materials/supplies you have, or require the Student to bring: " . "$A9" . "<br><hr />";
				*/

				if( $_SESSION["Email"] !== "" && $UserType == "Client" ){

					$sqlFetchPrimaryTableInfo = " SELECT * FROM jobs_posts WHERE job_Title='$job_Title' ";
					$queryFetchPrimaryTableInfo = $connection->query($sqlFetchPrimaryTableInfo);
					if( $queryFetchPrimaryTableInfo ){
						while( $row = $queryFetchPrimaryTableInfo->fetch_assoc() ){
							$Job_ID_row = $row["job_ID"];
							$Client_ID_row = $row["client_ID"];
							$Client_Email_row = $row["client_Email"];
							$job_Category_row = $row["job_Category"];
							$Job_Title_row = $row["job_Title"];
							$date_Start_row = htmlspecialchars($row["date_Start"]);
						}
					}
					$sqlFetchSecondaryTableInfo = " SELECT * FROM " . $job_Category . " WHERE job_ID='$job_ID' ";
					$queryFetchSecondaryTableInfo = $connection->query($sqlFetchSecondaryTableInfo);
					if( $queryFetchSecondaryTableInfo ){
						while( $row = $queryFetchSecondaryTableInfo->fetch_assoc() ){
							$A1_row = htmlspecialchars($row["A1"]);
							$A2_row = htmlspecialchars($row["A2"]);
							$A3_row = htmlspecialchars($row["A3"]);
							$A4_row = htmlspecialchars($row["A4"]);
							$A5_row = htmlspecialchars($row["A5"]);
							$A6_row = htmlspecialchars($row["A6"]);
							$A7_row = htmlspecialchars($row["A7"]);
							$A8_row = htmlspecialchars($row["A8"]);
							$A9_row = htmlspecialchars($row["A9"]);
						}
					}

					$location = "scripts/editJobPostProcess.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title";

					echo " <div class='row'> " .
							" <div class='col-xs-12 col-md-12 col-lg-12'> " .
							" <div class='editJobPostForm'> " .
								" <form action='$location' method='post'> " .

								/***************************/
								" <fieldset> " .
									" <legend> " .
										" Is this a RECURRING service? " .
									" </legend> " .
										" <input type='radio' " ?> <?php if($A1_row == "Yes"){ echo "checked"; } ?> <?php echo " name='A1' value='Yes'/><label for='A1'>Yes</label><br> " .
										" <input type='radio' " ?> <?php if($A1_row == "No"){ echo "checked"; } ?> <?php echo " name='A1' value='No'/><label for='A1'>No</label> " .
								" </fieldset><br> " .
								" <fieldset> " .
											" <legend> " .
												" Select Date of Venue " .
											" </legend> " .
												" <input type='date' value='" ?> <?php if($date_Start_row !== ""){ echo $date_Start_row; } ?> <?php echo "' name='date_start' /><br> " .
										" </fieldset><br> " .
								" <fieldset> " .
									" <legend> " .
										" Enter Title: " .
									" </legend> " .
										" <input type='text' value='" ?> <?php if($Job_Title_row !== ""){ echo $Job_Title_row; } ?> <?php echo "' name='job_title'/><br> " .
								" </fieldset><br> " .

										// Step 3
								" <fieldset> " .
									" <legend> " .
										" How long of a walk would you like your dog(s) to have: " .
									" </legend> " .
										" <label for='A2'><input type='radio' " ?> <?php if($A2_row == "Half an Hour"){ echo "checked"; } ?> <?php echo " name='A2' value='Half' /> Half an Hour </label><br> " .
										" <label for='A2'><input type='radio' " ?> <?php if($A2_row == "One Hour"){ echo "checked"; } ?> <?php echo " name='A2' value='One' /> One Hour </label><br> " .
										" <label for='A2'><input type='radio' " ?> <?php if($A2_row == "One and a half hours"){ echo "checked"; } ?> <?php echo " name='A2' value='OneAndHalf' /> One and a half hours </label><br> " .
										" <label for='A2'><input type='radio' " ?> <?php if($A2_row == "Two hours"){ echo "checked"; } ?> <?php echo " name='A2' value='Two' /> Two hours </label><br> " .
										" <label for='A2'><input type='radio' " ?> <?php if($A2_row == "Other"){ echo "checked"; } ?> <?php echo " name='A2' value='Other' /> Other </label><br> " .
								" </fieldset><br> " .
								" <fieldset> " .
									" <legend> " .
										" Additional comments and description for your appointment: " .
									" </legend> " .
										" <textarea name='A3' id='A3'> " ?> <?php if($A3_row !== ""){ echo $A3_row; } ?> <?php echo " </textarea> " .
								" </fieldset><br> " .
								" <fieldset> " .
									" <legend> " .
										" What type of Dog do you own? " .
									" </legend> " .
										" <textarea name='A4' id='A4'> " ?> <?php if($A4_row !== ""){ echo $A4_row; } ?> <?php echo " </textarea> " .
								" </fieldset><br> " .
								" <fieldset> " .
									" <legend> " .
										" How old is your dog? " .
									" </legend> " .
										" <input type='number' name='A5_Years' placeholder='years' /> " .
										" <input type='number' name='A5_Months' placeholder='months' /> " .
								" </fieldset><br> " .

										// Step 4
								" <fieldset> " .
									" <legend> " .
										" Will you provide the equipment required to do the job? " .
									" </legend> " .
										" <label for='A6'><input type='radio' " ?> <?php if($A6_row == "Yes, all of it"){ echo "checked"; } ?> <?php echo " name='A6' value='Yes' /> Yes, all of it </label><br> " .
										" <label for='A6'><input type='radio' " ?> <?php if($A6_row == "No, none of it"){ echo "checked"; } ?> <?php echo " name='A6' value='No' /> No, none of it </label><br> " .
										" <label for='A6'><input type='radio' " ?> <?php if($A6_row == "Some of it"){ echo "checked"; } ?> <?php echo " name='A6' value='Some' /> Some of it </label><br> " .
								" </fieldset><br> " .
								" <fieldset> " .
									" <legend> " .
										" Add a description to the equipment you have, or require the Student to bring: " .
									" </legend> " .
										" <textarea name='A7' id='A7'> " ?> <?php if($A7_row !== ""){ echo $A7_row; } ?> <?php echo " </textarea> " .
								" </fieldset><br> " .
								" <fieldset> " .
									" <legend> " .
										" Will you provide the materials/supplies (consumables) required to do the job? " .
									" </legend> " .
										" <label for='A8'><input type='radio' " ?> <?php if($A8_row == "Yes, all of it"){ echo "checked"; } ?> <?php echo " name='A8' value='Yes' />Yes, all of it</label><br> " .
										" <label for='A8'><input type='radio' " ?> <?php if($A8_row == "No, none of it"){ echo "checked"; } ?> <?php echo " name='A8' value='No' />No, none of it</label><br> " .
										" <label for='A8'><input type='radio' " ?> <?php if($A8_row == "Some of it"){ echo "checked"; } ?> <?php echo " name='A8' value='Some' />Some of it</label><br> " .
								" </fieldset><br> " .
								" <fieldset> " .
									" <legend> " .
										" Add a description to the materials/supplies you have, or require the Student to bring: " .
									" </legend> " .
										" <textarea name='A9' id='A9'> " ?> <?php if($A9_row !== ""){ echo $A7_row; } ?> <?php echo " </textarea> " .
								" </fieldset><br> " .
								" <input type='submit' class='customBtn1' value='UPDATE' /> " .
								/***************************/
								" </form> " .
							" </div> " .
							" </div> " .
						 " </div> ";

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
