<?php
declare(strict_types=1);

namespace App;

class CarCatalogClass
{
    private $cars = [];

    public function addCar(CarClass $car)
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
