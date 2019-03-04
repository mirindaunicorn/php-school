<?php
declare(strict_types=1);

require_once __DIR__ . DIRECTORY_SEPARATOR . '../../tasks-8/t8-1_exercise_1/DoublyLinkedList.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../../tasks-8/t8-1_exercise_1/Node.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'ResolvedCollision.php';

/**
 * Class LinkedListCollisionResolver
 */
class LinkedListCollisionResolver implements CollisionResolverInterface
{
    /**
     * @inheritdoc
     */
    public function resolve(int $index, array $reservoir, int $size, $currentNode, $value): ResolvedCollision
    {
        if($currentNode instanceof DoublyLinkedList) {
            $list = $currentNode;
        } else {
            $list = new DoublyLinkedList();
            $list->append($currentNode);
        }
        $list->append($value);

        return new ResolvedCollision($index, $list);
    }
}