<?php
declare(strict_types=1);

$x = [0, 1, 2, 3, 4, 5,  6,  7,  8];

$y = [1, 1, 2, 3, 5, 8, 13, 21, 34];

function myFunc($x) {
    $f1 = 0;
    $f2 = 1;
    $res = 0;

    for ($i = 1; $i <= $x; $i++) {
        $f = $f1 + $f2;
        $f1 = $f2;
        $f2 = $f;
        $res = $f;
    }
    echo $res;
}

myFunc(8);
