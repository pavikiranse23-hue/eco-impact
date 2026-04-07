FROM php:8.2-apache

# Install MySQL extension
RUN docker-php-ext-install mysqli

# Copy project files
COPY . /var/www/html/

EXPOSE 80
