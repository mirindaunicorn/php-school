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
$hashTable = new HashTable($hashTableLength, new IncrementalCollisionResolver());
$string = "Ada";
$hashFunction = new HashFunction($string, $hashTableLength);
$hashFunction2 = new HashFunction('aaaaaaa', $hashTableLength);
$hashTable->write($hashFunction2(), 'aaaaaaa');
$hashTable->write($hashFunction(), $string);
$hashTable->write($hashFunction->__invoke(), "daA");
$hashTable->write($hashFunction->__invoke(), "aAd");
//$hashTable->write(new HashFunction('a', $hashTableLength), 'asdfghmnbvcxasghmnbvcxsdfghgrefghnbdsdvbnbvdfgbhngfeddfghnbfdvbnbfdfbnbfdfb');

var_export($hashTable->get($hashFunction->__invoke(), $string));
//var_dump($hashTable);
