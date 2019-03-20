<?php
declare(strict_types=1);

class BinaryTree
{
    /**
     * @var null/NodeForTree
     */
    private $head = null;

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

    public function deleteNode($value)
    {
        if ($this->head === null) {
            throw new RuntimeException('Tree is empty');
        }
        $node = $this->head;

        if ($node->getValue() === $value) {
            if($node->getLeft() !== null && $node->getRight() !== null) {

            }
        }
    }

}