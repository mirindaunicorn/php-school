<?php
declare(strict_types=1);

namespace App;

class TruckClass extends CarClass
{
    protected $loadCapacity;

    /**
     * @param mixed $loadCapacity
     */
    public function setLoadCapacity(int $loadCapacity): void
    {
        $this->loadCapacity = $loadCapacity;
    }

    public function __construct(int $year, string $model, string $vinCode, string $brand, int $loadCapacity)
    {
        parent::setYear($year);
        parent::setModel($model);
        parent::setVinCode($vinCode);
        parent::setBrand($brand);
        $this->setLoadCapacity($loadCapacity);
        $this->setInfo();
    }

    protected function setInfo()
    {
        parent::setInfo();
        $this->info[] = $this->loadCapacity;
    }
}
