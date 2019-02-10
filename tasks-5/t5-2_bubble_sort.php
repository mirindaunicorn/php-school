<?php
declare(strict_types=1);

$a = [2, 18, -9, 21, 0, 7, 55, 8, 12, -99];

function bubble_sort(array $data): array
{
    $length = count($data) - 1;
    for ($i = 0; $i < $length - 1; $i++) {
        for ($j = $length; $j >= $i+1; $j--) {
            if ($data[$j] < $data[$j - 1]) {
                $temp = $data[$j];
                $data[$j] = $data[$j - 1];
                $data[$j - 1] = $temp;
            }
        }
    }

    return $data;
}

$res = bubble_sort($a);
var_dump($res);
echo PHP_EOL;
