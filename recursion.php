<?php

function recursion($ch){
    if ($ch == 1){
        return 1;
    }
    else{
        $ch = $ch * recursion($ch-1);
    }
    return $ch;
}

$number = 3;

$result = recursion($number);

echo "Факториал числа " . $number . " = " . $result . PHP_EOL;