<?php include ("../common/document-head.php"); ?>
<?php include("../common/sessionVariables.php"); ?>

<body>

<?php
/*--------------------------------------------Primary Info--------------------------------------------*/
$Fname = $_POST["fname"];
$Lname = $_POST["lname"];
$PostalCode = $_POST["postalCode"];

if( $_SESSION["UserType"] == "Student" ){
	$sqlUpdatePrimaryInfo = " UPDATE students
							SET Fname='$Fname', Lname='$Lname',
									PostalCode='$PostalCode'
							WHERE ID='$ID' ";
	$queryUpdatePrimaryInfo = $connection->query($sqlUpdatePrimaryInfo);
	if( $queryUpdatePrimaryInfo ){
		$sqlUpdatedInfo = " SELECT * FROM students WHERE ID='$ID' ";
		$queryUpdatedInfo = $connection->query($sqlUpdatedInfo);
		while( $row = $queryUpdatedInfo->fetch_assoc() ){
			$_SESSION["Name"] = $row["Fname"] . " " . $row["Lname"];
			$_SESSION["Fname"] = $row["Fname"];
			$_SESSION["Lname"] = $row["Lname"];
			$_SESSION["ID"] = $row["ID"];
			$_SESSION["PostalCode"] = $row["PostalCode"];
		}
	}
}
else if( $_SESSION["UserType"] == "Client" ){
	$sqlUpdatePrimaryInfo = " UPDATE clients
							SET Fname='$Fname', Lname='$Lname',
								PostalCode='$PostalCode'
							WHERE ID='$ID' ";
	$queryUpdatePrimaryInfo = $connection->query($sqlUpdatePrimaryInfo);
	if( $queryUpdatePrimaryInfo ){
		$sqlUpdatedInfo = " SELECT * FROM clients WHERE ID='$ID' ";
		$queryUpdatedInfo = $connection->query($sqlUpdatedInfo);
		while( $row = $queryUpdatedInfo->fetch_assoc() ){
			$_SESSION["Name"] = $row["Fname"] . " " . $row["Lname"];
			$_SESSION["Fname"] = $row["Fname"];
			$_SESSION["Lname"] = $row["Lname"];
			$_SESSION["ID"] = $row["ID"];
			$_SESSION["PostalCode"] = $row["PostalCode"];
		}
	}
}

/*--------------------------------------------Primary Info--------------------------------------------*/

/*--------------------------------------------Skills Info--------------------------------------------*/

if( isset($_POST["Dog_Walking"]) ){
	$Dog_Walking = "1";
}
else{
	$Dog_Walking = "0";
}

if( isset($_POST["Exterior_Window_Washing"]) ){
	$Exterior_Window_Washing = "1";
}
else{
	$Exterior_Window_Washing = "0";
}

if( isset($_POST["Delivery"]) ){
	$Delivery = "1";
}else{
	$Delivery = "0";
}

if( isset($_POST["Garage_Shop_Shed_Cleaning"]) ){
	$Garage_Shop_Shed_Cleaning = "1";
}else{
	$Garage_Shop_Shed_Cleaning = "0";
}

if( isset($_POST["Gutter_Cleaning"]) ){
	$Gutter_Cleaning = "1";
}else{
	$Gutter_Cleaning = "0";
}

if( isset($_POST["House_Cleaning"]) ){
	$House_Cleaning = "1";
}else{
	$House_Cleaning = "0";
}

if( isset($_POST["International_Languages"]) ){
	$International_Languages = "1";
}else{
	$International_Languages = "0";
}

if( isset($_POST["Landscaping"]) ){
	$Landscaping = "1";
}else{
	$Landscaping = "0";
}

if( isset($_POST["Moving"]) ){
	$Moving = "1";
}else{
	$Moving = "0";
}

if( isset($_POST["Music_Lessons"]) ){
	$Music_Lessons = "1";
}else{
	$Music_Lessons = "0";
}

if( isset($_POST["Seasonal_Decoration"]) ){
	$Seasonal_Decoration = "1";
}else{
	$Seasonal_Decoration = "0";
}

if( isset($_POST["Painting"]) ){
	$Painting = "1";
}else{
	$Painting = "0";
}

if( isset($_POST["Pressure_Washing"]) ){
	$Pressure_Washing = "1";
}else{
	$Pressure_Washing = "0";
}

if( isset($_POST["Private_Event_Assistance"]) ){
	$Private_Event_Assistance = "1";
}else{
	$Private_Event_Assistance = "0";
}

if( isset($_POST["RV_Boat_Cleaning"]) ){
	$RV_Boat_Cleaning = "1";
}else{
	$RV_Boat_Cleaning = "0";
}

if( isset($_POST["Snow_Removal"]) ){
	$Snow_Removal = "1";
}else{
	$Snow_Removal = "0";
}

if( isset($_POST["Tutoring"]) ){
	$Tutoring = "1";
}else{
	$Tutoring = "0";
}

if( isset($_POST["Vehicle_Care"]) ){
	$Vehicle_Care = "1";
}else{
	$Vehicle_Care = "0";
}

if( isset($_POST["Yard_Care"]) ){
	$Yard_Care = "1";
}else{
	$Yard_Care = "0";
}

if( isset($_POST["Private_Event_Assistance"]) ){
	$Other = "1";
}else{
	$Other = "0";
}

if( $_SESSION["UserType"] == "Student" ){
	$dbSkills = "students_skills";
}
else if( $_SESSION["UserType"] == "Client" ){
	$dbSkills = "clients_skills";
}

$sqlStoreSecondaryInfo = " INSERT INTO $dbSkills
								SET ID='$_SESSION[ID]', Email='$_SESSION[Email]', Dog_Walking='$Dog_Walking',
									Exterior_Window_Washing='$Exterior_Window_Washing', Delivery='$Delivery',
									Garage_Shop_Shed_Cleaning='$Garage_Shop_Shed_Cleaning', Gutter_Cleaning='$Gutter_Cleaning',
									House_Cleaning='$House_Cleaning', International_Languages='$International_Languages',
									Landscaping='$Landscaping', Moving='$Moving', Music_Lessons='$Music_Lessons',
									Seasonal_Decoration='$Seasonal_Decoration', Painting='$Painting',
									Pressure_Washing='$Pressure_Washing', Private_Event_Assistance='$Private_Event_Assistance',
									RV_Boat_Cleaning='$RV_Boat_Cleaning', Snow_Removal='$Snow_Removal', Tutoring='$Tutoring',
									Vehicle_Care='$Vehicle_Care', Yard_Care='$Yard_Care', Other='$Other'
								ON DUPLICATE KEY UPDATE
									Dog_Walking='$Dog_Walking', Exterior_Window_Washing='$Exterior_Window_Washing',
									Delivery='$Delivery', Garage_Shop_Shed_Cleaning='$Garage_Shop_Shed_Cleaning',
									Gutter_Cleaning='$Gutter_Cleaning', House_Cleaning='$House_Cleaning',
									International_Languages='$International_Languages', Landscaping='$Landscaping',
									Moving='$Moving', Music_Lessons='$Music_Lessons',
									Seasonal_Decoration='$Seasonal_Decoration', Painting='$Painting',
									Pressure_Washing='$Pressure_Washing', Private_Event_Assistance='$Private_Event_Assistance',
									RV_Boat_Cleaning='$RV_Boat_Cleaning', Snow_Removal='$Snow_Removal', Tutoring='$Tutoring',
									Vehicle_Care='$Vehicle_Care', Yard_Care='$Yard_Care', Other='$Other' ";

$queryStoreSecondaryInfo = $connection->query($sqlStoreSecondaryInfo);

if( $queryStoreSecondaryInfo ){
	$sqlUpdatedSecondaryInfo = " SELECT * FROM $dbSkills WHERE ID='$_SESSION[ID]' ";
	$queryUpdatedSecondaryInfo = $connection->query($sqlUpdatedSecondaryInfo);
	while( $row = $queryUpdatedSecondaryInfo->fetch_assoc() ){
		$_SESSION["Dog_Walking"] = $row["Dog_Walking"];
		$_SESSION["Exterior_Window_Washing"] = $row["Exterior_Window_Washing"];
		$_SESSION["Delivery"] = $row["Delivery"];
		$_SESSION["Garage_Shop_Shed_Cleaning"] = $row["Garage_Shop_Shed_Cleaning"];
		$_SESSION["Gutter_Cleaning"] = $row["Gutter_Cleaning"];
		$_SESSION["House_Cleaning"] = $row["House_Cleaning"];
		$_SESSION["International_Languages"] = $row["International_Languages"];
		$_SESSION["Landscaping"] = $row["Landscaping"];
		$_SESSION["Moving"] = $row["Moving"];
		$_SESSION["Music_Lessons"] = $row["Music_Lessons"];
		$_SESSION["Seasonal_Decoration"] = $row["Seasonal_Decoration"];
		$_SESSION["Painting"] = $row["Painting"];
		$_SESSION["Pressure_Washing"] = $row["Pressure_Washing"];
		$_SESSION["Private_Event_Assistance"] = $row["Private_Event_Assistance"];
		$_SESSION["RV_Boat_Cleaning"] = $row["RV_Boat_Cleaning"];
		$_SESSION["Snow_Removal"] = $row["Snow_Removal"];
		$_SESSION["Tutoring"] = $row["Tutoring"];
		$_SESSION["Vehicle_Care"] = $row["Vehicle_Care"];
		$_SESSION["Yard_Care"] = $row["Yard_Care"];
		$_SESSION["Other"] = $row["Other"];

		$arr = "";
		foreach( $row as $skill => $value ){
			if( $skill !== "ID" && $value == "1" ){
				$location = " pages/showJobs.php?job_category=$skill ";
				$arr .= "<a class='eachSkill' href='$location'>" . $skill . "</a><br>";
			}
		}
		$_SESSION["Skills"] = $arr;
	}
}
/*--------------------------------------------Skills Info--------------------------------------------*/


/*--------------------------------------------Additional Info--------------------------------------------*/

$Dob = $_POST["dob"];
$Phone = $_POST["phone"];
$School = $_POST["school"];
$Program = $_POST["program"];
$YearGrade = $_POST["yearGrade"];
$AdditionalComments = $_POST["profileAdditionalComments"];

if( $_SESSION["UserType"] == "Student" ){
	$sqlAdditionalInfo = " INSERT INTO students_additional_info
							SET ID='$_SESSION[ID]', Dob='$Dob', Phone='$Phone', School='$School',
								Program='$Program', YearGrade='$YearGrade', AdditionalComments='$AdditionalComments'
							ON DUPLICATE KEY UPDATE
								Dob='$Dob', Phone='$Phone', School='$School', Program='$Program',
								YearGrade='$YearGrade', AdditionalComments='$AdditionalComments' ";
}
else if( $_SESSION["UserType"] == "Client" ){
	$sqlAdditionalInfo = " INSERT INTO clients_additional_info
							SET ID='$_SESSION[ID]',Phone='$Phone', AdditionalComments='$AdditionalComments'
							ON DUPLICATE KEY UPDATE
								Phone='$Phone', AdditionalComments='$AdditionalComments' ";
}


$queryAdditionalInfo = $connection->query($sqlAdditionalInfo);
if( $queryAdditionalInfo ){

	if( $_SESSION["UserType"] == "Student" ){
		$sqlUpdatedAdditionalInfo = " SELECT * FROM students_additional_info WHERE ID='$_SESSION[ID]' ";
		$queryUpdatedAdditionalInfo = $connection->query($sqlUpdatedAdditionalInfo);
		while( $row = $queryUpdatedAdditionalInfo->fetch_assoc() ){
			$_SESSION["Dob"] = $row["Dob"];
			$_SESSION["Phone"] = $row["Phone"];
			$_SESSION["School"] = $row["School"];
			$_SESSION["Program"] = $row["Program"];
			$_SESSION["YearGrade"] = $row["YearGrade"];
			$_SESSION["AdditionalComments"] = $row["AdditionalComments"];
		}
	}
	else if( $_SESSION["UserType"] == "Client" ){
		$sqlUpdatedAdditionalInfo = " SELECT * FROM clients_additional_info WHERE ID='$_SESSION[ID]' ";
		$queryUpdatedAdditionalInfo = $connection->query($sqlUpdatedAdditionalInfo);
		while( $row = $queryUpdatedAdditionalInfo->fetch_assoc() ){
			$_SESSION["Phone"] = $row["Phone"];
			$_SESSION["AdditionalComments"] = $row["AdditionalComments"];
		}
	}

}


/*--------------------------------------------Additional Info--------------------------------------------*/


if( $queryUpdatePrimaryInfo && $queryStoreSecondaryInfo && $queryAdditionalInfo ){
	echo "<hr /><h1>Succesfully Updated! <br> Redirecting . . . . </h1><hr />";
	header("Refresh: 2;url=../pages/profile.php");
}



$connection->close();
?>

</body>


</html>
