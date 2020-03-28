FROM php:7.4-fpm

LABEL maintainer="kohei.izumi"

RUN apt-get update && apt-get install -y \
    git \
    libpq-dev \
    unzip \
    vim \
    zip

RUN docker-php-ext-install pdo_mysql pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

RUN mkdir /var/www/html/laravel-app

WORKDIR /var/www/html/laravel-app

COPY . .
