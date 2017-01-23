<?php include("../common/document-head.php"); ?>
<?php include("../common/sessionVariables.php"); ?>

<body>
<?php

$email = $_POST["email"];
$password = $_POST["password"];

$sqlCheckInfo = " (SELECT * FROM students WHERE Email='$email' AND Password='$password')
										UNION
								  (SELECT * FROM clients WHERE Email='$email' AND Password='$password') ";
$queryCheckInfo = $connection->query($sqlCheckInfo);
$rows = mysqli_num_rows($queryCheckInfo);

/******************************************************************************/
$sql_Check_Account_Status = " (SELECT account_status FROM students WHERE Email='$email' AND Password='$password')
																UNION
														  (SELECT account_status FROM clients WHERE Email='$email' AND Password='$password') ";
$query_Check_Account_Status = $connection->query($sql_Check_Account_Status);
while( $row_status = $query_Check_Account_Status->fetch_assoc() ){
	$account_status = $row_status["account_status"];
}
/******************************************************************************/

if( $rows == "0" ){
	header("Refresh: 2;url=../index.php?retrying=true");
	echo "<h1>User and/or password not found <br> Redirecting . . . .</h1>";
}


else if( $rows > "0" ){
/******************************************************************************/
if( $account_status == "verified" ){

	echo "<h1>Login Successful!</h1>";

	while( $row1 = $queryCheckInfo->fetch_assoc() ){
		$_SESSION["UserType"] = $row1["UserType"];
		$_SESSION["Name"] = $row1["Fname"] . " " . $row1["Lname"];
		$_SESSION["Fname"] = $row1["Fname"];
		$_SESSION["Lname"] = $row1["Lname"];
		$_SESSION["ID"] = $row1["ID"];
		$_SESSION["Email"] = $row1["Email"];
		$_SESSION["PostalCode"] = $row1["PostalCode"];
		$_SESSION["Password"] = $row1["Password"];
		echo "Welcome: $_SESSION[Name]" . "<br>" . "$_SESSION[Email]";

		if( $_SESSION["UserType"] == "Student" ){
			$dbSkills = "students_skills";
		}
		else if( $_SESSION["UserType"] == "Client" ){
			$dbSkills = "clients_skills";
		}

		$sqlCheckSecondaryInfo = " SELECT * FROM " . $dbSkills . " WHERE ID='$_SESSION[ID]' ";
		$queryCheckSecondaryInfo = $connection->query($sqlCheckSecondaryInfo);
		while( $row2 = $queryCheckSecondaryInfo->fetch_assoc() ){
			$_SESSION["Dog_Walking"] = $row2["Dog_Walking"];
			$_SESSION["Exterior_Window_Washing"] = $row2["Exterior_Window_Washing"];
			$_SESSION["Delivery"] = $row2["Delivery"];
			$_SESSION["Garage_Shop_Shed_Cleaning"] = $row2["Garage_Shop_Shed_Cleaning"];
			$_SESSION["Gutter_Cleaning"] = $row2["Gutter_Cleaning"];
			$_SESSION["House_Cleaning"] = $row2["House_Cleaning"];
			$_SESSION["International_Languages"] = $row2["International_Languages"];
			$_SESSION["Landscaping"] = $row2["Landscaping"];
			$_SESSION["Moving"] = $row2["Moving"];
			$_SESSION["Music_Lessons"] = $row2["Music_Lessons"];
			$_SESSION["Seasonal_Decoration"] = $row2["Seasonal_Decoration"];
			$_SESSION["Painting"] = $row2["Painting"];
			$_SESSION["Pressure_Washing"] = $row2["Pressure_Washing"];
			$_SESSION["Private_Event_Assistance"] = $row2["Private_Event_Assistance"];
			$_SESSION["RV_Boat_Cleaning"] = $row2["RV_Boat_Cleaning"];
			$_SESSION["Snow_Removal"] = $row2["Snow_Removal"];
			$_SESSION["Tutoring"] = $row2["Tutoring"];
			$_SESSION["Vehicle_Care"] = $row2["Vehicle_Care"];
			$_SESSION["Yard_Care"] = $row2["Yard_Care"];
			$_SESSION["Other"] = $row2["Other"];

			$arr = "";
			foreach( $row2 as $skill => $value ){
			if( $skill !== "ID" && $value == "1" ){
					$location = " pages/showJobs.php?job_category=$skill ";
					$arr .= "<a class='eachSkill' href='$location'>" . $skill . "</a><br>";
				}
			}
			$_SESSION["Skills"] = $arr;
		}

		if( $_SESSION["UserType"] == "Student" ){
			$sqlCheckAdditionalInfo = " SELECT * FROM students_additional_info WHERE ID='$_SESSION[ID]' ";
			$queryCheckAdditionalInfo = $connection->query($sqlCheckAdditionalInfo);
			while( $row3 = $queryCheckAdditionalInfo->fetch_assoc() ){
				$_SESSION["Dob"] = $row3["Dob"];
				$_SESSION["Phone"] = $row3["Phone"];
				$_SESSION["School"] = $row3["School"];
				$_SESSION["Program"] = $row3["Program"];
				$_SESSION["YearGrade"] = $row3["YearGrade"];
				$_SESSION["AdditionalComments"] = $row3["AdditionalComments"];
			}
		}
		else if( $_SESSION["UserType"] == "Client" ){
			$sqlCheckAdditionalInfo = " SELECT * FROM clients_additional_info WHERE ID='$_SESSION[ID]' ";
			$queryCheckAdditionalInfo = $connection->query($sqlCheckAdditionalInfo);
			while( $row3 = $queryCheckAdditionalInfo->fetch_assoc() ){
				$_SESSION["Dob"] = $row3["Dob"];
				$_SESSION["Phone"] = $row3["Phone"];
				$_SESSION["AdditionalComments"] = $row3["AdditionalComments"];
			}
		}

		header("Refresh: 1;url=../pages/profile.php");
		echo "<p>Redirecting . . . .</p>";

	}
}
/******************************************************************************/
else{
	echo "<hr /><h1> Please check your email and verify your account <br /> in order to gain full access of site . . . . </h1><hr />";
	echo "<p>Redirecting . . . .</p>";
	header("Refresh: 1;url=../index.php");
}
/******************************************************************************/

}


$connection->close();
?>

</body>

</html>
