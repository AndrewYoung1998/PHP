<?php
//Database Connection Variable
$host     = "localhost";
$username = "ceeqoghy_bwm250";
$password = "BWM250!@" ;
$database = "ceeqoghy_bwm250";
$port     = 3306;

//Database Connection String
$link = new mysqli($host, $username, $password, $database, $port);


//Check Connection
if(mysqli_connect_error())
    echo "Database error:" . mysqli_connect_error();
else
    //echo "connection established";
    ?>