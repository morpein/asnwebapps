FROM php:7.4-apache
LABEL maintainer="jrbalsas@ujaen.es"

# Use PORT environment variable in Apache configuration files.
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html

COPY html/ ./

# Apache default port
ENV PORT=80  

EXPOSE 80

#ENTRYPOINT ["",""]

