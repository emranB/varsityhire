<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$GET_job_ID = $_GET["job_ID"];
$GET_bid_ID = $_GET["bid_ID"];
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle"> Confirm Bid </h1>

<div class="content">
<div class="content-confirm-Bid">


<?php

$sql_Show_Job_Details = " SELECT * FROM students
													INNER JOIN jobs_bids_details
													ON students.ID=jobs_bids_details.bid_Student_ID
													AND jobs_bids_details.bid_ID='$GET_bid_ID' ";
$query_Show_Job_Details = $connection->query($sql_Show_Job_Details);
if( $query_Show_Job_Details ){

	while( $row = $query_Show_Job_Details->fetch_assoc() ){
		$student_ID = $row["ID"];
		$student_Fname = $row["Fname"];
		$student_Lname = $row["Lname"];
		$student_Email = $row["Email"];
		$student_PostalCode = $row["PostalCode"];
		$bid_ID = $row["bid_ID"];
		$job_ID = $row["job_ID"];
		$bid_Amount = $row["bid_Amount"];
		$bid_Comments = $row["bid_Comments"];

		// $amount_to_be_paid = $bid_Amount + ($bid_Amount * 0.15);
		$amount_to_be_paid = $bid_Amount;

		$action = $_GET["action"];

		if( $action == "accept" ){
			$location_beta_2 = "scripts/process_bid_accept_beta.php?job_ID=$job_ID&&bid_ID=$bid_ID&&action=accept ";

			echo "<div class='col-lg-12 col-md-12 col-xs-12'>" .
					 "<div class='cofirm_bid_bid_details'>" .
						 	"<div class='col-lg-6 col-md-6 col-xs-12'> Student First Name: </div>" .
					 	 	"<div class='col-lg-6 col-md-6 col-xs-12'> $student_Fname </div>" .
					 	 	"<div class='col-lg-6 col-md-6 col-xs-12'> Hourly Rate: </div>" .
					 	 	"<div class='col-lg-6 col-md-6 col-xs-12'> $ $amount_to_be_paid </span></div>" .
						 	"<div class='col-lg-6 col-md-6 col-xs-12'> Bid Comments: </div>" .
					 	 	"<div class='col-lg-6 col-md-6 col-xs-12'> $bid_Comments </div>" .
							"<a href='$location_beta_2' class='confirm_bid_acceptance'>" .
								"<div class='col-lg-12 col-md-12 col-xs-12'>Confirm Bid Acceptance</div>" .
							"</a>".
					 "</div>".
					 "</div>";
		}
		else if( $action == "revoke" ){
			$location_beta_2 = "scripts/process_bid_accept_beta.php?job_ID=$job_ID&&bid_ID=$bid_ID&&action=revoke ";

			echo "<div class='col-lg-12 col-md-12 col-xs-12'>" .
					 "<div class='cofirm_bid_bid_details'>" .
						 	"<div class='col-lg-6 col-md-6 col-xs-12'> Student First Name: </div>" .
					 	 	"<div class='col-lg-6 col-md-6 col-xs-12'> $student_Fname </div>" .
					 	 	"<div class='col-lg-6 col-md-6 col-xs-12'> Amount revoked: </div>" .
					 	 	"<div class='col-lg-6 col-md-6 col-xs-12'> $ $amount_to_be_paid </span></div>" .
						 	"<div class='col-lg-6 col-md-6 col-xs-12'> Bid Comments: </div>" .
					 	 	"<div class='col-lg-6 col-md-6 col-xs-12'> $bid_Comments </div>" .
							"<a href='$location_beta_2' class='confirm_bid_acceptance'>" .
								"<div class='col-lg-12 col-md-12 col-xs-12'>Confirm Bid Revoke</div>" .
							"</a>".
					 "</div>".
					 "</div>";
		}





/************************************** Use for stripe payments ----- STRIPE.js *****************************************************/
				//  echo "<div class='col-lg-12 col-md-12 col-xs-12'>" ;
				//  $sql_Authenticate_User = " SELECT * FROM jobs_posts WHERE job_ID='$job_ID' ";
				//  $query_Authenticate_User = $connection->query($sql_Authenticate_User);
				//  if( $query_Authenticate_User ){
				// 	 while( $row = $query_Authenticate_User->fetch_assoc() ){
				// 		 if( $row["client_ID"] == $_SESSION["ID"] ){
				 //
				// 			 include("../scripts/stripe_config.php");
				// 			 $sql_Fetch_Client_Email = " SELECT * FROM clients WHERE ID='$_SESSION[ID]' ";
				// 			 $query_Fetch_Client_Email = $connection->query($sql_Fetch_Client_Email);
				// 			 while( $row_client_email = $query_Fetch_Client_Email->fetch_assoc() ){
				// 				 $client_email = $row_client_email["Email"];
				// 			 }
				 //
				// 			 $amount_to_charge_client = (100 * $bid_Amount) + ($bid_Amount * 100 * 0.15);
				 //
				// 			 echo "<br /><br />";
				// 			 echo "<form action='scripts/stripe_charge.php?job_ID=$job_ID&&bid_ID=$bid_ID' method='post'>";
							 ?>
				 			   <!-- <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
							           data-key="<?php echo $stripe['publishable_key']; ?>"
							           data-description="<?php echo 'Recipient: ' . $student_Fname; ?>"
							           data-amount="<?php echo $amount_to_charge_client; ?>"
							           data-email="<?php echo 'Sender: ' . $client_email; ?>"
							           data-locale="auto"></script> -->
				 			<?php
				// 			 echo "</form>";
				 //
				// 		 }
				// 	 }
				//  }
/**************************************************************************************************************************/


				//  echo "</div>";
	}
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
