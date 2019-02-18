<?php

class Queue
{
    private $leftStack = [];
    private $rightStack = [];
    private $leftTop = 0;
    private $rightTop = 0;

    public function push($value)
    {
        $this->leftStack[$this->leftTop++] = $value;
        $this->rightStack = array_reverse($this->leftStack);
    }

    public function pop()
    {
        if (sizeof($this->rightStack) === 0)
            throw new RuntimeException("Queue is empty!");
        return $this->rightStack[--$this->leftTop];
    }
}


$obj = new Queue();

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
