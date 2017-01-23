<?php
 /**************************** Fetch Review Info ***************************/
  $sql =  " SELECT
              client_ID,
              job_ID,
              student_ID,
              additional_comments,
              SUM(timing) AS total_timing,
              SUM(cleanliness) AS total_cleanliness,
              SUM(quality_of_work) AS total_quality_of_work,
              SUM(knowledge_of_activity) AS total_knowledge_of_activity,
              SUM(average) AS total_average
            FROM students_reviews
            WHERE student_ID='$_GET[ID]'
            AND showed_up='Yes' ";
$qry = $connection->query($sql);
/*************************************************************************/

/************************ Count Number of Reviews ************************/
$sql_chk =  " SELECT *
              FROM students_reviews
              WHERE student_ID='$_GET[ID]'
              AND showed_up='Yes' ";
$qry_chk = $connection->query($sql_chk);
$count_reviews = mysqli_num_rows($qry_chk);
$fetch_Target_Count_Reviews = $count_reviews;
/*************************************************************************/

  if( $count_reviews == "0" ){
    $avg_average = "0";
    while( $row = $qry_chk->fetch_assoc() ){
      $timing = "0";
      $cleanliness = "0";
      $quality_of_work = "0";
      $knowledge_of_activity = "0";
      $average = "0";

      $avg_timing = "0";
      $avg_cleanliness = "0";
      $avg_quality_of_work = "0";
      $avg_knowledge_of_activity = "0";
      $avg_average = "0";
    }

    while( $row = $qry->fetch_assoc() ){
      $client_ID = $row["client_ID"];
      $job_ID = $row["job_ID"];
      $student_ID = $row["student_ID"];

      $total_timing = "0";
      $total_cleanliness = "0";
      $total_quality_of_work = "0";
      $total_knowledge_of_activity = "0";
      $total_average = "0";

      $avg_total_timing = "0";
      $avg_total_cleanliness = "0";
      $avg_total_quality_of_work = "0";
      $avg_total_knowledge_of_activity = "0";
      $avg_total_average = "0";
    }

    $cancellations = "0";
    $job_Category= $row["job_Category"];

  }
  else if( $count_reviews !== "0" ){
    while( $row = $qry_chk->fetch_assoc() ){
      $timing = round( $row["timing"], 1 );
      $cleanliness = round( $row["cleanliness"], 1 );
      $quality_of_work = round( $row["quality_of_work"], 1 );
      $knowledge_of_activity = round( $row["knowledge_of_activity"], 1 );
      $average = round( $row["average"], 1 );

      $avg_timing = round( (($row["timing"]) / 5), 1 );
      $avg_cleanliness = round( (($row["cleanliness"]) / 5), 1 );
      $avg_quality_of_work = round( (($row["quality_of_work"]) / 5), 1 );
      $avg_knowledge_of_activity = round( (($row["knowledge_of_activity"]) / 5), 1 );
      $avg_average = round( (($row["average"]) / 5), 1 );
    }

    while( $row = $qry->fetch_assoc() ){
      $client_ID = $row["client_ID"];
      $job_ID = $row["job_ID"];
      $student_ID = $row["student_ID"];

      $total_timing = round( $row["total_timing"], 1 );
      $total_cleanliness = round( $row["total_cleanliness"], 1 );
      $total_quality_of_work = round( $row["total_quality_of_work"], 1 );
      $total_knowledge_of_activity = round( $row["total_knowledge_of_activity"], 1 );
      $total_average = round( $row["total_average"], 1 );

      $avg_total_timing = round( (($row["total_timing"]) / $count_reviews), 1 );
      $avg_total_cleanliness = round( (($row["total_cleanliness"]) / $count_reviews), 1 );
      $avg_total_quality_of_work = round( (($row["total_quality_of_work"]) / $count_reviews), 1 );
      $avg_total_knowledge_of_activity = round( (($row["total_knowledge_of_activity"]) / $count_reviews), 1 );
      $avg_total_average = round( (($row["total_average"]) / $count_reviews), 1 );
    }

    $sql2 =  " SELECT * FROM students_reviews WHERE student_ID='$_GET[ID]' AND showed_up='No' ";
    $qry2 = $connection->query($sql2);
    $cancellations = mysqli_num_rows($qry2);

  }

?>
