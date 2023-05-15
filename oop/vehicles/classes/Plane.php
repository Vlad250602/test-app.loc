<?php

class Plane extends Vehicle implements MovableInterface
{
    public function start()
    {
        return "Двигатель самолета запущен";
    }

    public function stop()
    {
        return "Двигатель самолета заглушен";
    }

    public function up(int $unit)
    {
        if ($this->currentSpeed + $unit > $this->maxSpeed){
            $this->currentSpeed = $this->maxSpeed;
            return "Скорость самолета увеличена до максимума (" . $this->maxSpeed . " км/ч)";
        }
        $this->currentSpeed += $unit;
        return "Скорость самолета увеличена до " . $this->currentSpeed . " км/ч)";
    }

    public function down(int $unit)
    {
        if ($this->currentSpeed - $unit <= 0){
            $this->currentSpeed = 0;
            return "Самолет остановился (после приземления)";
        }
        $this->currentSpeed -= $unit;
        return "Скорость самолета снижена до " . $this->currentSpeed . " км/ч)";
    }
}