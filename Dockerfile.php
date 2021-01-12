FROM php:8-apache

RUN apt-get update \
  && apt-get install -y \
  zip \
  nano \
  libicu-dev \
  unzip

COPY ./apache_conf/apache2.conf /etc/apache2/apache2.conf

RUN a2enmod rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql intl

COPY ./app /var/www/html

WORKDIR /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]