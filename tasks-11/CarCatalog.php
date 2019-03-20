<?php
declare(strict_types=1);
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Car.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'PassengerCar.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Truck.php';

class CarCatalog
{
    private $cars = [];

    public function addCar(Car $car)
    {
        $this->cars[] = $car;
    }

    public function getCatalog()
    {
        foreach ($this->cars as $car) {
            var_export($car->getInfo());
            echo PHP_EOL;
        }
    }
}
