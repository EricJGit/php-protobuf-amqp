# PHP Sandbox, protobuf through AMQP

Made to help discovering of protocol buffer through AMQP transport layer

Try it, break it, fix it, extend it, do what you want, your mind is limit 😉 

## Requirements

Docker >= 19.03

Docker-compose >= 1.27.0

## Stack description

### 4 containers :
- php (php-fpm 8)
- php-consumer (php-cli 8)
- rabbit (3.8)
- nginx (1.19), thanks bitnami for awesome images 🤘

### php :
- Running as non root user
- Build with protobuf 3.14.0
- php-amqp extension master branch compile (last pecl release as some issues with php 8) 
- Xdebug 3
- Composer 2

## Project

- Symfony 5.2
- Symfony Messenger for amqp transport
- Use PHP 8 syntax

## How to play  

Start the stack : `docker-commpose up -d`

Take care, php-consumer start faster than rabbitmq, you may have to restart php-consumer. 

Nginx is listening on `localhost:8092`

Rabbit manager is accessible on `localhost:15672` 

## Useful commands

Create transports : `bin/console messenger:setup-transports`

