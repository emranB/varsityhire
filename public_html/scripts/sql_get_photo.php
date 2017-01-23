<?php
$sql_Fetch_Employer_Photo = " SELECT * FROM user_photos WHERE ID='$client_ID' ";
$query_Fetch_Employer_Photo = $connection->query($sql_Fetch_Employer_Photo);
if( $query_Fetch_Employer_Photo ){
  while( $row_photo = $query_Fetch_Employer_Photo->fetch_assoc() ){
    $client_photo = '<img src=" data:image;base64,'.$row_photo["Photo_Name"].' "> ';
  }
}
?>
