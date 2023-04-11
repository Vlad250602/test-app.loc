<?php

function globalValidate($name, $second_name, $region, $city, $adress, $date)
{
    return validateSize($name) and
        validateSize($second_name) and
        validateSize($city) and
        validateDate($date) and
        ($region) and
        ($adress != null);
}
function validateSize($data, $min = 2, $max = 32)
{
    if ((mb_strlen($data) < $min or mb_strlen($data) > $max)){
        return false;
    }
    return true;
}

function validateDate($data)
{
    if (date('Y', $data) < 1900 or date('Y', $data) > date('Y') or $data == NULL){
        return false;
    }
    return true;
}

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
