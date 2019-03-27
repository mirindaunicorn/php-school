<?php
declare(strict_types=1);

class DbConnection
{
    /**
     * @var null|DbConnection
     */
    private static $instance = null;
    /**
     * @var null|PDO
     */
    private static $connect = null;

    /**
     * @param string $fileName
     * @return DbConnection|null
     */
    public static function getInstance(string $fileName)
    {
        if (self::$instance === null) {
            self::$instance = new DbConnection();
            self::$connect = new PDO('sqlite:' . $fileName);
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

//created connection with your parameters
$firstConnect = DbConnection::getInstance('firstFile.db');

//not created new connection and not changed old connect parameters
$secondConnect = DbConnection::getInstance('secondFile.db');
