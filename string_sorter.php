<?php

function sortStringItems($string, $delimiter = ", "){
    $array = explode(', ', $string);
    sort($array);
    return implode($delimiter, $array);
}


$countries = "Ukraine, USA, England, Poland, Germany";

//$result = sortStringItems($countries, '/');
$result = sortStringItems($countries);

echo $result . PHP_EOL;