<?php


?>

<html>
<head>
    <link rel="stylesheet" href="form.css">
</head>
<body style="background-color: <?php if ($_COOKIE['theme'] == 'light'){ echo 'white';} elseif($_COOKIE['theme'] == "dark"){ echo "gray";}?>">
<header>
    <div style="display: <?php if ($_GET['id']) echo "none";?>">
        <a href="<?php echo $url . '?theme=dark'; ?>" class="btn btn-primary">Dark theme</a>
        <a href="<?php echo $url . '?theme=light';?>" class="btn btn-primary">Light theme</a>
    </div>
</header>
<div id="feedback-form" style="display: <?php if (($validation && $_SERVER["REQUEST_METHOD"] == "POST") || $_GET['id']) echo "none";?>">
    <h2 class="header">Login</h2>
<form method="POST" enctype="multipart/form-data">

    <!-- File -->
    <label for="avatar">Avatar</label>
    <br>
    <input type="file" name="avatar" id="avatar">
    <br>
    <!-- Имя -->
    <label for="f_name">Имя</label>
    <input type="text" name="fname" id="f_name"
           value="<?php if (!$validation && $_SERVER["REQUEST_METHOD"] == "POST") echo $name ?>" style="<?php
    if (!validateSize($name) && $_SERVER["REQUEST_METHOD"] == "POST"){
        echo "border: 1px solid red";
    }
    ?>">

    <!-- Фамилия -->
    <label for="s_name">Фамилия</label>
    <input type="text" name="sname" id="s_name"
           value="<?php if (!$validation && $_SERVER["REQUEST_METHOD"] == "POST") echo $second_name?>" style="<?php
    if (!validateSize($second_name) && $_SERVER["REQUEST_METHOD"] == "POST"){
        echo "border: 1px solid red";
    }
    ?>">


    <!-- Область -->
    <label for="region">Область</label>
    <select name="region" id="region" style="<?php
    if ($region == "---" && $_SERVER["REQUEST_METHOD"] == "POST"){
        echo "border: 1px solid red";
    }
    ?>">
        <option>---</option>
        <?php foreach($regions as $key => $region){
            echo "<option value = \"" .$key . "\">" . $region . "</option>";
        } ?>
    </select>
    <br>

    <!-- Город -->
    <label for="city">Город</label>
    <input type="text" name="city" id="city"
           value="<?php if (!$validation && $_SERVER["REQUEST_METHOD"] == "POST") echo $city?>" style="<?php
    if (!validateSize($city) && $_SERVER["REQUEST_METHOD"] == "POST"){
        echo "border: 1px solid red";
    }
    ?>">

    <!-- Адрес -->
    <label for="adress">Адрес проживания</label>
    <input type="text" name="adress" id="adress"
           value="<?php if (!$validation && $_SERVER["REQUEST_METHOD"] == "POST") echo $adress?>" style="<?php
    if ($adress == NULL && $_SERVER["REQUEST_METHOD"] == "POST"){
        echo "border: 1px solid red";
    }
    ?>">

    <!-- Дата рождения -->
    <label for="b_date">Дата рождения</label>
    <input type="date" name="bdate" id="b_date"
           value="<?php if (!$validation && $_SERVER["REQUEST_METHOD"] == "POST") echo $_POST["bdate"]?>" style="<?php
    if (!validateDate($date) && $_SERVER["REQUEST_METHOD"] == "POST"){
        echo "border: 1px solid red";
    }
    ?>">

    <!-- Submit -->
    <input type="submit" value="Send">
</form>
</div>
<div style="display: <?php if (!$validation && !$_SERVER["REQUEST_METHOD"] == "POST") echo "none";?>">
    <div>
        <img src="<?php if($_FILES["avatar"]) echo "/images/" . $_FILES["avatar"]["name"]?>">
        <br>
        <?php
        if ($validation){
            echo "Пользователь " . $name . ' ' . $second_name . ", " . date('Y', $date) .
                "г. рождения,<br>проживающий по адресу: " .
                $regions[$_POST["region"]] . ", г." . $city . ", " . $adress . ",\nбыл успешно добавлен.";
        }
        ?>
    </div>
</div>
</body>
</html>

