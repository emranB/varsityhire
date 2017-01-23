<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$GET_student_ID = $_GET["student_ID"];
$GET_job_ID = $_GET["job_ID"];
$GET_client_ID = $_GET["client_ID"];
$GET_action = $_GET["action"];
// echo $GET_student_ID . "<br />" . $GET_job_ID . "<br />" . $GET_client_ID . "<br />" . $GET_action;
?>

<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">


<div class="content">
<div class="content-review-student">


<?php
if( $_SESSION["ID"] !== "" && $_SESSION["ID"] == $GET_client_ID ){
/**********************************************************/
$location_form = "scripts/submit_student_review.php?student_ID=$GET_student_ID&&job_ID=$GET_job_ID&&client_ID=$GET_client_ID";
if( $GET_action == "review" ){
  echo "<hr><h1> Review Student </h1><hr>";
  ?>

  <div class="row">
    <form action="<?php echo $location_form."&&action=review"; ?>" method="post" class="student_review_form" onsubmit="return validate_student_review();">

      <div class="row">
        <div class="form_group">
          <h2 class="form_group_header">Was the student on time for the job?</h2>
          <div class="col-xs-0 col-md-1 col-lg-1"></div>

          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 1 (Very Late) </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="timing" value="1" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 2 </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="timing" value="2" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 3 </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="timing" value="3" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 4 </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="timing" value="4" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 5 (Perfect Timing) </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="timing" value="5" ></div>
          </div>

          <div class="col-xs-0 col-md-1 col-lg-1"></div>
        </div>
      </div>

      <div class="row">
        <div class="form_group">
          <h2 class="form_group_header">Did the student leave the work area clean and tidy?</h2>
          <div class="col-xs-0 col-md-1 col-lg-1"></div>

          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 1 (No, very messy) </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="cleanliness" value="1" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 2 </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="cleanliness" value="2" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 3 </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="cleanliness" value="3" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 4 </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="cleanliness" value="4" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 5 (yes, very clean) </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="cleanliness" value="5" ></div>
          </div>

          <div class="col-xs-0 col-md-1 col-lg-1"></div>
        </div>
      </div>

      <div class="row">
        <div class="form_group">
          <h2 class="form_group_header">How was the quality of work?</h2>
          <div class="col-xs-1 col-md-1 col-lg-1"></div>

          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 1 (Poor) </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="quality_of_work" value="1" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 2 </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="quality_of_work" value="2" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 3 </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="quality_of_work" value="3" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 4 </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="quality_of_work" value="4" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 5 (Excellent) </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="quality_of_work" value="5" ></div>
          </div>

          <div class="col-xs-1 col-md-1 col-lg-1"></div>
        </div>
      </div>

      <div class="row">
        <div class="form_group">
          <h2 class="form_group_header">Did the student demonstrate knowledge on the service  and activities?</h2>
          <div class="col-xs-0 col-md-1 col-lg-1"></div>

          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 1 (Below Expectation) </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="knowledge_of_activity" value="1" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 2 </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="knowledge_of_activity" value="2" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 3 </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="knowledge_of_activity" value="3" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 4 </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="knowledge_of_activity" value="4" ></div>
          </div>
          <div class="col-xs-12 col-md-2 col-lg-2 no_spacing">
            <p class="describe_ranks_inline"> 5 (Well exceeded) </p>
            <div class="magnitude_of_ranks_inline"><input type="radio" name="knowledge_of_activity" value="5" ></div>
          </div>

          <div class="col-xs-0 col-md-1 col-lg-1"></div>
        </div>
      </div>

      <div class="row">
        <div class="form_group">
          <h2 class="form_group_header">Leave comments about the student and services provided</h2>
          <textarea name="additional_comments" id="additional_comments" class="additional_comments" ></textarea>
        </div>
      </div>

      <br>
      <div class="col-xs-12 col-md-6 col-lg-6"><input type="reset" value="Cancel" class="profile_page_btn btn-lg" ></div>
      <div class="col-xs-12 col-md-6 col-lg-6"><input type="submit" value="Submit" class="profile_page_btn btn-lg" ></div>

    </form>
  </div>


  <?php
}
else if( $GET_action == "no_show" ){
  ?>

  <div class="row">
    <form action="<?php echo $location_form ."&&action=no_show"; ?>" method="post" class="student_review_form">

      <h2>Are you sure you want to mark student as a "No Show"?</h2>
      <input type="submit" value="Yes" class="profile_page_btn btn-block" >

    </form>
  </div>

  <?php
}
/**********************************************************/
}


$connection->close();
?>


</div>
</div>

</div>
</div>

<?php include("../common/footer.php"); ?>

</body>

</html>
