<?php
declare(strict_types=1);

/**
 * Interface CollisionResolverInterface
 */
interface CollisionResolverInterface
{
    /**
     * @param $index
     * @param $reservoir
     * @param $size
     * @param null|Node $currentNode
     * @param mixed $value
     *
     * @return ResolvedCollision
     */
    public function resolve(int $index, array $reservoir, int $size, $currentNode, $value): ResolvedCollision;
}
