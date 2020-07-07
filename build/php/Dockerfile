FROM php:7.4-fpm-alpine

COPY build/php/php.ini /usr/local/etc/php/conf.d/
COPY src /var/www/html
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
USER www-data
