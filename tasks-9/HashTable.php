<?php
declare(strict_types=1);

/**
 * Class HashTable
 */
class HashTable
{
    /** @var array  */
    private $storage = [];

    /** @var int */
    private $hashTableMaxLength;

    /** @var CollisionResolverInterface  */
    private $collisionResolver;

    /**
     * HashTable constructor.
     * @param $hashTableMaxLength
     * @param CollisionResolverInterface $collisionResolver
     */
    public function __construct($hashTableMaxLength, CollisionResolverInterface $collisionResolver)
    {
        $this->hashTableMaxLength = $hashTableMaxLength;
        $this->collisionResolver = $collisionResolver;
    }

    public function get($hash, $value = null)
    {
        if(isset($this->storage[$hash])) {
            if($this->storage[$hash] instanceof DoublyLinkedList && null !== $value) {
                /** @var DoublyLinkedList $list */
                $list = $this->storage[$hash];
                $result = $list->searchByValue($value);
                if(null === $result) {
                    throw new RuntimeException(sprintf('Not found in list: %s'), $value);
                }

                return $result;
            }

            return $this->storage[$hash];
        }

        throw new RuntimeException(sprintf('Not found: %s'), $hash);
    }


    public function write($index, $value) {
        if(isset($this->storage[$index])) {
            $resolvedCollision = $this->collisionResolver->resolve($index, $this->storage, $this->hashTableMaxLength, $this->storage[$index], $value);
            $this->storage[$resolvedCollision->getIndex()] = $resolvedCollision->getValue();
        } else {
            $this->storage[$index] = $value;
        }
    }
}
