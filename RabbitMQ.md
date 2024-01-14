# RabbitMQ

### Rerefences
- https://www.rabbitmq.com/management-cli.html
- https://www.rabbitmq.com/install-debian.html#apt-quick-start-cloudsmith

### Config PHP container

```sh
composer require symfony/messenger
apt-get install php8.1-pgsql -y
apt-get install php-pear -y
apt-get update
apt-get install glibc-source -y
apt-get install php8.1-dev -y
pecl install amqp # select detect path automatically
apt-get install php8.1-amqp
composer require symfony/amqp-messenger
php bin/console doctrine:migrations:diff
php bin/console doctrine:migrations:migrate
```

### Tutorials about consumer and producer with symfony and rabbitmq commands
- [Create producre and consumer scripts](./ProducerConsumerRabbitMQScripts.md)
- [RabbitMQ commands](./RabbitMQCliCommands.md)
