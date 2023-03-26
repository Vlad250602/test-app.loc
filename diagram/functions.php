<?php

function randomData($firstYear){
    $array= [];
    for ($i = $firstYear; $i<=2023; $i++){
        $array += [$i => rand(0,100)];
    }
    return $array;
}

function randomColor(){
    return "rgb(" . rand(0,255) . ", ". rand(0,255) . ", ". rand(0,255) . ")";
}

function makeDiagram($array)
{
    foreach ($array as $key =>$item) {
    echo "<div class=\"chart-item\">";
    echo "<p>" . $key . " - " . $item . "%</p>";
    echo "<div class=\"pipe\">";
    echo "<div style=\"width:" .  $item . "%; background-color: " . randomColor() . "\"></div>";
    echo "</div>";
    echo "</div>";
    }
}