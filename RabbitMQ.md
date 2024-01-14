# RabbitMQ

### Rerefences
- https://www.rabbitmq.com/management-cli.html
- https://www.rabbitmq.com/install-debian.html#apt-quick-start-cloudsmith

### Config environment commands
```sh
chmod u+x installRabbitMQ.sh

./installRabbitMQ.sh

systemctl status rabbitmq-server

systemctl enable rabbitmq-server

systemctl start rabbitmq-server

rabbitmq-plugins list

rabbitmq-plugins enable rabbitmq_management

wget https://raw.githubusercontent.com/rabbitmq/rabbitmq-server/v3.12.x/deps/rabbitmq_management/bin/rabbitmqadmin

rabbitmqadmin -V test list exchanges
```

### start admin
```sh
rabbitmq-plugins enable rabbitmq_management
```
After this, you can access http://localhost:15672 and login

```sh
composer require symfony/messenger
apt-get install php8.1-pgsql -y
apt-get install php-pear -y
apt-get update
apt-get install glibc-source -y
apt-get install php8.1-dev -y
pecl install amqp
apt-get install php8.1-amqp
composer require symfony/amqp-messenger
php bin/console doctrine:migrations:diff
php bin/console doctrine:migrations:migrate
```
