<?php
declare(strict_types=1);
require_once __DIR__ . DIRECTORY_SEPARATOR . 'DoublyLinkedListForTree.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'NodeForTree.php';

/**
 * Class BeTree
 *
 */
class BeTree
{
    /**
     * @var null/NodeForTree
     */
    private $head = null;
//    /**
//     * @var null/NodeForTree
//     */
//    private $previous = null;
//    /**
//     * @var int
//     */
//    private $depth = 0;
//

//    public function checkDepth(&$currentNode = null)
//    {
//        if ($this->head === null) {
//            return $this->depth = 0;
//        } else {
//            if ($currentNode === null) {
//                $currentNode = $this->head;
//                $this->depth = 1;
//            }
//            while ($currentNode->getLeft() !== null || $currentNode->getRight() !== null) {
//                if ($currentNode->getLeft() !== null) {
//                    $this->depth++;
//                    $currentNode = $currentNode->getLeft();
//                    $this->checkDepth($currentNode);
//                }
//                if ($currentNode->getRight() !== null) {
//                    $this->depth++;
//                    $currentNode = $currentNode->getRight();
//                    $this->checkDepth($currentNode);
//                }
//            }
//            return $this->depth;
//        }
//}

//    public function checkDepth()
//    {
//        $node = $this->head;
//        $node->setDepth(1);
//        $queue = array($node);
//        $out = array(PHP_EOL);
//        $currentDepth = $node->getDepth();
//
//        while (count($queue) > 0) {
//            $currentNode = array_shift($queue);
//
//            if ($currentNode->getDepth() > $currentDepth) {
//                $currentDepth++;
//                array_push($out, PHP_EOL);
//            }
//
//            array_push($out, $currentNode->getValue() . ' ');
//
//            if ($currentNode->getLeft) {
//                $currentNode->getLeft()->getDepth($currentDepth + 1);
//                array_push($queue, $currentNode->getLeft());
//            }
//            if ($currentNode->getRight()) {
//                $currentNode->getRight()->getDepth($currentDepth + 1);
//                array_push($queue, $currentNode->getRight());
//            }
//        }
//        return join($out, '');
//    }

//    public function setDepth(&$currentNode = null)
//    {
//        if ($currentNode === null) {
//            $currentNode = $this->head;
//        }
//        if ($currentNode === 1) {
//            return $depthVersions;
//        }
//
//        if ($this->head === null) {
//            $this->depth = 0;
//        } else {
//            $depthVersions = [];
//            $this->depth = 1;
//
//            if ($currentNode->getLeft() !== null) {
//                $currentNode = $currentNode->getLeft();
//                $this->depth++;
//                $this->setDepth($currentNode);
//            } else {
//                $this->depth++;
//                $depthVersions[] = $this->depth;
//                return $currentNode = 1;
//            }
//            if ($currentNode->getRight() !== null) {
//                $currentNode = $currentNode->getRight();
//                $this->depth++;
//                $this->setDepth($currentNode);
//            } else {
//                $this->depth++;
//                $depthVersions[] = $this->depth;
//                return $currentNode = 1;
//            }
//        }
//    }

//    /**
//     * @param $value
//     * @param null|NodeForTree $searchNode
//     * @return null|NodeForTree
//     */
//    public function findByValue($value, &$searchNode = null)
//    {
//        if ($searchNode === null) {
//            $searchNode = $this->head;
//        }
//        if ($this->head === null) {
//            throw new RuntimeException('Binary tree is empty!');
//        }
//        if ($searchNode->getValue() === $value) {
//            return $searchNode;
//        } else {
//            if ($searchNode->getValue() > $value) {
//                $searchNode = $searchNode->getLeft();
//                $this->findByValue($value);
//            }
//            if ($searchNode->getValue() < $value) {
//                $searchNode = $searchNode->getRight();
//                $this->findByValue($value);
//            }
//        }
//    }

    /**
     * @param mixed $value
     * @return NodeForTree
     */
    private function createNode($value): NodeForTree
    {
        $node = new NodeForTree();
        $node->setValue($value);
        return $node;
    }
    
    /**
     * @param int $value
     * @param null|NodeForTree $lastNode
     */
    public function insertIntoTree(int $value, &$lastNode = null)
    {
        if ($lastNode === null) {
            $lastNode = $this->head;
//            $lastNode->setDepth(1);
        }
        if ($this->head === null) {
            $newNode = $this->createNode($value);
            $this->head = $newNode;
            return;
        }

        if ($this->head !== null) {
            if ($lastNode->getValue() > $value) {
                if ($lastNode->getLeft() === null) {
                    $newNode = $this->createNode($value);
                    $lastNode->setLeft($newNode);
//                    $newNode->setDepth($newNode->getDepth() + 1);
                    return;
                } else {
                    $lastNode = $lastNode->getLeft();
//                    $this->depth++;
                    $this->insertIntoTree($value, $lastNode);
                }
            } elseif ($lastNode->getValue() <= $value) {
                if ($lastNode->getRight() === null) {
                    $newNode = $this->createNode($value);
                    $lastNode->setRight($newNode);
//                    $newNode->setDepth($newNode->getDepth() + 1);
                    return;
                } else {
                    $lastNode = $lastNode->getRight();
//                    $this->depth++;
                    $this->insertIntoTree($value, $lastNode);
                }
            }

        }
    }


//    public function deleteByValue(int $value, &$lastNode = null)
//    {
//        if ($lastNode === null) {
//            $lastNode = $this->head;
//        }
//        if ($this->head === null) {
//            throw new RuntimeException('Tree is empty!');
//        }
//
//        if ($this->head !== null) {
//            if ($lastNode->getValue() > $value) {
//                if ($lastNode->getLeft() === null) {
//                    throw new RuntimeException('Value not found in tree!');
//                } elseif ($lastNode->getLeft()->getValue() === $value) {
//                    $lastNode = $lastNode->getLeft();
//                    if ($lastNode->getLeft() === null && $lastNode->getRight() === null) {
//                        unset($lastNode);
//                        return;
//                    } elseif ()
//
//
//
//
//
//                    $newNode = $this->createNode($value);
//                    $lastNode->setLeft($newNode);
//                    return;
//                } else {
//                    $lastNode = $lastNode->getLeft();
//                    $this->insertIntoTree($value, $lastNode);
//                }
//            } elseif ($lastNode->getValue() <= $value) {
//                if ($lastNode->getRight() === null) {
//                    $newNode = $this->createNode($value);
//                    $lastNode->setRight($newNode);
//                    return;
//                } else {
//                    $lastNode = $lastNode->getRight();
//                    $this->insertIntoTree($value, $lastNode);
//                }
//            }
//
//        }
//    }











//    public function deleteByValue($value)
//    {
//        if ($this->head === null) {
//            return;
//        }
//        $lastNode = $this->head;
//        if ($lastNode->getValue() < $value) {
//
//        }
//    }
}
