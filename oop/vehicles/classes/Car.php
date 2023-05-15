<?php


class Car extends Vehicle implements MovableInterface
{
    public function start()
    {
        return "Двигатель машины запущен";
    }

    public function stop()
    {
        return "Двигатель машины заглушен";
    }

    public function up(int $unit)
    {
        if ($this->currentSpeed + $unit > $this->maxSpeed){
            $this->currentSpeed = $this->maxSpeed;
            return "Скорость машины увеличена до максимума (" . $this->maxSpeed . " км/ч)";
        }
        $this->currentSpeed += $unit;
        return "Скорость машины увеличена до " . $this->currentSpeed . " км/ч";
    }

    public function down(int $unit)
    {
        if ($this->currentSpeed - $unit <= 0){
            $this->currentSpeed = 0;
            return "Машина остановилась";
        }
        $this->currentSpeed -= $unit;
        return "Скорость машины снижена до " . $this->currentSpeed . " км/ч";
    }
}

