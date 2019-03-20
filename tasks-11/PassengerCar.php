<?php
declare(strict_types=1);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Car.php';

class PassengerCar extends Car
{
    protected $equipment;

    /**
     * @return mixed
     */
    public function getEquipment()
    {
        return $this->equipment;
    }

    /**
     * @param mixed $equipment
     */
    public function setEquipment(string $equipment): void
    {
        $this->equipment = $equipment;
    }

    public function __construct(int $year, string $model, string $vinCode, string $brand, string $equipment)
    {
        parent::setYear($year);
        parent::setModel($model);
        parent::setVinCode($vinCode);
        parent::setBrand($brand);
        $this->setEquipment($equipment);
        $this->setInfo();
    }

    protected function setInfo()
    {
        parent::setInfo();
        $this->info[] = $this->equipment;
    }

}
