<?php
declare(strict_types=1);


if (!isset($argv[1])) {
    throw new Exception('Missing first argument. Trying add to your command some integer');
}

if (!is_numeric($argv[1])) {
    throw new Exception('First argument must be integer');
}

$length = intval($argv[1]);
$arr = array_chunk(range(1, $length*$length), $length);
$horizontal = [];
$vertical = [];
$route = $argv[2] ?? 'h';

if (isset($argv[2])) {
    if ($argv[2] === 'h') {
        $route = 'h';
    } elseif ($argv[2] === 'v') {
        $route = 'v';
    } else {
        throw new RuntimeException('Check second argument: route must by empty or string (trying "h" or "v")');
    }
}

foreach ($arr as $key => $value) {
    if ($key%2 !== 0) {
        array_push($horizontal, array_reverse($value));
    } else {
        array_push($horizontal, $value);
    }
}

if ($route === 'h') {
    foreach ($horizontal as $value) {
        foreach ($value as $key => $item) {
            echo $item . ' ';
        }
        echo PHP_EOL;
    }
}

if ($route === 'v') {
    for ($i = 0; $i < $length; $i++) {
        foreach ($horizontal as $value) {
            foreach ($value as $key => $item) {
                if ($key === $i) {
                    array_push($vertical, $item);
                }
            }
        }
    }

    $vertical = array_chunk($vertical, $length);

    foreach ($vertical as $value) {
        foreach ($value as $key => $item) {
            echo $item . ' ';
        }
        echo PHP_EOL;
    }
}
