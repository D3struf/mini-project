FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev libzip-dev zip unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Bring in Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN if [ -f composer.json ]; then composer install --no-interaction --prefer-dist --optimize-autoloader; fi

RUN chown -R www-data:www-data /var/www \
    && (chmod -R 775 /var/www/storage /var/www/bootstrap/cache || true)

EXPOSE 9000
CMD ["php-fpm"]
