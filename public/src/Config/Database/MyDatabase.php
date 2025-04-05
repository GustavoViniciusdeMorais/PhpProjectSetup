<?php

namespace Gustavo\Api\Config\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class MyDatabase
{
    public static $instance;
    protected static $connection;

    private function __construct()
    {
        static::$connection = new Capsule;
        static::$connection->addConnection([
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'database',
            'username' => 'root',
            'password' => 'password',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
    }

    public static function getInstance()
    {
        if(static::$instance === null){
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function getConnection()
    {
        return static::$connection;
    }

    public function createTables()
    {
        static::$connection::schema()->create('users', function ($table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }
}
