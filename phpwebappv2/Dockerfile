FROM php:7.2-apache
MAINTAINER jrbalsas@ujaen.es

run docker-php-ext-install pdo_mysql

WORKDIR /var/www/html

COPY html/ ./

EXPOSE 80

#ENTRYPOINT ["",""]

