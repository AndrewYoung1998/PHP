<?php
if(isset($_REQUEST['btnLogout'])){

	header("location:/final/login.php");
}

session_start();
include("../includes/dbConnect.php");

if (isset($_SESSION['userID'])) {

	$userInfo = $_SESSION['userID'];

	$userName = "SELECT firstName,lastName,email, userName FROM `User` WHERE idUser='".$userInfo."'";

	$user = mysqli_query($link, $userName);

	while($row = mysqli_fetch_array($user)){
		$userFirstName = $row['firstName'];
		$userLastName = $row['lastName'];
		$email = $row['email'];
		$usersName = $row['userName'];
	}

}else{
	header("location:../login.php");
}

if(isset($_REQUEST['btnSubmit'])){
	$file = $_FILES['fileProfilePic'][0];

	//Echo File Props
	$fileName = $_FILES["fileProfilePic"]["name"];
	$fileType = $_FILES["fileProfilePic"]["type"];
	$fileTemp = $_FILES["fileProfilePic"]["tmp_name"];
	$fileSize = $_FILES["fileProfilePic"]["size"];

	$fileNameArray = explode(".", $fileName);
	$fileExtension = $fileNameArray[1];
	$newFileName = "profile.$fileExtension";


	if($fileType = "image/jpeg" && $fileSize <= 2000000){
		if(file_exists("uploads/$newFileName"))
			unlink("uploads/$newFileName");
		move_uploaded_file($fileTemp, "uploads/$newFileName");
	}else{
		echo "File Too Large";
	}
}

if(isset($_REQUEST['btnRemove'])){
	$path = "uploads/profile.jpg";

	if(!unlink($path)){
		echo "Image not deleted";
	}else{
		echo "Image Deleted";
	};
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP File Upload</title>
    <style>
        .userProfile{
            width:500px;
            margin: 0 auto;
            display: block;
            border-radius:15px;
            box-shadow: 2px 2px 10px 2px #333;
            height:500px;
        }
        form {
            width:50%;
            float:left;
        }
        .userProfile .profile{
            width:50%;
            float:right;
        }
        form input{padding:.5rem;}

        form input[type="submit"]{
            background: orange;
            color: white;
            border:none;
            padding: .5rem 2rem;
            font-size: 24px;
            border-radius: 10px;
            box-shadow: 0px 5px #cc5500;
            transition: all ease-in-out .1s;
        }

        form input[type="submit"]:hover{
            box-shadow: 0px 2px #cc5500;
        }

        form input[type="submit"].upload{
            background: orange;
            color: white;
            border:none;
            padding: .5rem 2rem;
            font-size: 16px;
            border-radius: 10px;
            box-shadow: 0px 5px #cc5500;
            transition: all ease-in-out .1s;
        }

        form input[type="submit"].upload:hover{
            box-shadow: 0px 2px #cc5500;
        }

        form input[type="submit"].remove{
            background: orange;
            color: white;
            border:none;
            padding: .5rem 2rem;
            font-size: 16px;
            border-radius: 10px;
            box-shadow: 0px 5px #cc5500;
            transition: all ease-in-out .1s;
        }

        form input[type="submit"].remove:hover{
            box-shadow: 0px 2px #cc5500;
        }

        form input[type="submit"].logout{
            background: orange;
            color: white;
            border:none;
            padding: .5rem 2rem;
            font-size: 16px;
            border-radius: 10px;
            box-shadow: 0px 5px #cc5500;
            transition: all ease-in-out .1s;
        }

        form input[type="submit"].logout:hover{
            box-shadow: 0px 2px #cc5500;
        }

        form img{
            width:300px;
            height:250px;
        }
    </style>
</head>
<body>



<div class="userProfile">
    <div class="profile">
        <?php
            echo '<h4>'.$userFirstName . ' ' . $userLastName.'<h4>';
            echo '<h4>'. $email.'<h4>';
            echo '<h4>'. $usersName.'<h4>';
        ?>
    </div>

    <form action="#" method="post" enctype="multipart/form-data">

        <p>Select File
            <br/>
            <input type="file" name="fileProfilePic" accept="images/*" capture="camera">
        </p>
        <p>
            <input type="submit" value="Upload" class="upload" name="btnSubmit">
            <input type="submit" value="Remove" class="remove" name="btnRemove">
        </p>
        <p>
		    <?php
		        echo "<img src=\"uploads/$newFileName\">";
		    ?>
        </p>
        <input type="submit" value="Logout" class="logout" name="btnLogout">
    </form>
</div>


</body>
</html>
