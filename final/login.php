<?php


include("includes/dbConnect.php");

if(isset($_REQUEST['btnSubmit'])){
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $checkUser = "SELECT * FROM  `User` WHERE email='".$email."' AND password='". $password."'";
    $checkResult  = mysqli_query($link, $checkUser);

    $userRow = mysqli_fetch_array($checkResult, MYSQLI_ASSOC);
    $emailValue = $userRow['email'];
    $passwordValue = $userRow['password'];

    $count = mysqli_num_rows($checkResult);

    if($count == 1){
        session_start();
        $_SESSION['userID'] = $userRow['idUser'];
        header("Location:/final/private/index.php");
    }else{
        echo "Invalid Information";
    }
}

if(isset($_REQUEST['btnRegister'])){
    header("location:/final/register.php");
}
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
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

        form .formBody input[type="submit"].register{
            background: orange;
            color: white;
            border:none;
            padding: .5rem 2rem;
            font-size: 16px;
            border-radius: 10px;
            box-shadow: 0px 5px #cc5500;
            transition: all ease-in-out .1s;
        }

        form .formBody input[type="submit"].register:hover{
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
        <h1>Login In FreeSpace</h1>
    </div>
    <div class="formBody">
        <label>Email</label>
        <input type="text" name="email">
        <br/>
        <br/>
        <label>Password</label>
        <input type="password" name="password">
        <br/>
        <br/>
        <input type="submit" name="btnSubmit" value="Login">
        <br/>
        <br/>
        <h4>Not a Member Register Here</h4>
        <input type="submit" name="btnRegister" class="register" value="Register">
        </div>
</form>

</body>
</html>
