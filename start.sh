#!/bin/bash

docker-compose up -d --build

sleep 30

docker-compose exec fpm composer install

docker-compose exec fpm cp .env.example .env

docker-compose exec fpm php artisan migrate

docker-compose exec fpm php artisan db:seed
