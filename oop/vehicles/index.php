<?php

spl_autoload_register(function ($name){
   $segments = explode('\\', $name);
   array_shift($segments);
   $path = 'classes';
   foreach ($segments as $segment){
       $path .= '/' . $segment ;
   }
   $path .= '.php';
   if ($path){
       echo $path;
       require_once $path;
   }
});

$car = new App\vehicles\Car(100, App\vehicles\Car::GERMANY);
$plane = new App\vehicles\Plane(400);
$boat = new App\vehicles\Boat(20);

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

echo \App\vehicles\Vehicle::getCount();
echo PHP_EOL;