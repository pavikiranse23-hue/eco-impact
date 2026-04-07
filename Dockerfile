FROM php:8.2-apache

# install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# disable other MPM modules if present
RUN a2dismod mpm_event mpm_worker || true
RUN a2enmod mpm_prefork

# copy project files
COPY . /var/www/html/

EXPOSE 80
