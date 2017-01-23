<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<h1 class="pageTitle">Registration Area  </h1>
<!------------------- Student Login ------------------->
<div class="col-xs-12 col-md-6 col-lg-6">
	<div class="content">
	<div class="content-register student">

		<div class="formHeader">
			<span class="el el-child"></span>
			<h1><strong>Register As A Student</strong></h1>
		</div>

		<form action="scripts/registrationFormProcess.php" method="post" onsubmit="return validate_registration_student();" class="noDisplay" id="registrationForm" name="registrationForm">
		<div class="fields">

			<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-6">
				<label for="fname" class="col-xs-12 col-md-12 col-lg-12"> <span class="err err_fname"></span> First Name:  </label>
				<input class="col-xs-12 col-md-12 col-lg-12" type="text" name="fname" id="fname" title="Enter first name" />
			</div>
			<div class="col-xs-12 col-md-6 col-lg-6">
				<label for="lname" class="col-xs-12 col-md-12 col-lg-12"><span class="err err_lname"></span> Last Name: </span> </label>
				<input class="col-xs-12 col-md-12 col-lg-12" type="text" name="lname" id="lname" title="Enter last name" />
			</div>
			</div>

			<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<label for="email" class="col-xs-12 col-md-12 col-lg-12"><span class="err err_email"></span> Email: </span> </label>
				<input class="col-xs-12 col-md-12 col-lg-12" type="email" name="email" id="email" title="Enter email" />
			</div>
			</div>

			<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-6">
				<label for="password" class="col-xs-12 col-md-12 col-lg-12"><span class="err err_password"></span> Password: </span> </label>
				<input class="col-xs-12 col-md-12 col-lg-12" type="password" name="password" id="password" title="Enter password" />
				<p><i>(min 6 characters with at least 1 upper-case and 1 numeric character)</i></p>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-6">
				<label for="postalCode" class="col-xs-12 col-md-12 col-lg-12"><span class="err err_postalCode"></span> Postal Code: </span> </label>
				<input class="col-xs-12 col-md-12 col-lg-12" type="text" name="postalCode" id="postalCode" title="XXX XXX" />
			</div>
			</div>

			<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="checkbox">
					<span class="err err_cb"></span>
				  <label>
						<input style="width: 20px; height: 20px;" type="checkbox" id="cb_terms" >
							&nbsp I accept the <a href="">Terms and Conditions</a>
					</label>
				</div>
			</div>
			</div>

		</div>
		<input type="submit" value="SUBMIT" class="submitBtn2 "/>
		</form>
	</div>
	</div>
</div>
<!------------------- Student Login ------------------->

<!------------------- Employer Login ------------------->
<div class="col-xs-12 col-md-6 col-lg-6">
	<div class="content">
	<div class="content-register employer">

		<div class="formHeader">
			<span class="el el-blind"></span>
			<h1><strong>Hire A Student</strong></h1>
		</div>

		<form action="scripts/registrationFormProcess-Client.php" method="post" onsubmit="return validate_registration_client();" class="noDisplay" id="registrationForm" name="registrationForm">
		<div class="fields">

			<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-6">
				<label for="fname" class="col-xs-12 col-md-12 col-lg-12"> <span class="err err_fname"></span> First Name: </label>
				<input class="col-xs-12 col-md-12 col-lg-12" type="text" name="fname" id="fname2" title="Enter first name" />
			</div>
			<div class="col-xs-12 col-md-6 col-lg-6">
				<label for="lname" class="col-xs-12 col-md-12 col-lg-12"> <span class="err err_lname"></span> Last Name: </label>
				<input class="col-xs-12 col-md-12 col-lg-12" type="text" name="lname" id="lname2" title="Enter last name" />
			</div>
			</div>

			<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<label for="email" class="col-xs-12 col-md-12 col-lg-12"> <span class="err err_email"></span> Email: </label>
				<input class="col-xs-12 col-md-12 col-lg-12" type="email" name="email" id="email2" title="Enter email" />
			</div>
			</div>

			<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-6">
				<label for="password" class="col-xs-12 col-md-12 col-lg-12"> <span class="err err_password"></span> Password: </label>
				<input class="col-xs-12 col-md-12 col-lg-12" type="password" name="password" id="password2" title="Enter password" />
				<p><i>(min 6 characters with at least 1 upper-case and 1 numeric character)</i></p>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-6">
				<label for="postalCode" class="col-xs-12 col-md-12 col-lg-12"> <span class="err err_postalCode"></span> Postal Code: </label>
				<input class="col-xs-12 col-md-12 col-lg-12" type="text" name="postalCode" id="postalCode2" title="XXX XXX" />
			</div>
		</div>

		<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="checkbox">
				<span class="err err_cb"></span>
			  <label>
					<input style="width: 20px; height: 20px;" type="checkbox" id="cb_terms2" >
						&nbsp I accept the <a href="">Terms and Conditions</a>
				</label>
			</div>
		</div>
		</div>

		</div>
		<input type="submit" value="SUBMIT" class="submitBtn2 "/>
		</form>
	</div>
	</div>
</div>
<!------------------- Employer Login ------------------->


</div>
</div>
