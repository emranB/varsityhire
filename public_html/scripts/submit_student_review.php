<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
$GET_client_ID = $_GET["client_ID"];
$GET_job_ID = $_GET["job_ID"];
$GET_student_ID = $_GET["student_ID"];
$GET_action = $_GET["action"];
// echo $GET_student_ID . "<br />" . $GET_job_ID . "<br />" . $GET_client_ID . "<br />";
?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">


<div class="content">
<div class="content-review-student">


<?php
/**********************************************************/
if( $GET_action == "review" ){
  $timing = $_POST["timing"];
  $cleanliness = $_POST["cleanliness"];
  $quality_of_work = $_POST["quality_of_work"];
  $knowledge_of_activity = $_POST["knowledge_of_activity"];
  $additional_comments = $_POST["additional_comments"];
  $average = ( $timing + $cleanliness + $quality_of_work + $knowledge_of_activity ) / 4;

  $sql_Save_Review_Values = " INSERT INTO students_reviews(
                                client_ID,
                                job_ID,
                                student_ID,
                                showed_up,
                                timing,
                                cleanliness,
                                quality_of_work,
                                knowledge_of_activity,
                                average,
                                additional_comments
                              )
                              VALUES(
                                '$GET_client_ID',
                                '$GET_job_ID',
                                '$GET_student_ID',
                                'Yes',
                                '$timing',
                                '$cleanliness',
                                '$quality_of_work',
                                '$knowledge_of_activity',
                                '$average',
                                '$additional_comments'
                              ) ";
  $query_Save_Review_Values = $connection->query($sql_Save_Review_Values);
  if( $query_Save_Review_Values ){
    echo "<hr /><h1> SUCCESSFULLY REVIEWED STUDENT </h1><hr />";
    echo "<p>Redirecting . . . .</p>";
    header("Refresh: 1;url=../pages/history.php?");
  }
}

else if( $GET_action == "no_show" ){
  $sql_Save_Review_Values = " INSERT INTO students_reviews(
                                client_ID,
                                job_ID,
                                student_ID,
                                showed_up
                              )
                              VALUES(
                                '$GET_client_ID',
                                '$GET_job_ID',
                                '$GET_student_ID',
                                'No'
                              ) ";
  $query_Save_Review_Values = $connection->query($sql_Save_Review_Values);
  if( $query_Save_Review_Values ){
    echo "<hr /><h1> SUCCESSFULLY REVIEWED STUDENT </h1><hr />";
    echo "<p>Redirecting . . . .</p>";
    header("Refresh: 1;url=../pages/history.php?");
  }
}


/**********************************************************/

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
