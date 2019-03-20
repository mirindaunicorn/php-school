<?php
declare(strict_types=1);
/**
 * Class NodeForTree
 */
class NodeForTree
{
    /**
     * @var mixed
     */
    private $value;
    /**
     * @var null/NodeForTree
     */
    private $left = null;
    /**
     * @var null/NodeForTree
     */
    private $right = null;






//    /**
//     * @var int
//     */
//    private $depth = 0;
//
//    /**
//     * @return int
//     */
//    public function getDepth(): int
//    {
//        return $this->depth;
//    }
//
//    /**
//     * @param int $depth
//     */
//    public function setDepth(int $depth): void
//    {
//        $this->depth = $depth;
//    }






    /**
     * @return mixed
     */

    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return null
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param null $left
     */
    public function setLeft($left): void
    {
        $this->left = $left;
    }

    /**
     * @return null
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * @param null $right
     */
    public function setRight($right): void
    {
        $this->right = $right;
    }


    public function toArray()
    {
        return [
            'previous' => $this->getPrevious() === null ? null : $this->getPrevious()->getValue(),
            'value' => $this->getValue(),
            'next' => $this->getNext() === null ? null : $this->getNext()->getValue(),
        ];
    }
}

