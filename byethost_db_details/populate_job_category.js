$(document).ready(function(){

$("input#date_of_venue").datepicker();


$("div.populate_job_category").css("height", "600px");
var id = "other";

$("div.step_1_icon").removeClass("primary").addClass("secondary");
$("div.step_2_icon").removeClass("secondary").addClass("primary");
$("div.step_3_icon").removeClass("secondary").addClass("primary");
$("div.step_4_icon").removeClass("secondary").addClass("primary");


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


/*********************************  Subservice function ***********************************************/
