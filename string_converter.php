<?php

const CONVERTER_MODE_UPPERCASE = 1;
const CONVERTER_MODE_LOWERCASE = 2;
const CONVERTER_MODE_FIRST_STRING_UPPER = 3;
const CONVERTER_MODE_EVERY_WORD_UPPER = 4;
const CONVERTER_MODE_INVERT = 5;

function convert($input, $mode){
    switch ($mode){
        case 1:
            return strtoupper($input);
        case 2:
            return strtolower($input);
        case 3:
            $input = strtolower($input);
            return ucfirst($input);
        case 4:
            $input = strtolower($input);
            return ucwords($input);
        case 5:
            $result = "";
            for ($i = 0; $i < strlen($input); $i++){
                if (ctype_upper($input[$i])){
                    $result .= strtolower($input[$i]);
                } else {
                    $result .= strtoupper($input[$i]);
                }
            }
            return $result;
        default:
            echo 'Такого варианта не существует.' . PHP_EOL;
    }
    return NULL;
}

$string = 'hello world!';

$result = convert($string,  CONVERTER_MODE_INVERT);

var_dump($result);