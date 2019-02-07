<?php
declare(strict_types=1);

if (!isset($argv[1])) {
    throw new Exception('Missing first argument. Trying add to your command some integer.');
}

if (!is_numeric($argv[1])) {
    throw new Exception('First argument must be integer.');
}

$size = intval($argv[1]);

for ($i = 1; $i <= $size; $i++) {
    for ($j = $i; $j < $size; $j++) {
        echo '   ';
    }

    for ($k = 1; $k < ($i * 2); $k++) {
        echo ' * ';
    }
    echo PHP_EOL;
}

for ($i = $size-1; $i >= 1; $i--) {
    for ($j = $size; $j > $i; $j--) {
        echo '   ';
    }

    for ($k = 1; $k < ($i * 2); $k++) {
        echo ' * ';
    }
    echo PHP_EOL;
}
