<?php

include ("functions.php");

$regions = [
        "Винницкая область",
    "Волынская область",
    "Днепропетровская область",
    "Донецкая область",
    "Житомирская область",
    "Закарпатская область",
    "Запорожская область",
    "Ивано-Франковская область",
    "Киевская область",
    "Кировоградская область",
    "Луганская область",
    "Львоская область",
    "Николаевская область",
    "Одесская область",
    "Полтавская область",
    "Ровенская область",
    "Сумская область",
    "Тернопольская область",
    "Харьковская область",
    "Херсонская область",
    "Хмельницкая область",
    "Черкасская область",
    "Черниговская область",
    "Черновицкая область",
];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = test_input($_POST["fname"]);
    $second_name = test_input($_POST["sname"]);
    $region = $_POST["region"];
    $city = test_input($_POST['city']);
    $adress = test_input($_POST['adress']);
    $date = strtotime($_POST['bdate']);
    $validation = global_validate($name, $second_name, $regions[$region], $city, $adress, $date);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["avatar"])) {
    $blacklist = ['.php', '.phtml', '.php3', '.php4'];

    foreach ($blacklist as $ext) {
        if (strpos($_FILES['avatar']['name'], $ext) !== false) {
            exit ('Недопустимое расширение файла');
        }
    }

    $whitelist = ['image/jpeg', 'image/gif', 'image/png'];

    if (!in_array($_FILES['avatar']['type'], $whitelist)) {
        exit('Недопустимый тип файла');
    }

    $fileName = $_SERVER['DOCUMENT_ROOT'] . "/images/" . $_FILES["avatar"]["name"];

    if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], $fileName)) {
        echo 'Failed';
    }

}



?>

<html>
<head>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div id="feedback-form" style="display: <?php if ($validation && $_SERVER["REQUEST_METHOD"] == "POST") echo "none";?>">
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
           value="<?php if (!$validation && $_SERVER["REQUEST_METHOD"] == "POST") echo $name?>" style="<?php
    if (!validate_size($name) && $_SERVER["REQUEST_METHOD"] == "POST"){
        echo "border: 1px solid red";
    }
    ?>">

    <!-- Фамилия -->
    <label for="s_name">Фамилия</label>
    <input type="text" name="sname" id="s_name"
           value="<?php if (!$validation && $_SERVER["REQUEST_METHOD"] == "POST") echo $second_name?>" style="<?php
    if (!validate_size($second_name) && $_SERVER["REQUEST_METHOD"] == "POST"){
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
    if (!validate_size($city) && $_SERVER["REQUEST_METHOD"] == "POST"){
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
    if (!validate_date($date) && $_SERVER["REQUEST_METHOD"] == "POST"){
        echo "border: 1px solid red";
    }
    ?>">

    <!-- Submit -->
    <input type="submit" value="Send">
</form>
</div>
<div style="display: <?php if (!$validation && !$_SERVER["REQUEST_METHOD"] == "POST") echo "none";?>">
    <div>
        <img src="<?php echo "/images/" . $_FILES["avatar"]["name"]?>">
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

