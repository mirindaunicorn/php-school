<?php

class QueueSecond
{
    private $leftStack = [];
    private $rightStack = [];
    private $top = 0;

    public function push($value)
    {
        $this->leftStack[$this->top++] = $value;
        array_unshift($this->rightStack, $value);
    }

    public function pop()
    {
        if (sizeof($this->rightStack) === 0)
            throw new RuntimeException("Queue is empty!");
        return $this->rightStack[--$this->top];
    }
}

$obj = new QueueSecond();

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
