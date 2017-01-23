<?php
 include ("../common/document-head.php"); 
 include ("../common/sessionVariables.php");
 $GET_job_ID = $_GET["job_ID"];
 $GET_bid_ID = $_GET["bid_ID"];


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
		$stripe_user_id = $row["stripe_user_id"];

		echo "Student First Name : $student_Fname <br />" .
				 "Bid Amount : $bid_Amount <br />" .
				 "Bid Comments : $bid_Comments <hr /><br />" ;

				 $sql_Authenticate_User = " SELECT * FROM jobs_posts WHERE job_ID='$job_ID' ";
				 $query_Authenticate_User = $connection->query($sql_Authenticate_User);
				 if( $query_Authenticate_User ){
					 while( $row = $query_Authenticate_User->fetch_assoc() ){
						 if( $row["client_ID"] == $_SESSION["ID"] ){

               require_once("stripe_config.php");



               $token  = $_POST['stripeToken']; /* <----- Generated from stripe.js */



               /*********** CREATE CUSTOMER OBJECT ***********/
               $customer = \Stripe\Customer::create(array(
                   'email' => $row["client_Email"],
               ));
               /**********************************************/


               /*********** GET STUDENT STRIPE USER ID ***********/
               $sql_Fetch_Student_stripe_user_id = " SELECT * FROM students WHERE ID='$student_ID' ";
      				 $query_Fetch_Student_stripe_user_id = $connection->query($sql_Fetch_Student_stripe_user_id);
               while( $row_stripe_user_id = $query_Fetch_Student_stripe_user_id->fetch_assoc() ){
                 $stripe_user_id = $row_stripe_user_id['stripe_user_id'];
                 $student_email = $row_stripe_user_id['Email'];
               }
               /**************************************************/


               /*********** CREATE CARD FOR CUSTOMER PAYMENT ***********/
               $customer->sources->create(array(
                  "source" => $token
               ));
               /********************************************************/




               /*********************************************************
                CHARGE CUSTOMER`S CARD
                DESTINATION parameter DEFINES STUDENT (payment receiver)
               ***********/
               $amount_to_charge_client = (100 * $bid_Amount) + ($bid_Amount * 100 * 0.15);
               $description = "Charge for " . $student_email;
               $application_fee = $bid_Amount * 100 * 0.14;
               $charge = \Stripe\Charge::create(array(
                   'customer' => $customer->id,
                   'currency' => 'CAD',
                   'description' => $description,
                   'amount' => $amount_to_charge_client,
                   'application_fee' => $application_fee,
                   'destination' => $stripe_user_id
               ));
               /*********************************************************/




               echo '<h1>Successfully charged $' . $bid_Amount . '</h1>';
               $url = "../pages/showBids.php?job_ID=$job_ID&&bid_ID=$bid_ID&&token=$token";
               header("Refresh: 1;url=$url");
						 }
					 }
				 }
	}
}else{
	echo 'failed';
}




?>
