<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$job_ID = $_GET["job_ID"];
$job_Category = $_GET["job_category"];
$job_Title = $_GET["job_Title"];
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle"> Bid on: <?php echo strtoupper($job_Title); ?> <hr class="outlineHr" /></h1>

<div class="content">
<div class="content-replyToJobPost">


<?php
$sqlFetchJobDetails = " SELECT * FROM jobs_posts
												INNER JOIN $job_Category
												ON jobs_posts.job_ID=$job_Category.job_ID
												AND jobs_posts.job_ID='$job_ID' ";
$queryFetchJobDetails = $connection->query($sqlFetchJobDetails);
if( $queryFetchJobDetails ){
	while( $row = $queryFetchJobDetails->fetch_assoc() ){
		$Job_ID = $row["job_ID"];
		$Client_ID = $row["client_ID"];
		$Client_Email = $row["client_Email"];
		$Job_Category = $row["job_Category"];
		$Job_Title = $row["job_Title"];
		$Date = $row["Date"];
		$PostalCode = $row["PostalCode"];
		$Time = $row["Time"];
	}

	$sql_Fetch_Category_Name = " SELECT Job_category_temporary FROM other WHERE Job_ID='$Job_ID' ";
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

	echo "<div class='bidItem'>" .
		 "<div class='row'>" .
		 "<div class='col-xs-12 col-md-4 col-lg-4'>" .
			"<span question-top'>Job Category: </span>" . "<br>" . "<span class='value'>$val_row_category</span>" .
		 "</div>" .
		 "<div class='col-xs-12 col-md-8 col-lg-8'>" .
			"<span class='question-top'>Job Title: </span>" . "<br>" . "<span class='value'>$Job_Title</span>" .
		 "</div>" .
		 "</div>" .
		 "<div class='row'>" .
		 "<div class='col-xs-12 col-md-4 col-lg-4'>" .
			"<button id='bidBtn' class='bidBtn'>Make An Offer</button>" .
		 "</div>" .
		 "<div class='col-xs-12 col-md-8 col-lg-8'>" .
		  "<span class='col-xs-12 col-md-4 col-lg-4 question-left'>Date(s) of Venue: </span>" . "" . "<span class='col-xs-12 col-md-7 col-lg-7 value'>$Date</span><br>" .
			"<span class='col-xs-12 col-md-4 col-lg-4 question-left'>Time of Appointment: </span>" . "" . "<span class='col-xs-12 col-md-7 col-lg-7 value'>$Time</span><br>" .
			"<span class='col-xs-12 col-md-4 col-lg-4 question-left'>Postal Code: </span>" . "" . "<span class='col-xs-12 col-md-7 col-lg-7 value'>$PostalCode</span><br>" .

		 "</div>" .
		 "</div>" .
		 "<div class='row'>" .
		 "<div class='col-xs-12 col-md-12 col-lg-12'>" .
			"<div class='populate_bidding_form' id='populate_bidding_form'>" .
				"<form method='post' action='scripts/processBidSubmission.php?job_category=$job_Category&&job_ID=$job_ID&&job_Title=$job_Title'>" .
					"<h1> YOUR HOURLY RATE OFFER </h1>" .
					"<input onkeypress='return isNumberKey(event)' min='0' type='number' name='bid_amount' placeholder='$' /><br><br>" .
					"<ol>" .
						"<li> Your offer rate is the price that you will be paid for each hour
									you are working for the customer, and does not apply to your travel
									time to and from the work location. Be sure to factor costs such
									as travel, materials and equipment into your hourly rate if they are applicable. </li>" .
						"<li> Complete your profile to increase your chances of being selected by the customer.  </li>" .
						"<li> There are typically several student offers on each job, so be sure to offer your best rate! </li>" .
					"</ol>" .
					"<hr />" .
					"<textarea name='bid_comments'
						placeholder='Send comments to the customer regarding your
						offer (ex: clarify your tasks, note equipment you can bring, propose different time,
						highlight your past experience, etc.)… (max 250 characters)'></textarea>" .
					"<p>After submitting, the Client will be able to view the offer and accept or
						reject it - you will be notified in either scenario. You can cancel the offer at
						any time before it is accepted via the Pending Offer tab. </p>" .
					"<p>By posting this offer you agree to complete the service for the above offer price,
						on the specified service date, and as per the Varsityhire Terms and Conditions, if
						offer is accepted by the Client. You understand that failing to show up to a scheduled
						appointment may result in your account being deactivated. </p>" .
					"<input type='reset' id='bid_cancel_btn' class='customBtn2' value='CANCEL'/>" .
					"<input type='submit' id='bid_submit_btn' class='customBtn2' value='SUBMIT'/>" .
				"</form>" .
			"</div>" .
		 "</div>" .
		 "</div>" .
		 "</div>";
}



?>

<script>
/****************** Validate money offer input fields ******************/
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if ( charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57) )
        return false;

    return true;
}
/****************************************************************************/
</script>

</div>
</div>

</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
