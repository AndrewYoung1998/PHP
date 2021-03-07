<?php
include("includes/dbConnect.php");

if(isset($_REQUEST['btnRegister'])){
    header("Location:http://bwm250.andrewyoung.space/final/register.php");
}

if(isset($_REQUEST['btnLogin'])){
    header("Location:http://bwm250.andrewyoung.space/final/login.php");
}
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <title>Final</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        h1{
            font-size: 36px;
            font-family: "Segoe UI";
        }
        input{padding:.5rem;}

        input[type="submit"]{
            background: orange;
            color: white;
            border:none;
            padding: .5rem 2rem;
            font-size: 24px;
            border-radius: 10px;
            box-shadow: 0px 5px #cc5500;
            transition: all ease-in-out .1s;
        }

        input[type="submit"]:hover{
            box-shadow: 0px 2px #cc5500;
        }

    </style>
</head>
<body>
<h1>Welcome To FreeSpace</h1>

<form action="index.php" method="GET">
    <input type="submit" name="btnRegister" class="register" value="Register">
    <br/>
    <br/>
    <br/>
    <input type="submit" name="btnLogin" class="login" value="Login">
</form>

</body>
</html>
