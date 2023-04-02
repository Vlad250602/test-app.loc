<?php

function global_validate($name, $second_name, $region, $city, $adress, $date){
    return validate_size($name) and
        validate_size($second_name) and
        validate_size($city) and
        validate_date($date) and
        ($region) and
        ($adress != NULL);
}
function validate_size($data){
    if (mb_strlen($data) < 2 or mb_strlen($data) > 32){
        return false;
    } else {
        return true;
    }
}

function validate_date($data){
    if (date('Y', $data) < 1900 or date('Y', $data) > date('Y') or $data == NULL){
        return false;
    } else {
        return true;
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}