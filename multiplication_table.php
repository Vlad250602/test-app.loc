<!<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link href="css/table_styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<table>
<?php

$array = [1,2,3,4,5,6,7,8,9,10];

for ($i=-1; $i<10; $i++){
    echo '<tr>';
    echo '<td style="background-color: orange">';
    echo $array[$i];
    echo '</td>';
    for ($m=0; $m<10; $m++){
        if ($i == -1){
            echo '<td style="background-color: orange">';
            echo $array[$m];
            echo '</td>';
        }else {
            echo '<td>';
            echo $array[$i] * $array[$m];
            echo '</td>';
        }
    }
    echo '</tr>';
    echo PHP_EOL;
}
?>
</table>
</body>
</html>


