<?php

class Boat extends Vehicle implements MovableInterface
{
    public function start()
    {
        return "Двигатель лодки запущен";
    }

    public function stop()
    {
        return "Двигатель лодки заглушен";
    }

    public function up(int $unit)
    {
        if ($this->currentSpeed + $unit > $this->maxSpeed){
            $this->currentSpeed = $this->maxSpeed;
            return "Скорость лодки увеличена до максимума (" . $this->maxSpeed . " узлов)";
        }
        $this->currentSpeed += $unit;
        return "Скорость лодки увеличена до " . $this->currentSpeed . " узлов";
    }

    public function down(int $unit)
    {
        if ($this->currentSpeed - $unit <= 0){
            $this->currentSpeed = 0;
            return "Лодка остановилась";
        }
        $this->currentSpeed -= $unit;
        return "Скорость лодки снижена до " . $this->currentSpeed . " узлов";
    }
}