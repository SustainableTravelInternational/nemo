#!/bin/bash

docker-compose up --build

docker-compose exec fpm composer install

cp .env.example .env

docker-compose exec fpm php artisan migrate

docker-compose exec fpm php artisan db:seed
