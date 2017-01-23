<?php
if(isset($_POST['imageUpload'])) {

    //Process the image that is uploaded by the user

    $target_dir = "../pics/user_photos";
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=basename( $_FILES["imageUpload"]["name"],".jpg"); // used to store the filename in a variable

    //storind the data in your database
    $query= "INSERT INTO user_photos (UserType, ID, Photo_Name)
              VALUES ('$_SESSION[UserType]','$_SESSION[ID]', '$image')";
    mysql_query($query);

    require('heading.php');
    echo "Your add has been submited, you will be redirected to your account page in 3 seconds....";
    header( "Refresh:3; url=account.php", true, 303);
}
?>
