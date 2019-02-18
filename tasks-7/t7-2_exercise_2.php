<?php

class Stack
{
    private $head = 0;
    private $tail = 0;
    private $inputArr = [];
    private $outputArr = [];

    public function push($value)
    {
        $this->inputArr[$this->tail++] = $value;
        array_unshift($this->outputArr, $value);
    }

    public function pop()
    {
        if ($this->head === $this->tail) {
            throw new RuntimeException("Queue is empty");
        }
        $res = $this->outputArr[$this->head++];
        if ($this->head > $this->tail) {
            $this->head = $this->tail = 0;
        }
        return $res;
    }
}


$obj = new Stack();

for ($i = 0; $i< 10; $i++) {
    $obj->push($i.'abc');
}
var_dump($obj);
var_dump($obj->pop());
var_dump($obj->pop());
var_dump($obj->pop());
var_dump($obj->pop());
var_dump($obj->pop());
var_dump($obj->pop());
