FROM php:7.4-fpm

RUN apt-get update && apt-get install -y autoconf pkg-config apt-utils mariadb-client git vim openssl zip libssl-dev unzip\
    && docker-php-ext-install pdo_mysql

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN groupadd dev -g 999
RUN useradd dev -g dev -d /home/dev -m

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

CMD cp .env.example .env & composer install ; php-fpm

EXPOSE 9000
