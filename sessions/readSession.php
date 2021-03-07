<?php
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Sessions</title>
    <style>
        /*sets session variable to background color*/
        body{
            background-color:<?php echo $_SESSION['ddlColor']?>;
        }
    </style>
</head>
<body>
    <h2>Days til Birthday</h2>
<?php
    //converts the data session variable into time, stores in bd variable
    $bd = strtotime($_SESSION['date']);

    $adjusted = strtotime(date('Y').'-'.date('m-d',$bd));

    //checks to see if the time entered is less than the current date
    if($adjusted < time())
        $adjusted = strtotime(date('Y') + 1 .'-'.date('m-d',$bd));

    //does calculation from seconds into days.
    $days = (int)(($adjusted - time())/86400);
    echo $days;
?>
</html>
