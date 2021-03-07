<?php

session_start();

include("includes/dbConnect.php");

if(isset($_REQUEST['btnSubmit'])){
    $userName = $_REQUEST['userName'];
    $firstName = $_REQUEST['firstName'];
    $lastName = $_REQUEST['lastName'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confPassword = $_REQUEST['confirmPassword'];

    //Date Validation
    if(empty($firstName)){
        echo "Please enter your First Name";
    }
    if(empty($userName)){
        echo "Please enter your First Name";
    }
    if(empty($lastName)){
        echo "Please enter your Last Name";
    }
    if(empty($email)){
        echo "Please enter your Email";
    }
    if(empty($password)){
        echo "Please enter a Password";
    }
    if($password != $confPassword){
        echo "Your Passwords do not match";
    }
    //Checks Database for existing user
    $userQuery = "SELECT * FROM `User` WHERE userName = '".$userName."'";
    $userResult = mysqli_query($link,$userQuery);

    $emailQuery = "SELECT * FROM `User` WHERE email = '".$email."'";
    $emailResult = mysqli_query($link,$emailQuery);


    if(mysqli_num_rows($userResult)>=1 && mysqli_num_rows($emailResult) >= 1)
        echo"Name and Email already exists";
    else {
        $userInsert = "INSERT INTO `User` (firstName, lastName, email, password, userName) VALUES ('$firstName', '$lastName', '$email', '$password','$userName')";
        if (mysqli_query($link, $userInsert)) {
            echo "User Inserted";
        }
    }

    $userID = mysqli_insert_id($link);

  /*  $userFirstName = "SELECT * FROM `User` WHere idUser = '" . $userID . "' AND firstName = '" . $firstName . "' AND lastName = '" . $lastName . "'";
    $userResult = mysqli_query($link, $userFirstName);*/

    //while($row = mysqli_fetch_array($userResult)){
        $_SESSION['userID']  =  $userID;
        $_SESSION['userFirstName'] = $firstName;
        $_SESSION['userLastName'] = $lastName;

        header("location:/final/private/index.php");
    //}
}

if(isset($_REQUEST['btnLogin'])){
    header("location: /final/login.php");
}
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        form{
            width:500px;
            margin: 0 auto;
            display: block;
            border-radius:15px;
            box-shadow: 2px 2px 10px 2px #333;
        }

        form .formHeader{
            background: orange;
            border-top-left-radius:15px;
            border-top-right-radius:15px;
            padding: .5rem 0;
        }

        form .formBody{
            padding:1rem 5rem;
        }

        form h1{
            margin-top:0rem;
            text-align: center;
            color: white;
            font-size: 36px;
            font-family: "Segoe UI";
        }

        form .formBody label{
            display: inline-block;
            width: 110px;
            font-size: 20px;
            font-family: sans-serif;
        }

        form .formBody input{padding:.5rem;}

        form .formBody input[type="submit"]{
            background: orange;
            color: white;
            border:none;
            padding: .5rem 2rem;
            font-size: 24px;
            border-radius: 10px;
            box-shadow: 0px 5px #cc5500;
            transition: all ease-in-out .1s;
        }

        form .formBody input[type="submit"]:hover{
            box-shadow: 0px 2px #cc5500;
        }

        form .formBody input[type="submit"].login{
            background: orange;
            color: white;
            border:none;
            padding: .5rem 2rem;
            font-size: 16px;
            border-radius: 10px;
            box-shadow: 0px 5px #cc5500;
            transition: all ease-in-out .1s;
        }

        form .formBody input[type="submit"].login:hover{
            box-shadow: 0px 2px #cc5500;
        }

        form h4{
            color: #333;
            font-size: 20px;
            font-family: "Segoe UI";
        }
    </style>

</head>
<body>

<form action="" method="GET">
    <div class="formHeader">
        <h1>Register for FreeSpace</h1>
    </div>

    <div class="formBody">
        <label>User Name</label>
        <input type="text" name="userName">
        <br/>
        <br/>
        <label>First Name</label>
        <input type="text" name="firstName">
        <br/>
        <br/>
        <label>Last Name</label>
        <input type="text" name="lastName">
        <br/>
        <br/>
        <label>Email</label>
        <input type="text" name="email">
        <br/>
        <br/>
        <label>Password</label>
        <input type="password" name="password">
        <br/>
        <br/>
        <label>Confirm Password</label>
        <input type="password" name="confirmPassword">
        <br/>
        <br/>
        <input type="submit" name="btnSubmit" value="Create User">
        <br/>
        <br/>
        <h4>Already A Member</h4>
        <input type="submit" name="btnLogin" class="login" value="Login">
        </div>
</form>

</body>
</html>