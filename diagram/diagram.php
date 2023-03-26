<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bar chart</title>
    <style>
        .chart .pipe {
            background: #eee none repeat scroll 0 0;
            box-shadow: 3px 3px 3px 0 rgb(200, 200, 200) inset;
        }
        .chart .pipe {
            width: 100%;
            height: 10px;
            border-radius: 5px;
            margin-bottom: 0.8em;
        }
        .chart p {
            margin: 0 0 3px
        }
        .chart .pipe > div {
            /*background: #dc3545 none repeat scroll 0 0;*/
            border-radius: 5px;
            height: 10px;
        }
    </style>
</head>
<body>
<div class="chart">
    <?php
    include ('functions.php');
    $array = randomData($_GET["year"] ?: 2000);
    makeDiagram($array);
    ?>
</div>
</body>
</html>

