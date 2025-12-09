FROM php:8.2-fpm-alpine

# Cài các package hệ thống cần thiết cho các extension
RUN apk add --no-cache \
    libzip-dev \
    zip \
    unzip \
    libpng-dev \
    oniguruma-dev \
    icu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install \
        pdo_mysql \
        mysqli \
        bcmath \
        gd \
        mbstring \
        exif \
        pcntl \
        zip \
        intl \
        opcache

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Dùng php.ini-production (tối ưu cho production)
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

WORKDIR /var/www/html

EXPOSE 9000
