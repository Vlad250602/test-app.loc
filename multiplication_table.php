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


for ($i=0; $i<=10; $i++){
    echo '<tr>';
    echo '<td style="background-color: orange">';
    if ($i==0) echo ''; else echo $i;
    echo '</td>';
    for ($m=1; $m<=10; $m++){
        if ($i == 0){
            echo '<td style="background-color: orange">';
            echo $m;
            echo '</td>';
        }else {
            echo '<td>';
            echo $i * $m;
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


