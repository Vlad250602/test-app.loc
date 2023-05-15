<?php


class Vehicle
{
    protected $maxSpeed;
    protected $currentSpeed = 0;

    public function __construct($maxSpeed){
        $this->maxSpeed = $maxSpeed;
    }

}