<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP File Upload</title>
</head>
<body>

    <form action="#" method="post" enctype="multipart/form-data">

        <p>Select File
        <br/>
        <input type="file" name="fileProfilePic" accept="images/*" capture="camera">
        </p>
        <p>
            <input type="submit" value="Upload" name="btnSubmit">
        </p>
    </form>

<?php
    if(isset($_REQUEST['btnSubmit'])){
        $file = $_FILES['fileProfilePic'];

        //store File Props in variable
        $fileName = $_FILES["fileProfilePic"]["name"];
        $fileType = $_FILES["fileProfilePic"]["type"];
        $fileTemp = $_FILES["fileProfilePic"]["tmp_name"];
        $fileSize = $_FILES["fileProfilePic"]["size"];

        $fileNameArray = explode(".", $fileName);
        $fileExtension = $fileNameArray[1];
        $newFileName = "profile.$fileExtension";

        //checks to see if file is jpeg and less than 5MB
        if($fileType = "image/jpeg" && $fileSize <= 5000000){
            //Moves to uploads folder
            move_uploaded_file($fileTemp, "uploads/$newFileName");
            //displays images
            echo "<img src=\"uploads/$newFileName\">";
        }else{
            echo "File Error";
        }
    }
?>

</body>
</html>