$(document).ready(function(){

$("input#date_of_venue").datepicker();

// $("#job_category").change(function(){

$("div.populate_job_category").css("height", "600px");
// var id = $(this).children(":selected").attr("id");
var id = "other";

$("div.step_1_icon").removeClass("primary").addClass("secondary");
$("div.step_2_icon").removeClass("secondary").addClass("primary");
$("div.step_3_icon").removeClass("secondary").addClass("primary");
$("div.step_4_icon").removeClass("secondary").addClass("primary");

// $("div.step_numbers").html("").css("margin-bottom", "220px");

	$("div.step_numbers").append("" +
		"<div class='col-lg-4 col-md-4 col-xs-4 step'>" +
			"<div class='secondary step_1_icon'>" +
				"<span> Step </span> <br /> 1 <br />" +
				"<hr />" +
				"<span class='step_desc'> Describe Job </span>" +
			"</div>" +
		"</div>" +
		"<div class='col-lg-4 col-md-4 col-xs-4 step'><div class='primary step_3_icon'> <span> Step </span> <br /> 2 <br /><hr /> <span class='step_desc'> Materials and Equipment </span> </div></div>" +
		"<div class='col-lg-4 col-md-4 col-xs-4 step'><div class='primary step_4_icon'> <span> Step </span> <br /> 3 <br /><hr /> <span class='step_desc'> Date(s), Time(s) & Location </span> </div></div>" );

// if( id == "delivery" || id == "garage_shop_shed_cleaning" || id == "house_cleaning" || id == "landscaping" ||
// 		id == "outdoor_seasonal_decorations" || id == "painting" || id == "pressure_washing" || id == "private_event_assistance" ||
// 		id == "rv_boat_cleaning" || id == "snow_removal" || id == "vehicle_care" || id == "yard_care" ){
// 	$("div.step_numbers").append("" +
// 		"<div class='col-lg-3 col-md-3 col-xs-3 step'><div class='secondary step_1_icon'> <span>Step</span><br /> 1 </div></div>" +
// 		"<div class='col-lg-3 col-md-3 col-xs-3 step'><div class='primary step_2_icon'> <span>Step</span><br /> 2 </div></div>" +
// 		"<div class='col-lg-3 col-md-3 col-xs-3 step'><div class='primary step_3_icon'> <span>Step</span><br /> 3 </div></div>" +
// 		"<div class='col-lg-3 col-md-3 col-xs-3 step'><div class='primary step_4_icon'> <span>Step</span><br /> 4 </div></div>" );
// }else if( id == "dog_walking" || id == "exterior_window_washing" ||
// 					id == "gutter_cleaning" || id == "international_languages" ||
// 					id == "moving" || id == "music_lessons" ||
// 					id == "tutoring" || id == "other" ){
// 	$("div.step_numbers").append("" +
// 		"<div class='col-lg-4 col-md-4 col-xs-4 step'><div class='secondary step_1_icon'> <span>Step</span><br /> 1 </div></div>" +
// 		"<div class='col-lg-4 col-md-4 col-xs-4 step'><div class='primary step_3_icon'> <span>Step</span><br /> 2 </div></div>" +
// 		"<div class='col-lg-4 col-md-4 col-xs-4 step'><div class='primary step_4_icon'> <span>Step</span><br /> 3 </div></div>" );
// }

// if( id == "title" ){
// 	$("div.populate_job_category").html("<h2>Waiting for Category Selection . . . .</h2>");
// 	$("div.populate_job_category").css("height", "150px");
// 	$("div.step_numbers").html(" ").css("margin-bottom", "0");
// }
// else if( id == "dog_walking" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/****************** Step 1 ******************/
// 		"<div class='step step_1'>" +
// 		" <div id='show_recurring_service'></div> " +
// 		" <div id='div_add_date'></div> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' id='job_title' /><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step btn-step-next go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/****************** Step 3 ******************/
// 		"<div class='step step_3'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" How long of a walk would you like your dog(s) to have: " +
// 			" </legend> " +
// 			" <label for='A2'><input type='radio' name='A2' value='Half'  /> Half an Hour </label><br> " +
// 			" <label for='A2'><input type='radio' name='A2' value='One' /> One Hour </label><br> " +
// 			" <label for='A2'><input type='radio' name='A2' value='OneAndHalf' /> One and a half hours </label><br> " +
// 			" <label for='A2'><input type='radio' name='A2' value='Two' /> Two hours </label><br> " +
// 			" <label for='A2'><input type='radio' name='A2' value='Other' /> Other (describe below) </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment: " +
// 			" </legend> " +
// 			" <textarea name='A3' id='A3'></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What type of Dog do you own? " +
// 			" </legend> " +
// 			" <textarea name='A4' id='A4' ></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" How old is your dog? " +
// 			" </legend> " +
// 			" <input type='number' name='A5_Years' placeholder='years'  /> " +
// 			" <input type='number' name='A5_Months' placeholder='months'  /> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step btn-step-prev go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step btn-step-next go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/****************** Step 4 ******************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job? " +
// 			" </legend> " +
// 			" <label for='A6'><input type='radio' name='A6' value='Yes'  /> Yes, all of it </label><br> " +
// 			" <label for='A6'><input type='radio' name='A6' value='No' /> No, none of it </label><br> " +
// 			" <label for='A6'><input type='radio' name='A6' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='A7' id='A7'></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label for='A8'><input type='radio' name='A8' value='Yes'  />Yes, all of it</label><br> " +
// 			" <label for='A8'><input type='radio' name='A8' value='No' />No, none of it</label><br> " +
// 			" <label for='A8'><input type='radio' name='A8' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='A9' id='A9'></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number'  /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code'  /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours'  /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes'  /> " +
// 			" <select name='time_of_service_am_pm' class='inline' > " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step btn-step-prev go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div> " );
// }
// else if( id == "exterior_window_washing" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/*********************** Step 1 ***********************/
// 		"<div class='step step_1'>" +
// 		"<div id='show_recurring_service'></div>" +
// 		" <div id='div_add_date'></div> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' /><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" How many exterior windows and/or doors in your residence to be cleaned: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='number_of_items' value='11t015' required /> Eleven to Fifteen </label><br> " +
// 			" <label><input type='radio' name='number_of_items' value='under5' /> Under 5 </label><br> " +
// 			" <label><input type='radio' name='number_of_items' value='6to10' /> Six to Ten </label><br> " +
// 			" <label><input type='radio' name='number_of_items' value='16to20' /> Sixteen to Twenty </label><br> " +
// 			" <label><input type='radio' name='number_of_items' value='21to25' /> Twenty-one to Twenty-five </label><br> " +
// 			" <label><input type='radio' name='number_of_items' value='26to30' /> Twenty-six to Thirty </label><br> " +
// 			" <label><input type='radio' name='number_of_items' value='over30' /> More than Thirty <i>-- indicate quantity in description box </i> </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What percent (%) of your windows will require a ladder or work at heights: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='percentage_requiring_ladder' value='under10' required /> Very few (under 10%) </label><br> " +
// 			" <label><input type='radio' name='percentage_requiring_ladder' value='11to33' /> Some of them (11% to 33%) </label><br> " +
// 			" <label><input type='radio' name='percentage_requiring_ladder' value='33to66' /> Quite a few (33% to 66%) </label><br> " +
// 			" <label><input type='radio' name='percentage_requiring_ladder' value='66to100' /> All of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What is the average size of your windows: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='avg_size_of_windows' value='under5' required /> Small (under 5 ft2) </label><br> " +
// 			" <label><input type='radio' name='avg_size_of_windows' value='5to15' /> Medium (5 - 15 ft2) </label><br> " +
// 			" <label><input type='radio' name='avg_size_of_windows' value='16to30' /> Large (16 - 30 ft2) </label><br> " +
// 			" <label><input type='radio' name='avg_size_of_windows' value='over30' /> Very Large (over 30 ft2) </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment: " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required> " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }
// else if( id == "delivery" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/*********************** Step 1 ***********************/
// 		"<div class='step step_1'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Date of Venue " +
// 			" </legend> " +
// 			" <input type='date' name='date_of_venue' required />" +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required/><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 2 ***********************/
// 		"<div class='step step_2'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select sub-service: " +
// 			" </legend> " +
// 			" <select onchange='load_delivery_subservice_questionnare_fn()' name='delivery_sub_services' class='' id='delivery_sub_services' required>" +
// 				" <option value=''> " + " SELECT ONE " + "</option>" +
// 				" <option value='to_specific_address'> " + " Deliver similar items to specific addresses " + "</option>" +
// 				" <option value='to_set_areas'> " + " Deliver items within set areas or communities " + "</option>" +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_2'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_2'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		" <div id='load_delivery_subservice_questionnare'></div> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments for appointment: " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required> " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }
// else if( id == "garage_shop_shed_cleaning" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 	"<div class='step step_1'>" +
// 	" <fieldset> " +
// 			" <legend> " +
// 				" Date of Venue " +
// 			" </legend> " +
// 			" <input type='date' name='date_of_venue' required />" +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required /><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 2 ***********************/
// 		"<div class='step step_2'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select sub-service: " +
// 			" </legend> " +
// 			" <select onchange='load_garage_shop_shed_cleaning_subservice_questionnare_fn()' name='garage_shop_shed_cleaning_subservices' class='' id='garage_shop_shed_cleaning_subservices' required>" +
// 				" <option value=''> " + " SELECT ONE " + "</option>" +
// 				" <option value='garbage_clean_up'> " + " Garbage clean up " + "</option>" +
// 				" <option value='organize_and_put_away_items'> " + " Organize and put away items " + "</option>" +
// 				" <option value='sweep_floors'> " + " Sweep floors " + "</option>" +
// 				" <option value='other'> " + " Other (describe in next Step) " + "</option>" +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_2'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_2'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		" <div id='load_garage_shop_shed_cleaning_subservice_questionnare'></div> " +
//
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required> " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }
// else if( id == "gutter_cleaning" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 	"<div class='step step_1'>" +
// 	" <fieldset> " +
// 			" <legend> " +
// 				" Date of Venue " +
// 			" </legend> " +
// 			" <input type='date' name='date_of_venue' required />" +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required /><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 	/*********************** Step 3 ***********************/
// 	"<div class='step step_3'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What is the total floor area of your residence: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='floor_area' value='compact' required /> Compact (less than 1,200 sq ft) </label><br> " +
// 			" <label><input type='radio' name='floor_area' value='small' /> Small (1,200 - 2,000 sq ft) </label><br> " +
// 			" <label><input type='radio' name='floor_area' value='medium' /> Medium (2,000 - 3,000 sq ft) </label><br> " +
// 			" <label><input type='radio' name='floor_area' value='large' /> Large (3,000 – 4,000 sq ft) </label><br> " +
// 			" <label><input type='radio' name='floor_area' value='very_large' /> Very large (more than 4,000 sq ft) – indicate size in description box </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" How many stories high (above-ground) is your residence: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='how_many_stories' value='1' required /> 1 </label><br> " +
// 			" <label><input type='radio' name='how_many_stories' value='1.5' /> 1.5 </label><br> " +
// 			" <label><input type='radio' name='how_many_stories' value='2' /> 2 </label><br> " +
// 			" <label><input type='radio' name='how_many_stories' value='2.5' /> 2.5 </label><br> " +
// 			" <label><input type='radio' name='how_many_stories' value='3' /> 3 </label><br> " +
// 			" <label><input type='radio' name='how_many_stories' value='3.5' /> 3.5 </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Estimate the total length of gutters: " +
// 			" </legend> " +
// 			" <input type='number' name='length_of_gutter' placeholder='total length in feet' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" How long has it been since your last gutter cleanout: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='how_long_since_last_cleanout' value='1' required /> less than 4 months </label><br> " +
// 			" <label><input type='radio' name='how_long_since_last_cleanout' value='1.5' /> 4 months - 1 year </label><br> " +
// 			" <label><input type='radio' name='how_long_since_last_cleanout' value='2' /> 1 – 2 years </label><br> " +
// 			" <label><input type='radio' name='how_long_since_last_cleanout' value='2.5' /> Longer than 2 years </label><br> " +
// 			" <label><input type='radio' name='how_long_since_last_cleanout' value='3' /> Unsure </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment: " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' ></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required> " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div> ");
// }
// else if( id == "house_cleaning" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 			"<div class='step step_1'>" +
//
// 			"<div id='show_recurring_service'></div>" +
// 			" <div id='div_add_date'></div> " +
// 			" <fieldset> " +
// 				" <legend> " +
// 					" Enter Title: " +
// 				" </legend> " +
// 				" <input type='text' name='job_title' required/><br> " +
// 			" </fieldset><br> " +
//
// 			" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 				" <button type='button' class='btn-step go_next_from_step_1'> " +
// 					" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 				" </button> " +
// 			" </div> " +
//
// 		" </div> " +
// 		/*********************** Step 2 ***********************/
// 		"<div class='step step_2'>" +
//
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What areas of your house apply: " +
// 			" </legend> " +
// 			" <label><input type='checkbox' onchange='checkbox_1_fn()' name='house_cleaning_subservices[]' id='living_areas_and_bedrooms' value='living_areas_and_bedrooms' /> Living areas and bedrooms </label><br> " +
// 			" <label><input type='checkbox' onchange='checkbox_2_fn()' name='house_cleaning_subservices[]' id='bathrooms' value='bathrooms' /> Bathrooms </label><br> " +
// 			" <label><input type='checkbox' onchange='checkbox_3_fn()' name='house_cleaning_subservices[]' id='kitchens' value='kitchens' /> Kitchens </label><br> " +
// 			" <label><input type='checkbox' onchange='checkbox_4_fn()' name='house_cleaning_subservices[]' id='laundry_package' value='laundry_package' /> Laundry package </label><br> " +
// 			" <label><input type='checkbox' onchange='checkbox_5_fn()' name='house_cleaning_subservices[]' id='deep_cleaning_packages' value='deep_cleaning_packages' /> Deep cleaning package </label><br> " +
// 		" </fieldset><br> " +
//
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_2'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		" </div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_2'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		" </div> " +
//
// 		" </div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What type of residence are you in: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='type_of_residence_house_cleaning' value='condo_apartment' required /> Condo / Apartment </label><br> " +
// 			" <label><input type='radio' name='type_of_residence_house_cleaning' value='duplex' /> Duplex, or Row-house </label><br> " +
// 			" <label><input type='radio' name='type_of_residence_house_cleaning' value='detached_home' /> Detached home </label><br> " +
// 			" <label><input type='radio' name='type_of_residence_house_cleaning' value='commercial_building' /> Commercial office or building </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What is the total floor area of your residence: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='total_floor_area_house_cleaning' value='compact' required /> Compact (less than 1,200 sq ft) </label><br> " +
// 			" <label><input type='radio' name='total_floor_area_house_cleaning' value='small' /> Small (1,200 - 2,000 sq ft) </label><br> " +
// 			" <label><input type='radio' name='total_floor_area_house_cleaning' value='medium' /> Medium (2,000 - 3,000 sq ft) </label><br> " +
// 			" <label><input type='radio' name='total_floor_area_house_cleaning' value='large' /> Large (3,000 – 4,000 sq ft) </label><br> " +
// 			" <label><input type='radio' name='total_floor_area_house_cleaning' value='very_large' /> Very large (more than 4,000 sq ft) – indicate size in description box </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What percent of the floor area is carpet: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='carpet_floor_area_house_cleaing' value='none' required /> No Carpet, no rugs </label><br> " +
// 			" <label><input type='radio' name='carpet_floor_area_house_cleaing' value='under10' /> Very little (under 10%) </label><br> " +
// 			" <label><input type='radio' name='carpet_floor_area_house_cleaing' value='11tol33' /> Some (11% to 33%) </label><br> " +
// 			" <label><input type='radio' name='carpet_floor_area_house_cleaing' value='33to66' /> Quite a bit (33% to 66%) </label><br> " +
// 			" <label><input type='radio' name='carpet_floor_area_house_cleaing' value='67to100' /> Most of it (67 – 100%) </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" How many stories in your residence: " +
// 			" </legend> " +
// 			" <select name='how_many_stories_house_cleaning' required >" +
// 				" <option value=''> " + " SELECT ONE " + "</option>" +
// 				" <option value='1'> " + " 1 " + "</option>" +
// 				" <option value='2'> " + " 2 " + "</option>" +
// 				" <option value='3'> " + " 3 " + "</option>" +
// 				" <option value='3'> " + " 3 " + "</option>" +
// 				" <option value='4'> " + " 4 " + "</option>" +
// 				" <option value='other'> " + " Other (describe in next Step) " + "</option>" +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Do you have any cleaning product preferences: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='cleaning_product_preference' value='none' required /> No preference </label><br> " +
// 			" <label><input type='radio' name='cleaning_product_preference' value='green' /> Green / Eco-friendly only </label><br> " +
// 			" <label><input type='radio' name='cleaning_product_preference' value='non_scented' /> Non-scented </label><br> " +
// 			" <label><input type='radio' name='cleaning_product_preference' value='other' /> Other – indicate size in description box </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Do you own pets that shed: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='pets_that_shed_house_cleaning' value='yes' required /> Yes </label><br> " +
// 			" <label><input type='radio' name='pets_that_shed_house_cleaning' value='no' /> No </label><br> " +
// 		" </fieldset><br> " +
// 		/***************** Load questions based on checkboxes checked *****************/
// 		" <div id='load_questions_based_on_checkboxes_checked'></div> " +
// 		/***************** Load questions based on checkboxes checked *****************/
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment: " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id=' '></textarea> " +
// 		" </fieldset><br> " +
//
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required> " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }
// else if( id == "international_languages" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 	"<div class='step step_1'>" +
// 	"<div id='show_recurring_service'></div>" +
// 		" <div id='div_add_date'></div> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required/><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What language do you want to learn: " +
// 			" </legend> " +
// 			" <textarea name='language_to_learn' id='language_to_learn' required></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select your age group: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='age_group' value='under12' required /> Under 12 years </label><br> " +
// 			" <label><input type='radio' name='age_group' value='13to18' /> 13 - 18 </label><br> " +
// 			" <label><input type='radio' name='age_group' value='19to25' /> 19 - 25 </label><br> " +
// 			" <label><input type='radio' name='age_group' value='26to39' /> 26 - 39 </label><br> " +
// 			" <label><input type='radio' name='age_group' value='40to55' /> 40 - 55 </label><br> " +
// 			" <label><input type='radio' name='age_group' value='over55' /> Over 55 </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What languages can you currently speak/write: " +
// 			" </legend> " +
// 			" <textarea name='languages_spoken' id=' ' required></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What is your current proficiency in the language you would like to learn: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='languages_to_learn' value='beginner' required /> Beginner (no experience) </label><br> " +
// 			" <label><input type='radio' name='languages_to_learn' value='beginner_intermediate' /> Beginner-intermediate </label><br> " +
// 			" <label><input type='radio' name='languages_to_learn' value='intermediate' /> Intermediate </label><br> " +
// 			" <label><input type='radio' name='languages_to_learn' value='intermediate_advanced' /> Intermediate-advanced </label><br> " +
// 			" <label><input type='radio' name='languages_to_learn' value='advanced' /> Advanced </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What are you interested in (select all that apply): " +
// 			" </legend> " +
// 			" <label><input type='checkbox' name='reason_for_learning_language[]' value='general_interest' /> General interest </label><br> " +
// 			" <label><input type='checkbox' name='reason_for_learning_language[]' value='converse_with_a_companion' /> To converse with a companion </label><br> " +
// 			" <label><input type='checkbox' name='reason_for_learning_language[]' value='upcoming_travels' /> Upcoming travels </label><br> " +
// 			" <label><input type='checkbox' name='reason_for_learning_language[]' value='educational_program' /> Part of educational program </label><br> " +
// 			" <label><input type='checkbox' name='reason_for_learning_language[]' value='public_event' /> Speech or public event </label><br> " +
// 			" <label><input type='checkbox' name='reason_for_learning_language[]' value='help_with_test_assignment' /> Need help with a test or assignment </label><br> " +
// 			" <label><input type='checkbox' name='reason_for_learning_language[]' value='other' /> Other – specify below </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment (specific areas of focus, location details, books or materials to be used, special needs, etc.): " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id=' '></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required> " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div> ");
// }
// else if( id == "landscaping" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 	"<div class='step step_1'>" +
// 	" <fieldset> " +
// 			" <legend> " +
// 				" Select Date of Venue " +
// 			" </legend> " +
// 			" <input type='date' name='date_of_venue' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required /> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 2 ***********************/
// 		"<div class='step step_2'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select all that apply: " +
// 			" </legend> " +
// 			" <label><input type='checkbox' name='landscaping_subservices[]' id='seed_and_sod' value='seed_and_sod' /> Seed and Sod Preparation - remove existing grass/sufaces, place and spread topsoil </label><br> " +
// 			" <label><input type='checkbox' name='landscaping_subservices[]' id='place_grass_seed' value='place_grass_seed' /> Place grass seed </label><br> " +
// 			" <label><input type='checkbox' name='landscaping_subservices[]' id='lay_sod' value='lay_sod' /> Lay Sod </label><br> " +
// 			" <label><input type='checkbox' name='landscaping_subservices[]' id='plant_trees_and_shrubs' value='plant_trees_and_shrubs' /> Plant trees and shrubs </label><br> " +
// 			" <label><input type='checkbox' name='landscaping_subservices[]' id='patio_stone_removal' value='patio_stone_removal' /> Patio stone removal </label><br> " +
// 			" <label><input type='checkbox' name='landscaping_subservices[]' id='patio_stone_placement' value='patio_stone_placement' /> Patio stone placement </label><br> " +
// 			" <label><input type='checkbox' name='landscaping_subservices[]' id='yard_object_moving' value='yard_object_moving' /> Heavy yard object lifting and moving  </label><br> " +
// 			" <label><input type='checkbox' name='landscaping_subservices[]' id='place_soil' value='place_soil' /> Place gravels or soils </label><br> " +
// 			" <label><input type='checkbox' name='landscaping_subservices[]' id='general_assistance' value='general_assistance' /> General assistance </label><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_2'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_2'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Describe the scope of work: " +
// 			" </legend> " +
// 			" <textarea name='scope_of_work' id=' ' required ></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Describe the quantity, size, or scale of the work: " +
// 			" </legend> " +
// 			" <textarea name='quantity_of_work' id=' ' required ></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" How many hours do you require assistance for: " +
// 			" </legend> " +
// 			" <input type='number' name='how_many_hours' placeholder='to the nearest 0.5 hours' step='0.5' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Are there any special working conditions (ex: working at heights, heavy lifting, wet areas, etc): " +
// 			" </legend> " +
// 			" <textarea name='special_working_conditions' required></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment: " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' required></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' require d> " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }
// else if( id == "moving" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/*********************** Step 1 ***********************/
// 		"<div class='step step_1'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select Date of Venue " +
// 			" </legend> " +
// 			" <input type='date' name='date_of_venue' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required /><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will this service require the student to bring a vehicle: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='vehicle_required' value='none' required />No, assistance only</label><br> " +
// 			" <label><input type='radio' name='vehicle_required' value='vehicle_required_for_self_transport' />Yes, vehicle required but only for self-transportation</label><br> " +
// 			" <label><input type='radio' name='vehicle_required' value='vehicle_required_for_all_transport' />Yes, truck or large van/SUV required for transporting items</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Is there heavy lifting involved (over 50 lbs): " +
// 			" </legend> " +
// 			" <label><input type='radio' name='heavy_lifting_involved' value='none' required />None</label><br> " +
// 			" <label><input type='radio' name='heavy_lifting_involved' value='few_items' />Yes, but very few items</label><br> " +
// 			" <label><input type='radio' name='heavy_lifting_involved' value='several_items' />Yes, several items</label><br> " +
// 			" <label><input type='radio' name='heavy_lifting_involved' value='most_items' />Yes, most items</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" How many hours do you require assistance for: " +
// 			" </legend> " +
// 			" <input type='number' name='how_many_hours' placeholder='to the nearest 0.5 hours' step='0.5' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment: " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id=' '></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required> " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div> ");
// }
// else if( id == "music_lessons" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/*********************** Step 1 ***********************/
// 		"<div class='step step_1'>" +
// 		"<div id='show_recurring_service'></div>" +
// 		" <div id='div_add_date'></div> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Job Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required /> " +
// 			" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What instrument do you want to learn: " +
// 			" </legend> " +
// 			" <textarea name='instrument_to_learn' required ></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What is your current proficiency with this instrument or musical activity: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='current_proficiency' value='beginner' required />Beginner (no experience)</label><br> " +
// 			" <label><input type='radio' name='current_proficiency' value='beginner_intermediate' />Beginner-intermediate (1-6 months experience)</label><br> " +
// 			" <label><input type='radio' name='current_proficiency' value='intermediate' />Intermediate (6-12 months experience)</label><br> " +
// 			" <label><input type='radio' name='current_proficiency' value='intermediate_advanced' />Intermediate-advanced (1-3 years’ experience)</label><br> " +
// 			" <label><input type='radio' name='current_proficiency' value='advanced' />Advanced (3+ years’ experience)</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment (styles and genres, personal goals, room setup, other details): " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id=' '></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required > " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div> ");
// }
// else if( id == "outdoor_seasonal_decorations" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/*********************** Step 1 ***********************/
// 		"<div class='step step_1'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required /><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select Date of Venue " +
// 			" </legend> " +
// 			" <input type='date' name='date_of_venue' required /> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 2 ***********************/
// 		"<div class='step step_2'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Outdoor Seasonal Activities Subservices (select all that apply): " +
// 			" </legend> " +
// 			" <label><input type='checkbox' onchange='outdoor_seasonal_decorations_cb_1_fn()' name='outdoor_seasonal_decorations_subservices[]' id='install_decorations' value='install_decorations' /> Install Decorations </label><br> " +
// 			" <label><input type='checkbox' onchange='outdoor_seasonal_decorations_cb_2_fn()' name='outdoor_seasonal_decorations_subservices[]' id='take_down_decorations' value='take_down_decorations' /> Take Down Decorations </label><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_2'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_2'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What is the total floor area of your residence: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='floor_area' value='compact' required />Compact (less than 1,200 sq ft)</label><br> " +
// 			" <label><input type='radio' name='floor_area' value='small' />Small (1,200 - 2,000 sq ft)</label><br> " +
// 			" <label><input type='radio' name='floor_area' value='medium' />Medium (2,000 - 3,000 sq ft)</label><br> " +
// 			" <label><input type='radio' name='floor_area' value='large' />Large (3,000 – 4,000 sq ft)</label><br> " +
// 			" <label><input type='radio' name='floor_area' value='very_large' />Very large (more than 4,000 sq ft)</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" How many stories high (above-ground) is your residence: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='how_many_stories' value='1' required /> 1 </label><br> " +
// 			" <label><input type='radio' name='how_many_stories' value='1.5' /> 1.5 </label><br> " +
// 			" <label><input type='radio' name='how_many_stories' value='2' /> 2 </label><br> " +
// 			" <label><input type='radio' name='how_many_stories' value='2.5' /> 2.5 </label><br> " +
// 			" <label><input type='radio' name='how_many_stories' value='3' /> 3 </label><br> " +
// 			" <label><input type='radio' name='how_many_stories' value='3.5' /> 3.5 </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" How many hours do you require assistance for: " +
// 			" </legend> " +
// 			" <input type='number' name='how_many_hours' placeholder='to the nearest 0.5 hours' step='0.5' required /> " +
// 		" </fieldset><br> " +
// 		" <hr class='step_Divider'/> " +
// 		/*********************** Load questionnaire based on checkboxes checked ***********************/
// 		" <div id='outdoor_seasonal_decorations_sub_services'></div> " +
// 		/*********************** Load questionnaire based on checkboxes checked ***********************/
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment: " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id=' '></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required > " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }
// else if( id == "painting" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/*********************** Step 1 ***********************/
// 		"<div class='step step_1'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select Date of Venue: " +
// 			" </legend> " +
// 			" <input type='date' name='date_of_venue'  required/> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required/><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 2 ***********************/
// 		"<div class='step step_2'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Is this an interior or exterior painting job: " +
// 			" </legend> " +
// 			" <select name='painting_sub_service' onchange='load_painting_subservice_questionnaire()' class='' id='painting_sub_service'>" +
// 				" <option value=''> " + " SELECT ONE " + "</option>" +
// 				" <option value='interior'> " + " Interior " + "</option>" +
// 				" <option value='exterior'> " + " Exterior " + "</option>" +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_2'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_2'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		/*********************** Load questionnaire based on checkboxes checked ***********************/
// 		" <div id='painting_sub_services'></div> " +
// 		/*********************** Load questionnaire based on checkboxes checked ***********************/
//
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required > " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }
// else if( id == "pressure_washing" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/*********************** Step 1 ***********************/
// 		"<div class='step step_1'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select Date of Venue " +
// 			" </legend> " +
// 			" <input type='date' name='date_of_venue' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required /><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 2 ***********************/
// 		"<div class='step step_2'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Pressure Washing Subservices (select all that apply): " +
// 			" </legend> " +
// 			" <label><input type='checkbox' onchange='pressure_washing_cb_1_fn()' name='pressure_washing_subservices[]' id='patio_stone_and_walkways' value='patio_stone_and_walkways'/> Patio stone and walkways </label><br> " +
// 			" <label><input type='checkbox' onchange='pressure_washing_cb_2_fn()' name='pressure_washing_subservices[]' id='driveways' value='driveways' /> Driveways </label><br> " +
// 			" <label><input type='checkbox' onchange='pressure_washing_cb_3_fn()' name='pressure_washing_subservices[]' id='exterior_walls' value='exterior_walls' /> Exterior walls </label><br> " +
// 			" <label><input type='checkbox' onchange='pressure_washing_cb_4_fn()' name='pressure_washing_subservices[]' id='deck_surfaces' value='deck_surfaces' /> Deck surfaces </label><br> " +
// 			" <label><input type='checkbox' onchange='pressure_washing_cb_5_fn()' name='pressure_washing_subservices[]' id='fences' value='fences' /> Fences </label><br> " +
// 			" <label><input type='checkbox' onchange='pressure_washing_cb_6_fn()' name='pressure_washing_subservices[]' id='other_pressure_washing' value='other_pressure_washing' /> Other (describe in next Step) </label><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_2'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_2'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		/************ Load questionnaire based on checkboxes checked ***************/
// 		" <div id='load_pressure_washing_subservice_questionnaire'></div> " +
// 		/************ Load questionnaire based on checkboxes checked **************/
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment: " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id=' '></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required > " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }
// else if( id == "private_event_assistance" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/*********************** Step 1 ***********************/
// 		"<div class='step step_1'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select Date of Venue " +
// 			" </legend> " +
// 			" <input type='date' name='date_of_venue' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required /><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 2 ***********************/
// 		"<div class='step step_2'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Private Event Assistance Subservices (select all that apply): " +
// 			" </legend> " +
// 			" <label><input type='checkbox' name='private_event_assistance_subservices[]' value='hosting' id='hosting' /> Hosting </label><br> " +
// 			" <label><input type='checkbox' name='private_event_assistance_subservices[]' value='serving' id='serving' /> Serving </label><br> " +
// 			" <label><input type='checkbox' name='private_event_assistance_subservices[]' value='cleanup' id='cleanup' /> Cleanup </label><br> " +
// 			" <label><input type='checkbox' name='private_event_assistance_subservices[]' value='setup_assistance' id='setup_assistance' /> Setup assistance </label><br> " +
// 			" <label><input type='checkbox' name='private_event_assistance_subservices[]' value='takedown_assitance' id='takedown_assitance' /> Takedown assistance </label><br> " +
// 			" <label><input type='checkbox' name='private_event_assistance_subservices[]' value='other' id='other' /> Other (describe in next Step) </label><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_2'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_2'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What type of event will you be hosting: " +
// 			" </legend> " +
// 			" <textarea name='type_of_event' id='' required></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" How many guests do you anticipate to have at the event: " +
// 			" </legend> " +
// 			" <input type='number' name='how_many_guests' placeholder='total number' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" How many hours do you require assistance for: " +
// 			" </legend> " +
// 			" <input type='number' name='how_many_hours' placeholder='hours (to the nearest 0.5 of an integer)' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Describe the duties and tasks you would like assistance with: " +
// 			" </legend> " +
// 			" <textarea name='describe_duties' id='' required></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment: " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required> " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }
// else if( id == "rv_boat_cleaning" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/*********************** Step 1 ***********************/
// 		"<div class='step step_1'>" +
// 		"<div id='show_recurring_service'></div>" +
// 		" <div id='div_add_date'></div> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required/><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 2 ***********************/
// 		"<div class='step step_2'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" RV and Boat Cleaning Subservices (select all that apply): " +
// 			" </legend> " +
// 			" <label><input type='checkbox' name='rv_boat_cleaning_subservices[]' value='exterior_wash' id='exterior_wash' /> Exterior wash (Spray, soap, rinse) </label><br> " +
// 			" <label><input type='checkbox' name='rv_boat_cleaning_subservices[]' value='exterior_wax_and_polish' id='exterior_wax_and_polish'  /> Exterior wax and polish </label><br> " +
// 			" <label><input type='checkbox' name='rv_boat_cleaning_subservices[]' value='interior_quick_cleanup_package' onchange='rv_boat_cleaning_cb_1_fn()' id='interior_quick_cleanup_package' /> Interior - quick cleanup package </label><br> " +
// 			" <label><input type='checkbox' name='rv_boat_cleaning_subservices[]' value='interior_full_cleaning_package' onchange='rv_boat_cleaning_cb_2_fn()' id='interior_full_cleaning_package' /> Interior - full living/sitting area cleaning package </label><br> " +
// 			" <label><input type='checkbox' name='rv_boat_cleaning_subservices[]' value='othe_rv_boat_cleaning' onchange='rv_boat_cleaning_cb_3_fn()' id='othe_rv_boat_cleaning' /> Other (describe in next Step) </label><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_2'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_2'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What type of recreational vehicle/pleasure-craft do you own: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='type_of_vehicle' value='camper' /> Camper </label><br> " +
// 			" <label><input type='radio' name='type_of_vehicle' value='motorhome' /> Motorhome </label><br> " +
// 			" <label><input type='radio' name='type_of_vehicle' value='travel_trailer' /> Travel Trailer </label><br> " +
// 			" <label><input type='radio' name='type_of_vehicle' value='personal_watercraft' /> Personal watercraft (Jet ski, Sea-doo, or similar) </label><br> " +
// 			" <label><input type='radio' name='type_of_vehicle' value='basic_small_motor_boat' /> Basic small-motor boat </label><br> " +
// 			" <label><input type='radio' name='type_of_vehicle' value='speed_boat_or_cruiser' /> Speed boat or Cruiser </label><br> " +
// 			" <label><input type='radio' name='type_of_vehicle' value='sport_boats' /> Sport boats (wakeboard, fishing, or similar) </label><br> " +
// 			" <label><input type='radio' name='type_of_vehicle' value='pontoon_boat' /> Pontoon boat </label><br> " +
// 			" <label><input type='radio' name='type_of_vehicle' value='houseboat' /> Houseboat </label><br> " +
// 			" <label><input type='radio' name='type_of_vehicle' value='yatch' /> Yacht </label><br> " +
// 			" <label><input type='radio' name='type_of_vehicle' value='sailboat' /> Sailboat </label><br> " +
// 			" <label><input type='radio' name='type_of_vehicle' value='other' /> Other - indicate type in description box </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What is the length of your vehicle/pleasure-craft: " +
// 			" </legend> " +
// 			" <input type='number' name='length_of_vehicle' placeholder='linear feet' required /> " +
// 		" </fieldset><br> " +
// 		/************ Load questionnaire based on checkboxes checked ***************/
// 		" <div id='load_rv_boat_cleaning_subservice_questionnaire'></div> " +
// 		/************ Load questionnaire based on checkboxes checked **************/
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment: " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id='' required></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required > " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }
// else if( id == "snow_removal" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/*********************** Step 1 ***********************/
// 		"<div class='step step_1'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select Date of Venue " +
// 			" </legend> " +
// 			" <input type='date' name='date_of_venue' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required /><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 2 ***********************/
// 		"<div class='step step_2'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Snow Removal Subservices (select all that apply): " +
// 			" </legend> " +
// 			" <label><input type='checkbox' onchange='snow_removal_cb_1_fn()' name='snow_removal_subservices[]' value='shovel_driveway' id='shovel_driveway' /> Shovel driveway </label><br> " +
// 			" <label><input type='checkbox' onchange='snow_removal_cb_2_fn()' name='snow_removal_subservices[]' value='gravel_salt_driveway' id='gravel_salt_driveway' /> Gravel/Salt driveway </label><br> " +
// 			" <label><input type='checkbox' onchange='snow_removal_cb_3_fn()' name='snow_removal_subservices[]' value='shovel_walkways' id='shovel_walkways' /> Shovel walkways </label><br> " +
// 			" <label><input type='checkbox' onchange='snow_removal_cb_4_fn()' name='snow_removal_subservices[]' value='gravel_salt_walkways' id='gravel_salt_walkways' /> Gravel/Salt walkways </label><br> " +
// 			" <label><input type='checkbox' onchange='snow_removal_cb_5_fn()' name='snow_removal_subservices[]' value='shovel_sidewalk' id='shovel_sidewalk' /> Shovel sidewalk </label><br> " +
// 			" <label><input type='checkbox' onchange='snow_removal_cb_6_fn()' name='snow_removal_subservices[]' value='gravel_salt_sidewalk' id='gravel_salt_sidewalk' /> Gravel/Salt sidewalk </label><br> " +
// 			" <label><input type='checkbox' onchange='snow_removal_cb_7_fn()' name='snow_removal_subservices[]' value='shovel_patios_and_decks' id='shovel_patios_and_decks' /> Shovel patios and decks </label><br> " +
// 			" <label><input type='checkbox' onchange='snow_removal_cb_8_fn()' name='snow_removal_subservices[]' value='gravel_salt_patios_and_decks' id='gravel_salt_patios_and_decks' /> Gravel/Salt patios and decks </label><br> " +
// 			" <label><input type='checkbox' onchange='snow_removal_cb_9_fn()' name='snow_removal_subservices[]' value='break_and_remove_surface_ice_build_up' id='break_and_remove_surface_ice_build_up' /> Break and remove surface ice build-up </label><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_2'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_2'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		/************ Load questionnaire based on checkboxes checked ***************/
// 		" <div id='load_snow_removal_subservice_questionnaire'></div> " +
// 		/************ Load questionnaire based on checkboxes checked **************/
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment: " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id='' required ></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required> " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }
// else if( id == "tutoring" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/*********************** Step 1 ***********************/
// 		"<div class='step step_1'>" +
// 		"<div id='show_recurring_service'></div>" +
// 		" <div id='div_add_date'></div> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required/><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select your education level: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='level_of_education' value='elementary' required /> Elementary (K – 6) </label><br> " +
// 			" <label><input type='radio' name='level_of_education' value='junior_high' /> Junior High (grade 7 – 9) </label><br> " +
// 			" <label><input type='radio' name='level_of_education' value='high_school' /> High School (10 – 12) </label><br> " +
// 			" <label><input type='radio' name='level_of_education' value='post_secondary' /> Post Secondary School (University, College) </label><br> " +
// 			" <label><input type='radio' name='level_of_education' value='trades' /> Trades </label><br> " +
// 			" <label><input type='radio' name='level_of_education' value='other' /> Other – describe below </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What topic would you like assistance with: " +
// 			" </legend> " +
// 			" <textarea name='topic' id='' required></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What level/grade are you studying: " +
// 			" </legend> " +
// 			" <textarea name='level_grade_studying' id='' required></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" What are your objectives for the sessions: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='objectives_for_session' value='start_from_scratch' required /> Starting from scratch, need to learn the basics </label><br> " +
// 			" <label><input type='radio' name='objectives_for_session' value='stuck_on_few_topics' /> Some understanding of topic, stuck on a few things </label><br> " +
// 			" <label><input type='radio' name='objectives_for_session' value='looking_to_improve' /> Good understanding of most things, looking to improve </label><br> " +
// 			" <label><input type='radio' name='objectives_for_session' value='help_with_assignment_test' /> Need help with a single assignment or upcoming test </label><br> " +
// 			" <label><input type='radio' name='objectives_for_session' value='other' /> Other – describe below </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment (specific areas of focus, location details, books or materials to be used, special needs, etc.): " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required > " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }
// else if( id == "vehicle_care" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/*********************** Step 1 ***********************/
// 		"<div class='step step_1'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select Date of Venue " +
// 			" </legend> " +
// 			" <input type='date' name='date_of_venue' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Enter Title: " +
// 			" </legend> " +
// 			" <input type='text' name='job_title' required /><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 2 ***********************/
// 		"<div class='step step_2'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select all that apply: " +
// 			" </legend> " +
// 			" <label><input type='checkbox' onchange='vehicle_care_cb_1_fn()' name='vehicle_care_subservices[]' value='wash' id='wash' /> Wash vehicle (spray, soap, and rinse exterior) </label><br> " +
// 			" <label><input type='checkbox' onchange='vehicle_care_cb_2_fn()' name='vehicle_care_subservices[]' value='was_and_polish' id='was_and_polish' /> Wax and polish vehicle (exterior) </label><br> " +
// 			" <label><input type='checkbox' onchange='vehicle_care_cb_3_fn()' name='vehicle_care_subservices[]' value='vacuum_and_clean' id='vacuum_and_clean' /> Interior vacuum and cleaning </label><br> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_2'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_2'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		/************ Load questionnaire based on checkboxes checked ***************/
// 		" <div id='load_vehicle_care_subservice_questionnaire'></div> " +
// 		/************ Load questionnaire based on checkboxes checked **************/
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment: " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' required /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' required />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' required /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' required /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' required /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' required /> " +
// 			" <select name='time_of_service_am_pm' class='inline' required> " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }
// else if( id == "yard_care" ){
// 	$("div.populate_job_category").html("");
// 	$("div.populate_job_category").html(" " +
// 		/*********************** Step 1 ***********************/
// 		"<div class='step step_1'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select sub-service: " +
// 			" </legend> " +
// 			" <select onchange='show_entry_dates()' name='yard_care_subservices' class='' id='yard_care_subservices'>" +
// 				" <option value=''> " + " SELECT ONE " + "</option>" +
// 				" <option value='lawn_mowing'> " + " Lawn mowing " + "</option>" +
// 				" <option value='whipper_snip_grass_edge_trimming'> " + " Whipper snip / grass edge trimming " + "</option>" +
// 				" <option value='rake_collections_of_grass_after_mowing'> " + " Rake collections of grass after mowing " + "</option>" +
// 				" <option value='lawn_weed_removal'> " + " Lawn weed removal " + "</option>" +
// 				" <option value='lawn_deweeding_spray'> " + " Lawn deweeding spray " + "</option>" +
// 				" <option value='rake_leaves'> " + " Rake leaves " + "</option>" +
// 				" <option value='hedge_and_shrub_trimming'> " + " Hedge and Shrub trimming " + "</option>" +
// 				" <option value='tree_pruning'> " + " Tree pruning " + "</option>" +
// 				" <option value='lawn_aeration'> " + " Lawn Aeration " + "</option>" +
// 				" <option value='fertilizing'> " + " Fertilizing " + "</option>" +
// 				" <option value='winterize_hedges_shrubs_and_small_trees'> " + " Winterize (cover) hedges, shrubs, and small trees " + "</option>" +
// 				" <option value='garden_deweeding'> " + " Garden - deweeding " + "</option>" +
// 				" <option value='garden_place_mulch_topsoil'> " + " Garden - place mulch/topsoil " + "</option>" +
// 				" <option value='plant_garden_flowers_and_small_garden_plants'> " + " Plant garden flowers and small garden plants " + "</option>" +
// 				" <option value='other_yard_care_subservice'> " + " Other (describe in next Step) " + "</option>" +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		/************ Change entry dates based on recurring service option **************/
// 		" <div id='change_based_on_recurring_condition'></div> " +
// 		/************ Change entry dates based on recurring service option **************/
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_next_from_step_1'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 2 ***********************/
// 		"<div class='step step_2'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Estimate the grass area of your yard: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='grass_area' value='small' /> Small (less than 1,000 sq ft) </label><br> " +
// 			" <label><input type='radio' name='grass_area' value='medium' /> Medium (1,000-5,000 sq ft) </label><br> " +
// 			" <label><input type='radio' name='grass_area' value='large' /> Large (5,000-10,000 sq ft) </label><br> " +
// 			" <label><input type='radio' name='grass_area' value='very_large' /> Very large (10,000+ sq ft) – indicate size in description box </label><br> " +
// 		" </fieldset><br> " +
// 		/************ Change entry dates based on recurring service option **************/
// 		" <div id='load_yard_care_subservice_questionnare'></div> " +
// 		/************ Change entry dates based on recurring service option **************/
//
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_2'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_2'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 3 ***********************/
// 		"<div class='step step_3'>" +
// 		/************ Load questionnaire based on checkboxes checked ***************/
// 		" <div id='load_vehicle_care_subservice_questionnaire'></div><br> " +
// 		/************ Load questionnaire based on checkboxes checked **************/
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Additional comments and description for your appointment: " +
// 			" </legend> " +
// 			" <textarea name='comments_for_appointment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_3'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			"</button> " +
// 		"</div> " +
// 		" <div class='col-lg-6 col-md-6 col-xs-6'> " +
// 			" <button type='button' class='btn-step go_next_from_step_3'> " +
// 				" Next &nbsp <span class='glyphicon glyphicon-chevron-right'></span> " +
// 			"</button> " +
// 		"</div> " +
// 		"</div>" +
// 		/*********************** Step 4 ***********************/
// 		"<div class='step step_4'>" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the equipment required to do the job: " +
// 			" </legend> " +
// 			" <label><input type='radio' name='equipment_provided' value='Yes' /> Yes, all of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='No' /> No, none of it </label><br> " +
// 			" <label><input type='radio' name='equipment_provided' value='Some' /> Some of it </label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the equipment you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_equipment' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Will you provide the materials/supplies (consumables) required to do the job? " +
// 			" </legend> " +
// 			" <label><input type='radio' name='materials_provided' value='Yes' />Yes, all of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='No' />No, none of it</label><br> " +
// 			" <label><input type='radio' name='materials_provided' value='Some' />Some of it</label><br> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Add a description to the materials/supplies you have, or require the Student to bring: " +
// 			" </legend> " +
// 			" <textarea name='description_of_materials_required' id=''></textarea> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Location of service: " +
// 			" </legend> " +
// 			" <input type='text' name='address_of_service_name' class='inline' placeholder='street name and number' /> " +
// 			" <input type='text' name='address_of_service_postal_code' class='inline' placeholder='postal code' /> " +
// 		" </fieldset><br> " +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Time of service: " +
// 			" </legend> " +
// 			" <input name='time_of_service_hours' class='inline' type='number' placeholder='hours' /> " +
// 			" <input name='time_of_service_minutes' class='inline' type='number' placeholder='minutes' /> " +
// 			" <select name='time_of_service_am_pm' class='inline'> " +
// 				" <option value='am'>am</option> " +
// 				" <option value='pm'>pm</option> " +
// 			" </select> " +
// 		" </fieldset><br> " +
// 		" <div class='col-lg-12 col-md-12 col-xs-12'> " +
// 			" <button type='button' class='btn-step go_previous_from_step_4'> " +
// 				" <span class='glyphicon glyphicon-chevron-left'></span> &nbsp Previous " +
// 			" </button> " +
// 		" </div> " +
// 		" <input type='submit' class='customBtn1' value='POST' /> " +
// 		" </div>  ");
// }

// else if( id == "other" ){
if( id == "other" ){
	$("div.populate_job_category").html("");
	$("div.populate_job_category").html(" " +
		/*********************** Step 1 ***********************/
		"<div class='step step_1'>" +

		" <fieldset class='form-group'> " +
			" <label for='job_title'> " +
				" Title of Job - this is the headline that students will see: " +
			" </label> " +
			" <input type='text' class='form-control' name='job_title' id='job_title' /> " +
		" </fieldset> " +

		" <fieldset class='form-group'> " +
			" <label for='task_description'> " +
				" Get creative, post any task, be as specific as possible: " +
			" </label> " +
			" <textarea name='task_description' class='form-control' rows='3' id='task_description' placeholder='Be specific (ex: any special working conditions like working at heights or heavy lifting, how many students you require, car type, etc)' ></textarea> " +
		" </fieldset> " +

		" <fieldset class='form-group'> " +
			" <label for='how_many_hours'> " +
				" How many hours do you require assistance for: " +
			" </label> " +
			" <input type='number' name='how_many_hours' class='form-control' id='how_many_hours' step='0.5' placeholder='Hours to the nearest 0.5'  /> " +
		" </fieldset> " +

		" <div class='col-lg-12 col-md-12 col-xs-12 step_nav_row'> " +
			" <button type='button' class='btn-step btn-step-right go_next_from_step_1'> " +
				" Next &nbsp <span class='glyphicon glyphicon-arrow-right'></span> " +
			"</button> " +
		"</div> " +

		"</div>" +
		/*********************** Step 3 ***********************/
		"<div class='step step_3'>" +

			"<div class='form-group row'>" +
	     "<label class='col-sm-12'>Will you provide the equipment/materials required to do the job:</label>" +
	     "<div class='col-sm-12'>" +
	       "<div class='radio'>" +
	         "<label>" +
	           "<input type='radio' onclick='populate_description_of_materials_required_fn()' id='populate_description_of_materials_required_yes' name='equipment_provided' value='Yes'  />" +
							"<span> &nbsp &nbsp &nbsp  Yes, all of them </span>" +
	         "</label>" +
	       "</div>" +
	       "<div class='radio'>" +
	         "<label>" +
	           "<input type='radio' onclick='populate_description_of_materials_required_fn()' id='populate_description_of_materials_required_no' name='equipment_provided' value='No' />" +
							"<span> &nbsp &nbsp &nbsp  No, none of it </span>" +
	         "</label>" +
	       "</div>" +
	       "<div class='radio'>" +
	         "<label>" +
	           "<input type='radio' onclick='populate_description_of_materials_required_fn()' id='populate_description_of_materials_required_some' name='equipment_provided' value='Some' />" +
							"<span> &nbsp &nbsp &nbsp  Some of it </span>" +
	         "</label>" +
	       "</div>" +
	     "</div>" +
	   "</div>" +

		" <div id='populate_description_of_materials_required'></div> " +

		" <div class='col-lg-12 col-md-12 col-xs-12 step_nav_row'> " +
		// " <div class='col-lg-6 col-md-6 col-xs-6'> " +
			" <button type='button' class='btn-step btn-step-left go_previous_from_step_3'> " +
				" <span class='glyphicon glyphicon-arrow-left'></span> &nbsp PREV " +
			"</button> " +
		// "</div> " +
		// " <div class='col-lg-6 col-md-6 col-xs-6'> " +
			" <button type='button' class='btn-step btn-step-right go_next_from_step_3'> " +
				" NEXT &nbsp <span class='glyphicon glyphicon-arrow-right'></span> " +
			"</button> " +
		// "</div> " +
		"</div> " +

		"</div>" +
		/*********************** Step 4 ***********************/
		"<div class='step step_4'>" +

		" <div id='show_recurring_service'></div> " +
		" <div id='div_add_date'></div> " +

		" <fieldset class='form-group'> " +
			" <label> " +
				" Preferred Start Time of Service: " +
			" </label> <br />" +
			" <input name='time_of_service_hours' onkeypress='return isNumberKey(event)' min='0' max='12' id='input_requiring_validation' class='inline col-xs-5' type='number' placeholder='hours' /> " +
			" <input name='time_of_service_minutes' onkeypress='return isNumberKey(event)' min='0' max='60' id='input_requiring_validation' class='inline col-xs-5' type='number' placeholder='minutes'  /> " +
			" <select name='time_of_service_am_pm' class='inline col-xs-2' > " +
				" <option value='am'>am</option> " +
				" <option value='pm'>pm</option> " +
			" </select><br /> " +
			" <small class='col-xs-12 text-muted'> To maximize the student offers you receive, we recommend a date that is between 2 and 7 days away from the time you submit this request. We can still accommodate dates outside of tho range, it may just result in fewer student offers. </small> " +
		" </fieldset> " +

		" <fieldset class='form-group'> " +
			" <label for='flexibility_of_date_time'> " +
				" Are you flexible with your date and time: " +
			" </label> " +
			" <textarea class='form-control' name='flexibility_of_date_time' id='flexibility_of_date_time'></textarea> " +
			" <small class='text-muted'> If you're flexible, let us know as it may increase the amount of student offers you receive. </small> " +
		" </fieldset> " +

		" <fieldset class='form-group'> " +
			" <label> " +
				" Location of service: " +
			" </label> <br />" +
			" <input type='text' name='address_of_service_name' class='form-control inline' placeholder='street name and number'  /> " +
			" <input type='text' name='address_of_service_postal_code' class='form-control inline' placeholder='postal code'  /> " +
		" </fieldset> " +

		" <div class='col-lg-12 col-md-12 col-xs-12 step_nav_row'> " +
			" <button type='button' class='btn-step btn-step-left go_previous_from_step_4'> " +
				" <span class='glyphicon glyphicon-arrow-left'></span> &nbsp PREV " +
			" </button> " +
		" </div> " +

		" <div class='col-lg-12 col-md-12 col-xs-12' style='margin-top: 50px;'> " +
			" <input type='submit' class='customBtn1' value='POST' /> " +
		" </div> " +

		"</div>" );
}
// else{
// 	$("div.populate_job_category").html("<h1>Could not load docs</h1>");
// }

/****************** Validate hours and inutes input fields ******************/
$(document).on('blur',"#input_requiring_validation", function() {
  if($(this).val().length > 2 ){
    var sub = $(this).val().substring(0,1) + $(this).val().substring(2,3);
    $(this).val( sub );
  }

  if($(this).val().length === 1){
    $(this).val("0" + $(this).val());
  }
});

$(document).on('keyup',"#input_requiring_validation", function() {
    var number = parseFloat($(this).val());
    var max = parseFloat($(this).attr("max"));
    var min = parseFloat($(this).attr("min"));
    if(number > max){
      var return_value = $(this).val().slice(0, -1);
      $(this).val(return_value);
    }else if(number < min){
      $(this).val(min);
    }
});

$(document).on('keypress','#input_requiring_validation', function(evt) {
	    var charCode = (evt.which) ? evt.which : event.keyCode;
	    if ( charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57) ){
				return false;
			}else{
				return true;
			}
});
/****************************************************************************/



/************ Recurring entry dates function for job categories ************/
$("div#show_recurring_service").html("" +

		"<div class='form-group row'>" +
    "<label class='col-sm-12'>Will this service be recurring?</label>" +
	    "<div class='col-sm-12'>" +

	      "<div class='radio' style='width: 50%;'>" +
	        "<label>" +
	          "<input type='radio' name='recurring' onclick='recurring_cb_fn()' id='recurring_yes' value='Yes'/>" +
						"<span> &nbsp &nbsp &nbsp Yes</span>" +
	        "</label>" +
	      "</div>" +

	      "<div class='radio' style='width: 50%;'>" +
	        "<label>" +
	          "<input type='radio' name='recurring' onclick='recurring_cb_fn()' id='recurring_no' value='No'/>" +
						"<span> &nbsp &nbsp &nbsp No</span>" +
	        "</label>" +
	      "</div>" +

	  	"</div>" +
  	"</div>" );



// var val = $("#job_category").val();
// if( val == "dog_walking" || val == "exterior_window_washing" || val == "house_cleaning" || val == "international_languages" || val == "music_lessons" || val == "rv_boat_cleaning" || val == "tutoring"  ){
// 	$("div#show_recurring_service").html("" +
// 			"<fieldset> " +
// 				" <legend> " +
// 					" Is this a RECURRING service? " +
// 				" </legend> " +
// 				" <input type='radio' name='recurring' onclick='recurring_cb_fn()' id='recurring_yes' value='Yes'/><label>Yes</label><br> " +
// 				" <input type='radio' name='recurring' onclick='recurring_cb_fn()' id='recurring_no' value='No'/><label>No</label> " +
// 			" </fieldset><br> " );
// }
// else if( val == "" ){
// 	$("div#change_based_on_recurring_condition").html("");
// }
// else{
// 	$("div#change_based_on_recurring_condition").html("" +
// 			" <fieldset> " +
// 				" <legend> " +
// 					" Select Date of Venue " +
// 				" </legend> " +
// 				" <input type='date' name='date_of_venue' /> " +
// 			" </fieldset><br> " +
// 			" <fieldset> " +
// 				" <legend> " +
// 					" Enter Title: " +
// 				" </legend> " +
// 				" <input type='text' name='job_title' /><br> " +
// 			" </fieldset><br> " );
// }

// });

});

/************ Recurring entry dates function for job categories ************/
function populate_description_of_materials_required_fn(){
	if( $("input#populate_description_of_materials_required_no").is(":checked") || $("input#populate_description_of_materials_required_some").is(":checked") ){
		$("div#populate_description_of_materials_required").html("" +
		" <fieldset class='form-group'> " +
			" <label for='description_of_materials_required'> " +
				" Add a description to the equipment required to do the job: " +
			" </label> " +
			" <textarea name='description_of_materials_required' id='description_of_materials_required' class='form-control' rows='3' placeholder='Ex: If a truck is required, lawn mower, whipper snipper, cleaning supplies, ladder, etc.' id=''></textarea> " +
		" </fieldset><br> " );
	}
	else if( $("input#populate_description_of_materials_required_yes").is(":checked") ){
		$("div#populate_description_of_materials_required").html(" ");
	}
}
/***************************************************************************/


/****************************** Temporary recurring function *******************************/
function recurring_cb_fn(){
	if( $("#recurring_yes").is(":checked") ){
		$("div#div_add_date").html("" +
			" <fieldset class='form-group'> " +
				" <label for='date_of_venue'> " +
					" Select Date of Job: " +
					" <p class='text-muted'> User can not select a date prior to the current date </p> " +
				" </label> " +
				" <input type='text' placeholder='mm/dd/yyyy' class='date_of_venue form-control' id='date_of_venue' name='date_of_venue' /> " +
			" </fieldset> " +
			" <fieldset class='form-group'> " +
				" <label for='frequency_of_recurring_dates'> " +
					" Pleasse indicate the frequency that this job will have: " +
				" </label> " +
				" <textarea name='frequency_of_recurring_dates' class='form-control' id='frequency_of_recurring_dates' placeholder='Ex: daily, weekly, bi-weekly, monthly. Include the length of time you would like the service for (end date)'></textarea> " +
			" </fieldset> " );

			$("input#date_of_venue").datepicker();

	}else if( $("#recurring_no").is(":checked") ){
		$("div#div_add_date").html("" +
			" <fieldset class='form-group'> " +
				" <label for='date_of_venue'> " +
					" Select Date of Job: " +
					" <p class='text-muted'> User can not select a date prior to the current date </p> " +
				" </label> " +
				" <input type='text' placeholder='mm/dd/yyyy' class='date_of_venue form-control' id='date_of_venue' name='date_of_venue' /> " +
			" </fieldset> " );

			$("input#date_of_venue").datepicker();

	}
}
/*******************************************************************************************/

// function recurring_cb_fn(){
// 	if( $("#recurring_yes").is(":checked") ){
// 		$("div#div_add_date").html("" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select Date of $Referer " +
// 			" </legend> " +
// 			" <a href='#' id='add_date_fieldset' onclick='add_date()'>Add another date</a><br /><br /> " +
// 			" <input type='date' class='date_of_venue' id='date_of_venue' name='date_of_venue[]' /> " +
// 				" <div class='add_date_for_venue'></div> " +
// 		" </fieldset> " );
// 	}else if( $("#recurring_no").is(":checked") ){
// 		$("div#div_add_date").html("" +
// 		" <fieldset> " +
// 			" <legend> " +
// 				" Select Date of $Referer: " +
// 			" </legend> " +
// 			" <input type='date' class='date_of_venue' id='date_of_venue' name='date_of_venue' /> <br><br>" +
// 		" </fieldset> " );
// 	}
// }
// function add_date(){
// 	$("div#div_add_date").append("" +
// 	" <fieldset> " +
// 		" <input type='date' class='date_of_venue' id='date_of_venue' name='date_of_venue[]' /> " +
// 		" <a href='' id='remove_date_fieldset' name='remove_date_fieldset'><span class='el el-remove-circle'></span></a> " +
// 	" </fieldset> " );
// }
/************ Recurring entry dates function ************/





/*************************************** Load Delivery sub-service options functions ***************************************/
function load_delivery_subservice_questionnare_fn(){
var val = $("#delivery_sub_services").val();
if( val == "to_specific_address" ){

	$("div#load_delivery_subservice_questionnare").html("");
	$("div#load_delivery_subservice_questionnare").html(" " +
		" <fieldset> " +
			" <legend> " +
				" What type of items do you have to deliver: " +
			" </legend> " +
			" <select name='type_of_items_to_specific_address' class='' id='' required>" +
				" <option value=''> " + " SELECT ONE " + "</option>" +
				" <option value='business_ad'> " + " Business advertisements (brochures, cards, catalogs, coupons, etc.) " + "</option>" +
				" <option value='personal_small'> " + " Personal items - small (cards, letters, general mail, etc.) " + "</option>" +
				" <option value='personal_large'> " + " Personal items - large (gifts, flowers, parcels, etc.) " + "</option>" +
				" <option value='other'> " + " Other – describe below " + "</option>" +
			" </select> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Describe the type of items you want to have delivered: " +
			" </legend> " +
			" <textarea name='description_of_type_of_items_to_specific_address' id='' required></textarea> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" How many items do you have to be delivered: " +
			" </legend> " +
			" <input name='number_of_items_to_specific_address' type='number' required /> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" How do you want the items to be delivered: " +
			" </legend> " +
			" <label><input type='radio' name='process_of_delivery_to_specific_address' value='door_to_door' required /> Door-to-Door with interaction (ring doorbell and greet) </label><br> " +
			" <label><input type='radio' name='process_of_delivery_to_specific_address' value='mailbox' /> Mailbox drop-off </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Enter the addresses that the items should be delivered to: " +
			" </legend> " +
			" <textarea name='location_of_delivery_to_specific_address' id='' required></textarea> " +
		" </fieldset><br> " );
}
else if( val == "to_set_areas" ){

	$("div#load_delivery_subservice_questionnare").html("");
	$("div#load_delivery_subservice_questionnare").html(" " +
		" <fieldset> " +
			" <legend> " +
				" What type of items do you have to deliver: " +
			" </legend> " +
			" <select name='type_of_items_to_set_areas' class='' id='' required>" +
				" <option value=''> " + " SELECT ONE " + "</option>" +
				" <option value='business_ad'> " + " Business advertisements (brochures, cards, catalogs, coupons, etc.) " + "</option>" +
				" <option value='personal_small'> " + " Personal items - small (cards, letters, general mail, etc.) " + "</option>" +
				" <option value='personal_large'> " + " Personal items - large (gifts, flowers, parcels, etc.) " + "</option>" +
				" <option value='other'> " + " Other – describe below " + "</option>" +
			" </select> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Describe the type of items you want to have delivered: " +
			" </legend> " +
			" <textarea name='description_of_type_of_items_to_set_areas' id='' required></textarea> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" How many items do you have to be delivered: " +
			" </legend> " +
			" <input type='number' name='number_of_items_to_set_areas' required /> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" How do you want the items to be delivered: " +
			" </legend> " +
			" <label><input type='radio' name='process_of_delivery_to_set_areas' value='door_to_door' required /> Door-to-Door with interaction (ring doorbell and greet) </label><br> " +
			" <label><input type='radio' name='process_of_delivery_to_set_areas' value='mailbox' /> Mailbox drop-off </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Enter the areas or communities that the items should be delivered to: " +
			" </legend> " +
			" <textarea name='location_of_delivery_to_set_areas' id='' required></textarea> " +
		" </fieldset><br> " );

}
}

/*************************************** Garage, Shop, and Shed Cleaning function ***************************************/
function load_garage_shop_shed_cleaning_subservice_questionnare_fn(){

var val = $("#garage_shop_shed_cleaning_subservices").val();
if( val == "garbage_clean_up" ){

	$("div#load_garage_shop_shed_cleaning_subservice_questionnare").html("");
	$("div#load_garage_shop_shed_cleaning_subservice_questionnare").html(" " +
		" <fieldset> " +
			" <legend> " +
				" Estimate the floor area of the space to be cleaned: " +
			" </legend> " +
			" <select name='floor_area_garbage_clean_up' class='' id='' required>" +
				" <option value=''> " + " SELECT ONE " + "</option>" +
				" <option value='compact'> " + " Compact (less than 100 sq ft) " + "</option>" +
				" <option value='small'> " + " Small (100 - 200 sq ft) " + "</option>" +
				" <option value='medium'> " + " Medium (200 - 600 sq ft) " + "</option>" +
				" <option value='large'> " + " Large (600 – 1,000 sq ft) " + "</option>" +
				" <option value='very_large'> " + " Very large (more than 1,000 sq ft) – indicate size in description box " + "</option>" +
			" </select> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" How much garbage is in the space that needs to be cleaned out: " +
			" </legend> " +
			" <label><input type='radio' name='how_much_garbage_garbage_clean_up' value='not_much' required /> Not very much </label><br> " +
			" <label><input type='radio' name='how_much_garbage_garbage_clean_up' value='little' /> A little bit </label><br> " +
			" <label><input type='radio' name='how_much_garbage_garbage_clean_up' value='quite_a_bit' /> Quite a bit </label><br> " +
			" <label><input type='radio' name='how_much_garbage_garbage_clean_up' value='lot' /> A lot </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Where is the garbage going: " +
			" </legend> " +
			" <label><input type='radio' name='where_to_garbage_clean_up' value='bags' required /> Collect in bags, store in cleaning area </label><br> " +
			" <label><input type='radio' name='where_to_garbage_clean_up' value='bins' /> Bin(s) on the property </label><br> " +
			" <label><input type='radio' name='where_to_garbage_clean_up' value='vehicle' /> Load in customer’s/owner’s vehicle (for future hauling) </label><br> " +
			" <label><input type='radio' name='where_to_garbage_clean_up' value='other' /> Other - indicate in description box </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" How do you want the items to be delivered: " +
			" </legend> " +
			" <label><input type='radio' name='how_to_deliver_garbage_clean_up' value='door_to_door' required /> Door-to-Door with interaction (ring doorbell and greet) </label><br> " +
			" <label><input type='radio' name='how_to_deliver_garbage_clean_up' value='mailbox' /> Mailbox drop-off </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Additional comments and description for your appointment: " +
			" </legend> " +
			" <textarea name='comments_for_appointment_garbage_clean_up' id='' required></textarea> " +
		" </fieldset><br> " );

}
else if( val == "organize_and_put_away_items" ){

	$("div#load_garage_shop_shed_cleaning_subservice_questionnare").html("");
	$("div#load_garage_shop_shed_cleaning_subservice_questionnare").html(" " +
		" <fieldset> " +
			" <legend> " +
				" Estimate the floor area of the space to be cleaned: " +
			" </legend> " +
			" <select name='floor_area_organize_and_put_away_items' class='' id='' required>" +
				" <option value=''> " + " SELECT ONE " + "</option>" +
				" <option value='compact'> " + " Compact (less than 100 sq ft) " + "</option>" +
				" <option value='small'> " + " Small (100 - 200 sq ft) " + "</option>" +
				" <option value='medium'> " + " Medium (200 - 600 sq ft) " + "</option>" +
				" <option value='large'> " + " Large (600 – 1,000 sq ft) " + "</option>" +
				" <option value='very_large'> " + " Very large (more than 1,000 sq ft) – indicate size in description box " + "</option>" +
			" </select> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" How much cluster and misplaced items are in the space: " +
			" </legend> " +
			" <label><input type='radio' name='how_much_cluster_organize_and_put_away_items' value='not_much' required /> Not very much </label><br> " +
			" <label><input type='radio' name='how_much_cluster_organize_and_put_away_items' value='little' /> A little bit </label><br> " +
			" <label><input type='radio' name='how_much_cluster_organize_and_put_away_items' value='quite_a_bit' /> Quite a bit </label><br> " +
			" <label><input type='radio' name='how_much_cluster_organize_and_put_away_items' value='lot' /> A lot </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Is there heavy lifting involved (over 50 lbs): " +
			" </legend> " +
			" <label><input type='radio' name='heavy_lifting_involved_organize_and_put_away_items' value='none' required /> None </label><br> " +
			" <label><input type='radio' name='heavy_lifting_involved_organize_and_put_away_items' value='few' /> Yes, but very few items </label><br> " +
			" <label><input type='radio' name='heavy_lifting_involved_organize_and_put_away_items' value='several' /> Yes, several items </label><br> " +
			" <label><input type='radio' name='heavy_lifting_involved_organize_and_put_away_items' value='most' /> Yes, most items </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Additional comments and description for your appointment: " +
			" </legend> " +
			" <textarea name='comments_for_appointment_organize_and_put_away_items' id='' required></textarea> " +
		" </fieldset><br> " );

}
else if( val == "other" ){

	$("div#load_garage_shop_shed_cleaning_subservice_questionnare").html("");
	$("div#load_garage_shop_shed_cleaning_subservice_questionnare").html(" " +
		" <fieldset> " +
			" <legend> " +
				" What type of items do you have to deliver: " +
			" </legend> " +
			" <select name='type_of_items_other' class='' id='' required>" +
				" <option value=''> " + " SELECT ONE " + "</option>" +
				" <option value='business_ad'> " + " Business advertisements (brochures, cards, catalogs, coupons, etc.) " + "</option>" +
				" <option value='personal_small'> " + " Personal items - small (cards, letters, general mail, etc.) " + "</option>" +
				" <option value='personal_large'> " + " Personal items - large (gifts, flowers, parcels, etc.) " + "</option>" +
				" <option value='other'> " + " Other – describe below " + "</option>" +
			" </select> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Describe the scope, details, and size/quantity of the service you would like: " +
			" </legend> " +
			" <textarea name='details_of_service_other' id='' required></textarea> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Estimate the number of hours that this service will take: " +
			" </legend> " +
			" <input type='number' name='number_of_hours_other' required /> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Additional comments and description for your appointment: " +
			" </legend> " +
			" <textarea name='comments_for_appointment_other' id=''></textarea> " +
		" </fieldset><br> " );

}
}


/********************************* House Cleaning Checkbox Functions ***********************************************/
function checkbox_1_fn(){
	if( $("#living_areas_and_bedrooms").is(":checked") ){
		$("#load_questions_based_on_checkboxes_checked").append("" +
			" <div class='sub_section bedrooms_and_living_area'> " +
			" <fieldset> " +
				" <legend> " +
					" <h1>BEDROOMS AND LIVING AREAS</h1> <br> How many bedrooms in your residence: " +
				" </legend> " +
				" <select name='how_many_bedrooms' class='' id=' ' required>" +
					" <option value=''> " + " SELECT ONE " + "</option>" +
					" <option value='1'> " + " 1 " + "</option>" +
					" <option value='2'> " + " 2 " + "</option>" +
					" <option value='3'> " + " 3 " + "</option>" +
					" <option value='4'> " + " 4 " + "</option>" +
					" <option value='5_or_more'> " + " 5 or more - indicate in description box " + "</option>" +
				" </select> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" <h1>How many living rooms in your residence: " +
				" </legend> " +
				" <select name='how_many_living_rooms' class='' id=' ' required>" +
					" <option value=''> " + " SELECT ONE " + "</option>" +
					" <option value='1'> " + " 1 " + "</option>" +
					" <option value='2'> " + " 2 " + "</option>" +
					" <option value='3'> " + " 3 " + "</option>" +
					" <option value='4'> " + " 4 " + "</option>" +
					" <option value='5_or_more'> " + " 5 or more - indicate in description box " + "</option>" +
				" </select> " +
			" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.bedrooms_and_living_area").remove();
	}
}

function checkbox_2_fn(){
	if( $("#bathrooms").is(":checked") ){
		$("#load_questions_based_on_checkboxes_checked").append("" +
			" <div class='sub_section bathrooms'> " +
			" <fieldset> " +
				" <legend> " +
					" <h1>BATHROOMS</h1> <br> How many bathrooms in your residence: " +
				" </legend> " +
				" <select name='how_many_bathrooms' class='' id=' ' required>" +
					" <option value=''> " + " SELECT ONE " + "</option>" +
					" <option value='1'> " + " 1 " + "</option>" +
					" <option value='1.5'> " + " 1.5 " + "</option>" +
					" <option value='2'> " + " 2 " + "</option>" +
					" <option value='2.5'> " + " 2.5 " + "</option>" +
					" <option value='3'> " + " 3 " + "</option>" +
					" <option value='3.5'> " + " 3.5 " + "</option>" +
					" <option value='4'> " + " 4 " + "</option>" +
					" <option value='4.5_or_more'> " + " 4.5 or more - indicate in description box " + "</option>" +
				" </select> " +
			" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.bathrooms").remove();
	}
}

function checkbox_3_fn(){
	if( $("#kitchens").is(":checked") ){
		$("#load_questions_based_on_checkboxes_checked").append("" +
			" <div class='sub_section kitchens'> " +
			" <fieldset> " +
				" <legend> " +
					" <h1> KITCHENS </h1> <br> How many kitchens in your residence: </h1> " +
				" </legend> " +
				" <select name='how_many_kitchens' class='' id=' ' required>" +
					" <option value=''> " + " SELECT ONE " + "</option>" +
					" <option value='1'> " + " 1 " + "</option>" +
					" <option value='1.5'> " + " 1.5 " + "</option>" +
					" <option value='2'> " + " 2 " + "</option>" +
					" <option value='2.5_or_more'> " + " 2.5 or more - indicate in description box " + "</option>" +
				" </select> " +
			" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.kitchens").remove();
	}
}

function checkbox_4_fn(){
	if( $("#laundry_package").is(":checked") ){
		$("#load_questions_based_on_checkboxes_checked").append("" +
			" <div class='sub_section laundry_package'> " +
			" <h1> LAUNDRY PACKAGE </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How many total loads of laundry do you estimate (including separating whites): " +
				" </legend> " +
				" <select name='loads_of_laundry' class='' id=' ' required>" +
					" <option value=''> " + " SELECT ONE " + "</option>" +
					" <option value='1'> " + " 1 " + "</option>" +
					" <option value='2'> " + " 2 " + "</option>" +
					" <option value='3'> " + " 3 " + "</option>" +
					" <option value='4'> " + " 4 " + "</option>" +
					" <option value='5_or_more'> " + " 5 or more - indicate in description box " + "</option>" +
				" </select> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Describe the type and number of items you would like washed and dried. Specify anything that must be air-dried (not be put in dryer). Specify the types and number of items you would like ironed: " +
				" </legend> " +
				" <textarea name='type_and_number_of_laundry' id=' ' required></textarea> " +
			" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.laundry_package").remove();
	}
}

function checkbox_5_fn(){
	if( $("#deep_cleaning_packages").is(":checked") ){
		$("#load_questions_based_on_checkboxes_checked").append("" +
		" <div class='sub_section deep_cleaning_package'> " +
		" <h1> DEEP CLEANING PACKAGE </h1> " +
		" <fieldset> " +
			" <legend> " +
				" How many windows and doors in your residence: " +
			" </legend> " +
			" <label><input type='radio' name='how_many_windowns_and_doors' value='under5' required /> Under 5 </label><br> " +
			" <label><input type='radio' name='how_many_windowns_and_doors' value='6to10' /> 6 - 10 </label><br> " +
			" <label><input type='radio' name='how_many_windowns_and_doors' value='11to15' /> 11- 15 </label><br> " +
			" <label><input type='radio' name='how_many_windowns_and_doors' value='16to20' /> 16 – 20 </label><br> " +
			" <label><input type='radio' name='how_many_windowns_and_doors' value='21to25' /> 21 – 25 </label><br> " +
			" <label><input type='radio' name='how_many_windowns_and_doors' value='25to30' /> 25 - 30 </label><br> " +
			" <label><input type='radio' name='how_many_windowns_and_doors' value='over30' /> More than 30 – indicate amount in description box </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" What is the average size of your windows: " +
			" </legend> " +
			" <label><input type='radio' name='avg_size_of_windows' value='small' required /> Small (under 5 ft2) </label><br> " +
			" <label><input type='radio' name='avg_size_of_windows' value='medium' /> Medium (5 - 15 ft2) </label><br> " +
			" <label><input type='radio' name='avg_size_of_windows' value='large' /> Large (16 - 30 ft2) </label><br> " +
			" <label><input type='radio' name='avg_size_of_windows' value='very_large' /> Very Large (over 30 ft2) </label><br> " +
		" </fieldset><br> " +
		" </div> " );
	}else{
		$("div.deep_cleaning_package").remove();
	}
}

/********************************* Outdoor Seasonal Decorations function ***********************************************/
function outdoor_seasonal_decorations_cb_1_fn(){
	if( $("#install_decorations").is(":checked") ){
		$("#outdoor_seasonal_decorations_sub_services").append("" +
			" <div class='sub_section install_decorations'> " +
			" <fieldset> " +
				" <legend> " +
					" Describe the type and amount (length, number of items) of decorations and/or lights that need to be installed: " +
				" </legend> " +
				" <textarea name='type_and_amount_to_be_installed' id='' required></textarea> " +
			" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.install_decorations").remove();
	}
}

function outdoor_seasonal_decorations_cb_2_fn(){
	if( $("#take_down_decorations").is(":checked") ){
		$("#outdoor_seasonal_decorations_sub_services").append("" +
			" <div class='sub_section take_down_decorations'> " +
			" <fieldset> " +
				" <legend> " +
					" Describe the type and amount (length, number of items) of decorations and/or lights that need to be taken down: " +
				" </legend> " +
				" <textarea name='type_and_amount_to_be_taken_down' id='' required></textarea> " +
			" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.take_down_decorations").remove();
	}
}

/********************************* Painting Subservice function ***********************************************/
function load_painting_subservice_questionnaire(){

var val = $("#painting_sub_service").val();
if( val == "interior" ){

	$("div#painting_sub_services").html("");
	$("div#painting_sub_services").html(" " +
		" <fieldset> " +
			" <legend> " +
				" What spaces do you need painted: " +
			" </legend> " +
			" <label><input type='checkbox' name='spaces_to_paint[]' id='' value='bathrooms' /> Bathrooms </label><br> " +
			" <label><input type='checkbox' name='spaces_to_paint[]' id='' value='bedrooms' /> Bedrooms </label><br> " +
			" <label><input type='checkbox' name='spaces_to_paint[]' id='' value='kitchen' /> Kitchen </label><br> " +
			" <label><input type='checkbox' name='spaces_to_paint[]' id='' value='living_rooms' /> Living Rooms </label><br> " +
			" <label><input type='checkbox' name='spaces_to_paint[]' id='' value='hallways' /> Hallways </label><br> " +
			" <label><input type='checkbox' name='spaces_to_paint[]' id='' value='doorways' /> Doorways </label><br> " +
			" <label><input type='checkbox' name='spaces_to_paint[]' id='' value='closets' /> Closets </label><br> " +
			" <label><input type='checkbox' name='spaces_to_paint[]' id='' value='dining_room' /> Dining Room </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" What surfaces do you need painted: " +
			" </legend> " +
			" <label><input type='checkbox' name='surfaces_to_paint[]' id='' value='bathrooms' /> Bathrooms </label><br> " +
			" <label><input type='checkbox' name='surfaces_to_paint[]' id='' value='bedrooms' /> Bedrooms </label><br> " +
			" <label><input type='checkbox' name='surfaces_to_paint[]' id='' value='kitchen' /> Kitchen </label><br> " +
			" <label><input type='checkbox' name='surfaces_to_paint[]' id='' value='living_rooms' /> Living Rooms </label><br> " +
			" <label><input type='checkbox' name='surfaces_to_paint[]' id='' value='hallways' /> Hallways </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" What is the approx sq footage of the area to be painted: " +
			" </legend> " +
			" <input type='number' name='area_to_paint' required /> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" How high is your ceiling: " +
			" </legend> " +
			" <input type='number' name='height_of_ceiling' required /> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" How many coats of paint do you require: " +
			" </legend> " +
			" <input type='number' name='coats_of_paint' required /> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" What kind of painting do you want done: " +
			" </legend> " +
			" <label><input type='checkbox' name='kind_of_paint[]' id='' value='surface_hole_treatment' /> Surface Bump Removal/Scrape and Hole/Putty Fulling </label><br> " +
			" <label><input type='checkbox' name='kind_of_paint[]' id='' value='surface_wipe_treatment' /> Surface Wipe Down </label><br> " +
			" <label><input type='checkbox' name='kind_of_paint[]' id='' value='prime_and_paint' /> Prime and Paint </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Does the room need to be prepped for painting or will everything be in place: " +
			" </legend> " +
			" <label><input type='radio' name='does_room_need_prep' value='yes' required /> Yes </label><br> " +
			" <label><input type='radio' name='does_room_need_prep' value='no' /> No </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Estimate the number of hours that this service will take: " +
			" </legend> " +
			" <input type='number' name='number_of_hours' required /> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Additional comments and description for your appointment: " +
			" </legend> " +
			" <textarea name='comments_for_appointment_garbage_clean_up' id=''></textarea> " +
		" </fieldset><br> " );

}
else if( val == "exterior" ){

	$("div#painting_sub_services").html("");
	$("div#painting_sub_services").html(" " +
		" <fieldset> " +
			" <legend> " +
				" What type of residence are you in: " +
			" </legend> " +
			" <label><input type='radio' name='type_of_residence' value='cond_apartment' required /> Condo / Apartment </label><br> " +
			" <label><input type='radio' name='type_of_residence' value='duplex' /> Duplex, or Row-house </label><br> " +
			" <label><input type='radio' name='type_of_residence' value='detached_home' /> Detached home </label><br> " +
			" <label><input type='radio' name='type_of_residence' value='commercial_building' /> Commercial office or building </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" How many stories high (above-ground) is your structure: " +
			" </legend> " +
			" <label><input type='radio' name='how_many_stories' value='1' required /> 1 </label><br> " +
			" <label><input type='radio' name='how_many_stories' value='1.5' /> 1.5 </label><br> " +
			" <label><input type='radio' name='how_many_stories' value='2' /> 2 </label><br> " +
			" <label><input type='radio' name='how_many_stories' value='2.5' /> 2.5 </label><br> " +
			" <label><input type='radio' name='how_many_stories' value='3' /> 3 </label><br> " +
			" <label><input type='radio' name='how_many_stories' value='3.5' /> 3.5 </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" What is the approx square footage of the house: " +
			" </legend> " +
			" <input type='number' name='number_of_hours' required /> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" What percent (%) of the surface area will require to be painted: " +
			" </legend> " +
			" <label><input type='radio' name='how_many_stories' value='under10' required /> Touch ups (under 10%) </label><br> " +
			" <label><input type='radio' name='how_many_stories' value='11to33' /> Some of it (11% to 33%) </label><br> " +
			" <label><input type='radio' name='how_many_stories' value='33to66' /> Quite a bit (33% to 66%) </label><br> " +
			" <label><input type='radio' name='how_many_stories' value='67to100' /> Most of it (67 – 100%) </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" What would you like painted (All walls, shutters, trim, facias): " +
			" </legend> " +
			" <label><input type='checkbox' name='what_to_paint[]' id='' value='walls' /> Walls </label><br> " +
			" <label><input type='checkbox' name='what_to_paint[]' id='' value='shutters' /> Shutters </label><br> " +
			" <label><input type='checkbox' name='what_to_paint[]' id='' value='trim' /> Trim </label><br> " +
			" <label><input type='checkbox' name='what_to_paint[]' id='' value='facia' /> Facia </label><br> " +
			" <label><input type='checkbox' name='what_to_paint[]' id='' value='soffits' /> Soffits </label><br> " +
			" <label><input type='checkbox' name='what_to_paint[]' id='' value='other' /> Other (description box) </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" What kind of shape are the current walls in: " +
			" </legend> " +
			" <label><input type='radio' name='how_many_stories' value='great' required /> Great – no patch work or scraping </label><br> " +
			" <label><input type='radio' name='how_many_stories' value='mediocre' /> Mediocre – Minor patch work and scraping </label><br> " +
			" <label><input type='radio' name='how_many_stories' value='poor' /> Poor – Lots of patch work and scraping </label><br> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" What type of exterior do you have: " +
			" </legend> " +
			" <textarea name='type_of_exterior' id='' required></textarea> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Estimate the number of hours that this service will take: " +
			" </legend> " +
			" <input type='number' name='number_of_hours' step='0.5' placeholder='Hours (to the nearest 0.5 of an integer)' required/> " +
		" </fieldset><br> " +
		" <fieldset> " +
			" <legend> " +
				" Additional comments and description for your appointment: " +
			" </legend> " +
			" <textarea name='comments_for_appointment_painting' id=''></textarea> " +
		" </fieldset><br> " );

}
}


/********************************* Pressure Washing Subservice function ***********************************************/
function pressure_washing_cb_1_fn(){
	if( $("#patio_stone_and_walkways").is(":checked") ){
		$("#load_pressure_washing_subservice_questionnaire").append("" +
			" <div class='sub_section patio_stone_and_walkways'> " +
				" <h1> PATIO STONE AND WALKWAYS </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the area of the patio stones and/or walkways to be washed: " +
					" </legend> " +
					" <input type='number' placeholder='in square feet' name='area_to_be_washed' required /> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.patio_stone_and_walkways").remove();
	}
}

function pressure_washing_cb_2_fn(){
	if( $("#driveways").is(":checked") ){
		$("#load_pressure_washing_subservice_questionnaire").append("" +
			" <div class='sub_section driveways'> " +
				" <h1> DRIVEWAYS </h1> " +
					" <fieldset> " +
						" <legend> " +
							" Estimate the area of your driveway: " +
						" </legend> " +
						" <label><input type='radio' name='area_of_driveway' value='small' required /> Small (fits one car or less) </label><br> " +
						" <label><input type='radio' name='area_of_driveway' value='medium' /> Medium (fits 1-3 cars) </label><br> " +
						" <label><input type='radio' name='area_of_driveway' value='large' /> Large (fits 4-6 cars) </label><br> " +
						" <label><input type='radio' name='area_of_driveway' value='other' /> Other – estimate size in description box </label><br> " +
					" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.driveways").remove();
	}
}

function pressure_washing_cb_3_fn(){
	if( $("#exterior_walls").is(":checked") ){
		$("#load_pressure_washing_subservice_questionnaire").append("" +
			" <div class='sub_section exterior_walls'> " +
			" <h1> EXTERIOR WALLS </h1> " +
				" <fieldset> " +
					" <legend> " +
						" <h1> What type of structure/residence do you want washed: </h1> " +
					" </legend> " +
					" <select name='type_of_structure' class='' id=' ' required>" +
						" <option value=''> " + " SELECT ONE " + "</option>" +
						" <option value='apartment'> " + " Condo / Apartment " + "</option>" +
						" <option value='duplex'> " + " Duplex, or Row-house " + "</option>" +
						" <option value='detached_home'> " + " Detached home " + "</option>" +
						" <option value='commercial_building'> " + " Commercial office or building " + "</option>" +
						" <option value='shed_or_shop'> " + " Shed or shop " + "</option>" +
						" <option value='garage'> " + " Garage " + "</option>" +
						" <option value='reataining_wall'> " + " Retaining wall " + "</option>" +
						" <option value='other'> " + " Other - indicate type in description box " + "</option>" +
					" </select> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" What is the total length (all sides added together) of your structure/residence: " +
					" </legend> " +
					" <input type='number' name='length_of_structure' placeholder='in linear feet' name='' required /> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" How many stories high (above-ground) is your structure: " +
					" </legend> " +
					" <label><input type='radio' name='how_many_stories' value='1' required /> 1 </label><br> " +
					" <label><input type='radio' name='how_many_stories' value='1.5' /> 1.5 </label><br> " +
					" <label><input type='radio' name='how_many_stories' value='2' /> 2 </label><br> " +
					" <label><input type='radio' name='how_many_stories' value='2.5' /> 2.5 </label><br> " +
					" <label><input type='radio' name='how_many_stories' value='3' /> 3 </label><br> " +
					" <label><input type='radio' name='how_many_stories' value='3.5' /> 3.5 </label><br> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.exterior_walls").remove();
	}
}

function pressure_washing_cb_4_fn(){
	if( $("#deck_surfaces").is(":checked") ){
		$("#load_pressure_washing_subservice_questionnaire").append("" +
			" <div class='sub_section deck_surfaces'> " +
				" <h1> DECK SURFACES </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the total area(s) of your deck surfaces: " +
					" </legend> " +
					" <input type='number' name='area_of_deck' placeholder='in square feet' required /> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.deck_surfaces").remove();
	}
}

function pressure_washing_cb_5_fn(){
	if( $("#fences").is(":checked") ){
		$("#load_pressure_washing_subservice_questionnaire").append("" +
			" <div class='sub_section fences'> " +
				" <h1> FENCES </h1> " +
				" <fieldset> " +
					" <legend> " +
						" What is the total length (all sections added together) of your fence: " +
					" </legend> " +
					" <input type='number' placeholder='in linear feet' name='length_of_fence' required /> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" What is the average above-ground height of your fence: " +
					" </legend> " +
					" <input type='number' placeholder='in feet' name='height_of_fence' required /> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" Do you require one or both side of the fence to be washed: " +
					" </legend> " +
					" <label><input type='radio' name='sides_of_fence_to_wash' value='one_side' required /> Only one side </label><br> " +
					" <label><input type='radio' name='sides_of_fence_to_wash' value='both_sides' /> Both sides </label><br> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.fences").remove();
	}
}

function pressure_washing_cb_6_fn(){
	if( $("#other_pressure_washing").is(":checked") ){
		$("#load_pressure_washing_subservice_questionnaire").append("" +
			" <div class='sub_section other'> " +
				" <h1> OTHER </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Describe the surfaces or items that you would like washed: " +
					" </legend> " +
					" <textarea name='describe_surface_to_be_washed' id='' required></textarea> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the total area(s) of the surfaces to be washed: " +
					" </legend> " +
					" <input type='number' placeholder='in square feet' name='area_of_surface' required /> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the number of hours that this service will take: " +
					" </legend> " +
					" <input type='number' placeholder='hours - to the nearest 0.5 of an integer' name='how_many_hours' step='0.5' required /> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.other").remove();
	}
}
/********************************* RV and Boat Cleaning Subservice function ***********************************************/
function rv_boat_cleaning_cb_1_fn(){
	if( $("#interior_quick_cleanup_package").is(":checked") ){
		$("#load_rv_boat_cleaning_subservice_questionnaire").append("" +
			" <div class='sub_section interior_quick_cleanup_package'> " +
				" <h1> INTERIOR - QUICK CLEAN-UP PACKAGE </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Which of the following amenities does your vehicle/pleasure-craft have: " +
					" </legend> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_quick_cleanup_package[]' id='' value='sitting_area' /> Sitting area </label><br> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_quick_cleanup_package[]' id='' value='living_room' /> Living room </label><br> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_quick_cleanup_package[]' id='' value='bathroom_partial' /> Bathroom (partial) </label><br> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_quick_cleanup_package[]' id='' value='bathroom_full' /> Bathroom (full) </label><br> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_quick_cleanup_package[]' id='' value='bedroom' /> Bedroom </label><br> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_quick_cleanup_package[]' id='' value='kitchen_partial' /> Kitchen (partial) </label><br> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_quick_cleanup_package[]' id='' value='kitchen_full' /> Kitchen (full) </label><br> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" What percent of the floor area is carpet: " +
					" </legend> " +
					" <label><input type='radio' name='floor_carpet_area_interior_quick_cleanup_package' value='none' required /> No Carpet, no rugs </label><br> " +
					" <label><input type='radio' name='floor_carpet_area_interior_quick_cleanup_package' value='some' /> Some (under 25%) </label><br> " +
					" <label><input type='radio' name='floor_carpet_area_interior_quick_cleanup_package' value='quite_a_bit' /> Quite a bit (26% to 75%) </label><br> " +
					" <label><input type='radio' name='floor_carpet_area_interior_quick_cleanup_package' value='most' /> Most of it (76 – 100%) </label><br> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" What is the current state of the interior space: " +
					" </legend> " +
					" <label><input type='radio' name='current_state_of_space_interior_quick_cleanup_package' value='needs_touch_ups' required /> Pretty clean, just needs touch ups </label><br> " +
					" <label><input type='radio' name='current_state_of_space_interior_quick_cleanup_package' value='a_bit_messy' /> Clean but a bit dirty/messy </label><br> " +
					" <label><input type='radio' name='current_state_of_space_interior_quick_cleanup_package' value='quite_messy' /> Quite messy/dirty </label><br> " +
					" <label><input type='radio' name='current_state_of_space_interior_quick_cleanup_package' value='very_messy' /> Very messy/dirty </label><br> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.interior_quick_cleanup_package").remove();
	}
}
function rv_boat_cleaning_cb_2_fn(){
	if( $("#interior_full_cleaning_package").is(":checked") ){
		$("#load_rv_boat_cleaning_subservice_questionnaire").append("" +
			" <div class='sub_section interior_full_cleaning_package'> " +
				" <h1> INTERIOR - FULL LIVING/SITTING AREA CLEANING PACKAGE </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Which of the following amenities does your vehicle/pleasure-craft have: " +
					" </legend> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_full_cleaning_package[]' id='' value='sitting_area' /> Sitting area </label><br> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_full_cleaning_package[]' id='' value='living_room' /> Living room </label><br> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_full_cleaning_package[]' id='' value='bathroom_partial' /> Bathroom (partial) </label><br> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_full_cleaning_package[]' id='' value='bathroom_full' /> Bathroom (full) </label><br> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_full_cleaning_package[]' id='' value='bedroom' /> Bedroom </label><br> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_full_cleaning_package[]' id='' value='kitchen_partial' /> Kitchen (partial) </label><br> " +
					" <label><input type='checkbox' name='vehicle_amenities_interior_full_cleaning_package[]' id='' value='kitchen_full' /> Kitchen (full) </label><br> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" What percent of the floor area is carpet: " +
					" </legend> " +
					" <label><input type='radio' name='floor_carpet_area_interior_full_cleaning_package' value='none' required /> No Carpet, no rugs </label><br> " +
					" <label><input type='radio' name='floor_carpet_area_interior_full_cleaning_package' value='some' /> Some (under 25%) </label><br> " +
					" <label><input type='radio' name='floor_carpet_area_interior_full_cleaning_package' value='quite_a_bit' /> Quite a bit (26% to 75%) </label><br> " +
					" <label><input type='radio' name='floor_carpet_area_interior_full_cleaning_package' value='most' /> Most of it (76 – 100%) </label><br> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" What is the current state of the interior space: " +
					" </legend> " +
					" <label><input type='radio' name='current_state_of_space_interior_full_cleaning_package' value='needs_touch_ups' required /> Pretty clean, just needs touch ups </label><br> " +
					" <label><input type='radio' name='current_state_of_space_interior_full_cleaning_package' value='a_bit_messy' /> Clean but a bit dirty/messy </label><br> " +
					" <label><input type='radio' name='current_state_of_space_interior_full_cleaning_package' value='quite_messy' /> Quite messy/dirty </label><br> " +
					" <label><input type='radio' name='current_state_of_space_interior_full_cleaning_package' value='very_messy' /> Very messy/dirty </label><br> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.interior_full_cleaning_package").remove();
	}
}
function rv_boat_cleaning_cb_3_fn(){
	if( $("#othe_rv_boat_cleaning").is(":checked") ){
		$("#load_rv_boat_cleaning_subservice_questionnaire").append("" +
			" <div class='sub_section othe_rv_boat_cleaning'> " +
				" <h1> OTHER </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Describe what you would like cleaned and/or washed: " +
					" </legend> " +
					" <textarea name='what_to_clear_othe_rv_boat_cleaning' id='' required></textarea> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the number of hours that this service will take: " +
					" </legend> " +
					" <input type='number' placeholder='hours - to the nearest 0.5 of an integer' name='how_many_hours_othe_rv_boat_cleaning' step='0.5' required /> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.othe_rv_boat_cleaning").remove();
	}
}

/********************************* Snow Removal Subservice function ***********************************************/
function snow_removal_cb_1_fn(){
	if( $("#shovel_driveway").is(":checked") ){
		$("#load_snow_removal_subservice_questionnaire").append("" +
			" <div class='sub_section shovel_driveway'> " +
				" <h1> SHOVEL DRIVEWAY </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the area of your driveway: " +
					" </legend> " +
					" <label><input type='radio' name='area_of_driveway_shovel_driveway' value='small' required /> Small (fits one car or less) </label><br> " +
					" <label><input type='radio' name='area_of_driveway_shovel_driveway' value='medium' /> Medium (fits 1-3 cars) </label><br> " +
					" <label><input type='radio' name='area_of_driveway_shovel_driveway' value='large' /> Large (fits 4-6 cars) </label><br> " +
					" <label><input type='radio' name='area_of_driveway_shovel_driveway' value='other_snow_removal_driveway_area' /> Other – estimate size in description box </label><br> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the average depth of snow: " +
					" </legend> " +
					" <label><input type='radio' name='depth_of_snow_shovel_driveway' value='under4' required /> Shallow (under 4”) </label><br> " +
					" <label><input type='radio' name='depth_of_snow_shovel_driveway' value='4to8' /> Medium (4” – 8”) </label><br> " +
					" <label><input type='radio' name='depth_of_snow_shovel_driveway' value='8to16' /> Deep (8” – 16”) </label><br> " +
					" <label><input type='radio' name='depth_of_snow_shovel_driveway' value='over16' /> Very Deep (over 16”) </label><br> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" How steep is the surface you need plowed: " +
					" </legend> " +
					" <label><input type='radio' name='steepness_of_surface_shovel_driveway' value='flat' required /> Flat </label><br> " +
					" <label><input type='radio' name='steepness_of_surface_shovel_driveway' value='moderate' /> Moderate </label><br> " +
					" <label><input type='radio' name='steepness_of_surface_shovel_driveway' value='steep' /> Steep </label><br> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.shovel_driveway").remove();
	}
}
function snow_removal_cb_2_fn(){
	if( $("#gravel_salt_driveway").is(":checked") ){
		$("#load_snow_removal_subservice_questionnaire").append("" +
			" <div class='sub_section gravel_salt_driveway'> " +
				" <h1> SHOVEL DRIVEWAY </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the area of your driveway: " +
					" </legend> " +
					" <label><input type='radio' name='area_of_driveway_gravel_salt_driveway' value='small' required /> Small (fits one car or less) </label><br> " +
					" <label><input type='radio' name='area_of_driveway_gravel_salt_driveway' value='medium' /> Medium (fits 1-3 cars) </label><br> " +
					" <label><input type='radio' name='area_of_driveway_gravel_salt_driveway' value='large' /> Large (fits 4-6 cars) </label><br> " +
					" <label><input type='radio' name='area_of_driveway_gravel_salt_driveway' value='other_snow_removal_driveway_area' /> Other – estimate size in description box </label><br> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.gravel_salt_driveway").remove();
	}
}
function snow_removal_cb_3_fn(){
	if( $("#shovel_walkways").is(":checked") ){
		$("#load_snow_removal_subservice_questionnaire").append("" +
			" <div class='sub_section shovel_walkways'> " +
				" <h1> SHOVEL WALKWAYS </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the area of your walkways: " +
					" </legend> " +
					" <input type='number' placeholder='in square feet' name='area_of_walkways_shovel_walkways' required /> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the average depth of snow: " +
					" </legend> " +
					" <label><input type='radio' name='depth_of_snow_shovel_walkways' value='under4' required /> Shallow (under 4”) </label><br> " +
					" <label><input type='radio' name='depth_of_snow_shovel_walkways' value='4to8' /> Medium (4” – 8”) </label><br> " +
					" <label><input type='radio' name='depth_of_snow_shovel_walkways' value='8to16' /> Deep (8” – 16”) </label><br> " +
					" <label><input type='radio' name='depth_of_snow_shovel_walkways' value='over16' /> Very Deep (over 16”) </label><br> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.shovel_walkways").remove();
	}
}
function snow_removal_cb_4_fn(){
	if( $("#gravel_salt_walkways").is(":checked") ){
		$("#load_snow_removal_subservice_questionnaire").append("" +
			" <div class='sub_section gravel_salt_walkways'> " +
				" <h1> GRAVEL/SALT WALKWAYS </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the area of your walkways: " +
					" </legend> " +
					" <input type='number' placeholder='in square feet' name='area_of_walkways_gravel_salt_walkways' required /> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.gravel_salt_walkways").remove();
	}
}
function snow_removal_cb_5_fn(){
	if( $("#shovel_sidewalk").is(":checked") ){
		$("#load_snow_removal_subservice_questionnaire").append("" +
			" <div class='sub_section shovel_sidewalk'> " +
				" <h1> SHOVEL SIDEWALK </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the area of your walkways: " +
					" </legend> " +
					" <input type='number' placeholder='in square feet' name='area_of_walkways_shovel_sidewalk' required /> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the average depth of snow: " +
					" </legend> " +
					" <label><input type='radio' name='depth_of_snow_shovel_sidewalk' value='under4' required /> Shallow (under 4”) </label><br> " +
					" <label><input type='radio' name='depth_of_snow_shovel_sidewalk' value='4to8' /> Medium (4” – 8”) </label><br> " +
					" <label><input type='radio' name='depth_of_snow_shovel_sidewalk' value='8to16' /> Deep (8” – 16”) </label><br> " +
					" <label><input type='radio' name='depth_of_snow_shovel_sidewalk' value='over16' /> Very Deep (over 16”) </label><br> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.shovel_sidewalk").remove();
	}
}
function snow_removal_cb_6_fn(){
	if( $("#gravel_salt_sidewalk").is(":checked") ){
		$("#load_snow_removal_subservice_questionnaire").append("" +
			" <div class='sub_section gravel_salt_sidewalk'> " +
				" <h1> SHOVEL SIDEWALK </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the area of your walkways: " +
					" </legend> " +
					" <input type='number' placeholder='in square feet' name='area_of_walkways_gravel_salt_sidewalk' required /> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.gravel_salt_sidewalk").remove();
	}
}
function snow_removal_cb_7_fn(){
	if( $("#shovel_patios_and_decks").is(":checked") ){
		$("#load_snow_removal_subservice_questionnaire").append("" +
			" <div class='sub_section shovel_patios_and_decks'> " +
				" <h1> SHOVEL PATIOS AND DECKS </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the area of your walkways: " +
					" </legend> " +
					" <input type='number' placeholder='in square feet' name='area_of_walkways_shovel_patios_and_decks' required /> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the average depth of snow: " +
					" </legend> " +
					" <label><input type='radio' name=' depth_of_snow_shovel_patios_and_decks' value='under4' required /> Shallow (under 4”) </label><br> " +
					" <label><input type='radio' name=' depth_of_snow_shovel_patios_and_decks' value='4to8' /> Medium (4” – 8”) </label><br> " +
					" <label><input type='radio' name=' depth_of_snow_shovel_patios_and_decks' value='8to16' /> Deep (8” – 16”) </label><br> " +
					" <label><input type='radio' name=' depth_of_snow_shovel_patios_and_decks' value='over16' /> Very Deep (over 16”) </label><br> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.shovel_patios_and_decks").remove();
	}
}
function snow_removal_cb_8_fn(){
	if( $("#gravel_salt_patios_and_decks").is(":checked") ){
		$("#load_snow_removal_subservice_questionnaire").append("" +
			" <div class='sub_section gravel_salt_patios_and_decks'> " +
				" <h1> GRAVEL/SALT PATIOS AND DECKS </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the area of your walkways: " +
					" </legend> " +
					" <input type='number' placeholder='in square feet' name='area_of_walkways_gravel_salt_patios_and_decks' required /> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.gravel_salt_patios_and_decks").remove();
	}
}
function snow_removal_cb_9_fn(){
	if( $("#break_and_remove_surface_ice_build_up").is(":checked") ){
		$("#load_snow_removal_subservice_questionnaire").append("" +
			" <div class='sub_section break_and_remove_surface_ice_build_up'> " +
				" <h1> BREAK AND REMOVE SURFACE ICE BUILD-UP </h1> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the area of your walkways: " +
					" </legend> " +
					" <input type='number' placeholder='in square feet' name='area_of_walkways_break_and_remove_surface_ice_build_up' required /> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" Estimate the average depth of snow: " +
					" </legend> " +
					" <label><input type='radio' name='depth_of_snow_break_and_remove_surface_ice_build_up' value='under4' required /> Shallow (under 4”) </label><br> " +
					" <label><input type='radio' name='depth_of_snow_break_and_remove_surface_ice_build_up' value='4to8' /> Medium (4” – 8”) </label><br> " +
					" <label><input type='radio' name='depth_of_snow_break_and_remove_surface_ice_build_up' value='8to16' /> Deep (8” – 16”) </label><br> " +
					" <label><input type='radio' name='depth_of_snow_break_and_remove_surface_ice_build_up' value='over16' /> Very Deep (over 16”) </label><br> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.break_and_remove_surface_ice_build_up").remove();
	}
}

/********************************* Vehicle Care Subservice function ***********************************************/
function vehicle_care_cb_1_fn(){
	if( $("#wash").is(":checked") || $("#was_and_polish").is(":checked") || $("#vacuum_and_clean").is(":checked") ){
		$("#load_vehicle_care_subservice_questionnaire").html("" +
			" <div class='sub_section vehicle_care'> " +
				" <h1> WASH VEHICLE (spray, soap, and rinse exterior) </h1> " +
				" <fieldset> " +
					" <legend> " +
						" What type of vehicle do you own: " +
					" </legend> " +
					" <select name='type_of_vehicle' class='' id='' required>" +
						" <option value=''> " + " SELECT ONE " + "</option>" +
						" <option value='car_small'> " + " Car (Small or Compact) " + "</option>" +
						" <option value='car_mid_or_full'> " + " Car (Mid or Full Sized) " + "</option>" +
						" <option value='suv_or_crossover'> " + " SUV or Crossover (Mid Size or Compact) " + "</option>" +
						" <option value='suburban_or_large_suv'> " + " Suburban or Large SUV " + "</option>" +
						" <option value='pickup_truck_small'> " + " Pickup Truck (Small: 1/4 ton or 2-door 1/2 ton) " + "</option>" +
						" <option value='pickup_truck_mid_or_large'> " + " Pickup Truck (Mid or Full Sized) " + "</option>" +
						" <option value='cargo_van'> " + " Cargo Van " + "</option>" +
						" <option value='scooter'> " + " Scooter " + "</option>" +
						" <option value='motorcycle'> " + " Motorcycle " + "</option>" +
						" <option value='larger_commercial_trucks'> " + " Larger commercial trucks and movers (describe size below) " + "</option>" +
						" <option value='other'> " + " Other (describe type and size below) " + "</option>" +
					" </select> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" Where will your vehicle be located: " +
					" </legend> " +
					" <label><input type='radio' name='location_of_vehicle' value='indoor_private_garage' required /> Indoor Private (Heated) Garage </label><br> " +
					" <label><input type='radio' name='location_of_vehicle' value='outdoor_private_garage' /> Outdoor Private Covered (Unheated) Garage </label><br> " +
					" <label><input type='radio' name='location_of_vehicle' value='private_driveway' /> Private Driveway </label><br> " +
					" <label><input type='radio' name='location_of_vehicle' value='street_parking' /> Street Parking </label><br> " +
					" <label><input type='radio' name='location_of_vehicle' value='indoor_public_garage' /> Indoor Public (Heated) Garage </label><br> " +
					" <label><input type='radio' name='location_of_vehicle' value='outdoor_public_garage' /> Outdoor Public Covered (Unheated) Garage </label><br> " +
					" <label><input type='radio' name='location_of_vehicle' value='public_outdoor_parking_lot' /> Public Outdoor Parking Lot </label><br> " +
				" </fieldset><br> " +
				" <fieldset> " +
					" <legend> " +
						" Select the Services you would like competed on this Vehicle: " +
					" </legend> " +
					" <label><input type='checkbox' name='services_to_do_on_vehicle[]' id='' value='wash' /> Wash (spray, scrub, rinse, dry) Exterior </label><br> " +
					" <label><input type='checkbox' name='services_to_do_on_vehicle[]' id='' value='wash_and_polish' /> Wash and Polish Exterior </label><br> " +
					" <label><input type='checkbox' name='services_to_do_on_vehicle[]' id='' value='interior_cleaning' /> Interior Cleaning (vacuum and surface clean) </label><br> " +
				" </fieldset><br> " +
			" </div> " );
	}else{
		$("div.vehicle_care").remove();
	}
}

/********************************* Yard Care Subservice function ***********************************************/
function show_entry_dates(){

/************ Recurring entry dates function ************/
var val = $("#yard_care_subservices").val();
if( val == "lawn_mowing" || val == "whipper_snip_grass_edge_trimming" || val == "rake_collections_of_grass_after_mowing" || val == "hedge_and_shrub_trimming" || val == "garden_deweeding" ){
	$("div#change_based_on_recurring_condition").html("" +
			"<fieldset> " +
				" <legend> " +
					" Is this a RECURRING service? " +
				" </legend> " +
				" <input type='radio' name='A1' value='Yes' required/><label for='A1'>Yes</label><br> " +
				" <input type='radio' name='A1' value='No'/><label for='A1'>No</label> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Select Date of Venue " +
				" </legend> " +
				" <input type='date' name='date_of_venue[]' required /> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Enter Title: " +
				" </legend> " +
				" <input type='text' name='job_title' required/><br> " +
			" </fieldset><br> " );
}else if( val == "" ){
	$("div#change_based_on_recurring_condition").html("");
}else{
	$("div#change_based_on_recurring_condition").html("" +
			" <fieldset> " +
				" <legend> " +
					" Select Date of Venue " +
				" </legend> " +
				" <input type='date' name='date_of_venue' required /> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Enter Title: " +
				" </legend> " +
				" <input type='text' name='job_title' required/><br> " +
			" </fieldset><br> " );
}
}
/************ Recurring entry dates function ************/



/************ Sub-services function ************/
if( val == "lawn_mowing" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section lawn_mowing'> " +
			" <h1> LAWN MOWING </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How many obstructions do you have in your yard: " +
				" </legend> " +
				" <label><input type='radio' name='obstructions_in_yard' value='few' /> Few </label><br> " +
				" <label><input type='radio' name='obstructions_in_yard' value='moderate' /> Moderate </label><br> " +
				" <label><input type='radio' name='obstructions_in_yard' value='plentiful' /> Plentiful </label><br> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Estimate the current length of your grass: " +
				" </legend> " +
				" <label><input type='radio' name='length_of_grass' value='under3' /> Short (under 3”) </label><br> " +
				" <label><input type='radio' name='length_of_grass' value='3to6' /> Medium (3” – 6”) </label><br> " +
				" <label><input type='radio' name='length_of_grass' value='6to9' /> Long (6” – 9”) </label><br> " +
				" <label><input type='radio' name='length_of_grass' value='over9' /> Very Long (over 9”) </label><br> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.lawn_mowing").remove();
}

if( val == "whipper_snip_grass_edge_trimming" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section whipper_snip_grass_edge_trimming'> " +
			" <h1> WHIPPER SNIPPER / EDGE TRIMMING </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How many obstructions do you have in your yard: " +
				" </legend> " +
				" <label><input type='radio' name='obstructions_in_yard' value='few' /> Few </label><br> " +
				" <label><input type='radio' name='obstructions_in_yard' value='moderate' /> Moderate </label><br> " +
				" <label><input type='radio' name='obstructions_in_yard' value='plentiful' /> Plentiful </label><br> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Estimate the current length of your grass: " +
				" </legend> " +
				" <label><input type='radio' name='length_of_grass' value='under3' /> Short (under 3”) </label><br> " +
				" <label><input type='radio' name='length_of_grass' value='3to6' /> Medium (3” – 6”) </label><br> " +
				" <label><input type='radio' name='length_of_grass' value='6to9' /> Long (6” – 9”) </label><br> " +
				" <label><input type='radio' name='length_of_grass' value='over9' /> Very Long (over 9”) </label><br> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.whipper_snip_grass_edge_trimming").remove();
}

if( val == "lawn_weed_removal" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section lawn_weed_removal'> " +
			" <h1> LAWN WEED REMOVAL </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How much of your yard needs to be de-weeded: " +
				" </legend> " +
				" <label><input type='radio' name='how_much_of_yard' value='all' /> All (100%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard' value='most' /> Most of it (75% to 99%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard' value='some' /> Some of it (25% to 74%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard' value='little' /> Very little (1 – 24%) </label><br> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" What is the density/amount of weeds in your yard: " +
				" </legend> " +
				" <label><input type='radio' name='density_of_weeds' value='few' /> Few </label><br> " +
				" <label><input type='radio' name='density_of_weeds' value='moderate' /> Moderate </label><br> " +
				" <label><input type='radio' name='density_of_weeds' value='plentiful' /> Plentiful </label><br> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.lawn_weed_removal").remove();
}

if( val == "lawn_deweeding_spray" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section lawn_deweeding_spray'> " +
			" <h1> LAWN DWEEDING SPRAY </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How much of your yard needs to be de-weeded: " +
				" </legend> " +
				" <label><input type='radio' name='how_much_of_yard' value='all' /> All (100%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard' value='most' /> Most of it (75% to 99%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard' value='some' /> Some of it (25% to 74%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard' value='little' /> Very little (1 – 24%) </label><br> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" What is the density/amount of weeds in your yard: " +
				" </legend> " +
				" <label><input type='radio' name='density_of_weeds' value='few' /> Few </label><br> " +
				" <label><input type='radio' name='density_of_weeds' value='moderate' /> Moderate </label><br> " +
				" <label><input type='radio' name='density_of_weeds' value='plentiful' /> Plentiful </label><br> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.lawn_deweeding_spray").remove();
}

if( val == "rake_leaves" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section rake_leaves'> " +
			" <h1> RAKE LEAVES </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How much of your yard needs to be raked: " +
				" </legend> " +
				" <label><input type='radio' name='how_much_of_yard' value='all' /> All (100%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard' value='most' /> Most of it (75% to 99%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard' value='some' /> Some of it (25% to 74%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard' value='little' /> Very little (1 – 24%) </label><br> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" What is the density/amount of weeds in your yard: " +
				" </legend> " +
				" <label><input type='radio' name='density_of_weeds' value='few' /> Few </label><br> " +
				" <label><input type='radio' name='density_of_weeds' value='moderate' /> Moderate </label><br> " +
				" <label><input type='radio' name='density_of_weeds' value='plentiful' /> Plentiful </label><br> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Estimate the current length of your grass: " +
				" </legend> " +
				" <label><input type='radio' name='length_of_grass' value='under3' /> Short (under 3”) </label><br> " +
				" <label><input type='radio' name='length_of_grass' value='3to6' /> Medium (3” – 6”) </label><br> " +
				" <label><input type='radio' name='length_of_grass' value='6to9' /> Long (6” – 9”) </label><br> " +
				" <label><input type='radio' name='length_of_grass' value='over9' /> Very Long (over 9”) </label><br> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.rake_leaves").remove();
}

if( val == "hedge_and_shrub_trimming" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section hedge_and_shrub_trimming'> " +
			" <h1> HEDGE AND SHRUB TRIMMING </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How many groups of hedges/shrubs (close/connected plants) do you have to trim: " +
				" </legend> " +
				" <input type='number' name='' placeholder='total number' /> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Estimate the total length of all the hedge/shrub groups: " +
				" </legend> " +
				" <input type='number' name='' placeholder='linear feet' /> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Estimate the current height of the highest hedge: " +
				" </legend> " +
				" <input type='number' name='' placeholder='feet' /> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" What is the average height/length you would like to trim off the hedges: " +
				" </legend> " +
				" <label><input type='radio' name='length_to_trim_hedges' value='under3' /> Short Trim (under 6”) </label><br> " +
				" <label><input type='radio' name='length_to_trim_hedges' value='3to6' /> Medium Trim (6” – 12”) </label><br> " +
				" <label><input type='radio' name='length_to_trim_hedges' value='6to9' /> Long Trim (12” – 24”) </label><br> " +
				" <label><input type='radio' name='length_to_trim_hedges' value='over9' /> Very Long Trim (over 24”) </label><br> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.hedge_and_shrub_trimming").remove();
}

if( val == "tree_pruning" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section tree_pruning'> " +
			" <h1> TREE PRUNING </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How many trees do you have to prune: " +
				" </legend> " +
				" <input type='number' name='how_many_trees_to_prune' placeholder='total number' /> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Estimate the current height of the highest tree: " +
				" </legend> " +
				" <input type='number' name='height_of_highest_tree' placeholder='feet' /> " +
			" <fieldset> " +
				" <legend> " +
					" What is the average height/length you would like to trim off the trees: " +
				" </legend> " +
				" <label><input type='radio' name='length_to_trim_trees' value='under1ft' /> Small Trim (under 1 ft.) </label><br> " +
				" <label><input type='radio' name='length_to_trim_trees' value='1to3ft' /> Medium Trim (1 ft. – 3 ft.) </label><br> " +
				" <label><input type='radio' name='length_to_trim_trees' value='3to6ft' /> Large Trim (3 ft. – 6 ft.) </label><br> " +
				" <label><input type='radio' name='length_to_trim_trees' value='over6ft' /> Very Large Trim (over 6 ft.) </label><br> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.tree_pruning").remove();
}

if( val == "lawn_aeration" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section lawn_aeration'> " +
			" <h1> LAWN AERATION </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How much of your yard needs to be aerated: " +
				" </legend> " +
				" <label><input type='radio' name='how_much_of_yard_to_aerate' value='all' /> All (100%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard_to_aerate' value='most' /> Most of it (75% to 99%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard_to_aerate' value='some' /> Some of it (25% to 74%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard_to_aerate' value='little' /> Very little (1 – 24%) </label><br> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" How many obstructions do you have in your yard: " +
				" </legend> " +
				" <label><input type='radio' name='how_many_obstructions_in_yard' value='few' /> Few </label><br> " +
				" <label><input type='radio' name='how_many_obstructions_in_yard' value='moderate' /> Moderate </label><br> " +
				" <label><input type='radio' name='how_many_obstructions_in_yard' value='plentiful' /> Plentiful </label><br> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.lawn_aeration").remove();
}

if( val == "fertilizing" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section fertilizing'> " +
			" <h1> FERTILIZING </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How much of your yard needs to be fertilized: " +
				" </legend> " +
				" <label><input type='radio' name='how_much_of_yard_to_fertilize' value='all' /> All (100%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard_to_fertilize' value='most' /> Most of it (75% to 99%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard_to_fertilize' value='some' /> Some of it (25% to 74%) </label><br> " +
				" <label><input type='radio' name='how_much_of_yard_to_fertilize' value='little' /> Very little (1 – 24%) </label><br> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" How many obstructions do you have in your yard: " +
				" </legend> " +
				" <label><input type='radio' name='obstructions_in_yard' value='few' /> Few </label><br> " +
				" <label><input type='radio' name='obstructions_in_yard' value='moderate' /> Moderate </label><br> " +
				" <label><input type='radio' name='obstructions_in_yard' value='plentiful' /> Plentiful </label><br> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.fertilizing").remove();
}

if( val == "winterize_hedges_shrubs_and_small_trees" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section winterize_hedges_shrubs_and_small_trees'> " +
			" <h1> WINTERIZR (cover) HEDGES, SHRUBS, AND SMALL TREES </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How many groups of hedges (close/connected plants) do you have to cover: " +
				" </legend> " +
				" <input type='number' name='how_many_groups_of_hedges' placeholder='total number' /> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Estimate the total length of all the hedge/shrub groups: " +
				" </legend> " +
				" <input type='number' name='length_of_all_groups' placeholder='linear feet' /> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" How many stand-alone shrubs and/or trees do you have to cover: " +
				" </legend> " +
				" <input type='number' name='how_many_shrubs_trees' placeholder='total number' /> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Estimate the current height of the highest hedge/shrub/small tree: " +
				" </legend> " +
				" <input type='number' name='height_of_heighest_tree' placeholder='feet' /> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.winterize_hedges_shrubs_and_small_trees").remove();
}

if( val == "garden_deweeding" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section garden_deweeding'> " +
			" <h1> GARDEN WEED REMOVAL </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How many garden beds do you need de-weeded: " +
				" </legend> " +
				" <input type='number' name='how_many_garden_beds' placeholder='total number' /> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Estimate the total area of all of your gardens (combined) that need to be de-weeded: " +
				" </legend> " +
				" <label><input type='radio' name='total_area_of_gardens' value='small' /> Small (less than 100 sq ft) </label><br> " +
				" <label><input type='radio' name='total_area_of_gardens' value='medium' /> Medium (100 - 500 sq ft) </label><br> " +
				" <label><input type='radio' name='total_area_of_gardens' value='large' /> Large (500 - 1,000 sq ft) </label><br> " +
				" <label><input type='radio' name='total_area_of_gardens' value='very_large' /> Very large (1,000 + sq ft) – indicate size in description box </label><br> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" What is the density/amount of weeds in your gardens: " +
				" </legend> " +
				" <label><input type='radio' name='density_of_weeds' value='few' /> Few </label><br> " +
				" <label><input type='radio' name='density_of_weeds' value='moderate' /> Moderate </label><br> " +
				" <label><input type='radio' name='density_of_weeds' value='plentiful' /> Plentiful </label><br> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.garden_deweeding").remove();
}

if( val == "garden_place_mulch_topsoil" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section garden_place_mulch_topsoil'> " +
			" <h1> GARDEN – PLACE MULCH OR TOPSOIL </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How many garden beds do you have that need mulch/topsoil placement: " +
				" </legend> " +
				" <input type='number' name='how_many_garden_beds' placeholder='total number' /> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Estimate the total area of all of your gardens (combined) that need to be de-weeded: " +
				" </legend> " +
				" <label><input type='radio' name='total_area_of_gardens' value='small' /> Small (less than 100 sq ft) </label><br> " +
				" <label><input type='radio' name='total_area_of_gardens' value='medium' /> Medium (100 - 500 sq ft) </label><br> " +
				" <label><input type='radio' name='total_area_of_gardens' value='large' /> Large (500 - 1,000 sq ft) </label><br> " +
				" <label><input type='radio' name='total_area_of_gardens' value='very_large' /> Very large (1,000 + sq ft) – indicate size in description box </label><br> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					"What is the density/amount of objects in your gardens (plants, flowers, trees, other large items): " +
				" </legend> " +
				" <label><input type='radio' name='density_of_objects_in_gardens' value='few' /> Few </label><br> " +
				" <label><input type='radio' name='density_of_objects_in_gardens' value='moderate' /> Moderate </label><br> " +
				" <label><input type='radio' name='density_of_objects_in_gardens' value='plentiful' /> Plentiful </label><br> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.garden_place_mulch_topsoil").remove();
}

if( val == "plant_garden_flowers_and_small_garden_plants" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section plant_garden_flowers_and_small_garden_plants'> " +
			" <h1> PLANT GARDEN FLOWERS AND SMALL GARDEN PLANTS </h1> " +
			" <fieldset> " +
				" <legend> " +
					" How many single flowers or small plants would you like to plant in your gardens: " +
				" </legend> " +
				" <label><input type='radio' name='how_many_to_plant' value='under10' /> Under 10 </label><br> " +
				" <label><input type='radio' name='how_many_to_plant' value='11to20' /> 11 - 20 </label><br> " +
				" <label><input type='radio' name='how_many_to_plant' value='21to30' /> 21 – 30 </label><br> " +
				" <label><input type='radio' name='how_many_to_plant' value='31to40' /> 31 – 40 </label><br> " +
				" <label><input type='radio' name='how_many_to_plant' value='40to50' /> 40 – 50 </label><br> " +
				" <label><input type='radio' name='how_many_to_plant' value='over50' /> Over 50 – indicate number in description box </label><br> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" What type of flowers or plants do you wish to have planted: " +
				" </legend> " +
				" <textarea name='type_to_plant' id=''></textarea> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.plant_garden_flowers_and_small_garden_plants").remove();
}

if( val == "other_yard_care_subservice" ){
	$("#load_yard_care_subservice_questionnare").append("" +
		" <div class='sub_section other_yard_care_subservice'> " +
			" <h1> OTHER </h1> " +
			" <fieldset> " +
				" <legend> " +
					" Describe the scope, details, and size/quantity of the service you would like: " +
				" </legend> " +
				" <textarea name='scope_of_work' id=''></textarea> " +
			" </fieldset><br> " +
			" <fieldset> " +
				" <legend> " +
					" Estimate the number of hours that this service will take: " +
				" </legend> " +
				" <input type='number' name='how_many_hours' step='0.5' placeholder='hours (to the nearest 0.5 of an integer)' /> " +
			" </fieldset><br> " +
		" </div> " );
}else{
	$("div.other_yard_care_subservice").remove();
}



/*********************************  Subservice function ***********************************************/
