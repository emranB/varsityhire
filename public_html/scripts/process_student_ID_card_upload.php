<?php include ("../common/document-head.php"); ?>
<?php include ("../common/sessionVariables.php"); ?>

<body>

<?php
include("../common/navigation.php");
?>

<div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
<div class="bodyOutline">

<br><br>

<div class="content">
<div class="content-showJobs">


<?php

if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
{
    echo "Please select an image.";
}
else
{
    $image= addslashes($_FILES['image']['tmp_name']);
    $name= addslashes($_FILES['image']['name']);
    $image= file_get_contents($image);
    $image= base64_encode($image);
    saveimage($name,$image);
}

function saveimage($name,$image)
{
    include("../../password/dbConnect.inc");
    $qry_chk = " SELECT * FROM student_id_card WHERE ID='$_SESSION[ID]' ";
    $result_chk  = $connection->query($qry_chk);

    $num_rows_result_chk = mysqli_num_rows($result_chk);

    if( $num_rows_result_chk !== 0 ){
      $qry = " UPDATE student_id_card
                SET Photo_Name='$image',
                    student_ID_card_status='pending'
                WHERE ID='$_SESSION[ID]' ";
      $result  = $connection->query($qry);
      if($result)
      {
        echo "<br/><hr /><h1> Upload Successful </h1><hr />";
      }
        else
      {
        echo "<br/>Image not uploaded.";
      }
    }
    else{
      $qry1 = " INSERT INTO student_id_card
                (ID, Photo_Name, student_ID_card_status)
               VALUES
                ('$_SESSION[ID]', '$image', 'pending') ";
      $result1  = $connection->query($qry1);
      if($result1)
      {
          echo "<br/><hr /><h1> Upload Successful </h1><hr />";
      }
      else
      {
          echo "<br/>Image not uploaded.";
      }
    }
}


displayimage();
function displayimage()
{
    include("../../password/dbConnect.inc");
    $qry = " SELECT * FROM student_id_card WHERE ID='$_SESSION[ID]'";
    $result  = $connection->query($qry);
    while( $row = $result->fetch_assoc() )
    {
        echo '<br /><br /><img height="300" width="300" src="data:image;base64,'.$row["Photo_Name"].' "> ';
    }
    $connection->close();
}


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
