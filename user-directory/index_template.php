<?php
    $readUserFile = fopen("info.txt","r");
    $userInfo = fgets($readUserFile);

    $data = explode(",", $userInfo);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{background: <?php echo $data[2]?>;}
    </style>
</head>
<body>
<?php
    echo "<h1>". "Welcome,". " " . $data[0]. " ". $data[1]."</h1>";
?>
</body>
</html>