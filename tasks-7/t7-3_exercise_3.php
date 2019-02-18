<?php

function checkString(string $arg)
{
    $data = str_split($arg, 1);
    if (count($data) == 0)
        throw new RuntimeException('Missing arguments.');
    $checkArr = [];
    $res = [];
    $correctCoupe = ['[' => ']', '{' => '}', '(' => ')', '<' => '>', '"' => '"', '\'' => '\''];
    for ($i = 0; $i = count($data); $i++) {
        $checkArr[array_shift($data)] = array_pop($data);
    }
    foreach ($checkArr as $key => $value) {
        if (array_key_exists($key, $correctCoupe) && in_array($value, $correctCoupe)) {
            $temp = 'F' . $arg;
            $res[$temp] = true;
        } else {
            $temp = 'F' . $arg;
            $res[$temp] = false;
        }
    }
    var_export($res);
}

if ($argv[1]) {
    checkString($argv[1]);
}
