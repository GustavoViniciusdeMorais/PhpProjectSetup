<?php

namespace Gustavomorais\Geobash\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class DatabaseConnection
{
    public static function boot(): void
    {
        $capsule = new Capsule();

        $capsule->addConnection(require __DIR__ . '/../../config/database.php');
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        $capsule->getConnection()->statement('PRAGMA journal_mode = WAL');
        $capsule->getConnection()->statement('PRAGMA foreign_keys = ON');
    }
}
