<?php
declare(strict_types=1);

use App\CarCatalogClass;
use App\PassengerCarClass;
use App\TruckClass;

require_once __DIR__ . '/vendor/autoload.php';

$car1 = new PassengerCarClass(1990, 'R48', 'V35826A375G34', 'Suzuki', 'standard suzuki equipment');
$car2 = new PassengerCarClass(2017, 'Accord', 'B00823C918S20', 'Honda', 'standard honda equipment');
$car3 = new TruckClass(2004, 'XF 105', 'K01854D724J58', 'Daf', 8000);
$car4 = new TruckClass(2015, 'Vito', 'B02591R930E66', 'Mercedes-Benz', 15000);

$carCatalog = new CarCatalogClass();
$carCatalog->addCar($car1);
$carCatalog->addCar($car2);
$carCatalog->addCar($car3);
$carCatalog->addCar($car4);
$carCatalog->getCatalog();
