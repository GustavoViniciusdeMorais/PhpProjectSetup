# PHP Setup Project

### Config
```
chmod u+x phpInstall.sh

./phpInstall.sh

composer.sh

composer init
```

### Tutorials
- [Setup instructions](./ProjectSetup.md)
- [RabbitMQ](./RabbitMQ.md)

### Projet Tech Stack
- [Symfony Framework](https://symfony.com/doc/6.3/setup.html)
- [Bundle System](https://symfony.com/doc/6.3/bundles.html)
- [Doctrine](https://symfony.com/doc/6.3/doctrine.html)
- [FOSRestBundle RESTful API](https://fosrestbundle.readthedocs.io/en/3.x/)
- [Message Queue](https://symfony.com/doc/current/messenger.html)
- Hexagonal Architecture
- Domain Driven Design
- MySQL
- PostgreSQL
- MongoDB
- Redis
- [RabbitMQ](https://www.rabbitmq.com/)
- GraphQL
- Docker

### Test project
Enter the api container and start the services
```
docker exec -it -u 0 gusphp bash
service nginx start
service php8.1-fpm start
```
Request the message to the queue from the local machine cli
```sh
curl -X POST http://localhost/api/sample -H "Content-Type: application/json" -d '{"message": "hello rabbit"}'
```
List the queues inside rabbitmq container
```
docker exec -it -u 0 my_rabbitmq bash
rabbitmqadmin list queues
```
Consume the messages from inside the api container
```
php bin/console messenger:consume async -vv
```
