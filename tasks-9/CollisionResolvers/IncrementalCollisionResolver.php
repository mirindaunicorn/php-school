<?php
declare(strict_types=1);

require_once __DIR__ . '/CollisionResolverInterface.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'ResolvedCollision.php';

/**
 * Class IncrementalCollisionResolver
 */
class IncrementalCollisionResolver implements CollisionResolverInterface
{
    /**
     * @inheritdoc
     */
    public function resolve(int $index, array $reservoir, int $size, $currentNode, $value): ResolvedCollision
    {
        $flag = false;
        for ($j = $index + 1; ; $j++) {
            if ($j >= $size) {
                if ($flag) {
                    throw new RuntimeException('Our table is full');
                }
                $j = 0;
                $flag = true;
            }
            if (
                isset($reservoir[$j])
                && !empty($reservoir[$j])) {
                continue;
            } else {
                return new ResolvedCollision($j, $value);
            }
        }
    }
}
