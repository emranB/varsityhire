<?php

$sql_Get_Date_Of_Venue = " SELECT * FROM jobs_posts
                           INNER JOIN other
                           ON jobs_posts.job_ID=other.job_ID ";
$query_Get_Date_Of_Venue = $connection->query($sql_Get_Date_Of_Venue);
if( $query_Get_Date_Of_Venue ){
  while( $row_date = $query_Get_Date_Of_Venue->fetch_assoc() ){

    $date_str = $row_date["Date"];

    $time = $row_date["Time"];

  }
}



?>
