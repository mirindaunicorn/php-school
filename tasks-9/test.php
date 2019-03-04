<?php
declare(strict_types=1);

require_once __DIR__ . '/CollisionResolvers/CollisionResolverInterface.php';
require_once __DIR__ . '/CollisionResolvers/IncrementalCollisionResolver.php';
require_once __DIR__ . '/CollisionResolvers/LinkedListCollisionResolver.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../tasks-8/t8-1_exercise_1/DoublyLinkedList.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../tasks-8/t8-1_exercise_1/Node.php';
require_once __DIR__.'/HashFunction.php';
require_once __DIR__.'/HashTable.php';

$hashTableLength = 125;
$hashTable = new HashTable($hashTableLength, new LinkedListCollisionResolver());
$string = "Ada";
$hashFunction = new HashFunction($string, $hashTableLength);
$hashTable->write($hashFunction(), $string);
$hashTable->write($hashFunction->__invoke(), "daA");
$hashTable->write($hashFunction->__invoke(), "aAd");
$hashTable->write(10, "aAd");

var_export($hashTable->get($hashFunction->__invoke(), 'aAd'));
echo PHP_EOL;
var_export($hashTable->get(10, null));
//var_dump($hashTable);
