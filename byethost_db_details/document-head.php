<?php
session_unset();

session_destroy();

include("../../password/dbConnect.inc");
session_start();
ob_start();
error_reporting(E_ALL);
?>
<?php include("../common/sessionVariables.php"); ?>

<!-- Document Head -->
<!DOCTYPE html>

<html>
<head>

<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Varsity Hire</title>
<base href="http://varsity-hire.byethost5.com/public_html/" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/elusive-icons/2.0.0/css/elusive-icons.min.css">
<link rel="stylesheet" href="css/elusive-icons/css/elusive-icons.css">
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/navWithLogin.css" />
<script type="text/javascript" src="scripts/custom.js"></script>
<script type="text/javascript" src="scripts/validate_registration_form.js"></script>
<script type="text/javascript" src="scripts/validate_post_job.js"></script>
<script type="text/javascript" src="scripts/validate_student_review_form.js"></script>
<script type="text/javascript" src="scripts/populate_job_category.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>


</head>
