FROM php:8.2-fpm

# Installeer MySQL driver extensions (snel build)
RUN docker-php-ext-install pdo_mysql mysqli

WORKDIR /var/www/html

EXPOSE 9000
CMD ["php-fpm"]
