<?php
$full_name = "Vladyslav Maksymenko";
$photo = "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/American_Beaver.jpg/640px-American_Beaver.jpg";
$position = "PHP developer";
$salary = 1000;
$experince = 1.5;
$city = "Chernihiv";
$readyForMoving = True;
$email = "vlad26068@gmail.com";
$phone = "+380969921250";
$skills = [
    "PHP basic",
    "Laravel",
    "MySql",
    "Linux",

];
$time = date('H');
?>

<!<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Test document</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">

</head>
<?php
include_once 'includes/header.php'
?>
<body class="<?php if (($time >= 18) || ($time <= 6)) echo "body_night"; else echo "body_day"; ?>">

<div class="block2">
    <div>
        <img src="<?php echo $photo?>" width=300 height=300>
    </div>
</div>

<div class="block1">
    <div>
        Name: <?php echo $full_name?>
    </div>
    <div>
        Position: <?php echo $position?>
    </div>
    <div>
        Salary: <?php echo $salary ?>$
    </div>
    <div>
        Experince: <?php echo $experince?> year
    </div>
    <div>
        City: <?php echo $city?>
    </div>
    <div>
        Ready for moving: <?php if ($readyForMoving == True){
            echo "Yes";
        } else echo "No"?>
    </div>
    <div>
        Email: <?php echo $email?>
    </div>
    <div>
        Phone: <?php echo $phone?>
    </div>
    <div>
        Skills:<?php
        echo "<ul style='margin-top: 0px'>";
            foreach ($skills as $skill){
                echo "<li>" . $skill . "</li>";
            }
        echo "</ul>";
        ?>
    </div>
</div>

</body>
<?php
include_once 'includes/footer.php'
?>
</html>
