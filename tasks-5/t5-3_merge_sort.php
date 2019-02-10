<?php
declare(strict_types=1);

$a = [100000002, -99, 5, 2, 4, 100000001, 7, 1, 3, 2, 6, 5];

function merge(&$arr, $skip, $middleOfArr, $length)
{
    $leftLength = $middleOfArr - $skip + 1;
    $rightLength = $length - $middleOfArr;

    $leftArr = [];
    $rightArr = [];

    for ($i = 1; $i <= $leftLength; $i++) {
        $leftArr[$i] = $arr[$skip+$i-1];
    }

    for ($j = 1; $j <= $rightLength; $j++) {
        $rightArr[$j] = $arr[$middleOfArr+$j];
    }

    $leftArr[$leftLength + 1] = min($arr);
    $rightArr[$rightLength + 1] = min($arr);

    $i = 1;
    $j = 1;

    for ($k = $skip; $k <= $length; $k++) {
        if ($leftArr[$j] >= $rightArr[$i]) {
            $arr[$k] = $leftArr[$j];
            $j = $j + 1;
        } else {
            $arr[$k] = $rightArr[$i];
            $i = $i + 1;
        }
    }
}

function mergeSort(&$arr, $skip, $length)
{
    if ($skip < $length) {
        $middleOfArr = floor(($skip + $length) / 2);
        mergeSort($arr, $skip, $middleOfArr);
        mergeSort($arr, $middleOfArr+1, $length);
        merge($arr, $skip, $middleOfArr, $length);
    }
}

mergeSort($a, 0, count($a) - 1);
echo json_encode($a);
