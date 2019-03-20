<?php
declare(strict_types=1);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'BeTree.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'NodeForTree.php';

$myTree = new BeTree();

$myTree->insertIntoTree(5);
$myTree->insertIntoTree(4);
$myTree->insertIntoTree(5);
$myTree->insertIntoTree(6);
//$myTree->insertIntoTree(3);
//$myTree->insertIntoTree(7);
//$myTree->insertIntoTree(2);
//$myTree->insertIntoTree(3);

$myDepth = $myTree->checkDepth();

//$myNode = $myTree->findByValue(6);


var_export($myDepth);


//var_export($myTree);





//echo PHP_EOL, PHP_EOL, $myTree->checkDepth();
//var_export($myTree);
