FROM php:8.0-apache

RUN docker-php-ext-install mysqli
COPY . /php-apache-environment/var/www/html
WORKDIR /php-apache-environment/var/www/html
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-enable mysqli