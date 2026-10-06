# GeoBash

```bash
service nginx start
service php8.1-fpm start

apt update -y && apt install -y php8.1-sqlite3

composer install -n
composer require illuminate/database:^10 -n

touch database/app.sqlite
```
```md
DB_CONNECTION=sqlite
DB_DATABASE=/var/www/html/public/database/app.sqlite
```
