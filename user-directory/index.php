<!-- This file has a user pick a color and enter their name. Then on submit creates a user directory storing their information-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
</head>
<body>

<form action="#" method="POST">

    <p><input type="text" placeholder="First Name" name="txtFirstName"></p>
    <p><input type="text" placeholder="Last Name" name="txtLastName"></p>
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
    <p><input type="submit" name="btnSubmit" value="Go"></p>
</form>

<?php
    if(isset($_REQUEST['btnSubmit'])){
        //Variable declaration
        $firstName = $_REQUEST['txtFirstName'];
        $lastName  = $_REQUEST['txtLastName'];
        $color     = $_REQUEST['ddlColor'];

        //gets first character of first name then appends last name to it
        $userFolder = substr($firstName,0,1).$lastName;

        //Makes directory of the user
        mkdir($userFolder);

        $userFile = fopen("$userFolder/info.txt","w");

        //Writes data to users file
        fwrite($userFile, "$firstName,$lastName,$color");

        //copies template file and pastes it in to user directory index file
        copy("index_template.php", "$userFolder/index.php" );

        //Redirects to users directory
        header("Location: http://bwm250.andrewyoung.space/assignment4/$userFolder");

    }


?>
</body>
</html>