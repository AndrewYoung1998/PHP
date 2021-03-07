<!DOCTYPE html>
<html>
<head>
    <title>Chess Board</title>
</head>
<body>
<!-- Creates Checker chess board -->
<h1>Chess Board</h1>
<table width="400px" cellspacing="0px" cellpadding="0px" border="3px">
    <?php
    for($rows=1;$rows<=8;$rows++){
        echo "<tr>";

        for($columns=1;$columns<=8;$columns++){

            $board=$rows+$columns;

            if($board%2==0){
                echo "<td height=50px width=50px bgcolor=#FFFFFF></td>";
            }else{
                echo "<td height=50px width=50px bgcolor=#000000></td>";
            }
        }
        echo "</tr>";
    }
    ?>
</table>
<!-- Creates list of all months with their proper days in that month -->
<h1>Number of Days in Months</h1>

<?php
$monthArray = array("January","February","March","April","May","June","July","August","September","October","November","December");
$daysArray = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);


for($i=0;$i<12;$i++)
    echo ' <ul><li>' . substr($monthArray[$i],0,3) .'-'. $daysArray[$i].'</li></ul> ';
?>

</body>
</html>