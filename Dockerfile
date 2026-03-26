FROM php:8.4-fpm

# Устанавливаем системные зависимости и PHP расширения
RUN apt-get update && apt-get install -y \
    git curl zip unzip \
    libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Копируем код проекта
COPY . .

# Устанавливаем зависимости
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Права на storage и cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
