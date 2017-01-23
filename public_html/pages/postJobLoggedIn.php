
<!-- <h1 class="pageTitle"> Post New Job </h1> -->
<p>&nbsp</p>
<hr><h1>Please fill up all necessary fields</h1><hr>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<div class="content">
<div class="content-postJob">

<form id="post_job_form" onsubmit="return validate_post_job_form();" action="scripts/postJobProcess.php" method="post">

<div class="col-lg-12 col-md-12 col-xs-12">
	<div class="step_numbers"></div>
</div>

<select name="job_category" class="job_category" id="job_category">
	<option id="title" value="" disabled selected value>* SELECT JOB CATEGORY</option>
	<option id="dog_walking" value="dog_walking">Dog Walking</option>
	<!-- <option id="exterior_window_washing" value="exterior_window_washing">Exterior Window Washing</option> -->
	<option id="delivery" value="delivery">Delivery</option>
	<option id="garage_shop_shed_cleaning" value="garage_shop_shed_cleaning">Garage shop, Shed, and Cleaning</option>
	<!-- <option id="gutter_cleaning" value="gutter_cleaning">Gutter Cleaning</option> -->
	<option id="house_cleaning" value="house_cleaning">House Cleaning</option>
	<option id="international_languages" value="international_languages">International Languages</option>
	<option id="landscaping" value="landscaping">Landscaping</option>
	<option id="moving" value="moving">Moving</option>
	<option id="music_lessons" value="music_lessons">Music Lessons</option>
	<option id="outdoor_seasonal_decorations" value="outdoor_seasonal_decorations">Outdoor Seasonal Decoration</option>
	<option id="painting" value="painting">Painting</option>
	<option id="pressure_washing" value="pressure_washing">Pressure Washing</option>
	<option id="private_event_assistance" value="private_event_assistance">Private Event Assistance</option>
	<option id="rv_boat_cleaning" value="rv_boat_cleaning">RV and Boat Cleaning</option>
	<option id="snow_removal" value="snow_removal">Snow Removal</option>
	<option id="tutoring" value="tutoring">Tutoring</option>
	<option id="vehicle_care" value="vehicle_care">Vehicle Care</option>
	<!-- <option id="yard_care" value="yard_care">Yard Care</option> -->
	<option id="other" value="other">Other</option>
</select>


<div class="col-lg-12 col-md-12 col-xs-12">
<!-- <div class="step_numbers"></div> -->
<div class="populate_job_category">
		<h2>Waiting for Category Selection . . . .</h2>
</div>
</div>

</form>

</div>
</div>

</div>
</div>
