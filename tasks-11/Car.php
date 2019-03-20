<?php
declare(strict_types=1);

class Car
{
    protected $year;
    protected $model;
    protected $vinCode;
    protected $brand;
    protected $info = [];

    /**
     * @param mixed $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @param mixed $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @param mixed $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @param mixed $vinCode
     */
    public function setVinCode(string $vinCode): void
    {
        $this->vinCode = $vinCode;
    }

    protected function setInfo()
    {
        $this->info['year'] = $this->year;
        $this->info['model'] = $this->model;
        $this->info['vinCode'] = $this->vinCode;
        $this->info['brand'] = $this->brand;
    }
    /**
     * @return array
     */
    public function getInfo() : array
    {
        return $this->info;
    }

}
