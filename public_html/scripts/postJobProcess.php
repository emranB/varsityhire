<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php include("../common/navigation.php"); ?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle">Post New Job </h1>

<div class="content">
<div class="content-postJob">


<?php

// $job_category = $_POST["job_category"];
$job_category_temporary = $_POST["job_category"];
$job_category = "other";
$job_title = $_POST["job_title"];
$date = $_POST["date_of_venue"];

if( $Name == "" ){
	echo "<hr /><h1>Error: You must be logged in as a <strong>Client </strong> to post jobs <br> Redirecting . . . . </h1><hr />";
	header("Refresh: 2;url=../index.php");
}
else if( $Name !== "" ){

$sqlCheckIfPostExists = " SELECT * FROM jobs_posts WHERE job_Title='$job_title' ";
$queryCheckIfJobExists = $connection->query($sqlCheckIfPostExists);
$num_rows = mysqli_num_rows($queryCheckIfJobExists);
if( $num_rows > "0" ){
	echo "<hr /><h1>Error: A job post with the same title already exists <br> Redirecting . . . . </h1><hr />";
	header("Refresh: 2;url=../pages/postJob.php");
}
else if( $num_rows == "0" ){
	$ID = $_SESSION["ID"];
	$Email = $_SESSION["Email"];

	/*************** Generate Unique Job ID ****************/
	function random_string($length) {
	    $key = '';
	    $keys = array_merge(range(0, 9), range('a', 'z'));

	    for ($i = 0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }
	    return $key;
	}
	$unique_ID_str_1 = random_string(3);
	$unique_ID_str_2 = random_string(3);
	$time = time();
	$time_str_2 = substr($time, -3);
	$unique_ID = $unique_ID_str_1 . $time_str_2 . $unique_ID_str_2;
	/********************************************************/


	$sqlAddPost = " INSERT INTO jobs_posts (job_ID, client_ID, client_Email, job_Category, job_Title, job_Status)
									VALUES ('$unique_ID', '$ID', '$Email', '$job_category', '$job_title', 'Open')";
	$queryAddPost = $connection->query($sqlAddPost);
	if( $queryAddPost ){
		// echo "<h1><hr />successfully added to FIRST database!<hr /></h1>";

		$sqlFetchAddPostData = " SELECT * FROM jobs_posts WHERE job_ID='$unique_ID' AND client_ID='$_SESSION[ID]' ";
		$queryFetchAddPostData = $connection->query($sqlFetchAddPostData);
		while( $row = $queryFetchAddPostData->fetch_assoc() ){
			$Job_ID = $row["job_ID"];
			$Client_ID = $row["client_ID"];
			$Client_Email = $row["client_Email"];
			$Job_Title = $row["job_Title"];
		}

		/************************ Change Based on Category*******************/

		// if( $job_category == "dog_walking" ){
		// 	/********************** Caching Answers / Dumping into Memory **********************/
		// 	$recurring = $_POST["recurring"];
		// 	if( $_POST["recurring"] == "Yes" ){
		// 		$date = implode(", " , $_POST["date_of_venue"]);
		// 	}
		// 	else if( $_POST["recurring"] == "No" ){
		// 		$date = $_POST["date_of_venue"];
		// 	}
		//
		// 	$A2 = $_POST["A2"];
		// 	if( $A2 == "Half" ){
		// 		$duration = "Half an hour";
		// 	}
		// 	else if( $A2 == "One" ){
		// 		$duration = "One hour";
		// 	}
		// 	else if( $A2 == "OneAndHalf" ){
		// 		$duration = "One and a half hours";
		// 	}
		// 	else if( $A2 == "Two" ){
		// 		$duration = "Two hours";
		// 	}
		// 	else if( $A2 == "Other" ){
		// 		$duration = "Other";
		// 	}
		//
		// 	$comments_1 = $_POST["A3"];
		// 	$dog_type = $_POST["A4"];
		// 	$age = $_POST["A5_Years"] . " years, " . $_POST["A5_Months"] . " months";
		//
		// 	$A6 = $_POST["A6"];
		// 	if( $A6 == "Yes" ){
		// 		$equipment = "Yes, all of it";
		// 	}
		// 	else if( $A6 == "No" ){
		// 		$equipment = "No, none of it";
		// 	}
		// 	else if( $A6 == "Some" ){
		// 		$equipment = "Some of it";
		// 	}
		//
		// 	$comments_2 = $_POST["A7"];
		//
		// 	$A8 = $_POST["A8"];
		// 	if( $A8 == "Yes" ){
		// 		$materials = "Yes, all of it";
		// 	}
		// 	else if( $A8 == "No" ){
		// 		$materials = "No, none of it";
		// 	}
		// 	else if( $A8 == "Some" ){
		// 		$materials = "Some of it";
		// 	}
		//
		// 	$comments_3 = $_POST["A9"];
		// 	$address_of_service_name = $_POST["address_of_service_name"];
		// 	$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 	$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		// /********************** Caching Answers / Dumping into Memory **********************/
		// 	$sqlAddAnswersForJobPost = " INSERT INTO dog_walking (
		// 									Job_ID, Client_ID, Date, A2, A3, A4, A5, A6, A7, A8, A9, Address, PostalCode, Time
		// 								 )
		// 								 VALUES (
		// 									'$Job_ID', '$Client_ID', '$date', '$duration', '$comments_1',
		// 									'$dog_type', '$age', '$equipment', '$comments_2',
		// 									'$materials', '$comments_3', '$address_of_service_name',
		// 									'$address_of_service_postal_code', '$time_of_service'
		// 								 ) ";
		// }
//
//
//
//
//
//
		// else if( $job_category == "exterior_window_washing" ){
		// /********************** Caching Answers / Dumping into Memory **********************/
		// 	$recurring = $_POST["recurring"];
		// 	if( $_POST["recurring"] == "Yes" ){
		// 		$date = implode(", " , $_POST["date_of_venue"]);
		// 	}
		// 	else if( $_POST["recurring"] == "No" ){
		// 		$date = $_POST["date_of_venue"];
		// 	}
		//
		// 	$number_of_items = $_POST["number_of_items"];
		// 	if( $number_of_items == "under5" ){
		// 		$val_number_of_items = "Under Five";
		// 	}
		// 	else if( $number_of_items == "6to10" ){
		// 		$val_number_of_items = "Six to Ten";
		// 	}
		// 	else if( $number_of_items == "11t015" ){
		// 		$val_number_of_items = "Eleven to Fifteen";
		// 	}
		// 	else if( $number_of_items == "16to20" ){
		// 		$val_number_of_items = "Sixteen to Twenty";
		// 	}
		// 	else if( $number_of_items == "21to25" ){
		// 		$val_number_of_items = "Twenty-one to Twenty-five";
		// 	}
		// 	else if( $number_of_items == "26to30" ){
		// 		$val_number_of_items = "Twenty-six to Thirty";
		// 	}
		// 	else if( $number_of_items == "over30" ){
		// 		$val_number_of_items = "Over Thirty";
		// 	}
		//
		// 	$percentage_requiring_ladder = $_POST["percentage_requiring_ladder"];
		// 	if( $percentage_requiring_ladder == "under10" ){
		// 		$val_percentage_requiring_ladder = "Very few (under 10%)";
		// 	}
		// 	else if( $percentage_requiring_ladder == "11to33" ){
		// 		$val_percentage_requiring_ladder = "Some of them (11% to 33%)";
		// 	}
		// 	else if( $percentage_requiring_ladder == "33to66" ){
		// 		$val_percentage_requiring_ladder = "Quite a few (33% to 66%)";
		// 	}
		// 	else if( $percentage_requiring_ladder == "66to100" ){
		// 		$val_percentage_requiring_ladder = "All of it";
		// 	}
		//
		// 	$avg_size_of_windows = $_POST["avg_size_of_windows"];
		// 	if( $avg_size_of_windows == "under5" ){
		// 		$val_avg_size_of_windows = "Small (under 5 ft2)";
		// 	}
		// 	else if( $avg_size_of_windows == "5to15" ){
		// 		$val_avg_size_of_windows = "Medium (5 - 15 ft2)";
		// 	}
		// 	else if( $avg_size_of_windows == "16to30" ){
		// 		$val_avg_size_of_windows = "Large (16 - 30 ft2)";
		// 	}
		// 	else if( $avg_size_of_windows == "over30" ){
		// 		$val_avg_size_of_windows = "Very Large (over 30 ft2)";
		// 	}
		//
		// 	$comments_for_appointment = $_POST["comments_for_appointment"];
		//
		// 	/********************* Step 4*******************/
		// 	$equipment_provided = $_POST["equipment_provided"];
		// 	if( $equipment_provided == "Yes" ){
		// 		$val_equipment_provided = "Yes, all of it";
		// 	}
		// 	else if( $equipment_provided == "No" ){
		// 		$val_equipment_provided = "No, none of it";
		// 	}
		// 	else if( $equipment_provided == "Some" ){
		// 		$val_equipment_provided = "Some of it";
		// 	}
		//
		// 	$description_of_equipment = $_POST["description_of_equipment"];
		//
		// 	$materials_provided = $_POST["materials_provided"];
		// 	if( $materials_provided == "Yes" ){
		// 		$val_materials_provided = "Yes, all of it";
		// 	}
		// 	else if( $materials_provided == "No" ){
		// 		$val_materials_provided = "No, none of it";
		// 	}
		// 	else if( $materials_provided == "Some" ){
		// 		$val_materials_provided = "Some of it";
		// 	}
		//
		// 	$description_of_materials_required = $_POST["description_of_materials_required"];
		// 	$address_of_service_name = $_POST["address_of_service_name"];
		// 	$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 	$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// /********************** Caching Answers / Dumping into Memory **********************/
		// 	$sqlAddAnswersForJobPost = " INSERT INTO exterior_window_washing (
		// 									Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8, Address, PostalCode, Time
		// 								 )
		// 								 VALUES (
		// 									'$Job_ID', '$Client_ID', '$date',
		// 									'$val_number_of_items', '$val_percentage_requiring_ladder',
		// 									'$val_avg_size_of_windows', '$comments_for_appointment',
		// 									'$val_equipment_provided', '$description_of_equipment',
		// 									'$val_materials_provided', '$description_of_materials_required',
		// 									'$address_of_service_name', '$address_of_service_postal_code', '$time_of_service'
		// 								 ) ";
		// }
		//
		//
		//
		//
		//
		//
		//
		// else if( $job_category == "delivery" ){
		// /********************** Caching Answers / Dumping into Memory **********************/
		// 	$delivery_sub_services = $_POST["delivery_sub_services"];
		// 	if( $delivery_sub_services ==  "to_specific_address" ){
		// 		$type_of_items_to_specific_address = $_POST["type_of_items_to_specific_address"];
		// 		$description_of_type_of_items_to_specific_address = $_POST["description_of_type_of_items_to_specific_address"];
		// 		$number_of_items_to_specific_address = $_POST["number_of_items_to_specific_address"];
		// 		$process_of_delivery_to_specific_address = $_POST["process_of_delivery_to_specific_address"];
		// 		$location_of_delivery_to_specific_address = $_POST["location_of_delivery_to_specific_address"];
		// 		$comments_for_appointment = $_POST["comments_for_appointment"];
		// 		/********************* Step 4*******************/
		// 		$equipment_provided = $_POST["equipment_provided"];
		// 		if( $equipment_provided == "Yes" ){
		// 			$val_equipment_provided = "Yes, all of it";
		// 		}else if( $equipment_provided == "No" ){
		// 			$val_equipment_provided = "No, none of it";
		// 		}else if( $equipment_provided == "Some" ){
		// 			$val_equipment_provided = "Some of it";
		// 		}
		//
		// 		$description_of_equipment = $_POST["description_of_equipment"];
		//
		// 		$materials_provided = $_POST["materials_provided"];
		// 		if( $materials_provided == "Yes" ){
		// 			$val_materials_provided = "Yes, all of it";
		// 		}else if( $materials_provided == "No" ){
		// 			$val_materials_provided = "No, none of it";
		// 		}else if( $materials_provided == "Some" ){
		// 			$val_materials_provided = "Some of it";
		// 		}
		//
		// 		$description_of_materials_required = $_POST["description_of_materials_required"];
		// 		$address_of_service_name = $_POST["address_of_service_name"];
		// 		$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 		$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 	/********************** Caching Answers / Dumping into Memory **********************/
		// 		$sqlAddAnswersForJobPost = " INSERT INTO delivery (
		// 										Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8, A9, A10, A11, Address, PostalCode, Time
		// 									 )
		// 									 VALUES (
		// 										'$Job_ID', '$Client_ID', '$date',
		// 										'$delivery_sub_services',
		// 										'$type_of_items_to_specific_address',
		// 										'$description_of_type_of_items_to_specific_address',
		// 										'$number_of_items_to_specific_address',
		// 										'$process_of_delivery_to_specific_address',
		// 										'$location_of_delivery_to_specific_address', '$comments_for_appointment',
		// 										'$val_equipment_provided', '$description_of_equipment',
		// 										'$val_materials_provided', '$description_of_materials_required',
		// 										'$address_of_service_name', '$address_of_service_postal_code', '$time_of_service'
		// 									 ) ";
		// 	}
		// 	else if( $delivery_sub_services ==  "to_set_areas" ){
		// 		$type_of_items_to_set_areas = $_POST["type_of_items_to_set_areas"];
		// 		$description_of_type_of_items_to_set_areas = $_POST["description_of_type_of_items_to_set_areas"];
		// 		$number_of_items_to_set_areas = $_POST["number_of_items_to_set_areas"];
		// 		$process_of_delivery_to_set_areas = $_POST["process_of_delivery_to_set_areas"];
		// 		$location_of_delivery_to_set_areas = $_POST["location_of_delivery_to_set_areas"];
		// 		$comments_for_appointment = $_POST["comments_for_appointment"];
		// 		/********************* Step 4*******************/
		// 		$equipment_provided = $_POST["equipment_provided"];
		// 		if( $equipment_provided == "Yes" ){
		// 			$val_equipment_provided = "Yes, all of it";
		// 		}else if( $equipment_provided == "No" ){
		// 			$val_equipment_provided = "No, none of it";
		// 		}else if( $equipment_provided == "Some" ){
		// 			$val_equipment_provided = "Some of it";
		// 		}
		//
		// 		$description_of_equipment = $_POST["description_of_equipment"];
		//
		// 		$materials_provided = $_POST["materials_provided"];
		// 		if( $materials_provided == "Yes" ){
		// 			$val_materials_provided = "Yes, all of it";
		// 		}else if( $materials_provided == "No" ){
		// 			$val_materials_provided = "No, none of it";
		// 		}else if( $materials_provided == "Some" ){
		// 			$val_materials_provided = "Some of it";
		// 		}
		//
		// 		$description_of_materials_required = $_POST["description_of_materials_required"];
		// 		$address_of_service_name = $_POST["address_of_service_name"];
		// 		$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 		$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 	/********************** Caching Answers / Dumping into Memory **********************/
		// 		$sqlAddAnswersForJobPost = " INSERT INTO delivery (
		// 										Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8, A9, A10, A11, Address, PostalCode, Time
		// 									 )
		// 									 VALUES (
		// 										'$Job_ID', '$Client_ID', '$date',
 	// 											'$delivery_sub_services',
 	// 											'$type_of_items_to_set_areas',
 	// 											'$description_of_type_of_items_to_set_areas',
 	// 											'$number_of_items_to_set_areas',
 	// 											'$process_of_delivery_to_set_areas',
 	// 											'$location_of_delivery_to_set_areas', '$comments_for_appointment',
 	// 											'$val_equipment_provided', '$description_of_equipment',
 	// 											'$val_materials_provided', '$description_of_materials_required',
 	// 											'$address_of_service_name', '$address_of_service_postal_code', '$time_of_service'
		// 									 ) ";
		// 	}
		// 	}
		//
		//
		//
		//
		//
		//
		// else if( $job_category == "garage_shop_shed_cleaning" ){
		// /********************** Caching Answers / Dumping into Memory **********************/
		// 	$garage_shop_shed_cleaning_subservices = $_POST["garage_shop_shed_cleaning_subservices"];
		// 	if( $garage_shop_shed_cleaning_subservices ==  "garbage_clean_up" ){
		// 		$floor_area_garbage_clean_up = $_POST["floor_area_garbage_clean_up"];
		// 		$how_much_garbage_garbage_clean_up = $_POST["how_much_garbage_garbage_clean_up"];
		// 		$where_to_garbage_clean_up = $_POST["where_to_garbage_clean_up"];
		// 		$how_to_deliver_garbage_clean_up = $_POST["how_to_deliver_garbage_clean_up"];
		// 		$comments_for_appointment_garbage_clean_up = $_POST["comments_for_appointment_garbage_clean_up"];
		// 		/********************* Step 4*******************/
		// 		$equipment_provided = $_POST["equipment_provided"];
		// 		if( $equipment_provided == "Yes" ){
		// 			$val_equipment_provided = "Yes, all of it";
		// 		}else if( $equipment_provided == "No" ){
		// 			$val_equipment_provided = "No, none of it";
		// 		}else if( $equipment_provided == "Some" ){
		// 			$val_equipment_provided = "Some of it";
		// 		}
		// 		$description_of_equipment = $_POST["description_of_equipment"];
		// 		$materials_provided = $_POST["materials_provided"];
		// 		if( $materials_provided == "Yes" ){
		// 			$val_materials_provided = "Yes, all of it";
		// 		}else if( $materials_provided == "No" ){
		// 			$val_materials_provided = "No, none of it";
		// 		}else if( $materials_provided == "Some" ){
		// 			$val_materials_provided = "Some of it";
		// 		}
		// 		$description_of_materials_required = $_POST["description_of_materials_required"];
		// 		$address_of_service_name = $_POST["address_of_service_name"];
		// 		$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 		$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		$sqlAddAnswersForJobPost = " INSERT INTO garage_shop_shed_cleaning (
		// 										Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8, A9, A10, Address, PostalCode, Time
		// 									 )
		// 									 VALUES (
		// 										'$Job_ID', '$Client_ID', '$date',
		// 										'$garage_shop_shed_cleaning_subservices',
		// 										'$floor_area_garbage_clean_up', '$how_much_garbage_garbage_clean_up',
		// 										'$where_to_garbage_clean_up', '$how_to_deliver_garbage_clean_up',
		// 										'$comments_for_appointment_garbage_clean_up',
		// 										'$val_equipment_provided', '$description_of_equipment',
		// 										'$val_materials_provided', '$description_of_materials_required',
		// 										'$address_of_service_name', '$address_of_service_postal_code', '$time_of_service'
		// 									 ) ";
		// 	}
		//
		// 	else if( $garage_shop_shed_cleaning_subservices ==  "organize_and_put_away_items" ){
		// 		$floor_area_organize_and_put_away_items = $_POST["floor_area_organize_and_put_away_items"];
		// 		$how_much_cluster_organize_and_put_away_items = $_POST["how_much_cluster_organize_and_put_away_items"];
		// 		$heavy_lifting_involved_organize_and_put_away_items = $_POST["heavy_lifting_involved_organize_and_put_away_items"];
		// 		$comments_for_appointment_organize_and_put_away_items = $_POST["comments_for_appointment_organize_and_put_away_items"];
		// 		/********************* Step 4*******************/
		// 		$equipment_provided = $_POST["equipment_provided"];
		// 		if( $equipment_provided == "Yes" ){
		// 			$val_equipment_provided = "Yes, all of it";
		// 		}else if( $equipment_provided == "No" ){
		// 			$val_equipment_provided = "No, none of it";
		// 		}else if( $equipment_provided == "Some" ){
		// 			$val_equipment_provided = "Some of it";
		// 		}
		// 		$description_of_equipment = $_POST["description_of_equipment"];
		// 		$materials_provided = $_POST["materials_provided"];
		// 		if( $materials_provided == "Yes" ){
		// 			$val_materials_provided = "Yes, all of it";
		// 		}else if( $materials_provided == "No" ){
		// 			$val_materials_provided = "No, none of it";
		// 		}else if( $materials_provided == "Some" ){
		// 			$val_materials_provided = "Some of it";
		// 		}
		// 		$description_of_materials_required = $_POST["description_of_materials_required"];
		// 		$address_of_service_name = $_POST["address_of_service_name"];
		// 		$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 		$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		$sqlAddAnswersForJobPost = " INSERT INTO garage_shop_shed_cleaning (
		// 										Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8, A9, Address, PostalCode, Time
		// 									 )
		// 									 VALUES (
		// 										'$Job_ID', '$Client_ID', '$date',
		// 										'$garage_shop_shed_cleaning_subservices',
		// 										'$floor_area_organize_and_put_away_items',
		// 										'$how_much_cluster_organize_and_put_away_items',
		// 										'$heavy_lifting_involved_organize_and_put_away_items',
		// 										'$comments_for_appointment_organize_and_put_away_items',
		// 										'$val_equipment_provided',
		// 										'$description_of_equipment', '$val_materials_provided',
		// 										'$description_of_materials_required', '$address_of_service_name', '$address_of_service_postal_code',
		// 										'$time_of_service'
		// 									 ) ";
		// 	}
		//
		// 	else if( $garage_shop_shed_cleaning_subservices ==  "other" ){
		// 		$type_of_items_other = $_POST["type_of_items_other"];
		// 		$details_of_service_other = $_POST["details_of_service_other"];
		// 		$number_of_hours_other = $_POST["number_of_hours_other"];
		// 		$comments_for_appointment_other = $_POST["comments_for_appointment_other"];
		// 		/********************* Step 4*******************/
		// 		$equipment_provided = $_POST["equipment_provided"];
		// 		if( $equipment_provided == "Yes" ){
		// 			$val_equipment_provided = "Yes, all of it";
		// 		}else if( $equipment_provided == "No" ){
		// 			$val_equipment_provided = "No, none of it";
		// 		}else if( $equipment_provided == "Some" ){
		// 			$val_equipment_provided = "Some of it";
		// 		}
		// 		$description_of_equipment = $_POST["description_of_equipment"];
		// 		$materials_provided = $_POST["materials_provided"];
		// 		if( $materials_provided == "Yes" ){
		// 			$val_materials_provided = "Yes, all of it";
		// 		}else if( $materials_provided == "No" ){
		// 			$val_materials_provided = "No, none of it";
		// 		}else if( $materials_provided == "Some" ){
		// 			$val_materials_provided = "Some of it";
		// 		}
		// 		$description_of_materials_required = $_POST["description_of_materials_required"];
		// 		$address_of_service_name = $_POST["address_of_service_name"];
		// 		$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 		$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		$sqlAddAnswersForJobPost = " INSERT INTO garage_shop_shed_cleaning (
		// 										Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8, A9, Address, PostalCode, Time
		// 									 )
		// 									 VALUES (
		// 										'$Job_ID', '$Client_ID', '$date',
		// 										'$garage_shop_shed_cleaning_subservices',
		// 										'$type_of_items_other', '$details_of_service_other',
		// 										'$number_of_hours_other', '$comments_for_appointment_other',
		// 										'$val_equipment_provided',
		// 										'$description_of_equipment', '$val_materials_provided',
		// 										'$description_of_materials_required', '$address_of_service_name', '$address_of_service_postal_code',
		// 										'$time_of_service'
		// 									 ) ";
		// 	}
		// 	/********************** Caching Answers / Dumping into Memory **********************/
		// }
		//
		//
		//
		//
		//
		//
		// else if( $job_category == "painting" ){
		// /********************** Caching Answers / Dumping into Memory **********************/
		// 	$painting_sub_service = $_POST["painting_sub_service"];
		// 	if( $painting_sub_service ==  "interior" ){
		// 		$spaces_to_paint = implode(', ', $_POST["spaces_to_paint"]);
		// 		$surfaces_to_paint = implode(', ', $_POST["surfaces_to_paint"]);
		// 		$area_to_paint = $_POST["area_to_paint"];
		// 		$height_of_ceiling = $_POST["height_of_ceiling"];
		// 		$coats_of_paint = $_POST["coats_of_paint"];
		// 		$kind_of_paint = implode(', ', $_POST["kind_of_paint"]);
		// 		$does_room_need_prep = $_POST["does_room_need_prep"];
		// 		$number_of_hours = $_POST["number_of_hours"];
		// 		$comments_for_appointment_garbage_clean_up = $_POST["comments_for_appointment_garbage_clean_up"];
		// 		/********************* Step 4*******************/
		// 		$equipment_provided = $_POST["equipment_provided"];
		// 		if( $equipment_provided == "Yes" ){
		// 			$val_equipment_provided = "Yes, all of it";
		// 		}else if( $equipment_provided == "No" ){
		// 			$val_equipment_provided = "No, none of it";
		// 		}else if( $equipment_provided == "Some" ){
		// 			$val_equipment_provided = "Some of it";
		// 		}
		// 		$description_of_equipment = $_POST["description_of_equipment"];
		// 		$materials_provided = $_POST["materials_provided"];
		// 		if( $materials_provided == "Yes" ){
		// 			$val_materials_provided = "Yes, all of it";
		// 		}else if( $materials_provided == "No" ){
		// 			$val_materials_provided = "No, none of it";
		// 		}else if( $materials_provided == "Some" ){
		// 			$val_materials_provided = "Some of it";
		// 		}
		// 		$description_of_materials_required = $_POST["description_of_materials_required"];
		// 		$address_of_service_name = $_POST["address_of_service_name"];
		// 		$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 		$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		$sqlAddAnswersForJobPost = " INSERT INTO painting (
		// 										Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8,
		// 										A9, A10, A11, A12, A13, A14, Address, PostalCode, Time
		// 									 )
		// 									 VALUES (
		// 										'$Job_ID', '$Client_ID', '$date',
		// 										'$painting_sub_service', '$spaces_to_paint',
		// 										'$surfaces_to_paint', '$area_to_paint',
		// 										'$height_of_ceiling', '$coats_of_paint',
		// 										'$kind_of_paint', '$does_room_need_prep',
		// 										'$number_of_hours', '$comments_for_appointment_garbage_clean_up',
		// 										'$val_equipment_provided', '$description_of_equipment',
		// 										'$val_materials_provided', '$description_of_materials_required',
		// 										'$address_of_service_name', '$address_of_service_postal_code', '$time_of_service'
		// 									 ) ";
		// 	}
		//
		// 	else if( $painting_sub_service ==  "exterior" ){
		// 		$type_of_residence = $_POST["type_of_residence"];
		// 		$how_many_stories = $_POST["how_many_stories"];
		// 		$number_of_hours = $_POST["number_of_hours"];
		// 		$how_many_stories = $_POST["how_many_stories"];
		// 		$what_to_paint = implode(', ', $_POST["what_to_paint"]);
		// 		$how_many_stories = $_POST["how_many_stories"];
		// 		$type_of_exterior = $_POST["type_of_exterior"];
		// 		$number_of_hours = $_POST["number_of_hours"];
		// 		$comments_for_appointment_painting = $_POST["comments_for_appointment_painting"];
		// 		/********************* Step 4*******************/
		// 		$equipment_provided = $_POST["equipment_provided"];
		// 		if( $equipment_provided == "Yes" ){
		// 			$val_equipment_provided = "Yes, all of it";
		// 		}else if( $equipment_provided == "No" ){
		// 			$val_equipment_provided = "No, none of it";
		// 		}else if( $equipment_provided == "Some" ){
		// 			$val_equipment_provided = "Some of it";
		// 		}
		// 		$description_of_equipment = $_POST["description_of_equipment"];
		// 		$materials_provided = $_POST["materials_provided"];
		// 		if( $materials_provided == "Yes" ){
		// 			$val_materials_provided = "Yes, all of it";
		// 		}else if( $materials_provided == "No" ){
		// 			$val_materials_provided = "No, none of it";
		// 		}else if( $materials_provided == "Some" ){
		// 			$val_materials_provided = "Some of it";
		// 		}
		// 		$description_of_materials_required = $_POST["description_of_materials_required"];
		// 		$address_of_service_name = $_POST["address_of_service_name"];
		// 		$address_of_service_name = $_POST["address_of_service_name"];
		// 		$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 		$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		$sqlAddAnswersForJobPost = " INSERT INTO painting (
		// 										Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8,
		// 										A9, A10, A11, A12, A13, A14, Address, PostalCode, Time
		// 									 )
		// 									 VALUES (
		// 										'$Job_ID', '$Client_ID', '$date',
		// 										'$painting_sub_service', '$type_of_residence',
		// 										'$how_many_stories', '$number_of_hours',
		// 										'$how_many_stories', '$what_to_paint',
		// 										'$how_many_stories', '$type_of_exterior',
		// 										'$number_of_hours', '$comments_for_appointment_painting',
		// 										'$val_equipment_provided', '$description_of_equipment',
		// 										'$val_materials_provided', '$description_of_materials_required',
		// 										'$address_of_service_name', '$address_of_service_postal_code', '$time_of_service'
		// 									 ) ";
		// 	}
		// }
		//
		//
		//
		//
		//
		//
		// else if( $job_category == "gutter_cleaning" ){
		// /********************** Caching Answers / Dumping into Memory **********************/
		// 	$floor_area = $_POST["floor_area"];
		// 	$how_many_stories = $_POST["how_many_stories"];
		// 	$length_of_gutter = $_POST["length_of_gutter"];
		// 	$how_long_since_last_cleanout = $_POST["how_long_since_last_cleanout"];
		// 	$comments_for_appointment = $_POST["comments_for_appointment"];
		// 	/********************* Step 4*******************/
		// 	$equipment_provided = $_POST["equipment_provided"];
		// 	if( $equipment_provided == "Yes" ){
		// 		$val_equipment_provided = "Yes, all of it";
		// 	}else if( $equipment_provided == "No" ){
		// 		$val_equipment_provided = "No, none of it";
		// 	}else if( $equipment_provided == "Some" ){
		// 		$val_equipment_provided = "Some of it";
		// 	}
		// 	$description_of_equipment = $_POST["description_of_equipment"];
		// 	$materials_provided = $_POST["materials_provided"];
		// 	if( $materials_provided == "Yes" ){
		// 		$val_materials_provided = "Yes, all of it";
		// 	}else if( $materials_provided == "No" ){
		// 		$val_materials_provided = "No, none of it";
		// 	}else if( $materials_provided == "Some" ){
		// 		$val_materials_provided = "Some of it";
		// 	}
		// 	$description_of_materials_required = $_POST["description_of_materials_required"];
		// 	$address_of_service_name = $_POST["address_of_service_name"];
		// 	$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 	$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		//
		// /********************** Caching Answers / Dumping into Memory **********************/
		// 	$sqlAddAnswersForJobPost = " INSERT INTO gutter_cleaning (
		// 									Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8, A9, Address, PostalCode, Time
		// 								 )
		// 								 VALUES (
		// 									'$Job_ID', '$Client_ID', '$date',
		// 									'$floor_area', '$how_many_stories',
		// 									'$length_of_gutter', '$how_long_since_last_cleanout',
		// 									'$comments_for_appointment', '$val_equipment_provided',
		// 									'$description_of_equipment', '$val_materials_provided',
		// 									'$description_of_materials_required', '$address_of_service_name', '$address_of_service_postal_code',
		// 									'$time_of_service'
		// 								 ) ";
		// }
		//
		//
		//
		//
		//
		//
		// else if( $job_category == "house_cleaning" ){
		// /********************** Caching Answers / Dumping into Memory **********************/
		// 	$recurring = $_POST["recurring"];
		// 	if( $_POST["recurring"] == "Yes" ){
		// 		$date = implode(", " , $_POST["date_of_venue"]);
		// 	}
		// 	else if( $_POST["recurring"] == "No" ){
		// 		$date = $_POST["date_of_venue"];
		// 	}
		//
		// 	$house_cleaning_subservices = implode(',', $_POST["house_cleaning_subservices"]);
		// 	if( isset($_POST["house_cleaning_subservices"]) && in_array('living_areas_and_bedrooms', $_POST["house_cleaning_subservices"]) ){
		// 		$how_many_bedrooms = $_POST["how_many_bedrooms"];
		// 		$how_many_living_rooms = $_POST["how_many_living_rooms"];
		// 	}else{
		// 		$how_many_bedrooms = "n_a";
		// 		$how_many_living_rooms = "n_a";
		// 	}
		// 	if( isset($_POST["house_cleaning_subservices"]) && in_array('bathrooms', $_POST["house_cleaning_subservices"]) ){
		// 		$how_many_bathrooms = $_POST["how_many_bathrooms"];
		// 	}else{
		// 		$how_many_bathrooms = "n_a";
		// 	}
		// 	if( isset($_POST["house_cleaning_subservices"]) && in_array('kitchens', $_POST["house_cleaning_subservices"]) ){
		// 		$how_many_kitchens = $_POST["how_many_kitchens"];
		// 	}else{
		// 		$how_many_kitchens = "n_a";
		// 	}
		// 	if( isset($_POST["house_cleaning_subservices"]) && in_array('laundry_package', $_POST["house_cleaning_subservices"]) ){
		// 		$loads_of_laundry = $_POST["loads_of_laundry"];
		// 		$type_and_number_of_laundry = $_POST["type_and_number_of_laundry"];
		// 	}else{
		// 		$loads_of_laundry = "n_a";
		// 		$type_and_number_of_laundry = "n_a";
		// 	}
		// 	if( isset($_POST["house_cleaning_subservices"]) && in_array('deep_cleaning_packages', $_POST["house_cleaning_subservices"]) ){
		// 		$how_many_windowns_and_doors = $_POST["how_many_windowns_and_doors"];
		// 		$avg_size_of_windows = $_POST["avg_size_of_windows"];
		// 	}else{
		// 		$how_many_windowns_and_doors = "n_a";
		// 		$avg_size_of_windows = "n_a";
		// 	}
		// 	/********************* Step 4*******************/
		// 	$type_of_residence_house_cleaning = $_POST["type_of_residence_house_cleaning"];
		// 	$total_floor_area_house_cleaning = $_POST["total_floor_area_house_cleaning"];
		// 	$carpet_floor_area_house_cleaing = $_POST["carpet_floor_area_house_cleaing"];
		// 	$how_many_stories_house_cleaning = $_POST["how_many_stories_house_cleaning"];
		// 	$cleaning_product_preference = $_POST["cleaning_product_preference"];
		// 	$pets_that_shed_house_cleaning = $_POST["pets_that_shed_house_cleaning"];
		// 	$equipment_provided = $_POST["equipment_provided"];
		// 	if( $equipment_provided == "Yes" ){
		// 		$val_equipment_provided = "Yes, all of it";
		// 	}else if( $equipment_provided == "No" ){
		// 		$val_equipment_provided = "No, none of it";
		// 	}else if( $equipment_provided == "Some" ){
		// 		$val_equipment_provided = "Some of it";
		// 	}
		// 	$description_of_equipment = $_POST["description_of_equipment"];
		// 	$materials_provided = $_POST["materials_provided"];
		// 	if( $materials_provided == "Yes" ){
		// 		$val_materials_provided = "Yes, all of it";
		// 	}else if( $materials_provided == "No" ){
		// 		$val_materials_provided = "No, none of it";
		// 	}else if( $materials_provided == "Some" ){
		// 		$val_materials_provided = "Some of it";
		// 	}
		// 	$description_of_materials_required = $_POST["description_of_materials_required"];
		// 	$address_of_service_name = $_POST["address_of_service_name"];
		// 	$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 	$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// /********************** Caching Answers / Dumping into Memory **********************/
		// 	$sqlAddAnswersForJobPost = " INSERT INTO house_cleaning (
		// 									Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8,
		// 									A9, A10, A11, A12, A13, A14, A15, A16, A17, A18, A19,
		// 									Address, PostalCode, Time
		// 								 )
		// 								 VALUES (
		// 									'$Job_ID', '$Client_ID', '$date',
		// 									'$house_cleaning_subservices', '$how_many_bedrooms',
		// 									'$how_many_living_rooms', '$how_many_bathrooms',
		// 									'$how_many_kitchens', '$loads_of_laundry',
		// 									'$type_and_number_of_laundry', '$how_many_windowns_and_doors',
		// 									'$avg_size_of_windows', '$type_of_residence_house_cleaning',
		// 									'$total_floor_area_house_cleaning', '$carpet_floor_area_house_cleaing',
		// 									'$how_many_stories_house_cleaning', '$cleaning_product_preference',
		// 									'$pets_that_shed_house_cleaning', '$val_equipment_provided',
		// 									'$description_of_equipment', '$val_materials_provided',
		// 									'$description_of_materials_required', '$address_of_service_name', '$address_of_service_postal_code',
		// 									'$time_of_service'
		// 								 ) ";
		// }
		//
		//
		//
		//
		//
		//
		// 		else if( $job_category == "international_languages" ){
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$recurring = $_POST["recurring"];
		// 			if( $_POST["recurring"] == "Yes" ){
		// 				$date = implode(", " , $_POST["date_of_venue"]);
		// 			}
		// 			else if( $_POST["recurring"] == "No" ){
		// 				$date = $_POST["date_of_venue"];
		// 			}
		//
		// 			$age_group = $_POST["age_group"];
		// 			$languages_spoken = $_POST["languages_spoken"];
		// 			$languages_to_learn = $_POST["languages_to_learn"];
		// 			$reason_for_learning_language = implode(',', $_POST["reason_for_learning_language"]);
		// 			$comments_for_appointment = $_POST["comments_for_appointment"];
		// 			/********************* Step 4*******************/
		// 			$equipment_provided = $_POST["equipment_provided"];
		// 			if( $equipment_provided == "Yes" ){
		// 				$val_equipment_provided = "Yes, all of it";
		// 			}else if( $equipment_provided == "No" ){
		// 				$val_equipment_provided = "No, none of it";
		// 			}else if( $equipment_provided == "Some" ){
		// 				$val_equipment_provided = "Some of it";
		// 			}
		// 			$description_of_equipment = $_POST["description_of_equipment"];
		// 			$materials_provided = $_POST["materials_provided"];
		// 			if( $materials_provided == "Yes" ){
		// 				$val_materials_provided = "Yes, all of it";
		// 			}else if( $materials_provided == "No" ){
		// 				$val_materials_provided = "No, none of it";
		// 			}else if( $materials_provided == "Some" ){
		// 				$val_materials_provided = "Some of it";
		// 			}
		// 			$description_of_materials_required = $_POST["description_of_materials_required"];
		// 			$address_of_service_name = $_POST["address_of_service_name"];
		// 			$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 			$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$sqlAddAnswersForJobPost = " INSERT INTO international_languages (
		// 											Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8, A9, Address, PostalCode, Time
		// 										 )
		// 										 VALUES (
		// 											'$Job_ID', '$Client_ID', '$date',
		// 											'$age_group', '$languages_spoken',
		// 											'$languages_to_learn', '$reason_for_learning_language',
		// 											'$comments_for_appointment', '$val_equipment_provided',
		// 											'$description_of_equipment', '$val_materials_provided',
		// 											'$description_of_materials_required', '$address_of_service_name', '$address_of_service_postal_code',
		// 											'$time_of_service'
		// 										 ) ";
		// 		}
		//
		//
		//
		//
		//
		//
		// 		else if( $job_category == "landscaping" ){
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$landscaping_subservices = implode(',', $_POST["landscaping_subservices"]);
		// 			$scope_of_work = $_POST["scope_of_work"];
		// 			$quantity_of_work = $_POST["quantity_of_work"];
		// 			$how_many_hours = $_POST["how_many_hours"];
		// 			$special_working_conditions = $_POST["special_working_conditions"];
		// 			$comments_for_appointment = $_POST["comments_for_appointment"];
		// 			/********************* Step 4*******************/
		// 			$equipment_provided = $_POST["equipment_provided"];
		// 			if( $equipment_provided == "Yes" ){
		// 				$val_equipment_provided = "Yes, all of it";
		// 			}else if( $equipment_provided == "No" ){
		// 				$val_equipment_provided = "No, none of it";
		// 			}else if( $equipment_provided == "Some" ){
		// 				$val_equipment_provided = "Some of it";
		// 			}
		// 			$description_of_equipment = $_POST["description_of_equipment"];
		// 			$materials_provided = $_POST["materials_provided"];
		// 			if( $materials_provided == "Yes" ){
		// 				$val_materials_provided = "Yes, all of it";
		// 			}else if( $materials_provided == "No" ){
		// 				$val_materials_provided = "No, none of it";
		// 			}else if( $materials_provided == "Some" ){
		// 				$val_materials_provided = "Some of it";
		// 			}
		// 			$description_of_materials_required = $_POST["description_of_materials_required"];
		// 			$address_of_service_name = $_POST["address_of_service_name"];
		// 			$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 			$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$sqlAddAnswersForJobPost = " INSERT INTO landscaping (
		// 											Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8, A9, A10, Address, PostalCode, Time
		// 										 )
		// 										 VALUES (
		// 											'$Job_ID', '$Client_ID', '$date',
		// 											'$landscaping_subservices', '$scope_of_work',
		// 											'$quantity_of_work', '$how_many_hours',
		// 											'$special_working_conditions', '$comments_for_appointment',
		// 											'$val_equipment_provided', '$description_of_equipment',
		// 											'$val_materials_provided', '$description_of_materials_required',
		// 											'$address_of_service_name', '$address_of_service_postal_code', '$time_of_service'
		// 										 ) ";
		// 		}
		//
		//
		//
		//
		//
		//
		// 		else if( $job_category == "moving" ){
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$vehicle_required = $_POST["vehicle_required"];
		// 			$heavy_lifting_involved = $_POST["heavy_lifting_involved"];
		// 			$how_many_hours = $_POST["how_many_hours"];
		// 			$comments_for_appointment = $_POST["comments_for_appointment"];
		// 			/********************* Step 4*******************/
		// 			$equipment_provided = $_POST["equipment_provided"];
		// 			if( $equipment_provided == "Yes" ){
		// 				$val_equipment_provided = "Yes, all of it";
		// 			}else if( $equipment_provided == "No" ){
		// 				$val_equipment_provided = "No, none of it";
		// 			}else if( $equipment_provided == "Some" ){
		// 				$val_equipment_provided = "Some of it";
		// 			}
		// 			$description_of_equipment = $_POST["description_of_equipment"];
		// 			$materials_provided = $_POST["materials_provided"];
		// 			if( $materials_provided == "Yes" ){
		// 				$val_materials_provided = "Yes, all of it";
		// 			}else if( $materials_provided == "No" ){
		// 				$val_materials_provided = "No, none of it";
		// 			}else if( $materials_provided == "Some" ){
		// 				$val_materials_provided = "Some of it";
		// 			}
		// 			$description_of_materials_required = $_POST["description_of_materials_required"];
		// 			$address_of_service_name = $_POST["address_of_service_name"];
		// 			$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 			$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$sqlAddAnswersForJobPost = " INSERT INTO moving (
		// 											Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8, Address, PostalCode, Time
		// 										 )
		// 										 VALUES (
		// 											'$Job_ID', '$Client_ID', '$date',
		// 											'$vehicle_required', '$heavy_lifting_involved',
		// 											'$how_many_hours', '$comments_for_appointment',
		// 											'$val_equipment_provided', '$description_of_equipment',
		// 											'$val_materials_provided', '$description_of_materials_required',
		// 											'$address_of_service_name', '$address_of_service_postal_code', '$time_of_service'
		// 										 ) ";
		// 		}
		//
		//
		//
		//
		//
		//
		// 		else if( $job_category == "music_lessons" ){
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$recurring = $_POST["recurring"];
		// 			if( $_POST["recurring"] == "Yes" ){
		// 				$date = implode(", " , $_POST["date_of_venue"]);
		// 			}
		// 			else if( $_POST["recurring"] == "No" ){
		// 				$date = $_POST["date_of_venue"];
		// 			}
		//
		// 			$current_proficiency = $_POST["current_proficiency"];
		// 			$comments_for_appointment = $_POST["comments_for_appointment"];
		// 			/********************* Step 4*******************/
		// 			$equipment_provided = $_POST["equipment_provided"];
		// 			if( $equipment_provided == "Yes" ){
		// 				$val_equipment_provided = "Yes, all of it";
		// 			}else if( $equipment_provided == "No" ){
		// 				$val_equipment_provided = "No, none of it";
		// 			}else if( $equipment_provided == "Some" ){
		// 				$val_equipment_provided = "Some of it";
		// 			}
		// 			$description_of_equipment = $_POST["description_of_equipment"];
		// 			$materials_provided = $_POST["materials_provided"];
		// 			if( $materials_provided == "Yes" ){
		// 				$val_materials_provided = "Yes, all of it";
		// 			}else if( $materials_provided == "No" ){
		// 				$val_materials_provided = "No, none of it";
		// 			}else if( $materials_provided == "Some" ){
		// 				$val_materials_provided = "Some of it";
		// 			}
		// 			$description_of_materials_required = $_POST["description_of_materials_required"];
		// 			$address_of_service_name = $_POST["address_of_service_name"];
		// 			$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 			$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$sqlAddAnswersForJobPost = " INSERT INTO music_lessons (
		// 											Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, Address, PostalCode, Time
		// 										 )
		// 										 VALUES (
		// 											'$Job_ID', '$Client_ID', '$date',
		// 											'$current_proficiency', '$comments_for_appointment',
		// 											'$val_equipment_provided', '$description_of_equipment',
		// 											'$val_materials_provided', '$description_of_materials_required',
		// 											'$address_of_service_name', '$address_of_service_postal_code', '$time_of_service'
		// 										 ) ";
		// 		}
		//
		//
		//
		//
		//
		//
		// 		else if( $job_category == "outdoor_seasonal_decorations" ){
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$recurring = $_POST["recurring"];
		// 			if( $_POST["recurring"] == "Yes" ){
		// 				$date = implode(", " , $_POST["date_of_venue"]);
		// 			}
		// 			else if( $_POST["recurring"] == "No" ){
		// 				$date = $_POST["date_of_venue"];
		// 			}
		//
		// 			$outdoor_seasonal_decorations_subservices = implode(',', $_POST["outdoor_seasonal_decorations_subservices"]);
		// 			$floor_area = $_POST["floor_area"];
		// 			$how_many_stories = $_POST["how_many_stories"];
		// 			$how_many_hours = $_POST["how_many_hours"];
		// 			if( isset($_POST["outdoor_seasonal_decorations_subservices"]) && in_array('install_decorations', $_POST["outdoor_seasonal_decorations_subservices"]) ){
		// 				$type_and_amount_to_be_installed = $_POST["type_and_amount_to_be_installed"];
		// 			}else{
		// 				$type_and_amount_to_be_installed = "n_a";
		// 			}
		// 			if( isset($_POST["outdoor_seasonal_decorations_subservices"]) && in_array('take_down_decorations', $_POST["outdoor_seasonal_decorations_subservices"]) ){
		// 				$type_and_amount_to_be_taken_down = $_POST["type_and_amount_to_be_taken_down"];
		// 			}else{
		// 				$type_and_amount_to_be_taken_down = "n_a";
		// 			}
		// 			$comments_for_appointment = $_POST["comments_for_appointment"];
		// 			/********************* Step 4*******************/
		// 			$equipment_provided = $_POST["equipment_provided"];
		// 			if( $equipment_provided == "Yes" ){
		// 				$val_equipment_provided = "Yes, all of it";
		// 			}else if( $equipment_provided == "No" ){
		// 				$val_equipment_provided = "No, none of it";
		// 			}else if( $equipment_provided == "Some" ){
		// 				$val_equipment_provided = "Some of it";
		// 			}
		// 			$description_of_equipment = $_POST["description_of_equipment"];
		// 			$materials_provided = $_POST["materials_provided"];
		// 			if( $materials_provided == "Yes" ){
		// 				$val_materials_provided = "Yes, all of it";
		// 			}else if( $materials_provided == "No" ){
		// 				$val_materials_provided = "No, none of it";
		// 			}else if( $materials_provided == "Some" ){
		// 				$val_materials_provided = "Some of it";
		// 			}
		// 			$description_of_materials_required = $_POST["description_of_materials_required"];
		// 			$address_of_service_name = $_POST["address_of_service_name"];
		// 			$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 			$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$sqlAddAnswersForJobPost = " INSERT INTO outdoor_seasonal_decorations (
		// 											Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8, A9, A10, A11, Address, PostalCode, Time
		// 										 )
		// 										 VALUES (
		// 											'$Job_ID', '$Client_ID', '$date',
		// 											'$outdoor_seasonal_decorations_subservices', '$floor_area',
		// 											'$how_many_stories', '$how_many_hours',
		// 											'$type_and_amount_to_be_installed', '$type_and_amount_to_be_taken_down',
		// 											'$comments_for_appointment',
		// 											'$val_equipment_provided', '$description_of_equipment',
		// 											'$val_materials_provided', '$description_of_materials_required',
		// 											'$address_of_service_name', '$address_of_service_postal_code', '$time_of_service'
		// 										 ) ";
		// 		}
		//
		//
		//
		//
		//
		//
		// 		else if( $job_category == "pressure_washing" ){
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$pressure_washing_subservices = implode(',', $_POST["pressure_washing_subservices"]);
		// 			if( isset($_POST["pressure_washing_subservices"]) && in_array('patio_stone_and_walkways', $_POST["pressure_washing_subservices"]) ){
		// 				$area_to_be_washed = $_POST["area_to_be_washed"];
		// 			}else{
		// 				$area_to_be_washed = "n_a";
		// 			}
		// 			if( isset($_POST["outdoor_seasonal_decorations_subservices"]) && in_array('driveways', $_POST["outdoor_seasonal_decorations_subservices"]) ){
		// 				$area_of_driveway = $_POST["area_of_driveway"];
		// 			}else{
		// 				$area_of_driveway = "n_a";
		// 			}
		// 			if( isset($_POST["outdoor_seasonal_decorations_subservices"]) && in_array('exterior_walls', $_POST["outdoor_seasonal_decorations_subservices"]) ){
		// 				$type_of_structure = $_POST["type_of_structure"];
		// 				$length_of_structure = $_POST["length_of_structure"];
		// 				$how_many_stories = $_POST["how_many_stories"];
		// 			}else{
		// 				$type_of_structure = "n_a";
		// 				$length_of_structure = "n_a";
		// 				$how_many_stories = "n_a";
		// 			}
		// 			if( isset($_POST["outdoor_seasonal_decorations_subservices"]) && in_array('deck_surfaces', $_POST["outdoor_seasonal_decorations_subservices"]) ){
		// 				$area_of_deck = $_POST["area_of_deck"];
		// 			}else{
		// 				$area_of_deck = "n_a";
		// 			}
		// 			if( isset($_POST["outdoor_seasonal_decorations_subservices"]) && in_array('fences', $_POST["outdoor_seasonal_decorations_subservices"]) ){
		// 				$length_of_fence = $_POST["length_of_fence"];
		// 				$height_of_fence = $_POST["height_of_fence"];
		// 				$sides_of_fence_to_wash = $_POST["sides_of_fence_to_wash"];
		// 			}else{
		// 				$length_of_fence = "n_a";
		// 				$height_of_fence = "n_a";
		// 				$sides_of_fence_to_wash = "n_a";
		// 			}
		// 			if( isset($_POST["outdoor_seasonal_decorations_subservices"]) && in_array('other_pressure_washing', $_POST["outdoor_seasonal_decorations_subservices"]) ){
		// 				$describe_surface_to_be_washed = $_POST["describe_surface_to_be_washed"];
		// 				$area_of_surface = $_POST["area_of_surface"];
		// 				$how_many_hours = $_POST["how_many_hours"];
		// 			}else{
		// 				$describe_surface_to_be_washed = "n_a";
		// 				$area_of_surface = "n_a";
		// 				$how_many_hours = "n_a";
		// 			}
		// 			$comments_for_appointment = $_POST["comments_for_appointment"];
		// 			/********************* Step 4*******************/
		// 			$equipment_provided = $_POST["equipment_provided"];
		// 			if( $equipment_provided == "Yes" ){
		// 				$val_equipment_provided = "Yes, all of it";
		// 			}else if( $equipment_provided == "No" ){
		// 				$val_equipment_provided = "No, none of it";
		// 			}else if( $equipment_provided == "Some" ){
		// 				$val_equipment_provided = "Some of it";
		// 			}
		// 			$description_of_equipment = $_POST["description_of_equipment"];
		// 			$materials_provided = $_POST["materials_provided"];
		// 			if( $materials_provided == "Yes" ){
		// 				$val_materials_provided = "Yes, all of it";
		// 			}else if( $materials_provided == "No" ){
		// 				$val_materials_provided = "No, none of it";
		// 			}else if( $materials_provided == "Some" ){
		// 				$val_materials_provided = "Some of it";
		// 			}
		// 			$description_of_materials_required = $_POST["description_of_materials_required"];
		// 			$address_of_service_name = $_POST["address_of_service_name"];
		// 			$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 			$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$sqlAddAnswersForJobPost = " INSERT INTO pressure_washing (
		// 											Job_ID, Client_ID, Date, A1, A2, A3, A4, A5, A6, A7, A8,
		// 											A9, A10, A11, A12, A13, A14, A15, A16, A17, A18, Address, PostalCode, Time
		// 										 )
		// 										 VALUES (
		// 											'$Job_ID', '$Client_ID', '$date',
		// 											'$pressure_washing_subservices', '$area_to_be_washed',
		// 											'$area_of_driveway', '$type_of_structure',
		// 											'$length_of_structure', '$how_many_stories',
		// 											'$area_of_deck', '$length_of_fence',
		// 											'$height_of_fence', '$sides_of_fence_to_wash',
		// 											'$describe_surface_to_be_washed', '$area_of_surface',
		// 											'$how_many_hours', '$comments_for_appointment',
		// 											'$val_equipment_provided', '$description_of_equipment',
		// 											'$val_materials_provided', '$description_of_materials_required',
		// 											'$address_of_service_name', '$address_of_service_postal_code', '$time_of_service'
		// 										 ) ";
		// 		}
		//
		//
		//
		//
		//
		//
		// 		else if( $job_category == "private_event_assistance" ){
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$private_event_assistance_subservices = implode(',', $_POST["private_event_assistance_subservices"]);
		// 			$type_of_event = $_POST["type_of_event"];
		// 			$how_many_guests = $_POST["how_many_guests"];
		// 			$how_many_hours = $_POST["how_many_hours"];
		// 			$describe_duties = $_POST["describe_duties"];
		// 			$comments_for_appointment = $_POST["comments_for_appointment"];
		// 			/********************* Step 4*******************/
		// 			$equipment_provided = $_POST["equipment_provided"];
		// 			if( $equipment_provided == "Yes" ){
		// 				$val_equipment_provided = "Yes, all of it";
		// 			}else if( $equipment_provided == "No" ){
		// 				$val_equipment_provided = "No, none of it";
		// 			}else if( $equipment_provided == "Some" ){
		// 				$val_equipment_provided = "Some of it";
		// 			}
		// 			$description_of_equipment = $_POST["description_of_equipment"];
		// 			$materials_provided = $_POST["materials_provided"];
		// 			if( $materials_provided == "Yes" ){
		// 				$val_materials_provided = "Yes, all of it";
		// 			}else if( $materials_provided == "No" ){
		// 				$val_materials_provided = "No, none of it";
		// 			}else if( $materials_provided == "Some" ){
		// 				$val_materials_provided = "Some of it";
		// 			}
		// 			$description_of_materials_required = $_POST["description_of_materials_required"];
		// 			$address_of_service_name = $_POST["address_of_service_name"];
		// 			$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 			$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$sqlAddAnswersForJobPost = " INSERT INTO private_event_assistance (
		// 											Job_ID, Client_ID, Date, A1, A2, A3,
		// 											A4, A5, A6, A7, A8, A9, A10, Address, PostalCode, Time
		// 										 )
		// 										 VALUES (
		// 											'$Job_ID', '$Client_ID', '$date',
		// 											'$private_event_assistance_subservices', '$type_of_event',
		// 											'$how_many_guests', '$how_many_hours',
		// 											'$describe_duties', '$comments_for_appointment',
		// 											'$val_equipment_provided', '$description_of_equipment',
		// 											'$val_materials_provided', '$description_of_materials_required',
		// 											'$address_of_service_name', '$address_of_service_postal_code','$time_of_service'
		// 										 ) ";
		// 		}
		//
		//
		//
		//
		//
		// 		else if( $job_category == "rv_boat_cleaning" ){
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$recurring = $_POST["recurring"];
		// 			if( $_POST["recurring"] == "Yes" ){
		// 				$date = implode(", " , $_POST["date_of_venue"]);
		// 			}
		// 			else if( $_POST["recurring"] == "No" ){
		// 				$date = $_POST["date_of_venue"];
		// 			}
		//
		// 			$rv_boat_cleaning_subservices = implode(',', $_POST["rv_boat_cleaning_subservices"]);
		// 			$type_of_vehicle = $_POST["type_of_vehicle"];
		// 			$length_of_vehicle = $_POST["length_of_vehicle"];
		// 			if( isset($_POST["rv_boat_cleaning_subservices"]) && in_array('interior_quick_cleanup_package', $_POST["rv_boat_cleaning_subservices"]) ){
		// 				$vehicle_amenities_interior_quick_cleanup_package = implode(',', $_POST["vehicle_amenities_interior_quick_cleanup_package"]);
		// 				$floor_carpet_area_interior_quick_cleanup_package = $_POST["floor_carpet_area_interior_quick_cleanup_package"];
		// 				$current_state_of_space_interior_quick_cleanup_package = $_POST["current_state_of_space_interior_quick_cleanup_package"];
		// 			}else{
		// 				$vehicle_amenities_interior_quick_cleanup_package = "n_a";
		// 				$floor_carpet_area_interior_quick_cleanup_package = "n_a";
		// 				$current_state_of_space_interior_quick_cleanup_package = "n_a";
		// 			}
		// 			if( isset($_POST["rv_boat_cleaning_subservices"]) && in_array('interior_full_cleaning_package', $_POST["rv_boat_cleaning_subservices"]) ){
		// 				$vehicle_amenities_interior_full_cleaning_package = implode(',', $_POST["vehicle_amenities_interior_full_cleaning_package"]);
		// 				$floor_carpet_area_interior_full_cleaning_package = $_POST["floor_carpet_area_interior_full_cleaning_package"];
		// 				$current_state_of_space_interior_full_cleaning_package = $_POST["current_state_of_space_interior_full_cleaning_package"];
		// 			}else{
		// 				$vehicle_amenities_interior_full_cleaning_package = "n_a";
		// 				$floor_carpet_area_interior_full_cleaning_package = "n_a";
		// 				$current_state_of_space_interior_full_cleaning_package = "n_a";
		// 			}
		// 			if( isset($_POST["rv_boat_cleaning_subservices"]) && in_array('othe_rv_boat_cleaning', $_POST["rv_boat_cleaning_subservices"]) ){
		// 				$what_to_clear_othe_rv_boat_cleaning = $_POST["what_to_clear_othe_rv_boat_cleaning"];
		// 				$how_many_hours_othe_rv_boat_cleaning = $_POST["how_many_hours_othe_rv_boat_cleaning"];
		// 			}else{
		// 				$what_to_clear_othe_rv_boat_cleaning = "n_a";
		// 				$how_many_hours_othe_rv_boat_cleaning = "n_a";
		// 			}
		// 			$comments_for_appointment = $_POST["comments_for_appointment"];
		// 			/********************* Step 4*******************/
		// 			$equipment_provided = $_POST["equipment_provided"];
		// 			if( $equipment_provided == "Yes" ){
		// 				$val_equipment_provided = "Yes, all of it";
		// 			}else if( $equipment_provided == "No" ){
		// 				$val_equipment_provided = "No, none of it";
		// 			}else if( $equipment_provided == "Some" ){
		// 				$val_equipment_provided = "Some of it";
		// 			}
		// 			$description_of_equipment = $_POST["description_of_equipment"];
		// 			$materials_provided = $_POST["materials_provided"];
		// 			if( $materials_provided == "Yes" ){
		// 				$val_materials_provided = "Yes, all of it";
		// 			}else if( $materials_provided == "No" ){
		// 				$val_materials_provided = "No, none of it";
		// 			}else if( $materials_provided == "Some" ){
		// 				$val_materials_provided = "Some of it";
		// 			}
		// 			$description_of_materials_required = $_POST["description_of_materials_required"];
		// 			$address_of_service_name = $_POST["address_of_service_name"];
		// 			$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 			$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$sqlAddAnswersForJobPost = " INSERT INTO rv_boat_cleaning (
		// 											Job_ID, Client_ID, Date, A1, A2, A3,
		// 											A4, A5, A6, A7, A8, A9, A10, A11, A12,
		// 											A13, A14, A15, A16, Address, PostalCode, Time
		// 										 )
		// 										 VALUES (
		// 											'$Job_ID', '$Client_ID', '$date',
		// 											'$rv_boat_cleaning_subservices',
		// 											'$type_of_vehicle',
		// 											'$length_of_vehicle',
		// 											'$vehicle_amenities_interior_quick_cleanup_package',
		// 											'$floor_carpet_area_interior_quick_cleanup_package',
		// 											'$current_state_of_space_interior_quick_cleanup_package',
		// 											'$vehicle_amenities_interior_full_cleaning_package',
		// 											'$floor_carpet_area_interior_full_cleaning_package',
		// 											'$current_state_of_space_interior_full_cleaning_package',
		// 											'$what_to_clear_othe_rv_boat_cleaning',
		// 											'$how_many_hours_othe_rv_boat_cleaning',
		// 											'$comments_for_appointment',
		// 											'$val_equipment_provided',
		// 											'$description_of_equipment',
		// 											'$val_materials_provided',
		// 											'$description_of_materials_required',
		// 											'$address_of_service_name', '$address_of_service_postal_code',
		// 											'$time_of_service'
		// 										 ) ";
		// 		}
		//
		//
		//
		//
		//
		// 		else if( $job_category == "snow_removal" ){
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$snow_removal_subservices = implode(',', $_POST["snow_removal_subservices"]);
		// 			if( isset($_POST["snow_removal_subservices"]) && in_array('shovel_driveway', $_POST["snow_removal_subservices"]) ){
		// 				$area_of_driveway_shovel_driveway = $_POST["area_of_driveway_shovel_driveway"];
		// 				$depth_of_snow_shovel_driveway = $_POST["depth_of_snow_shovel_driveway"];
		// 				$steepness_of_surface_shovel_driveway = $_POST["steepness_of_surface_shovel_driveway"];
		// 			}else{
		// 				$area_of_driveway_shovel_driveway = "n_a";
		// 				$depth_of_snow_shovel_driveway = "n_a";
		// 				$steepness_of_surface_shovel_driveway = "n_a";
		// 			}
		// 			if( isset($_POST["snow_removal_subservices"]) && in_array('gravel_salt_driveway', $_POST["snow_removal_subservices"]) ){
		// 				$area_of_driveway_gravel_salt_driveway = $_POST["area_of_driveway_gravel_salt_driveway"];
		// 			}else{
		// 				$area_of_driveway_gravel_salt_driveway = "n_a";
		// 			}
		// 			if( isset($_POST["snow_removal_subservices"]) && in_array('shovel_walkways', $_POST["snow_removal_subservices"]) ){
		// 				$area_of_walkways_shovel_walkways = $_POST["area_of_walkways_shovel_walkways"];
		// 				$depth_of_snow_shovel_walkways = $_POST["depth_of_snow_shovel_walkways"];
		// 			}else{
		// 				$area_of_walkways_shovel_walkways = "n_a";
		// 				$depth_of_snow_shovel_walkways = "n_a";
		// 			}
		// 			if( isset($_POST["snow_removal_subservices"]) && in_array('gravel_salt_walkways', $_POST["snow_removal_subservices"]) ){
		// 				$area_of_walkways_gravel_salt_walkways = $_POST["area_of_walkways_gravel_salt_walkways"];
		// 			}else{
		// 				$area_of_walkways_gravel_salt_walkways = "n_a";
		// 			}
		// 			if( isset($_POST["snow_removal_subservices"]) && in_array('shovel_sidewalk', $_POST["snow_removal_subservices"]) ){
		// 				$area_of_walkways_shovel_sidewalk = $_POST["area_of_walkways_shovel_sidewalk"];
		// 				$depth_of_snow_shovel_sidewalk = $_POST["depth_of_snow_shovel_sidewalk"];
		// 			}else{
		// 				$area_of_walkways_shovel_sidewalk = "n_a";
		// 				$depth_of_snow_shovel_sidewalk = "n_a";
		// 			}
		// 			if( isset($_POST["snow_removal_subservices"]) && in_array('gravel_salt_sidewalk', $_POST["snow_removal_subservices"]) ){
		// 				$area_of_walkways_gravel_salt_sidewalk = $_POST["area_of_walkways_gravel_salt_sidewalk"];
		// 			}else{
		// 				$area_of_walkways_gravel_salt_sidewalk = "n_a";
		// 			}
		// 			if( isset($_POST["snow_removal_subservices"]) && in_array('shovel_patios_and_decks', $_POST["snow_removal_subservices"]) ){
		// 				$area_of_walkways_shovel_patios_and_decks = $_POST["area_of_walkways_shovel_patios_and_decks"];
		// 				$depth_of_snow_shovel_patios_and_decks = $_POST["depth_of_snow_shovel_patios_and_decks"];
		// 			}else{
		// 				$area_of_walkways_shovel_patios_and_decks = "n_a";
		// 				$depth_of_snow_shovel_patios_and_decks = "n_a";
		// 			}
		// 			if( isset($_POST["snow_removal_subservices"]) && in_array('gravel_salt_patios_and_decks', $_POST["snow_removal_subservices"]) ){
		// 				$area_of_walkways_gravel_salt_patios_and_decks = $_POST["area_of_walkways_gravel_salt_patios_and_decks"];
		// 			}else{
		// 				$area_of_walkways_gravel_salt_patios_and_decks = "n_a";
		// 			}
		// 			if( isset($_POST["snow_removal_subservices"]) && in_array('break_and_remove_surface_ice_build_up', $_POST["snow_removal_subservices"]) ){
		// 				$area_of_walkways_break_and_remove_surface_ice_build_up = $_POST["area_of_walkways_break_and_remove_surface_ice_build_up"];
		// 				$depth_of_snow_break_and_remove_surface_ice_build_up = $_POST["depth_of_snow_break_and_remove_surface_ice_build_up"];
		// 			}else{
		// 				$area_of_walkways_break_and_remove_surface_ice_build_up = "n_a";
		// 				$depth_of_snow_break_and_remove_surface_ice_build_up = "n_a";
		// 			}
		// 			$comments_for_appointment = $_POST["comments_for_appointment"];
		// 			/********************* Step 4*******************/
		// 			$equipment_provided = $_POST["equipment_provided"];
		// 			if( $equipment_provided == "Yes" ){
		// 				$val_equipment_provided = "Yes, all of it";
		// 			}else if( $equipment_provided == "No" ){
		// 				$val_equipment_provided = "No, none of it";
		// 			}else if( $equipment_provided == "Some" ){
		// 				$val_equipment_provided = "Some of it";
		// 			}
		// 			$description_of_equipment = $_POST["description_of_equipment"];
		// 			$materials_provided = $_POST["materials_provided"];
		// 			if( $materials_provided == "Yes" ){
		// 				$val_materials_provided = "Yes, all of it";
		// 			}else if( $materials_provided == "No" ){
		// 				$val_materials_provided = "No, none of it";
		// 			}else if( $materials_provided == "Some" ){
		// 				$val_materials_provided = "Some of it";
		// 			}
		// 			$description_of_materials_required = $_POST["description_of_materials_required"];
		// 			$address_of_service_name = $_POST["address_of_service_name"];
		// 			$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 			$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$sqlAddAnswersForJobPost = " INSERT INTO snow_removal (
		// 											Job_ID, Client_ID, Date,
		// 											A1, A2, A3, A4, A5, A6,
		// 											A7, A8, A9, A10, A11,
		// 											A12, A13, A14, A15, A16,
		// 											A17, A18, A19, A20, A21,
		// 											Address, PostalCode, Time
		// 										 )
		// 										 VALUES (
		// 											'$Job_ID', '$Client_ID', '$date',
		// 											'$snow_removal_subservices',
		// 											'$area_of_driveway_shovel_driveway',
		// 											'$depth_of_snow_shovel_driveway',
		// 											'$steepness_of_surface_shovel_driveway',
		// 											'$area_of_driveway_gravel_salt_driveway',
		// 											'$area_of_walkways_shovel_walkways',
		// 											'$depth_of_snow_shovel_walkways',
		// 											'$area_of_walkways_gravel_salt_walkways',
		// 											'$area_of_walkways_shovel_sidewalk',
		// 											'$depth_of_snow_shovel_sidewalk',
		// 											'$area_of_walkways_gravel_salt_sidewalk',
		// 											'$area_of_walkways_shovel_patios_and_decks',
		// 											'$depth_of_snow_shovel_patios_and_decks',
		// 											'$area_of_walkways_gravel_salt_patios_and_decks',
		// 											'$area_of_walkways_break_and_remove_surface_ice_build_up',
		// 											'$depth_of_snow_break_and_remove_surface_ice_build_up',
		// 											'$comments_for_appointment',
		// 											'$val_equipment_provided',
		// 											'$description_of_equipment',
		// 											'$val_materials_provided',
		// 											'$description_of_materials_required',
		// 											'$address_of_service_name', '$address_of_service_postal_code',
		// 											'$time_of_service'
		// 										 ) ";
		// 		}
		//
		//
		//
		//
		//
		// 		else if( $job_category == "tutoring" ){
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$recurring = $_POST["recurring"];
		// 			if( $_POST["recurring"] == "Yes" ){
		// 				$date = implode(", " , $_POST["date_of_venue"]);
		// 			}
		// 			else if( $_POST["recurring"] == "No" ){
		// 				$date = $_POST["date_of_venue"];
		// 			}
		//
		// 			$level_of_education = $_POST["level_of_education"];
		// 			$topic = $_POST["topic"];
		// 			$level_grade_studying = $_POST["level_grade_studying"];
		// 			$objectives_for_session = $_POST["objectives_for_session"];
		// 			$comments_for_appointment = $_POST["comments_for_appointment"];
		// 			/********************* Step 4*******************/
		// 			$equipment_provided = $_POST["equipment_provided"];
		// 			if( $equipment_provided == "Yes" ){
		// 				$val_equipment_provided = "Yes, all of it";
		// 			}else if( $equipment_provided == "No" ){
		// 				$val_equipment_provided = "No, none of it";
		// 			}else if( $equipment_provided == "Some" ){
		// 				$val_equipment_provided = "Some of it";
		// 			}
		// 			$description_of_equipment = $_POST["description_of_equipment"];
		// 			$materials_provided = $_POST["materials_provided"];
		// 			if( $materials_provided == "Yes" ){
		// 				$val_materials_provided = "Yes, all of it";
		// 			}else if( $materials_provided == "No" ){
		// 				$val_materials_provided = "No, none of it";
		// 			}else if( $materials_provided == "Some" ){
		// 				$val_materials_provided = "Some of it";
		// 			}
		// 			$description_of_materials_required = $_POST["description_of_materials_required"];
		// 			$address_of_service_name = $_POST["address_of_service_name"];
		// 			$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 			$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$sqlAddAnswersForJobPost = " INSERT INTO tutoring (
		// 											Job_ID, Client_ID, Date, A1, A2, A3,
		// 											A4, A5, A6, A7, A8, A9, Address, PostalCode, Time
		// 										 )
		// 										 VALUES (
		// 											'$Job_ID', '$Client_ID', '$date',
		// 											'$level_of_education', '$topic',
		// 											'$level_grade_studying', '$objectives_for_session',
		// 											'$comments_for_appointment', '$val_equipment_provided',
		// 											'$description_of_equipment', '$val_materials_provided',
		// 											'$description_of_materials_required', '$address_of_service_name', '$address_of_service_postal_code',
		// 											'$time_of_service'
		// 										 ) ";
		// 		}
		//
		//
		//
		//
		//
		// 		else if( $job_category == "vehicle_care" ){
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$vehicle_care_subservices = implode(',', $_POST["vehicle_care_subservices"]);
		// 			$type_of_vehicle = $_POST["type_of_vehicle"];
		// 			$location_of_vehicle = $_POST["location_of_vehicle"];
		// 			$services_to_do_on_vehicle = implode(',', $_POST["services_to_do_on_vehicle"]);
		// 			$comments_for_appointment = $_POST["comments_for_appointment"];
		// 			/********************* Step 4*******************/
		// 			$equipment_provided = $_POST["equipment_provided"];
		// 			if( $equipment_provided == "Yes" ){
		// 				$val_equipment_provided = "Yes, all of it";
		// 			}else if( $equipment_provided == "No" ){
		// 				$val_equipment_provided = "No, none of it";
		// 			}else if( $equipment_provided == "Some" ){
		// 				$val_equipment_provided = "Some of it";
		// 			}
		// 			$description_of_equipment = $_POST["description_of_equipment"];
		// 			$materials_provided = $_POST["materials_provided"];
		// 			if( $materials_provided == "Yes" ){
		// 				$val_materials_provided = "Yes, all of it";
		// 			}else if( $materials_provided == "No" ){
		// 				$val_materials_provided = "No, none of it";
		// 			}else if( $materials_provided == "Some" ){
		// 				$val_materials_provided = "Some of it";
		// 			}
		// 			$description_of_materials_required = $_POST["description_of_materials_required"];
		// 			$address_of_service_name = $_POST["address_of_service_name"];
		// 			$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 			$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$sqlAddAnswersForJobPost = " INSERT INTO vehicle_care (
		// 											Job_ID, Client_ID, Date, A1, A2, A3,
		// 											A4, A5, A6, A7, A8, A9, Address, PostalCode, Time
		// 										 )
		// 										 VALUES (
		// 											'$Job_ID', '$Client_ID', '$date',
		// 											'$vehicle_care_subservices',
		// 											'$type_of_vehicle',
		// 											'$location_of_vehicle',
		// 											'$services_to_do_on_vehicle',
		// 											'$comments_for_appointment',
		// 											'$val_equipment_provided',
		// 											'$description_of_equipment',
		// 											'$val_materials_provided',
		// 											'$description_of_materials_required',
		// 											'$address_of_service_name',
		// 											'$address_of_service_postal_code',
		// 											'$time_of_service'
		// 										 ) ";
		// 		}
		//
		//
		//
		//
		//
		// 		else if( $job_category == "yard_care" ){
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$yard_care_subservices = implode(',', $_POST["yard_care_subservices"]);
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('lawn_mowing', $_POST["yard_care_subservices"]) ){
		// 				$obstructions_in_yard_lawn_mowing = $_POST["obstructions_in_yard_lawn_mowing"];
		// 				$length_of_grass_lawn_mowing = $_POST["length_of_grass_lawn_mowing"];
		// 			}else{
		// 				$obstructions_in_yard_lawn_mowing = "n_a";
		// 				$length_of_grass_lawn_mowing = "n_a";
		// 			}
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('whipper_snip_grass_edge_trimming', $_POST["yard_care_subservices"]) ){
		// 				$obstructions_in_yard_whipper_snip_grass_edge_trimming = $_POST["obstructions_in_yard_whipper_snip_grass_edge_trimming"];
		// 				$length_of_grass_whipper_snip_grass_edge_trimming = $_POST["length_of_grass_whipper_snip_grass_edge_trimming"];
		// 			}else{
		// 				$obstructions_in_yard_whipper_snip_grass_edge_trimming = "n_a";
		// 				$length_of_grass_whipper_snip_grass_edge_trimming = "n_a";
		// 			}
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('lawn_weed_removal', $_POST["yard_care_subservices"]) ){
		// 				$how_much_of_yard_lawn_weed_removal = $_POST["how_much_of_yard_lawn_weed_removal"];
		// 				$density_of_weeds_lawn_weed_removal = $_POST["density_of_weeds_lawn_weed_removal"];
		// 			}else{
		// 				$how_much_of_yard_lawn_weed_removal = "n_a";
		// 				$density_of_weeds_lawn_weed_removal = "n_a";
		// 			}
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('lawn_deweeding_spray', $_POST["yard_care_subservices"]) ){
		// 				$how_much_of_yard_lawn_deweeding_spray = $_POST["how_much_of_yard_lawn_deweeding_spray"];
		// 				$density_of_weeds_lawn_deweeding_spray = $_POST["density_of_weeds_lawn_deweeding_spray"];
		// 			}else{
		// 				$how_much_of_yard_lawn_deweeding_spray = "n_a";
		// 				$density_of_weeds_lawn_deweeding_spray = "n_a";
		// 			}
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('rake_leaves', $_POST["yard_care_subservices"]) ){
		// 				$how_much_of_yard_rake_leaves = $_POST["how_much_of_yard_rake_leaves"];
		// 				$density_of_weeds_rake_leaves = $_POST["density_of_weeds_rake_leaves"];
		// 				$length_of_grass_rake_leaves = $_POST["length_of_grass_rake_leaves"];
		// 			}else{
		// 				$how_much_of_yard_rake_leaves = "n_a";
		// 				$density_of_weeds_rake_leaves = "n_a";
		// 				$length_of_grass_rake_leaves = "n_a";
		// 			}
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('hedge_and_shrub_trimming', $_POST["yard_care_subservices"]) ){
		// 				$groups_to_trim_hedge_and_shrub_trimming = $_POST["groups_to_trim_hedge_and_shrub_trimming"];
		// 				$length_of_all_groups_hedge_and_shrub_trimming = $_POST["length_of_all_groups_hedge_and_shrub_trimming"];
		// 				$height_of_highest_tree_hedge_and_shrub_trimming = $_POST["height_of_highest_tree_hedge_and_shrub_trimming"];
		// 				$length_to_trim_hedges_hedge_and_shrub_trimming = $_POST["length_to_trim_hedges_hedge_and_shrub_trimming"];
		// 			}else{
		// 				$groups_to_trim_hedge_and_shrub_trimming = "n_a";
		// 				$length_of_all_groups_hedge_and_shrub_trimming = "n_a";
		// 				$height_of_highest_tree_hedge_and_shrub_trimming = "n_a";
		// 				$length_to_trim_hedges_hedge_and_shrub_trimming = "n_a";
		// 			}
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('tree_pruning', $_POST["yard_care_subservices"]) ){
		// 				$how_many_trees_to_prune_tree_pruning = $_POST["how_many_trees_to_prune_tree_pruning"];
		// 				$height_of_highest_tree_tree_pruning = $_POST["height_of_highest_tree_tree_pruning"];
		// 				$length_to_trim_trees_tree_pruning = $_POST["length_to_trim_trees_tree_pruning"];
		// 			}else{
		// 				$how_many_trees_to_prune_tree_pruning = "n_a";
		// 				$height_of_highest_tree_tree_pruning = "n_a";
		// 				$length_to_trim_trees_tree_pruning = "n_a";
		// 			}
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('lawn_aeration', $_POST["yard_care_subservices"]) ){
		// 				$how_much_of_yard_to_aerate_lawn_aeration = $_POST["how_much_of_yard_to_aerate_lawn_aeration"];
		// 				$how_many_obstructions_in_yard_lawn_aeration = $_POST["how_many_obstructions_in_yard_lawn_aeration"];
		// 			}else{
		// 				$how_much_of_yard_to_aerate_lawn_aeration = "n_a";
		// 				$how_many_obstructions_in_yard_lawn_aeration = "n_a";
		// 			}
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('fertilizing', $_POST["yard_care_subservices"]) ){
		// 				$how_much_of_yard_to_fertilize_fertilizing = $_POST["how_much_of_yard_to_fertilize_fertilizing"];
		// 				$obstructions_in_yard_fertilizing = $_POST["obstructions_in_yard_fertilizing"];
		// 			}else{
		// 				$how_much_of_yard_to_fertilize_fertilizing = "n_a";
		// 				$obstructions_in_yard_fertilizing = "n_a";
		// 			}
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('winterize_hedges_shrubs_and_small_trees', $_POST["yard_care_subservices"]) ){
		// 				$how_many_groups_of_hedges_winterize_hedges_shrubs_and_small_trees = $_POST["how_many_groups_of_hedges_winterize_hedges_shrubs_and_small_trees"];
		// 				$length_of_all_groups_winterize_hedges_shrubs_and_small_trees = $_POST["length_of_all_groups_winterize_hedges_shrubs_and_small_trees"];
		// 				$how_many_shrubs_trees_winterize_hedges_shrubs_and_small_trees = $_POST["how_many_shrubs_trees_winterize_hedges_shrubs_and_small_trees"];
		// 				$height_of_heighest_tree_winterize_hedges_shrubs_and_small_trees = $_POST["height_of_heighest_tree_winterize_hedges_shrubs_and_small_trees"];
		// 			}else{
		// 				$how_many_groups_of_hedges_winterize_hedges_shrubs_and_small_trees = "n_a";
		// 				$length_of_all_groups_winterize_hedges_shrubs_and_small_trees = "n_a";
		// 				$how_many_shrubs_trees_winterize_hedges_shrubs_and_small_trees = "n_a";
		// 				$height_of_heighest_tree_winterize_hedges_shrubs_and_small_trees = "n_a";
		// 			}
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('garden_deweeding', $_POST["yard_care_subservices"]) ){
		// 				$how_many_garden_beds_garden_deweeding = $_POST["how_many_garden_beds_garden_deweeding"];
		// 				$total_area_of_gardens_garden_deweeding = $_POST["total_area_of_gardens_garden_deweeding"];
		// 				$density_of_weeds_garden_deweeding = $_POST["density_of_weeds_garden_deweeding"];
		// 			}else{
		// 				$how_many_garden_beds_garden_deweeding = "n_a";
		// 				$total_area_of_gardens_garden_deweeding = "n_a";
		// 				$density_of_weeds_garden_deweeding = "n_a";
		// 			}
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('garden_place_mulch_topsoil', $_POST["yard_care_subservices"]) ){
		// 				$how_many_garden_beds_garden_place_mulch_topsoil = $_POST["how_many_garden_beds_garden_place_mulch_topsoil"];
		// 				$total_area_of_gardens_garden_place_mulch_topsoil = $_POST["total_area_of_gardens_garden_place_mulch_topsoil"];
		// 				$density_of_objects_in_gardens_garden_place_mulch_topsoil = $_POST["density_of_objects_in_gardens_garden_place_mulch_topsoil"];
		// 			}else{
		// 				$how_many_garden_beds_garden_place_mulch_topsoil = "n_a";
		// 				$total_area_of_gardens_garden_place_mulch_topsoil = "n_a";
		// 				$density_of_objects_in_gardens_garden_place_mulch_topsoil = "n_a";
		// 			}
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('plant_garden_flowers_and_small_garden_plants', $_POST["yard_care_subservices"]) ){
		// 				$how_many_to_plant_plant_garden_flowers_and_small_garden_plants = $_POST["how_many_to_plant_plant_garden_flowers_and_small_garden_plants"];
		// 				$type_to_plant_plant_garden_flowers_and_small_garden_plants = $_POST["type_to_plant_plant_garden_flowers_and_small_garden_plants"];
		// 			}else{
		// 				$how_many_to_plant_plant_garden_flowers_and_small_garden_plants = "n_a";
		// 				$type_to_plant_plant_garden_flowers_and_small_garden_plants = "n_a";
		// 			}
		// 			if( isset($_POST["yard_care_subservices"]) && in_array('other_yard_care_subservice', $_POST["yard_care_subservices"]) ){
		// 				$scope_of_work_other_yard_care_subservice = $_POST["scope_of_work_other_yard_care_subservice"];
		// 				$how_many_hours_other_yard_care_subservice = $_POST["how_many_hours_other_yard_care_subservice"];
		// 			}else{
		// 				$scope_of_work_other_yard_care_subservice = "n_a";
		// 				$how_many_hours_other_yard_care_subservice = "n_a";
		// 			}
		// 			$comments_for_appointment = $_POST["comments_for_appointment"];
		// 			/********************* Step 4*******************/
		// 			$equipment_provided = $_POST["equipment_provided"];
		// 			if( $equipment_provided == "Yes" ){
		// 				$val_equipment_provided = "Yes, all of it";
		// 			}else if( $equipment_provided == "No" ){
		// 				$val_equipment_provided = "No, none of it";
		// 			}else if( $equipment_provided == "Some" ){
		// 				$val_equipment_provided = "Some of it";
		// 			}
		// 			$description_of_equipment = $_POST["description_of_equipment"];
		// 			$materials_provided = $_POST["materials_provided"];
		// 			if( $materials_provided == "Yes" ){
		// 				$val_materials_provided = "Yes, all of it";
		// 			}else if( $materials_provided == "No" ){
		// 				$val_materials_provided = "No, none of it";
		// 			}else if( $materials_provided == "Some" ){
		// 				$val_materials_provided = "Some of it";
		// 			}
		// 			$description_of_materials_required = $_POST["description_of_materials_required"];
		// 			$address_of_service_name = $_POST["address_of_service_name"];
		// 			$address_of_service_postal_code = $_POST["address_of_service_postal_code"];
		// 			$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
		//
		// 		/********************** Caching Answers / Dumping into Memory **********************/
		// 			$sqlAddAnswersForJobPost = " INSERT INTO yard_care (
		// 											Job_ID, Client_ID, Date, A1, A2, A3,
		// 											A4, A5, A6, A7, A8, A9, A10, A11,
		// 											A12, A13, A14, A15, A16, A17, A18,
		// 											A19, A20, A21, A22, A23, A24, A25,
		// 											A26, A27, A28, A29, A30, A31, A32,
		// 											A33, A34, A35, A36, A37, A38, A39,
		// 											A40, A41, A42, Address, PostalCode, Time
		// 										 )
		// 										 VALUES (
		// 											'$Job_ID', '$Client_ID', '$date',
		// 											'$yard_care_subservices', '$obstructions_in_yard_lawn_mowing',
		// 											'$length_of_grass_lawn_mowing', '$obstructions_in_yard_whipper_snip_grass_edge_trimming',
		// 											'$length_of_grass_whipper_snip_grass_edge_trimming', '$how_much_of_yard_lawn_weed_removal',
		// 											'$density_of_weeds_lawn_weed_removal', '$how_much_of_yard_lawn_deweeding_spray',
		// 											'$density_of_weeds_lawn_deweeding_spray', '$how_much_of_yard_rake_leaves',
		// 											'$density_of_weeds_rake_leaves', '$length_of_grass_rake_leaves',
		// 											'$groups_to_trim_hedge_and_shrub_trimming', '$length_of_all_groups_hedge_and_shrub_trimming',
		// 											'$height_of_highest_tree_hedge_and_shrub_trimming', '$length_to_trim_hedges_hedge_and_shrub_trimming',
		// 											'$how_many_trees_to_prune_tree_pruning', '$height_of_highest_tree_tree_pruning',
		// 											'$length_to_trim_trees_tree_pruning', '$how_much_of_yard_to_aerate_lawn_aeration',
		// 											'$how_many_obstructions_in_yard_lawn_aeration', '$how_much_of_yard_to_fertilize_fertilizing',
		// 											'$obstructions_in_yard_fertilizing', '$how_many_groups_of_hedges_winterize_hedges_shrubs_and_small_trees',
		// 											'$length_of_all_groups_winterize_hedges_shrubs_and_small_trees', '$how_many_shrubs_trees_winterize_hedges_shrubs_and_small_trees',
		// 											'$height_of_heighest_tree_winterize_hedges_shrubs_and_small_trees', '$how_many_garden_beds_garden_deweeding',
		// 											'$total_area_of_gardens_garden_deweeding', '$density_of_weeds_garden_deweeding',
		// 											'$how_many_garden_beds_garden_place_mulch_topsoil', '$total_area_of_gardens_garden_place_mulch_topsoil',
		// 											'$density_of_objects_in_gardens_garden_place_mulch_topsoil', '$how_many_to_plant_plant_garden_flowers_and_small_garden_plants',
		// 											'$type_to_plant_plant_garden_flowers_and_small_garden_plants', '$scope_of_work_other_yard_care_subservice',
		// 											'$how_many_hours_other_yard_care_subservice', '$comments_for_appointment',
		// 											'$val_equipment_provided', '$description_of_equipment',
		// 											'$val_materials_provided', '$description_of_materials_required',
		// 											'$address_of_service_name', '$address_of_service_postal_code', '$time_of_service'
		// 										 ) ";
		// 		}





				// else if( $job_category == "other" ){
				if( $job_category == "other" ){
				/********************** Caching Answers / Dumping into Memory **********************/

					$task_description = $_POST["task_description"];
					$how_many_hours = $_POST["how_many_hours"];

					$equipment_provided = $_POST["equipment_provided"];
					if( $equipment_provided == "Yes" ){
						$val_equipment_provided = "Yes, all of it";
						$description_of_materials_required = "n_a";
					}else if( $equipment_provided == "No" ){
						$val_equipment_provided = "No, none of it";
						$description_of_materials_required = $_POST["description_of_materials_required"];
					}else if( $equipment_provided == "Some" ){
						$val_equipment_provided = "Some of it";
						$description_of_materials_required = $_POST["description_of_materials_required"];
					}

					$recurring = $_POST["recurring"];
					if( $_POST["recurring"] == "Yes" ){
						$date = $_POST["date_of_venue"];
						$frequency_of_recurring_dates = $_POST["frequency_of_recurring_dates"];
					}
					else if( $_POST["recurring"] == "No" ){
						$date = $_POST["date_of_venue"];
						$frequency_of_recurring_dates = "n_a";
					}

					$time_of_service = $_POST["time_of_service_hours"] . ":" . $_POST["time_of_service_minutes"] . " " . $_POST["time_of_service_am_pm"];
					$flexibility_of_date_time = $_POST["flexibility_of_date_time"];
					$address_of_service_name = $_POST["address_of_service_name"];
					$address_of_service_postal_code = $_POST["address_of_service_postal_code"];

				/********************** Caching Answers / Dumping into Memory **********************/
					$sqlAddAnswersForJobPost = " INSERT INTO other (
													Job_ID, Client_ID,
													Job_category_temporary, A1, A2, A3, A4, Date, Frequency_Of_Recurring_Dates, Time, A7, Address, PostalCode
												 )
												 VALUES (
													'$Job_ID', '$Client_ID',
													'$job_category_temporary',
													'$task_description',
													'$how_many_hours',
													'$val_equipment_provided',
													'$description_of_materials_required',
													'$date',
													'$frequency_of_recurring_dates',
													'$time_of_service',
													'$flexibility_of_date_time',
													'$address_of_service_name',
													'$address_of_service_postal_code'
												 ) ";
				}


/*******************************************************************************************************************
********************************************** Change Based on Category ********************************************
*******************************************************************************************************************/



		$queryAddAnswersForJobPost = $connection->query($sqlAddAnswersForJobPost);
		if( $queryAddAnswersForJobPost ){
			// echo "<h1><hr />successfully added to SECOND database!<hr /></h1>";

			$sql_Create_Bidding_Event = " INSERT INTO jobs_bids (
											job_Index, job_ID, job_Status, job_Bids_Count
										  )
										  Values (
											NULL, '$unique_ID', 'Unreplied', '0'
										  ) ";
			$query_Create_Bidding_Event = $connection->query($sql_Create_Bidding_Event);
			if( $query_Create_Bidding_Event ){
				// echo "Created bidding event successfully!";
				echo " <hr /><h1>Thank you for your job posting, " .
						 " <br> you will begin to receive price quotes from students soon! </h1><hr /> ";
			}
			else{
				echo "Failed to create bidding event";
			}
		}

	}

	else{
		echo "<h1><hr />Failed to add to database!<hr /></h1>";
	}
}
}
// ----------------------------------------------------------------------------- //



// ----------------------------------------------------------------------------- //





$connection->close();
?>


</div>
</div>

</div>
</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
