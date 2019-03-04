<?php
declare(strict_types=1);

class ResolvedCollision
{
    private $index;

    private $value;

    /**
     * ResolvedCollision constructor.
     * @param int $index
     * @param $value
     */
    public function __construct(int $index, $value)
    {
        $this->index = $index;
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
