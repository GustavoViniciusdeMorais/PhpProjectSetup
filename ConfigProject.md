# Config Project

### Database
```sh
sudo cp -R databaseSchema.sql dockerDBData/databaseSchema.sql
sudo docker exec -it -u 0 mysql bash
mysql -u root -p
use laravel
source /var/lib/mysql/databaseSchema.sql;
```

### config/app_local.php
```sh
sudo cat config/app_local.example.php config/app_local.php
```
```php
'Security' => [
    'salt' => 'dSDte@CZrnS8cT!qseV3$tyHhnWkxdeOk',
],
'Datasources' => [
    'default' => [
        'className' => 'Cake\Database\Connection',
        // Replace Mysql with Postgres if you are using PostgreSQL
        'driver' => 'Cake\Database\Driver\Mysql',
        'persistent' => false,
        'host' => 'mysql',
        'username' => 'root',
        'password' => 'laravel',
        'database' => 'laravel',
        // Comment out the line below if you are using PostgreSQL
        'encoding' => 'utf8mb4',
        'timezone' => 'UTC',
        'cacheMetadata' => true,
    ],
]
```
