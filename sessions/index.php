<?php

//Starts session
session_start();


if(isset($_REQUEST['btnSubmit'])){
    //stores values in session varibales
    $_SESSION['ddlColor'] = $_REQUEST['ddlColor'];
    $_SESSION['date'] = $_REQUEST['date'];

    //redirects to Read session file
    header('Location: http://bwm250.andrewyoung.space/sessions/readSession.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Sessions</title>
</head>
<body>
<form action="#" method="POST">
    <h2>Color:</h2>
    <p>
        <select name="ddlColor">
            <option>red</option>
            <option>green</option>
            <option>blue</option>
            <option>orange</option>
            <option>purple</option>
            <option>yellow</option>
        </select>
    </p>
    <h2>Enter birthday:</h2>
    <p>
        <input type="date" name="date">
    </p>
    <p><input type="submit" name="btnSubmit" value="Submit"></p>
</form>
</html>