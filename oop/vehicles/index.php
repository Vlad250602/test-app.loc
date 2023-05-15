<?php

require_once "classes/Vehicle.php";
require_once "classes/MovableInterface.php";
require_once "classes/Car.php";
require_once "classes/Boat.php";
require_once "classes/Plane.php";

$car = new Car(100);
$plane = new Plane(400);
$boat = new Boat(20);

echo $car->start();
echo PHP_EOL;
echo $car->up(10);
echo PHP_EOL;
echo $car->up(120);
echo PHP_EOL;
echo $car->down(50);
echo PHP_EOL;
echo $car->down(30);
echo PHP_EOL;
echo $car->down(30);
echo PHP_EOL;
echo $car->stop();
echo PHP_EOL;

echo $plane->start();
echo PHP_EOL;
echo $plane->up(10);
echo PHP_EOL;
echo $plane->up(120);
echo PHP_EOL;
echo $plane->down(50);
echo PHP_EOL;
echo $plane->down(30);
echo PHP_EOL;
echo $plane->down(30);
echo PHP_EOL;
echo $plane->stop();
echo PHP_EOL;

echo $boat->start();
echo PHP_EOL;
echo $boat->up(10);
echo PHP_EOL;
echo $boat->up(120);
echo PHP_EOL;
echo $boat->down(50);
echo PHP_EOL;
echo $boat->down(30);
echo PHP_EOL;
echo $boat->down(30);
echo PHP_EOL;