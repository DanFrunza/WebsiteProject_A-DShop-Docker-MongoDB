FROM php:8.2-apache

RUN apt-get update -y && apt-get upgrade -y
RUN apt-get install -y openssl libssl-dev libcurl4-openssl-dev 

RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/php.ini

RUN echo "extension=libmongoc.so" >> /usr/local/etc/php/php.ini

EXPOSE 80