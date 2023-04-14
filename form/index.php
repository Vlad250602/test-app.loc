<?php

include ("functions.php");


$validation = false;
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

$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

if($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once('form.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = testInput($_POST["fname"]);
    $second_name = testInput($_POST["sname"]);
    $region = $_POST["region"];
    $city = testInput($_POST['city']);
    $adress = testInput($_POST['adress']);
    $date = strtotime($_POST['bdate']);
    $avatar = '';
    $validation = globalValidate($name, $second_name, $regions[$region], $city, $adress, $date);

    if ( !empty($_FILES["avatar"])) {
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
        } else {
            $avatar = "/images/" . $_FILES["avatar"]["name"];
        }

    }

    if ($validation) {
        $connection = getConnect();
        $sqldate = date('Y-m-d',$date);
        $query = "INSERT INTO users (name,second_name,region,city,adress,date,avatar) VALUES 
                                    ('$name', '$second_name', '$region','$city', '$adress', '$sqldate' , '$avatar')";
        mysqli_query($connection, $query);
    }
    require_once('form.php');
}

if ($_GET['theme'] == 'light' && $_COOKIE['theme'] !== 'light'){
    setcookie('theme');
    setcookie('theme', 'light',time()+3600,'/','test-app.loc');
    header("Refresh:0");
} elseif ($_GET['theme'] == 'dark' && $_COOKIE['theme'] !== 'dark'){
    setcookie('theme');
    setcookie('theme', 'dark',time()+3600,'/','test-app.loc');
    header("Refresh:0");
}

if ($_GET['id']){
    $connection = getConnect();
    $query = "SELECT * FROM users WHERE id='$_GET[id]'";
    $result = mysqli_query($connection, $query);
    $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
    require_once('user-view.php');
}
