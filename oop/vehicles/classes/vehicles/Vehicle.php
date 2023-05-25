<?php

namespace App\vehicles;

class Vehicle
{
    protected static $count = 0;
    protected $maxSpeed;
    protected $currentSpeed = 0;

    public function __construct($maxSpeed){
        $this->maxSpeed = $maxSpeed;
        self::$count += 1;
    }

    static function getCount(){
        return self::$count;
    }
}