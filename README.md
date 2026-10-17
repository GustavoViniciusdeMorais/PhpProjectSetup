# GeoBash

REST API built with Slim 4, PHP 8.1, Nginx, SQLite via `illuminate/database`, Twig and Guzzle.

## Requirements

- Docker Engine
- Docker Compose

## Build and start

```bash
docker compose up --build -d
```

The container `api` runs with `ENTRYPOINT ["tail", "-f", "/dev/null"]`, so the web services do not start by themselves. Start both after every container start:

```bash
docker exec api service nginx start
docker exec api service php8.1-fpm start
```

## Install dependencies

```bash
docker exec -w /var/www/html/public api composer install -n
```

## Environment file

Create `api/.env` on every new server. The file is not committed because `.gitignore` excludes `*.env*`.

```md
DB_CONNECTION=sqlite
DB_DATABASE=/var/www/html/public/database/app.sqlite
```

## Database

The SQLite file lives at `api/database/app.sqlite` and is mapped to `/var/www/html/public/database/app.sqlite` in the container. Create it when absent:

```bash
touch api/database/app.sqlite
```

## Logs

`api/src/Utils/Logger.php` appends to `api/logs/app.logs`. The folder must exist and be writable by the php-fpm user:

```bash
mkdir -p api/logs
chmod -R 777 api/logs
chmod -R 777 api/database
```
