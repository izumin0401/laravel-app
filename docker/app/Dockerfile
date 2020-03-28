FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    libpq-dev

RUN docker-php-ext-install pdo_mysql pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

ADD . /var/www/html/laravel-app

WORKDIR /var/www/html
