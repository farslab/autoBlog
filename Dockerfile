# Dockerfile

FROM php:8.2-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libonig-dev \
    libxml2-dev \
    composer \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath opcache \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY . .

RUN composer install --no-interaction

CMD php artisan serve --host=0.0.0.0 --port=8000
