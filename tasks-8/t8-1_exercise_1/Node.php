<?php
declare(strict_types=1);

/**
 * Class SeparateNode
 */
class Node
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @var null|Node
     */
    private $next = null;

    /**
     * @var null|Node
     */
    private $previous;


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
     * @return null|Node
     */
    public function getNext(): ?Node
    {
        return $this->next;
    }

    /**
     * @param null|Node $next
     */
    public function setNext(?Node $next): void
    {
        $this->next = $next;
    }

    /**
     * @return null|Node
     */
    public function getPrevious(): ?Node
    {
        return $this->previous;
    }

    /**
     * @param null|Node $previous
     */
    public function setPrevious(?Node $previous): void
    {
        $this->previous = $previous;
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
