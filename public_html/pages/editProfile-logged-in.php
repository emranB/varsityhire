<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<div class="content">
<div class="content-editProfile">
<form action="scripts/editProfileProcess.php" method="post" id="editProfile" name="editProfileProcess">


<!-- <div class="row"> -->


<div class="rowOne">
<!----------------------Left Column --------------------->
<div class="col-xs-12 col-md-6 col-lg-6">
<div class="leftColumn">
<h1 class="editProfileH1">Primary Info </h1>

	<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-6">
		<label for="fname" class="col-xs-12 col-md-12 col-lg-12">First Name: </label>
		<input class="col-xs-12 col-md-12 col-lg-12" type="text" value="<?php echo "$Fname"; ?>" name="fname" title="Enter first name" />
	</div>
	<div class="col-xs-12 col-md-6 col-lg-6">
		<label for="lname" class="col-xs-12 col-md-12 col-lg-12">Last Name: </label>
		<input class="col-xs-12 col-md-12 col-lg-12" type="text" value="<?php echo "$Lname"; ?>" name="lname" title="Enter last name" />
	</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-6">
			<label for="postalCode" class="col-xs-12 col-md-12 col-lg-12">Postal Code: </label>
			<input class="col-xs-12 col-md-12 col-lg-12" type="text" value="<?php echo "$PostalCode"; ?>"  name="postalCode" title="XXX XXX" />
		</div>
		<div class="col-xs-12 col-md-6 col-lg-6">
			<label for="phone" class="col-xs-12 col-md-12 col-lg-12">Phone: </label>
			<input class="col-xs-12 col-md-12 col-lg-12" type="number" value="<?php echo "$Phone"; ?>" name="phone" title="Enter phone number"/>
		</div>
	</div>

	<?php
	if( $_SESSION["UserType"] == "Student" ){
	?>
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			<label for="school" class="col-xs-12 col-md-12 col-lg-12">School / University / Other Institution: </label>
			<input class="col-xs-12 col-md-12 col-lg-12" type="text" value="<?php echo "$School"; ?>" name="school" title="Enter school name" />
		</div>
	</div>
	<?php
	}
	?>

</div>
</div>
<!----------------------Left Column Ends --------------------->

<!------------------------End of Checkboxes------------------------>
<?php
if( $_SESSION["UserType"] == "Student" ){
?>

<div class="col-xs-12 col-md-6 col-lg-6">
<div class="rightColumn">
<!----------------------Right Column Begins --------------------->
<h1 class="editProfileH1">Additional Info</h1>
<div class="col-xs-12 col-md-12 col-lg-12">

<div class="checkboxSkills">
<div class="col-xs-12 col-md-6 col-lg-6">
	<div class="checkbox">
		<label for="Dog_Walking">
			<input type="checkbox" name="Dog_Walking" value="Dog_Walking" <?php if( $_SESSION["Dog_Walking"] == "1"){ echo "checked"; } ?>/>
			Dog Walking
		</label>
	</div>
	<div class="checkbox">
		<label for="Exterior_Window_Washing">
			<input type="checkbox" name="Exterior_Window_Washing" value="Exterior_Window_Washing" <?php if( $_SESSION["Exterior_Window_Washing"] == "1"){ echo "checked"; } ?>/>
			Exterior Window Washing
		</label>
	</div>
	<div class="checkbox">
		<label for="Delivery">
			<input type="checkbox" name="Delivery" value="Delivery" <?php if( $_SESSION["Delivery"] == "1"){ echo "checked"; } ?>/>
			Moving and delivery services
		</label>
	</div>
	<div class="checkbox">
		<label for="Garage_Shop_Shed_Cleaning">
			<input type="checkbox" name="Garage_Shop_Shed_Cleaning" value="Garage_Shop_Shed_Cleaning" <?php if( $_SESSION["Garage_Shop_Shed_Cleaning"] == "1"){ echo "checked"; } ?>/>
			Garage Shop Shed Cleaning
		</label>
	</div>
	<div class="checkbox">
		<label for="Gutter_Cleaning">
			<input type="checkbox" name="Gutter_Cleaning" value="Gutter_Cleaning" <?php if( $_SESSION["Gutter_Cleaning"] == "1"){ echo "checked"; } ?>/>
			Gutter Cleaning
		</label>
	</div>
	<div class="checkbox">
		<label for="House_Cleaning">
			<input type="checkbox" name="House_Cleaning" value="House_Cleaning" <?php if( $_SESSION["House_Cleaning"] == "1"){ echo "checked"; } ?>/>
			House Cleaning
		</label>
	</div>
	<div class="checkbox">
		<label for="International_Languages">
			<input type="checkbox" name="International_Languages" value="International_Languages" <?php if( $_SESSION["International_Languages"] == "1"){ echo "checked"; } ?>/>
			International Languages
		</label>
	</div>
	<div class="checkbox">
		<label for="Landscaping">
			<input type="checkbox" name="Landscaping" value="Landscaping" <?php if( $_SESSION["Landscaping"] == "1"){ echo "checked"; } ?>/>
			Landscaping
		</label>
	</div>
	<div class="checkbox">
		<label for="Moving">
			<input type="checkbox" name="Moving" value="Moving" <?php if( $_SESSION["Moving"] == "1"){ echo "checked"; } ?>/>
			Moving
		</label>
	</div>
	<div class="checkbox">
		<label for="Music_Lessons">
			<input type="checkbox" name="Music_Lessons" value="Music_Lessons" <?php if( $_SESSION["Music_Lessons"] == "1"){ echo "checked"; } ?>/>
			Music Lessons
		</label>
	</div>
</div>

<div class="col-xs-12 col-md-6 col-lg-6">
	<div class="checkbox">
		<label for="Seasonal_Decoration">
			<input type="checkbox" name="Seasonal_Decoration" value="Seasonal_Decoration" <?php if( $_SESSION["Seasonal_Decoration"] == "1"){ echo "checked"; } ?>/>
			Seasonal Decoration
		</label>
	</div>
	<div class="checkbox">
		<label for="Painting">
			<input type="checkbox" name="Painting" value="Painting" <?php if( $_SESSION["Painting"] == "1"){ echo "checked"; } ?>/>
			Painting
		</label>
	</div>
	<div class="checkbox">
		<label for="Pressure_Washing">
			<input type="checkbox" name="Pressure_Washing" value="Pressure_Washing" <?php if( $_SESSION["Pressure_Washing"] == "1"){ echo "checked"; } ?>/>
			Pressure Washing
		</label>
	</div>
	<div class="checkbox">
		<label for="Private_Event_Assistance">
			<input type="checkbox" name="Private_Event_Assistance" value="Private_Event_Assistance" <?php if( $_SESSION["Private_Event_Assistance"] == "1"){ echo "checked"; } ?>/>
			Private Event Assistance
		</label>
	</div>
	<div class="checkbox">
		<label for="RV_Boat_Cleaning">
			<input type="checkbox" name="RV_Boat_Cleaning" value="RV_Boat_Cleaning" <?php if( $_SESSION["RV_Boat_Cleaning"] == "1"){ echo "checked"; } ?>/>
			RV and Boat Cleaning
		</label>
	</div>
	<div class="checkbox">
		<label for="Snow_Removal">
			<input type="checkbox" name="Snow_Removal" value="Snow_Removal" <?php if( $_SESSION["Snow_Removal"] == "1"){ echo "checked"; } ?>/>
			Snow and Ice Removal
		</label>
	</div>
	<div class="checkbox">
		<label for="Tutoring">
			<input type="checkbox" name="Tutoring" value="Tutoring" <?php if( $_SESSION["Tutoring"] == "1"){ echo "checked"; } ?>/>
			Tutoring
		</label>
	</div>
	<div class="checkbox">
		<label for="Vehicle_Care">
			<input type="checkbox" name="Vehicle_Care" value="Vehicle_Care" <?php if( $_SESSION["Vehicle_Care"] == "1"){ echo "checked"; } ?>/>
			Vehicle Care
		</label>
	</div>
	<div class="checkbox">
		<label for="Yard_Care">
			<input type="checkbox" name="Yard_Care" value="Yard_Care" <?php if( $_SESSION["Yard_Care"] == "1"){ echo "checked"; } ?>/>
			Yard Care
		</label>
	</div>
	<div class="checkbox">
		<label for="Other">
			<input type="checkbox" name="Other" value="Other" <?php if( $_SESSION["Other"] == "1"){ echo "checked"; } ?>/>
			Other
		</label>
	</div>
</div>

<p><i>You must select the services you wish to offer in order to begin receiving job postings</i></p>
</div>

</div>
</div>
</div>

<?php
}
?>
<!------------------------End of Checkboxes------------------------>

</div>
<!------------------------End of ROW 1------------------------>
<!-- </div> -->

<br><!--<hr class="outlineHr" />--><br>

<!-- <div class="row"> -->
<div class="rowTwo">
<!------------------------ROW 2 Begins------------------------>
<!-- <h1 class="editProfileH1">Complete your profile to increase your chances of getting jobs</h1><br> -->
<div class="col-xs-12- col-md-6 col-lg-6">
<!------------------------Left Column Begins------------------------>
<div class="leftColumn">

<?php
if( $_SESSION["UserType"] == "Student" ){
?>
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<label for="degree" class="col-xs-12 col-md-12 col-lg-12">Name of Program / Degree <i>(optional)</i>: </label>
		<input class="col-xs-12 col-md-12 col-lg-12" value="<?php echo "$Program"; ?>"  type="text" name="program"
			placeholder="Only required if already graduated from high school" title="Enter program / degree name"/>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-6">
		<label for="yearGrade" class="col-xs-12 col-md-12 col-lg-12">Year / Grade <i>(optional)</i>: </label>
		<input class="col-xs-12 col-md-12 col-lg-12" value="<?php echo "$YearGrade"; ?>" type="text" name="yearGrade" title="Enter year / grade achieved"/>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-6">
		<label for="dob" class="col-xs-12 col-md-12 col-lg-12">Date of Birth <i>(optional)</i>: </label>
		<input class="col-xs-12 col-md-12 col-lg-12" value="<?php echo "$Dob"; ?>" type="date" placeholder="YYYY-MM-DD" name="dob" title="Enter date of birth"/>
	</div>
</div>
<?php
}
?>


</div>
<!------------------------Left Column Ends------------------------>
</div>
<div class="col-xs-12 col-md-6 col-lg-6">
<!------------------------Right Column Begins------------------------>
<div class="rightColumn">
	<!-- <p><strong>Describe yourself</strong></p> -->
	<textarea name="profileAdditionalComments" placeholder="describe yourself" id="profileAdditionalComments"><?php echo "$AdditionalComments"; ?></textarea>
</div>
<!------------------------Right Column Ends------------------------>
</div>

</div>
<!------------------------ROW 2 Ends------------------------>
<!-- </div> -->



</div>
</div>


<br>
<!-- <hr class="pageEndHr" /> -->
<br>

<input type="submit" value="Update Profile" class="customBtn1"/>
<br><br>

</form>



</div>
</div>
