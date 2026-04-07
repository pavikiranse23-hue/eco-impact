FROM php:8.2-apache

# Install MySQL extension for PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Disable other MPM modules
RUN a2dismod mpm_event || true
RUN a2dismod mpm_worker || true

# Enable the correct one for PHP
RUN a2enmod mpm_prefork

# Copy project files
COPY . /var/www/html/

EXPOSE 80
