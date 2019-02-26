<?php
declare(strict_types=1);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'DoublyLinkedList.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Node.php';

$doublyLinkedList = new DoublyLinkedList();

$doublyLinkedList->prepend('1');
//$doublyLinkedList->deleteFromTail();
//$doublyLinkedList->deleteFromHead();
$doublyLinkedList->prepend('2');
$doublyLinkedList->insertAfter('6666', 0);
$doublyLinkedList->delete(0);
//$doublyLinkedList->deleteFromTail();
//
//$doublyLinkedList->prepend('3');
//$doublyLinkedList->append('4');
//$doublyLinkedList->deleteFromHead();

//var_dump($doublyLinkedList->search(0)->toArray());


//var_dump($doublyLinkedList);
echo json_encode($doublyLinkedList->toArray());
