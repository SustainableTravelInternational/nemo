FROM php:7.2-fpm

RUN apt-get update && apt-get install -y git zip unzip zlib1g-dev libzip-dev libpq-dev\
  && docker-php-ext-install pdo_mysql bcmath zip pdo pdo_pgsql pgsql

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
