<?php
declare(strict_types=1);

/**
 * Class DoublyLinkedList
 */
class DoublyLinkedList
{
    /**
     * @var null|Node
     */
    private $head;

    /**
     * @var int
     */
    private $count = 0;

    /**
     * @param mixed $value
     *
     * @return Node
     */
    private function createNode($value): Node
    {
        $node = new Node();
        $node->setValue($value);

        return $node;
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    public function prepend($value): void
    {
        $node = $this->createNode($value);
        $node->setNext($this->head);

        if ($this->head !== null) {
            $this->head->setPrevious($node);
        }
        $this->head = $node;
        $this->count++;
    }

    /**
     * @param $value
     *
     * @return void
     */
    public function append($value): void
    {
        $node = $this->createNode($value);

        if ($this->head === null) {
            $this->head = $node;
            return;
        }

        $lastNode = $this->head;

        while (null !== $lastNode->getNext()) {
            $lastNode = $lastNode->getNext();
        }
        $lastNode->setNext($node);
        $node->setPrevious($lastNode);
        $this->count++;
    }

    /**
     * @return void
     */
    public function deleteFromHead(): void
    {
        if ($this->count === 0) {
            throw new RuntimeException('Empty list');
        }

        $this->head = $this->head->getNext();
        if (null !== $this->head) {
            $this->head->setPrevious(null);
        } else {
            $this->head = null;
        }

        $this->count--;
    }

    /**
     * @return void
     */
    public function deleteFromTail(): void
    {
        if ($this->count === 0) {
            throw new RuntimeException('Empty list');
        }

        if ($this->head->getNext() === null && $this->head->getPrevious() === null) {
            $this->head = null;
            return;
        }

        $prev = $last = $this->head;
        while (null !== $last->getNext()) {
            $prev = $last;
            $last = $last->getNext();
        }
        $prev->setNext(null);
        $this->count--;
    }


    /**
     * @param mixed $value
     * @param int $after
     *
     * @return void
     */
    public function insertAfter($value, int $after): void
    {
        $node = $this->search($after);
        $newNode = $this->createNode($value);

        $next = $node->getNext();

        $newNode->setPrevious($node);
        $newNode->setNext($node->getNext());
        $node->setNext($newNode);
        $next->setPrevious($newNode);

        $this->count++;
    }

    /**
     * @param mixed $value
     * @param int $before
     *
     * @return void
     */
    public function insertBefore($value, int $before): void
    {
        $node = $this->search($before);
        $newNode = $this->createNode($value);

        $prev = $node->getPrevious();


        $node->setPrevious($newNode);
        $newNode->setNext($node);
        $newNode->setPrevious($prev);
        if (null !== $prev) {
            $prev->setNext($newNode);
        } else {
            $this->head = $newNode;
        }

        $this->count++;
    }

    /**
     * @param int $index
     */
    public function delete(int $index)
    {
        $node = $this->search($index);
        $prev = $node->getPrevious();
        $next = $node->getNext();


        if (null !== $prev) {
            $prev->setNext($next);
        } else {
            $this->deleteFromHead();
        }

        if (null !== $next) {
            $next->setPrevious($prev);
        }

        $this->count--;
    }

    /**
     * @param int $element
     *
     * @return Node
     */
    public function search(int $element): Node
    {
        if ($element >= $this->count || $element < 0) {
            throw new RuntimeException('Incorrect offset');
        }

        $node = $this->head;

        $i = 0;
        while ($i !== $element) {
            $node = $node->getNext();
            $i++;
        }

        return $node;
    }

    public function searchByValue($value)
    {
        $item = $this->head;
        for ($i = 0; ;$i++) {
            if ($item->getValue() === $value) {
                return $item;
            }
            if ($item->getNext() === null) {
                break;
            }
            $item = $item->getNext();
        }

        return null;
    }

    public function toArray()
    {
        $nodes = [];

        $currentNode = $this->head;
        while ($currentNode) {
            if (null !== $currentNode) {
                $nodes[] = $currentNode->toArray();
            } else {
                $nodes[] = $currentNode;
            }
            $currentNode = $currentNode->getNext();
        }

        return $nodes;
    }
}
