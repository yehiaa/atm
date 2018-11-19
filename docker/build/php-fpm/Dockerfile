FROM php:7.2-fpm-stretch
WORKDIR "/var/www/html"

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
	libxml2-dev \
	&& pecl install mcrypt-1.0.1 && docker-php-ext-enable mcrypt

RUN docker-php-ext-install pdo_mysql mbstring tokenizer ctype xml

RUN docker-php-ext-enable pdo_mysql mbstring tokenizer ctype xml
