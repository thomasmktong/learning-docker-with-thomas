FROM php:apache
MAINTAINER Thomas Tong <hello@thomastong.me>

RUN docker-php-ext-install mysqli
COPY conf/php.ini /usr/local/etc/php/

RUN a2enmod headers
RUN a2enmod rewrite
RUN a2enmod ssl

COPY cert/server.crt /etc/ssl/certs/
COPY cert/server.key /etc/ssl/certs/

COPY conf/000-default.conf /etc/apache2/sites-enabled/
COPY conf/default-ssl.conf /etc/apache2/sites-enabled/
COPY conf/apache2.conf /etc/apache2/

COPY public/ /var/www/html/
COPY .env /var/www/html/