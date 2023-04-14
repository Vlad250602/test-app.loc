<?php

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <style>
        tr,td,th{
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
    </style
</head>
<body>
    <div>
        <table>
            <tr>
                <th>Фото</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Область</th>
                <th>Город</th>
                <th>Адрес</th>
                <th>Дата рождения</th>
            </tr>
            <tr>
                <td><img src="<?php echo $result['avatar']?>" style="width: 50px; height: 50px"></td>
                <td><?php echo $result['name']?></td>
                <td><?php echo $result['second_name']?></td>
                <td><?php echo $regions[$result['region']]?></td>
                <td><?php echo $result['city']?></td>
                <td><?php echo $result['adress']?></td>
                <td><?php echo $result['date']?></td>
            </tr>
        </table>
    </div>
</body>
</html>
