#!/bin/bash

docker-compose up -d --build

sleep 30

docker-compose exec fpm composer install

docker-compose exec fpm cp .env.example .env

docker-compose exec pgdb psql -U postgres -c "create database nemo;"

docker-compose exec pgdb psql -U postgres -c "CREATE EXTENSION postgis;"

docker-compose exec fpm php artisan migrate

docker-compose exec fpm php artisan db:seed

chmod -R go+w code/bootstrap code/storage

docker-compose exec fpm php artisan passport:install
