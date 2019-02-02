<?php
declare(strict_types=1);

$sum = $argv[1];
$result = [];
$nominal = [500, 200, 100, 50, 20, 10, 5, 2, 1];

$divisor = max($nominal);

do {
    $res = intval($sum / $divisor);
    if ($res !== 0) {
        $result[$divisor] = $res;
    }
    $sum = $sum % $divisor;
    $divisor = next($nominal);
} while ($sum !== 0);

var_dump($result);
