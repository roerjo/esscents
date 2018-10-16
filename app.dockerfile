FROM php:7.2-fpm

# Required utilities for composer install
RUN apt update && apt install -y \
    git \
    zip \
    unzip

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
