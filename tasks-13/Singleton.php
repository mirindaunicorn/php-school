<?php
declare(strict_types=1);

class Singleton
{
    /**
     * @var null|Singleton
     */
    private static $instance = null;

    /**
     * @return null|Singleton
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __sleep()
    {
    }

    private function __wakeup()
    {
    }
}

$firstObject = Singleton::getInstance();
$secondObject = Singleton::getInstance();

var_dump($firstObject); //returned object #1
echo PHP_EOL, PHP_EOL;
var_dump($secondObject); //also returned object #1
echo PHP_EOL, PHP_EOL;
